<?php
include '../config/function.php';

$nama = $_POST['nama'];
$harga = $_POST['harga'];
$bahan_baku = $_POST['bahan_baku'];
$qty = $_POST['qty'];

$id = uniqid();

$query = "INSERT INTO menu VALUES('$id','$nama','$harga')";
$mysqli->query($query);

for ($i=0; $i < sizeof($qty); $i++) { 
  $newId = uniqid();
  $query = "INSERT INTO detail_menu_dan_stok VALUES('$newId','$id','$bahan_baku[$i]','$qty[$i]')";
  $mysqli->query($query);
}

$_SESSION['message'] = 'Data Inserted Successfully!';
header('Location:../menu.php');
