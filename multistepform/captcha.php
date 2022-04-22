<?php
session_start();
$captchaErr="";
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
if(!isset($_SESSION['filename']))
{
    header("location:upload.php");
}
if(isset($_POST['btn']))
{
$num1=$_REQUEST["num1"];
$num2=$_REQUEST['num2'];
$res=$_POST['res'];
$total=$num1+$num2;
if($total!=$res)
{
    $captchaErr="Your Answer Is Wrong";
}
else{
    header("location:full.php");
}
}
if(isset($_POST['b2']))
{
    header("location:upload.php");
}
?>
<!DOCTYPE html>
<html>
    <body>
        <form name="frm" method="post" action="captcha.php">
            Captcha:
            <?php
            $num1=mt_rand(1,50);
            $num2=mt_rand(1,20);
            echo"$num1"."+"."$num2"."=";
            ?>
            <input type="text" name="res"/><span style="color:red"><?php echo"$captchaErr";  ?></span>
            <input type="hidden" name="num1" value="<?php echo"$num1"; ?>"/>
            <input type="hidden" name="num2" value="<?php  echo"$num2"; ?>"/>
            <input type="submit" name="btn"/>
            <input type="submit" name="b2" value="back"/>
        </form>
    </body>
</html>