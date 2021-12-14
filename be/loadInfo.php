<?php
include '../vendor/connect.php';
$shop=$xuong="";
$shop_=$_POST["shop"];
$xuong_=$_POST["xuong"];
$to=[];
$time=$shop=$xuong=[];
<<<<<<< HEAD


if($shop_!="" &&$xuong_==""){
    $sql_xuong="SELECT Section_name from QC_INFORMATION_SECTION,QC_INFORMATION_SHOP WHERE QC_INFORMATION_SHOP.IDShop=QC_INFORMATION_SECTION.IDShop AND QC_INFORMATION_SHOP.Shop_name='".$shop_."'";
    $result=$connServer->query($sql_xuong);
=======
$sql="SELECT * FROM QC_INFORMATION_TIME";
$result=$conn->query($sql);
$sql_xuong="";
while($row=$result->fetch(PDO::FETCH_ASSOC)){
    $time[]=$row["Detect_Time"];
   
}
$sql_shop="SELECT * FROM QC_INFORMATION_SHOP";
$result=$conn->query($sql_shop);
while($row=$result->fetch(PDO::FETCH_ASSOC)){
    $shop[]=$row["Shop_name"];
}
if($shop_!=""){
    $sql_xuong="SELECT Section_name from QC_INFORMATION_SECTION,QC_INFORMATION_SHOP WHERE QC_INFORMATION_SHOP.IDShop=QC_INFORMATION_SECTION.IDShop AND QC_INFORMATION_SHOP.Shop_name='".$shop_."'";
    $result=$conn->query($sql_xuong);
>>>>>>> 2034723b6aef7fc9a195d824351160237a9cde5c
    while($row=$result->fetch(PDO::FETCH_ASSOC)){
        $xuong[]=$row["Section_name"];
    }
}
<<<<<<< HEAD
if($shop_!="" && $xuong_!=""){
    $sql_to="SELECT Station_name FROM QC_INFORMATION_STATION,QC_INFORMATION_SHOP WHERE QC_INFORMATION_STATION.IDShop=QC_INFORMATION_SHOP.IDShop AND QC_INFORMATION_SHOP.Shop_name='".$shop_."'";
    $result=$connServer->query($sql_to);
=======
if($xuong_!=""){
    $sql_to="SELECT Station_name FROM QC_INFORMATION_STATION,QC_INFORMATION_SHOP WHERE QC_INFORMATION_STATION.IDShop=QC_INFORMATION_SHOP.IDShop AND QC_INFORMATION_SHOP.Shop_name='".$shop_."'";
    $result=$conn->query($sql_to);
>>>>>>> 2034723b6aef7fc9a195d824351160237a9cde5c
    while($row=$result->fetch(PDO::FETCH_ASSOC)){
        $to[]=$row["Station_name"];
    }
}
<<<<<<< HEAD
echo json_encode(['code'=>200,'shop'=>$shop_,'xuong'=>$xuong,'to'=>$to]);
=======
echo json_encode(['code'=>200,'time'=>$time,'shop'=>$shop,'xuong'=>$xuong,'to'=>$to]);
>>>>>>> 2034723b6aef7fc9a195d824351160237a9cde5c
