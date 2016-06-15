<?php
session_start();
include_once("src/Google_Client.php");
include_once("src/contrib/Google_Oauth2Service.php");
######### edit details ##########
$clientId = '325931357839-ug0qig4gs4duud1l77b5n7h2i0fgjmas.apps.googleusercontent.com'; //Google CLIENT ID
$clientSecret = 'cAwS8dyTDHggrzmPUvfZlrtx'; //Google CLIENT SECRET
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