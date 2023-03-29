<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Jadwal_kegiatan extends CI_Controller {

	public function index()
	{
		$data = array(
			'title' => "Jadwal Kegiatan"
		);
		$this->load->view('tvwall/jadwal_kegiatan', $data);
	}

    public function save()
	{
		$this->save->save_jadwal_kegiatan();
	}

	public function data()
	{
		$data = $this->list->list_jadwal_kegiatan();
		echo json_encode($data);
	}

	public function get()
	{
		$data = $this->get->get_jadwal_kegiatan();
		echo json_encode($data);
	}

    public function del()
	{
		$this->del->del_jadwal_kegiatan();
	}
}