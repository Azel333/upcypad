<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		is_logged_in();
		$this->load->library('template');
	}

	public function index()
	{
		if($this->session->userdata('status') == 'Administrator')
		{
			$data = [
				'admin'	=> $this->db->get_where('admin', ['username' => $this->session->userdata('username')])->row_array()
			];
			$this->template->template_admin_mdb('admin/v_dashboard', $data);
		}
		else
		{
			redirect('auth');
		}
		
	}

	public function role()
	{
		$data = [
			'title' => 'Role',
			'admin'	=> $this->db->get_where('admin', ['username' => $this->session->userdata('username')])->row_array(),
			'role'	=> $this->db->get('user_role')->result_array()
		];
		$this->template->template_admin_mdb('admin/v_role', $data);
	}

	public function roleAccess($role_id)
	{
		$data = [
			'title' => 'Role Access',
			'admin'	=> $this->db->get_where('admin', ['username' => $this->session->userdata('username')])->row_array(),
			'role'	=> $this->db->get_where('user_role',['id' => $role_id])->row_array(),
			'menu' => $this->db->get('user_menu')->result_array()
		];
		$this->db->where('id !=', 1);
		$this->template->template_admin_mdb('admin/v_role_access', $data);
	}

	public function changeAccess()
	{
		$menu_id = $this->input->post('menuId');
		$role_id = $this->input->post('roleId');

		$data = [
			'role_id' => $role_id,
			'menu_id' => $menu_id
		];

		$result = $this->db->get_where('user_access_menu', $data);

		if($result->num_rows() < 1)
		{
			$this->db->insert('user_access_menu', $data);
		}
		else
		{
			$this->db->delete('user_access_menu', $data);
		}

		$this->session->set_flashdata('message','<div class="alert alert-danger" role="alert">Access Changed!!</div>');
	}

	public function role_edit($id)
	{
		$role = $this->input->post('role');
		$this->db->set('role', $role);
		$this->db->where('id', $id);
		$this->db->update('user_role');

		redirect('admin/role');

	}

	public function role_delete($id)
	{
		$this->db->where('id', $id);
		$this->db->delete('user_role');

		redirect('admin/role');
	}

	public function role_add()
	{
		$role = $this->input->post('role');
		$data = [
			'role' => $role
		];
		$this->db->insert('user_role', $data);

		redirect('admin/role');

	}

	public function logout()
	{
		$this->db->set('date_logout', time());
		$this->db->where('email', $this->session->userdata('email'));
		$this->db->update('user');
		
		$data = [ 
			'email'		=> $this->session->userdata('email'),
			'role_id'	=> $this->session->userdata('role_id'),
			'id_meta'	=> $this->session->userdata('id_meta')
		];

		// Unset session
		$this->session->unset_userdata($data);

		// Destroy session
		$this->session->sess_destroy();

		// Recreate session
		session_start();
		$this->session->sess_regenerate(TRUE);

		redirect('admin_login');
	}

}
