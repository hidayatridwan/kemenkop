<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Api extends CI_Controller {

	public function list_data_menu_by_parent($id)
	{
		$data = $this->list->list_data_menu_by_parent($id);
		echo json_encode($data);
	}
	
	public function list_data_konten_by_menu($id_menu)
	{
		$data = $this->list->list_data_konten_by_menu($id_menu);
		echo json_encode($data);
	}
	
	public function list_data_slide()
	{
		$data = $this->list->list_data_slide();
		echo json_encode($data);
	}

	public function save_masukan()
	{
		$this->save->save_masukan();
	}

	public function get_konten_html($id_menu)
	{
		$data = $this->list->list_data_konten_by_menu($id_menu);
		echo $data[0]->uraian;
	}
}