<?php
//if(isset($_POST['b1']))
//{
// $filename1=$_FILES['img1']['name'];
// $file_tmp1=$_FILES['img1']['tmp_name'];
// if(move_uploaded_file($file_tmp1,'file/'.$filename1))
// {
//     echo'<img src="file/'.$filename1.'">';
// }
// else{
//     echo"Not uploaded";
// }
// $filename2=$_FILES['img2']['name'];
// $file_tmp2=$_FILES['img2']['tmp_name'];
// if(move_uploaded_file($file_tmp2,'file/'.$filename2))
// {
//     echo"done";
// }
// else{
//     echo"Not uploaded";
// }
// $filename3=$_FILES['img3']['name'];
// $file_tmp3=$_FILES['img3']['tmp_name'];
// if(move_uploaded_file($file_tmp3,'file/'.$filename3))
// {
//     echo"done";
// }
// else{
//     echo"Not uploaded";
// }
// $filename4=$_FILES['img4']['name'];
// $file_tmp4=$_FILES['img4']['tmp_name'];
// if(move_uploaded_file($file_tmp4,'file/'.$filename4))
// {
//     echo"done";
// }
// else{
//     echo"Not uploaded";
// }
// $filename5=$_FILES['img5']['name'];
// $file_tmp5=$_FILES['img5']['tmp_name'];
// if(move_uploaded_file($file_tmp5,'file/'.$filename5))
// {
//     echo"done";
// }
// else{
//     echo"Not uploaded";
// }
// $filename="filename";
// for($i=1;$i<6;$i++)
// {
//     "$filename".$i=$_FILES["img"."$i"]["name"];
//     "$file_tmp".$i=$_FILES["img"."$i"]["tmp_name"];
//     if(move_uploaded_file("$_file_tmp"."$i",'file/'."$filename"."$i"))
//     {
//         echo"uploaded";
//     }
//     else{
//         echo"not uploaded";
//     }
// }
// $filename=$_FILES['img']['name'];
// $file_tmp=$_FILES['img']['tmp_name'];
// if(move_uploaded_file($file_tmp,'file/'.$filename))
// {
//     echo'<img src="file/"'.$filename.'">';
// }
// else{
//     echo"not uploaded";
// }
// }
if(isset($_POST['b1']))
{
    for($i=1;$i<6;$i++)
    {
    $time=time();
    $filename=$_FILES["img"."$i"]['name'];
    $type=$_FILES["img"."$i"]['type'];
    // echo"$type";
    $break=explode(".",$filename);
    // echo"$break[0]<br>";
    // echo"$break[1]<br>";
    // $timefile=$break[0].$time;
    // echo"$datefile";
    $file=$time.".".$break[1];
    // echo"$file";
    // $file="$date"."-"."$filename.";
    // $filepath="file/"."$filename";
    $path="file/".$file;
    $file_tmp=$_FILES["img"."$i"]['tmp_name'];
    if(move_uploaded_file($file_tmp,'file/'.$file)){
        echo'<img src="file/'.$file.'"/><br>';
    }
    else{
        echo"File Not Uploaded<br>";
    }
    ///////// Start the thumbnail generation//////////////
//     $n_width=100;    // Fix the width of the thumb nail images
//     $n_height=100;   // Fix the height of the thumb nail imaage

//     $tsrc="thumbnail/".$file;   // Path where thumb nail image will be stored
// //echo $tsrc;
//     // if (!($type=="image/jpeg" OR $type=="image/gif" OR $type=="image/png")){
//     // echo "Your uploaded file must be of JPG or GIF Or PNG. Other file types are not allowed<BR>";
//     // exit;
//     // }
//     if($type=="image/gif")
//     {
//     $im=ImageCreateFromGIF($path);
//     $width=ImageSx($im);          // Original picture width is stored
//     $height=ImageSy($im);        // Original picture height is stored
//     $n_height=($n_width/$width) * $height; // Add this line to maintain aspect ratio
//     $newimage=imagecreatetruecolor($n_width,$n_height);
//     imageCopyResized($newimage,$im,0,0,0,0,$n_width,$n_height,$width,$height);
//     if (function_exists("imagegif")) {
//     Header("Content-type: image/gif");
//     ImageGIF($newimage,$tsrc);
//     }
//     elseif (function_exists("imagejpeg")) {
//     Header("Content-type: image/jpeg");
//     ImageJPEG($newimage,$tsrc);
//     }
//     chmod("$tsrc",0777);
//     echo'<img src="thumbnail/'.$file.'">';
//     }////////// end of gif file thumb nail creation/////

//     ////////////// starting of JPG thumb nail creation////
//     if($type=="image/jpeg"){
//     $im=ImageCreateFromJPEG($path); 
//     $width=ImageSx($im);              // Original picture width is stored
//     $height=ImageSy($im);             // Original picture height is stored
//     // Add this line to maintain aspect ratio
//     $n_height=($n_width/$width) * $height; 
//     $newimage=imagecreatetruecolor($n_width,$n_height);                 
//     imageCopyResized($newimage,$im,0,0,0,0,$n_width,$n_height,$width,$height);
//     ImageJpeg($newimage,$tsrc);
//     chmod("$tsrc",0777);
//     echo'<img src="thumbnail/'.$file.'">';
//     }
//     ////////png///////
//     if($type=="image/png"){
//         $im=imagecreatefrompng($path); 
//         $width=ImageSx($im);              // Original picture width is stored
//         $height=ImageSy($im);             // Original picture height is stored
//         // Add this line to maintain aspect ratio
//         $n_height=($n_width/$width) * $height; 
//         $newimage=imagecreatetruecolor($n_width,$n_height);                 
//         imageCopyResized($newimage,$im,0,0,0,0,$n_width,$n_height,$width,$height);
//         ImageJpeg($newimage,$tsrc);
//         chmod("$tsrc",0777);
//         echo'<img src="thumbnail/'.$file.'">';
//     }
    
    function thumbNail_img($n_width,$n_height){
       if($n_height==50 || $n_width==50){ 
        $tsrc="thumbnail/".$GLOBALS['file'];  // Path where thumb nail image will be stored
        } 
        if($n_height==100 || $n_width==100)
        {
            $tsrc="thumbnail100/".$GLOBALS['file'];    
        }
        if($n_height==150 || $n_width==150)
        {
            $tsrc="thumbnail150/".$GLOBALS['file'];    
        }
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
    if($n_height==50 || $n_width==50){ 
    echo'<img src="thumbnail/'.$GLOBALS['file'].'<br>">';
    }
    if($n_height==100 || $n_width==100){ 
        echo'<img src="thumbnail100/'.$GLOBALS['file'].'<br>">';    
    }
    if($n_height==150 || $n_width==150){ 
        echo'<img src="thumbnail150/'.$GLOBALS['file'].'<br>">';    
    }
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
    if($n_height=='50' || $n_width==50){ 
        echo'<img src="thumbnail/'.$GLOBALS['file'].'<br>">';
        }
        if($n_height==100 || $n_width==100){ 
            echo'<img src="thumbnail100/'.$GLOBALS['file'].'<br>">';    
        }
        if($n_height==150 || $n_width==150){ 
            echo'<img src="thumbnail150/'.$GLOBALS['file'].'<br>">';    
        }
    }
    ////////png///////
    if($GLOBALS['type']=="image/png"){
        $im=imagecreatefrompng($GLOBALS['path']); 
        $width=ImageSx($im);              // Original picture width is stored
        $height=ImageSy($im);             // Original picture height is stored
        // Add this line to maintain aspect ratio
        $n_height=($n_width/$width) * $height; 
        $newimage=imagecreatetruecolor($n_width,$n_height);                 
        imageCopyResized($newimage,$im,0,0,0,0,$n_width,$n_height,$width,$height);
        ImageJpeg($newimage,$tsrc);
        chmod("$tsrc",0777);
       if($n_height==50 || $n_width==50){ 
    echo'<img src="thumbnail/'.$GLOBALS['file'].'<br>">';
    }
    if($n_height==100 || $n_width==100){ 
        echo'<img src="thumbnail100/'.$GLOBALS['file'].'<br>">';    
    }
    if($n_height==150 || $n_width==150){ 
        echo'<img src="thumbnail150/'.$GLOBALS['file'].'<br>">';    
    }
    }
    } 
}
thumbNail_img(50,50);
thumbNail_img(150,150); 
thumbNail_img(100,100); 
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