<?php
session_start();
$confirmpassword=$_SESSION["confirmpassword"];
echo"<b>Confirm Password</b>:$confirmpassword";
?>