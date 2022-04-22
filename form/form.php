<?php
session_start();

$firstnameErr=$lastnameErr=$emailErr=$passErr=$confirmpassErr=$cityErr=$stateErr=$countryErr=$genderErr=$gamesErr=$fileErr=$capErr="";
$firstname=$lastname=$email=$pass=$confirmpass=$city=$state=$country=$gender=$games=$file="";
$data=true;
if ($_SERVER["REQUEST_METHOD"] == "POST") {  
    //firstname validation
    if(empty($_POST['txtfn'])){
        $firstnameErr="FisrtName is required";
        $data=false;
    }
    //lastname validation
    if(empty($_POST['txtln'])){
        $lastnameErr="LastName is required";
        $data=false;
    }
    //email validation
    if (empty($_POST["txteml"])) {  
        $emailErr = "Email is required";
        $data=false;  
} 
 //password validation
 if (empty($_POST["txtpass"])) {  
    $passErr = "Password is required"; 
    $data=false; 
} 
 //confirm passwordword validation
 if (empty($_POST["txtcpass"])) {  
    $confirmpassErr = "Confirm Password is required"; 
    $data=false; 
} 
elseif($_POST['txtpass']!=$_POST['txtcpass']){
    $confirmpassErr="Confirm password must be same as above password";
    $data=false;
}
//gender validation
if (empty($_POST["r1"])) {  
    $genderErr = "Gender is required";
    $data=false;  
} 
//city validation
if(($_POST["cty"])==-1)
{
    $cityErr="Please Select City";
    $data=false;
}
//state validation
if(($_POST['sta'])==-1)
{
   $stateErr="Please Select State";
   $data=false;
}
//country validation
if(($_POST['cnt'])==-1)
{
    $countryErr="Please Select Country";
    $data=false;
}
//games validation
if(empty($_POST['chk'])){
    $gamesErr="Please Choose one games";
    $data=false;
}
if($_FILES['img']['size']==0)
{
    $fileErr="Please Upload file";
    $data=false;
}
$num1=$_REQUEST['num1'];
$num2=$_REQUEST['num2'];
$total=$num1+$num2;
if($_POST['capRes']!=$total){
$capErr="Please Enter Correct Answeer";
$data=false;
}

$first=$_POST['txtfn'];
$last=$_POST['txtln'];
$email=$_POST['txteml'];
$confirmpass=$_POST['txtcpass'];
$password=$_POST['txtpass'];
$state=$_POST['sta'];
$country=$_POST['cnt'];
$city=$_POST['cty'];
$gender=$_POST['r1'];
$games=$_POST['chk'];
$files=$_FILES['img']['name'];
$_SESSION['file']=$files;
// foreach($games ad $val){

// }
//file validation
// if(empty($_FILES['img'])){
//     $fileErr="Please Choose File";
//     $data=false;
// }


if($data==1){
    $_SESSION['firstname']=$_POST['txtfn'];
    $_SESSION['lastname']=$_POST['txtln'];
    $_SESSION['email']=$_POST['txteml'];
    $_SESSION['password']=$_POST['txtpass'];
    $_SESSION['confirmpassword']=$_POST['txtcpass'];
    $_SESSION['city']=$_POST['cty'];
    $_SESSION['country']=$_POST['cnt'];
    $_SESSION['state']=$_POST['sta'];
    $_SESSION['gender']=$_POST['r1'];
    $_SESSION['games']=$_POST['chk'];
    // $_SESSION['file']=$_POST['img'];
    $_SESSION['filename']=$_FILES['img']['name'];
    $_SESSION['file_tmp']=$_FILES['img']['tmp_name'];
    $_SESSION['uploaded_file']=move_uploaded_file($_SESSION['file_tmp'],'file/'.$_SESSION['filename']);
    header("location:post.php");
}
}
?>
<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <form name="frm" method="post" action="form.php" enctype="multipart/form-data">
            <table border="5">
            <tr>   
            <th>Firstname:</th><td><input type="text" name="txtfn" value="<?php if(isset($first)) echo"$first" ?>" /><span style="color:red"><?php echo"$firstnameErr";?></span></td></tr>
            <tr><th>LastName:</th><td><input type="text" name="txtln" value="<?php if(isset($last)) echo"$last"; ?>"/><span style="color:red"><?php echo"$lastnameErr";?></span></td></tr>
            <tr><th>Email:</th><td><input type="email" name="txteml" value="<?php if(isset($email)) echo"$email"; ?>"/><span style="color:red"><?php echo"$emailErr";?></span></td></tr>
            <tr><th>Password:</th><td><input type="password" name="txtpass" value="<?php if(isset($password)) echo"$password"; ?>"/><span style="color:red"><?php echo"$passErr";?></span></td></tr>
            <tr><th>Confirm Password:</th><td><input type="password" name="txtcpass"value="<?php if(isset($confirmpass)) echo"$confirmpass"; ?>"/><span style="color:red"><?php echo"$confirmpassErr";?></span></td></tr>
            <tr><th>City:</th><td><select name="cty">
            <option value="-1">Select City</option>
            <option value="Hmr"<?php if(isset($city)&&$city=="Hmr") {echo'selected';}  ?>>Hamirpur</option>
            <option value="Mohali" <?php if(isset($city)&&$city=="Mohali") {echo'selected';}  ?>>Mohali</option>
            <option value="Una" <?php if(isset($city)&&$city=="Una") {echo'selected';}  ?>>Una</option>
        </select><span style="color:red"><?php echo"$cityErr";?></span></td></tr>
        <tr><th>State:</th><td><select name="sta">
        <option value="-1" >Select State</option>
            <option value="HP" <?php if(isset($state)&&$state=="HP") {echo'selected';}  ?>>Himachal Pradesh</option>
            <option value="PB" <?php if(isset($state)&&$state=="PB") {echo'selected';}  ?>>Punjab</option>
            <option value="Chd" <?php if(isset($state)&&$state=="Chd") {echo'selected';}  ?>>Chandigarh</option>
        </select><span style="color:red"><?php echo"$stateErr";?></span></td></tr>
        <tr><th>Country:</th><td><select name="cnt">
            <option value="-1">Select Country</option>
            <option value="Ind" <?php if(isset($country)&&$country=="Ind") {echo'selected';}  ?>>India</option>
            <option value="USA" <?php if(isset($country)&&$country=="USA") {echo'selected';}  ?>>USA</option>
            <option value="UK" <?php if(isset($country)&&$country=="UK") {echo'selected';}  ?>>UK</option>
        </select><span style="color:red"><?php echo"$countryErr";?></span></td></tr>
        <tr><th>Gender</th><td><input type="radio" name="r1" value="Male" <?php if(isset($gender)&& $gender=="Male") {echo'checked';}  ?> />Male
        <input type="radio" name="r1" value="Female" <?php if(isset($gender)&& $gender=="Female") {echo'checked';}  ?>/>Female
        <input type="radio" name="r1" value="O" <?php if(isset($gender)&& $gender=="O") {echo'checked';}  ?>/>Others<span style="color:red"><?php echo"$genderErr";?></span></td></tr>
        <tr><th>Games</th><td><input type="checkbox" name="chk[]" value="Cricket" <?php if(isset($games)&&$games!=null) {if(in_array("Cricket",$games)) {echo'checked';}}  ?>/>Cricket<br>
        <input type="checkbox" name="chk[]" value="Table Tennis" <?php if(isset($games)&&$games!=null){if(in_array("Table Tennis",$games)){echo 'checked';}}  ?>/>TableTennis
        <input type="checkbox" name="chk[]" value="Football" <?php if(isset($games)&&$games!=null){if(in_array("Football",$games)){echo 'checked';}}  ?> />FootBall
        <input type="checkbox" name="chk[]" value="Hockey" <?php if(isset($games)&&$games!=null){if(in_array("Hockey",$games)){echo 'checked';}}  ?>/>Hockey  <span style="color:red"><?php echo"$gamesErr";?></span>  </td></tr>
        <tr><th>Upload</th><td><input type="file" name="img" value="<?php if(isset($files))?>"/><span><?php if(isset($fileErr)) echo"$fileErr"; ?></span></td></tr>
        <tr><th>Captcha:<?php  $num1=mt_rand(1,9); $num2=mt_rand(1,9); echo"$num1"."+"."$num2"."=";   ?></th><td>
        <input type="text" name="capRes"/>
        <input type="hidden" name="num1" value="<?php  echo"$num1";  ?>";/>
        <input type="hidden" name="num2" value="<?php echo"$num2";  ?>"/>    
        <span style="color:red"><?php  if(isset($capErr)) echo"$capErr";   ?></span>
        </td></tr>
        <tr><td colspan="2"><input type="submit" name="b1" value="Submit"/></td></tr>
        </table>
        </form>
    </body>
</html>
