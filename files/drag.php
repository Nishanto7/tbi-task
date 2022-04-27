<?php
include('conn.php');
session_start();
?>
<html>
    <head>
        <link rel = "stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"   integrity = "sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm"    crossorigin = "anonymous">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
    </head>
    <body>
        <form action="" name="list" method="POST" enctype="multipart/form-data" onsubmit="change()">
            <table class="table table-striped  table-hover table-dark">
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
             
               <tbody class="position">
                 <?php

                 $qry = "select * from  tbform,tbimg where tbform.File = tbimg.FileID order by Sort ";
                 $res = mysqli_query($link,$qry);

                    $i =1;
                    while($r =mysqli_fetch_array($res)){
                        echo"<tr id =".$r['ID'].">";
                        echo"<td>  $i</td>";
                        echo "<td >  $r[FirstName]</td>";
                        echo "<td >  $r[LastName]</td>";
                        echo "<td >  $r[Email]</td>";
                        echo "<td >  $r[City]</td>";
                        echo "<td >  $r[Gender]</td>";
                        echo "<td >  $r[Hobbies]</td>";
                        echo "<td > <img src='uploads/".$r['Image']."' width ='100px' height='100px' /></td>";
                        echo"</tr>";
                        $i++;
                }    
             
                       
                 ?>
                 </tbody>
            </table>
            <center>
            <?php
                   //display the link of the pages in URL  
                // echo"<select name = 'drop' id ='drop' onchange ='change(this.value)'>";
                //  for($page = 1; $page<= $num_of_pages; $page++) {
                //       if(isset($_REQUEST['page'])&& $_REQUEST['page']==$page)
                //       {  
                //     echo '<option value ='.$page.' selected>' . $page . ' </option>';  
                //       }
                //       else{
                //         echo '<option value ='.$page.'>' . $page . ' </option>';  
                //       }
                // } 
                // echo"</select>";
            ?>  
            </center>
            <!-- <input type="button" name="back" value="Back" class="btn btn-danger mx-5" onclick="window.location.href='index.php'"/> -->
        </form> 
        <!-- <script type="text/javascript">
         $(document).ready(function(){
             $(".position").sortable(function(){
             $("tr").mousedown(function(){
                      
             });
            });
         });
</script> -->
<script type="text/javascript">
    // $( ".position" ).sortable({
    //     delay: 150,
    //     stop: function() {
    //         var selectedData = new Array();
    //         $('.position>tr').each(function() {
    //             selectedData.push($(this).attr("id"));
    //         });
    //         updateOrder(selectedData);
    //     }
    // });
    // function updateOrder(data) {
    //     $.ajax({
    //         url:"ajax.php",
    //         type:'post',
    //         data:{position:data},
    //         success:function(){
    //             alert('your change successfully saved');
    //         }
    //     })
    // }
    $(document).ready(function(){
        $(".position").sortable({
            placeholder :"ui-state-highlight",
            update : function(event, ui)
            {
                var page_id = new Array();
                $(".position tr").each(function(){
                    page_id.push($(this).attr("id"));
                });
                $.ajax({
                    url :"ajax.php",
                    method:"post",
                    data:{page_id : page_id},
                    success:function(data)
                    {
                        // alert(data);
                    }
                })
            }
        });
    });
</script>
    </body>
</html>