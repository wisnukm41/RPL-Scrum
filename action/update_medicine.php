<?php
include '../config/function.php';

$nama = $_POST['nama'];
$harga = $_POST['harga'];
$deskripsi = $_POST['deskripsi'];
$supplier = $_POST['supplier'];
$old_photo = $_POST['old_photo'];
$id = $_POST['id'];

if($_FILES['photo']['type'] != ""){
  if($old_photo !== 'photo.jpg') unlink('../img/obat/'.$old_photo);
  $namaFile = date('YmdHis').$_FILES['photo']['name'];
  $file_tmp = $_FILES['photo']['tmp_name'];
  move_uploaded_file($file_tmp, '../img/obat/'.$namaFile);
} else {
  $namaFile = $old_photo;
}


$query = "UPDATE obat SET nama='$nama', deskripsi='$deskripsi', harga='$harga',foto='$namaFile',id_supplier='$supplier' WHERE id='$id'";
$mysqli->query($query);

$_SESSION['message'] = 'Data Updated Successfully!';
header('Location:../obat.php');

