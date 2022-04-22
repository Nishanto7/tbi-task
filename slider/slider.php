<html>
    <head>
    <link rel='stylesheet' href="style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">   
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    </head>    
    <body>
        <center>
        <div class="container">    
        <?php
            if(isset($_POST['submit']))
            {
                $total = $_REQUEST['hide'];
                for($i=1;$i<=$total;$i++)
                {
                    $fileName = $_FILES['file'.$i]['name'];
                    $fileTemp = $_FILES['file'.$i]['tmp_name'];
                    if(move_uploaded_file($fileTemp,'upload/'.$fileName))
                    {
                        echo'<div class="slideshow-container">';
                            echo'<div class="mySlides fade">';
                                echo'<img src="upload/'.$fileName.'">';
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