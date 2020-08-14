<?php
include '../config/function.php';

$email = $_POST['email'];
$password = $_POST['password'];

$query = "SELECT biodata_pegawai.*, karyawan.jabatan FROM biodata_pegawai LEFT JOIN karyawan ON biodata_pegawai.id = karyawan.id WHERE email='$email' AND password='$password'";
$result = $mysqli->query($query);

if($result->num_rows != 0){
  $row = mysqli_fetch_object($result);
  $_SESSION['id_user'] = $row->id;
  $_SESSION['nama'] = $row->nama;
  $_SESSION['jabatan'] = $row->jabatan;
  $_SESSION['loggedin'] = true;
  header('location:../index.php');
} else {
  $_SESSION['error'] = 'Incorrect Email or Password';
  header('location:../login.php');
};

