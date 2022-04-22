<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="rotate.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="style1.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/6.0.0-beta.2/dropzone.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/6.0.0-beta.2/dropzone-min.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head> 
<body>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-xl-6 col-md-6 col-sm-10">
                <div class="card">
                    <div class="card-header">
                        Images
                    </div>
                    <div class="card-body">
                        <div class="col-md-12">  
                            <form id="image-upload" action="uploads.php" enctype="multipart/form-data">  
                                <div>  
                                    <h3>Upload Multiple Image By Click On Box</h3>    
                                </div>
                                <div id="media-uploader" class="dropzone dz-clickable ui-sortable dz-started" id="my-awesome-dropzone">
                                    
                                </div>
                                <input type="hidden" name="rotation" id="rotation" value="0"/>
                                <button type="button" class="btn btn-secondary" id="turn">Rotate</button>
                            </form>
                            <!-- <div class="#preview">
                                <img data-dz-thumbnail class="pic-view" height="200px" width="200px">
                            </div> -->
                            <!-- <div class="img-preview" style="display: none;">
                                <button id="turn"><i class="fa fa-rotate-right"></i></button>
                                <div id="imgPreview"></div>
                            </div> -->
                            <button type="submit" name="submit" id="uploadFile" class="btn btn-primary mt-2">Upload Files</button>  
                        </div>    
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- <script>
        // function filePreview(input) {
        //     if (input.files && input.files[0]) {
        //         var reader = new FileReader();
        //         reader.onload = function (e) {
        //             $('#imgPreview + img').remove();
        //             $('#imgPreview').after('<img data-dz-thumbnail src="'+e.target.result+'" class="pic-view" width="300" height="auto"/>');
        //         };
        //         reader.readAsDataURL(input.files[0]);
        //         $('.img-preview').show();
        //     }else{
        //         $('#imgPreview + img').remove();
        //         $('.img-preview').hide();
        //     }
        // }

        // $("#file").change(function (){
        //     var filePath = this.value;
        //     var allowExit = /(\.jpg|\.jpeg|\.gif|\.png)$/i;
        //     if(!allowExit.exec(filePath))
        //     {
        //         this.value = '';
        //     }
        //     filePreview(this);
        // });
    </script> -->
    <script>
        
        var rotation = 0;
        $("#turn").click(function() {
            rotation = (rotation -90) % 360;
            $("img").css({'transform': 'rotate('+rotation+'deg)'});
            
            if(rotation != 0){
                $("img").css({'width': '200px', 'height': 'auto'});
            }else{
                $("img").css({'width': 'auto', 'height': '200px'});
            }
            $('#rotation').val(rotation);
            //console.log($('#rotation').val(rotation));
        });
        $(function() {
            Dropzone.autoDiscover = false;
            var myDropzone = new Dropzone(".dropzone", {
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
                createImageThumbnails: true, 
                param: {name:'rotation'},                                                        
                init: function() {
                    myDropzone = this;
                    $("#uploadFile").click(function(){
                        myDropzone.processQueue();
                    });
                    this.on('sending', function(file, xhr, formData) {
                        var data = $('#image-upload').serializeArray();
                        
                        $.each(data, function(key, el) {
                            formData.append(el.name, el.value);
                        });
                    });
                    this.on("success", function(file,response) {
                
                        window.location.href = 'uploads.php';
                    });
                },
            });
        })
    </script>
</body>
</html>