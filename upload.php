<?php
$folder_name= "upload/";
// upload pdf to folder upload
if(!empty ($_FILES)){
    $temp_file = $_FILES['file']['tmp_name'];
    $location= $folder_name.$_FILES['file']['name'];
    move_uploaded_file($temp_file,$location);
}

$result= array();
$files = scandir('upload');
$output= '<div class="row">';
// scan errors in scandir
if(false!== $files){
    foreach($files as $file){
        if('.'!=$file && '..'!=$file){
          $output.='<div class="col-med-2">
          <img src="'.$folder_name.$file.'" class="img-thumbnail" />
          <button type ="button" id="'.$file.'">Delete</button>
          </div>';
        }
    }
}
$output.='</div>';
echo $output;