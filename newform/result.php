<?php
session_start();
    $fn= $_SESSION['firstname'];
    $ln=$_SESSION['lastname'];
    $email=$_SESSION['email'];
    $pass=$_SESSION['password'];
    $cpass=$_SESSION['confirmpassword'];
    $city=$_SESSION['city'];
    $state=$_SESSION['state'];
    $country=$_SESSION['country'];
    $gender=$_SESSION['gender'];
    $games=$_SESSION['games'];  
    $file=$_SESSION['uploaded_file'];  
    $file_name=$_SESSION['filename'];
    echo"<table border='4'>";
    echo"<tr>";
    echo "<th>FirstName</th><td>$fn</td></tr>";
    echo "<tr><th>LastName</th><td>$ln</td></tr>";
    echo "<tr><th>Email</th><td>$email</td></tr>";
    echo "<tr><th>Password</th><td>$pass</td></tr>";
    echo "<tr><th>Confirm Password</th><td>$cpass</td></tr>";
    echo "<tr><th>State</th><td>$state</td></tr>";
    echo "<tr><th>Country</th><td>$country</td></tr>";
    echo "<tr><th>City</th><td>$city</td></tr>";
    echo "<tr><th>Gender</th><td>$gender</td></tr>";
    echo"<tr><th>Games</th><td>";
    foreach ($games as $val){
        echo "$val"."  ";
    } 
    echo"</tr>";
    // $file_name=$_SESSION['filename'];
    // // echo"$file_name";
    // $file_tmp=$_SESSION['file_tmp'];
    // // echo"$file_tmp";
    
    //     if(move_uploaded_file($file_tmp,'file/'.$file_name))
        // {
            echo'<tr><th>File Uploaded</th><td><img src="file/'.$file_name.'"/></td></tr>';
        // } 
        // else{
        //     echo"File not uploaded";
        // }
?>