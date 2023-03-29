<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Password extends CI_Controller {

	public function index()
	{
		$data = array(
			'title' => "Ubah Password"
		);
		$this->load->view('password', $data);
	}

    public function save()
	{
		$this->save->save_password();
	}
}