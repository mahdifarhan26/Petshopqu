<?php include 'koneksi.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <title>PetshopQu | Daftar</title>
  <link rel="stylesheet" href="Admin/assets/bower_components/bootstrap/dist/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <meta content="" name="description">
  <meta content="" name="keywords">

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
<div class="container" style="margin-top: 100px">
	<div class="row">
		<div class="col-md-8 col-md-offset-2">
			<div class="panel panel-default">
				<div class="panel-heading">
					<h3 class="panel-title text-center"><b>PetshopQu | Daftar Pelanggan</b></h3>
				</div>
				<div class="panel-body">
					<form method="POST" class="form-horizontal">
						<div class="form-group">
						<label class="col-md-3 control-label">Nama</label>
						<div class="col-md-6">
							<input type="text" class="form-control" name="nama" required>
						</div>	
						</div>
						<div class="form-group">
						<label class="col-md-3 control-label">Email</label>
						<div class="col-md-6">
							<input type="email" class="form-control" name="email" required>
						</div>	
						</div>
						<div class="form-group">
						<label class="col-md-3 control-label">Password</label>
						<div class="col-md-6">
							<input type="password" class="form-control" name="password" required>
						</div>	
						</div>
						<div class="form-group">
						<label class="col-md-3 control-label">Alamat</label>
						<div class="col-md-6">
							<textarea name="alamat" rows="2" class="form-control" style="resize: none;" required>
							</textarea>
						</div>	
						</div>
						<div class="form-group">
						<label class="col-md-3 control-label">No. Telepon</label>
						<div class="col-md-6">
							<input type="text" class="form-control" name="telepon" required>
						</div>	
						</div>
						<div class="form-group">
						<div class="col-md-6 col-md-offset-3">
							<button class="btn btn-primary btn-block btn-lg" name="daftar">Daftar</button>
						</div>	
						</div>
					</form>
					<?php
					if (isset($_POST["daftar"]))
					{
						$nama = $_POST["nama"];
						$email = $_POST["email"];
						$password = $_POST["password"];						
						$alamat = $_POST["alamat"];
						$telepon = $_POST["telepon"];
						//cek apakah email sudah digunakan atau belum
						$ambil = $koneksi->query("SELECT * FROM pelanggan WHERE email_pelanggan ='$email'");
						$cocok = $ambil->num_rows;
						if ($cocok == 1)  {
							echo "<script>alert('Pendaftaran Gagal, Email Sudah Digunakan');</script>";
							echo "<script>location='daftar.php';</script>";
						} 
						else  {
							//queryy memasukkan kedalam database
							$koneksi->query("INSERT INTO pelanggan(email_pelanggan, password, nama, no_telp, alamat_pelanggan)VALUES('$email','$password','$nama','$telepon','$alamat')");
							echo "<script>alert('Pendaftaran Berhasil, Silahkan Anda Login');</script>";
							echo "<script>location='login.php';</script>";
						} } ?>
				</div>
			</div>
		</div>
	</div>
</div>
</body>
</html>