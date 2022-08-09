<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
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

    public function jadwalimunisasi()
    {
        
        // $data['jarak'] = $this->M_map->get_all_jarak();
        // $data['kecamatan'] = $this->M_map->get_all_kecamatan();
        $tglsekarang    =date("Y-m-d");
        $data['jadwalimunisasi'] = $this->M_map->get_all_jadwal($tglsekarang );
        // var_dump($data);
        // die;
        
        // $data['jadwalimunisasi'] = $this->db->query("SELECT a.id as idjadwal, c.id as iduser, a.id as id, d.id as idposyandu, e.id as idjenisimunisasi, a.* , c.*, d.*, e.* FROM jadwal_imunisasi a join user c on a.id_bidan=c.id join posyandu d on a.id_posyandu=d.id join jenis_imunisasi e on a.id_jenis_imunisasi=e.id WHERE a.tgl_imunisasi=$tglsekarang")->row();
        
        $data['titik'] = $this->M_map->get_all_data();
        $data['rute'] = $this->db->query("SELECT b.latitude as latawal, b.longitude as longawal , c.latitude as lattujuan, c.longitude as longtujuan , a.* FROM rute a JOIN titik_simpul b ON a.id_titik_awal=b.id JOIN titik_simpul c ON a.id_titik_tujuan=c.id ")->result();
        $this->load->view('User/jadwalimunisasi',$data);
    }

    public function rute()
    {
        
        $data['rutedjikstra'] = $this->M_map->get_all_rutedjikstra();
        $data['titikdjikstra'] = $this->M_map->get_all_titik();
        $data['titik'] = $this->M_map->get_all_data();
        $data['rute'] = $this->db->query("SELECT b.latitude as latawal, b.longitude as longawal , c.latitude as lattujuan, c.longitude as longtujuan , a.* FROM rute a JOIN titik_simpul b ON a.id_titik_awal=b.id JOIN titik_simpul c ON a.id_titik_tujuan=c.id ")->result();
        // $data['ke'] = $this->input->post('ke');
        // $data['dari'] = $this->input->post('dari');
        $this->load->view('User/rute',$data);
    }

    public function lokasi_anda()
    {
        $id = $this->session->userdata('iduser');
        $this->M_map->lokasi_user($id);
    }

	
    
}