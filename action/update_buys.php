<?php
include '../config/function.php';

$date = $_POST['date'];
$id_obat = $_POST['id_obat'];
$price = $_POST['price'];
$qty = $_POST['qty'];
$user_id = $_SESSION['id_user'];
$id = $_POST['keuangan_id'];
$old_qty = $_POST['old_qty'];
$old_obat = $_POST['old_id'];

$query = "UPDATE keuangan SET waktu='$date' WHERE id='$id'";
$mysqli->query($query);

for ($i=0; $i < sizeof($old_obat) ; $i++) { 
  $query = "UPDATE obat SET jumlah=jumlah-$old_qty[$i] WHERE id=$old_obat[$i]";
  $mysqli->query($query);
}

$query = "DELETE FROM detail_pembelian WHERE id_keuangan='$id'";
$mysqli->query($query);

for ($i=0; $i < sizeof($price); $i++) { 
  $query = "INSERT INTO detail_pembelian VALUES('','$qty[$i]','$price[$i]','$id_obat[$i]','$id')";
  $mysqli->query($query);

  $query = "UPDATE obat SET jumlah=jumlah+$qty[$i] WHERE id=$id_obat[$i]";
  $mysqli->query($query);
}

$_SESSION['message'] = 'Data Updated Successfully!';
header('Location:../pembelian_obat.php');

