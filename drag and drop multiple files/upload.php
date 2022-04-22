<?php
//upload.php
$folder_name = 'upload/';
if(!empty($_FILES))
{
 $filename=$_FILES['file']['name'];
 $filetype= $_FILES['file']['type'];   
 $temp_file = $_FILES['file']['tmp_name'];
 $location = "upload/". $_FILES['file']['name'];
 $allowFiles = array('image/png', 'imag/jpeg', 'image/jpg', 'image/gif');
 if(in_array($fileType, $allowFiles))
 {
    $rotation = $_POST['rotation'];
    echo"$rotation";
    if($rotation == -90 || $rotation == 270) 
    {
        $rotation = 90;
    }elseif($rotation == -180 || $rotation == 180){
        $rotation = 180;
    }elseif($rotation == -270 || $rotation == 90){
        $rotation = 270;
    }
    if(!empty($rotation))
    {
        switch($filetype)
        {
            case 'image/png':
                $source = imagecreatefrompng($temp_file);
                break;
            case 'image/gif':
                $source = imagecreatefromgif($temp_file);
                break;
            default:
                $source = imagecreatefromjpeg($temp_file);
        }
        $fileRotated = imagerotate($source, $rotation, 0);
        switch($filetype)
        {
            case 'image/png':
                $upload = imagepng($fileRotated, $location);
                break;
            case 'image/gif':
                $upload = imagegif($fileRotated, $location);
                break;
            default:
                $upload = imagejpeg($fileRotated, $location);
        }
    }elseif(move_uploaded_file($upload,$location)){
    
    }else{
        $statusMsg = "File uploaded failed";
    }
 }else{
     $statusMsg = "This is not image type file";
 }
}else{
    $statusMsg = "Please select a image to upload.";
} 


// if(isset($_POST["name"]))
// {
//  $filename = $folder_name.$_POST["name"];
//  unlink($filename);
// }
?>