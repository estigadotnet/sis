<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <!-- <title>AdminLTE 3 | Log in</title> -->
  <title><?php echo SITE_NAME; ?> | Log in</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/adminlte/plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/adminlte/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/adminlte/dist/css/adminlte.min.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>
<body class="hold-transition login-page">
<div class="login-box">
  <!-- <div class="login-logo">
    <a href="../../index2.html"><b>Admin</b>LTE</a>
  </div> -->
  <div class="login-logo">
    <a href="#"><b><?php echo SITE_NAME; ?> </b> <?php echo SITE_VERSION; ?></a>
  </div>
  <!-- /.login-logo -->
  <div class="card">
    <div class="card-body login-card-body">
      <!-- <p class="login-box-msg">Sign in to start your session</p> -->

      <h4 class='text-center'><?php echo lang('login_heading');?></h4>
      <p><?php echo lang('login_subheading');?></p>

      <div id="infoMessage"><?php echo $message;?></div>

      <!-- <form action="../../index3.html" method="post"> -->
      <?php echo form_open("auth/login");?>

        <div class="input-group mb-3">
          <input type="email" class="form-control" placeholder="Email" name='identity' id='identity'>
          <!-- <p> -->
          <?php //echo lang('login_identity_label', 'identity');?>
          <?php //echo form_input($identity);?>
          <!-- </p> -->
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
        </div>

        <div class="input-group mb-3">
          <input type="password" class="form-control" placeholder="Password" name='password' id='password'>
          <!-- <p> -->
          <?php //echo lang('login_password_label', 'password');?>
          <?php //echo form_input($password);?>
          <!-- </p> -->
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>

        <div class="row">
          <!-- <div class="col-8">
            <div class="icheck-primary">
              <input type="checkbox" id="remember">
              <label for="remember">
                Remember Me
              </label>
            </div>
          </div> -->
          <!-- /.col -->
          <div class="col-4">
            <button type="submit" class="btn btn-primary btn-block">Sign In</button>
            <!-- <p> -->
            <?php //echo form_submit('submit', lang('login_submit_btn'));?>
            <!-- </p> -->
          </div>
          <!-- /.col -->
        </div>
      <!-- </form> -->
      <?php echo form_close();?>

      <!-- <h4><?php echo lang('login_heading');?></h4> -->
      <!-- <p><?php echo lang('login_subheading');?></p> -->

      <!-- <div id="infoMessage"><?php echo $message;?></div> -->

      <!-- <?php echo form_open("auth/login");?> -->

        <!-- <p>
          <?php echo lang('login_identity_label', 'identity');?>
          <?php echo form_input($identity);?>
        </p> -->

        <!-- <p>
          <?php echo lang('login_password_label', 'password');?>
          <?php echo form_input($password);?>
        </p> -->

        <!-- <p>
          <?php echo lang('login_remember_label', 'remember');?>
          <?php echo form_checkbox('remember', '1', FALSE, 'id="remember"');?>
        </p> -->


        <!-- <p><?php echo form_submit('submit', lang('login_submit_btn'));?></p> -->

      <!-- <?php echo form_close();?> -->

      <!-- <p><a href="forgot_password"><?php echo lang('login_forgot_password');?></a></p> -->

      <!-- <div class="social-auth-links text-center mb-3">
        <p>- OR -</p>
        <a href="#" class="btn btn-block btn-primary">
          <i class="fab fa-facebook mr-2"></i> Sign in using Facebook
        </a>
        <a href="#" class="btn btn-block btn-danger">
          <i class="fab fa-google-plus mr-2"></i> Sign in using Google+
        </a>
      </div> -->
      <!-- /.social-auth-links -->

      <!-- <p class="mb-1">
        <a href="forgot-password.html">I forgot my password</a>
      </p>
      <p class="mb-0">
        <a href="register.html" class="text-center">Register a new membership</a>
      </p> -->
    </div>
    <!-- /.login-card-body -->
  </div>
</div>
<!-- /.login-box -->

<!-- jQuery -->
<script src="<?php echo base_url(); ?>assets/adminlte/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="<?php echo base_url(); ?>assets/adminlte/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="<?php echo base_url(); ?>assets/adminlte/dist/js/adminlte.min.js"></script>

<script>
  $(function () {
    $('body').addClass('text-sm')
    $('.btn').addClass('btn-sm')
    $('.table').addClass('table-sm')
    $('.form-control').addClass('form-control-sm')
  })
</script>

</body>
</html>
