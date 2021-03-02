  <!-- ======= Header ======= -->
  <header id="header" class="fixed-top d-flex align-items-center">
    <div class="container">
      <div class="header-container d-flex align-items-center">
        <div class="logo mr-auto">
          <h1 class="text-light"><a href="index.php"><span>PetshopQu</span></a></h1>
          <!-- Uncomment below if you prefer to use an image logo -->
          <!-- <a href="index.html"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->
        </div>

        <nav class="nav-menu d-none d-lg-block">
          <ul>
            <li class="active"><a href="index.php">Home</a></li>
            <li><a href="Produk.php">Produk</a></li>
            <li><a href="keranjang.php">Keranjang</a></li>
            <li><a href="Riwayat.php">Riwayat Belanja</a></li>
            <?php if(isset($_SESSION['pelanggan'])): ?>
            <li><a href="logout.php" onclick="return confirm('Apakah anda yakin ingin Logout ?')"><b>Logout</b></a></li>
            <?php else: ?>
            <li><a href="daftar.php">Daftar</a></li>
            <li><a href="login.php">Login</a></li>
          <?php endif ?>
            <li class="get-started"><a href="produk.php">Get Started</a></li>
          </ul>
        </nav><!-- .nav-menu -->
      </div><!-- End Header Container -->
    </div>
  </header><!-- End Header -->