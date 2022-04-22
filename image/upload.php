<?php  
$uploadDir = 'uploads/'; 
$statusMsg = '';
$upload = 0;
if (!empty($_FILES['file']['name'])) {
 $fileName = $_FILES['file']['name'];
 $fileType = $_FILES['file']['type']; 
 $tmpFile = $_FILES['file']['tmp_name'];  
 $fileNewName = $uploadDir.time().'-'. $_FILES['file']['name'];
 
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
        switch($fileType)
        {
            case 'image/png':
                $source = imagecreatefrompng($tmpFile);
                break;
            case 'image/gif':
                $source = imagecreatefromgif($tmpFile);
                break;
            default:
                $source = imagecreatefromjpeg($tmpFile);
        }
        $fileRotated = imagerotate($source, $rotation, 0);
        switch($fileType)
        {
            case 'image/png':
                $upload = imagepng($fileRotated, $fileNewName);
                break;
            case 'image/gif':
                $upload = imagegif($fileRotated, $fileNewName);
                break;
            default:
                $upload = imagejpeg($fileRotated, $fileNewName);
        }
    }elseif(move_uploaded_file($upload,$fileName)){
        echo'<img src="uploads/"'.$fileName.'/>';
    }else{
        $statusMsg = "File uploaded failed";
    }
 }else{
     $statusMsg = "This is not image type file";
 }
}else{
    $statusMsg = "Please select a image to upload.";
} 
?>  