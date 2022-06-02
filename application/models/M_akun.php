<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_akun extends CI_Model
{

    private $_table = 'users';
    public $id_login;
    public $id_gtk;
    public $username;
    public $password;
    public $no_wa;
    public $jabatan;
    function __construct()
    {
        parent::__construct();
    }

    public function rules()
    {
        return [
            [
                'field' => 'nama_ayah',
                'label' => 'Name',
                'rules' => 'required'
            ]
        ];
    }


    public function addAkun()
    {
        $post = $this->input->post();
        $this->id_login = $post['id_login'];
        $this->id_gtk = $post['id_gtk'];
        $this->username = $post['username'];
        $this->password = $post['password'];
        $this->no_wa = $post['no_wa'];
        $this->jabatan = $post['jabatan'];
        $this->db->insert($this->_table, $this);
    }
    public function getakun()
    {
        $this->db->select('*');
        $this->db->from('users');
        $this->db->join('tb_gtk', 'tb_gtk.id_gtk =users.id_gtk');
        $this->db->join('jabatan', 'jabatan.id_jabatan=users.jabatan');
        $query = $this->db->get();
        return $query->result();
    }
    public function getjabatan()
    {
        return $this->db->get('jabatan')->result();
    }
    public function getgtk()
    {
        return $this->db->get('tb_gtk')->result();
    }

    public function getAkunSelect($id_gtk)
    {
        $this->db->select('*');
        $this->db->from("users");
        $this->db->where("id_gtk !=", $id_gtk);
        $query = $this->db->get();
        return $query->result();
    }

    function updateAkun($id_login)
    {
        $post = $this->input->post();
        $this->id_login = $post['id_login'];
        $this->id_gtk = $post['id_gtk'];
        $this->username = $post['username'];
        $this->password = $post['password'];
        $this->no_wa = $post['no_wa'];
        $this->jabatan = $post['jabatan'];
        $this->db->update($this->_table, $this, array("id_login" => $id_login));
    }

    function deleteAkun($id_login)
    {
        return $this->db->delete($this->_table, array("id_login" => $id_login));
    }
}
