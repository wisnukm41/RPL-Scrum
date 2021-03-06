<?php 
  include './config/function.php';
  isNotLoggedIn();
  $data = getProfile()->fetch_object();
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Profile || Warung Soto</title>

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
            <h1 class="h3 mb-0 text-gray-800">Profile</h1>
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
          <div class="card shadow mb-4 border-left-primary">
            <div class="card-header py-3 d-flex justify-content-between">
              <h6 class="m-0 font-weight-bold text-primary">Profile Pegawai</h6>
              <a href="profile.php" class="btn btn-warning">Kembali</a>
            </div>
            <div class="card-body">
            <form action="./action/update_profile.php" method="post">
            <input type="hidden" name="id" value="<?= $data->id ?>"">
            <table class='table table-bordered'>
              <tr>
                <td>Nama</td>
                <td><input type="text" class="form-control" name="nama" value="<?= $data->nama ?>"></td>
              </tr>
              <tr>
                <td>Email</td>
                <td><?= $data->email ?></td>
              </tr>
              <tr>
                <td>Jabatan</td>
                <td><?= $data->jabatan ?></td>
              </tr>
              <tr>
                <td>Jenis Kelamin</td>
                <td><?= $data->jenis_kelamin == 'L' ? "Laki - Laki" : 'Perempuan' ?></td>
              </tr>
              <tr>
                <td>Kontak</td>
                <td><input type="text" class="form-control" name="kontak" value="<?= $data->kontak ?>"></td>
              </tr>
              <tr>
                <td>Kontak</td>
                <td><input type="text" class="form-control" name="rekening" value="<?= $data->rekening ?>"></td>
              </tr>
              <tr>
                <td>Tanggal Lahir</td>
                <td><?= viewDate($data->tgl_lahir) ?></td>
              </tr>
              <tr>
                <td>Alamat</td>
                <td><input type="text" class="form-control" name="alamat" value="<?= $data->alamat ?>"></td>
              </tr>
            </table>
              <button class="btn btn-primary">Simpan</button>
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
