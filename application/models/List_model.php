<?php
defined('BASEPATH') or exit('No direct script access allowed');

class list_model extends CI_Model
{

	public function list_data_berita_json()
	{
		$query = "select
		judul as title,
		uraian as description,
		qrcode
		from tr_berita
		where `status` = 1
		order by log_date desc;";
		$result = $this->db->query($query)->result();
		return $result;
	}

	public function list_data_slide_json()
	{
		$query = "select
		title,
		gambar as image
		from tr_slide
		where `status` = 1
		and jenis = 'tvwall'
		order by log_date desc;";
		$result = $this->db->query($query)->result();
		return $result;
	}

	public function list_data_video_json()
	{
		$query = "select
		video,
		concat('video/', type) as type
		from tr_video
		where `status` = 1
		order by log_date desc;";
		$result = $this->db->query($query)->result();
		return $result;
	}

	public function list_data_text_json()
	{
		$query = "select
		text_berjalan as text
		from tr_text_berjalan
		order by log_date desc;";
		$result = $this->db->query($query)->result();
		return $result;
	}

	public function list_menu()
	{
		$search = $_POST['search']['value'];
		$order = array(
			1 => 't2.judul',
			2 => 't1.judul',
			3 => 't3.nama',
			4 => 't1.log_date'
		);
		if (isset($_POST['order'])) {
			$order_by = $order[$_POST['order']['0']['column']] . ' ' . $_POST['order']['0']['dir'];
		} else {
			$order_by = 't1.id asc';
		}
		$limit = $this->input->post('start') . ',' . $this->input->post('length');
		$sql = "call list_menu('$search', '$order_by', '$limit', @count_filter, @count_all)";
		$query = $this->db->query($sql);
		$result = $query->result();
		$query->next_result();
		$query->free_result();
		$data = array();
		$no = $this->input->post('start');
		foreach ($result as $r) {
			$no++;
			$row = array();
			$row[] = $no;
			$row[] = $r->parent;
			$row[] = $r->judul;
			$row[] = $r->log_user;
			$row[] = $r->log_date;
			$row[] = '<div class="btn-group">
			<a href="' . base_url() . 'kios/konten/list_menu/' . $r->id . '" class="btn btn-default btn-flat btn-xs btn_list"><i class="fa fa-th"></i></a>
			<button type="button" class="btn btn-success btn-flat btn-xs btn_edit" data-id="' . $r->id . '"><i class="fa fa-edit"></i></button>
			<button type="button" class="btn btn-danger btn-flat btn-xs btn_delete" data-id="' . $r->id . '"><i class="fa fa-trash-o"></i></button>
			</div>';
			$data[] = $row;
		}
		$output = array(
			'draw' => $this->input->post('draw'),
			'recordsFiltered' => $this->db->query('select @count_filter as count_filter')->row()->count_filter,
			'recordsTotal' => $this->db->query('select @count_all as count_all')->row()->count_all,
			'data' => $data,
		);
		return $output;
	}

	public function list_data_menu()
	{
		$query = "call list_data_menu()";
		$data = $this->db->query($query);
		$result = $data->result();
		$data->next_result();
		$data->free_result();
		return $result;
	}

	public function list_konten()
	{
		$id_menu = htmlspecialchars($this->input->post('id_menu'));
		$search = $_POST['search']['value'];
		$order = array(
			2 => 'log_user',
			3 => 'log_date'
		);
		if (isset($_POST['order'])) {
			$order_by = $order[$_POST['order']['0']['column']] . ' ' . $_POST['order']['0']['dir'];
		} else {
			$order_by = 't1.id asc';
		}
		$limit = $this->input->post('start') . ',' . $this->input->post('length');
		$sql = "call list_konten('$search', '$order_by', '$limit', '$id_menu', @count_filter, @count_all)";
		$query = $this->db->query($sql);
		$result = $query->result();
		$query->next_result();
		$query->free_result();
		$data = array();
		$no = $this->input->post('start');
		foreach ($result as $r) {
			$no++;
			$row = array();
			$row[] = $no;
			if (empty($r->gambar)) {
				$row[] = '';
			} else {
				$row[] = '<img src="' . base_url() . 'uploads/konten/' . $r->gambar . '" target="_blank" style="height:100px;" />';
			}
			if (empty($r->uraian)) {
				$row[] = '';
			} else {
				$row[] = substr($r->uraian, 0, 50) . '...';
			}
			$row[] = $r->link;
			$row[] = $r->log_user;
			$row[] = $r->log_date;
			$row[] = '<div class="btn-group"><button type="button" class="btn btn-success btn-flat btn-xs btn_edit" data-id="' . $r->id . '"><i class="fa fa-edit"></i></button><button type="button" class="btn btn-danger btn-flat btn-xs btn_delete" data-id="' . $r->id . '" data-gambar="' . $r->gambar . '"><i class="fa fa-trash-o"></i></button></div>';
			$data[] = $row;
		}
		$output = array(
			'draw' => $this->input->post('draw'),
			'recordsFiltered' => $this->db->query('select @count_filter as count_filter')->row()->count_filter,
			'recordsTotal' => $this->db->query('select @count_all as count_all')->row()->count_all,
			'data' => $data,
		);
		return $output;
	}

	public function list_data_menu_by_parent($id)
	{
		$query = "call list_data_menu_by_parent('$id')";
		$data = $this->db->query($query);
		$result = $data->result();
		$data->next_result();
		$data->free_result();
		return $result;
	}

	public function list_data_konten_by_menu($id_menu)
	{
		$query = "call list_data_konten_by_menu('$id_menu')";
		$data = $this->db->query($query);
		$result = $data->result();
		$data->next_result();
		$data->free_result();
		return $result;
	}

	public function list_data_slide()
	{
		$query = "call list_data_slide()";
		$data = $this->db->query($query);
		$result = $data->result();
		$data->next_result();
		$data->free_result();
		return $result;
	}

	public function list_masukan()
	{
		$search = $_POST['search']['value'];
		$order = array(
			1 => 'nama',
			2 => 'masukan',
			3 => 'rating',
			4 => 'log_date'
		);
		if (isset($_POST['order'])) {
			$order_by = $order[$_POST['order']['0']['column']] . ' ' . $_POST['order']['0']['dir'];
		} else {
			$order_by = 'id desc';
		}
		$limit = $this->input->post('start') . ',' . $this->input->post('length');
		$sql = "call list_masukan('$search', '$order_by', '$limit', @count_filter, @count_all)";
		$query = $this->db->query($sql);
		$result = $query->result();
		$query->next_result();
		$query->free_result();
		$data = array();
		$no = $this->input->post('start');
		foreach ($result as $r) {
			$no++;
			$row = array();
			$row[] = $no;
			$row[] = $r->nama;
			$row[] = $r->masukan;
			$row[] = $r->rating;
			$row[] = $r->log_date;
			$data[] = $row;
		}
		$output = array(
			'draw' => $this->input->post('draw'),
			'recordsFiltered' => $this->db->query('select @count_filter as count_filter')->row()->count_filter,
			'recordsTotal' => $this->db->query('select @count_all as count_all')->row()->count_all,
			'data' => $data,
		);
		return $output;
	}

	public function list_video()
	{
		$search = $_POST['search']['value'];
		$order = array(
			2 => 'status',
			3 => 'log_user',
			4 => 'log_date'
		);
		if (isset($_POST['order'])) {
			$order_by = $order[$_POST['order']['0']['column']] . ' ' . $_POST['order']['0']['dir'];
		} else {
			$order_by = 't1.id desc';
		}
		$limit = $this->input->post('start') . ',' . $this->input->post('length');
		$sql = "call list_video('$search', '$order_by', '$limit', @count_filter, @count_all)";
		$query = $this->db->query($sql);
		$result = $query->result();
		$query->next_result();
		$query->free_result();
		$data = array();
		$no = $this->input->post('start');
		foreach ($result as $r) {
			if ($r->status == 1) {
				$status = '<span class="label label-success">Aktif</span>';
			} else {
				$status = '<span class="label label-danger">Tidak aktif</span>';
			}
			$no++;
			$row = array();
			$row[] = $no;
			$row[] = '<a href="' . base_url() . 'uploads/video/' . $r->video . '" target="_blank">' . $r->video . '</a>';
			$row[] = $status;
			$row[] = $r->log_user;
			$row[] = $r->log_date;
			$row[] = '<div class="btn-group"><button type="button" class="btn btn-success btn-flat btn-xs btn_edit" data-id="' . $r->id . '"><i class="fa fa-edit"></i></button><button type="button" class="btn btn-danger btn-flat btn-xs btn_delete" data-id="' . $r->id . '" data-video="' . $r->video . '"><i class="fa fa-trash-o"></i></button></div>';
			$data[] = $row;
		}
		$output = array(
			'draw' => $this->input->post('draw'),
			'recordsFiltered' => $this->db->query('select @count_filter as count_filter')->row()->count_filter,
			'recordsTotal' => $this->db->query('select @count_all as count_all')->row()->count_all,
			'data' => $data,
		);
		return $output;
	}

	public function list_slide()
	{
		$jenis = htmlspecialchars($this->input->post('jenis'));
		$search = $_POST['search']['value'];
		$order = array(
			2 => 'status',
			3 => 'log_user',
			4 => 'log_date'
		);
		if (isset($_POST['order'])) {
			$order_by = $order[$_POST['order']['0']['column']] . ' ' . $_POST['order']['0']['dir'];
		} else {
			$order_by = 't1.id desc';
		}
		$limit = $this->input->post('start') . ',' . $this->input->post('length');
		$sql = "call list_slide('$search', '$order_by', '$limit', '$jenis', @count_filter, @count_all)";
		$query = $this->db->query($sql);
		$result = $query->result();
		$query->next_result();
		$query->free_result();
		$data = array();
		$no = $this->input->post('start');
		foreach ($result as $r) {
			if ($r->status == 1) {
				$status = '<span class="label label-success">Aktif</span>';
			} else {
				$status = '<span class="label label-danger">Tidak aktif</span>';
			}
			$no++;
			$row = array();
			$row[] = $no;
			$row[] = '<img src="' . base_url() . 'uploads/slide/' . $r->gambar . '" target="_blank" style="height:100px;" />';
			$row[] = $status;
			$row[] = $r->log_user;
			$row[] = $r->log_date;
			$row[] = '<div class="btn-group"><button type="button" class="btn btn-success btn-flat btn-xs btn_edit" data-id="' . $r->id . '"><i class="fa fa-edit"></i></button><button type="button" class="btn btn-danger btn-flat btn-xs btn_delete" data-id="' . $r->id . '" data-gambar="' . $r->gambar . '"><i class="fa fa-trash-o"></i></button></div>';
			$data[] = $row;
		}
		$output = array(
			'draw' => $this->input->post('draw'),
			'recordsFiltered' => $this->db->query('select @count_filter as count_filter')->row()->count_filter,
			'recordsTotal' => $this->db->query('select @count_all as count_all')->row()->count_all,
			'data' => $data,
		);
		return $output;
	}

	public function list_berita()
	{
		$search = $_POST['search']['value'];
		$order = array(
			2 => 'status',
			3 => 'log_user',
			4 => 'log_date'
		);
		if (isset($_POST['order'])) {
			$order_by = $order[$_POST['order']['0']['column']] . ' ' . $_POST['order']['0']['dir'];
		} else {
			$order_by = 't1.id desc';
		}
		$limit = $this->input->post('start') . ',' . $this->input->post('length');
		$sql = "call list_berita('$search', '$order_by', '$limit', @count_filter, @count_all)";
		$query = $this->db->query($sql);
		$result = $query->result();
		$query->next_result();
		$query->free_result();
		$data = array();
		$no = $this->input->post('start');
		foreach ($result as $r) {
			if ($r->status == 1) {
				$status = '<span class="label label-success">Aktif</span>';
			} else {
				$status = '<span class="label label-danger">Tidak aktif</span>';
			}
			$no++;
			$row = array();
			$row[] = $no;
			$row[] = $r->judul;
			$row[] = $status;
			$row[] = $r->log_user;
			$row[] = $r->log_date;
			$row[] = '<div class="btn-group">
			<button type="button" class="btn btn-default btn-flat btn-xs btn_refresh" data-id="' . $r->id . '"><i class="fa fa-refresh"></i></button>
			<button type="button" class="btn btn-success btn-flat btn-xs btn_edit" data-id="' . $r->id . '"><i class="fa fa-edit"></i></button>
			<button type="button" class="btn btn-danger btn-flat btn-xs btn_delete" data-id="' . $r->id . '"><i class="fa fa-trash-o"></i></button>
			</div>';
			$data[] = $row;
		}
		$output = array(
			'draw' => $this->input->post('draw'),
			'recordsFiltered' => $this->db->query('select @count_filter as count_filter')->row()->count_filter,
			'recordsTotal' => $this->db->query('select @count_all as count_all')->row()->count_all,
			'data' => $data,
		);
		return $output;
	}

	public function list_pengumuman()
	{
		$search = $_POST['search']['value'];
		$order = array(
			2 => 'status',
			3 => 'log_user',
			4 => 'log_date'
		);
		if (isset($_POST['order'])) {
			$order_by = $order[$_POST['order']['0']['column']] . ' ' . $_POST['order']['0']['dir'];
		} else {
			$order_by = 't1.id desc';
		}
		$limit = $this->input->post('start') . ',' . $this->input->post('length');
		$sql = "call list_pengumuman('$search', '$order_by', '$limit', @count_filter, @count_all)";
		$query = $this->db->query($sql);
		$result = $query->result();
		$query->next_result();
		$query->free_result();
		$data = array();
		$no = $this->input->post('start');
		foreach ($result as $r) {
			if ($r->status == 1) {
				$status = '<span class="label label-success">Aktif</span>';
			} else {
				$status = '<span class="label label-danger">Tidak aktif</span>';
			}
			$no++;
			$row = array();
			$row[] = $no;
			$row[] = $r->judul;
			$row[] = $status;
			$row[] = $r->log_user;
			$row[] = $r->log_date;
			$row[] = '<div class="btn-group"><button type="button" class="btn btn-success btn-flat btn-xs btn_edit" data-id="' . $r->id . '"><i class="fa fa-edit"></i></button><button type="button" class="btn btn-danger btn-flat btn-xs btn_delete" data-id="' . $r->id . '"><i class="fa fa-trash-o"></i></button></div>';
			$data[] = $row;
		}
		$output = array(
			'draw' => $this->input->post('draw'),
			'recordsFiltered' => $this->db->query('select @count_filter as count_filter')->row()->count_filter,
			'recordsTotal' => $this->db->query('select @count_all as count_all')->row()->count_all,
			'data' => $data,
		);
		return $output;
	}

	public function list_jadwal_kegiatan()
	{
		$search = $_POST['search']['value'];
		$order = array(
			2 => 'status',
			3 => 'waktu',
			4 => 'log_user',
			5 => 'log_date'
		);
		if (isset($_POST['order'])) {
			$order_by = $order[$_POST['order']['0']['column']] . ' ' . $_POST['order']['0']['dir'];
		} else {
			$order_by = 't1.id desc';
		}
		$limit = $this->input->post('start') . ',' . $this->input->post('length');
		$sql = "call list_jadwal_kegiatan('$search', '$order_by', '$limit', @count_filter, @count_all)";
		$query = $this->db->query($sql);
		$result = $query->result();
		$query->next_result();
		$query->free_result();
		$data = array();
		$no = $this->input->post('start');
		foreach ($result as $r) {
			if ($r->status == 1) {
				$status = '<span class="label label-success">Aktif</span>';
			} else {
				$status = '<span class="label label-danger">Tidak aktif</span>';
			}
			$no++;
			$row = array();
			$row[] = $no;
			$row[] = $r->uraian;
			$row[] = $r->ruang;
			$row[] = $status;
			$row[] = $r->waktu;
			$row[] = $r->log_user;
			$row[] = $r->log_date;
			$row[] = '<div class="btn-group"><button type="button" class="btn btn-success btn-flat btn-xs btn_edit" data-id="' . $r->id . '"><i class="fa fa-edit"></i></button><button type="button" class="btn btn-danger btn-flat btn-xs btn_delete" data-id="' . $r->id . '"><i class="fa fa-trash-o"></i></button></div>';
			$data[] = $row;
		}
		$output = array(
			'draw' => $this->input->post('draw'),
			'recordsFiltered' => $this->db->query('select @count_filter as count_filter')->row()->count_filter,
			'recordsTotal' => $this->db->query('select @count_all as count_all')->row()->count_all,
			'data' => $data,
		);
		return $output;
	}

	public function list_data_berita()
	{
		$query = "call list_data_berita()";
		$data = $this->db->query($query);
		$result = $data->result();
		$data->next_result();
		$data->free_result();
		return $result;
	}

	public function list_data_slide_tvwall()
	{
		$query = "call list_data_slide_tvwall()";
		$data = $this->db->query($query);
		$result = $data->result();
		$data->next_result();
		$data->free_result();
		return $result;
	}

	public function list_data_video()
	{
		$query = "call list_data_video()";
		$data = $this->db->query($query);
		$result = $data->result();
		$data->next_result();
		$data->free_result();
		return $result;
	}

	public function list_data_pengumuman()
	{
		$query = "call list_data_pengumuman()";
		$data = $this->db->query($query);
		$result = $data->result();
		$data->next_result();
		$data->free_result();
		return $result;
	}

	public function list_data_jadwal_kegiatan()
	{
		$query = "call list_data_jadwal_kegiatan()";
		$data = $this->db->query($query);
		$result = $data->result();
		$data->next_result();
		$data->free_result();
		return $result;
	}

	public function list_text_berjalan()
	{
		$search = $_POST['search']['value'];
		$order = array(
			2 => 'text_berjalan',
			3 => 'log_user',
			4 => 'log_date'
		);
		if (isset($_POST['order'])) {
			$order_by = $order[$_POST['order']['0']['column']] . ' ' . $_POST['order']['0']['dir'];
		} else {
			$order_by = 't1.id desc';
		}
		$limit = $this->input->post('start') . ',' . $this->input->post('length');
		$sql = "call list_text_berjalan('$search', '$order_by', '$limit', @count_filter, @count_all)";
		$query = $this->db->query($sql);
		$result = $query->result();
		$query->next_result();
		$query->free_result();
		$data = array();
		$no = $this->input->post('start');
		foreach ($result as $r) {
			$no++;
			$row = array();
			$row[] = $no;
			$row[] = $r->text_berjalan;
			$row[] = $r->log_user;
			$row[] = $r->log_date;
			$row[] = '<div class="btn-group"><button type="button" class="btn btn-success btn-flat btn-xs btn_edit" data-id="' . $r->id . '"><i class="fa fa-edit"></i></button><button type="button" class="btn btn-danger btn-flat btn-xs btn_delete" data-id="' . $r->id . '"><i class="fa fa-trash-o"></i></button></div>';
			$data[] = $row;
		}
		$output = array(
			'draw' => $this->input->post('draw'),
			'recordsFiltered' => $this->db->query('select @count_filter as count_filter')->row()->count_filter,
			'recordsTotal' => $this->db->query('select @count_all as count_all')->row()->count_all,
			'data' => $data,
		);
		return $output;
	}

	public function list_data_text_berjalan()
	{
		$query = "call list_data_text_berjalan()";
		$data = $this->db->query($query);
		$result = $data->result();
		$data->next_result();
		$data->free_result();
		return $result;
	}
}
