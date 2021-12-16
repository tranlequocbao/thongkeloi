<?php
include '../vendor/connect.php';
$data=[];

date_timezone_set('Asia/Ho_Chi_Minh');
$time=getdate();
$data=$_POST['allData'];
$arrIdError=getnameError($data);
$nameError=getnameError(($data));
$nameShop=getnameShop($data);
$nameTinhhuong=getnameTinhhuong($data);
function getnameError($data){
    global $connServer;
    $Error_name='';
    $sql = "SELECT * FROM QC_INFORMATION_ERROR WHERE IDError = ?";
    $result=$connServer->prepare($sql);
    $result->execute(array($data['typeError']));
    $row=$result->fetchAll(PDO::FETCH_ASSOC);
    $rowCount=count($row);
    if($rowCount>0){
        foreach($row as $value){
            $Error_name=$value['Error_name'];
        }
    }
    return $row;

}

function getnameTinhhuong($data){
    global $connServer;
    $Error_name='';
    $sql = "SELECT * FROM QC_INFORMATION_MANDF WHERE ID = ?";
    $result=$connServer->prepare($sql);
    $result->execute(array($data['tinhhuong']));
    $row=$result->fetchAll(PDO::FETCH_ASSOC);
    $rowCount=count($row);
    if($rowCount>0){
        foreach($row as $value){
            $Error_name=$value['NAME'];
        }
    }
    return $row;
}
function inf4M($data){
    global $connServer;
    $Error_name='';
    $sql = "SELECT * FROM QC_INFORMATION_4M WHERE ID = ?";
    $result=$connServer->prepare($sql);
    $result->execute(array($data['inf4M']));
    $row=$result->fetchAll(PDO::FETCH_ASSOC);
    $rowCount=count($row);
    if($rowCount>0){
        foreach($row as $value){
            $Error_name=$value['NAME'];
        }
    }
    return $row;
}

function getnameShop($data){
    global $connServer;
    $Error_name='';
    $sql = "SELECT * FROM QC_INFORMATION_SHOP WHERE IDShop = ?";
    $result=$connServer->prepare($sql);
    $result->execute(array($data['errorShop']));
    $row=$result->fetchAll(PDO::FETCH_ASSOC);
    $rowCount=count($row);
    if($rowCount>0){
        foreach($row as $value){
            $Error_name=$value['Shop_name'];
        }
    }
    return $row;
}
function getnameChuyen($data){
    global $connServer;
    $Error_name='';
    $sql = "SELECT * FROM QC_INFORMATION_SECTION WHERE IDSection = ?";
    $result=$connServer->prepare($sql);
    $result->execute(array($data['errorChuyen']));
    $row=$result->fetchAll(PDO::FETCH_ASSOC);
    $rowCount=count($row);
    if($rowCount>0){
        foreach($row as $value){
            $Error_name=$value['Section_name'];
        }
    }
    return $row;
}
function getnameTo($data){
    global $connServer;
    $Error_name='';
    $sql = "SELECT * FROM QC_INFORMATION_STATION WHERE IDStation= ?";
    $result=$connServer->prepare($sql);
    $result->execute(array($data['errorTo']));
    $row=$result->fetchAll(PDO::FETCH_ASSOC);
    $rowCount=count($row);
    if($rowCount>0){
        foreach($row as $value){
            $Error_name=$value['Station_name'];
        }
    }
    return $row;
}
function getID($data){
    global $connServer;
    $id=$seq='';
    $sql="SELECT TOP 1 SEQ FROM QC_INFOMATION_PROBLEMS ORDER BY SEQ DESC";
    $result=$connServer->prepare($sql);
    $result->execute();
    $row=$result->fetchAll(PDO::FETCH_ASSOC);
    $rowCount=count($row);
    if($rowCount>0){
        $seq=(int)$row['SEQ']+1;
    }
    $id=date('Ymd')+$data[]
}
?>