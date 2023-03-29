<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Berita extends CI_Controller {

	public function index()
	{
		$data = array(
			'title' => "Berita"
		);
		$this->load->view('tvwall/berita', $data);
	}

    public function save()
	{
		$this->save->save_berita();
	}

	public function data()
	{
		$data = $this->list->list_berita();
		echo json_encode($data);
	}

    public function refresh()
	{
		$this->save->refresh_berita();
	}

	public function get()
	{
		$data = $this->get->get_berita();
		echo json_encode($data);
	}

    public function del()
	{
		$this->del->del_berita();
	}
}