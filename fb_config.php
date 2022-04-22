<?php

require_once 'graph/src/Facebook/autoload.php';

if (!session_id())
{
    session_start();
}

// Call Facebook API

$facebook = new \Facebook\Facebook([
  'app_id'      => '983515635635430',
  'app_secret'     => '5d3811a48dbaf50162303b95f7b3311f',
  'default_graph_version' => 'v3.20'

]);
$facebook_helper = $facebook->getRedirectLoginHelper();
?>