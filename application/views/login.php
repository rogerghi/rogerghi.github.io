<div class="login-box">
  <!-- /.login-logo -->
  <div class="card card-outline card-danger">
    <div class="card-header text-center">
      <a href="<?php echo base_url(); ?>" class="h1">
        <!-- <img src="https://www.telkom.co.id/images/logo_horizontal.svg" style="max-height: 100px;"> -->
        <p style="font-size: 18px;margin-bottom: 0px;">Selamat datang di aplikasi<br>E-Commerce Tracker</p>
      </a>
    </div>
    <div class="card-body">

      <form action="" method="post">
        <div class="row">
          <div class="col-md-12">
              <?php echo validation_errors('<div class="alert alert-danger alert-dismissable">', ' <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button></div>'); ?>
              <?php if(isset($_SESSION['success'])){ ?>
                <div class="alert alert-success alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button><?php echo $_SESSION['success'] ?></div>
              <?php } ?>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="text" class="form-control" placeholder="Email" id="email" name="email">
          <div class="input-group-append">
            <div class="input-group-text">
            <span class="fas fa-envelope"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="Password" class="form-control" placeholder="Password" id="pass" name="pass">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <div class="row">
          <!-- <div class="col-9"></div> -->
          <div class="col-12">
            <button type="submit" class="btn btn-danger btn-block" name="login">Login</button>
          </div>
          <!-- /.col -->
        </div>
      </form>
      <p class="mt-2">
          <a href="<?php echo base_url(); ?>login/register" class="text-center">Sign up for a new account</a>
      </p>
    </div>
    <!-- /.card-body -->
  </div>
  <!-- /.card -->
</div>
<!-- /.login-box -->

