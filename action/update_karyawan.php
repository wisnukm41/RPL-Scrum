<?php
include '../config/function.php';

$nama = $_POST['nama'];
$email = $_POST['email'];
$jk = $_POST['jk'];
$kontak = $_POST['kontak'];
$jabatan = $_POST['jabatan'];
$id = $_POST['id'];

$query = "SELECT * from karyawan WHERE id='$id'";
$id_bio = $mysqli->query($query)->fetch_object()->id_biodata;

$query = "UPDATE karyawan SET jabatan='$jabatan' WHERE id='$id'";
$mysqli->query($query);

$query = "UPDATE biodata_pegawai SET nama='$nama', kontak='$kontak', alamat='$alamat', jenis_kelamin='$jk' WHERE id='$id_bio'";
$mysqli->query($query);

$_SESSION['message'] = 'Data Updated Successfully!';
header('Location:../pegawai.php');

