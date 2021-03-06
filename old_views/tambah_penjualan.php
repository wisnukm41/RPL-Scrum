<?php 
  include './config/connection.php';
  include './config/function.php';
  isNotLoggedIn();
  $obat = getObat();
?>

<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Tambah Penjualan || Apotek</title>

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
            <h1 class="h3 mb-0 text-gray-800">Tambah Penjualan</h1>
          </div>

          <div class="card shadow mb-4 border-left-primary">
            <div class="card-header py-3 d-flex justify-content-between">
              <h6 class="m-0 font-weight-bold text-primary">Tambah Data Penjualan</h6>
              <a href="index.php" class="btn btn-warning">Kembali</a>
            </div>
            <div class="card-body">
            <form action="./action/create_sells.php" method="post">
                <div class="row">
                    <div class="form-group col-12">
                        <label for="tanggal">Tanggal <sup>*</sup></label>
                        <input type="date" class="form-control" id='tanggal' name="date" required>
                    </div>
                    <div class="form-group col-12">
                      <table class="table table-bordered">
                        <thead>
                        <tr>
                          <th>Nama Obat / Stok / Harga </th>
                          <th width=20%>Jumlah <sup>*</sup></th>
                          <th width=20%>Harga</th>
                          <th width=10%><a href="#" class="btn btn-success addProduct">+</a></th>
                        </tr>
                        </thead>
                        <tbody>
                          <tr>
                            <td>
                            <select class="form-control select" name='id_obat[]'>
                              <?php 
                                while($row = $obat->fetch_object()): ?>
                                <option value="<?= $row->id ?>" data-harga="<?= $row->harga ?>"><?= $row->nama ?> / <?= $row->jumlah ?> / Rp. <?= number_format($row->harga) ?></option>
                              <?php endwhile; ?>
                            </select>
                            </td>
                            <td>
                              <input type="number" class="form-control number" name="qty[]" required>
                            </td>
                            <td class='price'>Rp. <span>0</span></td>
                            <input type='hidden' class='hidden_price' name='price[]'/>
                            <td></td>
                          </tr>
                        </tbody>
                        <tfoot>
                          <tr>
                           <th colspan=2>Total</th>
                           <th>Rp. <span id='total' >0</span></th>
                          </tr>
                        </tfoot>
                      </table>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary">Tambah</button>
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
              <select class="form-control select" name='id_obat[]'>
                <?php 
                  mysqli_data_seek($obat, 0);
                  while($row = $obat->fetch_object()): 
                ?>
                  <option value="<?= $row->id ?>" data-harga="<?= $row->harga ?>"><?= $row->nama ?> / <?= $row->jumlah ?> / Rp. <?= number_format($row->harga) ?></option>
                <?php endwhile; ?>
              </select>
              </td>
              <td>
                <input type="number" class="form-control number" name="qty[]" required>
              </td>
              <td class='price'>Rp. <span>0</span></td>
              <input type='hidden' class='hidden_price' name='price[]'/>
              <td><a href="#" class="btn btn-danger deleteProduct">-</a></td>
            </tr>
            </tbody>
          </table>
        </div>
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
       $(document).ready(function() {
        $('body').on('click','.addProduct', function(e){
          e.preventDefault();
          var product = $('.productClone').html();
          $(".table > tbody").append(product);
        })

        $("body").on("click",".deleteProduct",function(e){ 
          e.preventDefault();
          $(this).parents("tr").remove();
          dataChange();
        });
        
        $("body").on('change','.select', dataChange);
        $("body").on('change','.number', dataChange);
        
        function dataChange(){
          var price = $(this).parents('tr').find('select').find(':selected').data('harga');
          var qty = $(this).parents('tr').find('.number').val();

          var nf = Intl.NumberFormat();
          var n = price*qty

          $(this).parents('tr').find('span').html(nf.format(n));
          $(this).parents('tr').find('.hidden_price').val(n);

          var total = 0;
          $(".hidden_price").each(function(){
            total += (this.value*1);
          });

          $('#total').html(nf.format(total));
        }
        });
  </script>
</body>

</html>
