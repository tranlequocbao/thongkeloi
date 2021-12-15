<?php
include '../vendor/connect.php';
$vinCode = $_POST['vincode'];
$vinCompl = "";

if ($vinCode == "") return;

if (strlen($vinCode) < 8) {
    echo json_encode(['code' => 202]);
    return;
}
if (strlen($vinCode) > 17) {
    $vinCode = substr($vinCode, 17);
}

$lot = $contractNo = $bodyType = $vincode_ = "";
$sql = "SELECT * FROM BodyData WHERE BarCode like '%" . $vinCode . "%'";
$result = $conn->query($sql);
if ($row = $result->fetch(PDO::FETCH_ASSOC)) {
    $lot = $row["LOT"];
    $contractNo = $row["Contract"];
    $bodyType = $row["NameMode"];
    $vincode_ = $row["BarCode"];
} else {
    echo json_encode(['code' => 201, 'sql' => $sql]);
    return;
}
$sql = "SELECT * FROM QC_INFORMATION_TIME";
$result = $conn->query($sql);
while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
    $time[] = $row["Detect_Time"];
}

$idShop="";
$sql_shop = "SELECT * FROM QC_INFORMATION_SHOP WHERE OK=1";
$result = $conn->query($sql_shop);
if ($row = $result->fetchAll(PDO::FETCH_ASSOC)) {
    $shop = $row;
   
}
$inf4M = [];
$sql_4m = "SELECT *  FROM QC_INFORMATION_4M";
$result = $conn->query($sql_4m);
while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
    $inf4M[] = $row['NAME'];
}



$tinhuong = '';
$sql_th = "SELECT *  FROM QC_INFORMATION_MANDF";
$result = $conn->query($sql_th);
while ($row = $result->fetchAll(PDO::FETCH_ASSOC)) {
    $tinhuong = $row;
}

$typeError = $idError=[];
$sql_type = "SELECT *  FROM QC_INFORMATION_ERROR";
$result = $conn->query($sql_type);
while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
    $typeError[] = $row['Error_name'];
    $idError[]=$row["IDError"];
}
echo json_encode(['code' => 200, 'lot' => $lot, 'contractNo' => $contractNo, 'bodyType' => $bodyType, 'vincode' => $vincode_, 'time' => $time, 'shop' => $shop,'if4M'=>$inf4M,'tinhhuong'=>$tinhuong,'typeError'=>$typeError,'idError'=>$idError]);
return;
