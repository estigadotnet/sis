<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- <title>AdminLTE 3 | Dashboard</title> -->
    <title><?php echo SITE_NAME . ' | ' . ucfirst($_caption) . ucfirst(isset($button) ? ' - ' . $button : ''); ?></title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/adminlte/plugins/fontawesome-free/css/all.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Tempusdominus Bbootstrap 4 -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/adminlte/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
    <!-- iCheck -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/adminlte/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
    <!-- JQVMap -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/adminlte/plugins/jqvmap/jqvmap.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/adminlte/dist/css/adminlte.min.css">
    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/adminlte/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
    <!-- Daterange picker -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/adminlte/plugins/daterangepicker/daterangepicker.css">
    <!-- summernote -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/adminlte/plugins/summernote/summernote-bs4.css">
    <!-- Google Font: Source Sans Pro -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">

    <style>
      .pagination {
        display: inline-block;
        padding-left: 0;
        margin: 20px 0;
        border-radius: 4px;
      }
      .pagination > li {
        display: inline;
      }
      .pagination > li > a,
      .pagination > li > span {
        position: relative;
        float: left;
        padding: 6px 12px;
        margin-left: -1px;
        line-height: 1.42857143;
        color: #428bca;
        text-decoration: none;
        background-color: #fff;
        border: 1px solid #ddd;
      }
      .pagination > li:first-child > a,
      .pagination > li:first-child > span {
        margin-left: 0;
        border-top-left-radius: 4px;
        border-bottom-left-radius: 4px;
      }
      .pagination > li:last-child > a,
      .pagination > li:last-child > span {
        border-top-right-radius: 4px;
        border-bottom-right-radius: 4px;
      }
      .pagination > li > a:hover,
      .pagination > li > span:hover,
      .pagination > li > a:focus,
      .pagination > li > span:focus {
        color: #2a6496;
        background-color: #eee;
        border-color: #ddd;
      }
      .pagination > .active > a,
      .pagination > .active > span,
      .pagination > .active > a:hover,
      .pagination > .active > span:hover,
      .pagination > .active > a:focus,
      .pagination > .active > span:focus {
        z-index: 2;
        color: #fff;
        cursor: default;
        background-color: #428bca;
        border-color: #428bca;
      }
      .pagination > .disabled > span,
      .pagination > .disabled > span:hover,
      .pagination > .disabled > span:focus,
      .pagination > .disabled > a,
      .pagination > .disabled > a:hover,
      .pagination > .disabled > a:focus {
        color: #999;
        cursor: not-allowed;
        background-color: #fff;
        border-color: #ddd;
      }
      .pagination-lg > li > a,
      .pagination-lg > li > span {
        padding: 10px 16px;
        font-size: 18px;
      }
      .pagination-lg > li:first-child > a,
      .pagination-lg > li:first-child > span {
        border-top-left-radius: 6px;
        border-bottom-left-radius: 6px;
      }
      .pagination-lg > li:last-child > a,
      .pagination-lg > li:last-child > span {
        border-top-right-radius: 6px;
        border-bottom-right-radius: 6px;
      }
      .pagination-sm > li > a,
      .pagination-sm > li > span {
        padding: 5px 10px;
        font-size: 12px;
      }
      .pagination-sm > li:first-child > a,
      .pagination-sm > li:first-child > span {
        border-top-left-radius: 3px;
        border-bottom-left-radius: 3px;
      }
      .pagination-sm > li:last-child > a,
      .pagination-sm > li:last-child > span {
        border-top-right-radius: 3px;
        border-bottom-right-radius: 3px;
      }
      </style>

      <?php
      if (isset($css_files)){
      foreach($css_files as $file): ?>
      	<link type="text/css" rel="stylesheet" href="<?php echo $file; ?>" />
      <?php endforeach; }?>

  </head>
  <body class="hold-transition sidebar-mini layout-fixed text-sm">
    <div class="wrapper">

      <!-- Navbar -->
      <nav class="main-header navbar navbar-expand navbar-white navbar-light">
        <!-- Left navbar links -->
        <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
          </li>
          <li class="nav-item d-none d-sm-inline-block">
            <?php if ($this->session->userdata('namasklh') <> '') { ?>
            <div class="nav-link"><b><?php echo $this->session->userdata('namasklh') . ' | ' . $this->session->userdata('tahunajaran'); ?></b></div>
            <?php } ?>
          </li>
        </ul>

        <!-- Right navbar links -->
        <ul class="navbar-nav ml-auto">
          <li class="nav-item">
            <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#" role="button">
              <i class="fas fa-th-large"></i>
            </a>
          </li>
        </ul>
      </nav>
      <!-- /.navbar -->

      <!-- Main Sidebar Container -->
      <aside class="main-sidebar sidebar-dark-primary elevation-4">
        <!-- Brand Logo -->
        <a href="<?php echo site_url(); ?>" class="brand-link">
          <img src="<?php echo base_url(); ?>assets/adminlte/dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
          <span class="brand-text "><?php echo "<b>" . SITE_NAME . "</b>" . ' ' . SITE_VERSION; ?></span>
        </a>

        <!-- Sidebar -->
        <div class="sidebar">
          <!-- Sidebar user panel (optional) -->
          <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
              <!-- <img src="<?php //echo base_url(); ?>assets/adminlte/dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image"> -->
            </div>
            <div class="info">
              <a href="#" class="d-block"><?php echo $this->session->userdata('username'); ?></a>
            </div>
          </div>

          <!-- Sidebar Menu -->
          <nav class="mt-2">
            <!-- <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false"> -->
            <ul class="nav nav-pills nav-sidebar flex-column nav-child-indent nav-legacy nav-compact" data-widget="treeview" role="menu" data-accordion="false">
              <!-- Add icons to the links using the .nav-icon class
                   with font-awesome or any other icon font library -->

              <!-- dashboard -->
              <li class="nav-item">
                <a href="<?php echo site_url(); ?>" class="nav-link <?php echo ($this->uri->segment(1) == '' ? 'active' : ($this->uri->segment(1) == 'dashboard' ? 'active' : '')); ?>"> <!-- active -->
                  <i class="nav-icon fas fa-tachometer-alt"></i>
                  <p>
                    Dashboard (Demo)
                  </p>
                </a>
              </li>

              <!-- setup -->
              <li class="nav-header">SETUP</li>
              <li class="nav-item">
                <a href="<?php echo site_url('s01_thaj'); ?>" class="nav-link <?php echo $this->uri->segment(1) == 's01_thaj' ? 'active' : ''; ?>">
                  <i class="far fa-calendar-alt nav-icon"></i>
                  <p>Tahun Ajaran</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?php echo site_url('s02_sklh'); ?>" class="nav-link <?php echo $this->uri->segment(1) == 's02_sklh' ? 'active' : ''; ?>">
                  <i class="fas fa-school nav-icon"></i>
                  <p>Sekolah</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?php echo site_url('s03_kls'); ?>" class="nav-link <?php echo $this->uri->segment(1) == 's03_kls' ? 'active' : ''; ?>">
                  <i class="fas fa-door-open nav-icon"></i>
                  <p>Kelas</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?php echo site_url('s04_guru'); ?>" class="nav-link <?php echo $this->uri->segment(1) == 's04_guru' ? 'active' : ''; ?>">
                  <i class="fas fa-chalkboard-teacher nav-icon"></i>
                  <p>Guru</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?php echo site_url('s05_ssw'); ?>" class="nav-link <?php echo $this->uri->segment(1) == 's05_ssw' ? 'active' : ''; ?>">
                  <i class="fas fa-user-alt nav-icon"></i>
                  <p>Siswa</p>
                </a>
              </li>

              <!-- daftar -->
              <li class="nav-header">DAFTAR</li>
              <li class="nav-item">
                <a href="<?php echo site_url('d01_kls/index2'); ?>" class="nav-link <?php echo $this->uri->segment(1) == 'd01_kls' ? 'active' : ''; ?>">
                  <i class="fas fa-table nav-icon"></i>
                  <p>Kelas</p>
                </a>
              </li>
              <!-- <li class="nav-item">
                <a href="<?php //echo site_url('d02_ssw'); ?>" class="nav-link <?php //echo $this->uri->segment(1) == 'd02_ssw' ? 'active' : ''; ?>">
                  <i class="fas fa-users nav-icon"></i>
                  <p>Siswa</p>
                </a>
              </li> -->

              <li class="nav-header">DEMO</li>
              <!-- grocerycrud -->
              <li class="nav-item">
                <a href="<?php echo site_url('examples'); ?>" class="nav-link <?php echo $this->uri->segment(1) == 'examples' ? 'active' : ''; ?>">
                  <i class="fas fa-user nav-icon"></i>
                  <p>GroceryCRUD</p>
                </a>
              </li>
              <!-- welcome -->
              <li class="nav-item">
                <a href="<?php echo site_url('welcome'); ?>" class="nav-link <?php echo $this->uri->segment(1) == 'welcome' ? 'active' : ''; ?>">
                  <i class="fas fa-user nav-icon"></i>
                  <p>Welcome</p>
                </a>
              </li>

              <!-- setting -->
              <!-- <li class="nav-header">SETTING</li> -->
              <!-- <li class="nav-item">
                <a href="<?php //echo site_url('users'); ?>" class="nav-link <?php //echo $this->uri->segment(1) == 'users' ? 'active' : ''; ?>">
                  <i class="fas fa-user nav-icon"></i>
                  <p>Users</p>
                </a>
              </li> -->

              <!-- divider -->
              <li class="nav-header"></li>

              <!-- Login or logout -->
              <li class="nav-item">
                <?php if ($this->session->userdata('user_id') != "") { ?>
                  <a href="<?php echo site_url('auth/logout'); ?>" class="nav-link">
                    <i class="fas fa-sign-out-alt nav-icon"></i>
                    <p>Logout</p>
                  </a>
                <?php } else { ?>
                  <a href="<?php echo site_url('auth/login'); ?>" class="nav-link">
                    <i class="fas fa-sign-in-alt nav-icon"></i>
                    <p>Login</p>
                  </a>
                <?php }?>
              </li>

            </ul>
          </nav>
          <!-- /.sidebar-menu -->
        </div>
        <!-- /.sidebar -->
      </aside>

      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
          <div class="container-fluid">
            <div class="row mb-2">
              <div class="col-sm-6">
                <!-- <h1 class="m-0 text-dark">Dashboard</h1> -->
                <h1 class="m-0 text-dark"><?php echo $_caption; ?></h1>
              </div><!-- /.col -->
              <div class="col-sm-6">
                <!-- <ol class="breadcrumb float-sm-right">
                  <li class="breadcrumb-item"><a href="#">Home</a></li>
                  <li class="breadcrumb-item active">Dashboard v1</li>
                </ol> -->
                <!-- Breadcrumbs-->
                <ol class="breadcrumb float-sm-right">
                  <?php if ($this->uri->uri_string <> ''): ?>
                    <li class="breadcrumb-item"><a href="<?php echo site_url(); ?>">Dashboard</a></li>
                  <?php else: ?>
                    <!-- <li class="breadcrumb-item">Dashboard</li> -->
                  <?php endif; ?>
                  <?php $index = 0; ?>
                  <?php foreach ($this->uri->segments as $segment): ?>
                  	<?php
                      ++$index;
                  		$url = substr($this->uri->uri_string, 0, strpos($this->uri->uri_string, $segment)) . $segment;
                  		$is_active =  $url == $this->uri->uri_string;
                  	?>
                    <?php if ($index <= 2): ?>
                  	<li class="breadcrumb-item <?php echo $is_active ? 'active': '' ?>">
                  		<?php if($is_active): ?>
                  			<?php echo ucfirst($segment) ?>
                  		<?php else: ?>
                  			<a href="<?php echo site_url($url) ?>"><?php echo ucfirst($segment) ?></a>
                  		<?php endif; ?>
                  	</li>
                    <?php endif; ?>
                  <?php endforeach; ?>
                </ol>
              </div><!-- /.col -->
            </div><!-- /.row -->
          </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <!-- Main content -->
        <section class="content">
          <div class="container-fluid">

            <?php
            if (!isset($output)) {
              if (isset($_view) && $_view) {
                $this->load->view($_view);
              }
            }
            else {
              echo isset($_examples) ? $_examples : '';
            ?>
              <div style='height: 20px;'></div>
              <div style="padding: 10px">
                <?php echo $output; ?>
              </div>
            <?php
            }
            ?>

          </div><!-- /.container-fluid -->
        </section>
        <!-- /.content -->
      </div>
      <!-- /.content-wrapper -->
      <!-- <footer class="main-footer">
        <strong>Copyright &copy; 2014-2019 <a href="http://adminlte.io">AdminLTE.io</a>.</strong>
        All rights reserved.
        <div class="float-right d-none d-sm-inline-block">
          <b>Version</b> 3.0.5
        </div>
      </footer> -->
      <footer class="main-footer">
        <strong>Copyright &copy; <?php echo date('Y'); ?> <a href="https://one-tech-computer.business.site/" target="_blank">OneTech System Solution</a>.</strong>
        All rights reserved.
        <div class="float-right d-none d-sm-inline-block">
          <b><?php echo SITE_NAME; ?> </b> <?php echo SITE_VERSION; ?>
        </div>
      </footer>

      <!-- Control Sidebar -->
      <aside class="control-sidebar control-sidebar-dark">
        <!-- Control sidebar content goes here -->
      </aside>
      <!-- /.control-sidebar -->
    </div>
    <!-- ./wrapper -->

    <!-- jQuery -->
    <script src="<?php echo base_url(); ?>assets/adminlte/plugins/jquery/jquery.min.js"></script>
    <!-- jQuery UI 1.11.4 -->
    <script src="<?php echo base_url(); ?>assets/adminlte/plugins/jquery-ui/jquery-ui.min.js"></script>
    <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
    <script>
      $.widget.bridge('uibutton', $.ui.button)
    </script>
    <!-- Bootstrap 4 -->
    <script src="<?php echo base_url(); ?>assets/adminlte/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- ChartJS -->
    <script src="<?php echo base_url(); ?>assets/adminlte/plugins/chart.js/Chart.min.js"></script>
    <!-- Sparkline -->
    <script src="<?php echo base_url(); ?>assets/adminlte/plugins/sparklines/sparkline.js"></script>
    <!-- JQVMap -->
    <script src="<?php echo base_url(); ?>assets/adminlte/plugins/jqvmap/jquery.vmap.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/adminlte/plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
    <!-- jQuery Knob Chart -->
    <script src="<?php echo base_url(); ?>assets/adminlte/plugins/jquery-knob/jquery.knob.min.js"></script>
    <!-- daterangepicker -->
    <script src="<?php echo base_url(); ?>assets/adminlte/plugins/moment/moment.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/adminlte/plugins/daterangepicker/daterangepicker.js"></script>
    <!-- Tempusdominus Bootstrap 4 -->
    <script src="<?php echo base_url(); ?>assets/adminlte/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
    <!-- Summernote -->
    <script src="<?php echo base_url(); ?>assets/adminlte/plugins/summernote/summernote-bs4.min.js"></script>
    <!-- overlayScrollbars -->
    <script src="<?php echo base_url(); ?>assets/adminlte/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
    <!-- AdminLTE App -->
    <script src="<?php echo base_url(); ?>assets/adminlte/dist/js/adminlte.js"></script>
    <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
    <script src="<?php echo base_url(); ?>assets/adminlte/dist/js/pages/dashboard.js"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="<?php echo base_url(); ?>assets/adminlte/dist/js/demo.js"></script>

    <script>
      $(function () {
        $('.btn').addClass('btn-sm')
        $('.table').addClass('table-sm')
        $('.form-control').addClass('form-control-sm')
      })
    </script>

    <?php
    if (isset($js_files)){
    foreach($js_files as $file): ?>
    		<script src="<?php echo $file; ?>"></script>
    <?php endforeach; }?>

  </body>
</html>
