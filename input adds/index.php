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
                var txt = '<div class ="row " id= "row'+hide+'"><div class = "col-2 "><input type = "text" name= "txtf'+hide+'" class = "m-1" placeholder="Enter Text"/></div><div class = "col-2"><input type = "text" name= "txts'+hide+'" class = "m-1" placeholder="Enter Text"/></div><div class ="col-2"><input type="file" name="file'+hide+'" class="m-1"/></div>' + 
                '<div class = "col-2"><select name="sta'+hide+'"><option value="">Select State</option><option value="HP">HP</option><option value="PB">Punjab</option><option value="Chd">Chandigarh</option></select></div><div class="col-1"><span id="msg'+hide+'" style="color:red"></span></div><div class="col-2"><input type="button" class="btnremove" id="'+hide+'" value="Remove" onclick="remove()"/></div></div>';   
                $('#hide').val(hide);//added value of hidden input type
                $("#main").append(txt);// appended text box 
                });          
            });
    </script>

    </head>
    <body>
        <form method="post" name="inputForm" action = "post.php" enctype="multipart/form-data" onsubmit=" return formValidate()">
            <center>
        <button type="button" class="btn" name="add" id="add" style="border:1px solid">+</button>
        <div id="main">
        </div>
        <input type="submit" name="subBtn" id='submit' class="btn btn-success m-1"/>
        <input type="hidden" name="hide" id="hide" value="0"/><!--add k liye hidden-->
        <input type="hidden" name="removeNo[]" id="removeNo" value="0"/> <!--remove k liye hidden--->
            </center>
        </form>  
        <script>
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
    </script>
        <script>
            function formValidate(){
            var hideVal = $('#hide').val();//value of input type hidden
            // alert(hideVal);
            var removeVal = $('#removeNo').val();
            var errno=0;
            for(var i=1;i<=hideVal;i++)
            {
             if(i == removeVal)
             {
                 continue;
             }   
            var x = document.forms['inputForm']["txtf"+i].value;
            // alert(x);
            var y = document.forms['inputForm']["txts"+i].value;
            // alert(y);
            var z = document.forms['inputForm']["sta"+i].value;
            // alert(z);
            if( x != "" && y != "")
            {
                if(z == "")
                {
                var err= $('#msg'+i).text("Please Select state");
                errno +=1;
                //  alert(err);
                 }
                 else{
                    $('#msg'+i).text("");
                }
            }
            else{
                $("#msg"+i).text("");
            } 
            }
            if(errno>0)
            {
                return false;
            }
            }
    </script>
    </body>
</html>