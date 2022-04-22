<?php
include'config.php';
include'fb_config.php';
include'conn.php';
if(isset($_POST['submitBtn']))
{
    $eml = $_POST['txteml'];
    $pass = $_POST['txtpass'];
    $enpass = md5($pass);
    //  echo "$enpass";
    $qry = "select * from tbform where Email='$eml' and Password='$enpass'";
    $res = mysqli_query($link,$qry) or die(mysqli_error($link));
    $r=mysqli_fetch_array($res);
    $_SESSION['Id'] = $r['ID'];
    // echo $_SESSION["Id"];
    // print_r($r);
    if($r['ID']!="")
    {
        // echo"Welcome"." ".$r['FirstName'];
        header("location:login.php");
    }
    else{
        echo"You have entered wrong pwd/email";
    }
}
?>
<!DOCTYPE html>
<html>
    <head>
    <link rel = "stylesheet"    href = "https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"   integrity = "sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm"    crossorigin = "anonymous">
    </head>
    <body>
        <form action="index.php" method="post" name="login" enctype="multipart/form-data">
            <div class="container bg-light">
                <div class="container-fluid text-white bg-dark">
                    <h2 class="text-warning">Login Form</h2>
                </div>
                <div class="container">
                    <div class="row" >
                        <div class="col my-2 float-left font-weight-bold">Enter Email</div>
                        <div class="col my-2 float-right"><input type="email" name="txteml" placeholder="Enter Email" required/></div>
                    </div>
                    <div class="row">
                        <div class="col my-2 font-weight-bold">Password</div>
                        <div class=" col my-2 w-100 align-end"><input type="password" name="txtpass" placeholder="Enter Password" required/></div>
                    </div>
                    <div class="row">   
                        <div class="col text-start">
                            <input type="submit" class="btn btn-success my-3" name="submitBtn" value="Submit"/>  
                        </div>  
                        <div class="col text-start">
                            <a href="<?=$google_client->createAuthUrl()?>" class="text-center my-5"><img src="download.png" width="150px" height="45px" style="margin: 15px;"/></a>
                        </div>
                        <div class="col my-3">
                            <a href="form.php" class="my btn btn-primary">New User?</a>
                        </div>  
                        <div class="col">
                            <a href="forget.php" class="btn btn-info my-4">Forget Password ?</a>
                        </div>
                        <div class="col text-start">
                            <a href="<?=$facebook_helper->getLoginUrl('https://development.brstdev.com/nishantsharma/form/LoginForm/fb_index.php')?>" class="btn btn-secondary my-4">Login With Facebook</a>
                        </div>
                    </div>
                </div>
            </div>
        </form>  
    </body>
</html>
