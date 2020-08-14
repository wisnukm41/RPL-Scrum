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

for ($i=0; $i < sizeof($id_menu); $i++) { 
  $query = "SELECT * FROM detail_menu_dan_stok WHERE id_menu='$id_menu[$i]'";
  $result = $mysqli->query($query);
  
  while ($row = $result->fetch_object()) {
    $query = "SELECT jumlah FROM stok_bahan_baku WHERE id='$row->id_stok'";
    $res = $mysqli->query($query)->fetch_object();
    
    if($res->jumlah - ($row->jumlah*$qty[$i]) < 0) {
      $_SESSION['error'] = 'Failed To Order, Out of Order';
      return header('Location:../order_menu.php');
    }

    $sisa = $row->jumlah*$qty[$i];

    $query = "UPDATE stok_bahan_baku SET jumlah=jumlah-'$sisa' WHERE id='$row->id_stok'";
    $mysqli->query($query);
  }
  
}

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

