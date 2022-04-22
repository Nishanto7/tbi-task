<?php
session_start();
$filename=$_SESSION['filename'];
echo'<img src="upload/'.$filename.'"/>';
// echo"$filename";
?>