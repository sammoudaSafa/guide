<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="dropzone/dist/dropzone.js"></script>
    <link rel="stylesheet" type="text/css" href="dropzone/dist/dropzone.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

</head>

<body>
    <form action='upload.php' class="dropzone" id="dropzoneForm"><button type="submit" class="btn btn-info" id="submit-all">Uploader </button></form>
<div id ="preview">

</div>
</body>

</html>
<script>
    $(document).ready(function() {
        Dropzone.options.dropzoneForm = {
            autoProcessQueue: false,
            maxFilesize: 5, // MB
            maxFiles: 1,
            acceptedFiles: ".pdf",
            init: function() {
                var submitButton = document.querySelector('#submit-all');
                myDropzone = this;
                console.log('fait');
                submitButton.addEventListener("click", function() {
                    mydropzone.processQueue();
                });

                this.on("complete", function() {
                    if (this.getQueuedFiles().length == 0 && this.getUploadingFiles().length == 0) {
                        var _this = this;
                        _this.removeAllFiles();
                    }

                });

            },
        };
list_image();
     function list_image(){
         $.ajax({
             url:"upload.php",
             sucess:function(data){
                 $('#preview').html(data);
             }
         })
     }
    })
</script>