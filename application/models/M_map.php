<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_map extends CI_Model
{
    public function lokasi_user($id)
    {
        $this->db->select('*');
        $this->db->from('user');
        $this->db->where('id', $id);
        $maps = $this->db->get();

        if($maps->num_rows() > 0) {
            $json['long'] = $maps->longtitude;
            $json['lati'] = $maps->latitude;
        } else {
            $json['status'] = 0;
        }

        echo json_encode($json);
    }
    public function get_all_data()
    {
        $this->db->select('*');
        $this->db->from('titik_simpul');
        return $this->db->get()->result();
    }
    public function get_all_rute()
    {
        $this->db->select('*');
        $this->db->from('rute');
        return $this->db->get()->result();
    }
    public function get_all_rutedjikstra()
    {
        $this->db->select('*');
        $this->db->from('rute');
        return $this->db->get()->result_array();
    }
    public function get_all_titik()
    {
        $this->db->select('*');
        $this->db->from('titik_simpul');
        return $this->db->get()->result_array();
    }

    public function get_all_jadwal($tglsekarang)
    {
        $results = array();
        $this->db->select('a.id as idjadwal, c.id as iduser, a.id as id, d.id as idposyandu, e.id as idjenisimunisasi, a.* , c.*, d.*, e.*');
        $this->db->from('jadwal_imunisasi as a');
        $this->db->join("user as c","a.id_bidan=c.id","left");
        $this->db->join("posyandu as d","id_posyandu=d.id","left");
        $this->db->join("jenis_imunisasi as e","a.id_jenis_imunisasi=e.id","left");
        $this->db->where('a.tgl_imunisasi', $tglsekarang);
        $query = $this->db->get();
        $results = $query->result();
        return $results;
    }
    
}