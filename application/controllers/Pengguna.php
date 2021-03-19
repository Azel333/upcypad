<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pengguna extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model(array('User_model','alamat_model'));
		$this->load->library(array('template','user_agent'));
		$this->load->helper('function');
		is_logged_in();
	}

	public function index()
	{
		if (!$this->session->userdata('role_id') == 2)
		{
			redirect('auth');
		}
		else
		{
			if ($this->agent->is_browser())
			{
				$agent = $this->agent->browser().' '.$this->agent->version();
			}
			elseif ($this->agent->is_mobile())
			{
				$agent = $this->agent->mobile();
			}
			else
			{
				$agent = 'Data user gagal di dapatkan';
			}

			$sistem_operasi = $this->agent->platform();
			$ip = $this->input->ip_address();

			$data = array(
				'browser' => $agent,
				'sistem_operasi' => $sistem_operasi,
				'ip' => $ip
			);
			$this->db->where('id_meta', $this->session->userdata('id_meta'));
			$this->db->update('meta_user', $data);

			$data = [
				'data_user'	=> $this->db->get_where('meta_user', ['id_meta' => $this->session->userdata('id_meta')])->row_array(),
				'user'		=> $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array(),
				'title'		=> 'Halaman User'
			];
			$this->template->template_utama('pengguna/v_beranda', $data);
		}
	}

	public function profile_saya()
	{
		$data = [
			'title'			=> 'Halaman Profile Saya',
			'user'			=> $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array(),
			'data_user'		=> $this->db->get_where('meta_user', ['id_meta' => $this->session->userdata('id_meta')])->row_array(),
			'alamat_user'	=> $this->db->get_where('alamat_user', ['id_meta' => $this->session->userdata('id_meta')])->row_array(),
			'kelurahan'		=> $this->alamat_model->kelurahan(),
			'kecamatan'		=> $this->alamat_model->kecamatan(),
			'kota'			=> $this->alamat_model->kota(),
			'provinsi'		=> $this->alamat_model->province()
		];
		$this->template->template_pengguna('pengguna/v_about', $data);
	}

	public function ubah_password()
	{
		$data = [
			'data_user'	=> $this->db->get_where('meta_user', ['id_meta' => $this->session->userdata('id_meta')])->row_array(),
			'user'		=> $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array(),
			'title'		=> 'Halaman Ganti Password'
		];
		$this->form_validation->set_rules('password_lama', 'Password Lama', 'trim|required');
		$this->form_validation->set_rules('password_baru1', 'Password Baru', 'trim|required|min_length[6]|matches[password_baru2]');
		$this->form_validation->set_rules('password_baru2', 'Konfirmasi Password Baru', 'trim|required|matches[password_baru1]');
		if ($this->form_validation->run() == false)
		{
			$this->template->template_pengguna('pengguna/v_ganti_password', $data);
		}
		else
		{
			$password_lama = $this->input->post('password_lama');
			$password_baru = $this->input->post('password_baru1');
			if (password_verify($password_lama, $data['user']['password']))
			{
				if ($password_lama == $password_baru)
				{
					$this->session->set_flashdata('password_sudah_pernah','<div class="alert alert-danger alert-dismissible" role="alert">Anda sudah pernah menggunakan password tersebut<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
					redirect('pengguna/ubah-password');
				}
				else
				{
					$password_hash = password_hash($password_baru, PASSWORD_DEFAULT);
					$this->db->set('password', $password_hash);
					$this->db->where('email', $this->session->userdata('email'));
					$this->db->update('user');
					$this->session->set_flashdata('ganti_password_berhasil','<div class="alert alert-success alert-dismissible" role="alert">Password Berhasil di Ganti<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
					redirect('pengguna/ubah-password');
				}
			}
			else
			{
				$this->session->set_flashdata('password_lama_salah','<div class="alert alert-danger alert-dismissible" role="alert">Password Lama Salah<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
				redirect('pengguna/ubah-password');
			}
		}
	}

	public function informasi_dasar()
	{
		$data =[
			'data_user'	=> $this->db->get_where('meta_user', ['id_meta' => $this->session->userdata('id_meta')])->row_array(),
			'user'		=> $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array(),
			'title'		=> 'Halaman Ganti Informasi Dasar'
		];
		$this->form_validation->set_rules('nama_depan', 'Nama Depan', 'trim|required');
		$this->form_validation->set_rules('nama_belakang', 'Nama Belakang', 'trim|required');
		$this->form_validation->set_rules('tgl_lahir', 'Tanggal Lahir', 'required');
		$this->form_validation->set_rules('nomor_hp', 'Nomor Handphone', 'required');
		$this->form_validation->set_rules('tempat_lahir', 'Tempat Lahir', 'required');

		if ($this->form_validation->run() == false)
		{
			$this->template->template_pengguna('pengguna/v_info_dasar', $data);
		}
		else
		{
			$nama_depan = $this->input->post('nama_depan');
			$nama_belakang = $this->input->post('nama_belakang');
			$email = $this->input->post('email');
			$tgl_lahir = $this->input->post('tgl_lahir');
			$pisah = explode('-',$tgl_lahir);
			$array = array($pisah[2],$pisah[1],$pisah[0]);
			$satukan = implode('-',$array);
			$nomor_hp= $this->input->post('nomor_hp');
			$no_hp = preg_replace('/[^0-9]/', '', $nomor_hp);
			$kelamin = $this->input->post('kelamin');
			$tempat_lahir = $this->input->post('tempat_lahir');
			$deskripsi = $this->input->post('deskripsi');
			
			$data = array(
				'nama_depan' => $nama_depan,
				'nama_belakang' => $nama_belakang,
				'tgl_lahir' => $satukan,
				'nomor_hp' => $no_hp,
				'kelamin' => $kelamin,
				'tempat_lahir' => $tempat_lahir,
				'deskripsi' => $deskripsi
			);
			$this->db->where('id_meta', $this->session->userdata('id_meta'));
			$this->db->update('meta_user', $data);

			$this->session->set_flashdata('info_dasar','<div class="alert alert-success alert-dismissible" role="alert">Data Berhasil Diubah<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
			redirect('pengguna/informasi-dasar');
		}
	}

	public function ganti_foto()
	{
		$data = [
			'data_user'	=> $this->db->get_where('meta_user', ['id_meta' => $this->session->userdata('id_meta')])->row_array(),
			'user'		=> $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array(),
			'title'		=> 'Halaman Ganti Foto'
		];
		$this->template->template_pengguna('pengguna/v_ganti_foto',$data);
	}

	public function upload_foto()
	{
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
		$upload_image = $_FILES['image']['name'];
		$upload_back_image = $_FILES['back_image']['name'];
		if($upload_image)
		{
			$config = array(
				'upload_path'	=> './assets/img/profile/',
				'allowed_types'	=> 'gif|jpg|png',
				'max_size'		=> '2048',
				'max_width'		=> '1732',
				'max_height'	=> '1732'
			);
			
			$this->load->library('upload', $config);
			
			if ( ! $this->upload->do_upload('image'))
			{
				$error = $this->upload->display_errors();
				var_dump($error);
				die();
			}
			else
			{
				$old_image = $data['user']['image'];
				if ($old_image != 'default.jpg')
				{
					//FCPATH atau Front Controller PATH untuk menuju root folder dari codeigniter
					unlink(FCPATH.'assets/img/profile/'.$old_image);
				}
				$new_image = $this->upload->data('file_name');
				$this->db->set('image', $new_image);
				$this->db->where('id_meta', $this->session->userdata('id_meta'));
				$this->db->update('user');
			}

		}

		if($upload_back_image)
		{
			$config = array(
				'upload_path'	=> './assets/img/background/',
				'allowed_types'	=> 'gif|jpg|png',
				'max_size'		=> '2048',
				'max_width'		=> '1732',
				'max_height'	=> '1732'
			);
			
			$this->load->library('upload', $config);
			
			if ( ! $this->upload->do_upload('back_image'))
			{
				$error = $this->upload->display_errors();
				var_dump($error);
				die();
			}
			else
			{
				$old_image = $data['data_user']['back_image'];
				if ($old_image != 'thumb.png')
				{
					//FCPATH atau Front Controller PATH untuk menuju root folder dari codeigniter
					unlink(FCPATH.'assets/img/background/'.$old_image);
				}
				$new_back_image = $this->upload->data('file_name');
				$this->db->set('back_image', $new_back_image);

				$this->db->where('id_meta', $this->session->userdata('id_meta'));
				$this->db->update('meta_user');
			}
		}
		

		$this->session->set_flashdata('edit','<span class="helper-text white-text">data telah diedit</span>');
		redirect('pengguna/ganti-foto');
	}

	public function alamat()
	{
		$data = [
			'provinsi'	=> $this->alamat_model->provinsi(),
			'data_user'	=> $this->db->get_where('meta_user', ['id_meta' => $this->session->userdata('id_meta')])->row_array(),
			'user'		=> $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array(),
			'title'		=> 'Halaman Alamat',
			'alamat_user'	=> $this->db->get_where('alamat_user', ['id_meta' => $this->session->userdata('id_meta')])->row_array(),
			'province'		=> $this->alamat_model->province()
		];
		$this->form_validation->set_rules('provinsi', 'Provinsi', 'required');
		$this->form_validation->set_rules('kota', 'Kota', 'required');
		$this->form_validation->set_rules('distrik', 'Kecamatan', 'required');
		$this->form_validation->set_rules('kelurahan', 'Kelurahan', 'required');
		$this->form_validation->set_rules('kode', 'Kode Pos', 'trim|required|min_length[5]|min_length[5]|is_numeric');
		$this->form_validation->set_rules('jalan', 'Nama Jalan', 'trim|required');
		$this->form_validation->set_rules('no_jalan', 'Nomor Jalan', 'trim|is_numeric');
		$this->form_validation->set_rules('rt', 'RT', 'trim|required|min_length[2]|max_length[3]|is_numeric');
		$this->form_validation->set_rules('rw', 'RW', 'trim|required|min_length[2]|max_length[3]|is_numeric');

		if ($this->form_validation->run() == false)
		{
			$this->template->template_pengguna('pengguna/v_alamat', $data);
		}
		else
		{
			$provinsi	= $this->input->post('provinsi');
			$kota		= $this->input->post('kota');
			$distrik	= $this->input->post('distrik');
			$kelurahan	= $this->input->post('kelurahan');
			$kode		= $this->input->post('kode');
			$jalan		= $this->input->post('jalan');
			$no_jalan	= $this->input->post('no_jalan');
			$rt			= $this->input->post('rt');
			$rw			= $this->input->post('rw');
			
			$data = array(
				'provinsi'		=> $provinsi,
				'kota'			=> $kota,
				'kecamatan'		=> $distrik,
				'kelurahan'		=> $kelurahan,
				'kode_pos'		=> $kode,
				'nama_jalan'	=> $jalan,
				'nomor_jalan'	=> $no_jalan,
				'rt'			=> $rt,
				'rw'			=> $rw
			);
			$this->db->where('id_meta', $this->session->userdata('id_meta'));
			$this->db->update('alamat_user', $data);

			$this->session->set_flashdata('alamat','<div class="alert alert-success alert-dismissible" role="alert">Data Alamat Berhasil Diubah<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
			redirect('pengguna/alamat');
		}
	}

	function regencies()
	{
		if($this->input->post('province_id'))
		{
			echo $this->alamat_model->regencies($this->input->post('province_id'));
		}
	}

	function distrik()
	{
		if($this->input->post('regency_id'))
		{
			echo $this->alamat_model->distrik($this->input->post('regency_id'));
		}
	}

	function villages()
	{
		if($this->input->post('district_id'))
		{
			echo $this->alamat_model->villages($this->input->post('district_id'));
		}
	}

	public function diikuti()
	{
		if ($this->form_validation->run() == false)
		{
			$data = [
				'title'			=> 'Halaman Diikuti',
				'user'			=> $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array(),
				'user_model'	=> $this->User_model->diikuti()->result(),
				'data_user'		=> $this->db->get_where('meta_user', ['id_meta' => $this->session->userdata('id_meta')])->row_array()
			];
			$this->template->template_pengguna('pengguna/v_diikuti', $data);
		}
		else
		{
			$deskripsi = $this->input->post('deskripsi');
			
			$data = array(
				'deskripsi' => $deskripsi
			);
			$this->db->where('id_meta', $this->session->userdata('id_meta'));
			$this->db->update('meta_user', $data);

			$this->session->set_flashdata('info_dasar','<div class="alert alert-success alert-dismissible" role="alert">Data Berhasil Diubah<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
			redirect('pengguna/informasi-dasar');
		}
	}

	public function daftar_user()
	{
		$data = [
			'title'			=> 'Halaman Daftar User',
			'user'			=> $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array(),
			'user_model'	=> $this->User_model->diikuti()->result(),
			'data_user'		=> $this->db->get_where('meta_user', ['id_meta' => $this->session->userdata('id_meta')])->row_array()
		];
		$this->template->template_pengguna('pengguna/v_daftar_user', $data);
	}

	public function tambah_diikuti()
	{
		$id_meta_teman = $this->input->post('id_teman');

		$sql_cek_teman = $this->db->get_where('meta_user', array('id_meta' => $this->session->userdata('id_meta')))->result_array();
		foreach ($sql_cek_teman as $row)
		{
			$arrayTeman = $row["diikuti"];
		}
		$array_teman = explode(",", $arrayTeman);
		if ($arrayTeman != "")
		{
			$arrayTeman = "$arrayTeman,$id_meta_teman"; 
		}
		else
		{
			$arrayTeman = "$id_meta_teman";
		}
		$data = array(
			'diikuti' => $arrayTeman
		);
		$this->db->where('id_meta', $this->session->userdata('id_meta'));
		$this->db->update('meta_user', $data);

		$this->session->set_flashdata('info_dasar','<div class="alert alert-success alert-dismissible" role="alert">Data Berhasil Diubah<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
		redirect('pengguna/daftar-user');
	}

	public function hapus_diikuti()
	{
		$id_meta_teman = $this->input->post('id_teman');
		$sql_cek_teman =  $this->db->get_where('meta_user', array('id_meta' => $this->session->userdata('id_meta')))->result_array();
		foreach ($sql_cek_teman as $row)
		{
			$arrayTeman = $row["diikuti"];
		}

		$array_teman = explode(",", $arrayTeman);

		foreach ($array_teman as $key => $value)
		{
			if ($value == $id_meta_teman)
			{
				unset($array_teman[$key]);
			}
		}
		$array_teman_baru = implode(",", $array_teman);

		$data = array(
			'diikuti' => $array_teman_baru
		);
		$this->db->where('id_meta', $this->session->userdata('id_meta'));
		$this->db->update('meta_user', $data);

		$this->session->set_flashdata('info_dasar','<div class="alert alert-success alert-dismissible" role="alert">Data Berhasil Diubah<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
		redirect('pengguna/diikuti');
	}

	public function unggah_event()
	{
		$data = [
			'data_user'	=> $this->db->get_where('meta_user', ['id_meta' => $this->session->userdata('id_meta')])->row_array(),
			'user'		=> $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array(),
			'title'		=> 'Halaman Unggah Event'
		];
		$this->form_validation->set_rules('nama_acara', 'Nama Acara', 'trim|required');
		$this->form_validation->set_rules('penyelenggara', 'Penyelenggara', 'trim|required');
		$this->form_validation->set_rules('deskripsi_acara', 'Deskripsi Acara', 'trim|required');
		$this->form_validation->set_rules('mulai_acara', 'Tanggal Mulai Acara', 'required');
		$this->form_validation->set_rules('akhir_acara', 'Tanggal Berakhir Acara', 'required');
		$this->form_validation->set_rules('waktu_mulai_acara', 'Waktu Mulai Acara', 'required');
		$this->form_validation->set_rules('waktu_akhir_acara', 'Waktu Berakhir Acara', 'required');
		$this->form_validation->set_rules('nama_lokasi', 'Nama Lokasi', 'trim|required');
		$this->form_validation->set_rules('nama_biaya', 'Nama Biaya', 'trim|required');
		$this->form_validation->set_rules('jumlah_tiket', 'Jumlah Tiket', 'numeric|required');
		$this->form_validation->set_rules('biaya', 'Biaya', 'numeric|required');
		$this->form_validation->set_rules('mulai_penjualan', 'Tanggal Mulai Penjualan', 'required');
		$this->form_validation->set_rules('akhir_penjualan', 'Tanggal Berakhir Penjualan', 'required');
		$this->form_validation->set_rules('waktu_mulai_penjualan', 'Waktu Mulai Penjualan', 'required');
		$this->form_validation->set_rules('waktu_akhir_penjualan', 'Waktu Berakhir Penjualan', 'required');

		if ($this->form_validation->run() == false)
		{
			$this->template->template_utama('pengguna/v_unggah_event', $data);
		}
		else
		{
			$id_meta				= $this->session->userdata('id_meta');
			$upload_event_image		= $_FILES['event_image']['name'];
			$upload_logo_image		= $_FILES['logo_image']['name'];
			$nama_acara				= $this->input->post('nama_acara');
			$penyelenggara			= $this->input->post('penyelenggara');
			$deskripsi_acara		= $this->input->post('deskripsi_acara');
			$mulai_acara			= $this->input->post('mulai_acara');
			$pisah1					= explode('/',$mulai_acara);
			$array1					= array($pisah1[2],$pisah1[0],$pisah1[1]);
			$satukan1				= implode('-',$array1);
			$akhir_acara			= $this->input->post('akhir_acara');
			$pisah2					= explode('/',$akhir_acara);
			$array2					= array($pisah2[2],$pisah2[0],$pisah2[1]);
			$satukan2				= implode('-',$array2);
			$waktu_mulai_acara		= $this->input->post('waktu_mulai_acara');
			$waktu_akhir_acara		= $this->input->post('waktu_akhir_acara');
			$nama_lokasi			= $this->input->post('nama_lokasi');
			$lat					= $this->input->post('lat');
			$lng					= $this->input->post('lng');
			$nama_biaya				= $this->input->post('nama_biaya');
			$jumlah_tiket			= $this->input->post('jumlah_tiket');
			$biaya					= $this->input->post('biaya');
			$biaya_new				= str_replace(".", "", $biaya);
			$mulai_penjualan		= $this->input->post('mulai_penjualan');
			$pisah3					= explode('/',$mulai_penjualan);
			$array3					= array($pisah3[2],$pisah3[0],$pisah3[1]);
			$satukan3				= implode('-',$array3);
			$akhir_penjualan		= $this->input->post('akhir_penjualan');
			$pisah4					= explode('/',$akhir_penjualan);
			$array4					= array($pisah4[2],$pisah4[0],$pisah4[1]);
			$satukan4				= implode('-',$array4);
			$waktu_mulai_penjualan	= $this->input->post('waktu_mulai_penjualan');
			$waktu_akhir_penjualan	= $this->input->post('waktu_akhir_penjualan');

			if($upload_event_image)
			{
				$config = array(
					'upload_path'	=> './assets/img/event/banner/',
					'allowed_types'	=> 'gif|jpg|png',
					'max_size'		=> '2048',
					'max_width'		=> '1732',
					'max_height'	=> '1732'
				);
				
				$this->load->library('upload', $config);
				
				if ( ! $this->upload->do_upload('event_image'))
				{
					$error = $this->upload->display_errors();
					var_dump($error);
					die();
				}
				else
				{
					$new_event_image = $this->upload->data('file_name');
				}
			}

			if($upload_logo_image)
			{
				$config = array(
					'upload_path'	=> './assets/img/event/logo/',
					'allowed_types'	=> 'gif|jpg|png',
					'max_size'		=> '2048',
					'max_width'		=> '1732',
					'max_height'	=> '1732'
				);
				
				$this->load->library('upload', $config);
				
				if ( ! $this->upload->do_upload('logo_image'))
				{
					$error = $this->upload->display_errors();
					var_dump($error);
					die();
				}
				else
				{
					$new_logo_image = $this->upload->data('file_name');
				}
			}

			$data = array(
				'id_event'				=> $this->User_model->id_event(),
				'id_meta'				=> $id_meta,
				'event_image'			=> $new_event_image,
				'logo_event'			=> $new_logo_image,
				'nama_acara'			=> $nama_acara,
				'penyelenggara'			=> $penyelenggara,
				'deskripsi_acara'		=> $deskripsi_acara,
				'mulai_acara'			=> $satukan1,
				'akhir_acara'			=> $satukan2,
				'waktu_mulai_acara'		=> $waktu_mulai_acara,
				'waktu_akhir_acara'		=> $waktu_akhir_acara,
				'nama_lokasi'			=> $nama_lokasi,
				'lat'					=> $lat,
				'lng'					=> $lng,
				'nama_biaya'			=> $nama_biaya,
				'jumlah_tiket'			=> $jumlah_tiket,
				'biaya'					=> $biaya_new,
				'mulai_penjualan'		=> $satukan3,
				'akhir_penjualan'		=> $satukan4,
				'waktu_mulai_penjualan'	=> $waktu_mulai_penjualan,
				'waktu_akhir_penjualan'	=> $waktu_akhir_penjualan
			);
			$this->db->insert('event',$data);

			$this->session->set_flashdata('info_dasar','<div class="alert alert-success alert-dismissible" role="alert">Data Berhasil Diubah<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
			redirect('pengguna/event-saya');
		}
	}

	public function event_saya()
	{
		$data['title'] = 'Halaman Event Saya';
		$this->template->template_utama('pengguna/v_event_saya', $data);
	}

	public function unggah_artikel()
	{
		$data['title'] = 'Halaman Upload Artikel Tutorial';

		$this->form_validation->set_rules('judul_artikel', 'Judul Artikel', 'required');

		if ($this->form_validation->run() == false)
		{
			$this->template->template_utama('pengguna/v_unggah_artikel', $data);
		}
		else
		{
			$id_meta				= $this->session->userdata('id_meta');
			$upload_artikel_image	= $_FILES['artikel_image']['name'];
			$judul_artikel			= $this->input->post('judul_artikel');
			$deskripsi_artikel		= $this->input->post('deskripsi_artikel');

			if($upload_artikel_image)
			{
				$config = array(
					'upload_path'	=> './assets/img/artikel/sampul/',
					'allowed_types'	=> 'gif|jpg|png',
					'max_size'		=> '2048',
					'max_width'		=> '1732',
					'max_height'	=> '1732'
				);
				
				$this->load->library('upload', $config);
				
				if ( ! $this->upload->do_upload('artikel_image'))
				{
					$error = $this->upload->display_errors();
					var_dump($error);
					die();
				}
				else
				{
					$new_artikel_image = $this->upload->data('file_name');
				}
			}

			$data = array(
				'id_artikel'			=> $this->User_model->id_artikel(),
				'id_meta'				=> $id_meta,
				'gambar_artikel'		=> $new_artikel_image,
				'judul_artikel'			=> $judul_artikel,
				'deskripsi_artikel'		=> $deskripsi_artikel,
				'tgl_posting_artikel'	=> time()
			);
			$this->db->insert('tutorial_artikel',$data);

			$this->session->set_flashdata('info_dasar','<div class="alert alert-success alert-dismissible" role="alert">Data Berhasil Diubah<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
			redirect('pengguna/artikel-saya');

		}
	}

	public function hapus_event()
	{
		$data = $this->uri->segment(3);
		$this->db->where('id_event', $data);
		$this->db->delete('event');
		redirect('pengguna/event-saya');
	}

	public function update_artikel()
	{
		$segment = $this->uri->segment(3);
		$data = [
			'artikel'	=> $this->db->get_where('tutorial_artikel', ['id_meta' => $this->session->userdata('id_meta')])->row_array(),
			'user'		=> $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array(),
			'title'		=> 'Halaman Update Artikel'
		];
		$this->form_validation->set_rules('password_lama', 'Password Lama', 'trim|required');
		$this->form_validation->set_rules('password_baru1', 'Password Baru', 'trim|required|min_length[6]|matches[password_baru2]');
		$this->form_validation->set_rules('password_baru2', 'Konfirmasi Password Baru', 'trim|required|matches[password_baru1]');
		if ($this->form_validation->run() == false)
		{
			$this->template->template_utama('pengguna/v_update_artikel', $data);
		}
		else
		{
			$password_lama = $this->input->post('password_lama');
			$password_baru = $this->input->post('password_baru1');
			if (password_verify($password_lama, $data['user']['password']))
			{
				if ($password_lama == $password_baru)
				{
					$this->session->set_flashdata('password_sudah_pernah','<div class="alert alert-danger alert-dismissible" role="alert">Anda sudah pernah menggunakan password tersebut<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
					redirect('pengguna/ubah-password');
				}
				else
				{
					$password_hash = password_hash($password_baru, PASSWORD_DEFAULT);
					$this->db->set('password', $password_hash);
					$this->db->where('email', $this->session->userdata('email'));
					$this->db->update('user');
					$this->session->set_flashdata('ganti_password_berhasil','<div class="alert alert-success alert-dismissible" role="alert">Password Berhasil di Ganti<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
					redirect('pengguna/ubah-password');
				}
			}
			else
			{
				$this->session->set_flashdata('password_lama_salah','<div class="alert alert-danger alert-dismissible" role="alert">Password Lama Salah<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
				redirect('pengguna/ubah-password');
			}
		}
	}

	public function artikel_saya()
	{
		$data['title'] = 'Halaman Artikel Saya';
		$this->template->template_utama('pengguna/v_artikel_saya', $data);
	}

	public function hapus_artikel()
	{
		$data = $this->uri->segment(3);
		$this->db->where('id_artikel', $data);
		$this->db->delete('tutorial_artikel');
		$this->db->where('id_artikel', $data);
		$this->db->delete('alat_bahan_artikel');
		$this->db->where('id_artikel', $data);
		$this->db->delete('langkah_artikel');
		redirect('pengguna/artikel-saya');
	}

	public function unggah_video()
	{
		$data = [
			'data_user'	=> $this->db->get_where('meta_user', ['id_meta' => $this->session->userdata('id_meta')])->row_array(),
			'user'		=> $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array(),
			'title'		=> 'Halaman Unggah Video'
		];
		$this->template->template_utama('pengguna/v_unggah_video', $data);
	}

	public function upload_video()
	{
		if($_SERVER['REQUEST_METHOD']=='POST')
		{
			$f_du			= $this->input->post('f_du');
			
			if($f_du>60)
			{
				$this->session->set_flashdata('status_upload','<div class="alert alert-danger alert-dismissible" role="alert">Video lebih dari 20 detik!<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
			}
			else
			{
			$upload_video = $_FILES['video']['name'];
			if($upload_video)
			{
				
				$video = "video_".time();
				$config = array(
					'upload_path'	=> './assets/video/pengguna/',
					'allowed_types' => 'mp4|3gp|flv|webm',
					'file_name' => $video
				);
				
				$this->load->library('upload', $config);
				
				if ( ! $this->upload->do_upload('video'))
				{
					$error = $this->upload->display_errors();
					var_dump($error);
					die();
				}
				else
				{
					$new_video = $this->upload->data('file_name');
				}
				$data = array(
					'id_meta'				=> $this->session->userdata('id_meta'),
					'upload_video'		=> $new_video,
					'tgl_upload_video'	=> time()
				);
				$this->db->insert('tutorial_video',$data);
				$this->session->set_flashdata('status_upload','<div class="alert alert-success alert-dismissible" role="alert">Data Berhasil Diunggah<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
			}
		}
	}	
	}

	public function video_saya()
	{
		$data['title'] = 'Halaman Video Saya';
		$this->template->template_utama('pengguna/v_video_saya', $data);
	}

	public function my_event()
	{
		$data['title'] = 'My Event';
		$this->template->template_pengunjung('pengguna/v_my_event', $data);
	}

	public function upload_artikel()
	{
		$data['title'] = 'Upload Artikel';
		$this->template->template_pengunjung('pengguna/v_upload_artikel', $data);
	}

	function peta()
	{
		$this->load->library('googlemaps');
		$coords = $this->User_model->get_coordinates();
		$config = [
			'center'		=> "-6.192262, 106.886656",
			'zoom'			=>	17,
			'map_height'	=> "400px"
		];
		$this->googlemaps->initialize($config);
		foreach ($coords as $coordinate)
		{
			$marker['position'] = $coordinate->lat.','.$coordinate->lng;
			$this->googlemaps->add_marker($marker);
		}
		$data = [
			'map'	=> $this->googlemaps->create_map(),
			'title'	=> 'Kontak'
		];
		$this->load->view('pengguna/v_map', $data);
	}

}