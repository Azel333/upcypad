<?php
defined('BASEPATH') OR exit('No direct script access allowed');
// $this->load->model('crud_toko_model');
// $data['produk'] = $this->crud_toko_model->_getDataProduk()->result_array();

class Crud_model extends Ci_Model {

		// FUNGSI PANGGIL DATA DATABASE
	// ##############################################################
	// ##############################################################
	// ##############################################################
	// ##############################################################
	// ##############################################################
	// ##############################################################

	public function _getDataProduk() {

		return $this->db->get('produk')->result_array();
	}
		// FUNGSI INSERT DATABASE
	// ##############################################################
	// ##############################################################
	// ##############################################################
	// ##############################################################
	// ##############################################################
	// ##############################################################

	public function _insertProduk() {
		$data = [
				'id_produk' => $this->input->post('id_produk'),
				'produk_id' => $this->input->post('produk_id'),
				'kategori_id' => $this->input->post('kategori_id'),
				'gambar' => $this->input->post('gambar'),
				'nama_produk' => $this->input->post('nama_produk'),
				'harga_produk' => $this->input->post('harga_produk'),
				'harga_promo' => $this->input->post('harga_promo'),
				'jumlah_diskon' => $this->input->post('jumlah_diskon'),
				'spesifikasi_produk' => $this->input->post('spesifikasi_produk')
			];
			$this->db->insert('produk', $data);
	}



}