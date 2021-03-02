<?php
session_start();
include 'koneksi.php';
if (!isset($_SESSION['pelanggan']) or empty($_SESSION['pelanggan'])) {
  echo "<script>alert('Silahkan login dulu');</script>";
  echo "<script>location='login.php'; </script>"; } ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <title>PetshopQu | Riwayat</title>
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
<section class="riwayat">
  <div class="container">
    <h2></h2><br>
    <h3>Riwayat Belanja <?php echo $_SESSION["pelanggan"]["nama"] ?></h3>
    <table class="table table-bordered">
      <thead>
        <tr>
          <th>No</th>
          <th>Tanggal</th>
          <th>Status</th>
          <th>Total</th>
          <th>Opsi</th>
        </tr>
      </thead>
      <tbody>
        <?php
        $nomor=1;
        $id_pelanggan = $_SESSION["pelanggan"]["id_pelanggan"];
        $ambil = $koneksi->query("SELECT * FROM pembelian WHERE id_pelanggan = $id_pelanggan"); 
        while ($pecah = $ambil->fetch_assoc()) { ?>
        <tr>
          <td><?php echo $nomor; ?></td>
          <td><?php echo $pecah["tanggal_pembelian"]; ?></td>
          <td>
            <?php echo $pecah["status_pembelian"]; ?>
            <br>
            <?php if (!empty($pecah['resi_pengiriman'])): ?>
            Resi : <?php echo $pecah['resi_pengiriman']; ?>
            <?php endif ?>    
          </td>
          <td>Rp.<?php echo number_format($pecah["total_pembelian"]); ?></td>
          <td>
            <a href="nota.php?id=<?php echo $pecah["id_pembelian"]; ?>" class="btn btn-info">Nota</a>
             </td> </tr>
        <?php $nomor++; ?>
      <?php }?> </tbody> </table> </div> </section>
</body>
</html>