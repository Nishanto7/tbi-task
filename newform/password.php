<?php
session_start();
$password=$_SESSION["password"];
echo"<b>Password</b>:$password";
?>