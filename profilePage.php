<?php
session_start();
echo 'name:'.$_SESSION['name'].'<br>';
echo 'email:'.$_SESSION['email'].'<br>';
echo 'password:'.$_SESSION['password'].'<br>';
echo 'address:'.$_SESSION['address'].'<br>';
echo 'gender:'.$_SESSION['gender'].'<br>';
echo 'linkedin url:'.$_SESSION['url'].'<br>';
echo 'profile image:'.$_SESSION['image'].'<br>';

?>
