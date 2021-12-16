<?php
include '../vendor/connect.php';
$shop=$xuong="";
$idShop_=$_POST["shop"];
$xuong_=$_POST["xuong"];
$to=[];
$time=$shop=$xuong="";


if($idShop_!="" &&$xuong_==""){
    $sql_xuong="SELECT QC_INFORMATION_SECTION.Section_name,QC_INFORMATION_SECTION.IDSection from QC_INFORMATION_SECTION,QC_INFORMATION_SHOP WHERE QC_INFORMATION_SHOP.IDShop=QC_INFORMATION_SECTION.IDShop AND QC_INFORMATION_SHOP.IDShop='".$idShop_."'";
    $result=$connServer->query($sql_xuong);
    while($row=$result->fetchAll(PDO::FETCH_ASSOC)){
        $xuong=$row;
    }
}
if($idShop_!="" && $xuong_!=""){
    $sql_to="SELECT QC_INFORMATION_STATION.Station_name, QC_INFORMATION_STATION.IDStation FROM QC_INFORMATION_STATION,QC_INFORMATION_SHOP WHERE QC_INFORMATION_STATION.IDShop=QC_INFORMATION_SHOP.IDShop AND QC_INFORMATION_SHOP.IDShop='".$idShop_."'";
    $result=$connServer->query($sql_to);
    while($row=$result->fetchAll(PDO::FETCH_ASSOC)){
        $to=$row;
    }
}
echo json_encode(['code'=>200,'shop'=>$idShop_,'xuong'=>$xuong,'to'=>$to]);
