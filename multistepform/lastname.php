<?php
session_start();
$lastnameErr="";
if(!isset($_SESSION['firstname']))
{
    header("location:first.php");
}
if(isset($_POST['b1']))
{
    $lastname=$_POST['txtlast'];
    $_SESSION['lastname']=$_POST['txtlast'];
    if($_SESSION['lastname']==null)
    {
        header("location:lastname.php");
    }
    else{
    header("location:email.php");
    }
}
if(isset($_POST['b2']))
{
    header("location:first.php");
}
?>
<!DOCTYPE html>
<html>
    <head>
        <title></title>
    </head>
    <body>
        <form name="frm" action="lastname.php" method="post">
        <!-- <b>FirstName:</b> <?php echo"$firstname"; ?><br> -->
        <label for="lastname">lastname</label>
        <input type="text" name="txtlast" value="<?php if(isset($_SESSION['lastname'])) echo $_SESSION['lastname']; ?>"/><span style="color: red;"><?php  echo"$lastnameErr"; ?></span>
        <input type="submit" name="b1" value="submit"/>
        <input type="submit" name="b2" id="back" value="back"/>
        </form>
    </body>
</html>