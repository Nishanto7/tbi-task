<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="style1.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/6.0.0-beta.2/dropzone.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/6.0.0-beta.2/dropzone-min.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://unpkg.com/cropperjs/dist/cropper.css" rel="stylesheet"/>
    <script src="https://unpkg.com/cropperjs"></script>
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
                            <form id="image-upload">  
                                <div>  
                                    <h3>Upload Multiple Image By Click On Box</h3>    
                                </div>
                                <label class="col-md-12" >
                                    <div id="media-uploader" class="dropzone dz-clickable ui-sortable dz-started overly" id="cropBox"></div>
                                    <input type="file" name="file" id="upload_image" class="image" style="display: none;">
                                </label>
                                <input type="hidden" name="rotation" id="rotation" value="0"/>
                                <button type="button" class="btn btn-secondary" id="turn">Rotate</button>
                            </form>
                            <!-- <div class="cropBox">
                                <div id=imageCrop></div>
                            </div> -->
                            <button type="submit" name="submit" id="uploadFile" class="btn btn-primary mt-2">Upload Files</button>
                            <!-- Button trigger modal -->
                            <button type="button" class="btn btn-primary mt-2" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
                            Edit
                            </button>

                            <!-- Modal -->
                            <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="staticBackdropLabel">Crop image and Upload</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="img-container">
                                            <div class="row">
                                                <div class="col-md-8">
                                                    <img src="" id="sample_image" />
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="preview"></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                        <button type="button" id="crop" class="btn btn-primary">Upload</button>
                                    </div>
                                    </div>
                                </div>
                            </div>  
                        </div>    
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- <script>
        /*function filePreview(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function (e) {
                    $('#imageCrop + img').remove();
                    $('#imageCrop').after('<img src="'+e.target.result+'" class="pic-view" width="300" height="auto"/>');
                };
                reader.readAsDataURL(input.files[0]);
                $('.cropBox').show();
            }else{
                $('#imageCrop + img').remove();
                $('.cropBox').hide();
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
        });*/
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
	console.log(rotation);
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
                
                        window.location.href = 'rotatedimagedisplay.php';
                    });
                },
            });
        })
    </script>
</body>
</html>