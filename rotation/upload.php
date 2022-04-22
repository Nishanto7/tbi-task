<?php
session_start();
//upload.php
$folder_name = 'uploads/';
if(!empty($_FILES))
{
 $filename=$_FILES['file']['name'];
 $temp_file = $_FILES['file']['tmp_name'];
 $filetype= $_FILES['file']['type'];
 $location = "uploads/".basename( $_FILES['file']['name']);
 $_SESSION['files']=$filename;
 $rotation=$_POST['rotation'];
 if($rotation != null)
 {
     switch($filetype)
     {
         case'image/png':
            $source = imagecreatefrompng($temp_file);
            break;
            case'image/jpeg':
                $source= imagecreatefromjpeg($temp_file);
                break;                    
         default :
         $source = imagecreatefromgif($temp_file);
      }
      $imagerotate = imagerotate($source,$rotation,0);
      switch($filetype){
          case'image/png':
            $upload = imagepng($imagerotate,$location);
            break;
            case'image/jpeg':
                $upload = imagejpeg($imagerotate,$location);
                echo"<img src='$upload'/>";
                break;
                default :
                $upload = imagegif($imagerotate,$location);
      }
 }
 move_uploaded_file($upload, $location);
}

?>