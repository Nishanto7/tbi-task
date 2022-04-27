<?php 


include('conn.php');


$position = $_POST['page_id'];


// $i=1;
// foreach($position as $k=>$v){
//     $sql = "Update tbform SET Sort =".$i." WHERE id=$v";
//     $mysqli->query($sql);
// 	$i++;
// }
for($i = 0; $i<count($_POST['page_id']); $i++)
{
  $qry ="update tbform set Sort ='".$i."' where ID = '".$_POST['page_id'][$i]."'";
  mysqli_query($link,$qry); 
//   header("refresh:3"); 
}
// echo'Sorted updated';
?>