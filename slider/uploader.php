<!DOCTYPE html>
<html>
    <head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">   
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>  
 
    <script>
         $(document).ready(function(){
            var hide = 0;//hidden value
                $("#add").click(function(){
                hide += 1;
                var txt = '<div class ="row " id= "row'+hide+'"><div class ="col-2"><input type="file" name="file'+hide+'" class="m-1"/></div></div>';   
                $('#hide').val(hide);//added value of hidden input type
                $("#main").append(txt);// appended text box 
                });          
            });
    </script>
    </head>
    <body>
        <form method="post" action = "slider.php" enctype="multipart/form-data">
            <center>
        <button type="button" class="btn" name="add" id="add" style="border:1px solid">+</button>
        <div id="main">
        </div>
        <input type="submit" name="submit" id='submit' class="btn btn-success m-1"/>
        <input type="hidden" name="hide" id="hide" value="0"/><!--add k liye hidden-->
        <input type="hidden" name="removeNo[]" id="removeNo" value="0"/> <!--remove k liye hidden--->
            </center>
        </form>  
        <!-- <script>
        function remove(){
             $('.btnremove').click(function(){
              $(this).parent().parent().remove();
             let removeId=$(this).attr('id');
             const removeArr =[];
             removeArr.push(removeId);
            //  console.log(removeArr);
             $("#removeNo").val(removeArr);
          });
        }
    </script> -->
    </body>
</html>