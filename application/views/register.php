<div class="login-box">
  <!-- /.login-logo -->
  <div class="card card-outline card-danger">
    <div class="card-header text-center">
      <a href="<?php echo base_url(); ?>" class="h1">
        <p style="font-size: 18px;margin-bottom: 0px;">Sign up for a new account</p>
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
          <input type="text" class="form-control" placeholder="Full name" id="name_reg" name="name_reg">
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-user"></span>
              </div>
            </div>
        </div>
        <div class="input-group mb-3">
          <input type="text" class="form-control" placeholder="Email" id="email_reg" name="email_reg">
          <div class="input-group-append">
            <div class="input-group-text">
            <span class="fas fa-envelope"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="Password" class="form-control" placeholder="Password" id="pass_reg" name="pass_reg">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="Password"  class="form-control" placeholder="Retype password" id="pass_reg_2" name="pass_reg_2">
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-lock"></span>
              </div>
            </div>
          </div>
        <div class="row">
          <div class="col-12">
            <button type="submit" class="btn btn-danger btn-block" name="register">Sign up</button>
          </div>
        </div>
      </form>
      <p class="mt-2">
          <a href="<?php echo base_url(); ?>" class="text-center">Already have an account?</a>
      </p>
    </div>
    <!-- /.card-body -->
  </div>
  <!-- /.card -->
</div>
<!-- /.login-box -->

