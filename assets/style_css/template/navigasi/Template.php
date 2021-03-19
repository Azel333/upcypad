<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Template
{
	protected $_ci;

	function __construct()
	{
		$this->_ci = &get_instance();
	}

	function template_pengunjung($content, $data = NULL)
	{
		/*
		 * $data['headernya'] , $data['contentnya'] , $data['footernya']
		 * variabel diatas ^ nantinya akan dikirim ke file views/template/index.php
		 * */
		$data['content'] = $this->_ci->load->view($content, $data, TRUE);

		$this->_ci->load->view('template/header/header_pengunjung', $data);
		$this->_ci->load->view('template/body/body_pengunjung', $data);
		$this->_ci->load->view('template/footer/footer_pengunjung');
	}

	function template_auth($content, $data = NULL)
	{
		/*
		 * $data['headernya'] , $data['contentnya'] , $data['footernya']
		 * variabel diatas ^ nantinya akan dikirim ke file views/template/index.php
		 * */
		$data['content'] = $this->_ci->load->view($content, $data, TRUE);

		$this->_ci->load->view('template/header/header_pengunjung', $data);
		$this->_ci->load->view('template/body/body_auth', $data);
		$this->_ci->load->view('template/footer/footer_pengunjung');
	}

	function template_pengguna($content, $data = NULL)
	{
		/*
		 * $data['headernya'] , $data['contentnya'] , $data['footernya']
		 * variabel diatas ^ nantinya akan dikirim ke file views/template/index.php
		 * */
		$data['content'] = $this->_ci->load->view($content, $data, TRUE);

		$this->_ci->load->view('template/header/header_pengunjung', $data);
		$this->_ci->load->view('template/body/body_pengguna', $data);
		$this->_ci->load->view('template/footer/footer_pengunjung');
	}

}

/* End of file template.php */
/* Location: ./application/libraries/template.php */
