<?php
class Display extends CI_Controller
{

	public function index()
	{
		$data = array(
			'title' => "Informasi Kemenkop"
		);
		$this->load->view('tvwall/display', $data);
	}

	public function list_data_berita_json()
	{
		$data = $this->list->list_data_berita_json();
		echo json_encode($data);
	}

	public function list_data_slide_json()
	{
		$data = $this->list->list_data_slide_json();
		echo json_encode($data);
	}

	public function list_data_video_json()
	{
		$data = $this->list->list_data_video_json();
		echo json_encode($data);
	}

	public function list_data_text_json()
	{
		$data = $this->list->list_data_text_json();
		echo json_encode($data);
	}

	// public function index()
	// {
	// 	$data = array(
	// 		'title' => "Informasi Kemenkop",
	// 		'get_profil' => $this->get->get_profil(),
	// 		'list_data_slide_tvwall' => $this->list->list_data_slide_tvwall(),
	// 		'list_data_text_berjalan' => $this->list->list_data_text_berjalan()
	// 	);
	// 	$this->load->view('tvwall/display', $data);
	// }

	// public function display2()
	// {
	// 	$data = array(
	// 		'title' => "Informasi Kemenkop",
	// 		'get_profil' => $this->get->get_profil(),
	// 		'list_data_slide_tvwall' => $this->list->list_data_slide_tvwall(),
	// 		'list_data_text_berjalan' => $this->list->list_data_text_berjalan()
	// 	);
	// 	$this->load->view('tvwall/display2', $data);
	// }

	public function list_data_berita()
	{
		$data = $this->list->list_data_berita();
		$konten = "";
		$no = 0;
		if (!empty($data)) {
			foreach ($data as $row) {
				$no++;
				$konten = $konten . '<h3 style="margin-bottom: 5px; margin-top: 5px;">' . $row->judul . '</h3>' . $row->subtitle . '<hr style="margin-bottom: 10px; margin-top: 5px;">' . $row->uraian;
				if (count($data) == $no) {
					$konten = $konten . '';
				} else {
					$konten = $konten . '<hr style="border: 5px solid #3bd0f0;">';
				}
			}
		}
		echo $konten;
	}

	public function list_data_pengumuman()
	{
		$data = $this->list->list_data_pengumuman();
		$konten = "";
		if (!empty($data)) {
			$konten = '<p style="font-size: 45px; font-weight: bold; text-align: center;">PENGUMUMAN</p><ul>';
			foreach ($data as $row) {
				$konten = $konten . '<li><p style="font-size: 30px; padding:0;margin:0;">' . $row->judul . '</p></li>';
			}
			$konten = $konten . '</ul>';
		}
		echo $konten;
	}

	public function list_data_jadwal_kegiatan()
	{
		$data = $this->list->list_data_jadwal_kegiatan();
		$konten = "";
		if (!empty($data)) {
			$konten = '<p style="font-size: 45px; font-weight: bold; text-align: center;">JADWAL KEGIATAN</p><table class="table table-striped" style="font-size: 30px;"><thead><tr><th>#</th><th>Uraian</th><th>Ruang</th><th>Waktu</th></tr></thead><tbody>';
			$no = 0;
			foreach ($data as $row) {
				$no++;
				$konten = $konten . '<tr><td>' . $no . '</td><td>' . $row->uraian . '</td><td>' . $row->ruang . '</td><td>' . $row->waktu_label . '</td></tr>';
			}
			$konten = $konten . '</tbody></table>';
		}
		echo $konten;
	}

	public function list_data_video()
	{
		$data = $this->list->list_data_video();
		echo json_encode($data);
	}

	public function get_reloadtvwall()
	{
		echo $this->get->get_reloadtvwall()->reload_status;
	}

	public function save_reloadtvwall()
	{
		$this->save->save_reloadtvwall();
	}

	public function get_reloadtvwall_json()
	{
		$ip_address = htmlspecialchars($this->input->get('ip_address'));
		$reload_status = $this->get->get_reloadtvwall_json($ip_address)->reload_status;
		echo json_encode(["status" => $reload_status]);
	}

	public function save_reloadtvwall_json()
	{
		$ip_address = $this->input->post('ip_address');
		if ($this->save->save_reloadtvwall_json($ip_address)) {
			echo json_encode(["status" => true]);
		} else {
			echo json_encode(["status" => false]);
		}
	}
}
