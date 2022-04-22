<?php
require_once('vendor/autoload.php');

$google_client = new Google_Client();

$google_client->setClientId("244974568197-b1jm24b80bvqq00t4fvbsqml2va8m63f.apps.googleusercontent.com");

$google_client->setClientSecret('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');

$google_client->setRedirectUri("http://development.brstdev.com/nishantsharma/form/LoginForm/gm.php");
//scope 
$google_client->addScope('email');

$google_client->addScope('profile');

session_start();
?>