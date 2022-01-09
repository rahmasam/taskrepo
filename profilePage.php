<?php
session_start();
//display session
echo 'name:'.$_SESSION['name'].'<br>';
echo 'email:'.$_SESSION['email'].'<br>';
echo 'password:'.$_SESSION['password'].'<br>';
echo 'address:'.$_SESSION['address'].'<br>';
echo 'gender:'.$_SESSION['gender'].'<br>';
echo 'linkedin url:'.$_SESSION['url'].'<br>';
echo 'profile image:'.$_SESSION['image'].'<br>';
//print_r($_SESSION['user']);


/////display cookies

//print_r($_COOKIE).'<br>';
echo $_COOKIE['studentName'].'<br>';
echo $_COOKIE['studentEmail'].'<br>';
echo $_COOKIE['studentPass'].'<br>';
echo $_COOKIE['studentAddress'].'<br>';


?>
