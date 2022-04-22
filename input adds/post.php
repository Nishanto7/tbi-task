<?php
if(isset($_POST['subBtn']))
{
    $count=$_POST['hide'];
    {
    for($i=1;$i<=$count;$i++)
    {
    $rows[$i]['txt1']=$_POST["txtf".$i];
    $rows[$i]['txt2']=$_POST["txts".$i];
    $rows[$i]['state']=$_POST["sta".$i];
    $images=$_FILES["file".$i]['name'];
    $tempName=$_FILES["file".$i]['tmp_name'];
    $ext= strtolower(pathinfo($images, PATHINFO_EXTENSION));
    $newFile = time().'_'.$i.'.'.$ext;
    $path='uploads/'.$newFile;
    $rows[$i]['file']=$path;
    move_uploaded_file($tempName, $path);
}   
    }
echo"<table border='3'>";
echo"<tr>";
echo'<th>First</th>';
echo'<th>Second</th>';
echo'<th> State </th>';
echo'<th> File </th>';
echo'</tr>';
foreach($rows as $row)
{
    echo'<tr>';
    echo '<td>'.$row['txt1'].'</td>';
    echo '<td>' .$row['txt2'].'</td>';
    echo '<td>' .$row['state'].'</td>';
    echo '<td>'."<img src=$row[file] height='100px' width='100px'/>".'</td>';
    echo'</tr>';
}
echo"</table>";
}
?>