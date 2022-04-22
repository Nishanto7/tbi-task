<?php
session_start();
$email=$_SESSION["email"];
echo"<b>Email</b>:$email";
?>