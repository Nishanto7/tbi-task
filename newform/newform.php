<?php
session_start();
$firstnameErr=$lastnameErr=$emailErr=$passErr=$confirmpassErr=$gamesErr=$genderErr=$fileErr=$countryErr=$stateErr=$cityErr=$capErr="";
$data=true;
$num1=$_REQUEST['num1'];
$num2=$_REQUEST['num2'];
$res=$_POST['capRes'];
$total=$num1+$num2;
if(isset($_POST['btnfn']))
{
    if($_POST['txtfn']!=null)
    {
    $_SESSION['firstname']=$_POST['txtfn'];
    header("location:firstname.php");
    }
    else{
        $firstnameErr="Please Enter Name";
    }
}
if(isset($_POST['btnln']))
{
    if($_POST['txtln']!=null){
    $_SESSION['lastname']=$_POST['txtln'];
    header("location:lastname.php");
    }
    else{
        $lastnameErr="Please Enter Lastname";
    }
}
//button for email
if(isset($_POST['btneml']))
{
    if($_POST['txteml']!=null)
    {
    $_SESSION['email']=$_POST['txteml'];
    header("location:email.php");
    }
    else{
        $emailErr="please Enter email";
    }
}
//button for password
if(isset($_POST['btnpass']))
{
    if($_POST['txtpass']!=null){
    $_SESSION['password']=$_POST['txtpass'];
    header("location:password.php");
    }
    else{
        $passErr="Plese Enter Password";
    }
}

//button for confirm password
if(isset($_POST['btncpass']))
{
    if($_POST['txtcpass']!=null){
    $_SESSION['confirmpassword']=$_POST['txtcpass'];
    header("location:confirmpassword.php");
    }
    else{
        $confirmpassErr="Please enter password";
    }
}
//city
if(isset($_POST['btncty']))
{
    if($_POST['cty']!=-1)
    {
    $_SESSION['city']=$_POST['cty'];
    header("location:city.php");
    }
    else{
        $cityErr="Please Select City";
    }
}
//state
if(isset($_POST['btnsta']))
{
    if($_POST['sta']!=-1)
    {
    $_SESSION['state']=$_POST['sta'];
    header("location:state.php");
    }
    else{
        $stateErr="Please Select State";
    }
}
//country
if(isset($_POST['btncnt']))
{
    if($_POST['cnt']!=-1)
    {
    $_SESSION['country']=$_POST['cnt'];
    header("location:country.php");
    }
    else{
        $countryErr="Please Select Country";
    }    
}
//gender
if(isset($_POST['btngen']))
{
    if($_POST['r1']!=null)
    {
    $_SESSION['gender']=$_POST['r1'];
    header("location:gender.php");
    }
    else{
        $genderErr="Please Select Gender";
    }    
}
//games
if(isset($_POST['btnchk']))
{
    if($_POST['chk']!=null)
    {
    $_SESSION['games']=$_POST['chk'];
    header("location:games.php");
    }
    else{
        $gamesErr="choose games";
    }    
}
//file
if(isset($_POST['btnimg']))
{
    // if($_FILES['img']['size']!=0)
    // {
    $_SESSION['filename']=$_FILES['img']['name'];
    $_SESSION['file_tmp']=$_FILES['img']['tmp_name'];
    $_SESSION['uplodedFile']=move_uploaded_file($_SESSION['file_tmp'],'file/'.$_SESSION['filename']);
    header("location:upload.php");
    // }
    // else{
    //     $fileErr="Choose File";
    // }    
}
if(isset($_POST['btncap']))
{
    $num1=$_REQUEST['num1'];
    $num2=$_REQUEST['num2'];
    $res=$_POST['capRes'];
    $total=$num1+$num2;
    $_SESSION['ans']=$total;
    if($total==$res)
    {
    header("location:captcha.php");
    }
    else{
        $capErr="Add Correct Answer";
    }    
}
if(isset($_POST['b1']))
{
    if($_POST['txtfn']==null)
    {
        $firstnameErr="Please Eneter Name";
        $data=false;
    }
    
    if($_POST['txtln']==null)
    {
        $lastnameErr="Please Enter Last Name";
        $data=false;
    }
    if($_POST['txteml']==null)
    {
        $emailErr="Please Enter Email";
        $data=false;
    }
    //password
    if($_POST['txtpass']==null)
    {
        $passErr="Please Enter Password";
        $data=false;
    }
    //confirm password
    if($_POST['txtcpass']==null)
    {
        $confirmpassErr="Enter ConfirmPassword";
        $data=false;
    }
    //city
    if($_POST['cty']==-1)
    {
        $cityErr="Enter City";
        $data=false;
    }
    //state
    
    if($_POST['sta']==-1)
    {
        $stateErr="Enter State";
        $data=false;
    }
    //country 
    if($_POST['cnt']==-1)
    {
        $countryErr="Select Country";
        $data=false;
    }
    //gender
    if($_POST['r1']==null)
    {
        $genderErr="Select Gender";
        $data=false;
    }
    else{
        $_SESSION=$_POST['r1'];
    }
    //games
    if($_POST['chk']==null)
    {
        $gamesErr="Choose Game";
        $data=false;
    }
    if($_FILES['img']['size']==0)
    {
        $fileErr="Select File";
        $data=false;
    }
    if($_POST['capRes']==null)
    {
        $capErr="Please Enter Sum";
        $data=false;
    }
    if($total!=$res){
        $capErr="Please Enter Correct Answer";
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
    if($data==1)
    {
        $_SESSION['firstname']=$_POST['txtfn'];
        $_SESSION['lastname']=$_POST['txtln'];
        $_SESSION['email']=$_POST['txteml'];
        $_SESSION['password']=$_POST['txtpass'];
        $_SESSION['confirmpassword']=$_POST['txtcpass'];
        $_SESSION['city']=$_POST['cty'];
        $_SESSION['state']=$_POST['sta'];
        $_SESSION['country']=$_POST['cnt'];
        $_SESSION=$_POST['r1'];
        $_SESSION['games']=$_POST['chk'];
        $_SESSION['filename']=$_FILES['img']['name'];
        $_SESSION['file_tmp']=$_FILES['img']['tmp_name'];
        $_SESSION['uploadedFile']=move_uploaded_file($_SESSION['file_tmp'],'file/'.$_SESSION['filename']);
        header("location:result.php");
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
        <form name="frm" method="post" action="newform.php" enctype="multipart/form-data">
            <table border="5">
            <tr>   
            <th>Firstname:</th><td><input type="text" name="txtfn" value="<?php if(isset($first)) echo"$first" ?>" /><span style="color:red"><?php echo"$firstnameErr";?></span></td><td><input type="submit" name="btnfn"/></td></tr>
            <tr><th>LastName:</th><td><input type="text" name="txtln" value="<?php if(isset($last)) echo"$last"; ?>" /><span style="color:red"><?php echo"$lastnameErr";?></span></td><td><input type="submit" name="btnln"/></td></tr>
            <tr><th>Email:</th><td><input type="email" name="txteml" value="<?php if(isset($email)) echo"$email"; ?>" /><span style="color:red"><?php echo"$emailErr";?></span></td><td><input type="submit" name="btneml"/></td></tr>
            <tr><th>Password:</th><td><input type="password" name="txtpass" value="<?php if(isset($password)) echo"$password"; ?>"/><span style="color:red"><?php echo"$passErr";?></span></td><td><input type="submit" name="btnpass"/></td></tr>
            <tr><th>Confirm Password:</th><td><input type="password" name="txtcpass" value="<?php if(isset($confirmpass)) echo"$confirmpass"; ?>"/><span style="color:red"><?php echo"$confirmpassErr";?></span></td><td><input type="submit" name="btncpass"/></td></tr>
            <tr><th>City:</th><td><select name="cty">
            <option value="-1">Select City</option>
            <option value="Hmr"<?php if(isset($city)&&$city=="Hmr") {echo'selected';}  ?>>Hamirpur</option>
            <option value="Mohali" <?php if(isset($city)&&$city=="Mohali") {echo'selected';}  ?>>Mohali</option>
            <option value="Una" <?php if(isset($city)&&$city=="Una") {echo'selected';}  ?>>Una</option>
            </select><span style="color:red"><?php echo"$cityErr";?></span>
            <td><input type="submit" name="btncty"/></td></td>
            </tr>
            <tr><th>State:</th><td><select name="sta">
            <option value="-1" >Select State</option>
            <option value="HP" <?php if(isset($state)&&$state=="HP") {echo'selected';}  ?>>Himachal Pradesh</option>
            <option value="PB" <?php if(isset($state)&&$state=="PB") {echo'selected';}  ?>>Punjab</option>
            <option value="Chd" <?php if(isset($state)&&$state=="Chd") {echo'selected';}  ?>>Chandigarh</option>
            </select><span style="color:red"><?php echo"$stateErr";?></span></td>
            <td><input type="submit" name="btnsta"/></td></td>
            </tr>
            <tr><th>Country:</th><td><select name="cnt">
            <option value="-1">Select Country</option>
            <option value="Ind" <?php if(isset($country)&&$country=="Ind") {echo'selected';}  ?>>India</option>
            <option value="USA" <?php if(isset($country)&&$country=="USA") {echo'selected';}  ?>>USA</option>
            <option value="UK" <?php if(isset($country)&&$country=="UK") {echo'selected';}  ?>>UK</option>
            </select><span style="color:red"><?php echo"$countryErr";?></span></td>
            <td><input type="submit" name="btncnt"/></td></td>
            </tr>
            <tr><th>Gender</th><td><input type="radio" name="r1" value="Male" <?php if(isset($gender)&& $gender=="Male") {echo'checked';}  ?> />Male
            <input type="radio" name="r1" value="Female" <?php if(isset($gender)&& $gender=="Female") {echo'checked';}  ?>/>Female
            <input type="radio" name="r1" value="O" <?php if(isset($gender)&& $gender=="O") {echo'checked';}  ?> />Others<span style="color:red"><?php echo"$genderErr";?></span></td>
            <td><input type="submit" name="btngen"/></td></td>
            </tr>
            <tr><th>Games</th><td><input type="checkbox" name="chk[]" value="Cricket" <?php if(isset($games)&&$games!=null) {if(in_array("Cricket",$games)) {echo'checked';}}  ?>/>Cricket<br>
            <input type="checkbox" name="chk[]" value="Table Tennis" <?php if(isset($games)&&$games!=null) {if(in_array("Table Tennis",$games)) {echo'checked';}}  ?> />TableTennis
            <input type="checkbox" name="chk[]" value="Football" <?php if(isset($games)&&$games!=null) {if(in_array("Football",$games)) {echo'checked';}}  ?>/>FootBall
            <input type="checkbox" name="chk[]" value="Hockey" <?php if(isset($games)&&$games!=null) {if(in_array("Hockey",$games)) {echo'checked';}}  ?>/>Hockey  <span style="color:red"><?php echo"$gamesErr";?></span>  </td>
            <td><input type="submit" name="btnchk"/></td></td>
            </tr>
            <tr><th>Upload</th><td><input type="file" name="img"/><span><?php if(isset($fileErr)) echo"$fileErr"; ?></span></td>
            <td><input type="submit" name="btnimg"/></td></td>
            </tr>
            <tr><th>Captcha:<?php  $num1=mt_rand(1,9); $num2=mt_rand(1,9); echo"$num1"."+"."$num2"."=";   ?></th><td>
            <input type="text" name="capRes"/>
            <input type="hidden" name="num1" value="<?php  echo"$num1";  ?>";/>
            <input type="hidden" name="num2" value="<?php echo"$num2";  ?>"/>    
            <span style="color:red"><?php  if(isset($capErr)) echo"$capErr";   ?></span>
            </td>
            <td><input type="submit" name="btncap"/></td></td>
            </tr>
            <tr><td colspan="3"><input type="submit" name="b1" value="Submit All Details"/></td></tr>
        </table>
        </form>
    </body>
</html>
