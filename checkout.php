<?php
session_start();
include 'koneksi.php';
if (!isset($_SESSION['pelanggan'])){
	echo "<script>alert('Silahkan Login');</script>";
	echo "<script>location='login.php';</script>";
}
if (empty($_SESSION['keranjang']) OR !isset($_SESSION['keranjang'])){
	echo "<script>alert('Produk Kosong, Silahkan Anda Belanja Terlebih Dahulu');</script>";
	echo "<script>location='produk.php';</script>";
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <title>PetshopQu | Checkout</title>
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
<form method="POST">
<section class="konten">
	<div class="container">
		<h1></h1><br>
		<h1>Checkout</h1> <br>
		<table class="table table-bordered text-center">
			<thead>
				<tr>
					<th class="text-center">No</th>
					<th class="text-center">Produk</th>
					<th class="text-center">Harga</th>
					<th class="text-center">Jumlah</th>
					<th class="text-center">Subharga</th>
				</tr>
			</thead>
			<tbody>
				<?php $nomor = 1; ?>
				<?php $total_belanja = 0; ?>
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
					
					
					<td><?php echo $jumlah; ?></td>
					<td>Rp <?php echo number_format($subharga); ?></td>
				</tr>
				<?php $nomor++; ?>
				<?php $total_belanja+=$subharga; ?>
				<?php endforeach ?>
			</tbody>
			<tfoot>
				<th class="text-center" colspan="4">Total</th>
				<th class="text-center">Rp <?php echo number_format($total_belanja); ?></th>
			</tfoot>
		</table>
			<div class="row">
				<div class="col-md-3">
					<div class="form-group">
						<input type="text" readonly class="form-control text-center" value="<?php echo $_SESSION['pelanggan']['nama']; ?>">
					</div>
				</div>
				<div class="row">
				<div class="col-md-7">
					<div class="form-group">
						<input type="text" readonly class="form-control text-center" value="<?php echo $_SESSION['pelanggan']['no_telp']; ?>">
					</div>
				</div>
			<br>	
			<div class="form-group">
				<label>Konfirmasi Alamat Pengiriman</label>
				<textarea name="alamat_pengiriman" rows="4" class="form-control" style="resize: none;" placeholder="Masukkan Alamat Pengiriman Secara Lengkap"></textarea>
				<label>Pesan</label>
				<textarea name="pesan" rows="2" class="form-control" style="resize: none;" placeholder="Silahkan Tinggalkan Pesan"></textarea>
			</div>
			<input type="submit" name="checkout" class="btn btn-success" value="Checkout">
		</form>

		<?php
		if (isset($_POST['checkout'])) {
			$id_pelanggan = $_SESSION['pelanggan']['id_pelanggan'];
			$tanggal_pembelian 	= date("Y-m-d");
			$alamat_pengiriman 	= $_POST['alamat_pengiriman'];
			$pesan 				= $_POST['pesan'];
			$total_pembelian = $total_belanja ;

			//menyimpan data ke tabel pembelian
			$koneksi->query("INSERT INTO pembelian(id_pelanggan, tanggal_pembelian, total_pembelian, alamat_pengiriman,pesan) VALUES('$id_pelanggan','$tanggal_pembelian','$total_pembelian','$alamat_pengiriman','$pesan')");
			$id_pembelian_barusan = $koneksi->insert_id;
			$i = 0;
			foreach ($_SESSION['keranjang'] as $id_produk => $jumlah) {
			//mendapatkan data produk berdasarkan id_produk

			$ambil = $koneksi->query("SELECT * FROM produk WHERE id_produk = '$id_produk'");
			$perproduk = $ambil->fetch_assoc();
			$nama = $perproduk['nama_produk'];			
			$harga = $perproduk['harga_produk']* $jumlah;
			
			$berat = $perproduk['berat'];
			$subharga = $perproduk['harga_produk']*$jumlah;
			$subberat = $perproduk['berat']* $jumlah;
			
			$koneksi->query("INSERT INTO detail_order(id_pembelian, id_produk, nama, harga, berat, subharga, subberat, jumlah) VALUES('$id_pembelian_barusan','$id_produk','$nama','$harga','$berat','$subharga','$subberat','$jumlah')");
			$koneksi->query("UPDATE produk SET id_stok = id_stok - $jumlah WHERE id_produk ='$id_produk' ");
			$i++;
			}
			//mengkosongkan keranjang belanja
			unset($_SESSION['keranjang']);
			//tampilan akan dialihkan ke nota, nota pembelian barusan
			echo "<script>alert('Pembelian Sukses');</script>";
			echo "<script>location='nota.php?id=$id_pembelian_barusan';</script>";
		}
		?>
	</div>
</section><br>
</body>
</html>