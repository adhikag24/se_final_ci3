<!DOCTYPE html>

<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Newsfeed | Home</title>

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>


  <link rel="shortcut icon" href="http://sstatic.net/so/favicon.ico">
  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?= base_url() ?>assets/plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Tempusdominus Bootstrap 4 -->
  <link rel="stylesheet" href="<?= base_url() ?>assets/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="<?= base_url() ?>assets/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- JQVMap -->
  <link rel="stylesheet" href="<?= base_url() ?>assets/plugins/jqvmap/jqvmap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?= base_url() ?>assets/dist/css/adminlte.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="<?= base_url() ?>assets/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="<?= base_url() ?>assets/plugins/daterangepicker/daterangepicker.css">
  <!-- summernote -->
  <link rel="stylesheet" href="<?= base_url() ?>assets/plugins/summernote/summernote-bs4.min.css">
    <!-- DataTables -->
 <link rel="stylesheet" href="<?= base_url() ?>assets/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="<?= base_url() ?>assets/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
  <link rel="stylesheet" href="<?= base_url() ?>assets/plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
  <link rel="stylesheet" href="<?= base_url() ?>assets/dist/css/style.css">



</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="<?= base_url() ?>assets/#" role="button"><i class="fas fa-bars"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="<?= base_url() ?>" class="nav-link">Home</a>
      </li>

      <li class="nav-item d-none d-sm-inline-block">
        <form action="<?=base_url()?>home/search_news" class="form-inline">
          <input class="form-control mr-sm-2" type="text" placeholder="Search news" name="keyword" aria-label="Search">
          <button class="btn btn-outline-secondary my-2 my-sm-0" type="submit"><i class="fa fa-search"></i></button>
        </form>
      </li>	
      
    </ul>

  
    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
    <?php if($this->session->userdata('is_login') == 1): ?>

      <div class="dropdown text-white">
                                 <span class="text-dark mr-3"><img class="img-circle bg-white" style="object-fit: cover;" src="<?=base_url()?>assets/image/other/default-user.png" width="30" height="30">  <?= $this->session->userdata('name')?> </span>
                                      <div class="dropdown-content text-white shadow mt-0" style="border-radius:5px; background-color:#3D3E52">
                                      <a href="<?=base_url()?>assets/image/other/default-user.png">
                                           
                                        </a>
                                    </div>
                                </div>
    <?php else: ?>
      <li class="nav-item">
        <a class="btn btn-primary" href="#" role="button">Register</a>
        <a class="btn btn-outline-primary" href="#" role="button">Log In</a>
      </li>
    <?php endif; ?>
    </ul>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-light-primary elevation-4">
    <!-- Brand Logo -->
    <a href="<?= base_url() ?>" class="brand-link">
      <img src="<?= base_url() ?>assets/dist/img/logo.png" alt="Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">Newsfeed</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <!-- <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="<?= base_url() ?>assets/dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="<?= base_url() ?>assets/#" class="d-block">Alexander Pierce</a>
        </div>
      </div> -->

      <!-- SidebarSearch Form -->
      <!-- <div class="form-inline">
        <div class="input-group" data-widget="sidebar-search">
          <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
          <div class="input-group-append">
            <button class="btn btn-sidebar">
              <i class="fas fa-search fa-fw"></i>
            </button>
          </div>
        </div>
      </div> -->

<?php $current_page = $this->uri->segment(2); ?>
      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <?php if($this->session->userdata('role') == 1):?>
        <li class="nav-item">
            <a href="<?= base_url() ?>admin" class="nav-link ">
              <i class="nav-icon fas fa-users-cog"></i>
              <p>
                Admin
              </p>
            </a>
          </li>
        <?php else: ?>

          <li class="nav-item">
            <a href="<?= base_url() ?>/home/view_comments" class="nav-link <?=($current_page == 'view_comments') ? 'active' : ''?> ">
              <i class="nav-icon fas fa-newspaper"></i>
              <p>
                Your comments
              </p>
            </a>
          </li>

          <li class="nav-item ">
            <a href="<?= base_url() ?>/home/upload_document" class="nav-link <?=($current_page == 'upload_document') ? 'active' : ''?>">
              <i class="nav-icon fa fa-upload"></i>
              <p>
                Upload your own news!
              </p>
            </a>
          </li>
          <?php endif; ?>

          <li class="nav-item ">
            <a href="<?= base_url() ?>/auth/logout" class="nav-link">
              <i class="nav-icon fa fa-sign-out-alt"></i>
              <p>
                Logout
              </p>
            </a>
          </li>
         
          
          <!-- <li class="nav-item">
            <a href="<?= base_url() ?>/admin/users" class="nav-link">
              <i class="nav-icon fas fa-user-friends"></i>
              <p>
                Users Management
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?= base_url() ?>/admin/users-admin" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Admin</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?= base_url() ?>/admin/users-user" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>User</p>
                </a>
              </li>
            </ul>
          </li> -->
          
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>