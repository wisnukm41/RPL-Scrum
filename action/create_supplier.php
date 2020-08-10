<?php
include '../config/function.php';

$nama = $_POST['nama'];
$kontak = $_POST['kontak'];
$deskripsi = $_POST['deskripsi'];

$query = "INSERT INTO supplier VALUES('','$nama','$kontak','$deskripsi')";
$mysqli->query($query);

$_SESSION['message'] = 'Data Inserted Successfully!';
header('Location:../supplier.php');

