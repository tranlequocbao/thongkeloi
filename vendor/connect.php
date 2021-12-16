<?php

// $connServer = new PDO( "sqlsrv:Server=10.40.12.6 ; Database = QTSX ", "sa", "123456", array(PDO::SQLSRV_ATTR_DIRECT_QUERY => true)); 
// $connLaprap = new PDO( "sqlsrv:Server=10.40.15.224 ; Database = QTSX ", "sa", "123456", array(PDO::SQLSRV_ATTR_DIRECT_QUERY => true)); 
$connServer = new PDO( "sqlsrv:Server=BAO\\SQLEXPRESS ; Database = QTSX ", "", "", array(PDO::SQLSRV_ATTR_DIRECT_QUERY => true)); 
$connLaprap = new PDO( "sqlsrv:Server=BAO\\SQLEXPRESS ; Database = QTSX ", "", "", array(PDO::SQLSRV_ATTR_DIRECT_QUERY => true)); 
?>