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
	<div class="box">
	  <div class="box-header with-border">
		<h3 class="box-title"><i class="fa fa-th"></i> List</h3>
	  </div>
	  <div class="box-body">
		<table id="example1" class="table table-bordered table-hover" style="width: 100%;">
		  <thead>
			<tr>
			  <th style="width: 10%; text-align: center;">No.</th>
			  <th>Nama</th>
			  <th>Masukan</th>
			  <th>Rating</th>
			  <th>Log Date</th>
			</tr>
		  </thead>
		  <tbody>
		  </tbody>
		</table>
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
      "url": "<?= base_url(); ?>kios/masukan/data",
      "type": "POST"
    },
    "columnDefs": [
      { 
        "targets": [ 0, 4 ],
        "orderable": false,
        "className": "text-center",
        "searchable": false
      }
    ]
  });
</script>