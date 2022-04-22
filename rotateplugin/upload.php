<?php
$fileData = '';
if(isset($_FILES['file']['name'][0]))
{
  foreach($_FILES['file']['name'] as $keys => $values)
  {
    $fileName = $_FILES['file']['name'][$keys];
    if(move_uploaded_file($_FILES['file']['tmp_name'][$keys], 'uploads/' . $values))
    {
      $fileData .= '<img src="uploads/'.$values.'" class="thumbnail" />';
    }
  }
}
echo $fileData;
?>