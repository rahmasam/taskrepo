<?php
session_start();
$server='localhost';
$dbName='NTI';
$dbUser='root';
$dbPassword='';
$con=mysqli_connect($server,$dbUser,$dbPassword,$dbName);
if(!$con){
    die('Erorr:'.mysqli_connect_error($con));
}

?>
