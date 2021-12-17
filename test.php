<?php
include 'vendor/connect.php';

$id='20211217BDERROR10837';$vincode='RN2B12SAAMM066075';$type='All-New Mazda3 1.5 Luxury';
 $time='12-17-2021 20:22:15';$nameShop='BODY SHOP';$nameXuong="";$nameTo="";$positionDetect='';$amountError='1';
 $nameError='Lỗi khác  /Other ';$description="";$path1="";$human="";$timeError="";
         $timeProduct="";$lot="259       ";$inf4M="Man/Con người";$reason="";$solution="";$note="";$seq="837";
         $nameTinhhuong="";$report="0";$contractNo="VN-2102JM";$path2="";$level="";


try{
    $insert="INSERT INTO QC_INFOMATION_PROBLEMS(ID,VIN_CODE,MODEL,DATETIME,SHOP,SECTION,STATION,POSITION,AMOUNT_ERROR,TYPE_ERROR,DESC_ERROR,IMG,RESPON,DETECT_TIME,PRODUCT_TIME,LOT,M4M,CAUSE,SOLUTED,NOTE,SEQ,KINDMAN,Report,CONTRACT_NO,IMG2,LEVEL)
    VALUES (?,?,?,?,?,?,?,?,?,N?,?,?,?,?,?,?,N?,?,?,?,?,?,?,?,?)";
         
         $params=array($id,$vincode,$type, $time,$nameShop,$nameXuong,$nameTo,$positionDetect,$amountError,$nameError,$description,$path1,$human,$timeError,
         $timeProduct,$lot,$inf4M,$reason,$solution,$note,$seq,$nameTinhhuong,$report,$contractNo,$path2,$level);
    
         $insertReview=$connServer->prepare($insert);
         $insertReview->execute([$id,$vincode,$type, $time,$nameShop,$nameXuong,$nameTo,$positionDetect,$amountError,$nameError,$description,$path1,$human,$timeError,
         $timeProduct,$lot,$inf4M,$reason,$solution,$note,$seq,$nameTinhhuong,$report,$contractNo,$path2,$level]);
         echo json_encode(['result'=>$params]);
}
catch(Exception $e)
{
    die( print_r( $e->getMessage() ) );
}