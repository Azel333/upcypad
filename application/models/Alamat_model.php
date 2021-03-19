<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Alamat_model extends CI_Model
{

	function provinsi()
	{
		$this->db->order_by("name", "ASC");
		$query = $this->db->get("provinces");
		return $query->result();
	}

	function regencies($province_id)
	{
		$this->db->where('province_id', $province_id);
		$this->db->order_by('name', 'ASC');
		$query = $this->db->get('regencies');
		$output = '<option value="" selected disabled="">Select Kota</option>';
		foreach($query->result() as $row)
		{
			$output .= '<option value="'.$row->id.'">'.$row->name.'</option>';
		}
		return $output;
	}

	function distrik($regency_id)
	{
		$this->db->where('regency_id', $regency_id);
		$this->db->order_by('name', 'ASC');
		$query = $this->db->get('districts');
		$output = '<option value="" selected disabled="">Select Kecamatan</option>';
		foreach($query->result() as $row)
		{
			$output .= '<option value="'.$row->id.'">'.$row->name.'</option>';
		}
		return $output;
	}

	function villages($district_id)
	{
		$this->db->where('district_id', $district_id);
		$this->db->order_by('name', 'ASC');
		$query = $this->db->get('villages');
		$output = '<option value="" selected disabled="">Select Kelurahan</option>';
		foreach($query->result() as $row)
		{
			$output .= '<option value="'.$row->id.'">'.$row->name.'</option>';
		}
		return $output;
	}

	public function kelurahan()
	{
		$this->db->select('alamat_user.*, villages.id AS kelurahan, villages.name');
		$this->db->join('villages', 'villages.id = alamat_user.kelurahan');
		//$this->db->join('tbl_2', 'tbl_1.id_2 = tbl_2.id');
		$this->db->from('alamat_user');
		$this->db->where('id_meta', $this->session->userdata('id_meta'));
		$query = $this->db->get();
		return $query->result_array();
	}

	public function kecamatan()
	{
		$this->db->select('alamat_user.*, districts.id AS kecamatan, districts.name');
		$this->db->join('districts', 'districts.id = alamat_user.kecamatan');
		//$this->db->join('tbl_2', 'tbl_1.id_2 = tbl_2.id');
		$this->db->from('alamat_user');
		$this->db->where('id_meta', $this->session->userdata('id_meta'));
		$query = $this->db->get();
		return $query->result_array();
	}

	public function kota()
	{
		$this->db->select('alamat_user.*, regencies.id AS kecamatan, regencies.name');
		$this->db->join('regencies', 'regencies.id = alamat_user.kota');
		//$this->db->join('tbl_2', 'tbl_1.id_2 = tbl_2.id');
		$this->db->from('alamat_user');
		$this->db->where('id_meta', $this->session->userdata('id_meta'));
		$query = $this->db->get();
		return $query->result_array();
	}

	public function province()
	{
		$this->db->select('alamat_user.*, provinces.id AS provinsi, provinces.name');
		$this->db->join('provinces', 'provinces.id = alamat_user.provinsi');
		//$this->db->join('tbl_2', 'tbl_1.id_2 = tbl_2.id');
		$this->db->from('alamat_user');
		$this->db->where('id_meta', $this->session->userdata('id_meta'));
		$query = $this->db->get();
		return $query->result_array();
	}

}

/* End of file alamat_model.php */
/* Location: ./application/models/alamat_model.php */