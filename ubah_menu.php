<?php 
  include './config/function.php';
  isNotLoggedIn();
  $data = getOneMenu($_GET['id']);

  if($data->num_rows < 1){
    header("Location:NotFound404.php");
  }

  $data = $data->fetch_object();

  $detail = getDetailMenu($_GET['id']);

  $stok = getStok();

?>

<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Ubah Menu || Warung Soto</title>

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
            <h1 class="h3 mb-0 text-gray-800">Ubah Menu</h1>
          </div>

          <div class="card shadow mb-4 border-left-secondary">
            <div class="card-header py-3 d-flex justify-content-between">
              <h6 class="m-0 font-weight-bold text-secondary">Ubah Data Menu</h6>
              <a href="menu.php" class="btn btn-warning">Kembali</a>
            </div>
            <div class="card-body">
            <form action="./action/update_menu.php" method="post">
                <input type="hidden" name="id_menu" value=<?= $data->id ?>>
                <div class="row">
                    <div class="form-group col-12">
                        <label for="nama">Nama <sup>*</sup></label>
                        <input type="text" class="form-control" id='nama' name="nama" required value="<?= $data->nama_soto ?>">
                    </div>
                    <div class="form-group col-12">
                        <label for="harga">Harga <sup>*</sup></label>
                        <input type="number" class="form-control" id='harga' name="harga" required value="<?= $data->harga_soto ?>">
                    </div>
                    <div class="form-group col-12">
                      <table class="table table-bordered">
                        <thead>
                          <tr>
                            <td>Bahan Baku</td>
                            <td width=20%>Jumlah <sup>*</sup></td>
                            <td width=10%><a href="#" class="btn btn-success addProduct">+</a></td>
                          </tr>
                        </thead>
                        <tbody>
                          <?php  
                          $i = 0;
                          while($row = $detail->fetch_object()):
                          ?>
                          <tr>
                            <td>
                            <select class="form-control" name='bahan_baku[]'>
                              <?php 
                              mysqli_data_seek($stok, 0);
                              while($second = $stok->fetch_object()): ?>
                              <option value="<?=$second->id?>" <?= $second->id == $row->id ? "selected" : "" ?>><?= $second->nama_stok ?></option>
                              <?php endwhile; ?>
                            </select>
                            </td>
                            <td>
                              <input type="number" class="form-control" name="qty[]" required value="<?= $row->jumlah ?>">
                            </td>
                            <td>
                              <?php if($i != 0) : ?>
                                <a href="#" class="btn btn-danger deleteProduct">-</a>
                              <?php endif ?>
                            </td>
                          </tr>
                          <?php
                          $i++;
                          endwhile; ?>
                        </tbody>
                      </table>
                    </div>
                </div>
                <button class="btn btn-primary">Simpan</button>
            </form>
            </div>
          </div>

        </div>
        <!-- /.container-fluid -->
        <div style='display:none'>
          <table>
            <tbody  class='productClone'>
            <tr>
            <td>
              <select class="form-control" name='bahan_baku[]'>
                <?php 
                mysqli_data_seek($stok, 0);
                while($row = $stok->fetch_object()): ?>
                <option value="<?=$row->id?>"><?= $row->nama_stok ?></option>
                <?php endwhile; ?>
              </select>
              </td>
              <td>
                <input type="number" class="form-control" name="qty[]" required>
              </td>
              <td><a href="#" class="btn btn-danger deleteProduct">-</a></td>
            </tr>
            </tbody>
          </table>
        </div>
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
  <script>
       $(document).ready(function() {
        $('body').on('click','.addProduct', function(e){
          e.preventDefault();
          var product = $('.productClone').html();
          $(".table > tbody").append(product);
        })

        $("body").on("click",".deleteProduct",function(e){ 
          e.preventDefault();
          $(this).parents("tr").remove();
        });
      });
        
  </script>
</body>

</body>

</html>
