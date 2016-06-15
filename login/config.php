<?php
session_start();
include_once("src/Google_Client.php");
include_once("src/contrib/Google_Oauth2Service.php");
######### edit details ##########
$clientId = 'Client id of your project'; //Google CLIENT ID
$clientSecret = 'Client Secret of your project'; //Google CLIENT SECRET
$redirectUrl = 'http://localhost:8000/login';  //return url (url to script)
$homeUrl = 'http://localhost:8000/login';  //return to home
$projectUrl = '';
##################################

$gClient = new Google_Client();
$gClient->setApplicationName('yankees');
$gClient->setClientId($clientId);
$gClient->setClientSecret($clientSecret);
$gClient->setRedirectUri($redirectUrl);

$google_oauthV2 = new Google_Oauth2Service($gClient);
?>
