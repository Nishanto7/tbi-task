<?php
$host="192.168.1.30:3066";
$uname="nishantsharma_usr";
$upass="S@g12Wrts";
$dbname = "nishantsharma_db";
$link=mysqli_connect($host,$uname,$upass,$dbname);
if(isset($_POST['b1']))
{
    if(!empty($_POST['g-recaptcha-response']))
    {
   $secret = '6LcPp4AfAAAAAJKV-5aoz7i7FA1zKonBB_hHdrY5';
   $verifyResponse = file_get_contents('https://www.google.com/recaptcha/api/siteverify?secret='.$secret.'&response='.$_POST['g-recaptcha-response']);    $responseData = json_decode($verifyResponse);
   if($responseData->success)
   {
   $fn=$_POST['txtfn'];
   $ln=$_POST['txtln']; 
   $eml=$_POST['txteml'];
   $pass=$_POST['txtpass'];
   $cpass=$_POST['txtcpass'];
   $city =$_POST['cty'];
   $state=$_POST['sta'];
   $gender=$_POST['r1'];
   $hobbies=$_POST['chk'];
   $encrt = md5($pass);
   $date = date('Y/m/d H:i:s');
   foreach($hobbies as $hobbie)
   {
       $hb.=$hobbie.",";
   }
   $filename = $_FILES['upload']['name'];
   if($filename=="")
   {
       $fileName="";
   }
   else
   {
   $file_tmp = $_FILES['upload']['tmp_name'];
   $ext = pathinfo($filename,PATHINFO_EXTENSION);
   $fileName = time().'.'.$ext;
   $add = 'uploads/'.$fileName;
   }

   if($pass == $cpass)
   {
       //Insert image to tbimg table
       if($filename!="")
        {
        move_uploaded_file($file_tmp,$add);
        $qry1 = "Insert tbimg(File) values('$fileName')";
        $res1=mysqli_query($link,$qry1);
        //select query for fetching id from tbimg of that image
        if(mysqli_affected_rows($link)==1)
        {
        $qry2="select FileID from tbimg where File='$fileName'";
        $res2 = mysqli_query($link,$qry2);
        $r= mysqli_fetch_row($res2);
        $code = $r[0];
        }
        // echo"$code";
        }
    //save data in tbform 
        if($code!="")
        {
            //query for if image is not empty and email agr hai database m to error
        $qry="Insert tbform(FirstName,LastName,Email,Password,City,State,Gender,Hobbies,File) values('$fn','$ln','$eml','$encrt','$city','$state',$gender,'$hb',$code)";
        $res=mysqli_query($link,$qry);
        if(mysqli_affected_rows($link)==1)
        {
            echo'data saved';
        } 
        elseif($fn!="" && $ln!="" && $eml!="" && $pass!="" && $city!="" && $state!="" && $gender!= null && $hobbies !=""){
            echo'Email Already Exist';
        }
        else{
            echo'Please Fill All details';
        }
        //
    }
    else{
        //ye agr image ni choose ki hai to database m image feild empty rhe
        $code=" ";
        $qry="Insert tbform(FirstName,LastName,Email,Password,City,State,Gender,Hobbies,File) values('$fn','$ln','$eml','$encrt','$city','$state',$gender,'$hb',$code)";
        $res=mysqli_query($link,$qry);
        if(mysqli_affected_rows($link)==1)
        {
            echo'data saved';
        }
        else{
            if($fn!="" && $ln!="" && $eml!="" && $pass!="" && $city!="" && $state!="" && $gender!= null && $hobbies !="")
            {
                echo'Email Already Exist';
            }
            else{
                echo"Please Fill all details";
            }
        }
        /*   end          */
    }
    }
    //agr password aur cpass same nhi hai to ye error aaye
    else{
        echo'Password Not Match';
    }
   }
//    }
//    else{
//        echo"You Entered Wrong answer";
//    }
}
else{
    echo"Captcha Not entered";
}
}
// else
// {
//     $message = "Some error in vrifying g-recaptcha";
// echo $message;
// }
?>
<!DOCTYPE html>
<html>
    <head>
    <script src='https://www.google.com/recaptcha/api.js' async defer ></script>           
    </head>
    <body>
        <form action="form.php" method="post" name="frm" enctype="multipart/form-data" >
        <table border="4">
            <tr>
        <td>
            FirstName
        </td>
        <td><input type="text" name="txtfn"/></td>
        </tr>
        <tr>
        <td>LastName</td>      
        <td>
        <input type="text" name="txtln" />
        </td>
        </tr>
        <tr>
        <td> Email:</td>
        <td><input type="email" name="txteml"/></td>
        </tr>
        <tr>
           <td> Password:</td><td><input type="password" name="txtpass" autocomplete="off"/></td>
        </tr>
        <tr>

        <td>Confirm Password:</td><td><input type="password" name="txtcpass"/></td></tr>
        <tr>
        <td>City:</td><td><select name="cty">
            <option value="-1" >Select City</option>
            <option value="HMR">Hamirpur</option>
            <option value="Mum">Mumbai</option>
            <option value="Pune">Pune</option></td>
        </select></tr>
        <tr>
        <td>State</td>
        <td>
        <select name="sta">
            <option value="-1">Select State</option>
            <option value="HP">Himachal Pradesh</option>
            <option value="Pun">Punjab</option>
            <option value="UK">UttraKhand</option>
            <option value="HR">Haryana</option>
        </select></td></tr>
        <tr>
        <td>Gender:</td><td><input type="radio" name="r1" value="0"/>Male
        <input type="radio" name="r1" value="1"/>Female
        <input type="radio" name="r1" value="2" />Other</td>
        </tr>
        <tr>
        <td>Hobbies:</td><td><input type="checkbox" name="chk[]" value="Reading"/>Reading
        <input type="checkbox" name="chk[]" value="Running"/>Running
        <input type="checkbox" name="chk[]" value="Driving"/>Driving
        <input type="checkbox" name="chk[]" value="Sleeping"/>Sleeping</td>
        </tr>
        <tr>
            <td>
                Upload:
            </td>
            <td>
                <input type="file" name="upload" />
            </td>
        </tr>
        <tr>
            <td>
                Captcha:
            </td>
            <!-- <td> -->
                 <!--<?php
                  // $num1=rand(1,20);
                   //$num2=rand(1,20);
                  // echo"$num1 + $num2 ="; 
                ?>-->
                <!-- <input type="text" name="txtcap" />
                <input type='hidden' name="num1" value="<?php echo $num1 ?>"/>
                <input type='hidden' name="num2" value="<?php echo $num2 ?>"/> -->
                <td class="g-recaptcha" data-sitekey="6LcPp4AfAAAAAL2dQoiiOxI_tO0HaECnzeG60Wnk" data-callback='onSubmit' data-action='submit'>
            </td>
        </tr>
        <tr>
            <td colspan="2">
                <input type="submit" name="b1" value="Submit" id='submit'/>
                <a href="index.php" style="float: right;margin:0px 2px;">Login</a>
            </td>
        </tr>  
        </table>
        </form>
    </body>
</html>