<?php $koneksi = new mysqli("localhost","root","","petshopqu"); ?>
<?php session_start(); ?>
<?php
if (!isset($_SESSION['admin'])) {
echo "<script>location='login.php'; </script>";
header('location:login.php');
exit();
}
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>PetshopQu</title>
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <link rel="stylesheet" href="assets/bower_components/bootstrap/dist/css/bootstrap.min.css">
  <link rel="stylesheet" href="assets/bower_components/font-awesome-4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="assets/bower_components/Ionicons/css/ionicons.min.css">
  <link rel="stylesheet" href="assets/dist/css/AdminLTE.min.css">
  <link rel="stylesheet" href="assets/dist/css/skins/skin-blue.min.css">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>

<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">
  <header class="main-header">
    <a href="index.html" class="logo">
      <span class="logo-mini"><b>P</b>S</span>
      <span class="logo-lg"><b>Petshop</b>Qu</span>
    </a>
    <nav class="navbar navbar-static-top" role="navigation">
      <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>
      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          <li class="dropdown messages-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <i class="fa fa-envelope-o"></i>
              <span class="label label-success"></span>
            </a>
            <ul class="dropdown-menu">      
            <li>
               <ul class="menu">
                <li>
                  <a href="#">
                    <div class="pull-left">
                      <img src="assets/dist/img/avatar5.png" class="img-circle" alt="User Image">
                    </div>
          </a>  </l> </ul> </li> </ul>
          </li>
          <li class="dropdown notifications-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <i class="fa fa-bell-o"></i>
              <span class="label label-warning"></span>
            </a>
            
            <ul class="dropdown-menu">             
              <li>
                <ul class="menu">
                  <li>
                    <a href="#">
                      <i class="fa fa-users text-aqua"></i>
                    </a>
                  </li>
                </ul>
              </li>
              <li class="footer"><a href="#">View all</a></li>
            </ul>
          </li>
          <li class="dropdown tasks-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <i class="fa fa-flag-o"></i>
              <span class="label label-danger"></span>
            </a>
            <ul class="dropdown-menu">
              <li class="header">You have 9 tasks</li>
              <li>
                <ul class="menu">
                  <li>
                    <a href="#">
                      <h3>
                        Design some buttons
                        <small class="pull-right">20%</small>
                      </h3>
                      <div class="progress xs">
                      <div class="progress-bar progress-bar-aqua" style="width: 20%" role="progressbar"
                             aria-valuenow="20" aria-valuemin="0" aria-valuemax="100">
                          <span class="sr-only">20% Complete</span>
                        </div>
                      </div>
                    </a>
                  </li>
                  </ul>
              </li>
              <li class="footer">
              <a href="#">View all tasks</a>
              </li> </ul> </li>
          <li class="dropdown user user-menu">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown">
          <img src="assets/dist/img/avatar5.png" class="user-image" alt="User Image">
          <span class="hidden-xs">PetshopQu</span>
            </a>
            <ul class="dropdown-menu">
            <li class="user-header">
                <img src="assets/dist/img/avatar5.png" class="img-circle" alt="User Image">
                <p>
                  PetshopQu - Web Developer
                  <small>Member since Nov. 2012</small>
                </p>
              </li>
              <!-- Menu Body -->
              <li class="user-body">
                <div class="row">
                  <div class="col-xs-4 text-center">
                    <a href="#">Followers</a> </div>
                  <div class="col-xs-4 text-center">
                    <a href="#">Sales</a></div>
                  <div class="col-xs-4 text-center">
                    <a href="#">Friends</a></div></div></li>
              <li class="user-footer">
                <div class="pull-left">
                  <a href="#" class="btn btn-default btn-flat">Profile</a>
                </div>
                <div class="pull-right">
                  <a href="#" class="btn btn-default btn-flat">Sign out</a>
                </d> </li> </ul> </li> <li>
            <a href="#" data-toggle="control-sidebar"><i class="fa fa-gears"></i></a>
          </li> </ul> </div> </nav> </header>
  <aside class="main-sidebar">
    <section class="sidebar">
      <div class="user-panel">
        <div class="pull-left image">
          <img src="assets/dist/img/avatar5.png" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p>PetshopQu</p>
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div> </div>
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header">Menu Navigation</li>
        <li ><a href="index.php"><i class="fa fa-dashboard"></i> <span>Home</span></a></li>
        <li ><a href="index.php?halaman=produk"><i class="fa fa-tags"></i> <span>Produk</span></a></li>
        
        <li ><a href="index.php?halaman=pelanggan"><i class="fa fa-user"></i> <span>Pelanggan</span></a></li>
        <li ><a href="index.php?halaman=pembelian"><i class="fa fa-shopping-cart"></i> <span>Pembelian</span></a></li>
        
        <li ><a href="index.php?halaman=logout"><i class="fa fa-sign-out"></i> <span>Logout</span></a></li>
      </ul>
    </section>
  </aside>
