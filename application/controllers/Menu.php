<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Menu extends CI_Controller {

	public function index()
	{
		$data = array(
			'title' => "Menu",
			'list_data_menu' => $this->list->list_data_menu()
		);
		$this->load->view('menu', $data);
	}

    public function save()
	{
		$this->save->save_menu();
	}

	public function data()
	{
		$data = $this->list->list_menu();
		echo json_encode($data);
	}

	public function get()
	{
		$data = $this->get->get_menu();
		echo json_encode($data);
	}

    public function del()
	{
		//$this->del->del_menu();
	}
}