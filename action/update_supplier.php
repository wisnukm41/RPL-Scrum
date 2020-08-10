<?php
include '../config/function.php';

$nama = $_POST['nama'];
$kontak = $_POST['kontak'];
$deskripsi = $_POST['deskripsi'];
$id = $_POST['id'];

$query = "UPDATE supplier SET nama='$nama', kontak='$kontak', deskripsi='$deskripsi' WHERE id='$id'";
$mysqli->query($query);

$_SESSION['message'] = 'Data Updated Successfully!';
header('Location:../supplier.php');

