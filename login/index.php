<?php
include_once("config.php");
include_once("includes/functions.php");

//print_r($_GET);die;

if(isset($_REQUEST['ret']))
{
	$_SESSION['ret'] = $_REQUEST['ret'];
}


if(isset($_REQUEST['code'])){
	$gClient->authenticate();
	$_SESSION['token'] = $gClient->getAccessToken();
	header('Location: ' . filter_var($redirectUrl, FILTER_SANITIZE_URL));
}

if (isset($_SESSION['token'])) {
	$gClient->setAccessToken($_SESSION['token']);
}

if ($gClient->getAccessToken()) {
	$userProfile = $google_oauthV2->userinfo->get();
	//DB Insert
	$gUser = new Users();
	$gUser->checkUser('google',$userProfile['id'],$userProfile['given_name'],$userProfile['family_name'],$userProfile['email'],$userProfile['gender'],$userProfile['locale'],$userProfile['link'],$userProfile['picture']);
	if(strpos($userProfile['email'],'flipkart.com') == false)    //check email is of flipkart
	{
		header("location: /login/logout.php?logout");
		exit();	
	}
	$_SESSION['fname'] = $userProfile['given_name'];
	$_SESSION['lname'] = $userProfile['family_name'];
	$_SESSION['email'] = $userProfile['email'];
	 // Storing Google User Data in Session
	$_SESSION['token'] = $gClient->getAccessToken();
	if(isset($_SESSION['ret']))
	{
		$redirect_url = $_SESSION['ret'];
		header("location: $redirect_url");
	}
	else
	{	
		echo 'No redirection Url Found..';
		exit();
	}
	
} else {
	$authUrl = $gClient->createAuthUrl();
}

if(isset($authUrl)) {
	echo '<html>
<head>
    <title>Login</title>
    <link type="text/css" rel="stylesheet" href="includes/button.css" />
</head>
<body bgcolor = "#027cd8">
     
    <div id = "centered" style="height:100%;width:100%;position:fixed;top:30%;">
    <p align="center"><img src="/login/images/fklogo_small.png"   height="50" width="50"></img></p>
    <p align="center"><font face="Verdana,Arial,Helvetica" size="5" color="white">Security Engineering</font></p>
    <h2 align="center" style="margin-top:100px"><a href="'.$authUrl.'" class="tbutton">&nbsp &nbsp &nbsp &nbsp&nbsp &nbsp &nbsp &nbsp <font face="Verdana,Arial,Helvetica" size="3" color="white">Login</font> &nbsp &nbsp &nbsp &nbsp&nbsp &nbsp &nbsp &nbsp</a></h2>         
    <p align="center"><font face="Verdana,Arial,Helvetica" size="1" color="white">Only Flipkart emails are allowed</font></p>
    </div>
    
</body>
</html>';
} else {
	echo '<a href="logout.php?logout">Logout</a>';
}

?>