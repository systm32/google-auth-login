<?php
include_once("config.php");
if(array_key_exists('logout',$_GET))
{
	$actual_link = $_SESSION['ret'];
	unset($_SESSION['token']);
	unset($_SESSION['fname']);
	unset($_SESSION['lname']);
	unset($_SESSION['email']); //Google session data unset
	$gClient->revokeToken();
	session_destroy();
	header("Location:/login/index.php?ret=$actual_link");
}
?>