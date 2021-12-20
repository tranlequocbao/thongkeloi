<?php
include '../vendor/connect.php';

$total=$currentPage=$limit=$start=$totalPage='';
$limit=10;
$currentPage=$_POST['currentPage'];

try{
    $user=$_POST['userSubmit'];
    $list='';

$sqlTotal="SELECT  COUNT([ID]) FROM [QTSX].[dbo].[QC_INFOMATION_PROBLEMS] WHERE [USER_SUBMIT]=".$user."";
$resTotal=$connServer->query($sqlTotal);
if($row=$resTotal->fetch(PDO::FETCH_ASSOC)){
    $total=(int)$row[0];
}
// $result->execute(array($user));
// $row=$result->fetchAll(PDO::FETCH_ASSOC);
// $rowCount=count($row);
// if($rowCount>0){
//     $total=(int)$row[0];
// }
$totalPage=ceil($total/$limit);
if($currentPage>$totalPage) $currentPage=$totalPage;
else if($currentPage<1){
    $currentPage=1;
}
$start=($currentPage -1)*$limit;
$status=true;

echo json_encode(['code'=>200,'list'=>$list,'total'=>$total,'currentPage'=>$currentPage,'totalPage'=>$totalPage]); return;
$sql="SELECT  [ID],[VIN_CODE],[MODEL],[DATETIME],[SHOP],[SECTION],[STATION],[POSITION],[AMOUNT_ERROR],[TYPE_ERROR],[USER_SUBMIT] FROM [QTSX].[dbo].[QC_INFOMATION_PROBLEMS] WHERE [USER_SUBMIT]=? ORDER BY [DATETIME] DESC LIMIT ?,?";
$result=$connServer->prepare($sql);
$result->execute(array($user,$start,$limit));
$row=$result->fetchAll(PDO::FETCH_ASSOC);
$rowCount=count($row);
    if($rowCount>0){
        $list=$row;
        echo json_encode(['code'=>200,'list'=>$list,'currentPage'=>$currentPage,'totalPage'=>$totalPage]); return;
    }
}
catch (Exception $e){
    echo json_encode(['code'=>201,'error'=>$e]); return;
}


