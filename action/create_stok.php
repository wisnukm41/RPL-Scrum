<?php
include '../config/function.php';

$nama = $_POST['nama'];
$jenis = $_POST['jenis'];
$jumlah = $_POST['jumlah'];

$id = uniqid();
$query = "INSERT INTO stok_bahan_baku VALUES('$id','$nama','$jenis',0,'$jumlah')";
$mysqli->query($query);

$_SESSION['message'] = 'Data Inserted Successfully!';
header('Location:../stok.php');
