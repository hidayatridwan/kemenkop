<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	public function index()
	{
		$data = array(
			'title' => "Login"
		);
		$this->load->view('login', $data);
	}

	public function get_login()
	{
		$row = $this->get->get_login();
		if($row) {
			$this->session->set_userdata('id_user', $row->id);
			$this->session->set_userdata('nama', $row->nama);
			$this->session->set_userdata('role', 'Administrator');
			$this->session->set_userdata('log_date', date('d M Y H:i:s'));
			$data = array();
			$data['success'] = true;
			echo json_encode($data);
		} else {
			$data = array();
			$data['success'] = false;
			$data['icon'] = "glyphicon glyphicon-remove";
			$data['title'] = "Failed";
			$data['message'] = "Username atau Password salah.";
			$data['type'] = "danger";
			echo json_encode($data);
		}
	}

	public function logout() {
		$this->session->unset_userdata('id_user');
		$this->session->unset_userdata('nama');
		$this->session->unset_userdata('role');
		$this->session->unset_userdata('log_date');
		redirect(base_url('login'));
	}
}