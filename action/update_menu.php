<?php
include '../config/function.php';

$nama = $_POST['nama'];
$harga = $_POST['harga'];
$bahan_baku = $_POST['bahan_baku'];
$qty = $_POST['qty'];

$id = $_POST['id_menu'];;

$query = "DELETE FROM detail_menu_dan_stok WHERE id_menu='$id'";
$mysqli->query($query);

$query = "UPDATE menu SET nama_soto='$nama', harga_soto='$harga' WHERE id='$id'";
$mysqli->query($query);

for ($i=0; $i < sizeof($qty); $i++) { 
  $newId = uniqid();
  $query = "INSERT INTO detail_menu_dan_stok VALUES('$newId','$id','$bahan_baku[$i]','$qty[$i]')";
  $mysqli->query($query);
}

$_SESSION['message'] = 'Data Updated Successfully!';
header('Location:../menu.php');
