<?php
session_start();
if(isset($_POST['b1']))
{
  $file=$_FILES['img_logo']['name'];
  $file_tmp=$_FILES['img_logo']['tmp_name'];
  $filename=time()."_".$file;
  if(move_uploaded_file($file_tmp,'upload/'.$filename))
  {
    $_SESSION['filename']=$filename;
    header("location:upload.php");
  }
  else{
    echo"Image not upload";
  }

}
?>
<!DOCTYPE html>
<!-- Code By Webdevtrick ( https://webdevtrick.com ) -->
<html lang="en" >
<head>
  <meta charset="UTF-8">
  <title>Drag and Drop Image Upload | Webdevtrick.com</title>
  <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap.min.css'>
  <link rel="stylesheet" href="style.css">
</head>
<body>
 
<section>
  <form action="index.php" method="POST" enctype="multipart/form-data">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="form-group">
            <label class="control-label">Upload File</label>
            <div class="preview-zone hidden">
              <div class="box box-solid">
                <div class="box-header with-border">
                  <div><b>Preview</b></div>
                  <div class="box-tools pull-right">
                    <button type="button" class="btn btn-danger btn-xs remove-preview">
                      <i class="fa fa-times"></i> Reset The Field
                    </button>
                  </div>
                </div>
                <div class="box-body"></div>
              </div>
            </div>
            <div class="dropzone-wrapper">
              <div class="dropzone-desc">
                <i class="glyphicon glyphicon-download-alt"></i>
                <p>Choose an image file or drag it here.</p>
              </div>
              <input type="file" name="img_logo" class="dropzone">
            </div>
          </div>
        </div>
      </div>
 
      <div class="row">
        <div class="col-md-12">
          <button type="submit" class="btn btn-primary pull-right" name="b1">Upload</button>
        </div>
      </div>
    </div>
  </form>
</section>
<script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js'></script>
<script src='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/js/bootstrap.min.js'></script>
<script  src="function.js"></script>
</body>
</html>