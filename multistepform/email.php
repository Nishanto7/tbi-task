<?php
session_start();
$emailErr="";
if(!isset($_SESSION['firstname']))
{
    header("location:first.php");
}
if(!isset($_SESSION['lastname']))
{
    header("location:lastname.php");
}
if(isset($_POST['btn']))
{
$_SESSION['email']=$_POST['txtemail'];
if($_SESSION['email']!=null)
{
    header("location:password.php");
}
else{
    header("location:email.php");
}
}
if(isset($_POST['b2']))
{
    header("location:lastname.php");
}
?>
<!DOCTYPE html>

<html>
    <body>
        <form action="email.php" name="frm" method="post">
           <label for="email">
               Email
           </label>
           <input type="email" name="txtemail" value="<?php if(isset($_SESSION['email'])) echo $_SESSION['email'];   ?>"/><span style="color:red"><?php echo"$emailErr" ?></span> 
           <input type="submit" name="btn"/>
           <input type="submit" name="b2" value="back"/>
        </form>
    </body>
</html>