<?php
session_start();
if(!isset($_SESSION['firstname']))
{
    header("location:first.php");
}
if(!isset($_SESSION['lastname']))
{
    header("location:lastname.php");
}
if(!isset($_SESSION['email']))
{
    header("location:email.php");
}
if(!isset($_SESSION['password']))
{
    header("location:password.php");
}
if(!isset($_SESSION['confirmpassword']))
{
    header("location:confirm.php");
}
if(!isset($_SESSION['country']) || $_SESSION['country']==-1)
{
    header("location:country.php");
}
if(!isset($_SESSION['state']) || $_SESSION['state']==-1)
{
    header("location:state.php");
}
if(!isset($_SESSION['city']) || $_SESSION['city']==-1)
{
    header("location:city.php");
}
if(!isset($_SESSION['gender']))
{
    header("location:gender.php");
}
if(!isset($_SESSION['games']))
{
    header("location:games.php");
}
if(!isset($_SESSION['filename']))
{
    header("location:upload.php");
}
$firstname=$_SESSION['firstname'];
$lastname=$_SESSION['lastname'];
$email=$_SESSION['email'];
$password=$_SESSION['password'];
$cpassword=$_SESSION['confirmpassword'];
$city=$_SESSION['city'];
$country=$_SESSION['country'];
$state=$_SESSION['state'];
$gender=$_SESSION['gender'];
$games=$_SESSION['games'];
$name=$_SESSION['filename'];
$file_tmp=$_SESSION['file_tmp'];
echo"Fisrtname:$firstname<br>";
echo"LastName:$lastname<br>";
echo"Email:$email<br>";
echo"Password:$password<br>";
echo"Confirm Password:$cpassword<br>";
echo"City:$city<br>";
echo"State:$state<br>";
echo"Country:$country<br>";
echo"Gender:$gender<br>";
echo"Games:";
foreach($games as $game)
{
    echo"$game"." ";
}
echo"<br>";
// if(move_uploaded_file($file_tmp,'files/'.$name))
// {
    echo'Uploaded File:<img src="file/'.$name.'"/>';
// }
// else{
//     echo"File Not Uploaded";
// }

?>