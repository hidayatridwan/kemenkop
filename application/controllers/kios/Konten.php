<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Konten extends CI_Controller {

	public function list_menu($id_menu)
	{
		$title = $this->db->query("call get_menu('$id_menu')")->row()->judul;
		$data = array(
			'title' => $title,
			'id_menu' => $id_menu
		);
		$this->load->view('kios/konten', $data);
	}

    public function save()
	{
		$this->save->save_konten();
	}

	public function data()
	{
		$data = $this->list->list_konten();
		echo json_encode($data);
	}

	public function get()
	{
		$data = $this->get->get_konten();
		echo json_encode($data);
	}

    public function del()
	{
		$this->del->del_konten();
	}
}