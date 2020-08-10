<?php 
include './config/function.php';
isLoggedIn();
?>

<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Login || Warung Soto</title>

  <!-- Custom fonts for this template-->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
  
  <!-- Custom styles for this template-->
  <link href="css/sb-admin-2.min.css" rel="stylesheet">
  <link rel="stylesheet" href="css/styles.css">

</head>

<body class="bg-gradient-secondary">

  <div class="container">

    <!-- Outer Row -->
    <div class="row justify-content-center">
      <div class="col-xl-6 col-lg-6 col-md-6">
        <div class="card o-hidden border-0 shadow-lg my-5">
          <div class="card-body p-0">
            <!-- Nested Row within Card Body -->
                <div class="p-5">
                  <div class="text-center">
                    <h1 class="h4 text-gray-900 mb-4">Login</h1>
                  </div>
                  <?php if(isset($_SESSION['error'])): ?>
                    <div class="alert alert-danger">
                    <?php 
                        echo $_SESSION['error'];
                        unset($_SESSION['error']);
                      ?>
                    </div>
                  <?php 
                    endif;
                  ?>
                  <?php if(isset($_SESSION['message'])): ?>
                    <div class="alert alert-success">
                      <?php 
                        echo $_SESSION['message'];
                        unset($_SESSION['message']);
                      ?>
                    </div>
                  <?php 
                    endif;
                  ?>
                  <form class="user" action='./action/login.php' method='POST'>
                    <div class="form-group">
                      <input type="text" class="form-control form-control-user" name='email' placeholder="Email" required>
                    </div>
                    <div class="form-group">
                      <input type="password" class="form-control form-control-user" name='password' placeholder="Password" required>
                    </div>
                    <button class="btn btn-secondary  btn-user btn-block">Login</button>
                  </form>
                </div>
          </div>
        </div>

      </div>

    </div>

  </div>

  <!-- Bootstrap core JavaScript-->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="js/sb-admin-2.min.js"></script>

</body>

</html>
