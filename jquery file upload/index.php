<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.form/4.3.0/jquery.form.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script>

        function preview_image()
        {
        var total_file=document.getElementById("images").files.length;
        for(var i=0;i<total_file;i++)
        {
        var img = $('#image_preview').append("<img src='"+URL.createObjectURL(event.target.files[i])+"' height='100px' width=' 100px'><br><br>");
        var rotate=$("#image_preview").append("<button class='rright'>Right</button>").append("<button class='rleft'>Left</button><br>");
        $(function() {
            var rotation = 0;
                $(".rright").click(function(){
                    rotation = (rotation -90) % 360;
                $("#image_preview img").css({'transform': 'rotate('+rotation+'deg)'});
                
                if(rotation != 0){
                    $("#image_preview img").css({'width': '100px', 'height': '100px'});
                }else{
                    $("#image_preview img").css({'width': '100px', 'height': '100px'});
                }
                $('#rotation').val(rotation);
                });            
            $(".rleft").click(function() {
                rotation = (rotation + 90) % 360;
                $("#image_preview img").css({'transform': 'rotate('+rotation+'deg)'});
                
                if(rotation != 0){
                    $("#image_preview img").css({'width': '100px', 'height': '100px'});
                }else{
                    $("#image_preview img").css({'width': '100px', 'height': '100px'});
                }
                $('#rotation').val(rotation);
            });
        });
        $(".btnsave").click(function(){
            $("img").addClass('d_none');
        });
        }
        }
        </script>
        <script>
           
        </script>
        <style>
            .d_none{
                display: none;
            }
        </style>
</head>
<body>
<div class="container">
    <div class="row ">
        <div class="col-md-6 mx-auto">
            <div class="card mt-5">
                <div class="card-header bg-light">
                    <h4 class="font-weight-bold"> Multiple Images Upload</h4>
                </div>
                <div class="card-body">
                    <form method="post" action="upload.php" enctype="multipart/form-data">
                         <div class="custom-file">
                            <input type="file" class="custom-file-input" id="images" name="image[]" onchange="preview_image();" multiple="" style="height: 100px; width:200px">
                            <label class="custom-file-label" for="customFile">Choose images</label>
                          </div>
                     <input class="btn btn-success mt-2" type="submit" name="submit">
                     <input type="hidden" name="rotation" id="rotation" value="0"/>
                    </form>
                </div>
            </div>
                    <div id="image_preview"></div>
        </div>
    </div>
</div>
<script>
// Add the following code if you want the name of the file appear on select
$(".custom-file-input").on("change", function() {
  var fileName = $(this).val().split("\\").pop();
  $(this).siblings(".custom-file-label").addClass("selected").html(fileName);
}); 
</script>
</body>
</html>