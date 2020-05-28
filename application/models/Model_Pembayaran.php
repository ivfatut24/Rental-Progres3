<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Model_Pembayaran extends CI_Model {

	function getPembayaran()
	{
		$id_transaksi = $this->input->post('id_transaksi');
		
		$this->db->join('transaksi t', 't.id_transaksi = p.id_transaksi');
		
		return $this->db->get_where('pembayaran p', ['p.id_transaksi' => $id_transaksi])->row();
	}

	function getListPembayaran()
	{
		$check_pembayaran = $this->getArrayPembayaran();
		foreach ($check_pembayaran as $key => $value) {
			if (strtotime($value['tgl_deadline']) < strtotime('now')) {
				if ($value['status'] != 2) {
					$this->changeStatusPembayaran($value['id_pembayaran'], 2);					
				}
			}
		}
		
		$ret = $this->getArrayPembayaran();
		foreach ($ret as $key => $value) {
			$this->db->join('barangs b', 'b.id_barang = dt.id_barang');
			$this->db->where('id_transaksi', $value['id_transaksi']);			
			$ret[$key]['detail transaksi'] = $this->db->get('detail_transaksi dt')->result_array();
		}
		return $ret;
	}

	function getAllPembayaran()
	{
		return $this->db->get('pembayaran')->result();
	}

	function changeStatusPembayaran($id_pembayaran, $status)
	{
		if ($status == 1) {
			$data = [
				'status'		=> $status,
				'bukti_bayar'	=> $this->input->post('bukti_bayar'),
			];
			
			$this->db->update('pembayaran', $data, ['id_pembayaran' => $id_pembayaran]);
		}
		if ($status == 2) {
			$this->db->update('pembayaran', ['status' => $status], ['id_pembayaran' => $id_pembayaran]);

			$pembayaran = $this->db->get_where('pembayaran p', ['id_pembayaran' => $id_pembayaran])->result_array();

			$this->db->join('barangs b', 'b.id_barang = dt.id_barang');
			$dt = $this->db->get_where('detail_transaksi dt', ['id_transaksi' == $pembayaran['id_transaksi']])->result_array();
			
			foreach ($dt as $key => $barang) {
				$this->db->update('barangs', ['stok' => $barang->stok + $barang->jumlah_barang], ['id_barang' => $barang->id_barang]);
			}
		}		
	}

	function konfirmasiPembayaran($id_pembayaran)
	{
		$this->db->update('pembayaran', ['is_verified' => 1], ['id_pembayaran' => $id_pembayaran]);		
	}

	private function getArrayPembayaran()
	{
		$id_user = $this->session->userdata('id_user');

		$this->db->join('pembayaran p', 'p.id_transaksi = t.id_transaksi');
		$this->db->join('tujuan tuj', 'tuj.id = t.id_tujuan');
		return $this->db->get_where('transaksi t', ['t.id_user' => $id_user])->result_array();
	}
}

/* End of file Model_Pembayaran.php */
