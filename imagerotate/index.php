<!DOCTYPE html>

<html xmlns="http://www.w3.org/1999/xhtml" lang="en-US">
<head>
	
    <title>jQuery to Preview and Rotate an Image Before Upload using PHP | Tutorialswebsite </title>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    </head>
    <body>
    <form method="post" action="upload.php" enctype="multipart/form-data">
        <input type="file" name="file" id="file" />
        <input type="hidden" name="rotation" id="rotation" value="0"/>
        <input type="submit" name="submit" value="Upload"/>
    </form>
    <div class="img-preview" style="display: none;">
        <button id="rleft">Left</button>
        <button id="rright">Right</button>
        <div id="imgPreview"></div>
    </div>
    <script>
        function filePreview(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function (e) {
                    $('#imgPreview + img').remove();
                    $('#imgPreview').after('<img src="'+e.target.result+'" class="pic-view" width="300" height="auto"/>');
                };
                reader.readAsDataURL(input.files[0]);
                $('.img-preview').show();
            }else{
                $('#imgPreview + img').remove();
                $('.img-preview').hide();
            }
        }

        $("#file").change(function (){
            var filePath = this.value;
            var allowExit = /(\.jpg|\.jpeg|\.gif|\.png)$/i;
            if(!allowExit.exec(filePath))
            {
                this.value = '';
            }
            filePreview(this);
        });
    </script>

    <script>

        $(function() {
                var rotation = 0;
                $("#rright").click(function() {
                    rotation = (rotation -90) % 360;
                    $(".pic-view").css({'transform': 'rotate('+rotation+'deg)'});
                    
                    if(rotation != 0){
                        $(".pic-view").css({'width': '300px', 'height': 'auto'});
                    }else{
                        $(".pic-view").css({'width': 'auto', 'height': '300px'});
                    }
                    $('#rotation').val(rotation);
                });
                
                $("#rleft").click(function() {
                    rotation = (rotation + 90) % 360;
                    $(".pic-view").css({'transform': 'rotate('+rotation+'deg)'});
                    
                    if(rotation != 0){
                        $(".pic-view").css({'width': '300px', 'height': 'auto'});
                    }else{
                        $(".pic-view").css({'width': 'auto', 'height': '300px'});
                    }
                    $('#rotation').val(rotation);
                });
            });
        
        </script>
</body>
</html>
