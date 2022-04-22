<?php
session_start();
$cityErr="";
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
if(!isset($_SESSION['country']))
{
    header("location:country.php");
}
if(!isset($_SESSION['state']))
{
    header("location:state.php");
}
if(isset($_POST['btn']))
{
    $_SESSION['city']=$_POST['cty'];
    if($_SESSION['city']!=null)
    {
        header("location:gender.php");
    }
    else{
        header("location:city.php");
    }
    }
if(isset($_POST['b2']))
{
    header("location:state.php");
}
?>
<!DOCTYPE html>
<html>
    <head>
    </head>
    <body>
        <form name="frm" action="city.php" method="post">
            <label for="city">City</label>
            <select name="cty">
                <option value="-1">Select City</option>
                <option value="HMR" <?php if(isset($_SESSION['city']) && $_SESSION['city']=="HMR"){echo 'selected';} ?>>Hamirpur</option>
                <option value="UNA" <?php if(isset($_SESSION['city']) && $_SESSION['city']=="UNA"){echo 'selected';} ?>>UNA</option>
                <option value="MOHALI" <?php if(isset($_SESSION['city']) && $_SESSION['city']=="MOHALI"){echo 'selected';} ?>>Mohali</option>
            </select><span style="color:red"><?php echo"$cityErr";?></span>
            <input type="submit" name="btn" value="submit"/>
            <input type="submit" name="b2" value="back"/>
        </form>
    </body>
</html>