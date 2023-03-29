<?php $this->load->view('layouts/header'); ?>
<div class="content-wrapper">
  <section class="content-header">
    <h1>
      <?= $title; ?>
    </h1>
  </section>
  <section class="content">
    <div class="row">
      <div class="col-md-6">
        <div class="box box-success">
          <div class="box-body">
            <form id="frm_default">
              <div class="form-group">
                <label for="gambar">Gambar popup</label>
                <input type="file" id="gambar" name="gambar">
                <input type="hidden" id="gambar_hidden">
                <a id="link_gambar" target="_blank" class="default help-block"></a>
              </div>
              <div class="form-group">
                <label for="durasi">Durasi popup</label>
                <select class="form-control" id="durasi" name="durasi">
                  <option value="30000">30 Detik</option>
                  <option value="60000">1 Menit</option>
                  <option value="180000">3 Menit</option>
                  <option value="300000">5 Menit</option>
                </select>
              </div>
              <div class="form-group">
                <label for="popup">Aktif ?</label>
                <select class="form-control" id="popup" name="popup">
                  <option value="Y">Ya</option>
                  <option value="N">Tidak</option>
                </select>
              </div>
              <div class="form-group">
                <label for="link">Link TV Wall</label>
                <br>
                <label><a href="<?= base_url(); ?>tvwall/display" target="_blank">Link Display</a></label>
              </div>
            </form>
          </div>
          <div class="box-footer">
            <button type="button" class="btn btn-success btn-flat" id="btn_simpan"><i class="fa fa-check"></i> Simpan</button>
          </div>
        </div>
      </div>
    </div>
  </section>
</div>
<?php $this->load->view('layouts/footer'); ?>
<script type="text/javascript">
  $(document).ready(function() {
    get_profil();
  });

  function get_profil() {
    $.ajax({
      url: "<?= base_url(); ?>tvwall/profil/get",
      type: "GET",
      dataType: "JSON",
      success: function(res) {
        if (res != null) {
          $('#gambar_hidden').val(res.gambar);
          if (res.gambar != '' || res.gambar != null) {
            $('#link_gambar').text(res.gambar);
            $('#link_gambar').attr('href', "<?= base_url(); ?>uploads/" + res.gambar);
          }
          $('#durasi').val(res.durasi);
          $('#popup').val(res.popup);
        }
      }
    });
  }

  $('#btn_simpan').click(function() {
    var data = new FormData();
    data.append('gambar', $('#gambar').prop('files')[0]);
    data.append('gambar_hidden', $('#gambar_hidden').val());
    data.append('durasi', $('#durasi').val());
    data.append('popup', $('#popup').val());
    $.ajax({
      cache: false,
      contentType: false,
      processData: false,
      url: "<?= base_url(); ?>tvwall/profil/save",
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
        get_profil();
        $.notify({
          icon: res.icon,
          title: res.title,
          message: res.message
        }, {
          type: res.type
        });
      }
    });
    // $.ajax({
    //   cache: false,
    //   contentType: false,
    //   processData: false,
    //   url: "<?= base_url(); ?>tvwall/profil/refresh",
    //   type: "get",
    //   dataType: "JSON",
    //   beforeSend: function() {
    //     $('#btn_simpan').prop("disabled", true);
    //   },
    //   complete: function() {
    //     $('#btn_simpan').prop("disabled", false);
    //   },
    //   success: function(res) {
    //     $.notify({
    //       icon: 'glyphicon glyphicon-ok',
    //       title: 'Refresh',
    //       message: 'Berhasil di refresh'
    //     }, {
    //       type: 'success'
    //     });
    //   }
    // });
  });
</script>