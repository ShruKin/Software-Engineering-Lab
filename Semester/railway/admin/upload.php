<?php
function upload_file($target_dir, $files)
{
  // for image upload
  // $target_dir = "../uploads/";
  $allowed_exts = array('gif', 'png', 'jpg', 'jpeg');

  $target_file = $target_dir . basename($files["pic"]["name"]);
  $ext = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

  if (!in_array($ext, $allowed_exts)) {
    echo "The file you are trying to upload is not an Image";
    return;
  }

  if ($files['pic']['size'] > 2097152) {
    echo "The file you are trying to upload is greater than 2MB in size";
    return;
  }

  $name = md5(time() . rand()) . "." . $ext;
  $rename = $target_dir . $name;

  move_uploaded_file($files["pic"]["tmp_name"], $rename);

  return $name;
}
