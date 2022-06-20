<?php
include('conn.php');
$emptyErr=$incorrectErr="";
if(isset($_POST['btn1']))
{
    $email = $_POST['txteml'];
    if($email!="")
    {  
        $qry = "select Email from tbform where Email ='$email'";
        $res =mysqli_query($link,$qry) or die(mysqli_error($link));
        // $r = mysqli_fetch_array($res);
         $count =  mysqli_num_rows($res);
        //  echo "$count";
        if($count==1)
        {
            $alpha ="abcdefghijklmnopqrstuwxyzABCDEFGHIJKLMNOPQRSTUWXYZ0123456789";
            $pass =array();
            $alphalen =strlen($alpha)-1;
            for($i=0;$i<8;$i++)
            {
                $n = rand(0,$alphalen);
                $pass[]=$alpha[$n];
            }
            $password = implode($pass);
            // echo"$password";
            $encpass = md5($password);
            $qry1 ="update tbform set Password ='$encpass' where Email='$email'";
            $res1 =mysqli_query($link,$qry1);
            if(mysqli_affected_rows($link)==1)
            {
                echo"Your New Password Is:-"."<br><b>".$password."</b>";
            }
        }
        else
        {
            $incorrectErr ='Please enter valid email ';
        }
    }
    else{
      $emptyErr= "Please Enter Email";
    }
}
?>
<!DOCTYPE html>
<html>
    <head>
    <link rel = "stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"   integrity = "sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm"    crossorigin = "anonymous">
    </head>
    <body>
        <form action="forget.php" method="post" name="forget">
            <div class="container bg-light">
                <div class="container-fluid text-white bg-dark">
                    <h2 class="text-warning">Forget Password</h2>
                </div>
                <div class="container">
                    <div class="row">
                        <div class="col-4 my-2 float-left font-weight-bold"> Enter Email:</div>
                        <div class="col-4 my-2 float-right"><input type="email" name="txteml" placeholder="Enter Email" /><span style="color: red;"><?php  echo $emptyErr; ?></span><p style="color:red;"><?php echo $incorrectErr;?></p></div>
                    </div>
                    <div class="row">
                        <div class="col text-end">
                           <input type="submit" name="btn1" value="Submit" class="btn btn-success"/>
                           <input type="button" name="btncancel" value="Back" class="btn btn-primary float-end" onclick="window.location.href='index.php'"/>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </body>
</html>                
