<!DOCTYPE html>
<html lang="en">

<?php 
  include './config/function.php';
  isNotLoggedIn();
  $keuangan = getDataKeuangan();

  $Pendapatan = 0;
  while($row = $keuangan->fetch_object()){
    if($row->jenis == "in"){
      $Pendapatan += intval($row->jumlah);
    }
    else
      $Pendapatan -= intval($row->jumlah);
  }

?>

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Keuangan</title>

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
            <h1 class="h3 mb-0 text-gray-800">Keuangan</h1>
          </div>

          <div class="row">

            <!-- Earnings (Total) Card Example -->
            <div class="col-12 mb-4">
              <div class="card border-left-info shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Pendapatan Total</div>
                      <!-- <div class="h5 mb-0 font-weight-bold <?php//= getMonthly()->inTotal >= getMonthly()->outTotal ? "text-success" : "text-danger" ?>">Rp. <?php//= number_format(getTotalIncome()->inTotal - getTotalIncome()->outTotal) ?></div> -->
                      <div class="h5 mb-0 font-weight-bold">Rp <?= number_format($Pendapatan)?></div>
                    </div>
                    <div class="col-auto">
                      <i class="fa fa-dollar-sign fa-2x text-gray-300" aria-hidden="true"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <div class="card shadow mb-4 border-left-secondary">
            <div class="card-header py-3 d-flex justify-content-between">
              <h6 class="m-0 font-weight-bold text-secondary">Data Keuangan</h6>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>Tanggal</th>
                      <th>Jenis</th>
                      <th>Jumlah</th>
                      <th>Deskripsi</th>
                    </tr>
                  </thead>
                  <tfoot>
                    <tr>
                      <th>Tanggal</th>
                      <th>Jenis</th>
                      <th>Jumlah</th>
                      <th>Deskripsi</th>
                    </tr>
                  </tfoot>
                  <tbody>
                    <!-- <tr>
                      <td>20 / 9 / 2020</td>
                      <td>In</td>
                      <td>Rp. 300.000</td>
                      <td>Penjualan</td>
                    </tr> -->

                    <?php
                    mysqli_data_seek($keuangan,0); 
                    while($row = $keuangan->fetch_object()): ?>
                    <tr>
                      <td><?= $row->tgl ?></td>
                      <td><?= $row->jenis ?></td>
                      <td><?= number_format($row->jumlah) ?></td>
                      <td><?= $row->deskripsi ?></td>
                    </tr>
                    <?php endwhile; ?>

                  </tbody>
                </table>
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
