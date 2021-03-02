<?php
session_start();
include 'koneksi.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <title>PetshopQu | Login</title>
  <meta content="" name="description">
  <meta content="" name="keywords">
  <link rel="stylesheet" href="Admin/assets/bower_components/bootstrap/dist/css/bootstrap.min.css">
  <!-- Favicons -->
  <link href="assets/img/favicon.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/icofont/icofont.min.css" rel="stylesheet">
  <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="assets/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="assets/vendor/venobox/venobox.css" rel="stylesheet">
  <link href="assets/vendor/owl.carousel/assets/owl.carousel.min.css" rel="stylesheet">
  <link href="assets/vendor/aos/aos.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="assets/css/style.css" rel="stylesheet">
</head>
<body>
<?php include 'menu.php'; ?>
<div class="container">
  <div class="row" style="margin-top: 100px">
    <div class="col-md-4 col-md-offset-4">
      <div class="panel panel-default">
        <div class="panel-heading">
          <div class="panel-title text-center">
            <label>PetshopQu | Login</label>
          </div>
        </div>
        <div class="panel-body">
          <form method="POST">
            <div class="form-group">
              <label>Email</label>
              <input type="email" class="form-control" name="email">
            </div>
            <div class="form-group">
              <label>Password</label>
              <input type="password" class="form-control" name="password">
            </div>
            <button class="btn btn-primary btn-lg btn-block" name="login">Login</button><br>
            <p>Daftar Sebagai Pelanggan? <a href="daftar.php" style="text-decoration: none;"><b>Daftar</b></a></p>
          </form>
          <?php
          if (isset($_POST['login'])){
            $email = $_POST['email'];
            $password = $_POST['password'];

            $ambil = $koneksi->query("SELECT * FROM pelanggan WHERE email_pelanggan = '$email' AND 
              password = '$password' ");
            $akun_cocok = $ambil->num_rows;

            if ($akun_cocok == 1) {
              $akun = $ambil->fetch_assoc();

              $_SESSION['pelanggan'] = $akun;
              echo "<div class='alert alert-success text-center'>Login Berhasil</div>";
              if (isset($_SESSION['keranjang']) OR !empty($_SESSION['keranjang'])) {
                echo "<meta http-equiv='refresh' content='1;url=checkout.php'>";
              } else {
              echo "<meta http-equiv='refresh' content='1;url=produk.php'>";
              }
            } else {
              echo "<div class='alert alert-danger text-center'>Login Gagal, Silahkan Periksa Akun Anda</div>";
              echo "<meta http-equiv='refresh' content='1;url=login.php'>";
            }
          }
          ?>
        </div>
      </div>
    </div>
  </div>
</div>
</body>
</html>