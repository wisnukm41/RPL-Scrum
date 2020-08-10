<?php
include '../config/function.php';

$date = $_POST['date'];
$id_obat = $_POST['id_obat'];
$price = $_POST['price'];
$qty = $_POST['qty'];
$user_id = $_SESSION['id_user'];

$query = "INSERT INTO keuangan VALUES('','out','$date','$user_id')";
$result = $mysqli->query($query);
$last_id = $mysqli->insert_id;

for ($i=0; $i < sizeof($price); $i++) { 
  $query = "INSERT INTO detail_pembelian VALUES('','$qty[$i]','$price[$i]','$id_obat[$i]','$last_id')";
  $mysqli->query($query);

  $query = "UPDATE obat SET jumlah=jumlah+$qty[$i] WHERE id=$id_obat[$i]";
  $mysqli->query($query);
}

$_SESSION['message'] = 'Data Inserted Successfully!';
header('Location:../pembelian_obat.php');

