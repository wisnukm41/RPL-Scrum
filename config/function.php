<?php
  session_start();
  
  $mysqli = new mysqli('localhost', 'root', '', 'db_tugbes_rpl'); 

  function isNotLoggedin(){
    if(!isset($_SESSION['id_user'])) {
			header('Location:./login.php');
		}
  }
  
  function isLoggedIn(){
    if(isset($_SESSION['id_user'])) {
			header('Location:./index.php');
		}
  }

  // function getPenjualan(){
  //   $mysqli = new mysqli('localhost', 'root', '', 'db_tugbes_basdat'); 
  //   $sql = "SELECT keuangan.id AS id ,waktu,apoteker.`username` AS username,SUM(detail_penjualan.`total`) AS total FROM  keuangan LEFT JOIN detail_penjualan ON keuangan.id = detail_penjualan.id_keuangan LEFT JOIN apoteker ON keuangan.id_apoteker = apoteker.id WHERE keuangan.tipe='in' GROUP BY keuangan.id";
  //   return $mysqli->query($sql);
  // }

  // function getDetailKeuangan($id)
  // {
  //   $mysqli = new mysqli('localhost', 'root', '', 'db_tugbes_basdat'); 
  //   $sql = "SELECT apoteker.username AS username, keuangan.waktu FROM keuangan LEFT JOIN apoteker ON keuangan.id_apoteker = apoteker.id WHERE keuangan.id='$id'";
  //   return $mysqli->query($sql);
  // }

  // function getDetailPenjualanObat($id)
  // {
  //   $mysqli = new mysqli('localhost', 'root', '', 'db_tugbes_basdat'); 
  //   $sql = "SELECT qty, total, obat.nama AS nama, obat.id AS id FROM detail_penjualan LEFT JOIN obat ON detail_penjualan.id_obat = obat.id WHERE detail_penjualan.id_keuangan='$id'";
  //   return $mysqli->query($sql);
  // }

  // function getObat()
  // {
  //   $mysqli = new mysqli('localhost', 'root', '', 'db_tugbes_basdat'); 
  //   $sql = "SELECT * FROM obat ";
  //   return $mysqli->query($sql);
  // }

  // function getTglPenjualan($id)
  // {
  //   $mysqli = new mysqli('localhost', 'root', '', 'db_tugbes_basdat'); 
  //   $sql = "SELECT keuangan.waktu, keuangan.id FROM keuangan WHERE keuangan.id='$id'";
  //   return $mysqli->query($sql);
  // }

  // function getPembelian(){
  //   $mysqli = new mysqli('localhost', 'root', '', 'db_tugbes_basdat'); 
  //   $sql = "SELECT keuangan.id AS id , waktu, apoteker.`username` AS username,SUM(detail_pembelian.`total`) AS total FROM  keuangan LEFT JOIN detail_pembelian ON keuangan.id = detail_pembelian.id_keuangan LEFT JOIN apoteker ON keuangan.id_apoteker = apoteker.id WHERE keuangan.tipe='out' GROUP BY keuangan.id";
  //   return $mysqli->query($sql);
  // }

  // function getDetailPembelianObat($id)
  // {
  //   $mysqli = new mysqli('localhost', 'root', '', 'db_tugbes_basdat'); 
  //   $sql = "SELECT qty, total, obat.nama AS nama, obat.id AS id FROM detail_pembelian LEFT JOIN obat ON detail_pembelian.id_obat = obat.id WHERE detail_pembelian.id_keuangan='$id'";
  //   return $mysqli->query($sql);
  // }

  // function getKeuangan()
  // {
  //   $mysqli = new mysqli('localhost', 'root', '', 'db_tugbes_basdat'); 
  //   $sql = "SELECT keuangan.id,keuangan.waktu,keuangan.tipe,apoteker.username FROM keuangan LEFT JOIN apoteker ON keuangan.id_apoteker=apoteker.id";
  //   return $mysqli->query($sql);
  // }

  // function getTotal($id,$type)
  // {
  //   $mysqli = new mysqli('localhost', 'root', '', 'db_tugbes_basdat'); 
  //   if ($type == 'in') {
  //     $sql = "SELECT SUM(total) AS total FROM detail_penjualan WHERE id_keuangan=$id";
  //   }else{
  //     $sql = "SELECT SUM(total) AS total FROM detail_pembelian WHERE id_keuangan=$id";
  //   }
  //   return $mysqli->query($sql)->fetch_object();
  // }

  // function getMonthly()
  // {
  //   $month = date('Y-m');
  //   $mysqli = new mysqli('localhost', 'root', '', 'db_tugbes_basdat'); 
  //   $sql = "SELECT SUM(detail_pembelian.total) AS outTotal,  SUM(detail_penjualan.total) AS inTotal FROM keuangan LEFT JOIN detail_pembelian ON keuangan.id=detail_pembelian.id_keuangan LEFT JOIN detail_penjualan ON keuangan.id=detail_penjualan.id_keuangan WHERE waktu LIKE '$month%'";
  //   return $mysqli->query($sql)->fetch_object();
  // }

  // function getTotalIncome()
  // {
  //   $mysqli = new mysqli('localhost', 'root', '', 'db_tugbes_basdat'); 
  //   $sql = "SELECT SUM(detail_pembelian.total) AS outTotal,  SUM(detail_penjualan.total) AS inTotal FROM keuangan LEFT JOIN detail_pembelian ON keuangan.id=detail_pembelian.id_keuangan LEFT JOIN detail_penjualan ON keuangan.id=detail_penjualan.id_keuangan";
  //   return $mysqli->query($sql)->fetch_object();
  // }

  // function getSupplier()
  // {
  //   $mysqli = new mysqli('localhost', 'root', '', 'db_tugbes_basdat'); 
  //   $sql = "SELECT * FROM supplier";
  //   return $mysqli->query($sql);
  // }

  // function getOneSupplier($id)
  // {
  //   $mysqli = new mysqli('localhost', 'root', '', 'db_tugbes_basdat'); 
  //   $sql = "SELECT * FROM supplier WHERE id='$id'";
  //   return $mysqli->query($sql);
  // }

  // function getDetailObat($id)
  // {
  //   $mysqli = new mysqli('localhost', 'root', '', 'db_tugbes_basdat'); 
  //   $sql = "SELECT obat.*, supplier.nama AS namaSupplier, supplier.kontak AS kontakSupplier,supplier.id AS idSupplier FROM obat LEFT JOIN supplier ON obat.id_supplier=supplier.id WHERE obat.id='$id'";
  //   return $mysqli->query($sql);
  // }

  // function getProfile()
  // {
  //   $id = $_SESSION['id_user'];
  //   $mysqli = new mysqli('localhost', 'root', '', 'db_tugbes_basdat'); 
  //   $sql = "SELECT * FROM apoteker WHERE id='$id'";
  //   return $mysqli->query($sql);
  // }

  function getMenu()
  {
    $mysqli = new mysqli('localhost', 'root', '', 'db_tugbes_rpl'); 
    $sql = "SELECT * from menu";
    return $mysqli->query($sql);
  }

  function getOneMenu($id)
  {
    $mysqli = new mysqli('localhost', 'root', '', 'db_tugbes_rpl'); 
    $sql = "SELECT * from menu where id='$id'";
    return $mysqli->query($sql);
  }

  function getDetailMenu($id)
  {
    $mysqli = new mysqli('localhost', 'root', '', 'db_tugbes_rpl'); 
    $sql = "SELECT stok_bahan_baku.nama_stok,detail_menu_dan_stok.jumlah,stok_bahan_baku.id from detail_menu_dan_stok LEFT JOIN stok_bahan_baku ON stok_bahan_baku.id=detail_menu_dan_stok.id_stok where detail_menu_dan_stok.id_menu='$id'";
    return $mysqli->query($sql);
  }

  function getStok()
  {
    $mysqli = new mysqli('localhost', 'root', '', 'db_tugbes_rpl'); 
    $sql = "SELECT * from stok_bahan_baku";
    return $mysqli->query($sql);
  }

  function getOrders()
  {
    $mysqli = new mysqli('localhost', 'root', '', 'db_tugbes_rpl'); 
    $sql = "SELECT a.*,c.tgl FROM struk_pembelian AS a LEFT JOIN detail_penjualan AS b ON a.id = b.id_pembeli LEFT JOIN keuangan AS c ON b.id_keuangan = c.id GROUP BY a.id";
    return $mysqli->query($sql);
  }

  function getOrderDetail($id)
  {
    $mysqli = new mysqli('localhost', 'root', '', 'db_tugbes_rpl'); 
    $sql = "SELECT a.nama_soto,a.harga_soto,b.jumlah FROM menu AS a LEFT JOIN detail_penjualan AS b ON a.id = b.id_menu LEFT JOIN struk_pembelian AS c ON c.id = b.id_pembeli WHERE c.id='$id'";
    return $mysqli->query($sql);
  }

  function getOneOrder($id){
    $mysqli = new mysqli('localhost', 'root', '', 'db_tugbes_rpl'); 
    $sql = "SELECT a.*,c.tgl FROM struk_pembelian AS a LEFT JOIN detail_penjualan AS b ON a.id = b.id_pembeli LEFT JOIN keuangan AS c ON b.id_keuangan = c.id WHERE a.id='$id'";
    return $mysqli->query($sql);
  }
  
  function getKeluhan()
  {
    $mysqli = new mysqli('localhost', 'root', '', 'db_tugbes_rpl'); 
    $sql = "SELECT * FROM keluhan";
    return $mysqli->query($sql);
  }

  function getDetailKeluhan($id)
  {
    $mysqli = new mysqli('localhost', 'root', '', 'db_tugbes_rpl'); 
    $sql = "SELECT * FROM keluhan where id='$id'";
    return $mysqli->query($sql);
  }

  function getDataKaryawan()
  {
    $mysqli = new mysqli('localhost', 'root', '', 'db_tugbes_rpl'); 
    $sql = "SELECT a.id,b.nama,b.jenis_kelamin FROM karyawan as a LEFT JOIN biodata_pegawai as b ON a.id_biodata = b.id";
    return $mysqli->query($sql);
  }

  function getOneStok($id)
  {
    $mysqli = new mysqli('localhost', 'root', '', 'db_tugbes_rpl'); 
    $sql = "SELECT * from stok_bahan_baku WHERE id='$id'";
    return $mysqli->query($sql);
  }

  function getPenggajian()
  {
    $mysqli = new mysqli('localhost', 'root', '', 'db_tugbes_rpl'); 
    $sql = "SELECT a.id,a.tgl,a.jumlah from keuangan as a WHERE deskripsi LIKE '%gaji%' AND jenis='out'";
    return $mysqli->query($sql);
  }

  function getOneGaji($id)
  {
    $mysqli = new mysqli('localhost', 'root', '', 'db_tugbes_rpl'); 
    $sql = "SELECT a.jumlah,a.tgl FROM keuangan as a WHERE a.id='$id' ";
    return $mysqli->query($sql);
  }

  function getDetailGaji($id)
  {
    $mysqli = new mysqli('localhost', 'root', '', 'db_tugbes_rpl'); 
    $sql = "SELECT a.jumlah as total,a.tgl,b.jumlah,b.bonus,b.denda,c.nama from keuangan as a INNER JOIN detail_penggajian as b ON a.id = b.id_keuangan LEFT JOIN karyawan as d ON b.id_karyawan=d.id INNER JOIN biodata_pegawai as c ON d.id_biodata=c.id WHERE b.id_keuangan='$id' ";
    return $mysqli->query($sql);
  }

  function getSupplier()
  {
    $mysqli = new mysqli('localhost', 'root', '', 'db_tugbes_rpl'); 
    $sql = "SELECT * from supplier";
    return $mysqli->query($sql);
  }

  function getOneSupplier($id)
  {
    $mysqli = new mysqli('localhost', 'root', '', 'db_tugbes_rpl'); 
    $sql = "SELECT * from supplier where id='$id'";
    return $mysqli->query($sql);
  }
  function getPembelianStok()
  {
    $mysqli = new mysqli('localhost', 'root', '', 'db_tugbes_rpl'); 
    $sql = "SELECT a.id,a.harga,a.tgl,a.jumlah,b.nama_stok,c.nama from detail_pembelian_stok as a LEFT JOIN stok_bahan_baku as b ON a.id_stok = b.id LEFT JOIN supplier as c ON a.id_supplier=c.id";
    return $mysqli->query($sql);
  }
    function getDataKeuangan(){
    $mysqli = new mysqli('localhost', 'root', '', 'db_tugbes_rpl'); 
    $sql = "SELECT * from keuangan";
    return $mysqli->query($sql);
  }

  function getProfile()
  {
    $id = $_SESSION['id_user'];
    $mysqli = new mysqli('localhost', 'root', '', 'db_tugbes_rpl'); 
    $sql = "SELECT a.*,b.jabatan FROM biodata_pegawai as a LEFT JOIN karyawan as b ON a.id=b.id_biodata WHERE a.id='$id'";
    return $mysqli->query($sql);
  }

  function getIdPegawai($id){
    $mysqli = new mysqli('localhost', 'root', '', 'db_tugbes_rpl'); 
    $sql = "SELECT * from karyawan where id='$id'";
    return $mysqli->query($sql);
  }

  function getInfoPegawai($id){
    $mysqli = new mysqli('localhost', 'root', '', 'db_tugbes_rpl'); 
    $sql = "SELECT a.id,a.jabatan,b.nama,b.jenis_kelamin,b.kontak,b.email,b.alamat FROM karyawan as a LEFT JOIN biodata_pegawai as b ON a.id_biodata = b.id where a.id='$id'";
    return $mysqli->query($sql);
  }

  function getGajiPersonal($id){
    $mysqli = new mysqli('localhost', 'root', '', 'db_tugbes_rpl'); 
    $sql = "SELECT a.jumlah,a.denda,a.bonus,b.tgl FROM detail_penggajian as a LEFT JOIN keuangan as b on a.id_keuangan=b.id LEFT JOIN karyawan as c ON a.id_karyawan=c.id WHERE c.id='$id' ";
    return $mysqli->query($sql);
  }

  function getKeluhanPersonal($id){
    $mysqli = new mysqli('localhost', 'root', '', 'db_tugbes_rpl'); 
    $sql = "SELECT a.* FROM keluhan as a LEFT JOIN karyawan as b ON a.id_karyawan=b.id WHERE b.id='$id'";
    return $mysqli->query($sql);
  }

  function getMenuStok($id){
    $mysqli = new mysqli('localhost', 'root', '', 'db_tugbes_rpl'); 
    $sql = "SELECT MIN(a.jumlah) as stok FROM stok_bahan_baku as a INNER JOIN detail_menu_dan_stok as b WHERE b.id_menu='$id'";
    return $mysqli->query($sql)->fetch_object()->stok;
  }


  function viewDate($date){
    $date = explode('-',$date);
    return $date[2].' / '.$date[1].' / '.$date[0];
  } 