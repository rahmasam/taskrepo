<?php 
 
 session_start();
 require 'checkLogin.php';
 
 session_destroy();

 header("location: login.php");


?>