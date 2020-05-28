<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_Products extends CI_Model {

	function getAllBarang()
	{
		return $this->db->get('barangs')->result();
	}

	function insertProduct()
	{
		$data = array(
			'nama_barang' => $this->input->post('nama_barang'),
			'stok' => $this->input->post('stok'),
			'harga_sewa'=>$this->input->post('harga_sewa'),
			'deskripsi'=>$this->input->post('deskripsi'),
			'ukuran'=>$this->input->post('ukuran'),
			'gambar_barang'=>$this->upload->data('file_name')
		);
		return $this->db->insert('barangs', $data);
	}

	function update()
	{
		$data = array(
			'nama_barang' => $this->input->post('nama_barang'),
			'stok' => $this->input->post('stok'),
			'harga_sewa'=>$this->input->post('harga_sewa'),
			'deskripsi'=>$this->input->post('deskripsi'),
			'ukuran'=>$this->input->post('ukuran')
		);
		if (!empty($_FILES['userfile']['name'])) {
			$data['gambar_barang'] = $this->upload->data('file_name');
		}
		$this->db->where('id_barang', $this->input->post('id_barang'));
		return $this->db->update('barangs', $data);
	}

	function getProductById($id)
	{
		$this->db->where('id_barang', $id);
		return $this->db->get('barangs')->row();
	}

	public function delete($id)
	{
		$this->db->where('id_barang', $id);
		return $this->db->delete('barangs');;
	}

}

/* End of file Model_Products.php */
/* Location: ./application/models/Model_Products.php */
