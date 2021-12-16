<?php
date_default_timezone_set('Asia/Ho_Chi_Minh');
$vincode = $_POST['vincode'];
$pic = $_POST['pic1'];
$pic2 = $_POST['pic2'];
$id = $_POST['id'];

$allValue1=$allValue2=$lastValue1=$lastValue12=$arryFile1=$arryFile2="";
$newName1 = $newName2 = "";
if ($pic != '') {
    $arryFile1 = explode('/', $pic);
    array_pop($arryFile1);
    array_push($arryFile1, $id . '-1.jpg');
    foreach ($arryFile1 as $value) {

        if ($newName1 == '') {
            $newName1 = $value;
        } else $newName1 = $newName1 . '/' . $value;
    }
    
rename($pic, $newName1);

$allValue1=array_values($arryFile1);
$lastValue1=end($allValue1);
}
if ($pic2 != '') {
    $arryFile2 = explode('/', $pic2);
    array_pop($arryFile2);
    array_push($arryFile2, $id . '-2.jpg');

    foreach ($arryFile2 as $value) {
        if ($newName2 == '') {
            $newName2 = $value;
        } else $newName2 = $newName2 . '/' . $value;
    }
    rename($pic2, $newName2);
    $allValue2=array_values($arryFile2);

$lastValue2=end($allValue2);
}




echo json_encode(['pic1' => $newName1, 'pic2' => $newName2]);
return;
