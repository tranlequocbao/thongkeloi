<?php
include '../vendor/connect.php';

$idShop=$_POST["idShop"];



$typeError ="";
$sql_type = "SELECT *  FROM QC_INFORMATION_ERROR WHERE IDShop='".$idShop."'";
$result = $conn->query($sql_type);
if($row = $result->fetchAll(PDO::FETCH_ASSOC)) {
    $typeError = $row;
    echo json_encode(['code'=>200,'typeError'=>$typeError]);
}
else echo json_encode(['code'=>201]);
