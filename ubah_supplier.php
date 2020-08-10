<?php
    include './config/function.php';
    isNotLoggedIn();
    $data = getOneSupplier($_GET['id']);

    
    if($data->num_rows < 1){
      header("Location:NotFound404.php");
    }

    $data = $data->fetch_object();
?>
<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Ubah Supplier || Apotek</title>

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
            <h1 class="h3 mb-0 text-gray-800">Ubah Supplier</h1>
          </div>

          <div class="card shadow mb-4 border-left-primary">
            <div class="card-header py-3 d-flex justify-content-between">
              <h6 class="m-0 font-weight-bold text-primary">Ubah Data Supplier</h6>
              <a href="supplier.php" class="btn btn-warning">Kembali</a>
            </div>
            <div class="card-body">
            <form action="./action/update_supplier.php" method="post">
              <input type="hidden" name="id" value=<?= $data->id ?>>
                <div class="row">
                  <div class="form-group col-12">
                      <label for="nama">Nama Supplier <sup>*</sup></label>
                      <input type="text" class="form-control" id='nama' name="nama" required value=<?= $data->nama ?>>
                  </div>
                  <div class="form-group col-12">
                      <label for="jenis">Jenis <sup>*</sup></label>
                      <input type="text" class="form-control" id='jenis' name="jenis" required  value=<?= $data->jenis_supplier ?>>
                  </div>
                  <div class="form-group col-12">
                      <label for="kontak">Kontak <sup>*</sup></label>
                      <input type="text" class="form-control" id='kontak' name="kontak" required  value=<?= $data->kontak ?>>
                  </div>
                </div>
                <button type="submit" class="btn btn-primary">Simpan</button>
            </form>
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
