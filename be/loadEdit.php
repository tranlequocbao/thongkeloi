<?php
include '../vendor/connect.php';
$id=$_POST['id'];
$list='';
try{
    $sql="SELECT * FROM QC_INFOMATION_PROBLEMS WHERE ID=?";
    $result = $connServer->prepare($sql);
    $result->execute(array($id));
    $row=$result->fetchAll(PDO::FETCH_ASSOC);
    $rowCount=count($row);
    if($rowCount>0){
        $list=$row;
        echo json_encode(['code'=>200,'list'=>$list]);
    }
}
catch(Exception $e){
    echo json_encode(['code'=>201,'error'=>$e]);
}