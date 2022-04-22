<?php
session_start();
    $firstNameErr=" ";
    if(isset($_POST['btn']))
    {
        if($_POST['txtfirst']==null)
        {
            header("location:first.php");
        }
        else{
        $firstName=$_POST['txtfirst'];
        
            $_SESSION['firstname']=$firstName;
            header("location:lastname.php");
            }
    }
?>
<!Doctype html>
<html>
    <head>
        <title>Multistep</title>
    </head>
    <body>
        <form name="frm" action="first.php" method="POST">
            <label for="firstName">
                FirtsName
            </label>
            <input type="text" name="txtfirst" id="firstName" value="<?php if(isset($_SESSION['firstname'])) echo $_SESSION['firstname'];   ?>"/><span style="color:red"><?php echo "$firstNameErr";  ?></span>
            <input type="submit" name="btn" value="submit"/> 
        </form>
    </body>
</html>
