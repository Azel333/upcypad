<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Toko extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->library(array('template'));
		$this->load->helper(array('form', 'url'));
		is_logged_in();
	}

	public function index()
	{
		$data = [
			'user'	=> $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array(),
			'title'	=> 'My Toko'
		];
		$this->template->template_utama('toko/v_my_toko', $data);
	}

	public function daftar_produk()
	{
		$data = [
			'user'	=> $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array(),
			'title'	=> 'Daftar Produk'
		];
		$this->template->template_utama('toko/v_daftar_produk', $data);
	}

	public function edit_produk()
	{
		$data = [
			'user'	=> $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array(),
			'title'	=> 'Edit Produk'
		];
		$this->template->template_utama('toko/v_edit_produk', $data);
	}

	public function edit_toko()
	{
		$data = [
			'user'	=> $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array(),
			'title'	=> 'Edit Toko'
		];
		$this->template->template_utama('toko/v_edit_toko', $data);
	}

	public function riwayat_toko()
	{
		$data = [
			'user'	=> $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array(),
			'title'	=> 'Riwayat Toko'
		];
		$this->template->template_utama('toko/v_riwayat_toko', $data);
	}

	public function upload_produk()
	{

		$this->form_validation->set_rules('harga_produk', 'Harga Produk', 'trim|required');

		if ($this->form_validation->run() == FALSE)
		{
			$data = [
			'user'	=> $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array(),
			'title'	=> 'Upload Produk'
			];
		
			$this->template->template_utama('toko/v_upload_produk', $data);
		}
		else
		{


			$ukuran = $this->input->post('ukuran[]');
			$warna = $this->input->post('warna[]');
			$stok = $this->input->post('stok[]');
			$data['array_ukuran'] =implode("-", $ukuran);
			$data['array_warna'] =implode("-", $warna);
			$data['array_stok'] =implode("-", $stok);

			$upload_image1 = $_FILES['gambar1']['name'];
			$upload_image2 = $_FILES['gambar2']['name'];
			$upload_image3 = $_FILES['gambar3']['name'];

			if($upload_image1)
			{
				$config['upload_path'] = './assets/img/profile/';
				$config['allowed_types'] = 'gif|jpg|png|jpeg';

				$this->load->library('upload', $config);
				
				if ( $this->upload->do_upload('gambar1'))
				{
					$nama_gambar1 = $this->upload->data('file_name');
				}
				else
				{
					echo $this->upload->display_errors();
				}

			}

			if($upload_image2)
			{
				$config['upload_path'] = './assets/img/profile/';
				$config['allowed_types'] = 'gif|jpg|png';
				
				$this->load->library('upload', $config);
				
				if ( $this->upload->do_upload('gambar2'))
				{
					$nama_gambar2 = $this->upload->data('file_name');
				}
				else
				{
					echo $this->upload->display_errors();
				}

			}

			if($upload_image3)
			{
				$config['upload_path'] = './assets/img/profile/';
				$config['allowed_types'] = 'gif|jpg|png';
				
				$this->load->library('upload', $config);
				
				if ( $this->upload->do_upload('gambar3'))
				{
					$nama_gambar3 = $this->upload->data('file_name');
				}
				else
				{
					echo $this->upload->display_errors();
				}

			}

			$array_gambar = [
				$nama_gambar1,
				$nama_gambar2,
				$nama_gambar3
			];

			$data['array_gambar'] = implode("//-//", $array_gambar);

			$data['produk'] = [
				'kategori_id' => $this->input->post('kategori'),
				'array_gambar' => $data['array_gambar'],
				'nama_produk' => $this->input->post('nama_produk'),
				'harga_produk' => $this->input->post('harga_produk'),
				'diskon' => $this->input->post('diskon'),
				'deskripsi_produk' => $this->input->post('deskripsi_produk'),
				'array_stok' => $data['array_stok'],
				'array_ukuran' => $data['array_ukuran'],
				'array_warna' => $data['array_warna']
			];

			$this->db->insert('produk', $data['produk']);

			redirect('toko/upload_produk');

		}
		
	}

}