<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pendaftaran extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->library('template');
	}

	public function index()
	{	

		$this->form_validation->set_rules('no_hp', 'Nomor Handphone', 'trim|required');

		if ($this->form_validation->run() == false) {
			$this->template->template_pendaftaran('komunitas_programing');
		}else{
			$data = [ 
				'nama'		=>  $this->input->post('nama'),
				'no_hp'		=>  $this->input->post('no_hp'),
				'email'		=>  $this->input->post('email'),
				'jurusan'	=>  $this->input->post('jurusan'),
				'semester'	=>  $this->input->post('semester'),
				'alamat'	=>  $this->input->post('alamat'),
				'kota'		=>  $this->input->post('kota'),
				'kelamin'	=>  $this->input->post('kelamin'),
				'tujuan'	=>  $this->input->post('tujuan'),
				'bagian'	=>  $this->input->post('bagian'),
				'minat'		=>  $this->input->post('minat'),
				'bahasa_program'	=>  $this->input->post('bahasa_program'),
				'harapan'		=>  $this->input->post('harapan'),
				'saran'	=>  $this->input->post('saran'),
				'kas'	=>  $this->input->post('kas')
				];

			$email = $this->input->post('email');
			$num = $this->db->get_where('pendaftaran',['email'=>$email])->num_rows();
			if ($num>0) {
				redirect('pendaftaran/list_data');
			}else{
				$this->db->insert('pendaftaran',$data);
				redirect('pendaftaran/konfirmasi');
			}

			
		}
	}

	public function konfirmasi()
	{	
		$this->template->template_pendaftaran('konfirmasi');
	}


	public function list_data()
	{	
		$this->template->template_pendaftaran('list_data');
	}
}
