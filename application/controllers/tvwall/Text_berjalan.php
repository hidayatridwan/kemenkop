<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Text_berjalan extends CI_Controller {

	public function index()
	{
		$data = array(
			'title' => "Text berjalan"
		);
		$this->load->view('tvwall/text_berjalan', $data);
	}

    public function save()
	{
		$this->save->save_text_berjalan();
	}

	public function data()
	{
		$data = $this->list->list_text_berjalan();
		echo json_encode($data);
	}

	public function get()
	{
		$data = $this->get->get_text_berjalan();
		echo json_encode($data);
	}

    public function del()
	{
		$this->del->del_text_berjalan();
	}
}