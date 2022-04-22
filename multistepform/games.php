<?php
session_start();
$gamesErr="";
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
if(isset($_POST['btn']))
{
    $_SESSION['games']=$_POST['chk'];
    if($_SESSION['games']!=null)
    {
        header("location:upload.php");
    }
    else{
        header("location:games.php");
    }
}
if(isset($_POST['b2']))
{
    header("location:gender.php");
}
?>
<!DOCTYPE html>
<html>
    <head></head>
    <body>
        <form name="frm" action="games.php" method="post">
            Games:<input type="checkbox" name="chk[]" value="Tennis" <?php if(isset($_SESSION['games'])&&$_SESSION['games']!=null) {if(in_array("Tennis",$_SESSION['games'])) {echo'checked';}} ?>/>Tennis
            <input type="checkbox" name="chk[]" value="Cricket" <?php if(isset($_SESSION['games'])&&$_SESSION['games']!=null) {if(in_array("Cricket",$_SESSION['games'])) {echo'checked';}} ?>/>Cricket
            <input type="checkbox" name="chk[]" value="Hockey" <?php if(isset($_SESSION['games'])&&$_SESSION['games']!=null) {if(in_array("Hockey",$_SESSION['games'])) {echo'checked';}} ?>/>Hockey
            <input type="checkbox" name="chk[]" value="Running" <?php if(isset($_SESSION['games'])&&$_SESSION['games']!=null) {if(in_array("Running",$_SESSION['games'])) {echo'checked';}} ?>/>Running
            <span style="color:red"><?php echo"$gamesErr";  ?></span>
            <input type="submit" name="btn"/>
            <input type="submit" name="b2" value="back"/>
        </form>
    </body>
</html>