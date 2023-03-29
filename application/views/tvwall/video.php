<?php $this->load->view('layouts/header'); ?>
<style>
  #cover-spin {
    position:fixed;
    width:100%;
    left:0;right:0;top:0;bottom:0;
    background-color: rgba(255,255,255,0.7);
    z-index:9999;
    display:none;
}

@-webkit-keyframes spin {
	from {-webkit-transform:rotate(0deg);}
	to {-webkit-transform:rotate(360deg);}
}

@keyframes spin {
	from {transform:rotate(0deg);}
	to {transform:rotate(360deg);}
}

#cover-spin::after {
    content:'';
    display:block;
    position:absolute;
    left:48%;top:40%;
    width:40px;height:40px;
    border-style:solid;
    border-color:black;
    border-top-color:transparent;
    border-width: 4px;
    border-radius:50%;
    -webkit-animation: spin .8s linear infinite;
    animation: spin .8s linear infinite;
}
</style>
<div class="content-wrapper">
  <section class="content-header">
    <h1>
      <?= $title; ?>
    </h1>
  </section>
  <section class="content">
    <div class="nav-tabs-custom">
      <ul class="nav nav-tabs">
        <li class="active"><a href="#tab_1" data-toggle="tab"><i class="fa fa-th"></i> List</a></li>
        <li><a href="#tab_2" data-toggle="tab"><i class="fa fa-edit"></i> Form</a></li>
      </ul>
      <div class="tab-content">
        <div class="tab-pane active" id="tab_1">
          <table id="example1" class="table table-bordered table-hover" style="width: 100%;">
            <thead>
              <tr>
                <th style="width: 10%; text-align: center;">No.</th>
                <th>Video</th>
                <th>Status</th>
                <th>Log User</th>
                <th>Log Date</th>
                <th style="width: 20%;"></th>
              </tr>
            </thead>
            <tbody>
            </tbody>
          </table>
        </div>
        <div class="tab-pane" id="tab_2">
          <div class="box box-solid">
            <div class="box-body">
              <form id="frm_default">
                <div class="form-group">
                  <label for="video">Video</label>
                  <input type="file" id="video" name="video">
                  <input type="hidden" id="video_hidden">
                  <a id="link_video" target="_blank" class="default help-block"></a>
                  <input type="hidden" id="id">
                </div>
                <div class="form-group">
                  <label for="status">Status</label>
				  <select class="form-control" id="status" name="status">
				    <option value="1">Aktif</value>
				    <option value="0">Tidak aktif</value>
				  </select>
                </div>
              </form>
            </div>
            <div class="box-footer">
              <button type="button" class="btn btn-success btn-flat" id="btn_simpan"><i class="fa fa-check"></i> Simpan</button>
              <button type="button" class="btn btn-default btn-flat" id="btn_reset"><i class="fa fa-refresh"></i> Reset</button>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
</div>
<div id="cover-spin"></div>
<?php $this->load->view('layouts/footer'); ?>
<script type="text/javascript">
  var table;

  table = $('#example1').DataTable({
    "responsive": true,
    "processing": true,
    "serverSide": true,
    "order": [],
    "ajax": {
      "url": "<?= base_url(); ?>tvwall/video/data",
      "type": "POST"
    },
    "columnDefs": [
      { 
        "targets": [ 0, 2, 5 ],
        "orderable": false,
        "className": "text-center",
        "searchable": false
      }
    ]
  });
  
  $('#btn_simpan').click(function() {
    $('#cover-spin').show(0);
    $('#frm_default').submit();
  });

  $('#btn_reset').click(function() {
    $('#frm_default')[0].reset();
    $('#id').val(null);
    $('#video_hidden').val(null);
	$('#link_video').text(null);
  });

  $("#frm_default").validate({
    rules: {
      status: "required"
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
      data.append('id', $('#id').val());
      data.append('video', $('#video').prop('files')[0]);
      data.append('video_hidden', $('#video_hidden').val());
      data.append('type', "mp4");
      data.append('status', $('#status').val());
      $.ajax({
        cache: false,
        contentType: false,
        processData: false,
        url: "<?= base_url(); ?>tvwall/video/save",
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
          $('#cover-spin').hide(0);
          table.ajax.reload();
          $('#btn_reset').click();
          $.notify({
            icon: res.icon,
            title: res.title,
            message: res.message
          }, {
            type: res.type
          });
        }
      });
    }
  });

  $('#example1').on('click', '.btn_edit', function() {
    $.ajax({
      url: "<?= base_url(); ?>tvwall/video/get",
      type: "GET",
      dataType: "JSON",
      data: { id: $(this).data('id') },
      success: function(res) {
        $('#id').val(res.id);
        $('#video_hidden').val(res.video);
        if(res.video != '' || res.video != null) {
          $('#link_video').text(res.video);
          $('#link_video').attr('href', "<?= base_url(); ?>uploads/video/"+res.video);
        }
        $('#status').val(res.status);
        $('.nav-tabs a[href="#tab_2"]').tab('show');
      }
    });
  });

  $('#example1').on('click', '.btn_delete', function() {
    if(confirm('Anda yakin?')) {
      var data = new FormData();
      data.append('id', $(this).data('id'));
      data.append('video', $(this).data('video'));
      $.ajax({
        cache: false,
        contentType: false,
        processData: false,
        url: "<?= base_url(); ?>tvwall/video/del",
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
          table.ajax.reload();
          $('#btn_reset').click();
          $.notify({
            icon: res.icon,
            title: res.title,
            message: res.message
          }, {
            type: res.type
          });
        }
      });
    }
  });
</script>