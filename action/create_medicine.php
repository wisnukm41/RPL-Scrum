<?php
include '../config/function.php';

$nama = $_POST['nama'];
$harga = $_POST['harga'];
$deskripsi = $_POST['deskripsi'];
$supplier = $_POST['supplier'];


if($_FILES['photo']['type'] != ""){
  $namaFile = date('YmdHis').$_FILES['photo']['name'];
  $file_tmp = $_FILES['photo']['tmp_name'];
  move_uploaded_file($file_tmp, '../img/obat/'.$namaFile);
} else {
  $namaFile = 'photo.jpg';
}

$query = "INSERT INTO obat VALUES('','$nama','$deskripsi','$harga','0','$namaFile','$supplier')";
$mysqli->query($query);

$_SESSION['message'] = 'Data Inserted Successfully!';
header('Location:../obat.php');

