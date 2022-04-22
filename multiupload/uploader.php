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
    $break=explode(".",$filename);
    // echo"$break[0]<br>";
    // echo"$break[1]<br>";
    // $timefile=$break[0].$time;
    // echo"$datefile";
    $file=$time.".".$break[1];
    // echo"$file";
    // $file="$date"."-"."$filename.";
    // $filepath="file/"."$filename";
    $file_tmp=$_FILES["img"."$i"]['tmp_name'];
    if(move_uploaded_file($file_tmp,'file/'.$file)){
        echo'<img src="file/'.$file.'"/><br>';
    }
    else{
        echo"File Not Uploaded<br>";
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