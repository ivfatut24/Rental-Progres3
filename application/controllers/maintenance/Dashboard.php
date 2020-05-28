<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends MY_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->cekAksesMaintenance();
		$this->session->set_flashdata('menu', 'dashboard');
	}

	public function index()
	{
		$this->load->view('maintenance/dashboard');
	}

}

/* End of file Dashboard.php */
/* Location: ./application/controllers/admin/Dashboard.php */
