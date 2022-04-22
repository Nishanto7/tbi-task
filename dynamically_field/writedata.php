<?php



$txt1 = $_POST['input1'];
$txt2 = $_POST['input2'];

$myfile ="demo.txt";

$data="\n
var input1_$txt1 = document.getElementById('$txt1').value;\n
var input2_$txt2 = document.getElementById('$txt2').value;\n

if(isEmptyOrSpaces(input1_$txt1))\n
{
    alert('pls fill the data');\n
    $('#$txt1').focus();\n
    return false;\n
}

if(isEmptyOrSpaces(input2_$txt2))\n
{\n
    alert('pls fill the data');\n
    $('#$txt2').focus();\n
    return false;\n
}\n
//==========================================================================================================\n
  ";


$ft= fopen($myfile,'a');
fwrite($ft,$data);
fclose($ft);


//read and write validation.js file from demo.txt
$readFileName = "demo.txt";
$f = fopen($readFileName,"r");
$read_data = fread($f,filesize($readFileName));

fclose($f);

#Create validation.js file
$myNewFile = "validation.js";
$fileMode = fopen($myNewFile,"w");
$fileData = $read_data."\n }";
fwrite($fileMode,$fileData);

fclose($fileMode);
?>