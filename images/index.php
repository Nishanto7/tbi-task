<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
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
                        <form action="display.php" method="POST" enctype="multipart/form-data">
                            <div class="form-group mb-2">
                                <label for="image1" class="form-label">Image1</label>
                                <input type="file" class="form-control" name="image[]" id="image1">
                            </div>
                            <div class="form-group mb-2">
                                <label for="image2" class="form-label">Image2</label>
                                <input type="file" class="form-control" name="image[]" id="image2">
                            </div>
                            <div class="form-group mb-2">
                                <label for="image3" class="form-label">Image3</label>
                                <input type="file" class="form-control" name="image[]" id="image3">
                            </div>
                            <div class="form-group mb-2">
                                <label for="image4" class="form-label">Image4</label>
                                <input type="file" class="form-control" name="image[]" id="image4">
                            </div>
                            <div class="form-group mb-2">
                                <label for="image5" class="form-label">Image5</label>
                                <input type="file" class="form-control" name="image[]" id="image5">
                            </div>
                            <div class="form-group mb-2">
                                <label for="image6" class="form-label">Image6</label>
                                <input type="file" class="form-control" name="image[]" id="image6">
                            </div>
                            <div class="form-group mb-2">
                                <label for="image7" class="form-label">Image7</label>
                                <input type="file" class="form-control" name="image[]" id="image7">
                            </div>
                            <div class="form-group mb-2">
                                <label for="image8" class="form-label">Image8</label>
                                <input type="file" class="form-control" name="image[]" id="image8">
                            </div>
                            <div class="form-group mb-2">
                                <label for="image9" class="form-label">Image9</label>
                                <input type="file" class="form-control" name="image[]" id="image9">
                            </div>
                            <div class="form-group mb-2">
                                <label for="image10" class="form-label">Image10</label>
                                <input type="file" class="form-control" name="image[]" id="image10">
                            </div>
                            
                            <button type="submit" name="submit" class="btn btn-primary">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-sm-10">
                <div class="card">
                    <div class="card-header">
                        Images
                    </div>
                    <div class="card-body">
                        <div class="col-md-12">  
                            <form action="upload.php" method="POST" enctype="multipart/form-data" class="dropzone" id="image-upload">  
                                <div>  
                                    <h3>Upload Multiple Image By Click On Box</h3>    
                                </div>
                                
                                <input type="hidden" name="rotation" id="rotation" value="0"/>
                                <button type="button" class="btn btn-secondary" id="turn">Rotate</button>
                            </form>
                            <button type="submit" name="submit" id="uploadFile" class="btn btn-primary mt-2">Upload Files</button>
                        </div>    
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        function filePreview(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function (e) {
                    $('#imgPreview + img').remove();
                    $('#imgPreview').after('<img  src="'+e.target.result+'" class="pic-view" width="300" height="auto"/>');
                };
                reader.readAsDataURL(input.files[0]);
                $('.img-preview').show();
            }else{
                $('#imgPreview + img').remove();
                $('.img-preview').hide();
            }
        }

        $(".dz-hidden-input").change(function (){
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
        $(document).ready(function(){
            var rotation = 0;
            $("#turn").click(function() {
                rotation = (rotation -90) % 360;
                $("img").css({'transform': 'rotate('+rotation+'deg)'});
                
                if(rotation != 0){
                    $("img").css({'width': '300px', 'height': 'auto'});
                }else{
                    $("img").css({'width': 'auto', 'height': '300px'});
                }
                $('#rotation').val(rotation);
            });
            Dropzone.autoDiscover = false;
            var myDropzone = new Dropzone(".dropzone", {
                paramName: "file",
                method: "post",
                addRemoveLinks: true,   
                autoProcessQueue: false,  
                maxFilesize: 50000,
                parallelUploads: 15,
                maxFiles: 15,
                clickable: true,
                acceptedFiles: ".jpeg,.jpg,.png,.gif,",                            
                init: function() {
                    myDropzone = this;
                    let submitbtn = document.querySelector('#uploadFile');
                    myDropzone = this;
                    submitbtn.addEventListener("click", function(e) {
                        e.preventDefault();
                        e.stopPropagation();
                        myDropzone.processQueue();
                    });
                    this.on("sending", function(file, xhr, formData) {
                        let rotate = $('#rotation').val(rotation);
                        formData.append('rotation', rotate);                    
                    });                   
                },    
            });
            myDropzone.on("success", function(file,response) {
                window.location.href = 'upload.php';
            });
        })
        
    </script>
</body>
</html>