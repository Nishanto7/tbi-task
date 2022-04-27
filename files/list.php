<?php
include('conn.php');
session_start();
?>
<html>
    <head>
        <link rel = "stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"   integrity = "sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm"    crossorigin = "anonymous">
        <script>
            function change()
            {
                var hid = document.getElementById('hide').value;
                var rec = document.getElementById('txtrec').value;
                var val = document.getElementById('drop').value;
                if(rec>hid)
                {
                    var page = 1;
                    window.location.href = 'list.php?page='+page;
                }
                else{
                window.location.href = 'list.php?page='+val;
                document.getElementById('drop').val = val;
                }
            }
        </script>
    </head>
    <body>
        <form action="" name="list" method="POST" enctype="multipart/form-data" onsubmit="change()">
            <table class="table table-striped  table-hover">
                <tr>
                    <th>
                        Serial No.
                    </th>
                    <th>
                       FirstName
                    </th>
                    <th>LastName</th>
                    <th>Email</th>
                    <th>City</th>
                    <th>Gender</th>
                    <th>Hobbies</th>
                    <th>Image</th>
                </tr>
               <b>Enter Record:</b> <input type="text"  name="txt"  id='txtrec' class="my-4"/>
               <input type="submit" name="b1" class="btn btn-success mx-3" value="submit"/>
                 <?php
                 if(isset($_POST['b1']))
                 {           
                    $_SESSION['num']= $_POST['txt']; 
                 }
                 $resPerPage=$_SESSION['num'];
                //  else{
                //      $resPerPage = 5;
                //  }
                //  $resPerPage = 5;
                 //total no of result per
                 if(!isset($_POST['b1']))
                 {
                     if(isset($_SESSION['num']))
                     {
                         $resPerPage = $_SESSION['num'];
                     }
                     else{
                         $resPerPage = 5;
                     }
                 }
                 $qry1 = "select * from  tbform ";
                 $res1 = mysqli_query($link,$qry1);
                 $num_rows = mysqli_num_rows($res1);
                 echo"<input type ='hidden' id = 'hide' value =$num_rows/>";
                 //determine total no of pages
                 $num_of_pages = ceil($num_rows/$resPerPage);
                 if($_POST['txt']>$num_rows)
                 {
                     header("location:list.php?page=1");
                 } 
                 if(!isset($_REQUEST['page']))
                  {
                    $page = 1;
                  }
                 else{
                        $page = $_REQUEST['page'];
                  }
                    //determine the sql LIMIT starting number for the results on the displaying page  
                    $page_first_result = ($page-1) * $resPerPage;  
                    //retrieve the selected results from database   
                    $query = "select FirstName,LastName,Email,City,Gender,Hobbies,File,FileID,Image from tbform,tbimg where tbform.File = tbimg.FileID   LIMIT " . $page_first_result . ',' . $resPerPage;  
                    $result = mysqli_query($link, $query) or die(mysqli_error($link));  
                    //display the retrieved result on the webpage  
                    // while ($row = mysqli_fetch_array($result)) {  
                    //     echo $row[0] . ' ' . $row[1] . '</br>'; 
                    // $res = mysqli_fetch_array($result); 
                    // } 
                         
                //  $qry = "select FirstName,LastName,Email,City,Gender,Hobbies,Image from tbform,tbimg where tbform.File = tbimg.FileID";
                //  $res = mysqli_query($link,$qry) or die(mysqli_error($link));
                $start_from = ($page-1) * $resPerPage+1;
                 $i=$start_from;
                 while($r =mysqli_fetch_array($result)){
                    echo"<tr>";
                     echo"<td>  $i</td>";
                     echo "<td>  $r[FirstName]</td>";
                     echo "<td>  $r[LastName]</td>";
                     echo "<td>  $r[Email]</td>";
                     echo "<td>  $r[City]</td>";
                     echo "<td>  $r[Gender]</td>";
                     echo "<td>  $r[Hobbies]</td>";
                     echo "<td> <img src='uploads/".$r['Image']."' width ='100px' height='100px' /></td>";
                    echo"</tr>";
                    $i++;
                }    
                //display the link of the pages in URL  
                       
                 ?>
            </table>
            <center>
            <?php
           
                echo"<select name = 'drop' id ='drop' onchange ='change(this.value)'>";
                 for($page = 1; $page<= $num_of_pages; $page++) {
                      if(isset($_REQUEST['page'])&& $_REQUEST['page']==$page)
                      {  
                    echo '<option value ='.$page.' selected>' . $page . ' </a></option>';  
                      }
                      else{
                        echo '<option value ='.$page.'>' . $page . ' </a></option>';  
                      }
                } 
                echo"</select>";
            ?>  
            </center>
            <!-- <input type="button" name="back" value="Back" class="btn btn-danger mx-5" onclick="window.location.href='index.php'"/> -->
        </form> 

    </body>
</html>