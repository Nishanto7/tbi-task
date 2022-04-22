<?php
session_start();
$upload=$_SESSION["uplodedFile"];
$name=$_SESSION['filename'];
echo'<b>File Uploaded:</b><img src="file/'.$name.'"/>';
?>