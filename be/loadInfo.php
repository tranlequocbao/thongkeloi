<?php
include '../vendor/connect.php';
$shop=$xuong="";
$idShop_=$_POST["shop"];
$xuong_=$_POST["xuong"];
$to=[];
$time=$shop=$xuong=[];


if($idShop_!="" &&$xuong_==""){
    $sql_xuong="SELECT Section_name from QC_INFORMATION_SECTION,QC_INFORMATION_SHOP WHERE QC_INFORMATION_SHOP.IDShop=QC_INFORMATION_SECTION.IDShop AND QC_INFORMATION_SHOP.IDShop='".$idShop_."'";
    $result=$connServer->query($sql_xuong);
    while($row=$result->fetch(PDO::FETCH_ASSOC)){
        $xuong[]=$row["Section_name"];
    }
}
if($idShop_!="" && $xuong_!=""){
    $sql_to="SELECT Station_name FROM QC_INFORMATION_STATION,QC_INFORMATION_SHOP WHERE QC_INFORMATION_STATION.IDShop=QC_INFORMATION_SHOP.IDShop AND QC_INFORMATION_SHOP.IDShop='".$idShop_."'";
    $result=$connServer->query($sql_to);
    while($row=$result->fetch(PDO::FETCH_ASSOC)){
        $to[]=$row["Station_name"];
    }
}
echo json_encode(['code'=>200,'shop'=>$idShop_,'xuong'=>$xuong,'to'=>$to]);
