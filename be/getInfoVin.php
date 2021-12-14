<?php
include '../vendor/connect.php';
<<<<<<< HEAD
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
$result = $connLaprap->query($sql);
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
$result = $connServer->query($sql);
while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
    $time[] = $row["Detect_Time"];
}
$sql_shop = "SELECT * FROM QC_INFORMATION_SHOP";
$result = $connServer->query($sql_shop);
while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
    $shop[] = $row["Shop_name"];
}
$inf4M = [];
$sql_4m = "SELECT *  FROM QC_INFORMATION_4M";
$result = $connServer->query($sql_4m);
while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
    $inf4M[] = $row['NAME'];
}



$tinhuong = [];
$sql_th = "SELECT *  FROM QC_INFORMATION_MANDF";
$result = $connServer->query($sql_th);
while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
    $tinhuong[] = $row['NAME'];
}
echo json_encode(['code' => 200, 'lot' => $lot, 'contractNo' => $contractNo, 'bodyType' => $bodyType, 'vincode' => $vincode_, 'time' => $time, 'shop' => $shop,'if4M'=>$inf4M,'tinhhuong'=>$tinhuong]);
return;
=======
$vinCode=$_POST['vincode'];
$vinCompl="";

if($vinCode=="")return;

if(strlen($vinCode)<8){
    echo json_encode(['code'=>202]);
    return;
}
if(strlen($vinCode)>17){
    $vinCode=substr($vinCode,17);
}

$lot=$contractNo=$bodyType=$vincode_="";
$sql="SELECT * FROM BodyData WHERE BarCode like '%".$vinCode."%'";
$result =$conn->query($sql);
if($row=$result->fetch(PDO::FETCH_ASSOC)){
    $lot=$row["LOT"]; $contractNo=$row["Contract"];$bodyType=$row["NameMode"]; $vincode_=$row["BarCode"];
    echo json_encode(['code'=>200,'lot'=>$lot,'contractNo'=>$contractNo,'bodyType'=>$bodyType,'vincode'=>$vincode_]);
    return;
}
else{
    echo json_encode(['code'=>201,'sql'=>$sql]);
    return;
}
>>>>>>> 2034723b6aef7fc9a195d824351160237a9cde5c
