<?php
include '../config/function.php';

$date = $_POST['date'];
$pegawai = $_POST['pegawai'];
$gaji = $_POST['gaji'];
$bonus = $_POST['bonus'];
$denda = $_POST['denda'];

$tgl = date('Y-m-d');
$id = uniqid();
$query = "INSERT INTO keuangan VALUES('$id','out','Penggajian',0,'$tgl')";
$mysqli->query($query);

$last_id = $id;
$total = 0;
for ($i=0; $i < sizeof(gaji) ; $i++) { 
  $id = uniqid();
  $query = "INSERT INTO detail_penggajian VALUES('$id','$pegawai[$i]','$last_id','$gaji[$i]','$denda[$i]',$bonus[$i])";
  $mysqli->query($query);
  $total = $total + $gaji[$i] - $denda[$i] + $bonus[$i];
}

$query = "UPDATE keuangan SET jumlah='$total' WHERE id='$last_id'";
$mysqli->query($query);

$_SESSION['message'] = 'Data Inserted Successfully!';
header('Location:../penggajian.php');
