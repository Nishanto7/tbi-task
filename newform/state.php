<?php
session_start();
$state=$_SESSION["state"];
echo"<b>State: </b>$state";
?>