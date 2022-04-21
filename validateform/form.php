<?php 
session_start() ?>
<html>
<head>
<title></title>
</head>
<body>
<?php
	
   echo "First_Name :-".$_SESSION['firstname'] 
		 ."<br>Last_Name :-".$_SESSION['lastname'] 
		 ."<br>Email :-".$_SESSION['email'] 
		 ."<br>Password :-".$_SESSION['password'] 
		 ."<br>confirmpassword :-".$_SESSION['confirmpassword'] 
		 ."<br>city:-".$_SESSION['citynames'] 
		 ."<br>state :-".$_SESSION['statenames'] 
		 ."<br>country:-".$_SESSION['countrynames']
		 ."<br>gender :-".$_SESSION['gender']
		//  ."<br>hobby :-".
		//  foreach($_SESSION['hobby'] as $hobbies){
		// 	 echo $hobbies;
		//  }
		 ."<br>Image :- <img src='./upload/".$_SESSION['image']."'>"
		;
?> 

</body>
</html>