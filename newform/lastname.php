<?php
session_start();
$lastname=$_SESSION["lastname"];
echo"<b>Lastname</b>:$lastname";
?>