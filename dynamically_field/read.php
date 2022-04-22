<?php
$readFileName = "demo.txt";
$f = fopen($readFileName,"r");
$read_data = fread($f,filesize($readFileName));
echo "$read_data";
fclose($f);

?>