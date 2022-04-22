<?php
$result = array();

$files = scandir('upload');

$output = '<div class="row">';

if(false !== $files)
{
 foreach($files as $file)
 {
  if('.' !=  $file && '..' != $file)
  {
   $output .= '
   <div class="col-md-2">
    <img src="upload/'.$file.'" class="img-thumbnail" width="175" height="175" style="height:175px;" />
   </div>
   ';
  }
 }
}
$output .= '</div>';
echo $output;
?>