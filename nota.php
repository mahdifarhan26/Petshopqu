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
  <title>PetshopQu | Nota</title>
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
		<h2></h2><br>
		<h2>Nota Pembelian</h2>
		<?php
		$ambil = $koneksi->query("SELECT * FROM pembelian JOIN pelanggan 
			ON pembelian.id_pelanggan = pelanggan.id_pelanggan 
			WHERE pembelian.id_pembelian = '$_GET[id]' ");
		$detail = $ambil->fetch_assoc();
		?>
		<!-- jika pelanggan yang beli tidak sama dengan pelanggan yang login, maka dilarikan ke riwayat-->
		<?php 
		$iduseryangbeli = $detail["id_pelanggan"];
		$iduseryanglogin = $_SESSION["pelanggan"]["id_pelanggan"];
		if ($iduseryangbeli!==$iduseryanglogin) {
			echo "<script>alert('jangan di ubah');</script>";
			echo "<script>location='riwayat.php';</script>";
			exit(); } ?>
		<div class="row">
			<div class="col-md-4">
				<h3>Pembelian</h3>
				<strong>NO. Pembelian : <?php echo $detail['id_pembelian']; ?></strong><br>
				Tanggal : <?php echo $detail['tanggal_pembelian']; ?> <br>
			Total : Rp. <?php echo number_format($detail['total_pembelian']); ?>
			</div>
			<div class="col-md-4">
				<h3>Pelanggan</h3>
				<strong>Nama : <?php echo $detail['nama']; ?></strong> <p>
			Telepon : <?php echo $detail['no_telp']; ?> <br>
			Email : <?php echo $detail['email_pelanggan']; ?>
			</div>
			<div class="col-md-4">
				<h3>Pengiriman</h3>
				Alamat : <?php echo $detail['alamat_pengiriman']; ?><br>
				Pesan : <?php echo $detail['pesan']; ?>
</div> </div>
<table class="table table-bordered text-center">
	<thead>
		<tr>
			<th class="text-center">No.</th>
			<th class="text-center">Nama Produk</th>
			<th class="text-center">Harga Produk</th>
			<th class="text-center">Berat Produk</th>
			<th class="text-center">Jumlah</th>
			<th class="text-center">Subharga</th>
			<th class="text-center">Subberat</th>
		</tr>
	</thead>
	<tbody>
		<?php $nomor = 1; ?> 
		<?php $ambil = $koneksi->query("SELECT * FROM detail_order WHERE id_pembelian = '$_GET[id]' "); ?>
		<?php while($pecah = $ambil->fetch_assoc()) { 
			?>
		<tr>
			<td><?php echo $nomor; ?></td>
			<td><?php echo $pecah['nama']; ?></td>
			<td>Rp.<?php echo number_format($pecah['harga']) ; ?></td>
			<td><?php echo $pecah['berat'] ; ?>Gr</td>
			<td><?php echo $pecah['jumlah']; ?></td>
			<td>Rp.<?php echo number_format($pecah['subharga']) ; ?></td>
			<td><?php echo $pecah['subberat'];?> Gr</td>
		</tr>
		<?php $nomor++; ?>
<?php } ?>	 </tbody> </table>
<div class="row">
	<div class="col-md-6 alert alert-success">
		<p>Silahkan Melakukan Pembayaran Rp. <?php echo number_format($detail['total_pembelian']); 
		?> ke
		<strong>MANDIRI 157-00-0432867-1 AN. BASUKI </strong>
	</p> </div> </div> </section>
</body>
</html>