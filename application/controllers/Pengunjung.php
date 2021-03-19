<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pengunjung extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->library('template');
        $this->load->model('cart_model');
        is_logged_admin();
	}

	public function index()
	{
		//jika role_id adalah 2
		if ($this->session->userdata('role_id') == 2)
		{
			$data['title'] = 'Beranda';
			$this->template->template_utama('pengunjung/v_beranda', $data);
		}
		else
		{
			$data['title'] = 'Beranda';
			$this->template->template_pengunjung('pengunjung/v_beranda', $data);
		}
	}

	public function artikel()
	{
		$data['title'] = 'Artikel';
		// $data['data_user'] = $this->db->get_where('meta_user', ['id_meta' => $this->session->userdata('id_meta')])->row_array();
		// $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
		if ($this->session->userdata('role_id') == 2)
		{
			$this->template->template_utama('pengunjung/v_artikel', $data);
		}
		else
		{
			$this->template->template_pengunjung('pengunjung/v_artikel', $data);
		}
		
	}
	
	public function detail_artikel()
	{
		$data = [
			'artikel'	=> $this->db->get_where('tutorial_artikel', array('id_artikel'=>$this->uri->segment(3)))->row_array()
		];
		if ($this->session->userdata('id_meta'))
		{
			$this->template->template_utama('pengunjung/v_detail_artikel', $data);
		}
		else
		{
			$this->template->template_pengunjung('pengunjung/v_detail_artikel', $data);
		}
	}

	public function video()
	{
		$data['title'] = 'Video';
		if ($this->session->userdata('role_id') == 2)
		{
			$this->template->template_utama('pengunjung/v_video', $data);
		}
		else
		{
			$this->template->template_pengunjung('pengunjung/v_video', $data);
		}
	}

	public function event()
	{
		$data = [
			'title'	=> 'Event',
			'user'	=> $this->db->get_where('user')->row_array()
		];
		if ($this->session->userdata('role_id') == 2)
		{
			$this->template->template_utama('pengunjung/v_event', $data);
		}
		else
		{
			$this->template->template_pengunjung('pengunjung/v_event', $data);
		}
	}

	public function detail_event()
	{
		$data = [
			'event'	=> $this->db->get_where('event', array('id_event'=>$this->uri->segment(3)))->row_array()
		];
		if ($this->session->userdata('id_meta'))
		{
			$this->template->template_utama('pengunjung/v_detail_event', $data);
		}
		else
		{
			$this->template->template_pengunjung('pengunjung/v_detail_event', $data);
		}
	}

	public function transaksi()
	{
		$data['title'] = 'Transaksi';
		if ($this->session->userdata('role_id') == 2)
		{
			$this->template->template_utama('pengunjung/v_transaksi', $data);
		}
		else
		{
			$this->template->template_pengunjung('pengunjung/v_transaksi', $data);
		}
	}

	public function pembayaran()
	{
		$data['title'] = 'Pembayaran';
		if ($this->session->userdata('role_id') == 2)
		{
			$this->template->template_utama('pengunjung/v_pembayaran', $data);
		}
		else
		{
			$this->template->template_pengunjung('pengunjung/v_pembayaran', $data);
		}
	}

	public function kontak()
	{
		$this->load->model('auth_model');
		//jika role_id adalah 2
		if ($this->session->userdata('role_id') == 2)
		{
			//redirect ke user
			redirect('pengguna');
		}
		//jika role_id bukan 2
		else
		{
			//setting validasi
			$this->form_validation->set_rules('nama', 'Username', 'trim|required');
			$this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
			$this->form_validation->set_rules('nomor_telpon', 'Nomor Telepon', 'trim|required|numeric');
			$this->form_validation->set_rules('message', 'Pesan', 'trim|required');
			//jika validasi salah
			if ($this->form_validation->run() == false)
			{
				//tampilkan halaman daftar
				$data['title'] = 'Kontak';
				if ($this->session->userdata('role_id') == 2)
				{
					$this->template->template_utama('pengunjung/v_kontak', $data);
				}
				else
				{
					$this->template->template_pengunjung('pengunjung/v_kontak', $data);
				}
			}
			//jika validasi benar
			else
			{
				//tangkap inputan
				$data_pesan = [
					'id'			=> $this->auth_model->id_pesan(),
					'nama'			=> $this->input->post('nama'),
					'email'			=> $this->input->post('email',TRUE),
					'nomor_telpon'	=> $this->input->post('nomor_telpon'),
					'message'		=> $this->input->post('message')
				];

				$this->db->insert('pesan_pengunjung', $data_pesan);

				$this->session->set_flashdata('pesan_terkirim','<span class="helper-text white-text">Pesan Anda Telah Terkirim</span>');
				redirect('pengunjung/kontak');
			}
		}
	}

	 public function produk()
	{
		$data['title'] = 'Kontak';
		$data['produk'] = $this->db->get('produk')->result_array();
		
		$data['data']=$this->cart_model->get_all_produk();
        $data['contain'] = $this->cart->contents();

        if ($this->session->userdata('role_id') == 2)
		{
			$this->template->template_utama('pengunjung/v_produk', $data);
		}
		else
		{
			$this->template->template_pengunjung('pengunjung/v_produk', $data);
		}

	}

	public function tentang_kami()
	{
		$data['title'] = 'Tentang Kami';
		if ($this->session->userdata('role_id') == 2)
		{
			$this->template->template_utama('pengunjung/v_tentang_kami', $data);
		}
		else
		{
			$this->template->template_pengunjung('pengunjung/v_tentang_kami', $data);
		}
	}

	public function chat()
	{
			$this->template->template_pengunjung('chat');
	}
}
