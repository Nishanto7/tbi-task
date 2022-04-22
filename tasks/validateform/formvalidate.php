<?php
session_start();
include_once("function.php");

$firstNameErr  = $lastNameErr = $emailErr = $passwordErr = $confirmPasswordErr = $cityNamesErr = $stateNamesErr = $countryNamesErr = $genderErr = $hobbyErr = "";
$firstname = $lastname = $email = $password = $confirmpassword = $citynames = $statenames = $countrynames = $gender = $hobby = "";
$test = true;
	
	if ($_SERVER['REQUEST_METHOD'] == "POST"){
	
   if (empty($_POST["firstname"])) {
    $firstNameErr = "First Name is required";
	$test=false;
  }
  
  if (empty($_POST["lastname"])) {
    $lastNameErr = "Last Name is required";
	$test=false;
  }
  
  if (empty($_POST["email"])) {
    $emailErr = "Email is required";
	$test=false;
  }
    
  if (empty($_POST["password"])) {
    $confirmPasswordErr = "Password is required";
	$test=false;
  }
  
  if (empty($_POST["confirmpassword"])) {
    $confirmPasswordErr = "Password is required";
	$test=false;
  }

  if (empty($_POST["citynames"])) {
    $cityNamesErr = "City is required";
	$test=false;
  }
  
   if (empty($_POST["statenames"])) {
    $stateNamesErr = "State is required";
	$test=false;
  }
  
   if (empty($_POST["countrynames"])) {
    $countryNamesErr = "Country is required";
	$test=false;
  }

  if (empty($_POST["gender"])){
    $genderErr = "Gender is required";
	$test=false;
  }
  
  if (empty($_POST["hobby"])) {
    $hobbyErr = "Hobbies are required";
	$test=false;
  }


if($test){
			$_SESSION['firstname'] = $_POST['firstname'];
			$_SESSION['lastname'] = $_POST['lastname'];
			$_SESSION['email'] = $_POST['email'];
			$_SESSION['password'] = $_POST['password'];
			$_SESSION['confirmpassword'] = $_POST['confirmpassword'];
			$_SESSION['citynames'] = $_POST['citynames'];
			$_SESSION['statenames'] = $_POST['statenames'];
			$_SESSION['countrynames'] = $_POST['countrynames'];
			$_SESSION['gender'] = $_POST['gender'];
			$_SESSION['hobby'] = $_POST['hobby'];


/*image*/
function resizeImage($resourceType,$image_width,$image_height,$resizeWidth,$resizeHeight) {
    // $resizeWidth = 100;
	// $resizeHeight = 100;
    $imageLayer = imagecreatetruecolor($resizeWidth,$resizeHeight);
    imagecopyresampled($imageLayer,$resourceType,0,0,0,0,$resizeWidth,$resizeHeight, $image_width,$image_height);
	return $imageLayer;
    }
	
	
	  if(isset($_POST["submit"])) {
                                 	$imageProcess = 0;
                                     if(is_array($_FILES)) {
                                         $new_width = "50";
                                         $new_height = "50";
                                         $filename = $_FILES['image']['tmp_name'];
                                         $sourceProperties = getimagesize($filename);
                                         $resizeFileName = time();
										 $fileExt = pathinfo($_FILES['image']['name'], PATHINFO_EXTENSION);

										 $new_name = rand() . time() . "." . $fileExt;

                                         $uploadPath = "./upload/";
										 $upload_image = $uploadPath . $new_name;
										 $_SESSION['image'] = $new_name;
                                         $uploadImageType = $sourceProperties[2];
                                         $sourceImageWidth = $sourceProperties[0];
                                         $sourceImageHeight = $sourceProperties[1];


										 if(move_uploaded_file($filename,$upload_image)){       
											createThumbnail($new_name, 50, 50, $uploadPath, $uploadPath);       
										}
									// if(move_uploaded_file($filename,$upload_image)){       

									// 	//  $thumb = imagecreatetruecolor(50,50);	
									// 	 list($width,$height) = getimagesize($upload_image);

									// 	if(preg_match('/[.](jpg|jpeg)/i', $_FILES['image']['name'])) {
									// 		$image_source = imagecreatefromjpeg($upload_image); 
                                    //         // $imageLayer = imagecopyresized($thumb,$image_source,0,0,0,0,50,50,$width,$height);
									// 		$imageLayer = resizeImage($resourceType,50,50,$new_width,$new_height);
                                    //         imagejpeg($thumb,$thumbnail_image,100);     
									// 	} else if (preg_match('/[.](gif)/i', $_FILES['image']['name'])) {
									// 		$image_source = imagecreatefromgif($upload_image); 
                                    //         // $imageLayer = imagecopyresized($thumb,$image_source,0,0,0,0,50,50,$width,$height);
									// 		$imageLayer = resizeImage($resourceType,50,50,$new_width,$new_height);
                                    //         imagegif($thumb,$thumbnail_image,100);
                                                 
									// 	} else if (preg_match('/[.](png)/i', $_FILES['image']['name'])) {
									// 		$image_source = imagecreatefrompng($upload_image); 
                                    //         // $imageLayer = imagecopyresized($thumb,$image_source,0,0,0,0,50,50,$width,$height);
									// 		$imageLayer = resizeImage($resourceType,50,50,$new_width,$new_height);
                                    //         imagepng($thumb,$thumbnail_image,9);
                                                 
									// 	} else {
									// 		$image_source = imagecreatefromjpg($upload_image); 
                                    //         // $imageLayer = imagecopyresized($thumb,$image_source,0,0,0,0,50,50,$width,$height);
									// 		$imageLayer = resizeImage($resourceType,50,50,$new_width,$new_height);
                                    //         imagejpg($thumb,$thumbnail_image,100);
									// 	}
											
                                    //     //  move_uploaded_file($fileName, $uploadPath. $resizeFileName. ".". $fileExt);
                                    //      $imageProcess = 1;
									// }	else{
									// 	echo 'no';
									// }
                                     }
                                 
                                 	if($imageProcess == 1){
                                 	?>
									   <hr>
                              <div>
                                 <div>
                                    <img src="<?php echo $uploadPath."thumb_".$resizeFileName.'.'. $fileExt; ?>">
                                 </div>
                                 <div>
                                    <img src="<?php echo $uploadPath.$resizeFileName.'.'. $fileExt; ?>" >
                               
                                 </div>
                              </div>
                              <?php
                                 }else{
                                 ?>
                              <?php
                                 }
                                 $imageProcess = 0;
                                 }
			header('location:form.php');
        	exit();
}
	}
?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="form.css">
    <title>Form</title>
  </head>
  <body>
  <div class="formheading">
  <h1>FORM<h1>
  </div>
  <div class="formdiv">
	<form method="POST" action="" enctype="multipart/form-data">
	<label>First Name</label>
	 <span class="error"><?php echo $firstNameErr;?></span><br>
	<input type="text" placeholder="Enter your First Name" name="firstname"><br><br>
	
	<label>Last Name</label>
	 <span class="error"><?php echo $lastNameErr;?></span><br>
	<input type="text" placeholder="Enter your Last Name" name="lastname"><br><br>
	
	<label>Email</label>
	 <span class="error"><?php echo $emailErr;?></span><br>
	<input type="email" placeholder="Enter your Email" name="email"><br><br>
	
	<label>Password</label>
	 <span class="error"><?php echo $passwordErr;?></span><br>
	<input type="text" placeholder="Enter your Password" name="password"><br><br>
	
	<label>Confirm Password</label>
	 <span class="error"><?php echo $confirmPasswordErr;?></span><br>
	<input type="text" name="confirmpassword"><br><br>
	
	<label for="city">Choose a City:</label>
	 <span class="error"><?php echo $cityNamesErr;?></span><br>

	<select name="citynames" id="city">
		<option value="">Select City</option>
		<option value="Ambala">Ambala</option>
		<option value="Patiala">Patiala</option>
		<option value="Delhi">Delhi</option>
		<option value="Mumbai">Mumbai</option>
		<option value="Banglore">Banglore</option>
		<option value="Hyderabad">Hyderabad</option>
	</select><br><br>
	
	<label for="state">Choose a State:</label>
	 <span class="error"><?php echo $stateNamesErr;?></span><br>

	<select name="statenames" id="state">
		<option value="">Select State</option>
		<option value="Haryana">Haryana</option>
		<option value="Punjab">Punjab</option>
		<option value="Himachal">Himachal</option>
		<option value="Gujrat">Gujrat</option>
		<option value="Uttar Pradesh">Uttar Pradesh</option>
		<option value="Tamil Nadu">Tamil Nadu</option>
	</select><br><br>
	
	<label for="country">Choose a Country:</label>
	 <span class="error"><?php echo $countryNamesErr;?></span><br>

	<select name="countrynames" id="country">
		<option value="">Select country</option>
		<option value="India">India</option>
		<option value="Australia">Australia</option>
		<option value="Brazil">Brazil</option>
		<option value="Egypt">Egypt</option>
		<option value="France">France</option>
		<option value="Italy">Italy</option>
	</select><br><br>
	
	<label>Gender:</label>
	 <span class="error"><?php echo $genderErr;?></span><br>
	<input type="radio" name="gender" value="female">
	<label>Female</label>
	<input type="radio" name="gender" value="male">
	<label>Male</label><br><br>
	
	<label>Hobbies:</label>
	 <span class="error"><?php echo $hobbyErr;?></span><br>
	<input type="checkbox" id="one" name="hobby[]" value="reading">
		<label for="one">Reading</label><br>
	<input type="checkbox" id="two" name="hobby[]" value="singing">
		<label for="two">Singing</label><br>
	<input type="checkbox" id="three" name="hobby[]" value="playing">
		<label for="three">Playing</label><br>
	<input type="checkbox" id="four" name="hobby[]" value="dancing">
		<label for="four">Dancing</label><br><br>
		
	<label>Image upload</label><br><br>
	<input type="file" name="image">
		<input type="submit" name="submit" value="Submit" class="submit">
	</form>
</div>
  </body>
</html>