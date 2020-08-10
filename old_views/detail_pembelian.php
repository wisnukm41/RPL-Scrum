<?php 
  include './config/function.php';
  isNotLoggedIn();
  $data = getDetailKeuangan($_GET['id']);
  $obat = getDetailPembelianObat($_GET['id']);

  if($data->num_rows < 1){
    header("Location:NotFound404.php");
  }
?>
<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Detail Pembelian || Apotek</title>

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
            <h1 class="h3 mb-0 text-gray-800">Detail Pembelian</h1>
          </div>

          <div class="card shadow mb-4 border-left-primary">
            <div class="card-header py-3 d-flex justify-content-between">
              <h6 class="m-0 font-weight-bold text-primary">Detail Pembelian</h6>
              <a href="pembelian_obat.php" class="btn btn-warning">Kembali</a>
            </div>
            <div class="card-body">
              <table class="table table-bordered">
              <?php while ($row = $data->fetch_object()) : ?>
                <tr>
                  <td>Tanggal</td>
                  <td><?= viewDate($row->waktu) ?></td>
                </tr>
                <tr>
                  <td>Apoteker</td>
                  <td><?= $row->username ?></td>
                </tr>
              <?php endwhile; ?>
              </table>
              <h6 class="font-weight-bold">Data Obat</h6>
              <table class="table table-striped table-bordered">
                <tr>
                  <td>Nama Obat</td>
                  <td>Jumlah</td>
                  <td>Harga</td>
                </tr>
                <?php
                $totalPrice = 0;
                while ($row = $obat->fetch_object()) : 
                ?>
                <tr>
                  <td><?= $row->nama ?></td>
                  <td><?= $row->qty ?></td>
                  <td>Rp. <?= number_format($row->total) ?></td>
                </tr>
                <?php 
                $totalPrice += $row->total;
                endwhile; 
                ?>
                <tr>
                  <td colspan='2' class='font-weight-bold'>Total</td>
                  <td class='font-weight-bold'>Rp. <?= number_format($totalPrice) ?></td>
                </tr>
              </table>
            </div>
          </div>

        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->

      <!-- Footer -->
      <footer class="sticky-footer bg-white">
        <div class="container my-auto">
          <div class="copyright text-center my-auto">
            <span>Copyright &copy; Your Website 2019</span>
          </div>
        </div>
      </footer>
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
