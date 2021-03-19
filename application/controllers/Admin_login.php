<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_login extends CI_Controller{
	public function __construct()
	{
		parent::__construct();
		$this->load->library('template');
		$this->load->model('auth_model');
	}

	public function index()
	{
		if($this->session->userdata('username')) {
			redirect('admin');
		} else {
		}
		$this->form_validation->set_rules('username', 'username', 'trim|required');
		$this->form_validation->set_rules('password', 'Password', 'trim|required');
		if ($this->form_validation->run() == FALSE)
		{
			$data['title'] = 'Halaman Masuk';
			$this->template->template_admin_mdb_login('auth/v_masuk_admin',$data);
		}
		else
		{
			$this->_login_admin();
		}
	}

	private function _login_admin()
	{
		$this->load->model('auth_model');
		$this->load->library('template');
		$username		= $this->input->post('username');
		$password		= $this->input->post('password');
		$admin	= $this->db->get_where('admin',['username' => $username])->row_array();

				if ($username != $admin['username']){
					$this->session->set_flashdata('username_salah','<span class="helper-text white-text">Username Salah</span>');
					redirect('admin_login');
				}else{
					if (password_verify($password, $admin['password']))
					{
						$username		= $admin['username'];
						$status			= $admin['status'];
						$role_id		= $admin['role_id'];
						$sesdata		= array(
							'username'	=> $username,
							'status'	=> $status,
							'role_id'	=> $role_id,
							'logged_in' => TRUE
						);
						$this->session->set_userdata($sesdata);
						// access login for admin
							redirect('Admin');
						
					}
					else
					{
						$this->session->set_flashdata('password_salah','<span class="helper-text white-text">Password Salah</span>');
						redirect('admin_login');
					}
				}
			
		
	}

}

/* End of file Admin_login.php */
/* Location: ./application/controllers/Admin_login.php */