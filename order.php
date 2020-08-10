<?php
include './config/function.php';
isNotLoggedIn();
  $nama = $_POST['nama'];
  $harga = $_POST['harga'];
  $id_menu = $_POST['id_menu'];
  $qty = $_POST['qty'];
?>
<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Order || Warung Soto</title>

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
                  <a href="order_menu.php" class="btn btn-warning mb-2">Kembali</a>
                <form action="./action/create_penjualan.php" method="post">
                  <table class="table table-bordered">
                    <thead>
                      <tr>
                        <td>Nama Menu</td>
                        <td>Harga</td>
                        <td>Jumlah Beli</td>
                        <td>Sub Total </td>
                      </tr>
                    </thead>
                    <tbody>
                        <?php
                        $total=0;
                        for ($i=0; $i < sizeof($qty); $i++) :
                          if($qty[$i] > 0):
                            $sub = $harga[$i] * $qty[$i];
                            $total = $total + $sub;
                        ?>
                       <tr>
                          <td><?= $nama[$i] ?></td>
                          <td>Rp. <?= number_format($harga[$i]) ?></td>
                          <input type="hidden" class='harga' value=<?=$harga[$i]?>>
                          <input type="hidden" name='id_menu[]' value=<?=$id_menu[$i]?>>
                          <td>
                            <input type="number" class="form-control text-center w-50 number" name="qty[]" value=<?= $qty[$i] ?>>
                          </td>
                          <td class="harga">
                            Rp. <span><?= number_format($sub) ?></span>
                            <input type="hidden" class='hidden_price' name="harga[]" value=<?=$sub?>>
                          </td>
                        </tr>
                        <?php
                        endif;    
                        endfor;?>
                    </tbody>
                    <tfoot>
                      <tr class="font-weight-bold">
                        <td colspan=3>Total</td>
                        <td>Rp. <span id="total"><?= number_format($total) ?></span></td>
                        <input type="hidden" id="hidden_total" name="total" id="hidden_total" value=<?= $total ?>>
                      </tr>
                    </tfoot>
                  </table>
                  <div class="d-sm-flex align-items-center justify-content-between">
                  <input type="text" class="form-control w-25" name="kontak" placeholder="Kontak Pembeli (Optional)">
                  <button type="submit" class="btn btn-success">Konfirmasi</button>  
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
  <script>
       $(document).ready(function() {

        $("body").on('change','.number', dataChange);
        
        function dataChange(){
          var price = $(this).parents('tr').find('.harga').val();
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
          $('#hidden_total').val(total);
          
        }
        });
  </script>

</body>

</html>
