<?php
session_start();
$country=$_SESSION["country"];
echo"<b>Country:</b>$country";
?>