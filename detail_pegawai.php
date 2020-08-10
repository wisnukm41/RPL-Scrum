<?php 
  include './config/function.php';
  isNotLoggedIn();

  // $pegawai = getInfoPegawai($_GET['id']);
  // // if($pegawai->num_rows < 1){
  // //   header("Location:NotFound404.php");
  // // }

  // $pegawai = $pegawai->fetch_object();

  $id = getIdPegawai($_GET['id']);
  $id = $id->fetch_object();
  $pegawai = getInfoPegawai($id->id_biodata);
  $pegawai = $pegawai->fetch_object();

  $gaji = getGajiPersonal($_GET['id']);
  $keluhan = getKeluhanPersonal($_GET['id']);

  $foto = "\"./img/pegawai/";
  $foto .= $pegawai->foto;
  $foto .= ".jpg\"";
?>

<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Detail Pegawai || Warung Soto</title>

  <?php include './head-import.php' ?>
</head>

<body id="page-top">

  <!-- Page Wrapper -->
  <div id="wrapper">

    <!-- Sidebar -->
    <?php  include './sidebar.php' ?>
    <!-- End of Sidebar -->

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

      <!-- Main Content -->
      <div id="content">

        <!-- Topbar -->
        <?php include './topbar.php' ?>
        <!-- End of Topbar -->

        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Detail Pegawai</h1>
          </div>

          <div class="card shadow mb-4 border-left-secondary">
            <div class="card-header py-3 d-flex justify-content-between">
              <h6 class="m-0 font-weight-bold text-secondary">Detail Pegawai</h6>
              <a href="index.php" class="btn btn-danger">Kembali</a>
            </div>
            <div class="card-body">
              <h6 class="font-weight-bold">Detail Pegawai</h6>
              <table class="table table-bordered">
                <tr>
                  <td rowspan=5 class='photo_td'><img alt="photo" class='foto_karyawan' src= <?= $foto ?>></td>
                  <td>Nama : </td>
                  <td><?= $pegawai->nama ?></td>
                </tr>
                <tr>
                  <td>Jenis Kelamin</td>
                  <td><?= $pegawai->jenis_kelamin ?></td>
                </tr>
                <tr>
                  <td>Kontak</td>
                  <td><?= $pegawai->kontak ?></td>
                </tr>
                <tr>
                  <td>Alamat</td>
                  <td><?= $pegawai->alamat ?></td>
                </tr>
                <tr>
                  <td>Email</td>
                  <td><?= $pegawai->email ?></td>
                </tr>
              </table>
              <h6>History Gaji</h6>
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>Tanggal</th>
                      <th>Jumlah</th>
                      <th>Bonus</th>
                      <th>Aksi</th>
                    </tr>
                  </thead>
                  <tfoot>
                    <tr>
                      <th>Tanggal</th>
                      <th>Jumlah</th>
                      <th>Bonus</th>
                      <th>Aksi</th>
                  </tfoot>
                  <tbody>
                      <!-- <td>8 / 9 / 2020</td>
                      <td>Rp. 20.000</td>
                      <td>Rp. 20.000</td>
                      <td> -->
                      <?php while($row = $gaji->fetch_object()): ?>
                      <tr>
                      <td><?= $row->tgl ?></td>
                      <td><?= $row->jumlah ?></td>
                      <td><?= $row->bonus ?></td>
                      <td><a href="detail_penggajian.php?id=$row->id_keuangan" class="btn btn-danger">Detail</a></td>
                      </tr>
                      <?php endwhile; ?>

                      </td>
                    </tr>
                  </tbody>
                </table>
              </div>
              <hr>
              <h6>History Keluhan</h6>
              <div class="table-responsive">
                <table class="table table-bordered" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>Tanggal</th>
                      <th>ID</th>
                      <th>Denda</th>
                      <th>Aksi</th>
                    </tr>
                  </thead>
                  <tfoot>
                    <tr>
                      <th>Tanggal</th>
                      <th>ID</th>
                      <th>Denda</th>
                      <th>Aksi</th>
                  </tfoot>
                  <tbody>
                    <tr>
                      <!-- <td>8 / 9 / 2020</td>
                      <td>2</td>
                      <td>Rp. 20.000</td>
                      <td> -->
                      <?php while($row = $keluhan->fetch_object()): ?>
                      <tr>
                      <td><?= $row->tgl ?></td>
                      <td><?= $row->id ?></td>
                      <td><?= $row->denda ?></td>
                      <td><a href="<?= "detail_keluhan.php?id=$row->id" ?>" class="btn btn-danger">Detail</a></td>
                      </tr>
                      <?php endwhile; ?>  
                        
                      </td>
                    </tr>
                  </tbody>
                </table>
                <a href="#" class="btn btn-danger">Ubah</a>
              </div>
            </div>
          </div>

        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->

      <!-- Footer -->
      <?php include './footer.php' ?>
      <!-- End of Footer -->

    </div>
    <!-- End of Content Wrapper -->

  </div>
  <!-- End of Page Wrapper -->

  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>

  <!-- Logout Modal-->
  <?php include './logout_modal.php' ?> 

  

<!-- Bootstrap core JavaScript-->
<script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="js/sb-admin-2.min.js"></script>

  <!-- Page level plugins -->
  <script src="vendor/datatables/jquery.dataTables.min.js"></script>
  <script src="vendor/datatables/dataTables.bootstrap4.min.js"></script>

  <!-- Page level custom scripts -->
  <script src="js/demo/datatables-demo.js"></script>


</body>

</html>
