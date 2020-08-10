<?php
include '../config/function.php';

$tgl = date('Y-m-d');
$id = uniqid();
$total = $_POST['total'];
$kontak = $_POST['kontak'] ? $_POST['kontak'] : "No Kontak";

$id_menu = $_POST['id_menu'];
$qty = $_POST['qty'];

if(empty($qty)) {
  $_SESSION['error'] = 'Failed To Order';
  header('Location:../order_menu.php');
};

$query = "SELECT * FROM keuangan WHERE jenis='in' AND tgl='$tgl'";
$result = $mysqli->query($query);

$last_id;

if($result->num_rows == 0){
  $query = "INSERT INTO keuangan VALUES('$id','in','Penjualan','$total','$tgl')";
  $mysqli->query($query);
  $last_id = $id;
} else {
  $last_id = $result->fetch_object()->id;
  $query = "UPDATE keuangan SET jumlah=jumlah+$total where id='$last_id'";
  $mysqli->query($query);
}

$id = uniqid();
$query = "INSERT INTO struk_pembelian VALUES('$id','$kontak','$total')";
$result = $mysqli->query($query);
$struk_id = $id;

for ($i=0; $i < sizeof($qty); $i++) { 
  if($qty[$i] > 0){
    $id = uniqid();
    $query = "INSERT INTO detail_penjualan VALUES('$id','$id_menu[$i]','$struk_id','$last_id','$qty[$i]')";
    $mysqli->query($query);
  }
}

$_SESSION['message'] = 'Data Inserted Successfully!';
header('Location:../order_menu.php');

