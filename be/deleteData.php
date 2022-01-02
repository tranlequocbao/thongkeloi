<?php
include '../vendor/connect.php';
$id=$_POST['id'];


    	

try{
    $sql="DELETE FROM QC_INFOMATION_PROBLEMS WHERE ID=?";
    $result=$connServer->prepare($sql);
    $result->execute(array($id));
    if(file_exists("../assets/img/QC/".$id."-1.jpg"))
    	unlink("../assets/img/QC/".$id."-1.jpg");
	if(file_exists("../assets/img/QC/".$id."-2.jpg"))
    	unlink("../assets/img/QC/".$id."-2.jpg");

    echo json_encode(['code'=>200]);

}
catch(Exception $e){
    echo json_encode(['code'=>201,'error'=>$e]);
}