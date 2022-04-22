<?php
if(isset($_POST['b1']))
{
    for($i=1;$i<6;$i++)
    {
    $time=time();
    $filename=$_FILES["img"."$i"]['name'];
    $type=$_FILES["img"."$i"]['type'];
    $break=explode(".",$filename);
    // echo"$break[0]<br>";
    // echo"$break[1]<br>";
    // $timefile=$break[0].$time;
    // echo"$datefile";
    $timename=$time.".".$break[1];
    $file=$break[0]."_"."$timename";
    // echo"$file";
    // echo"$file";
    // $file="$date"."-"."$filename.";
    // $filepath="file/"."$filename";
    $path="file/".$file;
    $file_tmp=$_FILES["img"."$i"]['tmp_name'];
    if(move_uploaded_file($file_tmp,'file/'.$file)){
        echo"<br>";
        echo'<img src="file/'.$file.'"/><br>'; 

    }
    else{
        echo"File Not Uploaded<br>";
    }
    thumbprint(50,50);
    thumbprint(100,100);
    thumbprint(150,150);
    }
}
///////// Start the thumbnail generation////////////// 
function thumbprint($n_width,$n_height){
    if($n_width==50 && $n_height==50){   
    $tsrc="thumbnail/".$GLOBALS['file'];   // Path where thumb nail image will be stored
    if($GLOBALS['type']=="image/gif")
    {
    $im=ImageCreateFromGIF($GLOBALS['path']);
    $width=ImageSx($im);          // Original picture width is stored
    $height=ImageSy($im);        // Original picture height is stored
    $n_height=($n_width/$width) * $height; // Add this line to maintain aspect ratio
    $newimage=imagecreatetruecolor($n_width,$n_height);
    imageCopyResized($newimage,$im,0,0,0,0,$n_width,$n_height,$width,$height);
    if (function_exists("imagegif")) {
    Header("Content-type: image/gif");
    ImageGIF($newimage,$tsrc);
    }
    elseif (function_exists("imagejpeg")) {
    Header("Content-type: image/jpeg");
    ImageJPEG($newimage,$tsrc);
    }
    chmod("$tsrc",0777);
    echo'<img src="thumbnail/'.$GLOBALS['file'].'"/>';
    }////////// end of gif file thumb nail creation/////

    ////////////// starting of JPG thumb nail creation////
    if($GLOBALS['type']=="image/jpeg"){
    $im=ImageCreateFromJPEG($GLOBALS['path']); 
    $width=ImageSx($im);              // Original picture width is stored
    $height=ImageSy($im);             // Original picture height is stored
    // Add this line to maintain aspect ratio
    $n_height=($n_width/$width) * $height; 
    $newimage=imagecreatetruecolor($n_width,$n_height);                 
    imageCopyResized($newimage,$im,0,0,0,0,$n_width,$n_height,$width,$height);
    ImageJpeg($newimage,$tsrc);
    chmod("$tsrc",0777);
    echo'<img src="thumbnail/'.$GLOBALS['file'].'"/>';
    }
    if($GLOBALS['type']=="image/png"){
        $im=ImageCreateFromPNG($GLOBALS['path']); 
        $width=ImageSx($im);              // Original picture width is stored
        $height=ImageSy($im);             // Original picture height is stored
        // Add this line to maintain aspect ratio
        $n_height=($n_width/$width) * $height; 
        $newimage=imagecreatetruecolor($n_width,$n_height);                 
        imageCopyResized($newimage,$im,0,0,0,0,$n_width,$n_height,$width,$height);
        ImageJpeg($newimage,$tsrc);
        chmod("$tsrc",0777);
        echo'<img src="thumbnail/'.$GLOBALS['file'].'"/>';
        }
    }
    //For 100
    if($n_width==100 || $n_height==100){   
        $tsrc="thumbnail_100/".$GLOBALS['file'];   // Path where thumb nail image will be stored
        if($GLOBALS['type']=="image/gif")
        {
        $im=ImageCreateFromGIF($GLOBALS['path']);
        $width=ImageSx($im);          // Original picture width is stored
        $height=ImageSy($im);        // Original picture height is stored
        $n_height=($n_width/$width) * $height; // Add this line to maintain aspect ratio
        $newimage=imagecreatetruecolor($n_width,$n_height);
        imageCopyResized($newimage,$im,0,0,0,0,$n_width,$n_height,$width,$height);
        if (function_exists("imagegif")) {
        Header("Content-type: image/gif");
        ImageGIF($newimage,$tsrc);
        }
        elseif (function_exists("imagejpeg")) {
        Header("Content-type: image/jpeg");
        ImageJPEG($newimage,$tsrc);
        }
        chmod("$tsrc",0777);
        echo'<img src="thumbnail_100/'.$GLOBALS['file'].'"/>';
        }////////// end of gif file thumb nail creation/////
    
        ////////////// starting of JPG thumb nail creation////
        if($GLOBALS['type']=="image/jpeg"){
        $im=ImageCreateFromJPEG($GLOBALS['path']); 
        $width=ImageSx($im);              // Original picture width is stored
        $height=ImageSy($im);             // Original picture height is stored
        // Add this line to maintain aspect ratio
        $n_height=($n_width/$width) * $height; 
        $newimage=imagecreatetruecolor($n_width,$n_height);                 
        imageCopyResized($newimage,$im,0,0,0,0,$n_width,$n_height,$width,$height);
        ImageJpeg($newimage,$tsrc);
        chmod("$tsrc",0777);
        echo'<img src="thumbnail_100/'.$GLOBALS['file'].'"/>';
        }
        if($GLOBALS['type']=="image/png"){
            $im=ImageCreateFromPNG($GLOBALS['path']); 
            $width=ImageSx($im);              // Original picture width is stored
            $height=ImageSy($im);             // Original picture height is stored
            // Add this line to maintain aspect ratio
            $n_height=($n_width/$width) * $height; 
            $newimage=imagecreatetruecolor($n_width,$n_height);                 
            imageCopyResized($newimage,$im,0,0,0,0,$n_width,$n_height,$width,$height);
            ImageJpeg($newimage,$tsrc);
            chmod("$tsrc",0777);
            echo'<img src="thumbnail_100/'.$GLOBALS['file'].'"/>';
            }
        }
        //for 150
        if($n_width==150 || $n_height==150){   
            $tsrc="thumbnail_150/".$GLOBALS['file'];   // Path where thumb nail image will be stored
            if($GLOBALS['type']=="image/gif")
            {
            $im=ImageCreateFromGIF($GLOBALS['path']);
            $width=ImageSx($im);          // Original picture width is stored
            $height=ImageSy($im);        // Original picture height is stored
            $n_height=($n_width/$width) * $height; // Add this line to maintain aspect ratio
            $newimage=imagecreatetruecolor($n_width,$n_height);
            imageCopyResized($newimage,$im,0,0,0,0,$n_width,$n_height,$width,$height);
            if (function_exists("imagegif")) {
            Header("Content-type: image/gif");
            ImageGIF($newimage,$tsrc);
            }
            elseif (function_exists("imagejpeg")) {
            Header("Content-type: image/jpeg");
            ImageJPEG($newimage,$tsrc);
            }
            chmod("$tsrc",0777);
            echo'<img src="thumbnail_150/'.$GLOBALS['file'].'"/>';
            }////////// end of gif file thumb nail creation/////
        
            ////////////// starting of JPG thumb nail creation////
            if($GLOBALS['type']=="image/jpeg"){
            $im=ImageCreateFromJPEG($GLOBALS['path']); 
            $width=ImageSx($im);              // Original picture width is stored
            $height=ImageSy($im);             // Original picture height is stored
            // Add this line to maintain aspect ratio
            $n_height=($n_width/$width) * $height; 
            $newimage=imagecreatetruecolor($n_width,$n_height);                 
            imageCopyResized($newimage,$im,0,0,0,0,$n_width,$n_height,$width,$height);
            ImageJpeg($newimage,$tsrc);
            chmod("$tsrc",0777);
            echo'<img src="thumbnail_150/'.$GLOBALS['file'].'"/>';
            }
            if($GLOBALS['type']=="image/png"){
                $im=ImageCreateFromPNG($GLOBALS['path']); 
                $width=ImageSx($im);              // Original picture width is stored
                $height=ImageSy($im);             // Original picture height is stored
                // Add this line to maintain aspect ratio
                $n_height=($n_width/$width) * $height; 
                $newimage=imagecreatetruecolor($n_width,$n_height);                 
                imageCopyResized($newimage,$im,0,0,0,0,$n_width,$n_height,$width,$height);
                ImageJpeg($newimage,$tsrc);
                chmod("$tsrc",0777);
                echo'<img src="thumbnail_150/'.$GLOBALS['file'].'"/>';
                }
            }
        }    
    ?>
<!DOCTYPE html>
<html>
    <head>
    </head>
    <body>
        <form name="upload" action="uploader.php" method="post" enctype="multipart/form-data">
        <!-- <input type="file" name="img1"/><br>
        <input type="file" name="img2"/><br>
        <input type="file" name="img3"/><br>
        <input type="file" name="img4"/><br>
        <input type="file" name="img5"/><br> -->
        <?php
            for($i=1;$i<6;$i++)
            {
                echo'<input type="file" name="img'.$i.'"/>';
            }
           echo "<input type='submit' name='b1'/>";
        ?>    
        </form>
    </body>
</html>