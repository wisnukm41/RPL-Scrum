<?php
include '../config/function.php';

$nama = $_POST['nama'];
$kontak = $_POST['kontak'];
$jenis = $_POST['jenis'];
$id = $_POST['id'];

$query = "UPDATE supplier SET nama='$nama', kontak='$kontak', jenis_supplier='$jenis' WHERE id='$id'";
$mysqli->query($query);

$_SESSION['message'] = 'Data Updated Successfully!';
header('Location:../supplier.php');

