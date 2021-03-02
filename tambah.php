<?php
session_start();
include 'koneksi.php';
if (empty($_SESSION['keranjang']) OR !isset($_SESSION['keranjang'])){
	echo "<script>alert('Produk Kosong, Silahkan Anda Belanja Terlebih Dahulu');</script>";
	echo "<script>location='index.php';</script>";
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <title>PetshopQu | Keranjang</title>
  <meta content="" name="description">
  <meta content="" name="keywords">
  <link rel="stylesheet" href="Admin/assets/bower_components/bootstrap/dist/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
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
<section class="konten">
	<div class="container">
		<h1></h1><br>
		<h1>Keranjang Belanja</h1> <br>
		<table class="table table-bordered text-center">
			<thead>
				<tr>
					<th class="text-center">No</th>
					<th class="text-center">Produk</th>
					<th class="text-center">Harga</th>
					<th class="text-center">Jumlah</th>
					<th class="text-center">Subharga</th>
					<th class="text-center">Aksi</th>
				</tr>
			</thead>
			<tbody>
				<?php $nomor = 1; ?>
				<?php foreach ($_SESSION['keranjang'] as $id_produk => $jumlah): ?>
				<?php 
				$ambil = $koneksi->query("SELECT * FROM produk WHERE id_produk = '$id_produk' ");
				$pecah = $ambil->fetch_assoc();		
				$subharga = $pecah['harga_produk']*$jumlah;
				?>
				<tr>
					<td><?php echo $nomor; ?></td>
					<td><?php echo $pecah['nama_produk']; ?></td>
					
					<td>Rp <?php echo number_format($pecah['harga_produk']); ?></td>
					
					<td>
					<a href="kurang.php?id=<?php echo $id_produk; ?>"> <span class="glyphicon glyphicon-minus"></span></a>
					<?php echo $jumlah; ?>
					<a href="tambah.php?id=<?php echo $id_produk; ?>"> <span class="glyphicon glyphicon-plus"></span></a>
					</td>
					
					<td>Rp <?php echo number_format($subharga); ?></td>
					<td>
					<a href="hapus_keranjang.php?id=<?php echo $id_produk; ?>" class="btn btn-danger btn-xs" onclick="return confirm('Apakah anda yakin ingin menghapus produk ?')">Hapus</a>
					</td>
					
				</tr>
				<?php $nomor++; ?>
				<?php endforeach ?>
			</tbody>
		</table>
		<a href="index.php" class="btn btn-default">Lanjutkan Belanja</a>
		<a href="checkout.php" class="btn btn-success">Checkout</a>
	</div>
<?php
			$id_produk=$_GET['id'];
			if (isset($_SESSION['keranjang'][$id_produk]))
			{
				$_SESSION['keranjang'][$id_produk]+=1;
			}
			else
			{
				$_SESSION['keranjang'][$id_produk]=1;
			}
			echo "<meta http-equiv='refresh' content='1;url=keranjang.php'>"
?>

</section><br>

</body>
</html>