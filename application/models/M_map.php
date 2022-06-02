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
}