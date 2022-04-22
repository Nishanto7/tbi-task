<?php
session_start();
$genderErr="";
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
if(isset($_POST['btn']))
{
    $_SESSION['gender']=$_POST['r1'];
    if($_SESSION['gender']!=null)
    {
        header("location:games.php");
    }
    else{
        header("location:gender.php");
    }
}
if(isset($_POST['b2']))
{
    header("location:city.php");
}
?>
<!DOCTYPE html>
<HTML>
<head></head>
<body>
    <form name="frm" action="gender.php" method="post">
        <label>Gender</label>
        <input type="radio" name="r1" value="Male" <?php if(isset($_SESSION['gender']) && $_SESSION['gender']=="Male") {echo'checked';} ?>/>Male
        <input type="radio" name="r1" value="Female" <?php if(isset($_SESSION['gender']) && $_SESSION['gender']=="Female") {echo'checked';} ?>/>Female
        <input type="radio" name="r1" value="Other" <?php if(isset($_SESSION['gender']) && $_SESSION['gender']=="Other") {echo'checked';} ?>/>Others
        <span style="color: red;"><?php echo"$genderErr";  ?></span>
        <input type="submit" name="btn"/>
        <input type="submit" name="b2" value="back"/>

    </form>
</body>
</HTML>