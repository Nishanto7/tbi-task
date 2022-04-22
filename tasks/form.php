<?php
if (isset($_POST["save"]))
{
$userans=$_POST["ans"];
$number1=$_REQUEST["no1"];
$number2=$_REQUEST["no2"];
$total=$number1+$number2;
if ($total==$userans)
{
    $name=$_POST["t1"];
    $last=$_POST["t2"];
    $eml=$_POST["t3"];
    $pwd=$_POST["t4"];
    $state=$_POST["state"];
    $cty=$_POST["city"];
    $game=$_POST["r1"];
    $interest=$_POST["chk"];
    echo"$name<br>";
    echo"$last<br>";
    echo"$eml<br>";
    echo"$pwd<br>";
    echo"$state<br>";
    echo"$cty<br>";
    echo"$game<br>";
    foreach($interest as $hobbie)
    {
    echo"$hobbie<br>";
    }
    $file_name=$_FILES['image']['name'];
    $file_size=$_FILES['image']['size'];
    $file_tmp=$_FILES['image']['tmp_name'];
    $file_type=$_FILES['image']['type'];
    $ext = pathinfo($file_name, PATHINFO_EXTENSION);

    $date=time();
    $filename=$date. '.' . $ext;
    $add="upload/".$filename;

    if(move_uploaded_file($file_tmp,$add))
    {
        echo '<img src="upload/'.$filename.'"><br>';
    
    }

    $n_width = '50'; // Fix the width of the thumb nail images
    $n_height= '50'; // Fix the height of the thumb nail imaage
    //function thumbnail($n_width,$n_height)
    
        $tsrc="thumbnail/".$GLOBALS['filename'].""; // Path where thumb nail image will be stored
        if (!($GLOBALS['file_type'] =="image/jpeg" OR $GLOBALS['file_type']=="image/png"))
        {
        echo "Your uploaded file must be of JPEG. Other file types are not allowed<BR>";
        exit;
        }
        if($GLOBALS['file_type']=="image/jpeg"){
            $im=ImageCreateFromJPEG($GLOBALS['add']);
            $width=ImageSx($im); // Original picture width is stored
            $height=ImageSy($im); // Original picture height is stored
            $n_height=($n_width/$width) * $height;
            $newimage=imagecreatetruecolor($n_width,$n_height);
            imageCopyResized($newimage,$im,0,0,0,0,$n_width,$n_height,$width,$height);
            ImageJpeg($newimage,$tsrc);
            chmod($tsrc,0777);
            echo'<img src="thumbnail/'.$GLOBALS['filename'].'"><br>';
        }
        if($GLOBALS['file_type']=="image/png"){
            $im=ImageCreateFromPNG($GLOBALS['add']); 
            $width=ImageSx($im);              // Original picture width is stored
            $height=ImageSy($im);             // Original picture height is stored
            // Add this line to maintain aspect ratio
            $n_height=($n_width/$width) * $height; 
            $newimage=imagecreatetruecolor($n_width,$n_height);                 
            imageCopyResized($newimage,$im,0,0,0,0,$n_width,$n_height,$width,$height);
            Imagepng($newimage,$tsrc);
            chmod("$tsrc",0777);
            echo'<img src="thumbnail/'.$GLOBALS['filename'].'"><br>';
        }
            
    // thumbnail(50,50);
    // thumbnail(100,100);
    // thumbnail(150,150);
    // thumbnail(200,200);
    $n_width = '100'; // Fix the width of the thumb nail images
    $n_height= '100'; // Fix the height of the thumb nail imaage
    
        $tsrc="thumbnail2/".$GLOBALS['filename'].""; // Path where thumb nail image will be stored
        if (!($GLOBALS['file_type'] =="image/jpeg" OR $GLOBALS['file_type']=="image/png"))
        {
        echo "Your uploaded file must be of JPEG. Other file types are not allowed<BR>";
        exit;
        }
        if($GLOBALS['file_type']=="image/jpeg"){
            $im=ImageCreateFromJPEG($GLOBALS['add']);
            $width=ImageSx($im); // Original picture width is stored
            $height=ImageSy($im); // Original picture height is stored
            $n_height=($n_width/$width) * $height;
            $newimage=imagecreatetruecolor($n_width,$n_height);
            imageCopyResized($newimage,$im,0,0,0,0,$n_width,$n_height,$width,$height);
            ImageJpeg($newimage,$tsrc);
            chmod($tsrc,0777);
            echo'<img src="thumbnail2/'.$GLOBALS['filename'].'"><br>';
        }
        if($GLOBALS['file_type']=="image/png"){
            $im=ImageCreateFromPNG($GLOBALS['add']); 
            $width=ImageSx($im);              // Original picture width is stored
            $height=ImageSy($im);             // Original picture height is stored
            // Add this line to maintain aspect ratio
            $n_height=($n_width/$width) * $height; 
            $newimage=imagecreatetruecolor($n_width,$n_height);                 
            imageCopyResized($newimage,$im,0,0,0,0,$n_width,$n_height,$width,$height);
            Imagepng($newimage,$tsrc);
            chmod("$tsrc",0777);
            echo'<img src="thumbnail2/'.$GLOBALS['filename'].'"><br>';
        }

        $n_width = '150'; // Fix the width of the thumb nail images
        $n_height= '150'; // Fix the height of the thumb nail imaage
        //function thumbnail($n_width,$n_height)
        
            $tsrc="thumbnail3/".$GLOBALS['filename'].""; // Path where thumb nail image will be stored
            if (!($GLOBALS['file_type'] =="image/jpeg" OR $GLOBALS['file_type']=="image/png"))
            {
            echo "Your uploaded file must be of JPEG. Other file types are not allowed<BR>";
            exit;
            }
            if($GLOBALS['file_type']=="image/jpeg"){
                $im=ImageCreateFromJPEG($GLOBALS['add']);
                $width=ImageSx($im); // Original picture width is stored
                $height=ImageSy($im); // Original picture height is stored
                $n_height=($n_width/$width) * $height;
                $newimage=imagecreatetruecolor($n_width,$n_height);
                imageCopyResized($newimage,$im,0,0,0,0,$n_width,$n_height,$width,$height);
                ImageJpeg($newimage,$tsrc);
                chmod($tsrc,0777);
                echo'<img src="thumbnail3/'.$GLOBALS['filename'].'"><br>';
            }
            if($GLOBALS['file_type']=="image/png"){
                $im=ImageCreateFromPNG($GLOBALS['add']); 
                $width=ImageSx($im);              // Original picture width is stored
                $height=ImageSy($im);             // Original picture height is stored
                // Add this line to maintain aspect ratio
                $n_height=($n_width/$width) * $height; 
                $newimage=imagecreatetruecolor($n_width,$n_height);                 
                imageCopyResized($newimage,$im,0,0,0,0,$n_width,$n_height,$width,$height);
                Imagepng($newimage,$tsrc);
                chmod("$tsrc",0777);
                echo'<img src="thumbnail3/'.$GLOBALS['filename'].'"><br>';
            }
                
            $n_width = '200'; // Fix the width of the thumb nail images
            $n_height= '200'; // Fix the height of the thumb nail imaage
            //function thumbnail($n_width,$n_height)
            
                $tsrc="thumbnail4/".$GLOBALS['filename'].""; // Path where thumb nail image will be stored
                if (!($GLOBALS['file_type'] =="image/jpeg" OR $GLOBALS['file_type']=="image/png"))
                {
                echo "Your uploaded file must be of JPEG. Other file types are not allowed<BR>";
                exit;
                }
                if($GLOBALS['file_type']=="image/jpeg"){
                    $im=ImageCreateFromJPEG($GLOBALS['add']);
                    $width=ImageSx($im); // Original picture width is stored
                    $height=ImageSy($im); // Original picture height is stored
                    $n_height=($n_width/$width) * $height;
                    $newimage=imagecreatetruecolor($n_width,$n_height);
                    imageCopyResized($newimage,$im,0,0,0,0,$n_width,$n_height,$width,$height);
                    ImageJpeg($newimage,$tsrc);
                    chmod($tsrc,0777);
                    echo'<img src="thumbnail4/'.$GLOBALS['filename'].'"><br>';
                }
                if($GLOBALS['file_type']=="image/png"){
                    $im=ImageCreateFromPNG($GLOBALS['add']); 
                    $width=ImageSx($im);              // Original picture width is stored
                    $height=ImageSy($im);             // Original picture height is stored
                    // Add this line to maintain aspect ratio
                    $n_height=($n_width/$width) * $height; 
                    $newimage=imagecreatetruecolor($n_width,$n_height);                 
                    imageCopyResized($newimage,$im,0,0,0,0,$n_width,$n_height,$width,$height);
                    Imagepng($newimage,$tsrc);
                    chmod("$tsrc",0777);
                    echo'<img src="thumbnail4/'.$GLOBALS['filename'].'"><br>';
                }
                      
                 
}else
{
    $name=$_POST["t1"];
    $last=$_POST["t2"];
    $eml=$_POST["t3"];
    $pwd=$_POST["t4"];
    $state=$_POST["state"];
    $cty=$_POST["city"];
    $game=$_POST["r1"];
    $interest=$_POST["chk"];
    $file_name=$_FILES['image']['name'];
   echo "wrong captcha entered!";
}
}
?>

<html>
<head></head>
<body>
    <form name="details" action="form.php" method="post"  enctype="multipart/form-data">
<table>
<tr>
    <td>Name:</td>
    <td><input type="text" name="t1" value="<?php echo $name; ?>"></td>
</tr>
<tr>
    <td>Last Name:</td>
    <td><input type="text" name="t2" value="<?php echo $last; ?>"></td>
</tr>
<tr>
    <td>Email:</td>
    <td><input type="text" name="t3" value="<?php echo $eml; ?>"></td>
</tr>
<tr>
    <td>Password:</td>
    <td><input type="password" name="t4" value="<?php echo $pwd; ?>"></td>
</tr>
<tr>
    <td>state:</td>
    <td>
        <select name="state">
        <option value="-1">select state</option> 
           <option value="punjab" <?php if($state=="punjab") echo "selected"; ?>>punjab</option>
           <option value="haryana" <?php if($state=="haryana") echo"selected";?> >haryana</option>
           <option value="himachal" <?php if($state=="himachal") echo"selected"; ?>>himachal</option>
        </select>
</td>
</tr>
<tr>
    <td>City:</td>
    <td>
        <select name="city">
        <option value="-1">select city</option>
        <option value="chandigarh" <?php if($cty=="chandigarh") echo"selected"; ?>>chandigarh</option>
           <option value="mohali" <?php if($cty=="mohali") echo"selected"; ?>>mohali</option>
           <option value="punchkula" <?php if($cty=="punchkula") echo"selected"; ?>>punchkula</option>
        </select>
</td>
</tr>
<tr>
<td>Games</td>
<td>
    <input type="radio" name="r1" value="cricket" <?php if($game=="cricket") echo "checked='true'";?> >cricket
    <input type="radio" name="r1" value="football" <?php if($game=="football") echo "checked='true'";?>>football
    <input type="radio" name="r1" value="volleyball" <?php if($game=="volleyball") echo"checked='true'"; ?>>volleyball
    <input type="radio" name="r1" value="hockey" <?php if($game=="hockey") echo"checked='true'"; ?>>hockey
</td>
</tr>
<tr>
<td>Interest</td>
<td>
    <input type="checkbox" name="chk[]" value="web shows" <?php if (in_array("web shows",$interest)) echo "checked='checked'";?>>web shows
    <input type="checkbox" name="chk[]" value="hiking" <?php if(in_array("hiking",$interest)) echo "checked='checked'"; ?>>hiking
    <input type="checkbox" name="chk[]" value="reading" <?php if(in_array("reading",$interest)) echo "checked='checked'"; ?>>reading
    <input type="checkbox" name="chk[]" value="touring" <?php if(in_array("touring",$interest)) echo "checked='checked'"; ?>>touring
</td>
</tr>
<tr>
    <td>select file</td>
    <td><input type="file" name="image" ></td>
</tr>
</table>
prove that you are a human :
    <?php
    $no1=rand(1,9);
    $no2=rand(1,9);
    echo $no1."+". $no2;
    ?>
    <input type="hidden" name="no1" value="<?php echo $no1 ?>">
    <input type="hidden" name="no2" value="<?php echo $no2 ?>">
    <input type="text" name="ans"><br>
    <input type="submit" name="save" value="submit">
</form>
</body>
</html>