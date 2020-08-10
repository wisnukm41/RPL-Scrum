<?php
include '../config/function.php';

$nama = $_POST['nama'];
$kontak = $_POST['kontak'];
$jenis = $_POST['jenis'];
$id = uniqid();
$query = "INSERT INTO supplier VALUES('$id','$nama','$jenis','$kontak')";
$mysqli->query($query);

$_SESSION['message'] = 'Data Inserted Successfully!';
header('Location:../supplier.php');

