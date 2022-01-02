<?php
include '../vendor/connect.php';
session_start();
$data = [];

date_default_timezone_set('Asia/Ho_Chi_Minh');
$time = getdate();
$data = $_POST['allData'];
$idError = $_POST['idErrorLoad'];
$userSubmit = $_SESSION['position'];


$vincode = $data['vincode'];
$type = $data['bodyType'];
$time = $data['time'];


$amountError = $data['amountError'];
$description = $data['description'];
$path1 = $data['img1'];
$human = $data['human'];
$timeError = $data['timeError'];
$timeProduct = $data['timeProduct'];
$lot = $data['lot'];
$contractNo = $data['contractNo'];
$path2 = $data['img2'];
$level = $data['level'];
$report = "0";
$seqData=$data['seq'];
$reason = $data['reason'];
$solution = $data['solution'];
$note = $data['note'];
$seq;

$idShop=$data['errorShop'];
$idChuyen=$data['errorChuyen'];
$idTo=$data['errorTo'];
$idPosition=$data['positionDetect'];
$idTypeError=$data['typeError'];
$id4M=$data['inf4M'];
$idTinhhuong=$data['tinhhuong'];
//$nameShop = getnameShop($data);
//$nameXuong = getnameChuyen($data);
//$nameTo = getnameTo($data);
//$positionDetect = getnamePosition($data);
//$nameError = getnameError(($data));
//$inf4M = inf4M($data);
//$nameTinhhuong = getnameTinhhuong($data);




if ($idError != '') {
    if ($idError > 18) {
        $arraya = [
            $time, $idShop, $idChuyen, $idTo, $idPosition, $amountError, $idTypeError, $description, $path1, $human, $timeError,
             $timeProduct, $lot, $id4M, $reason, $solution, $note, $seqData, $idTinhhuong, $report, $contractNo, $path2, $level, $userSubmit, $idError
        ];
        
        try {
            $update = "UPDATE QC_INFOMATION_PROBLEMS SET [DATETIME]=?, SHOP=?,SECTION=?,STATION=?,POSITION=?,AMOUNT_ERROR=?,TYPE_ERROR=?,DESC_ERROR=?,IMG=?,RESPON=?,DETECT_TIME=?,PRODUCT_TIME=?,LOT=?,M4M=?,CAUSE=?,SOLUTED=?,NOTE=?,SEQ=?,KINDMAN=?,Report=?,CONTRACT_NO=?,IMG2=?,[LEVEL]=?,USER_SUBMIT=? WHERE ID=?";
            $updateReview = $connServer->prepare($update);
            $updateReview->execute($arraya);
            echo json_encode(['code' => 200,'update'=>'updated']);
            return;
            
        } catch (Exception $e) {
            
            return;
        }
    } else {
        echo json_encode(['code' => 201, 'update' => 'fail', 'error' => 'ID Không đủ thông tin: ' . $idError . '']);
        return;
    }
} else {
    $dataId = $_POST['id'];
    $id = $dataId[0];
    if (strlen($id) > 18) {
        try {
           
            $seq = $dataId[1];
            $insert = "INSERT INTO QC_INFOMATION_PROBLEMS(ID,VIN_CODE,MODEL,DATETIME,SHOP,SECTION,STATION,POSITION,AMOUNT_ERROR,TYPE_ERROR,DESC_ERROR,IMG,RESPON,DETECT_TIME,PRODUCT_TIME,LOT,M4M,CAUSE,SOLUTED,NOTE,SEQ,KINDMAN,Report,CONTRACT_NO,IMG2,LEVEL,USER_SUBMIT)
        VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)";
            $arrayInsert=[ $id, $vincode, $type, $time, $idShop, $idChuyen, $idTo, $idPosition, $amountError, $idTypeError, $description, $path1, $human, $timeError,
            $timeProduct, $lot, $id4M, $reason, $solution, $note, $seq, $idTinhhuong, $report, $contractNo, $path2, $level, $userSubmit];
            $insertReview = $connServer->prepare($insert);
            $insertReview->execute($arrayInsert);
            echo json_encode(['code' => 200]);
            return;
        } catch (Exception $e) {
            echo json_encode(['code' => 201, 'error' => $e]);
            return;
        }
    } else {
        echo json_encode(['code' => 201, 'error' => 'ID Không đủ thông tin' . $id . '']);
        return;
    }
}



//  '".$dataInser[0]."'.'".$dataInser[1]."','".$dataInser[2]."','".$dataInser[3]."','".$dataInser[4]."','".$dataInser[5]."','".$dataInser[6]."',
//  '".$dataInser[7]."','".$dataInser[8]."','".$dataInser[9]."','".$dataInser[10]."','".$dataInser[11]."','".$dataInser[12]."',
//  '".$dataInser[13]."','".$dataInser[14]."','".$dataInser[15]."','".$dataInser[16]."','".$dataInser[17]."','".$dataInser[18]."',
//  '".$dataInser[19]."','".$dataInser[20]."','0','".$dataInser[21]."','".$dataInser[22]."','".$dataInser[23]."','".$dataInser[24]."')";



// function getnameError($data)
// {
//     global $connServer;
//     $Error_name = '';
//     $sql = "SELECT * FROM QC_INFORMATION_ERROR WHERE IDError = ?";
//     $result = $connServer->prepare($sql);
//     $result->execute(array($data['typeError']));
//     $row = $result->fetchAll(PDO::FETCH_ASSOC);
//     $rowCount = count($row);
//     if ($rowCount > 0) {
//         foreach ($row as $value) {
//             $Error_name = $value['Error_name'];
//         }
//     }
//     return $Error_name;
// }
// function getnameTinhhuong($data)
// {
//     global $connServer;
//     $Error_name = '';
//     $sql = "SELECT * FROM QC_INFORMATION_MANDF WHERE ID = ?";
//     $result = $connServer->prepare($sql);
//     $result->execute(array($data['tinhhuong']));
//     $row = $result->fetchAll(PDO::FETCH_ASSOC);
//     $rowCount = count($row);
//     if ($rowCount > 0) {
//         foreach ($row as $value) {
//             $Error_name = $value['NAME'];
//         }
//     }
//     return $Error_name;
// }
// function inf4M($data)
// {
//     global $connServer;
//     $Error_name = '';
//     $sql = "SELECT * FROM QC_INFORMATION_4M WHERE ID = ?";
//     $result = $connServer->prepare($sql);
//     $result->execute(array($data['inf4M']));
//     $row = $result->fetchAll(PDO::FETCH_ASSOC);
//     $rowCount = count($row);
//     if ($rowCount > 0) {
//         foreach ($row as $value) {
//             $Error_name = $value['NAME'];
//         }
//     }
//     return $Error_name;
// }
// function getnameShop($data)
// {
//     global $connServer;
//     $Error_name = '';
//     $sql = "SELECT * FROM QC_INFORMATION_SHOP WHERE IDShop = ?";
//     $result = $connServer->prepare($sql);
//     $result->execute(array($data['errorShop']));
//     $row = $result->fetchAll(PDO::FETCH_ASSOC);
//     $rowCount = count($row);
//     if ($rowCount > 0) {
//         foreach ($row as $value) {
//             $Error_name = $value['Shop_name'];
//         }
//     }
//     return $Error_name;
// }
// function getnameChuyen($data)
// {
//     global $connServer;
//     $Error_name = '';
//     $sql = "SELECT * FROM QC_INFORMATION_SECTION WHERE IDSection = ?";
//     $result = $connServer->prepare($sql);
//     $result->execute(array($data['errorChuyen']));
//     $row = $result->fetchAll(PDO::FETCH_ASSOC);
//     $rowCount = count($row);
//     if ($rowCount > 0) {
//         foreach ($row as $value) {
//             $Error_name = $value['Section_name'];
//         }
//     }
//     return $Error_name;
// }
// function getnameTo($data)
// {
//     global $connServer;
//     $Error_name = '';
//     $sql = "SELECT * FROM QC_INFORMATION_STATION WHERE IDStation= ?";
//     $result = $connServer->prepare($sql);
//     $result->execute(array($data['errorTo']));
//     $row = $result->fetchAll(PDO::FETCH_ASSOC);
//     $rowCount = count($row);
//     if ($rowCount > 0) {
//         foreach ($row as $value) {
//             $Error_name = $value['Station_name'];
//         }
//     }
//     return $Error_name;
// }
// function getnamePosition($data)
// {
//     global $connServer;
//     $Error_name = '';
//     $sql = "SELECT * FROM QC_INFORMATION_POSITION WHERE IDPosition= ?";
//     $result = $connServer->prepare($sql);
//     $result->execute(array($data['positionDetect']));
//     $row = $result->fetchAll(PDO::FETCH_ASSOC);
//     $rowCount = count($row);
//     if ($rowCount > 0) {
//         foreach ($row as $value) {
//             $Error_name = $value['Position_name'];
//         }
//     }
//     return $Error_name;
// }
