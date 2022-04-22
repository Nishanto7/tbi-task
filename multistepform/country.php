<?php
session_start();
$countryErr="";
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
if(isset($_POST['btn']))
{
    $_SESSION['country']=$_POST['cnt'];
    if($_SESSION['country']!=null)
    {
        header("location:state.php");
    }
    else{
        header("location:country.php");
    }
    }
if(isset($_POST['b2']))
{
    header("location:confirm.php");
}
?>
<!DOCTYPE html>
<html>
    <head>
    </head>
    <body>
        <form name="frm" action="country.php" method="post">
            <label for="country">Country</label>
            <select name="cnt">
                <option value="-1" >Select Country</option>
                <option value="India" <?php if(isset($_SESSION['country']) && $_SESSION['country']=="India"){echo 'selected';}    ?>>India</option>
                <option value="US" <?php if(isset($_SESSION['country']) && $_SESSION['country']=="US"){echo 'selected';}    ?>>US</option>
                <option value="UK" <?php if(isset($_SESSION['country']) && $_SESSION['country']=="UK"){echo 'selected';}    ?>>UK</option>
            </select><span style="color:red"><?php echo"$countryErr";?></span>
            <input type="submit" name="btn" value="submit"/>
            <input type="submit" name="b2" value="back"/>
        </form>
    </body>
</html>