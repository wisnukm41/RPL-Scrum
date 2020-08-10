<?php 
  include './config/function.php';
  isNotLoggedIn();
  $data = getDetailObat($_GET['id']);
  $supplier = getSupplier();
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

  <title>Ubah Data Obat || Apotek</title>

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
            <h1 class="h3 mb-0 text-gray-800">Ubah Data Obat</h1>
          </div>

          <div class="card shadow mb-4 border-left-primary">
            <div class="card-header py-3 d-flex justify-content-between">
              <h6 class="m-0 font-weight-bold text-primary">Ubah Data Obat</h6>
              <a href="pembelian_obat.php" class="btn btn-warning">Kembali</a>
            </div>
            <div class="card-body">
            <form action="./action/update_medicine.php" method="post" enctype="multipart/form-data">
              <input type="hidden" name="id" value=<?= $data->id ?>>
                <div class="row">
                    <div class="form-group col-12">
                        <label for="nama">Nama Obat <sup>*</sup></label>
                        <input type="text" class="form-control" id='nama' name="nama" required value=<?= $data->nama ?>>
                    </div>
                    <div class="form-group col-12">
                        <label for="harga">Harga Obat <sup>*</sup></label>
                        <input type="number" class="form-control" id='harga' name="harga" required value=<?= $data->harga ?>>
                    </div>
                    <div class="form-group col-12">
                        <label for="deskripsi">Deskripsi <sup>*</sup></label>
                        <textarea  id='deskripsi' name="deskripsi" class="form-control" rows="10" required><?= $data->deskripsi ?></textarea>
                    </div>
                    <div class="form-group col-6">
                      <label for="photo">Gambar Obat</label>
                      <input type="file" class="form-control-file" id="photo" accept='image/*' name='photo'>
                      <input type="hidden" value="<?=$data->foto?>"" name='old_photo'>
                    </div>
                    <div class="form-group col-6">
                      <img src="<?= "./img/obat/$data->foto" ?>" class='img-preview' id="preview">
                    </div>
                    <div class="form-group col-12">
                      <label for="supplier">Supplier Obat</label>
                        <select class="form-control" name='supplier' id='supplier'>
                        <?php while($row = $supplier->fetch_object()): ?>
                          <option value="<?= $row->id ?>" <?= $row->id == $data->idSupplier ? "selected" : "" ?>><?= $row->nama ?></option>
                        <?php endwhile; ?>
                        </select>
                    </div>
                </div>
                <hr>
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
  <script>
  function readURL(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();

      reader.onload = function (e) {
          $('#preview').attr('src', e.target.result);
      }

      reader.readAsDataURL(input.files[0]);
    }
  }

  $("#photo").change(function(){
      readURL(this);
  });
  </script>

</body>

</html>
