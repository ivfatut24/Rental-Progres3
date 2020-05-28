<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Register extends MY_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Model_Users');
		
	}

	public function index()
	{
		$data =[];
		if (isPost()) {
			$data = [
				'nama' 					=> $this->input->post('nama'),
				'email' 				=> $this->input->post('email'),
				'no_telp'	 			=> $this->input->post('no_telp'),
				'username' 				=> $this->input->post('username'),
				'password'				=> $this->input->post('password'),
				'password_konfirmasi'	=> $this->input->post('password_konfirmasi'),
			];

			if ($data['password'] === $data['password_konfirmasi']) {
				unset($data['password_konfirmasi']);
				if ($this->Model_Users->insertCustomer($data)) {
					$this->session->set_flashdata('msg', '<div class="alert alert-success text-center text-white" role="alert"><h4>Registrasi Berhasil</h4><br>Redirecting...</div>');
					echo "<script type='text/JavaScript'>setTimeout(function () {
						window.location.href = '".base_url('login')."';
					 }, 2000);</script>"; // 2 detik
					$data = [];
				} else {
					$this->session->set_flashdata('msg', '<div class="alert alert-danger text-center text-white" role="alert"><h4>Registrasi Gagal</h4></div>');
				}				
			} else {
				$this->session->set_flashdata('msg', '<div class="alert alert-danger text-center text-white" role="alert"><h4>Konfirmasi Password Salah</h4></div>');
			}			
		}
		$this->load->view('guest/register', $data);
	}

}

/* End of file Register.php */
/* Location: ./application/controllers/Register.php */
