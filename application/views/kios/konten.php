<?php $this->load->view('layouts/header'); ?>
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
                <th>Konten</th>
                <th>Uraian</th>
                <th>Link</th>
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
                  <label for="gambar">Konten</label>
                  <input type="file" id="gambar" name="gambar">
                  <input type="hidden" id="gambar_hidden">
                  <a id="link_gambar" target="_blank" class="default help-block"></a>
                  <input type="hidden" id="id">
                  <input type="hidden" id="id_menu" value="<?= $id_menu; ?>">
                </div>
                <div class="form-group">
                  <label for="uraian">Uraian</label>
                  <textarea class="form-control" id="uraian" rows="10" cols="80"></textarea>
                </div>
                <div class="form-group">
                  <label for="link">Link</label>
                  <input type="text" class="form-control" id="link" name="link">
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
<?php $this->load->view('layouts/footer'); ?>
<script type="text/javascript">
  var table;
  $(document).ready(function() {
	CKEDITOR.replace('uraian');
  });

  table = $('#example1').DataTable({
    "responsive": true,
    "processing": true,
    "serverSide": true,
    "order": [],
    "ajax": {
      "url": "<?= base_url(); ?>kios/konten/data",
      "type": "POST",
      "data": function(d) {
        d.id_menu = $('#id_menu').val()
      }
    },
    "columnDefs": [
      { 
        "targets": [ 0, 1, 2, 3, 6 ],
        "orderable": false,
        "className": "text-center",
        "searchable": false
      }
    ]
  });
  
  $('#btn_simpan').click(function() {
    $('#frm_default').submit();
  });

  $('#btn_reset').click(function() {
    $('#frm_default')[0].reset();
    $('#id').val(null);
    $('#gambar_hidden').val(null);
	$('#link_gambar').text(null);
    CKEDITOR.instances.uraian.setData("");
  });

  $("#frm_default").validate({
    rules: {},
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
      data.append('id_menu', $('#id_menu').val());
      data.append('gambar', $('#gambar').prop('files')[0]);
      data.append('gambar_hidden', $('#gambar_hidden').val());
	  var uraian = CKEDITOR.instances.uraian.getData();
	  data.append('uraian', uraian);
      data.append('link', $('#link').val());
      $.ajax({
        cache: false,
        contentType: false,
        processData: false,
        url: "<?= base_url(); ?>kios/konten/save",
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

  $('#example1').on('click', '.btn_edit', function() {
    $.ajax({
      url: "<?= base_url(); ?>kios/konten/get",
      type: "GET",
      dataType: "JSON",
      data: { id: $(this).data('id') },
      success: function(res) {
        $('#id').val(res.id);
        $('#gambar_hidden').val(res.gambar);
        if(res.gambar != '' || res.gambar != null) {
          $('#link_gambar').text(res.gambar);
          $('#link_gambar').attr('href', "<?= base_url(); ?>uploads/konten/"+res.gambar);
        }
        CKEDITOR.instances.uraian.setData(res.uraian);
        $('#link').val(res.link);
        $('.nav-tabs a[href="#tab_2"]').tab('show');
      }
    });
  });

  $('#example1').on('click', '.btn_delete', function() {
    if(confirm('Anda yakin?')) {
      var data = new FormData();
      data.append('id', $(this).data('id'));
      data.append('gambar', $(this).data('gambar'));
      $.ajax({
        cache: false,
        contentType: false,
        processData: false,
        url: "<?= base_url(); ?>kios/konten/del",
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