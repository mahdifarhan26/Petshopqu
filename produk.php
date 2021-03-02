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
  <title>PetshopQu | Produk</title>
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
    <h1>Produk </h1> <br>
    <div class="row">
      <?php 
        if (isset($_GET['page'])) {
          (int) $page = $_GET['page'];
        } else {
          $page = 1;
        }
        $page_view_end = $page * 8;
        $page_view_start = $page_view_end - 8;
        $ambil = $koneksi->query("SELECT * FROM produk limit $page_view_start,8"); ?>
      <?php while($perproduk = $ambil->fetch_assoc()) {?>
      <div class="col-md-3">
        <div class="thumbnail">
          <img src="foto_produk/<?php echo $perproduk['foto_produk']; ?>" alt="" >
          <div class="caption text-center">
            <h3><?php echo $perproduk['nama_produk']; ?></h3>
              
            <h5>Rp <?php echo number_format($perproduk['harga_produk']); ?> </h5>
              
            <a href="detail.php?id=<?php echo $perproduk['id_produk']; ?>" class="btn btn-primary "><i class="glyphicon glyphicon-shopping-cart"></i> Beli Sekarang</a>
          </div>
        </div>
      </div>
    <?php } ?>
    </div>
  </div>
</section>
<div class="text-center">
<nav aria-label="Page navigation example">
  <ul class="pagination">
    <li class="page-item">
      <a class="page-link" href="#" aria-label="Previous">
        <span aria-hidden="true">&laquo;</span>
        <!-- <span class="sr-only">Previous</span> -->
      </a>
    </li>
      <?php $ambil = $koneksi->query("SELECT count(*) as count_of_product FROM produk"); ?>
      <?php while($perproduk = $ambil->fetch_assoc()) {
        $jumlah_produk = $perproduk['count_of_product'];
         } ?>
      <?php   
        (int) $jumlah_produk = ($jumlah_produk / 8) + 1;
        for ($i=1; $i <= $jumlah_produk; $i++) { ?>
    <li class="page-item"><a class="page-link" href="?page=<?=$i?>"><?=$i?></a></li>
  <?php } ?>
    <li class="page-item">
      <a class="page-link" href="#" aria-label="Next"> 
        <span aria-hidden="true">&raquo;</span>
        <!-- <span class="sr-only">Next</span> -->
      </a>
    </li>
  </ul>
</nav>
</div>

</body>
</html>