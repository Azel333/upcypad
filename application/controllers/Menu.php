<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Menu extends CI_Controller 
{

	public function __construct()
	{
		parent::__construct();

		$this->load->library(array('form_validation','template'));
		$this->load->model('auth_model');		
		is_logged_in();
	}

	public function index()
	{
		$data = [
			'title'	=> 'Menu Management',
			'user'	=> $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array(),
			'menu'	=> $this->db->get('user_menu')->result_array()
		];

		$this->form_validation->set_rules('menu', 'Menu', 'required');

		if ($this->form_validation->run() == false)
		{
			$this->template->template_admin_mdb('admin/v_menu', $data);
		}
		else
		{
			$this->db->insert('user_menu', ['menu' => $this->input->post('menu'), 'icon_menu' => $this->input->post('icon_menu')]);
			$this->session->set_flashdata('message','<div class="alert alert-success" role="alert">New menu added!!</div>');
			redirect('menu');
		}
	}

	public function menu_delete($id)
	{
		$this->db->where('id', $id);
		$this->db->delete('user_menu');

		redirect('menu');
	}

	public function menu_edit($id)
	{
		$menu = $this->input->post('menu');
		$icon_menu = $this->input->post('icon_menu');
		$data = array(
			'menu' => $menu,
			'icon_menu' => $icon_menu
		);

		$this->db->where('id', $id);
		$this->db->update('user_menu', $data);

		redirect('menu');
	}

	public function submenu()
	{
		$this->load->model('Menu_model', 'menu');
		$data = [
			'title'		=> 'Submenu Management',
			'user'		=> $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array(),
			'subMenu'	=> $this->menu->getSubMenu(),
			'menu'		=> $this->db->get('user_menu')->result_array()
		];

		$this->form_validation->set_rules('title', 'Title', 'required');
		$this->form_validation->set_rules('menu_id', 'Menu', 'required');
		$this->form_validation->set_rules('url', 'URL', 'required');
		$this->form_validation->set_rules('icon', 'icon', 'required');

		if($this->form_validation->run() == false)
		{
			$this->template->template_admin_mdb('admin/v_submenu', $data);
		}
		else
		{
			$data = array(
				'title' => $this->input->post('title'),
				'menu_id' => $this->input->post('menu_id'),
				'url' => $this->input->post('url'),
				'icon' => $this->input->post('icon'),
				'is_active' => $this->input->post('is_active')
			);
			$this->db->insert('user_sub_menu', $data);
			$this->session->set_flashdata('message','<div class="alert alert-success" role="alert">New sub menu added!!</div>');
			redirect('menu/submenu');
		}
	}

	public function submenu_delete($id)
	{
		$this->db->where('id', $id);
		$this->db->delete('user_sub_menu');

		redirect('menu/submenu');
	}

	public function submenu_edit($id)
	{
		$menu = $this->input->post('menu');
		$icon_menu = $this->input->post('icon_menu');
		$data = array(
			'title' => $this->input->post('title'),
			'menu_id' => $this->input->post('menu_id'),
			'url' => $this->input->post('url'),
			'icon' => $this->input->post('icon'),
			'is_active' => $this->input->post('is_active')
		);

		$this->db->where('id', $id);
		$this->db->update('user_sub_menu', $data);

		redirect('menu/submenu');

	}

}