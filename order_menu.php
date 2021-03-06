<?php
  include './config/function.php';
  isNotLoggedIn();
  $menu = getMenu();
?>


<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Order Menu || Warung Soto</title>

  <?php include './head-import.php' ?>
</head>

<body id="page-top">

  <!-- Page Wrapper -->
  <div id="wrapper">

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

      <!-- Main Content -->
      <div id="content">

        <!-- Topbar -->
        <?php include './topbar-order.php' ?>
        <!-- End of Topbar -->

        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Menu</h1>
          </div>
          <?php if(isset($_SESSION['message'])): ?>
          <div class="alert alert-success">
            <?php
             echo $_SESSION['message'];
            unset($_SESSION['message']);
            ?>
          </div>
          <?php endif; ?>
          <?php if(isset($_SESSION['error'])): ?>
          <div class="alert alert-danger">
            <?php
             echo $_SESSION['error'];
            unset($_SESSION['error']);
            ?>
          </div>
          <?php endif; ?>
          <div class="card shadow mb-4 border-left-secondary">
            <div class="card-header py-3 d-flex justify-content-between">
              <h6 class="m-0 font-weight-bold text-secondary">Data Menu</h6>
            </div>
            <div class="card-body">
              <div class="row">
                <div class="col-md-3 col-0">
                  <img class="img-fluid rounded mb-2" src="./img/soto-1.jpg">
                  <img class="img-fluid rounded mb-2" src="./img/soto-2.jpg">
                  <img class="img-fluid rounded mb-2" src="./img/soto-3.jpg">
                </div>
                <div class="col-md-9 col-12 table-responsive">
                <form action="order.php" method="post">
                  <table class="table table-bordered">
                    <thead>
                      <tr>
                        <td>Nama Menu</td>
                        <td>Harga</td>
                        <td>Jumlah Beli</td>
                      </tr>
                    </thead>
                    <tbody>
                      <?php while($row = $menu->fetch_object()): ?>
                      <tr>
                        <td><?= $row->nama_soto ?></td>
                        <td>Rp. <?= number_format($row->harga_soto) ?></td>
                        <td>
                          <input type="hidden" name="nama[]" value="<?= $row->nama_soto ?>">
                          <input type="hidden" name="harga[]" value="<?= $row->harga_soto ?>">
                          <input type="hidden" name="id_menu[]" value="<?= $row->id ?>">
                          <input type="number" class="form-control text-center w-50 d-inline" name="qty[]" id="" value=0>
                          <?php 
                            $stok = getMenuStok($row->id);
                           ?>
                            <div class="d-inline ml-1 py-1 px-3 <?= $stok > 0 ? "bg-success" : "bg-danger" ?> text-white"><?= $stok ?></div>
                        </td>
                      </tr>
                      <?php endwhile; ?>
                    </tbody>
                  </table>
                  <div class="d-sm-flex align-items-center justify-content-between">
                  <button type="submit" class="btn btn-primary">Pesan</button>  
                  </div>
                </form>

                </div>
              </div>
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
