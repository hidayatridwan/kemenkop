<?php
if($this->session->userdata('id_user')) {
  redirect(base_url('tvwall/profil'));
}
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title><?= $title; ?></title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="<?= base_url(); ?>assets/bower_components/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?= base_url(); ?>assets/bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="<?= base_url(); ?>assets/bower_components/Ionicons/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?= base_url(); ?>assets/css/AdminLTE.min.css">
  <!-- Notify Animate -->
  <link rel="stylesheet" href="<?= base_url(); ?>assets/css/animate.css">
  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body class="hold-transition login-page" style="height: auto !important;">
<div class="login-box">
  <div class="login-logo">
    <a href="<?= base_url(); ?>"><b>Admin</b>KEMENKOP</a>
  </div>
  <!-- /.login-logo -->
  <div class="login-box-body">
    <p class="login-box-msg">Sign in to start your session</p>
    <form id="frm_default">
      <div class="form-group has-feedback">
        <input type="text" id="username" class="form-control" placeholder="Username">
        <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
        <input type="password" id="password" class="form-control" placeholder="Password">
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
      </div>
      <div class="row">
        <div class="col-xs-12">
          <div class="pull-right">
            <button type="button" class="btn btn-default btn-flat" id="btn_reset">Clear</button>
            <button type="button" class="btn btn-primary btn-flat" id="btn_login">Login</button>
          </div>
        </div>
        <!-- /.col -->
      </div>
    </form>
  </div>
  <!-- /.login-box-body -->
</div>
<!-- /.login-box -->

<!-- jQuery 3 -->
<script src="<?= base_url(); ?>assets/bower_components/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="<?= base_url(); ?>assets/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- Notify -->
<script src="<?= base_url(); ?>assets/js/bootstrap-notify.min.js"></script>
<script>
  $(document).ready(function() {
    $('#btn_reset').click();
  });

  $('#btn_reset').click(function() {
    $('#frm_default')[0].reset();
    $('#username').focus();
  });

  $('#username').on('keypress', function(e) {
    if(e.which === 13) {
      $('#password').focus();
    }
  });

  $('#password').on('keypress', function(e) {
    if(e.which === 13) {
      $('#btn_login').click();
    }
  });

  $('#btn_login').click(function() {
    var data = new FormData();
    data.append('username', $('#username').val());
    data.append('password', $('#password').val());
    $.ajax({
      cache: false,
      contentType: false,
      processData: false,
      url: "<?= base_url(); ?>login/get_login",
      type: "POST",
      dataType: "JSON",
      data: data,
      beforeSend: function() {
        $('#btn_login').prop("disabled", true);
      },
      complete: function() {
        $('#btn_login').prop("disabled", false);
      },
      success: function(res) {
        if(res.success == true) {
          window.location = "<?= base_url(); ?>tvwall/profil";
        } else {
          $.notify({
            icon: res.icon,
            title: res.title,
            message: res.message
          }, {
            type: res.type
          });
        }
      }
    });
  });
</script>
</body>
</html>