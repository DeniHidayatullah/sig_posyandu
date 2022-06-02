<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->library('form_validation');
		$this->load->library('upload');
		$this->load->helper(array('form', 'url'));
	}

	public function index()
	{
		if ($this->session->userdata('status') == 'login') {
			if ($this->session->userdata('role') == 'user') {
				echo "<script>
                alert('Anda sudah login sebagai User');
                window.location.href = '" . base_url('User') . "';
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
		$this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
		$this->form_validation->set_rules('password', 'Password', 'trim|required');

		if ($this->form_validation->run() == false) {
			$data['title'] = 'Login Page';
			$this->load->view('auth/authentication-login');
		} else {
			// validasinya success
			$this->login();
		}
	}

	public function register()
	{
		if ($this->session->userdata('status') == 'login') {
			if ($this->session->userdata('role') == 'user') {
				echo "<script>
                alert('Anda sudah login sebagai User');
                window.location.href = '" . base_url('User') . "';
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
		$data['title'] = 'Register Page';
		$this->load->view('auth/authentication-register');
	}


	public function login()
	{

		$email = $this->input->post('email');
		$password = $this->input->post('password');

		$user = $this->db->get_where('user', ['email' => $email])->row_array();
		// jika usernya ada
		if ($user) {
			// jika usernya aktif
			if ($user['is_active'] == 1) {
				// cek password
				if (password_verify($password, $user['password'])) {
					$data = [
						'email' => $user['email'],
						'role' => $user['role']
					];
					$this->session->set_userdata($data);
					if ($user['role'] == 'user') {
						$data_session = array(
							'iduser' => $user['id'],
							'email' => $user['email'],
							'nama' => $user['nama'],
							'role' => $user['role'],
							'status' => 'login'
						);
						$this->session->set_userdata($data_session);
						redirect('User');
					} else if ($user['role'] == 'bidan') {
						$data_session = array(
							'iduser' => $user['id'],
							'email' => $user['email'],
							'nama' => $user['nama'],
							'role' => $user['role'],
							'status' => 'login'
						);
						$this->session->set_userdata($data_session);
						redirect('Bidan');
					} else {
						$data_session = array(
							'iduser' => $user['id'],
							'email' => $user['email'],
							'nama' => $user['nama'],
							'role' => $user['role'],
							'status' => 'login'
						);
						$this->session->set_userdata($data_session);
						redirect('Admin');
					}
				} else {
					$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Wrong password!</div>');
					redirect('auth');
				}
			} else {
				$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">This email has not been activated!</div>');
				redirect('auth');
			}
		} else {
			$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Email is not registered!</div>');
			redirect('auth');
		}
	}


	public function registration()
	{
		if ($this->session->userdata('email')) {
			redirect('user');
		 }
		$this->form_validation->set_rules('nama', 'Nama', 'required|trim');
		$this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email|is_unique[user.email]', [
			'is_unique' => 'Email Sudah Digunakan'
		]);
		$this->form_validation->set_rules('password1', 'Password', 'required|trim|min_length[3]|matches[password2]', [
			'matches' => 'Password dont match!',
			'min_length' => 'Password too short!'
		]);
		$this->form_validation->set_rules('password2', 'Password', 'required|trim|matches[password1]');
		$this->form_validation->set_rules('alamat', 'Alamat', 'required|trim');
		 var_dump($this->form_validation->run());


		if ($this->form_validation->run() == false) {
			$data['title'] = 'Registration';
			$this->load->view('auth/authentication-register', $data);
		} else {
			$email = $this->input->post('email', true);
			$username = $this->input->post('nama', true);
			$data = [
				'nama' => htmlspecialchars($this->input->post('nama', true)),
				'username' => htmlspecialchars($username),
				'email' => htmlspecialchars($email),
				'password' => password_hash($this->input->post('password1'), PASSWORD_DEFAULT),
				'alamat' => $this->input->post('alamat', true),
				'foto_ktp' => $this->_uploadImage(),
				'longitude' => $this->input->post('longitude'),
				'latitude' => $this->input->post('latitude'),
				'is_active' => 0,
				'role' => 'user'
			];
			$this->db->insert('user', $data);
			$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Congratulation! your account has been created. Please activate your account</div>');
			redirect('Auth');
		}
	}

	private function _uploadImage()
	{
		$config['upload_path']          =  './assets/ktp';
		$config['allowed_types']        = 'jpeg|jpg|png|JPG';
		$config['max_size']             = 9048;
		$config['overwrite']            = true;
		$config['file_name']            = $_FILES['foto_ktp']['name'];
		$this->upload->initialize($config);
		$this->load->library('upload', $config);

		if ($this->upload->do_upload('foto_ktp')) {
			return $this->upload->data("file_name");
		}
		return "default.png";
	}


	private function _sendEmail($token, $type)
	{
		$config = [
			'protocol'  => 'smtp',
			'smtp_host' => 'ssl://smtp.googlemail.com',
			'smtp_user' => 'wpunpas@gmail.com',
			'smtp_pass' => '1234567890',
			'smtp_port' => 465,
			'mailtype'  => 'html',
			'charset'   => 'utf-8',
			'newline'   => "\r\n"
		];

		$this->email->initialize($config);

		$this->email->from('wpunpas@gmail.com', 'Web Programming UNPAS');
		$this->email->to($this->input->post('email'));

		if ($type == 'verify') {
			$this->email->subject('Account Verification');
			$this->email->message('Click this link to verify you account : <a href="' . base_url() . 'auth/verify?email=' . $this->input->post('email') . '&token=' . urlencode($token) . '">Activate</a>');
		} else if ($type == 'forgot') {
			$this->email->subject('Reset Password');
			$this->email->message('Click this link to reset your password : <a href="' . base_url() . 'auth/resetpassword?email=' . $this->input->post('email') . '&token=' . urlencode($token) . '">Reset Password</a>');
		}

		if ($this->email->send()) {
			return true;
		} else {
			echo $this->email->print_debugger();
			die;
		}
	}


	public function verify()
	{
		$email = $this->input->get('email');
		$token = $this->input->get('token');

		$user = $this->db->get_where('user', ['email' => $email])->row_array();

		if ($user) {
			$user_token = $this->db->get_where('user_token', ['token' => $token])->row_array();

			if ($user_token) {
				if (time() - $user_token['date_created'] < (60 * 60 * 24)) {
					$this->db->set('is_active', 1);
					$this->db->where('email', $email);
					$this->db->update('user');

					$this->db->delete('user_token', ['email' => $email]);

					$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">' . $email . ' has been activated! Please login.</div>');
					redirect('auth');
				} else {
					$this->db->delete('user', ['email' => $email]);
					$this->db->delete('user_token', ['email' => $email]);

					$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Account activation failed! Token expired.</div>');
					redirect('auth');
				}
			} else {
				$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Account activation failed! Wrong token.</div>');
				redirect('auth');
			}
		} else {
			$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Account activation failed! Wrong email.</div>');
			redirect('auth');
		}
	}


	public function logout()
	{
		$this->session->unset_userdata('username');
		$this->session->unset_userdata('jabatan');

		$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">You have been logged out!</div>');
		redirect('auth');
	}


	public function blocked()
	{
		$this->load->view('auth/blocked');
	}


	public function forgotPassword()
	{
		$this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');

		if ($this->form_validation->run() == false) {
			$data['title'] = 'Forgot Password';
			$this->load->view('templates/auth_header', $data);
			$this->load->view('auth/forgot-password');
			$this->load->view('templates/auth_footer');
		} else {
			$email = $this->input->post('email');
			$user = $this->db->get_where('user', ['email' => $email, 'is_active' => 1])->row_array();

			if ($user) {
				$token = base64_encode(random_bytes(32));
				$user_token = [
					'email' => $email,
					'token' => $token,
					'date_created' => time()
				];

				$this->db->insert('user_token', $user_token);
				$this->_sendEmail($token, 'forgot');

				$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Please check your email to reset your password!</div>');
				redirect('auth/forgotpassword');
			} else {
				$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Email is not registered or activated!</div>');
				redirect('auth/forgotpassword');
			}
		}
	}


	public function resetPassword()
	{
		$email = $this->input->get('email');
		$token = $this->input->get('token');

		$user = $this->db->get_where('user', ['email' => $email])->row_array();

		if ($user) {
			$user_token = $this->db->get_where('user_token', ['token' => $token])->row_array();

			if ($user_token) {
				$this->session->set_userdata('reset_email', $email);
				$this->changePassword();
			} else {
				$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Reset password failed! Wrong token.</div>');
				redirect('auth');
			}
		} else {
			$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Reset password failed! Wrong email.</div>');
			redirect('auth');
		}
	}


	public function changePassword()
	{
		if (!$this->session->userdata('reset_email')) {
			redirect('auth');
		}

		$this->form_validation->set_rules('password1', 'Password', 'trim|required|min_length[3]|matches[password2]');
		$this->form_validation->set_rules('password2', 'Repeat Password', 'trim|required|min_length[3]|matches[password1]');

		if ($this->form_validation->run() == false) {
			$data['title'] = 'Change Password';
			$this->load->view('templates/auth_header', $data);
			$this->load->view('auth/change-password');
			$this->load->view('templates/auth_footer');
		} else {
			$password = password_hash($this->input->post('password1'), PASSWORD_DEFAULT);
			$email = $this->session->userdata('reset_email');

			$this->db->set('password', $password);
			$this->db->where('email', $email);
			$this->db->update('user');

			$this->session->unset_userdata('reset_email');

			$this->db->delete('user_token', ['email' => $email]);

			$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Password has been changed! Please login.</div>');
			redirect('auth');
		}
	}
}
