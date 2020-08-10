<?php 
  // include './config/function.php';
  // isNotLoggedIn();
?>
<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Pembelian Stok || Warung Soto</title>

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
            <h1 class="h3 mb-0 text-gray-800">Pembelian Stok</h1>
          </div>

          <div class="card shadow mb-4 border-left-secondary">
            <!-- <div class="card-header py-3 d-flex justify-content-between">
              <a href="./Pembelian.php" class="btn btn-warning">Kembali</a>
            </div> -->
            <div class="card-body">
            <form action="#" method="post">
                <div class="row">
                    <div class="form-group col-6">
                        <label for="bahan">Bahan Baku <sup>*</sup></label>
                        <select name="bahan" id="bahan" class="form-control">
                          <option value="1">?</option>
                          <option value="2">?</option>
                        </select>
                    </div>
                    <div class="form-group col-6">
                        <label for="supplier">Supplier <sup>*</sup></label>
                        <select name="supplier" id="supplier" class="form-control">
                          <option value="1">?</option>
                          <option value="2">?</option>
                        </select>
                    </div>
                    <div class="form-group col-3">
                        <label for="Jumlah">Jumlah <sup>*</sup></label>
                        <input type="number" class="form-control" id='Jumlah' name="jumlah" required>
                    </div>
                    <div class="form-group col-6">
                        <label for="Jumlah">Jumlah <sup>*</sup></label>
                        <input type="number" class="form-control" id='Jumlah' name="jumlah" required>
                    </div>
                </div>
                <button type="submit" class="btn btn-secondary">Simpan</button>
            </form>
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
