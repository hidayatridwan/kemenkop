<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class get_model extends CI_Model {

	public function get_login() {
		$username = htmlspecialchars($this->input->post('username'));
		$password = md5(htmlspecialchars($this->input->post('password')));
		$query = "call get_login('$username', '$password')";
		$data = $this->db->query($query);
		$result = $data->row();
		$data->next_result();
		$data->free_result();
		return $result;
	}

	public function get_menu($id = null) {
		$id = htmlspecialchars($this->input->get('id'));
		$query = "call get_menu('$id')";
		$data = $this->db->query($query);
		$result = $data->row();
		$data->next_result();
		$data->free_result();
		return $result;
	}
	
	public function get_konten() {
		$id = htmlspecialchars($this->input->get('id'));
		$query = "call get_konten('$id')";
		$data = $this->db->query($query);
		$result = $data->row();
		$data->next_result();
		$data->free_result();
		return $result;
	}

	public function get_konten_nomor($id_menu, $nomor) {
		$query = "call get_konten_nomor('$id_menu', '$nomor')";
		$data = $this->db->query($query);
		$result = $data->row();
		$data->next_result();
		$data->free_result();
		return $result;
	}

	public function get_profil() {
		$query = "call get_profil()";
		$data = $this->db->query($query);
		$result = $data->row();
		$data->next_result();
		$data->free_result();
		return $result;
	}
	
	public function get_video() {
		$id = htmlspecialchars($this->input->get('id'));
		$query = "call get_video('$id')";
		$data = $this->db->query($query);
		$result = $data->row();
		$data->next_result();
		$data->free_result();
		return $result;
	}
	
	public function get_slide() {
		$id = htmlspecialchars($this->input->get('id'));
		$query = "call get_slide('$id')";
		$data = $this->db->query($query);
		$result = $data->row();
		$data->next_result();
		$data->free_result();
		return $result;
	}
	
	public function get_berita() {
		$id = htmlspecialchars($this->input->get('id'));

		$query = "
		SELECT
			id,
			judul,
			subtitle,
			uraian,
			qrcode as gambar,
			`status`
		FROM
			tr_berita
		WHERE
			id = '$id';
			";
		$result = $this->db->query($query)->row();
		return $result;
	}
	
	public function get_pengumuman() {
		$id = htmlspecialchars($this->input->get('id'));
		$query = "call get_pengumuman('$id')";
		$data = $this->db->query($query);
		$result = $data->row();
		$data->next_result();
		$data->free_result();
		return $result;
	}
	
	public function get_jadwal_kegiatan() {
		$id = htmlspecialchars($this->input->get('id'));
		$query = "call get_jadwal_kegiatan('$id')";
		$data = $this->db->query($query);
		$result = $data->row();
		$data->next_result();
		$data->free_result();
		return $result;
	}
	
	public function get_reloadtvwall() {
		$ip_address = $this->input->get('ip_address');
		$query = "call get_reloadtvwall('$ip_address')";
		$data = $this->db->query($query);
		$result = $data->row();
		$data->next_result();
		$data->free_result();
		return $result;
	}
	
	public function get_konten_html($id) {
		$query = "call get_konten('$id')";
		$data = $this->db->query($query);
		$result = $data->row();
		$data->next_result();
		$data->free_result();
		return $result;
	}
	
	public function get_text_berjalan() {
		$id = htmlspecialchars($this->input->get('id'));
		$query = "call get_text_berjalan('$id')";
		$data = $this->db->query($query);
		$result = $data->row();
		$data->next_result();
		$data->free_result();
		return $result;
	}
	
	public function get_reloadtvwall_json($ip_address) {

		$ip_address_exists = $this->db->query("SELECT ip_address FROM reloadtvwall WHERE ip_address = '$ip_address' limit 1")->row();
		
		if(empty($ip_address_exists->ip_address)) {
			$this->db->query("insert into reloadtvwall(ip_address,reload_status) values('$ip_address',1)");
		}
		
		$query = "select * from reloadtvwall where ip_address = '$ip_address'";
		$result = $this->db->query($query)->row();
		return $result;
	}
}