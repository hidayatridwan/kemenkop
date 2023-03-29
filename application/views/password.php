<?php $this->load->view('layouts/header'); ?>
<div class="content-wrapper">
  <section class="content-header">
    <h1>
      <?= $title; ?>
    </h1>
  </section>
  <section class="content">
    <div class="box box-success">
	  <div class="box-body">
		<form id="frm_default">
		  <div class="form-group">
			<label for="password">Password</label>
			<input type="password" class="form-control" id="password" name="password">
		  </div>
		</form>
	  </div>
	  <div class="box-footer">
		<button type="button" class="btn btn-success btn-flat" id="btn_simpan"><i class="fa fa-check"></i> Simpan</button>
	  </div>
	</div>
  </section>
</div>
<?php $this->load->view('layouts/footer'); ?>
<script type="text/javascript">
  $('#btn_simpan').click(function() {
    $('#frm_default').submit();
  });

  $("#frm_default").validate({
    rules: {
      password: "required"
    },
    messages: {},
    errorElement: "em",
    errorPlacement: function(error, element) {
      error.addClass("help-block");
      error.insertAfter(element);
    },
    highlight: function(element, errorClass, validClass) {
      $(element).parent().addClass("has-error").removeClass("has-success");
    },
    unhighlight: function(element, errorClass, validClass) {
      $(element).parent().removeClass("has-error");
    },
    submitHandler: function() {
      var data = new FormData();
      data.append('password', $('#password').val());
      $.ajax({
        cache: false,
        contentType: false,
        processData: false,
        url: "<?= base_url(); ?>password/save",
        type: "POST",
        dataType: "JSON",
        data: data,
        beforeSend: function() {
          $('#btn_simpan').prop("disabled", true);
        },
        complete: function() {
          $('#btn_simpan').prop("disabled", false);
        },
        success: function(res) {
          $.notify({
            icon: res.icon,
            title: res.title,
            message: res.message
          }, {
            type: res.type
          });
		  setTimeout(() => window.location.href = 'http://localhost/kemenkop/login/logout', 3000);
        }
      });
    }
  });

</script>