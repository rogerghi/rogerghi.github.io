<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>E-Commerce Tracker</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/v3_assets/plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Tempusdominus Bootstrap 4 -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/v3_assets/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/v3_assets/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- JQVMap -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/v3_assets/plugins/jqvmap/jqvmap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/v3_assets/dist/css/adminlte.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/v3_assets/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/v3_assets/plugins/daterangepicker/daterangepicker.css">
  <!-- summernote -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/v3_assets/plugins/summernote/summernote-bs4.min.css">

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <style type="text/css">
    .sidebar-light-secondary .nav-sidebar>.nav-item>.nav-link.active {
        background-color: rgba(0,0,0,.1);
        color: #fff;
    }
    .nav-sidebar>.nav-item>.nav-link.active {
        color: #000;
        box-shadow: none !important;
    }
  </style>
  <style type="text/css">
    .AlertBox{
        position:fixed;
        z-index:1400;
        top:7%;
        right:4%;
        margin:0px auto;
        text-align:center;
        display:none;
    }
  </style>
</head>
<body class="hold-transition sidebar-mini layout-fixed sidebar-collapse">
<div class="wrapper">
  <div id="alert_success" class="alert alert-success AlertBox" data-alert="alert">Product berhasil ditambahkan</div>
  <div id="alert_error" class="alert alert-danger AlertBox" data-alert="alert">Compare produk maksimal 2 produk</div>
  <div id="alert_error_compare" class="alert alert-danger AlertBox" data-alert="alert">Compare produk kurang dari 2 produk</div>
  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"
          ><i class="fas fa-bars"></i
        ></a>
      </li>
    </ul>
    <ul class="navbar-nav ml-auto">
      <!-- Navbar Search -->
      <li class="nav-item dropdown">
        <a
          class="nav-link"
          data-toggle="modal"
          data-target="#modal-compare"
          style="cursor: pointer;"
          onclick='get_compare_product()'
        >
          Compare &nbsp;
          <i class="fa fa-code-compare"></i>
          <span class="badge badge-success navbar-badge" id="badge_compare"></span>
        </a>
      </li>
      <li class="nav-item">
        <a
          class="nav-link"
          data-toggle="modal"
          data-target="#modal-logout"
          style="cursor: pointer;"
        >
          Logout &nbsp;
          <i class="fas fa-sign-out-alt"></i>
        </a>
      </li>
    </ul>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
</div>
<aside class="main-sidebar sidebar-light-secondary elevation-4 sidebar-no-expand" style="background-color: #C22026;">
    <!-- Brand Logo -->
    <a href="#" class="brand-link bg-light">
      <!-- <img src="dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">AdminLTE 3</span> -->
      <br>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->

      <!-- SidebarSearch Form -->
      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item">
            <a href="<?php echo base_url(); ?>App/landing" class="nav-link nav_menu">
              <i class="fas fa-home nav-icon text-light"></i>
              <p class="text-light">Home</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="<?php echo base_url(); ?>App/search" class="nav-link nav_menu">
              <i class="fas fa-search nav-icon text-light"></i>
              <p class="text-light">Search Product</p>
            </a>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>
  <div class="modal fade" id="modal-compare" style="display: none;" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Compare Product List</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">
          <div class="row">
            <div class="col-md-6 d-flex align-items-stretch">
              <div class="card" id="product_compare_1">
              </div>
            </div>
            <div class="col-md-6 d-flex align-items-stretch">
              <div class="card" id="product_compare_2">
                
              </div>
            </div>
          </div>
        </div>
        <div class="modal-footer justify-content-center">
          <button type="button" class="btn btn-default" style="color: white;background-color: #C22026;" onclick="compare_detail()">View Comparison</button>
          <!-- <button type="button" class="btn btn-primary">Save changes</button> -->
        </div>
      </div>
    </div>
  </div>
    <div class="modal fade" id="modal-logout" style="display: none;" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Logout Confirmation</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">
          <p>Are you sure you want to logout?  </p>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
          <a href="<?php echo base_url(); ?>login/logout">
            <button type="button" class="btn btn-default" style="color: white;background-color: #C22026;" >Logout</button>
          </a>
        </div>
      </div>
    </div>
  </div>
  <div class="modal fade" id="modal-c-remove" style="display: none;" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Remove Data from List Confirmation</h5>
          <button type="button" class="close" onclick="hide_modal()" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">
          <p>Are you sure you want to remove this data from comparison list?  </p>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" onclick="hide_modal()">Cancel</button>
            <button type="button" class="btn btn-default" style="color: white;background-color: #C22026;" onclick="remove_compare()" >Yes</button>
        </div>
      </div>
    </div>
  </div>
<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
<!-- BS5.1.1 CSS/JS -->
<!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet"> -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js"></script>


