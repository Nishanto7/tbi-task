<?php
session_start();
$confirmpasswordErr=$samePassErr="";
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
if(isset($_POST['btn']))
{
    $_SESSION['confirmpassword']=$_POST['txtcpass'];
    if($_SESSION['confirmpassword']!=null)
    {
        header("location:country.php");
    }
    else{
        header("location:confirm.php");
    }
    }
if(isset($_POST['b2']))
{
    header("location:password.php");
}
?>
<!DOCTYPE html>
<html>
    <body>
        <form name="frm" action="confirm.php" method="post">
            <label for="cpass">
              Confirm  Password
            </label>
            <input type="password" name="txtcpass" value="<?php if(isset($_SESSION['confirmpassword'])) echo $_SESSION['confirmpassword']; ?>"/><span style="color:red"><?php echo"$confirmpasswordErr" ?></span>
            <span style="color: red;"><?php   echo"$samePassErr";  ?></span>
            <input type="submit" name="btn"/>
            <input type="submit" name="b2" value="back"/>
        </form>
    </body>
</html>