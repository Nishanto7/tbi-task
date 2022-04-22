<?php
session_start();
$passwordErr="";
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
if(isset($_POST['btn']))
{
    $_SESSION['password']=$_POST['txtpass'];
    if($_SESSION['password']!=null)
    {
        header("location:confirm.php");
    }
    else{
        header("location:password.php");
    }
    }
if(isset($_POST['b2']))
{
    header("location:email.php");
}
?>
<!DOCTYPE html>
<html>
    <body>
        <form name="frm" action="password.php" method="post">
            <label for="password">
                Password
            </label>
            <input type="password" name="txtpass" value="<?php if(isset($_SESSION['password'])) echo $_SESSION['password'] ?>"/><span style="color:red"><?php echo"$passwordErr" ?></span>
            <input type="submit" name="btn"/>
            <input type="submit" name="b2" value="back"/>
        </form>
    </body>
</html>