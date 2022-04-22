<?php

//index.php

include'fb_config.php';
include'conn.php';
$facebook_output = '';

// $facebook_helper = $facebook->getRedirectLoginHelper();
if(isset($_SESSION['access_token_fb']) && $_SESSION['access_token_fb']!=null)
{
    header("location:login.php");
}
if(isset($_GET['code']))
{
 if(isset($_SESSION['access_token_fb']))
 {
  $access_token = $_SESSION['access_token_fb'];
// $access_token = $facebook_helper->getAccessToken();

// $_SESSION['access_token_fb'] = $access_token;

// $facebook->setDefaultAccessToken($_SESSION['access_token']);
 }
 else
 {
  $access_token = $facebook_helper->getAccessToken();

  $_SESSION['access_token_fb'] = $access_token;

  $facebook->setDefaultAccessToken($_SESSION['access_token_fb']);
 }

 $_SESSION['user_id'] = '';
 $_SESSION['user_name'] = '';
 $_SESSION['user_email_address'] = '';
 $_SESSION['user_image'] = '';

 $graph_response = $facebook->get("/me?fields=name,email", $access_token);

 $facebook_user_info = $graph_response->getGraphUser();

 if(!empty($facebook_user_info['id']))
 {
  $_SESSION['user_image'] = 'http://graph.facebook.com/'.$facebook_user_info['id'].'/picture';
 }

 if(!empty($facebook_user_info['name']))
 {
  $_SESSION['user_name'] = $facebook_user_info['name'];
 }

 if(!empty($facebook_user_info['email']))
 {
  $_SESSION['user_email_address'] = $facebook_user_info['email'];
 }
 $user_image = $_SESSION['user_image'];
 $user_name =$_SESSION['user_name'];
 $user_email = $_SESSION['user_email_address'];
 $qry ="insert tbimg(file) values('$user_image')";
 $res = mysqli_query($link,$qry);
 if(mysqli_affected_rows($link))
 {
    $qry1 ="select FileID from tbimg where File = '$user_image'";
    $res1 =mysqli_query($link,$qry1);
    $r1 =mysqli_fetch_array($res1);
    $fileid = $r1['FileID'];
    $name =explode(" ",$user_name);
    $firstname =$name[0];
    $lastname =$name[1];
    $qry2 ="insert tbform (Firstname,Lastname,Email,File) values('$firstname','$lastname','$user_email','$fileid')";
    $res2 =mysqli_query($link,$qry2);
    if(mysqli_affected_rows($link)==1)
    {
        header("location:login.php");
    }
 }
}
?>
<html>
 <head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <title>PHP Login using Google Account</title>
  <meta content='width=device-width, initial-scale=1, maximum-scale=1' name='viewport'/>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
  <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet" />
  
 </head>
 <body>
  <!-- <div class="container">
   <br />
   <h2 align="center">PHP Login using Google Account</h2>
   <br />
   <div class="panel panel-default">
   
   </div>
  </div> -->
 </body>
</html