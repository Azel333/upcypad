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
		 *
		 */
		$data['headernya'] = $this->_ci->load->view('template/navigasi/navigasi_pengunjung', $data, TRUE);
		$data['content'] = $this->_ci->load->view($content, $data, TRUE);

		$this->_ci->load->view('template/header/header_utama', $data);
		$this->_ci->load->view('template/body/body_utama', $data);
		$this->_ci->load->view('template/footer/footer_utama');
	}

	function template_auth_admin($content, $data = NULL)
	{
		/*
		 * $data['headernya'] , $data['contentnya'] , $data['footernya']
		 * variabel diatas ^ nantinya akan dikirim ke file views/template/index.php
		 *
		 */
		$data['headernya'] = $this->_ci->load->view('template/navigasi/navigasi_auth_admin', $data, TRUE);
		$data['content'] = $this->_ci->load->view($content, $data, TRUE);

		$this->_ci->load->view('template/header/header_utama', $data);
		$this->_ci->load->view('template/body/body_utama', $data);
		$this->_ci->load->view('template/footer/footer_utama');
	}

	function template_admin($content, $data = NULL)
	{
		/*
		 * $data['headernya'] , $data['contentnya'] , $data['footernya']
		 * variabel diatas ^ nantinya akan dikirim ke file views/template/index.php
		 *
		 */
		$data['headernya']	= $this->_ci->load->view('template/navigasi/navigasi_admin', $data, TRUE);
		$data['content']	= $this->_ci->load->view($content, $data, TRUE);

		$this->_ci->load->view('template/header/header_utama', $data);
		$this->_ci->load->view('template/body/body_utama', $data);
		$this->_ci->load->view('template/footer/footer_utama');
	}

	function template_utama($content, $data = NULL)
	{
		/*
		 * $data['headernya'] , $data['contentnya'] , $data['footernya']
		 * variabel diatas ^ nantinya akan dikirim ke file views/template/index.php
		 *
		 */
		$data['headernya']	= $this->_ci->load->view('template/navigasi/navigasi_utama', $data, TRUE);
		$data['content']	= $this->_ci->load->view($content, $data, TRUE);

		$this->_ci->load->view('template/header/header_utama', $data);
		$this->_ci->load->view('template/body/body_utama', $data);
		$this->_ci->load->view('template/footer/footer_utama');
	}

	function template_pengguna($content, $data = NULL)
	{
		/*
		 * $data['headernya'] , $data['contentnya'] , $data['footernya']
		 * variabel diatas ^ nantinya akan dikirim ke file views/template/index.php
		 *
		 */
		$data['headernya'] = $this->_ci->load->view('template/navigasi/navigasi_utama', $data, TRUE);
		$data['tentangnya'] = $this->_ci->load->view('template/navigasi/navigasi_tentang', $data, TRUE);
		$data['content'] = $this->_ci->load->view($content, $data, TRUE);

		$this->_ci->load->view('template/header/header_utama', $data);
		$this->_ci->load->view('template/body/body_pengguna', $data);
		$this->_ci->load->view('template/footer/footer_utama');
	}

	function template_admin_mdb($content, $data = NULL)
	{
		/*
		 * $data['headernya'] , $data['contentnya'] , $data['footernya']
		 * variabel diatas ^ nantinya akan dikirim ke file views/template/index.php
		 *
		 */
		// $data['headernya']	= $this->_ci->load->view('template/navigasi/navigasi_admin', $data, TRUE);
		$data['headernya']	= $this->_ci->load->view('template/navigasi/navigasi_admin_mdb', $data, TRUE);
		$data['content']	= $this->_ci->load->view($content, $data, TRUE);

		$this->_ci->load->view('template/header/header_utama_mdb', $data);
		$this->_ci->load->view('template/body/body_utama_mdb', $data);
		$this->_ci->load->view('template/footer/footer_utama_mdb');
	}

	function template_admin_mdb_login($content, $data = NULL)
	{
		/*
		 * $data['headernya'] , $data['contentnya'] , $data['footernya']
		 * variabel diatas ^ nantinya akan dikirim ke file views/template/index.php
		 *
		 */
		// $data['headernya']	= $this->_ci->load->view('template/navigasi/navigasi_admin', $data, TRUE);
		$data['headernya']	= $this->_ci->load->view('template/navigasi/navigasi_admin_mdb_login', $data, TRUE);
		$data['content']	= $this->_ci->load->view($content, $data, TRUE);

		$this->_ci->load->view('template/header/header_utama_mdb_login', $data);
		$this->_ci->load->view('template/body/body_utama_mdb', $data);
		$this->_ci->load->view('template/footer/footer_utama_mdb');
	}

	function template_pendaftaran($content, $data = NULL)
	{
		/*
		 * $data['headernya'] , $data['contentnya'] , $data['footernya']
		 * variabel diatas ^ nantinya akan dikirim ke file views/template/index.php
		 *
		 */
		// $data['headernya']	= $this->_ci->load->view('template/navigasi/navigasi_admin', $data, TRUE);
		$data['content']	= $this->_ci->load->view($content, $data, TRUE);

		$this->_ci->load->view('template/header/header_utama_mdb_login', $data);
		$this->_ci->load->view('template/body/body_pendaftaran', $data);
		$this->_ci->load->view('template/footer/footer_utama_mdb');
	}

}

/* End of file template.php */
/* Location: ./application/libraries/template.php */
