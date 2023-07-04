<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    var_dump($_FILES);
    $file_count = count($_FILES['myfiles']['size']);
    $ext = ['pdf','docx','jpg'];
    $all_errors = [];
    if (isset( $_FILES['myfiles']['error'][0]) &&  $_FILES['myfiles']['error'][0] == 4) {
        $all_errors['noFile'] = 'Please select file';
    }else{
        for ($i=0; $i < $file_count; $i++) { 
            $tmpPath = $_FILES['myfiles']['tmp_name'][$i];
            $expload = explode('.',$_FILES['myfiles']['name'][$i]);
            $end_of = end($expload);
            $final_ext = strtolower($end_of);
            $fileName = uniqid().$_FILES['myfiles']['name'][$i];
      
          if (array_sum($_FILES['myfiles']['size']) > 8000000) {
            var_dump($_FILES['myfiles']['size']);
            $all_errors['FileSize'] = 'Please choose Files less than 8 mega';
          }
          else{
            if (! in_array($final_ext,$ext)) {
              $all_errors['FileExt'] = 'Please choose a word , jpg , pdf File';
            }
            else{
              move_uploaded_file($tmpPath, 'Uploads/' . $_FILES['myfiles']['name'][$i]);
            }
          }
        }
      }

    
    var_dump($file_count);
    


}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>File Uploader</title>
</head>
<body>
    <form method="post" enctype="multipart/form-data">
        <input type="file" name="myfiles[]" multiple>
        <button>Upload</button>

        <?php if(isset($all_errors) && !empty($all_errors)) : ?>
    <?php foreach($all_errors as $value) :?>
  <h1><?= $value ?></h1>
  <?php endforeach ?>
  
    <?php endif ?>
    </form>
</body>
</html>