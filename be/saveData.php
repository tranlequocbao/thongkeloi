<?php
include '../vendor/connect.php';
$data=[];
$data=$_POST['allData'];
$arrIdError=getIdError($data);
echo json_encode(['code'=>$arrIdError]);
function getIdError($data){
    global $conn;
    $Error_name=[];
    $sql = "SELECT * FROM QC_INFORMATION_ERROR WHERE IDError = ?";
    $result=$conn->prepare($sql);
    $result->execute(array($data['typeError']));
    $row=$result->fetchAll(PDO::FETCH_ASSOC);
    $rowCount=count($row);
    if($rowCount>0){
        foreach($row as $value){
            $Error_name[]=$value['Error_name'];
        }
    }
    return $row;

}

?>