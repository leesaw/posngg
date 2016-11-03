<!DOCTYPE html>
<html lang="en">
<head>
<?php $this->load->view('includes/header'); ?>
<style>
.login-page{
  background: #ffffff;
}
.login-box-body{
  background: #8c0c03;
  color: #fff;
}
</style>
</head>
<body class="hold-transition login-page">
  <div class="login-box">
    <div class="login-logo">
      <img src="<?php echo base_url(); ?>asset/dist/img/logo_NGG.png" width="60%"/>
      <hr>
      <b><?php echo version; ?></b>
    </div>
    <!-- /.login-logo -->
    <div class="login-box-body">
      <h3 class="login-box-msg">เข้าสู่ระบบ</h3>

      <form action="<?php echo site_url("pos_login/verify"); ?>" name="login_form" id="login_form" method="post">
        <div class="form-group has-feedback">
          <input type="text" class="form-control input-lg" name="username" id="username" placeholder="Username">
          <span class="form-control-feedback"><i class="fa fa-user-o" aria-hidden="true"></i></span>
        </div>
        <div class="form-group has-feedback">
          <input type="password" class="form-control input-lg" name="password" id="password" placeholder="Password">
          <span class="form-control-feedback"><i class="fa fa-key" aria-hidden="true"></i></span>
        </div>
        <div class="row">
          <div class="col-xs-8">
          </div>
          <!-- /.col -->
          <div class="col-xs-4">
            <button type="submit" class="btn btn-default btn-block btn-lg btn-flat">ตกลง</button>

          </div>
          <!-- /.col -->
        </div>
      </form>

    </div>
    <!-- /.login-box-body -->
  </div>
<?php $this->load->view('includes/footer'); ?>
<script>
$(document).ready(function () {
    $('#login_form').validate({
        onclick: false, // <-- add this option
        rules: {
            state: "required"
        },
        messages: {
            state: {
                required: "The State is required!"
            }
        },
        errorPlacement: function (error, element) {
            alert(error.text());
        }
    });
});
</script>
</body>
</html>
