<?php $this->load->view('layouts/header'); ?>
<div class="content-wrapper">
  <section class="content-header">
    <h1>
      <?= $title; ?>
    </h1>
    <ol class="breadcrumb">
      <li><a href="<?= base_url(); ?>dashboard"><i class="fa fa-home"></i></a></li>
      <li class="active"><?= $title; ?></li>
    </ol>
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
                <th style="width: 5%; text-align: center;">No.</th>
                <th>Parent</th>
                <th>Menu</th>
                <th>Log User</th>
                <th>Tanggal</th>
                <th style="width: 10%;"></th>
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
                  <label for="judul">Parent</label>
                  <select class="form-control" id="id_parent" name="id_parent">
				    <option value="0">--Pilih Parent--</option>
					<?php foreach($list_data_menu as $row) { ?>
				    <option value="<?= $row->id; ?>"><?= $row->judul; ?></option>
					<?php } ?>
				  </select>
                  <input type="hidden" id="id">
                </div>
                <div class="form-group">
                  <label for="judul">Judul</label>
                  <input type="text" class="form-control" id="judul" name="judul">
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

  table = $('#example1').DataTable({
    "responsive": true,
    "processing": true,
    "serverSide": true,
    "order": [],
    "ajax": {
      "url": "<?= base_url(); ?>kios/menu/data",
      "type": "POST"
    },
    "columnDefs": [
      { 
        "targets": [ 0, 5 ],
        "orderable": false,
        "className": "text-center",
        "searchable": false
      }
    ]
  });

  $('#judul').focus();

  $('#btn_simpan').click(function() {
    $('#frm_default').submit();
  });

  $('#btn_reset').click(function() {
    $('#frm_default')[0].reset();
    $('input[type=hidden]').val(null);
    $('#judul').focus();
  });

  $('#judul').on('keypress', function(e) {
    if(e.which === 13) {
      $('#btn_simpan').focus();
    }
  });

  $("#frm_default").validate({
    rules: {
      id_parent: "required",
      judul: "required"
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
      data.append('id_parent', $('#id_parent').val());
      data.append('judul', $('#judul').val());
      $.ajax({
        cache: false,
        contentType: false,
        processData: false,
        url: "<?= base_url(); ?>kios/menu/save",
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
          $('.nav-tabs a[href="#tab_1"]').tab('show');
        }
      });
    }
  });

  $('#example1').on('click', '.btn_edit', function() {
    $.ajax({
      url: "<?= base_url(); ?>kios/menu/get",
      type: "GET",
      dataType: "JSON",
      data: { id: $(this).data('id') },
      success: function(res) {
        $('#id').val(res.id);
        $('#id_parent').val(res.id_parent);
        $('#judul').val(res.judul);
        $('.nav-tabs a[href="#tab_2"]').tab('show');
        $('#judul').focus();
      }
    });
  });

  $('#example1').on('click', '.btn_delete', function() {
    if(confirm('Anda yakin?')) {
      var data = new FormData();
      data.append('id', $(this).data('id'));
      $.ajax({
        cache: false,
        contentType: false,
        processData: false,
        url: "<?= base_url(); ?>kios/menu/del",
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