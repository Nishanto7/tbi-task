<?php
session_start();
$username = '';
$email = '';
$drop = '';
$image = '';
if($_SERVER['REQUEST_METHOD'] == "POST")
{
   
    for($i=0;$i<count($_POST['username']);$i++) 
    {
        $rows[$i]['username'] = $_POST['username'][$i];
        $rows[$i]['email'] = $_POST['email'][$i];
        $rows[$i]['drop'] = $_POST['drop'][$i];
        $images = basename($_FILES['image']['name'][$i]);
        $picTmpName = $_FILES['image']['tmp_name'][$i];
        $imageExt = strtolower(pathinfo($images, PATHINFO_EXTENSION));
        $imagesNewName = time().'_'.$i.'.'.$imageExt;
        $picPath = 'uploads/'.$imagesNewName;
        $rows[$i]['image'] = $picPath;
        move_uploaded_file($picTmpName, $picPath);                         
            
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                                            
                <table class="table">
                    <tr>
                        <th>Id</th>
                        <th>Username</th>
                        <th>Email</th>
                        <th>Drop Value</th>
                        <th>User Pic</th>
                    </tr>
                <?php 
                    $i=1;
                    foreach($rows as $row) { 
                        echo '<tr>';
                        echo '<td>'.$i.'</td>';
                        echo '<td>'.$row['username'].'</td>';
                        echo '<td>'.$row['email'].'</td>';
                        echo '<td>'.$row['drop'].'</td>';
                        print_r('<td>'."<img src='$row[image]' height='100px' width='100px'>".'</td>');
                        echo '</tr>';
                        $i++;
                    }
                    ?>
                </table>
            </div>
        </div>
    </div>
</body>
</html>

