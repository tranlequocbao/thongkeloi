<?php

// Check if image file is a actual image or fake image
date_default_timezone_set('Asia/Ho_Chi_Minh');

$target_dir = "../assets/img/QC/";



$path1 = $path2 = $result="";
$uploadOk = 1;
if (isset( $_FILES["file1"]["name"])) {
  $target_file = $target_dir . $_FILES["file1"]["name"];
  $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
  $check = getimagesize($_FILES["file1"]["tmp_name"]);
  if ($check !== false) {
    if (move_uploaded_file($_FILES["file1"]["tmp_name"], $target_file)) {
      $uploadOk = 1;
    } else {
      $uploadOk = 0;
    }
    if ($uploadOk == 1){
      $path1 = $target_file;
      
    } 
    else if ($uploadOk == 0) {
      echo json_encode(['code' => 201]);
      return;
    }
  } else {
    echo json_encode(['code' => 203]);
    return;
  }
}
if (isset($_FILES["file2"]["name"]) ) {
  $target_file1 = $target_dir . $_FILES["file2"]["name"];
  $imageFileType1 = strtolower(pathinfo($target_file1, PATHINFO_EXTENSION));
  $check = getimagesize($_FILES["file2"]["tmp_name"]);
  if ($check !== false) {

    if (move_uploaded_file($_FILES["file2"]["tmp_name"], $target_file1)) {
      $uploadOk = 1;
    } else {
      $uploadOk = 0;
    }
    if ($uploadOk == 1) {
      $path2 = $target_file1;
    } else if ($uploadOk == 0) {
      echo json_encode(['code' => 201]);
      return;
    }
  } else {
    echo json_encode(['code' => 203]);
    return;
  }
}
echo json_encode(['code'=>200,'pic1'=>$path1,'pic2'=>$path2]);

