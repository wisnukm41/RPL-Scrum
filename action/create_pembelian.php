<?php
include '../config/function.php';

$bahan = $_POST['bahan'];
$supplier = $_POST['supplier'];
$jumlah = $_POST['jumlah'];
$harga = $_POST['harga'];
$tanggal = date('Y-m-d');

$k_id=uniqid();
$query = "INSERT INTO keuangan VALUES('$k_id','out','pembelian stok','$jumlah','$tanggal')";
$mysqli->query($query);

$id=uniqid();
$query = "INSERT INTO detail_pembelian_stok VALUES('$id','$supplier','$bahan','$k_id','$harga','$tanggal','$jumlah')";
$mysqli->query($query);

$query = "UPDATE stok_bahan_baku set jumlah=jumlah+'$jumlah' where id=$bahan";
$mysqli->query($query);

$_SESSION['message'] = 'Data Inserted Successfully!';
header('Location:../pembelian_stok.php');

