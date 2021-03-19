<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User_model extends CI_Model
{

	function id_artikel()
	{
		$this->db->select('id_artikel');
		$this->db->order_by('id_artikel','DESC');
		$query = $this->db->get('tutorial_artikel');
		if ($query->num_rows()<>0)
		{
			$data=$query->row();
			$kode=intval($data->id_artikel)+1;
		}
		else
		{
			$kode=1;
		}
		return $kode;
	}

	function id_event()
	{
		$this->db->select('id_event');
		$this->db->order_by('id_event','DESC');
		$query = $this->db->get('event');
		if ($query->num_rows()<>0)
		{
			$data=$query->row();
			$kode=intval($data->id_event)+1;
		}
		else
		{
			$kode=1;
		}
		return $kode;
	}

	public function event()
	{
		return $this->db->get('event');
	}

	function diikuti()
	{
		return $this->db->get('meta_user');
	}

}

/* End of file user_model.php */
/* Location: ./application/models/user_model.php */