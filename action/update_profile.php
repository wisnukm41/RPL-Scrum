<?php
include '../config/function.php';

$nama = $_POST['nama'];
$kontak = $_POST['kontak'];
$rekening = $_POST['rekening'];
$alamat = $_POST['alamat'];
$id = $_POST['id'];

$query = "UPDATE biodata_pegawai SET nama='$nama', kontak='$kontak', rekening='$rekening', alamat='$alamat' WHERE id='$id'";
$mysqli->query($query);

$_SESSION['message'] = 'Data Updated Successfully!';
header('Location:../profile.php');

