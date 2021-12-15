<?php
include '../vendor/connect.php';

$des ="";
$sql_type = "SELECT DISTINCT DESC_ERROR FROM  QC_INFOMATION_PROBLEMS WHERE DESC_ERROR!=''";
$result = $connServer->query($sql_type);
if($row = $result->fetchAll(PDO::FETCH_ASSOC)) {
    $des = $row;
    echo json_encode(['code'=>200,'typeError'=>$des]);
}
