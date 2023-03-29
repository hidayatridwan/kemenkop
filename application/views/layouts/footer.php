  <footer class="main-footer">
    <div class="pull-right hidden-xs">
      <b>Version</b> {elapsed_time}
    </div>
    <strong>Copyright &copy; 2018 <a href="https://adminlte.io">PT. Adityarama Daya Cipta</a>.</strong> All rights
    reserved.
  </footer>

</div>
<!-- ./wrapper -->

<!-- jQuery 3 -->
<script src="<?= base_url(); ?>assets/bower_components/jquery/dist/jquery.min.js"></script>
<!-- Autocomplete -->
<script src="<?= base_url(); ?>assets/plugins/jquery-ui-1.12.1/jquery-ui.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="<?= base_url(); ?>assets/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- PACE -->
<script src="<?= base_url(); ?>assets/plugins/pace/pace.min.js"></script>
<!-- InputMask -->
<script src="<?= base_url(); ?>assets/plugins/input-mask/jquery.inputmask.js"></script>
<script src="<?= base_url(); ?>assets/plugins/input-mask/jquery.inputmask.date.extensions.js"></script>
<!-- bootstrap datepicker -->
<script src="<?= base_url(); ?>assets/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
<!-- bootstrap timepicker -->
<script src="<?= base_url(); ?>assets/js/jquery.timepicker.min.js"></script>
<!-- Validate Jquery -->
<script src="<?= base_url(); ?>assets/js/jquery.validate.min.js"></script>
<script src="<?= base_url(); ?>assets/js/additional-methods.min.js"></script>
<!-- Notify -->
<script src="<?= base_url(); ?>assets/js/bootstrap-notify.min.js"></script>
<!-- DataTables -->
<script src="<?= base_url(); ?>assets/bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="<?= base_url(); ?>assets/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
<script src="<?= base_url(); ?>assets/bower_components/datatables.net-bs/js/dataTables.responsive.min.js"></script>
<script src="<?= base_url(); ?>assets/bower_components/datatables.net-bs/js/responsive.bootstrap.min.js"></script>
<!-- Select2 -->
<script src="<?= base_url(); ?>assets/bower_components/select2/dist/js/select2.full.min.js"></script>
<!-- Number -->
<script src="<?= base_url(); ?>assets/js/jquery.number.js"></script>
<!-- SlimScroll -->
<script src="<?= base_url(); ?>assets/bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="<?= base_url(); ?>assets/bower_components/fastclick/lib/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="<?= base_url(); ?>assets/js/adminlte.min.js"></script>
<script type="text/javascript">
  // To make Pace works on Ajax calls
  $(document).ready(function () {
    Pace.restart();

    $('a').each(function() {
      var link = $(this).prop('href');
      var current = location.href;
      if(current == link) {
        $(this).parent('li').addClass('active');
        $(this).parent().parent().parent().addClass('active');
      }
    });
    
  });
</script>
</body>
</html>