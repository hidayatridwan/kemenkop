<?php
if(!$this->session->userdata('id_user')) {
  redirect(base_url('login'));
}
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title><?= $title; ?></title>
  <link rel="shortcut icon" href="<?= base_url(); ?>assets/img/favicon.ico">
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Autocomplete -->
  <link rel="stylesheet" href="<?= base_url(); ?>assets/plugins/jquery-ui-1.12.1/jquery-ui.min.css">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="<?= base_url(); ?>assets/bower_components/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?= base_url(); ?>assets/bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="<?= base_url(); ?>assets/bower_components/Ionicons/css/ionicons.min.css">
  <!-- Pace style -->
  <link rel="stylesheet" href="<?= base_url(); ?>assets/plugins/pace/pace.min.css">
  <!-- bootstrap datepicker -->
  <link rel="stylesheet" href="<?= base_url(); ?>assets/bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">
  <!-- bootstrap timepicker -->
  <link rel="stylesheet" href="<?= base_url(); ?>assets/css/jquery.timepicker.min.css">
  <!-- Notify Animate -->
  <link rel="stylesheet" href="<?= base_url(); ?>assets/css/animate.css">
  <!-- DataTables -->
  <link rel="stylesheet" href="<?= base_url(); ?>assets/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">
  <link rel="stylesheet" href="<?= base_url(); ?>assets/bower_components/datatables.net-bs/css/responsive.bootstrap.min.css">
  <!-- Select2 -->
  <link rel="stylesheet" href="<?= base_url(); ?>assets/bower_components/select2/dist/css/select2.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?= base_url(); ?>assets/css/AdminLTE.min.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="<?= base_url(); ?>assets/css/skins/_all-skins.min.css">
  <!-- CK Editor -->
  <script src="https://cdn.ckeditor.com/4.9.0/full-all/ckeditor.js"></script>
  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
  <style type="text/css">
    .normal {
      font-weight: normal!important;
    }
    .datepicker {
      z-index: 10000!important;
    }
  </style>
</head>
<body class="hold-transition skin-blue sidebar-mini">
<!-- Site wrapper -->
<div class="wrapper">

  <header class="main-header">
    <!-- Logo -->
    <a href="<?= base_url(); ?>" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><i class="fa fa-graduation-cap"></i></span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b>Admin</b>Kemenkop</span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </a>

      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          <!-- Messages: style can be found in dropdown.less-->
          <li class="dropdown messages-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <i class="fa fa-envelope-o"></i>
              <span class="label label-success">4</span>
            </a>
            <ul class="dropdown-menu">
              <li class="header">You have 4 messages</li>
              <li>
                <!-- inner menu: contains the actual data -->
                <ul class="menu">
                  <li><!-- start message -->
                    <a href="#">
                      <div class="pull-left">
                        <img src="<?= base_url(); ?>assets/img/avatar5.png" class="img-circle" alt="User Image">
                      </div>
                      <h4>
                        Support Team
                        <small><i class="fa fa-clock-o"></i> 5 mins</small>
                      </h4>
                      <p>Why not buy a new awesome theme?</p>
                    </a>
                  </li>
                  <!-- end message -->
                </ul>
              </li>
              <li class="footer"><a href="#">See All Messages</a></li>
            </ul>
          </li>
          <!-- Notifications: style can be found in dropdown.less -->
          <li class="dropdown notifications-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <i class="fa fa-bell-o"></i>
              <span class="label label-warning">10</span>
            </a>
            <ul class="dropdown-menu">
              <li class="header">You have 10 notifications</li>
              <li>
                <!-- inner menu: contains the actual data -->
                <ul class="menu">
                  <li>
                    <a href="#">
                      <i class="fa fa-users text-aqua"></i> 5 new members joined today
                    </a>
                  </li>
                </ul>
              </li>
              <li class="footer"><a href="#">View all</a></li>
            </ul>
          </li>
          <!-- User Account: style can be found in dropdown.less -->
          <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <img src="<?= base_url(); ?>assets/img/avatar5.png" class="user-image" alt="User Image">
              <span class="hidden-xs"><?= $this->session->userdata('nama'); ?></span>
            </a>
            <ul class="dropdown-menu">
              <!-- User image -->
              <li class="user-header">
                <img src="<?= base_url(); ?>assets/img/avatar5.png" class="img-circle" alt="User Image">

                <p>
                  <?= $this->session->userdata('nama'); ?> - <?= $this->session->userdata('role'); ?>
                  <small>Login since <?= $this->session->userdata('log_date'); ?></small>
                </p>
              </li>
              <!-- Menu Footer-->
              <li class="user-footer">
                <div class="pull-left">
                  <a href="<?= base_url(); ?>password" class="btn btn-default btn-flat">Profile</a>
                </div>
                <div class="pull-right">
                  <a href="<?= base_url(); ?>login/logout" class="btn btn-default btn-flat">Sign out</a>
                </div>
              </li>
            </ul>
          </li>
        </ul>
      </div>
    </nav>
  </header>

  <!-- =============================================== -->

  <!-- Left side column. contains the sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header">KIOS</li>
        <li><a href="<?= base_url(); ?>kios/menu"><i class="fa fa-bars"></i><span>Menu</span></a></li>
        <li><a href="<?= base_url(); ?>kios/slide"><i class="fa fa-image "></i><span>Slide Gambar</span></a></li>
        <li><a href="<?= base_url(); ?>kios/masukan"><i class="fa fa-book"></i><span>Masukan</span></a></li>
        <li class="header">TV WALL</li>
        <li><a href="<?= base_url(); ?>tvwall/profil"><i class="fa fa-user"></i><span>Profil</span></a></li>
        <li><a href="<?= base_url(); ?>tvwall/berita"><i class="fa fa-newspaper-o"></i><span>Berita</span></a></li>
        <li><a href="<?= base_url(); ?>tvwall/video"><i class="fa fa-video-camera"></i><span>Upload Video</span></a></li>
        <li><a href="<?= base_url(); ?>tvwall/slide"><i class="fa fa-image "></i><span>Slide Gambar</span></a></li>
        <li><a href="<?= base_url(); ?>tvwall/text_berjalan"><i class="fa fa-text-width"></i><span>Text Berjalan</span></a></li>
        <li><a href="<?= base_url(); ?>tvwall/pengumuman"><i class="fa fa-volume-up"></i><span>Pengumuman</span></a></li>
        <li><a href="<?= base_url(); ?>tvwall/jadwal_kegiatan"><i class="fa fa-calendar-check-o"></i><span>Jadwal Kegiatan</span></a></li>
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>

  <!-- =============================================== -->