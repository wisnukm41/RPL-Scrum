<?php
include '../config/function.php';

$username = $_POST['username'];
$password = $_POST['password'];
$conf_password = $_POST['conf_password'];

$query = "SELECT * FROM apoteker WHERE username='$username'";
$result = $mysqli->query($query);

if($result->num_rows > 0){
  $_SESSION['error'] = 'Username Already Exist!';
  header('location:../register.php');
} else {
  if($password === $conf_password){
    $password = md5($password);
    $query = "INSERT INTO apoteker VALUES('','$username','$password','user')";
    $query = mysqli_query($mysqli,$query);
        if ($query) {
        $_SESSION['message'] = 'Registration Success';
        header('Location:../login.php');
    }
  }else {
    $_SESSION['error'] = 'Password Confirmation is Different!';
    header('location:../register.php');
  };
};

