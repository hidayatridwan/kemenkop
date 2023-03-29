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
                <th>Uraian</th>
                <th>Ruangan</th>
                <th>Status</th>
                <th>Waktu</th>
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
                  <label for="uraian">Uraian</label>
                  <input type="text" class="form-control" id="uraian" name="uraian">
                  <input type="hidden" id="id">
                </div>
                <div class="form-group">
                  <label for="ruangan">Ruangan</label>
                  <input type="text" class="form-control" id="ruangan" name="ruangan">
                </div>
                <div class="form-group">
                  <label for="waktu">Waktu</label>
                  <input type="text" class="form-control" id="waktu" name="waktu">
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
<?php $this->load->view('layouts/footer'); ?>
<script type="text/javascript">
  var table;
  
  $('#waktu').timepicker({
        timeFormat: 'HH:mm:ss',
        // year, month, day and seconds are not important
        minTime: new Date(0, 0, 0, 8, 0, 0),
        maxTime: new Date(0, 0, 0, 15, 0, 0),
        // time entries start being generated at 6AM but the plugin 
        // shows only those within the [minTime, maxTime] interval
        startHour: 6,
        // the value of the first item in the dropdown, when the input
        // field is empty. This overrides the startHour and startMinute 
        // options
        startTime: new Date(0, 0, 0, 8, 20, 0),
        // items in the dropdown are separated by at interval minutes
        interval: 10
  });

  table = $('#example1').DataTable({
    "responsive": true,
    "processing": true,
    "serverSide": true,
    "order": [],
    "ajax": {
      "url": "<?= base_url(); ?>tvwall/jadwal_kegiatan/data",
      "type": "POST"
    },
    "columnDefs": [
      { 
        "targets": [ 0, 3, 6 ],
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
  });

  $("#frm_default").validate({
    rules: {
      title: "required",
      status: "required",
      waktu: "required"
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
      data.append('uraian', $('#uraian').val());
      data.append('ruangan', $('#ruangan').val());
      data.append('status', $('#status').val());
      data.append('waktu', $('#waktu').val());
      $.ajax({
        cache: false,
        contentType: false,
        processData: false,
        url: "<?= base_url(); ?>tvwall/jadwal_kegiatan/save",
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
      url: "<?= base_url(); ?>tvwall/jadwal_kegiatan/get",
      type: "GET",
      dataType: "JSON",
      data: { id: $(this).data('id') },
      success: function(res) {
        $('#id').val(res.id);
        $('#uraian').val(res.uraian);
        $('#ruangan').val(res.ruang);
        $('#status').val(res.status);
        $('#waktu').val(res.waktu);
        $('.nav-tabs a[href="#tab_2"]').tab('show');
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
        url: "<?= base_url(); ?>tvwall/jadwal_kegiatan/del",
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