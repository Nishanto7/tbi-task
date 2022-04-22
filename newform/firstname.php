<?php
session_start();
$firstname=$_SESSION["firstname"];
echo"<b>Firstname</b>:$firstname";
?>