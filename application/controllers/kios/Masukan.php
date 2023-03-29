<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Masukan extends CI_Controller {

	public function index()
	{
		$data = array(
			'title' => "Masukan"
		);
		$this->load->view('kios/masukan', $data);
	}

    public function save()
	{
		$this->save->save_masukan();
	}

	public function data()
	{
		$data = $this->list->list_masukan();
		echo json_encode($data);
	}
}