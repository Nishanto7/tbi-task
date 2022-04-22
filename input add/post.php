<html>
    <head>
    <link rel='stylesheets' href="style.css">
    </head>    
    <body>
        <center>
        <div class="container">    
        <?php
            if(isset($_POST['submit']))
            {
                $total = $_REQUEST['total'];
                for($i=1;$i<=$total;$i++)
                {
                    $fileName = $_FILES['slider'.$i]['name'];
                    $fileTemp = $_FILES['slider'.$i]['tmp_name'];
                    if(move_uploaded_file($fileTemp,'upload2/'.$fileName))
                    {
                        echo'<div class="slideshow-container">';
                        echo'<div class="mySlides fade">';
                        echo'<img src="upload2/'.$fileName.'" width="400px" height="400px" style="border-radius:5px;border:1px solid">';
                        echo'</div>';     
                        echo'</div>';
                    }
                }    
            }
        ?>
         <a class="prev" onclick="plusSlides(-1)" style="color:cornflowerblue;border:1px solid black;margin:10px;">Previous</a>
         <a class="next" onclick="plusSlides(1)" style="color:cornflowerblue;border:1px solid black;margin:10px;">Next</a>
         </div>
        <script>
let slideIndex = 1;
showSlides(slideIndex);

function plusSlides(n) {
  showSlides(slideIndex += n);
}

function currentSlide(n) {
  showSlides(slideIndex = n);
}

function showSlides(n) {
  let i;
  let slides = document.getElementsByClassName("mySlides");
//   let dots = document.getElementsByClassName("dot");
  if (n > slides.length) {slideIndex = 1}    
  if (n < 1) {slideIndex = slides.length}
  for (i = 0; i < slides.length; i++) {
    slides[i].style.display = "none";  
  }
//   for (i = 0; i < dots.length; i++) {
//     dots[i].className = dots[i].className.replace(" active", "");
//   }
  slides[slideIndex-1].style.display = "block";  
  dots[slideIndex-1].className += " active";
}
</script>
</center>
</body>
</html>
<?php
if(isset($_POST["submit"]))
{
    $total=$_REQUEST["total"];
    //print_r($total);
    // $hiddenval=$_REQUEST["remove"];
    //print_r($hiddenval);
    echo "<table border='4'>";
    echo "<tr><th>First</th><th>Second</th><th>State</th><th>File</th></tr>";
    for($i=1;$i<=$total;$i++)
    {
        if(in_array("$i",$hiddenval)){
            continue;
        }
        else{
     $txtval = $_POST["txtval".$i];
	 $txtval2 = $_POST["txt_val".$i];
     $txtval3 =$_POST["state".$i];
      //$txtval3 = $_FILES["image".$i]["name"];
      $file_name=$_FILES['image'.$i]['name'];
      $file_size=$_FILES['image'.$i]['size'];
      $file_tmp=$_FILES['image'.$i]['tmp_name'];
      $file_type=$_FILES['image'.$i]['type'];
      $ext = pathinfo($file_name, PATHINFO_EXTENSION);
  
      //$date=time();
      //$filename=$date. '.' . $ext;
      $filename=$file_name;
      $add="upload1/".$filename;
  
      move_uploaded_file($file_tmp,$add);
      
         // echo '<img src="upload1/'.$filename.'"><br>';
  
      $n_width = '50'; // Fix the width of the thumb nail images
      $n_height= '50'; // Fix the height of the thumb nail imaage
      //function thumbnail($n_width,$n_height)
      
          $tsrc="thumbnail1/".$GLOBALS['filename'].""; // Path where thumb nail image will be stored
        //   if (!($GLOBALS['file_type'] =="image/jpeg" OR $GLOBALS['file_type']=="image/png"))
        //   {
        //   echo "Your uploaded file must be of JPEG. Other file types are not allowed<BR>";
        //   exit;
        //   }
          if($GLOBALS['file_type']=="image/jpeg"){
              $im=ImageCreateFromJPEG($GLOBALS['add']);
              $width=ImageSx($im); // Original picture width is stored
              $height=ImageSy($im); // Original picture height is stored
              $n_height=($n_width/$width) * $height;
              $newimage=imagecreatetruecolor($n_width,$n_height);
              imageCopyResized($newimage,$im,0,0,0,0,$n_width,$n_height,$width,$height);
              ImageJpeg($newimage,$tsrc);
              chmod($tsrc,0777);
              //echo'<img src="thumbnail1/'.$GLOBALS['filename'].'"><br>';
          }
          if($GLOBALS['file_type']=="image/png"){
              $im=ImageCreateFromPNG($GLOBALS['add']); 
              $width=ImageSx($im);              // Original picture width is stored
              $height=ImageSy($im);             // Original picture height is stored
              // Add this line to maintain aspect ratio
              $n_height=($n_width/$width) * $height; 
              $newimage=imagecreatetruecolor($n_width,$n_height);                 
              imageCopyResized($newimage,$im,0,0,0,0,$n_width,$n_height,$width,$height);
              Imagepng($newimage,$tsrc);
              chmod("$tsrc",0777);
              //echo'<img src="thumbnail1/'.$GLOBALS['filename'].'"><br>';
          }            
      echo "<tr>";
      echo "<td>";
      echo "$txtval";
      echo "</td>";
      echo "<td>";
      echo "$txtval2";
      echo "</td>";
      echo "<td>";
      echo "$txtval3";
      echo "</td>";
      echo "<td>";
      echo '<img src="upload1/'.$GLOBALS['filename'].'" width="100px" height="100px">';
      echo "</td>";
      echo "</tr>";
            }
    }
    echo "</table>";
}
?>
