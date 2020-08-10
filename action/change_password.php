<?php
include '../config/function.php';

$old_pw = $_POST['old_pw'];
$new_pw = $_POST['new_pw'];
$con_pw = $_POST['con_pw'];
$id = $_SESSION['id_user'];

if($con_pw !== $new_pw){
  $_SESSION['error'] = 'Incorrect Confirmation Password';
  header('Location:../profile.php');
}else{
  $query = "SELECT * FROM biodata_pegawai WHERE password='$old_pw'";
  $result = $mysqli->query($query);

  if ($result->num_rows > 0) {
    $query = "UPDATE biodata_pegawai SET password='$new_pw' WHERE id='$id'";
    $result = $mysqli->query($query);
    $_SESSION['message'] = 'Password Updated Successfully';
    header('Location:../profile.php');
  }else{
    $_SESSION['error'] = 'Incorrect Password For This User';
    header('Location:../profile.php');
  }
}

