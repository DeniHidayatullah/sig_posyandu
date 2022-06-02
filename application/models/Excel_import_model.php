<?php
class Excel_import_model extends CI_Model
{
	function select()
	{
		$this->db->order_by('id_gtk', 'ASC');
		$query = $this->db->get('gtk');
		return $query;
	}
	function insert($data)
	{
		$this->db->insert_batch('tb_gtk', $data);
	}
	function gtk()
	{
		return $this->db->get('tb_gtk');
	}

	function insertsiswa($data)
	{
		$this->db->insert_batch('tb_siswa', $data);
	}
	function insertayah($data)
	{
		$this->db->insert_batch('tb_ayah', $data);
	}
	function insertibu($data)
	{
		$this->db->insert_batch('tb_ibu', $data);
	}
	function insertalamatortu($data)
	{
		$this->db->insert_batch('tb_alamat_ortu', $data);
	}
	function insertalamatwali($data)
	{
		$this->db->insert_batch('tb_alamat_wali', $data);
	}
	function insertwali($data)
	{
		$this->db->insert_batch('tb_wali', $data);
	}
	function insertrelasisiswa($data)
	{
		$this->db->insert_batch('tb_relasi_siswa', $data);
	}
}
