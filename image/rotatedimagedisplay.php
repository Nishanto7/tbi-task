<?php

$result = array();
$files = scandir('uploads');
$output = "<div class='row'>";
if(false !== $files)
{
    foreach($files as $file)
    {
        if('.' != $file && '..' != $file)
        {
            
            print_r("<img src='uploads/''.$file.' height='100px' width='100px'>");
            
        }
    }
}
$output .= "</div>";
echo $output;

?>