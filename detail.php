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
  <title>PetshopQu | Detail</title>
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
    <h1>Detail Produk</h1><br>

    <?php
    $id_produk = $_GET['id'];

    $ambil = $koneksi->query("SELECT * FROM produk WHERE id_produk = '$id_produk' ");
    $detail = $ambil->fetch_assoc();
    ?>

    <div class="row">
      <div class="col-md-6">
        <img src="foto_produk/<?php echo $detail['foto_produk']; ?>" alt="" class="img-responsive">
      </div>
      <div class="col-md-6">
        <h2><?php echo $detail['nama_produk']; ?></h2>
        
        <h3>Rp.<?php echo number_format($detail['harga_produk']); ?></h3>
        
        
        <h3><?php echo number_format( $detail['berat']); ?>Gr</h3>
        <h4>Stock: <?php echo $detail['id_stok'] ?></h4>

        
        
        <form method="POST">
          <div class="form-group">
            <div class="input-group">
              <input type="number" min="1" class="form-control" name="jumlah" max="<?php echo $detail['id_stok'] ?>" required autofocus>
              <div class="input-group-btn">
                <button class="btn btn-success" name="beli">Beli Sekarang</button>
              </div>
            </div>
          </div>
        </form>
        <?php
        if (isset($_POST['beli'])) {
        $jumlah = $_POST["jumlah"];
        if (isset($_SESSION['keranjang'][$id_produk]))
        {
          $_SESSION['keranjang'][$id_produk]+=$jumlah;
        }
        else
        {
          $_SESSION['keranjang'][$id_produk]=$jumlah;
        }

        echo "<script>alert('produk telah masuk ke keranjang belanja');</script>";
        echo "<script>location='keranjang.php';</script>";
        }
        ?>
        <p><?php echo $detail['deskripsi']; ?></p> 
        <a href="produk.php" class="btn btn-warning">Kembali</a>
      </div>
    </div>
  </div>
</section>
</body>
</html>