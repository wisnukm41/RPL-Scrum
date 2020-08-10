<?php 
  include './config/function.php';
  isNotLoggedIn();
  $data = getOneMenu($_GET['id']);

  if($data->num_rows < 1){
    header("Location:NotFound404.php");
  }

  $data = $data->fetch_object();

  $detail = getDetailMenu($_GET['id']);

?>
<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Detail Menu || Warung Soto</title>

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
            <h1 class="h3 mb-0 text-gray-800">Detail Menu</h1>
          </div>

          <div class="card shadow mb-4 border-left-secondary">
            <div class="card-header py-3 d-flex justify-content-between">
              <h6 class="m-0 font-weight-bold text-secondary">Detail Menu</h6>
              <a href="menu.php" class="btn btn-danger">Kembali</a>
            </div>
            <div class="card-body">
              <h6 class="font-weight-bold">Detail Menu</h6>
              <table class="table table-bordered">
                <tr>
                  <td>Nama </td>
                  <td><?= $data->nama_soto ?></td>
                </tr>
                <tr>
                  <td>Harga</td>
                  <td>Rp. <?= number_format($data->harga_soto) ?></td>
                </tr>
              </table>
              <h6 class="font-weight-bold">Stok Yang Digunakan</h6>
              <table class="table table-bordered">
              <?php while($row = $detail->fetch_object()): ?>
                <tr>
                  <td><?= $row->nama_stok ?> </td>
                  <td class="text-center"><?=$row->jumlah?></td>
                </tr>
              <?php endwhile; ?>
              </table>
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
