<?php
	
      if(!empty($_))
      $filename = $_FILES['file']['name'];
      $fileTemp = $_FILES['file']['tmp_name'];
      $fileType = $_FILES['file']['type'];
      $filePath="uploads/".basename($filename);
      $rotation = $_POST['rotation']; 
      // echo"$rotation";
      // echo"$fileTemp";
      // echo"$filename";
      // echo"$fileType";
      if($rotation == -90 || $rotation == 270){ 
          $rotation = 90; 
      }elseif($rotation == -180 || $rotation == 180){ 
          $rotation = 180; 
      }elseif($rotation == -270 || $rotation == 90){ 
          $rotation = 270; 
      } 
      // echo"$rotation";
      if($rotation!=null){ 
        switch($fileType){ 
            case 'image/png': 
                $source = imagecreatefrompng($fileTemp); 
                break; 
            case 'image/gif': 
                $source = imagecreatefromgif($fileTemp); 
                break; 
            default: 
                $source = imagecreatefromjpeg($fileTemp); 
        } 
        $imageRotate = imagerotate($source, $rotation, 0); 
         
        switch($fileType){ 
            case 'image/png': 
                $upload = imagepng($imageRotate, $filePath); 
                break; 
            case 'image/gif': 
                $upload = imagegif($imageRotate, $filePath); 
                break; 
            default: 
                $upload = imagejpeg($imageRotate, $filePath); 
        } 
      
      // Upload images
      if(move_uploaded_file($upload,$filePath))
      {
          $upload=1;
      }
      if($upload==1){
        echo'<img src="uploads/'.$filename.'" height="100px" width="100px" /><br>';
      }
        else{
          echo"Image not Uploaded";
      }
      
    }
  }
}
?>