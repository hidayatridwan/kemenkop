<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Video extends CI_Controller {

	public function index()
	{
		$data = array(
			'title' => "Video"
		);
		$this->load->view('tvwall/video', $data);
	}

    public function save()
	{
		$this->save->save_video();
	}

	public function data()
	{
		$data = $this->list->list_video();
		echo json_encode($data);
	}

	public function get()
	{
		$data = $this->get->get_video();
		echo json_encode($data);
	}

    public function del()
	{
		$this->del->del_video();
	}
}