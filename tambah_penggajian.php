<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Tambah Penggajian || Warung Soto</title>

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
            <h1 class="h3 mb-0 text-gray-800">Tambah Penggajian</h1>
          </div>

          <div class="card shadow mb-4 border-left-secondary">
            <div class="card-header py-3 d-flex justify-content-between">
              <h6 class="m-0 font-weight-bold text-secondary">Tambah Data Penggajian</h6>
              <a href="penggajian.php" class="btn btn-warning">Kembali</a>
            </div>
            <div class="card-body">
            <form action="#" method="post">
                <div class="row">
                    <div class="form-group col-12">
                        <label for="date">Tanggal <sup>*</sup></label>
                        <input type="date" class="form-control" id='date' name="date" required>
                    </div>
                    <div class="form-group col-12">
                      <table class="table table-bordered">
                        <thead>
                          <tr>
                            <td>Pegawai</td>
                            <td>Gaji <sup>*</sup></td>
                            <td>Bonus</td>
                            <td>Denda</td>
                            <td><a href="#" class="btn btn-success addProduct">+</a></td>
                          </tr>
                        </thead>
                        <tbody>
                          <tr>
                            <td>
                            <select class="form-control" name='pegawai[]'>
                              <option value="1">Rendi</option>
                            </select>
                            </td>
                            <td>
                              <input type="number" class="form-control" name="gaji[]" required>
                            </td>
                            <td>
                              <input type="number" class="form-control" name="bonus[]" required>
                            </td>
                            <td>
                              <input type="number" class="form-control" name="denda[]" required>
                            </td>
                            <td></td>
                          </tr>
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
                <select class="form-control" name='pegawai[]'>
                  <option value="1">Rendi</option>
                </select>
                </td>
                <td>
                  <input type="number" class="form-control" name="gaji[]" required>
                </td>
                <td>
                  <input type="number" class="form-control" name="bonus[]" required>
                </td>
                <td>
                  <input type="number" class="form-control" name="denda[]" required>
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
