<?php
date_default_timezone_set('Asia/Ho_Chi_Minh');
include '../vendor/connect.php';
function getID($typeError){
    global $connServer;
    $id='';$stt='';$seq=0;
    $sql="SELECT TOP 1 SEQ FROM QC_INFOMATION_PROBLEMS ORDER BY SEQ DESC";
    $result=$connServer->query($sql);
    
    if($row=$result->fetch(PDO::FETCH_ASSOC)){
        $seq=(int)$row['SEQ'];
    }
    $seq=$seq+1;
    $id=date('Ymd');
    // $seq=(int)$stt; $seq+=1; $stt=(string)$seq;
    $id=date('Ymd').$typeError.$seq;
    $value=[0=>$id,1=>$seq];
    return $value;
}

$typeError = $_POST['typeError'];
$pic = $_POST['pic1'];
$pic2 = $_POST['pic2'];
$idLoad=$_POST['idLoad'];
$id= $idData='';
if($idLoad!=''){
    $id=$idLoad;
   
}
else{
    $idData = getID($typeError);


    $id=$idData[0];
}


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




echo json_encode(['code'=>200,'pic1' => $newName1, 'pic2' => $newName2,'id'=>$idData]);
return;
