<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
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

		if ($this->session->userdata('role') == null) {
			echo "<script>
			alert('Anda belum login');
			window.location.href = '" . base_url('Auth') . "';
		</script>"; //Url tujuan
		} else if ($this->session->userdata('role') == 'bidan') {
			echo "<script>
			alert('Anda sudah login sebagai Bidan');
			window.location.href = '" . base_url('Bidan') . "';
		</script>"; //U
		} else if ($this->session->userdata('role') == 'user') {
			echo "<script>
			alert('Anda sudah login sebagai User');
			window.location.href = '" . base_url('User') . "';
		</script>"; //U
		}
	}

	public function index()
	{
		// $this->load->helper('tgl_indo');
		// $waktu = date('Y-m-d');
		// $data['waktu'] = formatHariTanggal($waktu);

		$data['jumlahjadwalimunisasi'] = $this->db->query("SELECT count(id) as jumlah FROM jadwal_imunisasi")->row();
		$data['jumlahjenisimunisasi'] = $this->db->query("SELECT count(id) as jumlah FROM jenis_imunisasi")->row();
		$data['jumlahposyandu'] = $this->db->query("SELECT count(id) as jumlah FROM posyandu")->row();
		$data['jumlahbidan'] = $this->db->query("SELECT  count(id) as jumlah FROM user WHERE role='bidan'")->row();
		$this->load->view('Admin/index', $data);
	}

	//Bidan
	public function listBidan()
	{
		$data['bidan'] = $this->db->query("SELECT * FROM user WHERE role='bidan'")->result();
		$this->load->view('Admin/list_bidan', $data);
	}
	public function addBidan()
	{
		$this->load->view('Admin/add_bidan');
	}
	public function addBidanAction()
	{
		$data = [
			'nama' => htmlspecialchars($this->input->post('nama_bidan')),
			// 'username' => htmlspecialchars($this->input->post('username')),
			'email' => htmlspecialchars($this->input->post('email')),
			// 'tgl_lahir' => htmlspecialchars($this->input->post('tgl_lahir')),
			'alamat' => htmlspecialchars($this->input->post('alamat')),
			'no_telp' => htmlspecialchars($this->input->post('no_telp')),
			// 'password' => password_hash($this->input->post('password'), PASSWORD_DEFAULT),
			// 'foto_ktp' => 'default.png',
			// 'longitude' => '-',
			// 'latitude' => '-',
			// 'is_active' => 1,
			'role' => 'bidan'
		];
		$this->db->insert('user', $data);
		redirect('Admin/listBidan');
	}
	public function updateBidan($id)
	{
		$data['bidan'] = $this->db->query("SELECT * FROM user WHERE id=$id AND role='bidan'")->row();
		$this->load->view('Admin/update_bidan', $data);
	}
	public function updateBidanAction()
	{
		$id = $this->input->post('id');
		$data = [
			'nama' => htmlspecialchars($this->input->post('nama_bidan')),
			'email' => htmlspecialchars($this->input->post('email')),
			'alamat' => htmlspecialchars($this->input->post('alamat')),
			'no_telp' => htmlspecialchars($this->input->post('no_telp')),
			'role' => 'bidan'
		];
		$this->db->update('user', $data, array('id' => $id));
		redirect('Admin/listBidan');
	}
	public function deleteBidan()
	{
		$id = $this->uri->segment(3);
		$this->db->delete('user', array('id' => $id));
		redirect('Admin/listBidan');
	}


	//Balita
	public function listBalita()
	{
		$data['balita'] = $this->db->query("SELECT * FROM balita")->result();
		$this->load->view('Admin/list_balita', $data);
	}
	public function addBalita()
	{
		$this->load->view('Admin/add_balita');
	}
	public function addBalitaAction()
	{
		$data = [
			'nama_balita' => htmlspecialchars($this->input->post('nama_balita')),
			'jk_balita' => htmlspecialchars($this->input->post('jk_balita')),
			'tempat_lahir_balita' => htmlspecialchars($this->input->post('tempat_lahir_balita')),
			'tanggal_lahir_balita' => htmlspecialchars($this->input->post('tanggal_lahir_balita')),
			'alamat_balita' => htmlspecialchars($this->input->post('alamat_balita'))
		];
		$this->db->insert('balita', $data);
		redirect('Admin/listBalita');
	}
	public function updateBalita($id)
	{
		$data['balita'] = $this->db->query("SELECT * FROM balita WHERE $id")->row();
		$this->load->view('Admin/update_balita', $data);
	}
	public function updateBalitaAction()
	{
		$id = $this->input->post('id');
		$data = [
			'nama_balita' => htmlspecialchars($this->input->post('nama_balita')),
			'jk_balita' => htmlspecialchars($this->input->post('jk_balita')),
			'tempat_lahir_balita' => htmlspecialchars($this->input->post('tempat_lahir_balita')),
			'tanggal_lahir_balita' => htmlspecialchars($this->input->post('tanggal_lahir_balita')),
			'alamat_balita' => htmlspecialchars($this->input->post('alamat_balita'))
		];
		$this->db->update('balita', $data, array('id' => $id));
		redirect('Admin/listBalita');
	}

	public function deleteBalita()
	{
		$id = $this->uri->segment(3);
		$this->db->delete('balita', array('id' => $id));
		redirect('Admin/listBalita');
	}

	//Posyandu
	public function listPosyandu()
	{
		$data['posyandu'] = $this->db->query("SELECT * FROM posyandu")->result();
		$this->load->view('Admin/list_posyandu', $data);
	}
	public function addPosyandu()
	{
		$this->load->view('Admin/add_posyandu');
	}
	public function addPosyanduAction()
	{
		$data = [
			'nama_posyandu' => htmlspecialchars($this->input->post('nama_posyandu')),
			'penanggung_jawab' => htmlspecialchars($this->input->post('penanggung_jawab')),
			'alamat_posyandu' => htmlspecialchars($this->input->post('alamat_posyandu')),
			'longitude' => $this->input->post('longitude'),
			'latitude' => $this->input->post('latitude')
		];
		$this->db->insert('posyandu', $data);
		redirect('Admin/listPosyandu');
	}
	public function updatePosyandu($id)
	{
		$data['posyandu'] = $this->db->query("SELECT * FROM posyandu WHERE id=$id")->row();
		$this->load->view('Admin/update_posyandu', $data);
	}
	public function updatePosyanduAction()
	{
		$id = $this->input->post('id');
		$data = [
			'nama_posyandu' => htmlspecialchars($this->input->post('nama_posyandu')),
			'penanggung_jawab' => htmlspecialchars($this->input->post('penanggung_jawab')),
			'longitude' => $this->input->post('longitude'),
			'latitude' => $this->input->post('latitude'),
			'alamat_posyandu' => htmlspecialchars($this->input->post('alamat_posyandu'))
		];
		$this->db->update('posyandu', $data, array('id' => $id));
		redirect('Admin/listPosyandu');
	}
	public function deletePosyandu()
	{
		$id = $this->uri->segment(3);
		$this->db->delete('posyandu', array('id' => $id));
		redirect('Admin/listPosyandu');
	}

	//Jenis Imunisasi
	public function listJenisImunisasi()
	{
		$data['jenisimunisasi'] = $this->db->query("SELECT * FROM jenis_imunisasi")->result();
		$this->load->view('Admin/list_jenisimunisasi', $data);
	}
	public function addJenisImunisasi()
	{
		$this->load->view('Admin/add_jenisimunisasi');
	}
	public function addJenisImunisasiAction()
	{
		$data = [
			'nama_vaksin' => htmlspecialchars($this->input->post('nama_vaksin')),
			'umur' => htmlspecialchars($this->input->post('umur'))
		];
		$this->db->insert('jenis_imunisasi', $data);
		redirect('Admin/listJenisImunisasi');
	}
	public function updateJenisImunisasi($id)
	{
		$data['jenisimunisasi'] = $this->db->query("SELECT * FROM jenis_imunisasi WHERE id=$id")->row();
		$this->load->view('Admin/update_jenisimunisasi', $data);
	}
	public function updateJenisImunisasiAction()
	{
		$id = $this->input->post('id');
		$data = [
			'nama_vaksin' => htmlspecialchars($this->input->post('nama_vaksin')),
			'umur' => htmlspecialchars($this->input->post('umur'))
		];
		$this->db->update('jenis_imunisasi', $data, array('id' => $id));
		redirect('Admin/listJenisImunisasi');
	}
	public function deleteJenisImunisasi()
	{
		$id = $this->uri->segment(3);
		$this->db->delete('jenis_imunisasi', array('id' => $id));
		redirect('Admin/listJenisImunisasi');
	}

	//Imunisasi
	public function listImunisasi()
	{
		$data['imunisasi'] = $this->db->query("SELECT a.id as idimunsasi, a.* ,b.*, c.*, d.*, e.* FROM imunisasi a join balita b on a.id_balita=b.id join user c on a.id_bidan=c.id join posyandu d on a.id_posyandu=d.id join jenis_imunisasi e on a.id_jenis_imunisasi=e.id")->result();
		$this->load->view('Admin/list_imunisasi', $data);
	}
	public function addImunisasi()
	{
		$data['balita'] = $this->db->query("SELECT * FROM balita")->result();
		$data['jenisimunisasi'] = $this->db->query("SELECT * FROM jenis_imunisasi")->result();
		$data['posyandu'] = $this->db->query("SELECT * FROM posyandu")->result();
		$data['bidan'] = $this->db->query("SELECT * FROM user WHERE role='bidan'")->result();
		$this->load->view('Admin/add_imunisasi', $data);
	}
	public function addImunisasiAction()
	{
		$data = [
			'tgl_imunisasi' => htmlspecialchars($this->input->post('tgl_imunisasi')),
			'id_balita' => htmlspecialchars($this->input->post('id_balita')),
			'id_posyandu' => htmlspecialchars($this->input->post('id_posyandu')),
			'id_bidan' => htmlspecialchars($this->input->post('id_bidan')),
			'longitude' => $this->input->post('longitude'),
			'latitude' => $this->input->post('latitude'),
			'id_jenis_imunisasi' => htmlspecialchars($this->input->post('id_jenis_imunisasi'))
		];
		$this->db->insert('imunisasi', $data);
		redirect('Admin/listImunisasi');
	}
	public function updateImunisasi($id)
	{
		$data['imunisasi'] = $this->db->query("SELECT a.id as idimunsasi, b.id as idbalita, c.id as idbidan, d.id as idposyandu, e.id as idjenisimunisasi,  a.* ,b.*, c.*, d.*, e.* 
		FROM imunisasi a join balita b on a.id_balita=b.id join user c on a.id_bidan=c.id join posyandu d on a.id_posyandu=d.id join jenis_imunisasi e on a.id_jenis_imunisasi=e.id  WHERE a.id=$id")->row();
		// $data['imunisasi'] = $this->db->query("SELECT * FROM imunisasi WHERE id=$id")->row();
		// var_dump($data);
		// die;
		$data['balita'] = $this->db->query("SELECT * FROM balita")->result();
		$data['jenisimunisasi'] = $this->db->query("SELECT * FROM jenis_imunisasi")->result();
		$data['posyandu'] = $this->db->query("SELECT * FROM posyandu")->result();
		$data['bidan'] = $this->db->query("SELECT * FROM user WHERE role='bidan'")->result();
		$this->load->view('Admin/update_imunisasi', $data);
	}
	public function updateImunisasiAction()
	{
		$id = $this->input->post('id');
		$data = [
			'tgl_imunisasi' => htmlspecialchars($this->input->post('tgl_imunisasi')),
			'id_balita' => htmlspecialchars($this->input->post('id_balita')),
			'id_posyandu' => htmlspecialchars($this->input->post('id_posyandu')),
			'id_bidan' => htmlspecialchars($this->input->post('id_bidan')),
			'id_jenis_imunisasi' => htmlspecialchars($this->input->post('id_jenis_imunisasi'))
		];
		$this->db->update('imunisasi', $data, array('id' => $id));
		redirect('Admin/listImunisasi');
	}
	public function deleteImunisasi($id)
	{
		$this->db->delete('imunisasi', array('id' => $id));
		redirect('Admin/listImunisasi');
	}

	//JadwalImunisasi
	public function listJadwalImunisasi()
	{
		$data['jadwalimunisasi'] = $this->db->query("SELECT a.id as idjadwal, a.* , c.*, d.*, e.* FROM jadwal_imunisasi a join user c on a.id_bidan=c.id join posyandu d on a.id_posyandu=d.id join jenis_imunisasi e on a.id_jenis_imunisasi=e.id")->result();
		$this->load->view('Admin/list_jadwalimunisasi', $data);
	}
	public function addJadwalImunisasi()
	{
		$data['jenisimunisasi'] = $this->db->query("SELECT * FROM jenis_imunisasi")->result();
		$data['posyandu'] = $this->db->query("SELECT * FROM posyandu")->result();
		$data['bidan'] = $this->db->query("SELECT * FROM user WHERE role='bidan'")->result();
		$this->load->view('Admin/add_jadwalimunisasi', $data);
	}
	public function addJadwalImunisasiAction()
	{
		$data = [
			'tgl_imunisasi' => htmlspecialchars($this->input->post('tgl_imunisasi')),
			'jam' => htmlspecialchars($this->input->post('jam')),
			'id_posyandu' => htmlspecialchars($this->input->post('id_posyandu')),
			'id_bidan' => htmlspecialchars($this->input->post('id_bidan')),
			'id_jenis_imunisasi' => htmlspecialchars($this->input->post('id_jenis_imunisasi'))
		];
		$this->db->insert('jadwal_imunisasi', $data);
		redirect('Admin/listJadwalImunisasi');
	}
	public function updateJadwalImunisasi($id)
	{
		$data['jadwalimunisasi'] = $this->db->query("SELECT a.id as idjadwal, c.id as iduser, a.id as id, d.id as idposyandu, e.id as idjenisimunisasi, a.* , c.*, d.*, e.* FROM jadwal_imunisasi a join user c on a.id_bidan=c.id join posyandu d on a.id_posyandu=d.id join jenis_imunisasi e on a.id_jenis_imunisasi=e.id WHERE a.id=$id")->row();
		$data['jenisimunisasi'] = $this->db->query("SELECT * FROM jenis_imunisasi")->result();
		$data['posyandu'] = $this->db->query("SELECT * FROM posyandu")->result();
		$data['bidan'] = $this->db->query("SELECT * FROM user WHERE role='bidan'")->result();
		$this->load->view('Admin/update_jadwalimunisasi', $data);
	}
	public function updateJadwalImunisasiAction()
	{
		$id = $this->input->post('id');
		$data = [
			'tgl_imunisasi' => htmlspecialchars($this->input->post('tgl_imunisasi')),
			'jam' => htmlspecialchars($this->input->post('jam')),
			'id_posyandu' => htmlspecialchars($this->input->post('id_posyandu')),
			'id_bidan' => htmlspecialchars($this->input->post('id_bidan')),
			'id_jenis_imunisasi' => htmlspecialchars($this->input->post('id_jenis_imunisasi'))
		];
		$this->db->update('jadwal_imunisasi', $data, array('id' => $id));
		redirect('Admin/listJadwalImunisasi');
	}
	public function deleteJadwalImunisasi($id)
	{
		$this->db->delete('jadwal_imunisasi', array('id' => $id));
		redirect('Admin/listJadwalImunisasi');
	}

	public function laporanImunisasi()
	{
		$data['imunisasi'] = $this->db->query("SELECT a.id as idimunsasi, a.* ,b.*, c.*, d.*, e.* FROM imunisasi a join balita b on a.id_balita=b.id join user c on a.id_bidan=c.id join posyandu d on a.id_posyandu=d.id join jenis_imunisasi e on a.id_jenis_imunisasi=e.id")->result();
		$this->load->view('Admin/list_laporanimunisasi', $data);
	}
	public function cetek($id)
	{
		$data['imunisasi'] = $this->db->query("SELECT a.id as idimunsasi, b.id as idbalita, c.id as idbidan, d.id as idposyandu, e.id as idjenisimunisasi,  a.* ,b.*, c.*, d.*, e.* 
		FROM imunisasi a join balita b on a.id_balita=b.id join user c on a.id_bidan=c.id join posyandu d on a.id_posyandu=d.id join jenis_imunisasi e on a.id_jenis_imunisasi=e.id  WHERE a.id=$id")->result();
		// $data['balita'] = $this->db->query("SELECT * FROM balita")->result();
		// $data['jenisimunisasi'] = $this->db->query("SELECT * FROM jenis_imunisasi")->result();
		// $data['posyandu'] = $this->db->query("SELECT * FROM posyandu")->result();
		// $data['bidan'] = $this->db->query("SELECT * FROM user WHERE role='bidan'")->result();
		$this->load->view('Admin/cetaklaporan', $data);
	}

	public function listUser()
	{
		$data['user'] = $this->db->query("SELECT * FROM user WHERE role='user'")->result();
		$this->load->view('Admin/list_user', $data);
	}
	public function deleteUser($id)
	{
		$this->db->delete('user', array('id' => $id));
		redirect('Admin/listUser');
	}
	public function is_active($id)
	{
		$this->db->select('is_active');
		$this->db->set('is_active', 0);
		$this->db->where('id', $id);
		$this->db->update('user');
		redirect('Admin/listUser');
	}
	public function is_deactive($id)
	{
		$this->db->select('is_active');
		$this->db->set('is_active', 1);
		$this->db->where('id', $id);
		$this->db->update('user');
		redirect('Admin/listUser');
	}
}