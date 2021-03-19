<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth_model extends CI_Model
{

	function validate($email)
	{
		$this->db->where("email = '$email' or username = '$email'");
		$result = $this->db->get('user');
		return $result;
	}

	function validate_admin($username)
	{
		$this->db->where('username',$username);
		$result = $this->db->get('admin');
		return $result;
	}

	function id_user()
	{
		$this->db->select('id');
		$this->db->order_by('id','DESC');
		$query = $this->db->get('user');
		if ($query->num_rows()<>0)
		{
			$data=$query->row();
			$kode=intval($data->id)+1;
		}
		else
		{
			$kode=1;
		}
		return $kode;
	}

	function id_meta()
	{
		$this->db->select('id_meta');
		$this->db->order_by('id_meta','DESC');
		$query = $this->db->get('meta_user');
		if ($query->num_rows()<>0)
		{
			$data=$query->row();
			$kode=intval($data->id_meta)+1;
		}
		else
		{
			$kode=1;
		}
		return $kode;
	}

	function id_pesan()
	{
		$this->db->select('id');
		$this->db->order_by('id','DESC');
		$query = $this->db->get('pesan_pengunjung');
		if ($query->num_rows()<>0)
		{
			$data=$query->row();
			$kode=intval($data->id)+1;
		}
		else
		{
			$kode=1;
		}
		return $kode;
	}

}

/* End of file auth_model.php */
/* Location: ./application/models/auth_model.php */