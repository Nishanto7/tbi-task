<?php
session_start();
$fileErr="";
if(!isset($_SESSION['firstname']))
{
    header("location:first.php");
}
if(!isset($_SESSION['lastname']))
{
    header("location:lastname.php");
}
if(!isset($_SESSION['email']))
{
    header("location:email.php");
}
if(!isset($_SESSION['password']))
{
    header("location:password.php");
}
if(!isset($_SESSION['confirmpassword']))
{
    header("location:confirm.php");
}
if(!isset($_SESSION['country']) || $_SESSION['country']==-1)
{
    header("location:country.php");
}
if(!isset($_SESSION['state']) || $_SESSION['state']==-1)
{
    header("location:state.php");
}
if(!isset($_SESSION['city']) || $_SESSION['city']==-1)
{
    header("location:city.php");
}
if(!isset($_SESSION['gender']))
{
    header("location:gender.php");
}
if(!isset($_SESSION['games']))
{
    header("location:games.php");
}
if(isset($_POST["btnupd"]))
{
    $_SESSION['filename']=$_FILES['img']['name'];
    $_SESSION['file_tmp']=$_FILES['img']['tmp_name'];
    move_uploaded_file($_SESSION['file_tmp'],'file/'.$_SESSION['filename']);
    header("location:captcha.php");
}
if(isset($_POST['b2']))
{
    header("location:games.php");
}
?>
<!DOCTYPE html>
<html>
    <head></head>
    <body>
        <form name="frm" action="upload.php" method="post" enctype="multipart/form-data">
             Upload File:<input type="file" name="img" value="<?php if(isset($_SESSION['filename'])) echo 'file/'.$_SESSION['filename'];      ?>"/>
             <span style="color:red"><?php echo"$fileErr";?></span>
            <input type="submit" name="btnupd" value="Upload"/>
            <input type="submit" name="b2" value="back"/>
        </form>
    </body>
</html>