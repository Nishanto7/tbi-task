<?php
session_start();
$stateErr="";
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
if(isset($_POST['btn']))
{
    $_SESSION['state']=$_POST['sta'];
    if($_SESSION['state']!=null)
    {
        header("location:city.php");
    }
    else{
        header("location:state.php");
    }
    }
if(isset($_POST['b2']))
{
    header("location:country.php");
}
?>
<!DOCTYPE html>
<html>
    <head>
    </head>
    <body>
        <form name="frm" action="state.php" method="post">
            <label for="state">State</label>
            <select name="sta">
                <option value="-1">Select State</option>
                <option value="HP" <?php if(isset($_SESSION['state']) && $_SESSION['state']=="HP"){echo 'selected';} ?>>Himachal Pradesh</option>
                <option value="CHD" <?php if(isset($_SESSION['state']) && $_SESSION['state']=="CHD"){echo 'selected';}    ?>>Chandigarh</option>
                <option value="PB" <?php if(isset($_SESSION['state']) && $_SESSION['state']=="PB"){echo 'selected';}    ?>>Punjab</option>
            </select><span style="color:red"><?php echo"$stateErr";?></span>
            <input type="submit" name="btn" value="submit"/>
            <input type="submit" name="b2" value="back"/>
        </form>
    </body>
</html>