<?php
include("heading.php");

?>
<div class='container p-5' style="font-size:x-large;">


<div class="border border-1 border-secondary text-secondary p-5">
    <h1 class="text-center text-success">
    <svg xmlns="http://www.w3.org/2000/svg" width="50" height="50" fill="currentColor" class="bi bi-clipboard-data text-success" viewBox="0 0 16 16">
  <path d="M4 11a1 1 0 1 1 2 0v1a1 1 0 1 1-2 0v-1zm6-4a1 1 0 1 1 2 0v5a1 1 0 1 1-2 0V7zM7 9a1 1 0 0 1 2 0v3a1 1 0 1 1-2 0V9z"/>
  <path d="M4 1.5H3a2 2 0 0 0-2 2V14a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V3.5a2 2 0 0 0-2-2h-1v1h1a1 1 0 0 1 1 1V14a1 1 0 0 1-1 1H3a1 1 0 0 1-1-1V3.5a1 1 0 0 1 1-1h1v-1z"/>
  <path d="M9.5 1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-3a.5.5 0 0 1-.5-.5v-1a.5.5 0 0 1 .5-.5h3zm-3-1A1.5 1.5 0 0 0 5 1.5v1A1.5 1.5 0 0 0 6.5 4h3A1.5 1.5 0 0 0 11 2.5v-1A1.5 1.5 0 0 0 9.5 0h-3z"/>
</svg> DATA </h1>
        <hr>

<?php
$store_img ="";
$item=array();
if($_SERVER["REQUEST_METHOD"]=="POST")
{
foreach($_FILES['imgdata']['name'] as $keys => $values)
{
  $fileName = $_FILES['imgdata']['name'][$keys];
  // echo "<br>File is $fileName";
  $store_img.=$fileName." ";

  if(move_uploaded_file($_FILES['imgdata']['tmp_name'][$keys],"img/".$values))
  {
    // echo "File uploaded success !";
  }

}
$str = $store_img;
echo"<br>";
// print_r(explode(" ",$str));
$imgName = explode(" ",$str);


$x=0;
$d=0;
$img_c=0;
foreach($_POST['mydata'] as $data)
{
  $imgName = explode(" ",$str);
$x=$x+1;

$r = $x%2;
if($r!=0)
{
 $y=$x;
 
 $d=$d+1;
 if($y>=1)
 {
     
     $y=$x-$d;
     $y=$y+1;
 }
 else
 {
     
 }
 
//  echo "<br>X is $x<br> D is $d<br>";
    
    echo "<br><b class='text-success'>(Row $y)</b>  $data,";
}
else
{
  $imgName = $imgName[$img_c];
  if($imgName=="")
  {
    echo "<b> $data</b>";
   
  }
  else
  {
    echo "<b> $data</b> <img src='./img/$imgName' width='100px' height='100px'>";
  }
   
    // echo " now x is $img_c";
    $img_c = $img_c+1;
}

}


}



?>

</div>
</div>


</body></html>