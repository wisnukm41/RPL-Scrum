<?php
  session_start();
  
  $mysqli = new mysqli('localhost', 'root', '', 'db_tugbes_rpl'); 

  function isNotLoggedin(){
    // if(!isset($_SESSION['id_user'])) {
		// 	header('Location:./login.php');
		// }
  }
  
  function isLoggedIn(){
    if(isset($_SESSION['id_user'])) {
			header('Location:./index.php');
		}
  }

  function getPenjualan(){
    $mysqli = new mysqli('localhost', 'root', '', 'db_tugbes_basdat'); 
    $sql = "SELECT keuangan.id AS id ,waktu,apoteker.`username` AS username,SUM(detail_penjualan.`total`) AS total FROM  keuangan LEFT JOIN detail_penjualan ON keuangan.id = detail_penjualan.id_keuangan LEFT JOIN apoteker ON keuangan.id_apoteker = apoteker.id WHERE keuangan.tipe='in' GROUP BY keuangan.id";
    return $mysqli->query($sql);
  }

  function getDetailKeuangan($id)
  {
    $mysqli = new mysqli('localhost', 'root', '', 'db_tugbes_basdat'); 
    $sql = "SELECT apoteker.username AS username, keuangan.waktu FROM keuangan LEFT JOIN apoteker ON keuangan.id_apoteker = apoteker.id WHERE keuangan.id='$id'";
    return $mysqli->query($sql);
  }

  function getDetailPenjualanObat($id)
  {
    $mysqli = new mysqli('localhost', 'root', '', 'db_tugbes_basdat'); 
    $sql = "SELECT qty, total, obat.nama AS nama, obat.id AS id FROM detail_penjualan LEFT JOIN obat ON detail_penjualan.id_obat = obat.id WHERE detail_penjualan.id_keuangan='$id'";
    return $mysqli->query($sql);
  }

  function getObat()
  {
    $mysqli = new mysqli('localhost', 'root', '', 'db_tugbes_basdat'); 
    $sql = "SELECT * FROM obat ";
    return $mysqli->query($sql);
  }

  function getTglPenjualan($id)
  {
    $mysqli = new mysqli('localhost', 'root', '', 'db_tugbes_basdat'); 
    $sql = "SELECT keuangan.waktu, keuangan.id FROM keuangan WHERE keuangan.id='$id'";
    return $mysqli->query($sql);
  }

  function getPembelian(){
    $mysqli = new mysqli('localhost', 'root', '', 'db_tugbes_basdat'); 
    $sql = "SELECT keuangan.id AS id , waktu, apoteker.`username` AS username,SUM(detail_pembelian.`total`) AS total FROM  keuangan LEFT JOIN detail_pembelian ON keuangan.id = detail_pembelian.id_keuangan LEFT JOIN apoteker ON keuangan.id_apoteker = apoteker.id WHERE keuangan.tipe='out' GROUP BY keuangan.id";
    return $mysqli->query($sql);
  }

  function getDetailPembelianObat($id)
  {
    $mysqli = new mysqli('localhost', 'root', '', 'db_tugbes_basdat'); 
    $sql = "SELECT qty, total, obat.nama AS nama, obat.id AS id FROM detail_pembelian LEFT JOIN obat ON detail_pembelian.id_obat = obat.id WHERE detail_pembelian.id_keuangan='$id'";
    return $mysqli->query($sql);
  }

  function getKeuangan()
  {
    $mysqli = new mysqli('localhost', 'root', '', 'db_tugbes_basdat'); 
    $sql = "SELECT keuangan.id,keuangan.waktu,keuangan.tipe,apoteker.username FROM keuangan LEFT JOIN apoteker ON keuangan.id_apoteker=apoteker.id";
    return $mysqli->query($sql);
  }

  function getTotal($id,$type)
  {
    $mysqli = new mysqli('localhost', 'root', '', 'db_tugbes_basdat'); 
    if ($type == 'in') {
      $sql = "SELECT SUM(total) AS total FROM detail_penjualan WHERE id_keuangan=$id";
    }else{
      $sql = "SELECT SUM(total) AS total FROM detail_pembelian WHERE id_keuangan=$id";
    }
    return $mysqli->query($sql)->fetch_object();
  }

  function getMonthly()
  {
    $month = date('Y-m');
    $mysqli = new mysqli('localhost', 'root', '', 'db_tugbes_basdat'); 
    $sql = "SELECT SUM(detail_pembelian.total) AS outTotal,  SUM(detail_penjualan.total) AS inTotal FROM keuangan LEFT JOIN detail_pembelian ON keuangan.id=detail_pembelian.id_keuangan LEFT JOIN detail_penjualan ON keuangan.id=detail_penjualan.id_keuangan WHERE waktu LIKE '$month%'";
    return $mysqli->query($sql)->fetch_object();
  }

  function getTotalIncome()
  {
    $mysqli = new mysqli('localhost', 'root', '', 'db_tugbes_basdat'); 
    $sql = "SELECT SUM(detail_pembelian.total) AS outTotal,  SUM(detail_penjualan.total) AS inTotal FROM keuangan LEFT JOIN detail_pembelian ON keuangan.id=detail_pembelian.id_keuangan LEFT JOIN detail_penjualan ON keuangan.id=detail_penjualan.id_keuangan";
    return $mysqli->query($sql)->fetch_object();
  }

  function getSupplier()
  {
    $mysqli = new mysqli('localhost', 'root', '', 'db_tugbes_basdat'); 
    $sql = "SELECT * FROM supplier";
    return $mysqli->query($sql);
  }

  function getOneSupplier($id)
  {
    $mysqli = new mysqli('localhost', 'root', '', 'db_tugbes_basdat'); 
    $sql = "SELECT * FROM supplier WHERE id='$id'";
    return $mysqli->query($sql);
  }

  function getDetailObat($id)
  {
    $mysqli = new mysqli('localhost', 'root', '', 'db_tugbes_basdat'); 
    $sql = "SELECT obat.*, supplier.nama AS namaSupplier, supplier.kontak AS kontakSupplier,supplier.id AS idSupplier FROM obat LEFT JOIN supplier ON obat.id_supplier=supplier.id WHERE obat.id='$id'";
    return $mysqli->query($sql);
  }

  function getProfile()
  {
    $id = $_SESSION['id_user'];
    $mysqli = new mysqli('localhost', 'root', '', 'db_tugbes_basdat'); 
    $sql = "SELECT * FROM apoteker WHERE id='$id'";
    return $mysqli->query($sql);
  }

  function viewDate($date){
    $date = explode('-',$date);
    return $date[2].' / '.$date[1].' / '.$date[0];
  }