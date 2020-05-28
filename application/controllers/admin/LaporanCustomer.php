<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class LaporanCustomer extends MY_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->cekAksesAdmin();
		$this->session->set_flashdata('menu', 'laporan-customer');
	}

	public function index()
	{
		$this->load->view('admin/laporan_customer/index');
	}
}

/* End of file LaporanCustomer.php */
/* Location: ./application/controllers/admin/LaporanCustomer.php */
