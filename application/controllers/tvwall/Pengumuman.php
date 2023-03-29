<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pengumuman extends CI_Controller {

	public function index()
	{
		$data = array(
			'title' => "Pengumuman"
		);
		$this->load->view('tvwall/pengumuman', $data);
	}

    public function save()
	{
		$this->save->save_pengumuman();
	}

	public function data()
	{
		$data = $this->list->list_pengumuman();
		echo json_encode($data);
	}

	public function get()
	{
		$data = $this->get->get_pengumuman();
		echo json_encode($data);
	}

    public function del()
	{
		$this->del->del_pengumuman();
	}
}