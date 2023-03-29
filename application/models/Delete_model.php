<?php
defined('BASEPATH') or exit('No direct script access allowed');

class delete_model extends CI_Model
{

	public function msg_success()
	{
		$data = array();
		$data['icon'] = "glyphicon glyphicon-ok";
		$data['title'] = "Success";
		$data['message'] = "Berhasil dihapus";
		$data['type'] = "warning";
		echo json_encode($data);
	}

	public function msg_failed()
	{
		$data = array();
		$data['icon'] = "glyphicon glyphicon-remove";
		$data['title'] = "Failed";
		$data['message'] = "Gagal dihapus";
		$data['type'] = "danger";
		echo json_encode($data);
	}

	public function del_menu()
	{
		$id = htmlspecialchars($this->input->post('id'));
		$this->db->query("call del_menu('$id')");
		if ($this->db->affected_rows() >= 0) {
			$this->msg_success();
		} else {
			$this->msg_failed();
		}
	}

	public function del_konten()
	{
		$id = htmlspecialchars($this->input->post('id'));
		$gambar = htmlspecialchars($this->input->post('gambar'));
		$gambar = './uploads/konten/' . $gambar;

		if (file_exists($gambar) == true) {
			if (unlink($gambar) == false) {
				$this->msg_failed();
				die;
			}
		}
		$this->db->query("call del_konten('$id')");

		if ($this->db->affected_rows() >= 0) {
			$this->msg_success();
		} else {
			$this->msg_failed();
		}
	}

	public function del_video()
	{
		$id = htmlspecialchars($this->input->post('id'));
		$video = htmlspecialchars($this->input->post('video'));
		$video = './uploads/video/' . $video;
		if (file_exists($video) == true) {
			if (unlink($video) == false) {
				$this->msg_failed();
				die;
			}
		}
		$this->db->query("call del_video('$id')");
		if ($this->db->affected_rows() >= 0) {
			$this->msg_success();
		} else {
			$this->msg_failed();
		}
	}

	public function del_slide()
	{
		$id = htmlspecialchars($this->input->post('id'));
		$gambar = htmlspecialchars($this->input->post('gambar'));
		$gambar = './uploads/slide/' . $gambar;

		if (file_exists($gambar) == true) {
			if (unlink($gambar) == false) {
				$this->msg_failed();
				die;
			}
		}
		$this->db->query("call del_slide('$id')");

		if ($this->db->affected_rows() >= 0) {
			$this->msg_success();
		} else {
			$this->msg_failed();
		}
	}

	public function del_berita()
	{
		$id = htmlspecialchars($this->input->post('id'));
		$gambar = htmlspecialchars($this->input->post('gambar'));
		$gambar = './uploads/qrcode/' . $gambar;

		if (file_exists($gambar) == true) {
			if (unlink($gambar) == false) {
				$this->msg_failed();
				die;
			}
		}
		$this->db->query("call del_berita('$id')");
		if ($this->db->affected_rows() >= 0) {
			$this->msg_success();
		} else {
			$this->msg_failed();
		}
	}

	public function del_pengumuman()
	{
		$id = htmlspecialchars($this->input->post('id'));
		$this->db->query("call del_pengumuman('$id')");
		if ($this->db->affected_rows() >= 0) {
			$this->msg_success();
		} else {
			$this->msg_failed();
		}
	}

	public function del_jadwal_kegiatan()
	{
		$id = htmlspecialchars($this->input->post('id'));
		$this->db->query("call del_jadwal_kegiatan('$id')");
		if ($this->db->affected_rows() >= 0) {
			$this->msg_success();
		} else {
			$this->msg_failed();
		}
	}

	public function del_text_berjalan()
	{
		$id = htmlspecialchars($this->input->post('id'));
		$this->db->query("call del_text_berjalan('$id')");
		if ($this->db->affected_rows() >= 0) {
			$this->msg_success();
		} else {
			$this->msg_failed();
		}
	}
}
