<?php
include '../config/function.php';

$id = $_POST['id_keluhan'];
$pegawai = $_POST['pegawai'];


$query = "UPDATE keluhan SET id_karyawan='$pegawai' WHERE id='$id'";
$mysqli->query($query);



$_SESSION['message'] = 'Data Updated Successfully!';
header('Location:../keluhan.php');
