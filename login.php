<?php
include('config.php');
include('conn.php');
if(isset($_SESSION['Id']) && $_SESSION['Id']!= "")
{
    // echo"Hi1";
$id =$_SESSION['Id']; 
$qry1="select * from tbform where ID =$id";
$res1= mysqli_query($link,$qry1);
$r1 = mysqli_fetch_array($res1);
$Firstname = $r1['FirstName'];
$LastName = $r1['LastName'];
$Email = $r1['Email'];
$City = $r1['City'];
$State = $r1['State'];
$hobbie = $r1['Hobbies'];
$hobbies = rtrim($hobbie,",");
$file = $r1['File'];
$qry = "select File from tbimg where FileID = $file";
$res = mysqli_query($link,$qry);
$r= mysqli_fetch_array($res);
$filename =$r[0];
}
elseif(isset($_SESSION['access_token']))
{
    // echo'Hi2';
    // $firstname = $_SESSION['firstname'];
    // $lastname = $_SESSION['lastname'];
    // $img = $_SESSION['user_img'];
    $email = $_SESSION['email'];
    // echo"$email";
    $qry2 = "select * from tbform where Email ='$email'";
    $res2 =mysqli_query($link,$qry2);
    $r2 = mysqli_fetch_array($res2);
    $Firstname = $r2['FirstName'];
    $LastName = $r2['LastName'];
    $Email = $r2['Email'];
    $City = $r2['City'];
    $State = $r2['State'];
    $hobbie = $r2['Hobbies'];
    $hobbies = rtrim($hobbie,",");
    $file = $r2['File'];
    $qry5 = "select File from tbimg where FileID = $file";
    $res5 = mysqli_query($link,$qry5);
    $r5= mysqli_fetch_array($res5);
    $filename =$r5[0];  
}
elseif(isset($_SESSION['access_token_fb']))
{
    $fbmail =$_SESSION['user_email_address'];
    $qry3 ="select * from tbform where Email ='$fbmail'";
    $res3 = mysqli_query($link,$qry3);
    $r3 = mysqli_fetch_array($res3);
    $Firstname = $r3['FirstName'];
    $LastName = $r3['LastName'];
    $Email = $r3['Email'];
    $City = $r3['City'];
    $State = $r3['State'];
    $hobbie = $r3['Hobbies'];
    $hobbies = rtrim($hobbie,",");
    $file = $r3['File'];
    $qry4 = "select File from tbimg where FileID = $file";
    $res4 = mysqli_query($link,$qry4);
    $r4= mysqli_fetch_array($res4);
    $filename =$r[0];
}
else{
    header("location:index.php");
}
if(isset($_POST['btnout']))
{
    $google_client->revokeToken();
    session_destroy();
    header("location:index.php");
}
if(isset($_POST['btnedit']))
{
    if(isset($Email))
    {
        $mail = "$Email";
    }
    else
    {
        $mail = "$email";
    }
    // echo"$mail";
    $qry = "select ID from tbform where Email = '$mail'";
    $res = mysqli_query($link,$qry);
    $r = mysqli_fetch_array($res);
    $id = $r['ID'];
    // echo"$id";
    $_SESSION['editId'] =$id;
    header("location:edit.php");
}
// print_r($r);
?>
<!DOCTYPE html>
<html>
    <head>
    <link rel = "stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"   integrity = "sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm"    crossorigin = "anonymous">
    </head>
    <body>
        <form action="login.php" method="post" name="login">
            <div class="container bg-light">
                <div class="container-fluid text-white bg-dark">
                    <h2 class="text-warning">User Detail</h2>
                </div>
                <div class="container">
                    <div class="row">
                        <div class="col-4 my-2 float-left font-weight-bold">Full Name:</div>
                        <div class="col-4 my-2 float-right"><?php if(isset($Firstname)){ echo"$Firstname"." "."$LastName";} ?></div>
                    </div>
                    <div class="row">
                        <div class="col-4 my-2 font-weight-bold">Email</div>
                        <div class="col-4 my-2 w-100"><?php  if(isset($Email)){echo"$Email";}      ?></div>
                    </div>
                    <div class="row">
                        <div class="col-4 my-2 font-weight-bold">City</div>
                        <div class="col-4 my-2 w-100"><?php if(isset($City)){ echo"$City"; }    ?></div>
                    </div>
                    <div class="row">
                        <div class="col-4 my-2 font-weight-bold">State</div>
                        <div class="col-4 my-2 w-100"><?php if(isset($State)){  echo"$State"; }    ?></div>
                    </div>
                    <div class="row">
                        <div class="col-4 my-2 font-weight-bold">Hobbies</div>
                        <div class="col-4 my-2 w-100"><?php if(isset($hobbies)){ echo"$hobbies"; }    ?></div>
                    </div>
                    <div class="row">
                        <div class="col-4 my-2 font-weight-bold">File</div>
                        <div class="col-4 my-2 w-100"><?php if(isset($filename)){echo"<img src='uploads/".$filename."' height='100px' width='100px'/>";} else{echo"<img src='$img' height='100px' width='100px'/>";}?></div>
                    </div>
                    <div class="row">
                        <div class="col text-end">
                           <!-- <a href="logout.php" class="btn btn-danger">LogOut</a> -->
                           <input type="submit" name="btnout" value="LogOut" class="btn btn-danger"/>
                        </div>
                        <div class="col text-start">
                           <!-- <a href="edit.php" class="btn btn-info">Edit</a> -->
                           <input type="submit" name="btnedit" class="btn btn-info" value="EDIT"/>
                        </div>
                    </div>
                </div>
            </div>
        </form>    
    </body>
</html>
