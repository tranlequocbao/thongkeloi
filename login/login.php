<?php
session_start();

$userName=$passWord=$_SESSION['position']='';
$userName=strtolower($_POST['userName']);
$passWord=$_POST['passWord'];

if($userName=='han' && $passWord=='1'){
    echo json_encode(['code'=>200,'position'=>$_SESSION['position']='han']) ;
}
else if($userName=='son' && $passWord=='1'){
    echo json_encode(['code'=>200,'position'=>$_SESSION['position']='son']);
}
else if($userName=='final' && $passWord=='1'){
    echo json_encode(['code'=>200,'position'=>$_SESSION['position']='final']);
}
else if($userName=='pdi' && $passWord=='1'){
    echo json_encode(['code'=>200,'position'=>$_SESSION['position']='pdi']);
}
else if($userName=='scl' && $passWord=='1'){
    echo json_encode(['code'=>200,'position'=>$_SESSION['position']='scl']);
}


else if($userName=='test' && $passWord=='1'){
    echo json_encode(['code'=>200,'position'=>$_SESSION['position']='test']);
}
else 
echo json_encode(['code'=>201,'user'=>$userName,'pass'=>$passWord]);




