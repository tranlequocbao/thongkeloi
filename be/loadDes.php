<?php
include '../vendor/connect.php';

$des =[];
$sql_type = "SELECT DISTINCT DESC_ERROR FROM  QC_INFOMATION_PROBLEMS WHERE DESC_ERROR!=''";
$result = $connServer->query($sql_type);
while($row = $result->fetch(PDO::FETCH_ASSOC)) {
    $des[] = $row['DESC_ERROR'];
   
}
echo json_encode(['code'=>200,'typeError'=>$des]);