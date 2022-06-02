<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Bidan extends CI_Controller
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
		
		if($this->session->userdata('role') == null){
			echo "<script>
			alert('Anda belum login');
			window.location.href = '" . base_url('Auth') . "';
		</script>"; //Url tujuan
		} else if ($this->session->userdata('role') == 'user') {
			echo "<script>
			alert('Anda sudah login sebagai User');
			window.location.href = '" . base_url('User') . "';
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
        $this->load->view('Bidan/index');
    }       

	public function profile(){
		$id = $this->session->userdata('iduser');
		$data['user'] = $this->db->get_where('user', ['id' => $id])->row_array();
		$this->load->view('Bidan/profile',$data);
	}
    
}
