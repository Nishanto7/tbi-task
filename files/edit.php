<?php
include('config.php');
include('conn.php');
// echo"Mail:".$_SESSION['email'];
 $id = $_SESSION['editId'];
 $qry = "select * from tbform where ID = $id";
 $res = mysqli_query($link,$qry);
 $r =mysqli_fetch_array($res);
 $Firstname = $r['FirstName'];
 $Lastname = $r['LastName'];
 $mail = $r['Email'];
 $city = $r['City'];
 $state = $r['State'];
 $gen = $r['Gender'];
 $hobbie = $r['Hobbies'];
 $hobbies = explode(",",$hobbie);
 $fileid = $r['File'];
 if(isset($_POST['btnupd']))
 {
     $firstname = $_POST['txtfn'];
     $lastname = $_POST['txtln'];
     $Email = $_POST['txteml'];
     $pass =$_POST['txtpass'];
     $password =md5($pass);
     $cpass = $_POST['txtcpass'];
     $City = $_POST['cty'];
     $State = $_POST['sta'];
     $Gen = $_POST['r1'];
     $Hobbies = $_POST['chk'];
     foreach($Hobbies as $Hobbie)
     {
         $hb.=$Hobbie.",";
     }
     $filename = $_FILES['filetoUpload']['name'];
     $filetmp = $_FILES['filetoUpload']['tmp_name'];
     $ext = pathinfo($filename,PATHINFO_EXTENSION);
     if($pass == $cpass)
     {
     if($filename!="")
     {
         $fileName = time().".".$ext;
         move_uploaded_file($filetmp,'uploads/'.$fileName);
         $qry1 = "update tbimg set File = '$fileName' where FileID = $fileid";
         $res1 =mysqli_query($link,$qry1);
         if(mysqli_affected_rows($link)==1)
         {
            $msg ="Data updated";
            header("location:login.php?msg =$msg");
         }
     }
    //  else{
    //      $fileName= "";
    //      echo"file not updated";
    //  }
     if($pass=="")
     {
        $qry2 ="update tbform set FirstName= '$firstname',LastName = '$lastname',Email ='$Email',City ='$City',State='$State',Gender = '$Gen',Hobbies='$hb' where ID = $id";
        $res2 =mysqli_query($link,$qry2);
        if(mysqli_affected_rows($link)==1)
        {
            $msg ="Data updated";
            header("location:login.php?msg =$msg");
        }
        else{
            echo"Email already exist";
        }
     }
     else{
         $qry3 ="update tbform set FirstName= '$firstname',LastName = '$lastname',Email ='$Email',Password ='$password',City ='$City',State='$State',Gender = '$Gen',Hobbies='$hb' where ID = $id";
         $res3 =mysqli_query($link,$qry3) ;
         if(mysqli_affected_rows($link)==1)
         {
              $msg ="Data updated";
             header("location:login.php?msg =$msg");
         }
         else{
             echo"Email already exist ";
         }
     }
    }
    else{
        echo"Password Not match";
    }
 }
?>
<!DOCTYPE html>
<html>
    <head>
    <link rel = "stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"   integrity = "sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm"    crossorigin = "anonymous">
    </head>
    <body>
        <form action="edit.php" method="post" name="lgn" enctype="multipart/form-data">
            <div class="container bg-light">
                <div class="container-fluid text-white bg-dark">
                    <h2 class="text-warning">Update User Detail</h2>
                </div>
                <div class="container">
                    <div class="row">
                        <div class="col-4 my-2 float-left font-weight-bold">Fisrt Name:</div>
                        <div class="col-4 my-2 float-right"><input type="text" name="txtfn" value="<?php  echo"$Firstname";  ?>" ><span style="color:red"><?php echo"$firstErr";?></span></div>
                    </div>
                    <div class="row">
                        <div class="col-4 my-2 float-left font-weight-bold">LastName:</div>
                        <div class="col-4 my-2 float-right"><input type="text" name="txtln" value="<?php  echo"$Lastname";  ?>" ><span style="color:red"><?php echo"$lastErr";?></span></div>
                    </div>
                    <div class="row">
                        <div class="col-4 my-2 font-weight-bold">Email</div>
                        <div class="col-4 my-2 w-100"><input type="email" name="txteml" value="<?php  echo $mail ?>"/><span style="color:red"><?php echo"$emailErr";?></span></div>
                    </div>
                    <div class="row">
                        <div class="col-4 my-2 font-weight-bold">New Password</div>
                        <div class="col-4 my-2 w-100"><input type="password" name="txtpass"/><span style="color:red"><?php echo"$passErr";?></span></div>
                    </div>
                    <div class="row">
                        <div class="col-4 my-2 font-weight-bold">Confirm Password</div>
                        <div class="col-4 my-2 w-100"><input type="password" name="txtcpass"/><span style="color:red"><?php echo"$cpassErr";?></span></div>
                    </div>
                    <div class="row">
                        <div class="col-4 my-2 font-weight-bold">City</div>
                        <div class="col-4 my-2 w-100">
                            <select name="cty">
                                <option value="-1">Select City</option>
                                <option value="HMR" <?php if(isset($city)&&$city=="HMR") {echo'selected';}  ?>>Hamirpur</option>
                                <option value="Mum"  <?php if(isset($city)&&$city=="Mum") {echo'selected';}  ?>>Mumbai</option>
                                <option value="Pune"  <?php if(isset($city)&&$city=="Pune") {echo'selected';}  ?>>Pune</option>
                            </select><span style="color:red"><?php echo"$cityErr";?></span>    
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-4 my-2 font-weight-bold">State</div>
                        <div class="col-4 my-2 w-100">
                            <select name="sta">
                                <option value="-1">Select State</option>
                                <option value="HP"  <?php if(isset($state)&&$state=="HP") {echo'selected';}  ?>>Himachal Pradesh</option>
                                <option value="PUN" <?php if(isset($state)&&$state=="PUN") {echo'selected';}  ?>>Punjab</option>
                                <option value="UK" <?php if(isset($state)&&$state=="UK") {echo'selected';}  ?>>Uttrakhand</option>
                                <option value="HR" <?php if(isset($state)&&$state=="HR") {echo'selected';}  ?>>Haryana</option>
                            </select> <span style="color:red"><?php echo"$stateErr";?></span>  
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-4 my-2 font-weight-bold">Gender</div>
                        <div class="col-4 my-2 w-100">
                            <input type="radio" name="r1" value="0" <?php if($gen=="0") echo "checked='true'";?>/>Male
                            <input type="radio" name="r1" value="1" <?php if($gen=="1") echo "checked='true'";?>/>Female
                            <input type="radio" name="r1" value="2" <?php if($gen=="2") echo "checked='true'";?>/>Other
                            <span style="color:red"><?php echo"$genderErr";?></span>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-4 my-2 font-weight-bold">Hobbies</div>
                        <div class="col-4 my-2 w-100">
                        <input type="checkbox" name="chk[]" value="Reading" <?php if(isset($hobbies)&&$hobbies!=null) {if(in_array("Reading",$hobbies)) {echo'checked';}}  ?>/>Reading
                        <input type="checkbox" name="chk[]" value="Running" <?php if(isset($hobbies)&&$hobbies!=null) {if(in_array("Running",$hobbies)) {echo'checked';}}  ?>/>Running
                        <input type="checkbox" name="chk[]" value="Driving" <?php if(isset($hobbies)&&$hobbies!=null) {if(in_array("Driving",$hobbies)) {echo'checked';}}  ?>/>Driving
                        <input type="checkbox" name="chk[]" value="Sleeping"<?php if(isset($hobbies)&&$hobbies!=null) {if(in_array("Sleeping",$hobbies)) {echo'checked';}}  ?> />Sleeping
                        <span style="color:red"><?php echo"$hobbiesErr";?></span>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-4 my-2 font-weight-bold">Image</div>
                        <div class="col-4 my-2 w-100"><input type="file" name="filetoUpload" value="<?php echo $file ?>"/></div>
                    </div>
                    <div class="row">
                        <div class="col text-end">
                           <input type="submit" name="btnupd" value="Update" class="btn btn-success"/>
                           <input type="button" name="btncancel" value="Cancel" class="btn btn-primary float-end" onclick="back()"/>
                        </div>
                    </div>
                </div>
            </div>
        </form>  
        <script>
            function back(){
                window.location.href = "login.php";
            }
        </script> 
    </body>
</html>