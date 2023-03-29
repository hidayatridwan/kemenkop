<?php
defined('BASEPATH') or exit('No direct script access allowed');

class save_model extends CI_Model
{

	public function msg_success($param = null)
	{
		$data = array();
		$data['icon'] = "glyphicon glyphicon-ok";
		$data['title'] = "Success";
		$data['message'] = "Berhasil disimpan";
		$data['type'] = "warning";
		$data['param'] = $param;
		echo json_encode($data);
	}

	public function msg_failed()
	{
		$data = array();
		$data['icon'] = "glyphicon glyphicon-remove";
		$data['title'] = "Failed";
		$data['message'] = "Gagal disimpan";
		$data['type'] = "danger";
		echo json_encode($data);
	}

	public function save_menu()
	{
		$id = htmlspecialchars($this->input->post('id'));
		$id_parent = htmlspecialchars($this->input->post('id_parent'));
		$judul = htmlspecialchars(addslashes($this->input->post('judul')));
		$log_user = $this->session->userdata('id_user');

		$this->db->query("call save_menu(
			'$id',
			'$id_parent',
			'$judul',
			'$log_user')");

		if ($this->db->affected_rows() >= 0) {
			$this->msg_success();
		} else {
			$this->msg_failed();
		}
	}

	public function save_konten()
	{
		$id = htmlspecialchars($this->input->post('id'));
		$id_menu = htmlspecialchars($this->input->post('id_menu'));
		$gambar_hidden = $this->input->post('gambar_hidden');
		$uraian = $this->input->post('uraian');
		$link = $this->input->post('link');
		$log_user = $this->session->userdata('id_user');

		$folder = './uploads/konten/';
		if (isset($_FILES['gambar'])) {
			if (!empty($gambar_hidden)) {
				$fileExist = $folder . $gambar_hidden;
				if (file_exists($fileExist) == true) {
					if (unlink($fileExist) == false) {
						$this->msg_failed();
						die;
					}
				}
			}
			$path = $_FILES['gambar']['name'];
			$ext = pathinfo($path, PATHINFO_EXTENSION);
			$gambar  = "gambar_" . date('YmdHis') . "." . $ext;
			$status_upload = move_uploaded_file($_FILES['gambar']['tmp_name'], $folder . $gambar);

			if ($status_upload ==  false) {
				$this->msg_failed();
				die;
			}
		} else {
			$gambar  = $gambar_hidden;
		}

		$this->db->query("call save_konten(
			'$id',
			'$id_menu',
			'$gambar',
			'$uraian',
			'$link',
			'$log_user')");

		if ($this->db->affected_rows() >= 0) {
			$this->msg_success();
		} else {
			$this->msg_failed();
		}
	}

	public function save_masukan()
	{
		$json = file_get_contents('php://input');
		$data = json_decode($json);
		$nama = $data->nama;
		$masukan = $data->masukan;
		$rating = $data->rating;

		$this->db->query("call save_masukan(
			'$nama',
			'$masukan',
			'$rating')");

		if ($this->db->affected_rows() > 0) {
			$message = array('message' => 'Data masukan Berhasil di kirim.');
			echo json_encode($message);
		} else {
			$message = array('message' => 'Data masukan Gagal di kirim.');
			echo json_encode($message);
		}
	}

	public function save_profil()
	{
		$gambar_hidden = $this->input->post('gambar_hidden');
		$durasi = htmlspecialchars($this->input->post('durasi'));
		$popup = htmlspecialchars($this->input->post('popup'));
		$log_user = $this->session->userdata('id_user');

		$folder = './uploads/';
		if (isset($_FILES['gambar'])) {
			if (!empty($gambar_hidden)) {
				$fileExist = $folder . $gambar_hidden;
				if (file_exists($fileExist) == true) {
					if (unlink($fileExist) == false) {
						$this->msg_failed();
						die;
					}
				}
			}
			$path = $_FILES['gambar']['name'];
			$ext = pathinfo($path, PATHINFO_EXTENSION);
			$gambar  = "gambar_" . date('YmdHis') . "." . $ext;
			$status_upload = move_uploaded_file($_FILES['gambar']['tmp_name'], $folder . $gambar);

			if ($status_upload ==  false) {
				$this->msg_failed();
				die;
			}
		} else {
			$gambar  = $gambar_hidden;
		}

		$this->db->query("call save_profil(
			'$gambar',
			'$durasi',
			'$popup',
			'$log_user')");

		if ($this->db->affected_rows() >= 0) {
			$this->msg_success();
		} else {
			$this->msg_failed();
		}
	}

	public function save_video()
	{
		$id = htmlspecialchars($this->input->post('id'));
		$video_hidden = $this->input->post('video_hidden');
		$type = htmlspecialchars($this->input->post('type'));
		$status = htmlspecialchars($this->input->post('status'));
		$log_user = $this->session->userdata('id_user');

		$folder = './uploads/video/';
		if (isset($_FILES['video'])) {
			if (!empty($video_hidden)) {
				$fileExist = $folder . $video_hidden;
				if (file_exists($fileExist) == true) {
					if (unlink($fileExist) == false) {
						$this->msg_failed();
						die;
					}
				}
			}
			$path = $_FILES['video']['name'];
			// $ext = pathinfo($path, PATHINFO_EXTENSION);
			$video  = date('YmdHis') . "_" . $path; //$ext;
			$status_upload = move_uploaded_file($_FILES['video']['tmp_name'], $folder . $video);
			if ($status_upload ==  false) {
				$this->msg_failed();
				die;
			}
		} else {
			$video  = $video_hidden;
		}

		if (empty($id)) {
			$this->db->query("INSERT INTO `tr_video` (
					`video`,
					`type`,
					`status`,
					`log_user`,
					`log_date`
				)
				VALUES
					(
						'$video',
						'$type',
						'$status',
						'$log_user',
						now()
					);");
		} else {
			$this->db->query("UPDATE `tr_video`
			SET `video` = '$video',
			`type` = '$type',
			`status` = '$status',
			`log_user` = '$log_user',
			`log_date` = now()
			WHERE `id` = '$id';");
		}

		$this->db->query("update reloadtvwall set reload_status=1;");

		if ($this->db->affected_rows() >= 0) {
			$this->msg_success();
		} else {
			$this->msg_failed();
		}
	}

	public function save_slide()
	{
		$id = htmlspecialchars($this->input->post('id'));
		$title = addslashes(htmlspecialchars($this->input->post('title')));
		$gambar_hidden = $this->input->post('gambar_hidden');
		$status = htmlspecialchars($this->input->post('status'));
		$jenis = htmlspecialchars($this->input->post('jenis'));
		$log_user = $this->session->userdata('id_user');

		$folder = './uploads/slide/';
		if (isset($_FILES['gambar'])) {
			if (!empty($gambar_hidden)) {
				$fileExist = $folder . $gambar_hidden;
				if (file_exists($fileExist) == true) {
					if (unlink($fileExist) == false) {
						$this->msg_failed();
						die;
					}
				}
			}
			$path = $_FILES['gambar']['name'];
			$ext = pathinfo($path, PATHINFO_EXTENSION);
			$gambar  = $jenis . date('YmdHis') . "." . $ext;
			$status_upload = move_uploaded_file($_FILES['gambar']['tmp_name'], $folder . $gambar);
			if ($status_upload ==  false) {
				$this->msg_failed();
				die;
			}
		} else {
			$gambar  = $gambar_hidden;
		}

		if (empty($id)) {
			$this->db->query("INSERT INTO `tr_slide` (
				`title`,
				`gambar`,
				`status`,
				`jenis`,
				`log_user`,
				`log_date`
			)
			VALUES
				(
					'$title',
					'$gambar',
					'$status',
					'$jenis',
					'$log_user',
					now()
				);
				");
		} else {
			$this->db->query("UPDATE `tr_slide`
			SET `title` = '$title',
			`gambar` = '$gambar',
			`status` = '$status',
			`jenis` = '$jenis',
			`log_user` = '$log_user',
			`log_date` = now()
			WHERE `id` = '$id';");
		}

		$this->db->query("update reloadtvwall set reload_status=1;");

		if ($this->db->affected_rows() >= 0) {
			$this->msg_success();
		} else {
			$this->msg_failed();
		}
	}

	public function save_berita()
	{
		$id = htmlspecialchars($this->input->post('id'));
		$judul = htmlspecialchars($this->input->post('judul'));
		$subtitle = htmlspecialchars($this->input->post('subtitle'));
		$uraian = htmlspecialchars($this->input->post('uraian'));
		$status = htmlspecialchars($this->input->post('status'));
		$log_user = $this->session->userdata('id_user');


		$folder = './uploads/qrcode/';
		$img = $_POST['gambar'];
		$img = str_replace('data:image/png;base64,', '', $img);
		$img = str_replace(' ', '+', $img);
		$data = base64_decode($img);
		$file = $folder . uniqid() . '.png';
		file_put_contents($file, $data);

		if (empty($id)) {
			$this->db->query("INSERT INTO `tr_berita` (
				`judul`,
				`subtitle`,
				`uraian`,
				`qrcode`,
				`status`,
				`log_user`,
				`log_date`
			)
			VALUES
				(
					'$judul',
					'$subtitle',
					'$uraian',
					'$file',
					'$status',
					'$log_user',
					now()
				);
				");
		} else {
			$this->db->query("UPDATE `tr_berita`
			SET `judul` = '$judul',
			`subtitle` = '$subtitle',
			`uraian` = '$uraian',
			`qrcode` = '$file',
			`status` = '$status',
			`log_user` = '$log_user',
			`log_date` = now()
			WHERE `id` = '$id';");
		}

		$this->db->query("update reloadtvwall set reload_status=1;");

		if ($this->db->affected_rows() >= 0) {
			$this->msg_success();
		} else {
			$this->msg_failed();
		}
	}

	public function refresh_berita()
	{
		$this->db->query("update reloadtvwall set reload_status=1;");

		if ($this->db->affected_rows() >= 0) {
			$this->msg_success();
		} else {
			$this->msg_failed();
		}
	}

	public function save_pengumuman()
	{
		$id = htmlspecialchars($this->input->post('id'));
		$judul = htmlspecialchars($this->input->post('judul'));
		$uraian = $this->input->post('uraian');
		$status = htmlspecialchars($this->input->post('status'));
		$log_user = $this->session->userdata('id_user');

		$this->db->query("call save_pengumuman(
			'$id',
			'$judul',
			'$uraian',
			'$status',
			'$log_user')");

		if ($this->db->affected_rows() >= 0) {
			$this->msg_success();
		} else {
			$this->msg_failed();
		}
	}

	public function save_jadwal_kegiatan()
	{
		$id = htmlspecialchars($this->input->post('id'));
		$uraian = htmlspecialchars($this->input->post('uraian'));
		$ruangan = htmlspecialchars($this->input->post('ruangan'));
		$status = htmlspecialchars($this->input->post('status'));
		$waktu = htmlspecialchars($this->input->post('waktu'));
		$log_user = $this->session->userdata('id_user');

		$this->db->query("call save_jadwal_kegiatan(
			'$id',
			'$ruangan',
			'$uraian',
			'$status',
			'$waktu',
			'$log_user')");

		if ($this->db->affected_rows() >= 0) {
			$this->msg_success();
		} else {
			$this->msg_failed();
		}
	}

	public function save_reloadtvwall()
	{
		$ip_address = $this->input->get('ip_address');
		$this->db->query("call save_reloadtvwall('$ip_address')");

		if ($this->db->affected_rows() >= 0) {
			$this->msg_success();
		} else {
			$this->msg_failed();
		}
	}

	public function save_text_berjalan()
	{
		$id = htmlspecialchars($this->input->post('id'));
		$text_berjalan = htmlspecialchars($this->input->post('text_berjalan'));
		$log_user = $this->session->userdata('id_user');

		$this->db->query("call save_text_berjalan(
			'$id',
			'$text_berjalan',
			'$log_user')");

		if ($this->db->affected_rows() >= 0) {
			$this->msg_success();
		} else {
			$this->msg_failed();
		}
	}

	public function save_password()
	{
		$password = md5($this->input->post('password'));

		$this->db->query("call save_password('$password')");

		if ($this->db->affected_rows() >= 0) {
			$this->msg_success();
		} else {
			$this->msg_failed();
		}
	}

	public function save_reloadtvwall_json($ip_address)
	{
		$ip_address_exists = $this->db->query("SELECT ip_address FROM reloadtvwall WHERE ip_address = '$ip_address' limit 1")->row();

		if (!empty($ip_address_exists->ip_address)) {
			return $this->db->query("update reloadtvwall set reload_status = 0 where ip_address = '$ip_address'");
			return true;
		} else {
			return false;
		}
	}
	public function refresh()
	{
		return $this->db->query("update reloadtvwall set reload_status=1;");
	}
}
