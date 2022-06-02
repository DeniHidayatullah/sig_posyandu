<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        // $this->load->model('M_mapel');
        // $this->load->model('M_peserta_didik');
        // $this->load->model('M_Gtk');
        // $this->load->model('M_rombel');
		$this->load->library('form_validation');
		$this->load->library('upload');
		$this->load->helper(array('form', 'url'));
        $this->load->model('M_map');
		
		if($this->session->userdata('role') == null){
			echo "<script>
			alert('Anda belum login');
			window.location.href = '" . base_url('Auth') . "';
		</script>"; //Url tujuan
		} else if ($this->session->userdata('role') == 'bidan') {
			echo "<script>
			alert('Anda sudah login sebagai Bidan');
			window.location.href = '" . base_url('Bidan') . "';
		</script>"; //U
		} else if ($this->session->userdata('role') == 'admin') {
			echo "<script>
			alert('Anda sudah login sebagai Admin');
			window.location.href = '" . base_url('Admin') . "';
		</script>"; //U
		}
    }

    public function index()
    {
        // $data['count'] = $this->M_peserta_didik->getCountSiswaAktif();
        // $data['countnon'] = $this->M_peserta_didik->getCountSiswaNonAktif();
        // $data['countgtk'] = $this->M_Gtk->getCountGTK();
        // $data['countrombel'] = $this->M_rombel->getCountRombel();

        // $this->load->helper('tgl_indo');
        // $waktu = date('Y-m-d');
        // $data['waktu'] = formatHariTanggal($waktu);
        // $data['jabatan'] = $this->session->userdata('jabatan');
        // $data['count'] = $this->M_peserta_didik->getCountSiswaAktif();
        $this->load->view('User/index');
    }       

    public function v_maps()
    {
        $this->load->view('User/maps');
    }

    public function lokasi_anda()
    {
        $id = $this->session->userdata('iduser');
        $this->M_map->lokasi_user($id);
    }

	
    
}
