<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class KelolaPemesanan extends MY_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->cekAksesAdmin();
		$this->session->set_flashdata('menu', 'kelola-pemesanan');
		// $this->load->model('Model_Users','user');
	}

	public function index()
	{
		$this->load->view('admin/kelola_pemesanan/index');
	}

}

/* End of file KelolaPemesanan.php */
/* Location: ./application/controllers/admin/KelolaPemesanan.php */
