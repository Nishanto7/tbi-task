<?php
//index.php
?>
<!DOCTYPE html>
<html>
 <head>
  <title></title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>        
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.5.1/dropzone.css" />
  <script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.5.1/dropzone.js"></script>
 </head>
 <body>
  <div class="container">
   <br/>
   <h3 align="center"></h3>
   <br/>
   <form class="dropzone" id="dropzoneFrom"> 
   </form>
   <input type="hidden" name="rotation" id="rotation" value="0"/>
   <button type="button" class="btn btn-secondary" id="turn">Rotate</button>
   <br/>
   <br/>
   <div align="center">
    <button type="submit" class="btn btn-info" id="submit-all">Upload</button>
   </div>
   <br/>
   <br/>
   <div id="preview"></div>
   <br/>
   <br/>
  </div>
 </body>
</html>
<script>
        var rotation = 0;
        $("#turn").click(function() {
            rotation = (rotation -90) % 360;
            $(".dz-image img").css({'transform': 'rotate('+rotation+'deg)'});
            
            if(rotation != 0){
                $(".dz-image img").css({'width': '200px', 'height': 'auto'});
            }else{
                $(".dz-image img").css({'width': 'auto', 'height': '200px'});
            }
            $('#rotation').val(rotation);  
        });
        $(function() {            
            Dropzone.autoDiscover = false;
            var myDropzone = new Dropzone(".dropzone", {
                url:"upload.php",
                method: "POST",
                paramName: "file",
                addRemoveLinks: true,  
                autoProcessQueue: false,  
                maxFilesize: 50000,
                parallelUploads: 15,
                maxFiles: 15,
                clickable: true,
                acceptedFiles: "image/*",
                acceptedFiles: ".jpeg,.jpg,.png,.gif,", 
                param: {name:'rotation'},                                                      
                init: function() {
                    myDropzone = this;
                    $("#submit-all").click(function(){
                        myDropzone.processQueue();
                    });
                    this.on('sending', function(file, xhr, formData) {
                        var data = $('#dropzoneFrom').serializeArray();
                        
                        $.each(data, function(key, el) {
                            formData.append(el.name, el.value);
                        });
                    });
                    this.on("success", function(file,response) {
                
                        window.location.href = 'display.php';
                    });
                },
            });
        })
    </script>