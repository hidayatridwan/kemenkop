<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Profil extends CI_Controller
{

	public function index()
	{
		$data = array(
			'title' => "Profil"
		);
		$this->load->view('tvwall/profil', $data);
	}

	public function save()
	{
		$this->save->save_profil();
	}

	public function get()
	{
		$data = $this->get->get_profil();
		echo json_encode($data);
	}

	public function refresh()
	{
		$result = $this->save->refresh();
		if ($result > 0) {
			echo json_encode(["status" => true]);
		} else {
			echo json_encode(["status" => false]);
		}
	}
}
