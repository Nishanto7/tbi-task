<?php
$files= scandir('uploads');
if($files !=="")
{
    foreach($files as $file)
    {
        unlink('uploads/'.$file);
    }
}
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
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<!-- <script>
function RotateImageMethod(degree) {
    
    $('.dz-image img').animate({  transform: degree }, 
	{
    step: function(now,fx) 
    {
        $(this).css({
            '-webkit-transform':'rotate('+now+'deg)',
            '-moz-transform':'rotate('+now+'deg)',
            'transform':'rotate('+now+'deg)'
        });
    }
    });
}
</script> -->
<script>
window.addEventListener( "pageshow", function ( event ) {
  var historyTraversal = event.persisted || 
                         ( typeof window.performance != "undefined" && 
                              window.performance.navigation.type === 2 );
  if ( historyTraversal ) {
    // Handle page restore.
    window.location.reload();
  }
});

</script>

<script>
    $(function() {
    var rotate = 0;
    $("#turn").click(function() {
        rotate = (rotate + 90) % 360;
        $(".dz-image img").css({'transform': 'rotate('+rotate+'deg)'});
		
        if(rotate != 0){
            $(".dz-image img").css({'width': '100px', 'height': '100px'});
        }else{
            $(".dz-image img").css({'width': '100px', 'height': '100px'});
        }
        $('#rotation').val(rotate);
        // document.getElementById('rotation').value= rotation;
        // console.log(rotation);
    });
});
</script>
 </head>
 <body>
  <div class="container">
   <br />
   <h3 align="center"></h3>
   <br/>
   <form action="upload.php" class="dropzone" id="dropzoneFrom"> 
    <input type="hidden" name="rotation" id="rotation" value="0"/>
   </form>
    <div class="img-preview">
    <button id="turn">Rotate </button>
    <div id="imgPreview"></div>
    <br />
   <br />
   <div align="center">
    <button type="submit" class="btn btn-info" id="submit-all">Upload</button>
    </div>
   </div>
   <br />
   <br />
   <div id="preview"></div>
   <br />
   <br />
  </div>
 </body>
</html>

<script>
var rotation = $('#rotation').val();
 Dropzone.options.dropzoneFrom = { 
  autoProcessQueue: false,
  method:'post',
  parallelUploads:20,
  addRemoveLinks:true,
  clickable:true,
  paramName: "file",
  param: {name:rotation},
  acceptedFiles:".png,.gif,.jpeg,.jpg",
  init: function(){
   var submitButton = document.querySelector('#submit-all');
   myDropzone = this;
   submitButton.addEventListener("click", function(e){
    e.preventDefault();
    e.stopPropagation();
    myDropzone.processQueue();
   });
   this.on('sending',function(file, xhr, formData){
        var data= $('#dropzoneFrom').serializeArray();

        $.each(data, function(key, el){
            formData.append(el.name,el.value);
        });
   });
   this.on("success", function(file,response){
                
    // if(this.getQueuedFiles().length == 0 && this.getUploadingFiles().length == 0)
    // {
    //  var _this = this;
     window.location.href="display.php"

    // }
    // list_image();
   });
  },
 };
//  list_image();

//  function list_image()
//  {
//   $.ajax({
//    url:"upload.php",
//    success:function(data){
//     $('#preview').html(data);
//    }
//   });
//  }
</script>
