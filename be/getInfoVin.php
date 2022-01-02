<?php
include '../vendor/connect.php';
$vinCode = $_POST['vincode'];
$id =$_POST['id'];
$user=$_POST['user'];
$listLoad='';

try{
    if($id!=""){
        $sql="SELECT * FROM QC_INFOMATION_PROBLEMS WHERE ID=?";
        $result=$connServer->prepare($sql);
        $result->execute(array($id));
        $row=$result->fetchAll(PDO::FETCH_ASSOC);
        $rowCount=count($row);
        if($rowCount>0){
            $listLoad=$row[0];
        }
        
        $idShop_=$listLoad['SHOP']; $idChuyen=$listLoad['SECTION'];$idTo=$listLoad['STATION'];$id4M=$listLoad['M4M'];
        $idTinhhuong=$listLoad['KINDMAN'];  $idLevel=$listLoad['LEVEL']; $idError=$listLoad['TYPE_ERROR'];$idShop=[];$idPosition=$listLoad['POSITION'];
        
        /////////0//////////////
        $sql="SELECT Shop_name FROM QC_INFORMATION_SHOP WHERE IDShop=?";
        $result=$connServer->prepare($sql);
        $result->execute(array($idShop_));
        $row=$result->fetchAll(PDO::FETCH_ASSOC);
        $rowCount=count($row);
        if($rowCount>0){
           array_push($listLoad,$row[0]);
        } else  array_push($listLoad,['Shop_name'=>""]);
        
    
        /////////1//////////////
        $sql="SELECT Section_name FROM QC_INFORMATION_SECTION WHERE IDSection=?";
        $result=$connServer->prepare($sql);
        $result->execute(array($idChuyen));
        $row=$result->fetchAll(PDO::FETCH_ASSOC);
        $rowCount=count($row);
        if($rowCount>0){
           array_push($listLoad,$row[0]);
        } else  array_push($listLoad,['Section_name'=>""]);
       
        
    
        /////////2//////////////
        $sql="SELECT Station_name FROM QC_INFORMATION_STATION WHERE IDStation=?";
        $result=$connServer->prepare($sql);
        $result->execute(array($idTo));
        $row=$result->fetchAll(PDO::FETCH_ASSOC);
        $rowCount=count($row);
        if($rowCount>0){
          array_push($listLoad,$row[0]);
        } else  array_push($listLoad,['Station_name'=>""]);
     
    
        /////////3//////////////
        $sql="SELECT [NAME] FROM QC_INFORMATION_4M WHERE [ID]=?";
        $result=$connServer->prepare($sql);
        $result->execute(array($id4M));
        $row=$result->fetchAll(PDO::FETCH_ASSOC);
        $rowCount=count($row);
        if($rowCount>0){
          array_push($listLoad,$row[0]);
        } else  array_push($listLoad,['NAME'=>""]);
    
        // echo json_encode(['id'=>$id,'user'=>$user,'listload'=>$listLoad]); return;
    
        /////////4//////////////
        $sql="SELECT [NAME] FROM QC_INFORMATION_MANDF WHERE [ID]=?";
        $result=$connServer->prepare($sql);
        $result->execute(array($idTinhhuong));
        $row=$result->fetchAll(PDO::FETCH_ASSOC);
        $rowCount=count($row);
        if($rowCount>0){
          array_push($listLoad,$row[0]);
        } else  array_push($listLoad,['NAME'=>""]);
       
      
        /////////5//////////////
        $sql="SELECT [LEVEL] FROM QC_INFORMATION_LEVEL WHERE [ID]=?";
        $result=$connServer->prepare($sql);
        $result->execute(array($idLevel));
        $row=$result->fetchAll(PDO::FETCH_ASSOC);
        $rowCount=count($row);
        if($rowCount>0){
          array_push($listLoad,$row[0]);
          
        } else  array_push($listLoad,['LEVEL'=>""]);
       
         /////////6//////////////
        $sql="SELECT [Position_name] FROM QC_INFORMATION_POSITION WHERE [IDPosition]=?";
        $result=$connServer->prepare($sql);
        $result->execute(array($idPosition));
        $row=$result->fetchAll(PDO::FETCH_ASSOC);
        $rowCount=count($row);
        if($rowCount>0){
          array_push($listLoad,$row[0]);
        } else  array_push($listLoad,['Position_name'=>""]);
    
    
        /////////7//////////////
        $sql="SELECT [Error_name] FROM QC_INFORMATION_ERROR WHERE [IDError]=?";
        $result=$connServer->prepare($sql);
        $result->execute(array($idError));
        $row=$result->fetchAll(PDO::FETCH_ASSOC);
        $rowCount=count($row);
        if($rowCount>0){
          array_push($listLoad,$row[0]);
        } else  array_push($listLoad,['Error_name'=>""]);

        
    }
    if ($vinCode == ""){
        $vinCode=$listLoad['VIN_CODE'];  
        } 
    
        if (strlen($vinCode) < 8) {
            echo json_encode(['code' => 202]);
            return;
        }
        if (strlen($vinCode) > 17) {
            $vinCode = substr($vinCode,0, 17);
        }
        
        $lot = $contractNo = $bodyType = $vincode_ = "";
        $sql = "SELECT * FROM BodyData WHERE BarCode like '%" . $vinCode . "%'";
        $result = $connLaprap->query($sql);
        if ($row = $result->fetch(PDO::FETCH_ASSOC)) {
            $lot = $row["LOT"];
            $contractNo = $row["Contract"];
            $bodyType = $row["NameMode"];
            $vincode_ = $row["BarCode"];
        } else {
            echo json_encode(['code' => 201, 'sql' => $sql]);
            return;
        }
        $sql = "SELECT * FROM QC_INFORMATION_TIME";
        $result = $connServer->query($sql);
        while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
            $time[] = $row["Detect_Time"];
        }
        
        $idShop="";
        $sql_shop = "SELECT * FROM QC_INFORMATION_SHOP WHERE OK=1";
        $result = $connServer->query($sql_shop);
        if ($row = $result->fetchAll(PDO::FETCH_ASSOC)) {
            $shop = $row;
           
        }
        $inf4M = "";
        $sql_4m = "SELECT *  FROM QC_INFORMATION_4M";
        $result = $connServer->query($sql_4m);
        if ($row = $result->fetchAll(PDO::FETCH_ASSOC)) {
            $inf4M = $row;
        }
        
        
        
        $tinhuong = '';
        $sql_th = "SELECT *  FROM QC_INFORMATION_MANDF";
        $result = $connServer->query($sql_th);
        if ($row = $result->fetchAll(PDO::FETCH_ASSOC)) {
            $tinhuong = $row;
        }
        
        $typeError = $idError=[];
        $sql_type = "SELECT *  FROM QC_INFORMATION_ERROR";
        $result = $connServer->query($sql_type);
        while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
            $typeError[] = $row['Error_name'];
            $idError[]=$row["IDError"];
        }
        $level = '';
        $sql_level = "SELECT *  FROM QC_INFORMATION_LEVEL";
        $result = $connServer->query($sql_level);
        if ($row = $result->fetchAll(PDO::FETCH_ASSOC)) {
            $level = $row;
           
        }
    
        $position = '';
        $sql_level = "SELECT *  FROM QC_INFORMATION_POSITION WHERE IDShop='".$user."'";
        $result = $connServer->query($sql_level);
        if ($row = $result->fetchAll(PDO::FETCH_ASSOC)) {
            $position = $row;
           
        }
        echo json_encode(['code' => 200, 'lot' => $lot, 'contractNo' => $contractNo, 'bodyType' => $bodyType, 'vincode' => $vincode_, 'time' => $time, 'shop' => $shop,'if4M'=>$inf4M,'tinhhuong'=>$tinhuong,'typeError'=>$typeError,'idError'=>$idError,'level'=>$level,'position'=>$position,'listLoad'=>$listLoad,'idShopaa'=>$idShop]);
        return;
}
catch(Exception $e){
    echo json_encode(['code'=>201]); return;
}



    