<!DOCTYPE html>
<html>
 <head>
<style>
  #file_input { display: none; }

.drop-zone {
  cursor: pointer;
  user-select: none;
  color: #555;
  font-size: 18px;
  width: 400px;
  padding: 50px 0;
  margin: 50px auto;
  border: 2px dashed #0087F7;
  border-radius: 5px;
  background: white;
}

.drop-zone.hover {
  background: #ddd;
  border-color: #aaa;
}

.drop-zone.error {
  background: #faa;
  border-color: #f00;
}

.drop-zone.drop {
  background: #afa;
  border-color: #00a1ff;
}

.drop-zone.drop > .title { display: none; }

.preview-container canvas { width: 150px; }

.file-uploader-progress-bar { margin: 0 20px; }

.file-uploader-progress-bar > * {
  background-color: #71a5f3;
  width: 0;
  height: 5px;
  border-radius: 5px;
}

.wrapper.uploading .progress { background-color: #8c8c8c; }
</style>
 </head>
 
<body>
  <form enctype="multipart/form-data" action="" method="post">
  <div id="drop_zone" class="drop-zone">
    <p class="title">Drop file here</p>
    <div class="preview-container"></div>
  </div>
  <input id="file_input" accept="image/*" type="file" multiple name="file">
</form>
<script src="//ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="jquery.smartuploader.js"></script>
<script>
   $("#file_input").withDropZone("#drop_zone", {
  action: {
    name: "image",
    params: {
      preview: true,
    }
  },
});
</script>
<script>
  $("#file_input").withDropZone("#drop_zone", {
  url: null,
  action: null,
  multiUploading: true,
  ifWrongFile: "show",
  maxFileSize: Number.POSITIVE_INFINITY,
  autoUpload: false,
  fileNameMatcher: /.*/,
  fileMimeTypeMatcher: /.*/,
  wrapperForInvalidFile: function(fileIndex) {
    return "<p>File: \"" + this.files[fileIndex].name + "\" doesn't support</p>'";
  },
  vali<a href="https://www.jqueryscript.net/time-clock/">date</a>Each: function(fileIndex) {
    return true;
  },
  validateAll: function(files) {
    return files;
  },
  uploadBegin: function(fileIndex, blob) {},
  uploadEnd: function(fileIndex, blob) {},
  done: function() {},
  ajaxSettings: function(settings, fileIndex, blob) {}
});
</script>
</body>
 
</html>