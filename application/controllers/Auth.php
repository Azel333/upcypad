<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->library('template');
		$this->load->model('auth_model');
	}

	public function index()
	{
			if($this->session->userdata('email')) {
				redirect('pengunjung');
			}else if($this->session->userdata('username')) {
				redirect('admin');
			} else {
			}
			$this->form_validation->set_rules('email', 'Email', 'trim|required');
			$this->form_validation->set_rules('password', 'Password', 'trim|required');
			if ($this->form_validation->run() == FALSE)
			{
				$data['title'] = 'Halaman Masuk';
				$this->template->template_pengunjung('auth/v_masuk_user',$data);
			}
			else
			{
				$this->_login();
			}
	}

	private function _login()
	{
		$email	= $this->input->post('email', TRUE);
		$password	= $this->input->post('password');
		$remember 	= $this->input->post('rememberme');
		$user		= $this->auth_model->validate($email)->row_array();

		if ($user)
		{
			//jika user active
			if ($user['is_active'] == 1)
			{
				//jika password benar
				if (password_verify($password, $user['password']))
				{
					$data = [ 
					'email'		=> $user['email'],
					'role_id'	=> $user['role_id'],
					'id_meta'	=> $user['id_meta']
					];
					$this->session->set_userdata($data);
					if ($remember)
					{
						$this->load->helper('cookie');
						$this->session->set_userdata($data);
						//setting cookie
						$cookie=array(
							'name'		=> 'rememberme',
							'value'		=> 'test',
							'expire'	=> 300,
							'secure'	=> TRUE
						);
						set_cookie($cookie);

						get_cookie($remember);					
					}
					if ($user['role_id'] == 2) 
					{
						redirect('pengunjung');
					}
				}
				//jika password salah
				else
				{
					$this->session->set_flashdata('password_salah','<span class="helper-text white-text">Password Salah</span>');
					redirect('auth');
				}
			}
			//jika user tidak aktif
			else
			{
				$this->session->set_flashdata('email_belum_teraktivasi','<span class="helper-text white-text">Email belum Teraktivasi</span>');
				redirect('auth');
			}
		}
		//jika user tidak ada 
		else
		{
			$this->session->set_flashdata('email_salah','<span class="helper-text white-text">Email atau Username Salah</span>');
			redirect('auth');
		}
	}

	public function daftar()
	{
		//jika role_id adalah 2
		if ($this->session->userdata('role_id') == 2)
		{
			//redirect ke user
			redirect('pengguna');
		}
		//jika role_id bukan 2
		else
		{
			//setting validasi
			$this->form_validation->set_rules('username', 'Username', 'trim|required');
			$this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
			$this->form_validation->set_rules('password1', 'Password', 'trim|required|min_length[6]');
			$this->form_validation->set_rules('password2', 'Password', 'trim|required|matches[password1]');
			//jika validasi salah
			if ($this->form_validation->run() == false)
			{
				//tampilkan halaman daftar
				$data['title'] = 'Halaman Daftar';
				$this->template->template_pengunjung('auth/v_daftar',$data);
			}
			//jika validasi benar
			else
			{
				//tangkap inputan
				$email		= $this->input->post('email',TRUE);
				$meta_data	= [
					'id_meta'		=> $this->auth_model->id_meta(),
					'back_image'	=> 'thumb.png'
				];
				$data		= [
					'id'			=> $this->auth_model->id_user(),
					'username'		=> htmlspecialchars($this->input->post('username',TRUE)),
					'email'			=> htmlspecialchars($email),
					'image'			=> 'default.jpg',
					'password'		=> password_hash($this->input->post('password1'), PASSWORD_DEFAULT),
					'role_id'		=> 2,
					'is_active'		=> 0,
					'id_meta'		=> $this->auth_model->id_meta(),
					'date_created'	=> time()
				];

				//input token
				$token		= base64_encode(openssl_random_pseudo_bytes(32));
				$user_token = 
				[
					'email'			=> $email,
					'token'			=> $token,
					'date_created'	=> time()
				];

				//masukan ke database
				$this->db->insert('meta_user', $meta_data);
				$this->db->insert('user', $data);
				$this->db->insert('user_token', $user_token);

				//kirim email melalui fungsi _sendEmail(); dengan argumen verifikasi
				$this->_sendEmail($token, 'verifikasi');
				$this->session->set_flashdata('cek_email','<span class="helper-text white-text">Cek Email Untuk Aktivasi</span>');
				redirect('auth');
			}
		}
	}

	private function _sendEmail($token, $type)
	{
		//setting config SMTP
		$config = array (
		    'protocol'  => 'smtp',
		    'smtp_host' => 'ssl://mail.upcypad.xyz',
		    'smtp_user' => 'upcypad@upcypad.xyz',
		    'smtp_pass' => '@AnimeIsFair123',
		    'smtp_port' => '465',
		    'mailtype'  => 'html',
		    'charset'   => 'utf-8',
		    'newline'   => "\r\n"
		);

		//load library
		$this->load->library('email',$config);
		$this->email->initialize($config);

		//inputan pengiriman
		$this->email->from('upcypad@upcypad.xyz', 'Upcypad');
		$this->email->to($this->input->post('email', TRUE));

		//jika $type adalah verifikasi
		if ($type == 'verifikasi')
		{
			//kirim verifikasi password
			$this->email->subject('Verifikasi Akun');
			$this->email->message('Klik link untuk aktivasi : <a href="' . base_url() . 'auth/verifikasi?email=' . $this->input->post('email', TRUE) . '&token=' . urlencode($token) . '"> Aktivasi</a>');
		}
		//jika $type adalah forgot
		elseif ($type == 'forgot')
		{
			//kirim reset password
			$this->email->subject('Reset Password');
			$this->email->message('Klik link untuk reset password : <a href="' . base_url() . 'auth/reset_password?email=' . $this->input->post('email', TRUE) . '&token=' . urlencode($token) . '"> Reset Password</a>');
		}

		//jika email berhasil dikirim
		if ($this->email->send())
		{
			//kembalikan nilai
			return TRUE;
		}
		//jika email gagal dikirim
		else
		{
			//tampilkan error
			echo $this->email->print_debugger();
			//hentikan program
			die;
		}
	}

	public function verifikasi()
	{
		$email = $this->input->get('email');
		$token = $this->input->get('token');

		$user = $this->db->get_where('user', ['email' => $email])->row_array();
		if ($user)
		{
			$user_token = $this->db->get_where('user_token', ['token' => $token])->row_array();
			if ($user_token)
			{
				if (time() - $user_token['date_created'] < (60*5))
				{
					$this->db->set('is_active', 1);
					$this->db->where('email', $email);
					$this->db->update('user');
					$this->db->delete('user_token', ['email' => $email]);

					$this->session->set_flashdata('aktivasi','<span class="helper-text white-text">'. $email .' diaktivasi. silahkan login</span>');
					redirect('auth');
				}
				else
				{
					$this->db->delete('user', ['email' => $email]);
					$this->db->delete('user_token', ['email' => $email]);
					$this->session->set_flashdata('aktivasi','<span class="helper-text white-text">Token expired</span>');
					redirect('auth');
				}
			}
			else
			{
				$this->session->set_flashdata('token_invalid','<span class="helper-text white-text">Token invalid</span>');
				redirect('auth');
			}
		}
		else
		{
			$this->session->set_flashdata('aktivasi_gagal','<span class="helper-text white-text">Aktivasi gagal! Email Salah</span>');
			redirect('auth');
		}
	}

	public function forgot_password()
	{
		if ($this->session->userdata('role_id') == 2)
		{
			redirect('pengguna');
		}
		else
		{
			$this->form_validation->set_rules('email', 'Email', 'trim|required');
			if ($this->form_validation->run() == false)
			{
				$data['title'] = 'Halaman Lupa Password';
				$this->template->template_pengunjung('auth/v_lupa_password',$data);
			}
			else
			{
				$email = $this->input->post('email', TRUE);
				$user     = $this->auth_model->validate($email)->row_array();

				if ($user)
				{
					if ($user['is_active'] == 1)
					{
						$token      = base64_encode(random_bytes(32));
						$user_token = 
						[
							'email'        => $email,
							'token'        => $token,
							'date_created' => time()
						];

						$this->db->insert('user_token', $user_token);

						//kirim email melalui fungsi _sendEmail(); dengan argumen forgot
						$this->_sendEmail($token, 'forgot');
						$this->session->set_flashdata('cek_reset','<span class="helper-text white-text">Cek Email Untuk Reset Password</span>');
						redirect('auth/forgot_password');
					}
					else
					{
						$this->session->set_flashdata('aktivasi','<span class="helper-text white-text">Cek email dan aktivasi terlebih dahulu</span>');
						redirect('auth/forgot_password');
					}
					
				}
				else
				{
					$this->session->set_flashdata('aktivasi','<span class="helper-text white-text">email tidak terdaftar, silahkan daftar!</span>');
					redirect('auth/forgot_password');
				}
			}
		}
	}

	public function reset_password()
	{
		$email = $this->input->get('email');
		$token = $this->input->get('token');

		$user = $this->db->get_where('user', ['email' => $email])->row_array();
		if ($user)
		{
			$user_token = $this->db->get_where('user_token', ['token' => $token])->row_array();
			if ($user_token)
			{
				if (time() - $user_token['date_created'] < (60*5))
				{
					$this->session->set_userdata('reset_email', $email);
					$this->change_password();
					$this->db->delete('user_token', ['email' => $email]);
				}
				else
				{
					$this->db->delete('user', ['email' => $email]);
					$this->db->delete('user_token', ['email' => $email]);
					$this->session->set_flashdata('aktivasi','<span class="helper-text white-text">Token expired</span>');
					redirect('auth');
				}
			}
			else
			{
				$this->session->set_flashdata('aktivasi','<span class="helper-text white-text">Token invalid</span>');
				redirect('auth');
			}
		}
		else
		{
			$this->session->set_flashdata('aktivasi','<span class="helper-text white-text">Reset gagal gagal! Email Salah</span>');
			redirect('auth');
		}
	}

	public function change_password()
	{
		if (!$this->session->userdata('reset_email'))
		{
			redirect('auth');
		}
		$this->form_validation->set_rules('password_baru1', 'Password', 'trim|required|min_length[6]|matches[password_baru2]');
		$this->form_validation->set_rules('password_baru2', 'Ulangi Password', 'trim|required|matches[password_baru1]');
		if ($this->form_validation->run() == false)
		{
			$data['title'] = 'Halaman Lupa Password';
			$this->template->template_pengunjung('auth/v_ganti_password',$data);
		}
		else
		{
			$password = password_hash($this->input->post('password_baru1'), PASSWORD_DEFAULT);
			$email    = $this->session->userdata('reset_email');

			$this->db->set('password', $password);
			$this->db->where('email', $email);
			$this->db->update('user');

			$this->session->sess_destroy();
			$this->session->set_flashdata('aktivasi','<span class="helper-text white-text">Password berhasil diganti</span>');
			redirect('auth');
		}
	}

	public function logout()
	{
		$this->db->set('date_logout', time());
		$this->db->where('email', $this->session->userdata('email'));
		$this->db->update('user');
		
		$data = [ 
			'email'		=> $this->session->userdata('email'),
			'role_id'	=> $this->session->userdata('role_id'),
			'id_meta'	=> $this->session->userdata('id_meta')
		];

		// Unset session
		$this->session->unset_userdata($data);

		// Destroy session
		$this->session->sess_destroy();

		// Recreate session
		session_start();
		$this->session->sess_regenerate(TRUE);

		redirect('auth');
	}

	public function blocked()
	{
		$this->load->view('auth/v_blocked');
	}

}
