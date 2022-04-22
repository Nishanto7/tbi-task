<?php
session_start();
$games=$_SESSION["games"];
echo"<b>Games:</b>";
foreach($games as $val){
 echo"$val"." ";
}
?>