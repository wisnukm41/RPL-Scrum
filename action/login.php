<?php
include '../config/function.php';

$username = $_POST['username'];
$password = md5($_POST['password']);

$query = "SELECT * FROM apoteker WHERE username='$username' AND password='$password'";
$result = $mysqli->query($query);

if($result->num_rows != 0){
  $row = mysqli_fetch_object($result);
  $_SESSION['id_user'] = $row->id;
  $_SESSION['username'] = $row->username;
  $_SESSION['level'] = $row->level;
  $_SESSION['loggedin'] = true;
  header('location:../index.php');
} else {
  $_SESSION['error'] = 'Incorrect Email or Password';
  header('location:../login.php');
};

