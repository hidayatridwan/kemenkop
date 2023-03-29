<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Slide extends CI_Controller {

	public function index()
	{
		$data = array(
			'title' => "Slide",
			'jenis' => "tvwall"
		);
		$this->load->view('tvwall/slide', $data);
	}

    public function save()
	{
		$this->save->save_slide();
	}

	public function data()
	{
		$data = $this->list->list_slide();
		echo json_encode($data);
	}

	public function get()
	{
		$data = $this->get->get_slide();
		echo json_encode($data);
	}

    public function del()
	{
		$this->del->del_slide();
	}
}