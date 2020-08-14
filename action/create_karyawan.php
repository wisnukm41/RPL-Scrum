<?php
include '../config/function.php';

$nama = $_POST['nama'];
$email = $_POST['email'];
$jk = $_POST['jk'];
$kontak = $_POST['kontak'];
$jabatan = $_POST['jabatan'];

$pass = md5("123456");

$idBio = uniqid();

$query = "INSERT INTO biodata_pegawai(id,nama,jenis_kelamin,kontak,email,password) VALUES('$idBio','$nama','$jk','$kontak','$email','$pass')";
$mysqli->query($query);

$idKaryawan = uniqid();
$query = "INSERT INTO karyawan VALUES('$idKaryawan','$idBio','$jabatan')";
$mysqli->query($query);

$_SESSION['message'] = 'Data Inserted Successfully!';
header('Location:../pegawai.php');
