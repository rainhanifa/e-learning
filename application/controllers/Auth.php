<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {

	var $folder_foto_guru   =   'upload/foto/guru/';

	public function __construct()
    {
        parent::__construct();
    	$this->load->model('Front_model');
    }
	
	public function index()
	{
		redirect('auth/masuk');
	}

	public function masuk()
	{
		$data['js']			= array('form-validator/formValidation.js', 'form-validator/bootstrap.js');
		$data['validasi'] 	= array($this->load->view('template/js/validasi_login', NULL, TRUE),
								$this->load->view('template/js/js_modal', NULL, TRUE),
								$this->load->view('template/js/validasi_forgotpass', NULL, TRUE));
		$this->load->view('template/header');
		$this->load->view('auth/masuk', $data);
		$this->load->view('template/footer');
	}

	public function registrasiguru(){
		$data['js']	= array('form-validator/formValidation.js', 'form-validator/bootstrap.js');
		$data['validasi'] 	= array($this->load->view('template/js/validasi_registrasi', NULL, TRUE));

		$data['kelas']	=	$this->Front_model->get_kelas();
		$this->load->view('template/header');
		$this->load->view('auth/registrasiguru', $data);
		$this->load->view('template/footer');
	}

	public function registrasisiswa(){
		$data['js']	= array('form-validator/formValidation.js', 'form-validator/bootstrap.js');
		$data['validasi'] 	= array($this->load->view('template/js/validasi_registrasi', NULL, TRUE));
		$this->load->view('template/header');
		$this->load->view('auth/registrasisiswa', $data);
		$this->load->view('template/footer');
	}

	public function domasuk(){
		//	berhasil
			// jika guru
			redirect("guru");
			// jika siswa
			redirect("siswa");
		//	gagal
		$this->session->set_flashdata("error","Data tidak dapat ditemukan. Periksa kembali nama pengguna dan kata kunci.");
		$this->session->set_flashdata("error","Nama pengguna tidak ditemukan. Mohon periksa kembali.");
		$this->session->set_flashdata("error","Kata kunci tidak sesuai dengan nama pengguna tersebut. Mohon periksa kembali.");
		$this->session->set_flashdata("error","Terjadi kesalahan sistem. Silakan coba beberapa saat lagi.");
		redirect("auth/registrasiguru");
	}

	public function doregistrasiguru(){
		if($_POST){
	        $namalengkap    = $this->input->post('nama');
	        $guru_kelas     = $this->input->post('gurukelas');
	        $nip            = $this->input->post('nip');
	        $email          = $this->input->post('mail');

			$pengguna       = $this->input->post('pengguna');
	        $password       = $this->input->post('kunci');
	        $repassword     = $this->input->post('ulangikunci');

	        // CHECK USERNAME
	        if(!$this->Front_model->check_username($pengguna)){

		        // UPLOAD FOTO PROFIL
		        $config['upload_path']          = FCPATH.$this->folder_foto_guru;
	            $config['allowed_types']        = 'gif|jpg|png|jpeg|pdf|docx|zip';
	            // RENAME
	            $foto 							= $pengguna."-".$_FILES["profil"]['name'];
	            $config['file_name']			= $foto;

				$this->load->library('upload');
				
				$this->upload->initialize($config);

				if($this->upload->do_upload('profil')) {
	                // CHANGE MODE
	                chmod(FCPATH.$foto, 0777); // note that it's usually changed to 0755

	                // VALIDASI INPUT
	                if($pengguna<>'' and $namalengkap<>'' and $guru_kelas<>'' and $nip<>'' and $email<>'' and $password<>'' and $repassword<>''){
			            if($password == $repassword){
			            	// SIMPAN KE DB
			                if($this->Front_model->insert_guru($pengguna, $password, $namalengkap, $nip, $email, $foto)){
								//	berhasil
								$this->session->set_flashdata("message","Anda berhasil mendaftar. Silakan login untuk masuk ke akun Anda.");
								redirect("auth/masuk");
			                }
			                else{
			                	$this->session->set_flashdata("error","Terjadi kesalahan sistem. Silakan coba beberapa saat lagi.");
			                }
			            } else {
			                $this->session->set_flashdata("error","Password dan konfirmasi password tidak sesuai");
			            }
			        } else {
			            $this->session->set_flashdata("error","Harap isi seluruh kolom inputan");
			        }


	            }else{
					$this->session->set_flashdata("error","Jenis file untuk foto profil tidak didukung");
	            }
	        }
	        else{
	        	//	gagal
				$this->session->set_flashdata("error","Username sudah terdaftar");
	        }
		}
		redirect("auth/registrasiguru");
	}

	public function doregistrasisiswa(){
		//	berhasil
		$this->session->set_flashdata("message","Anda berhasil mendaftar. Silakan login untuk masuk ke akun Anda.");
		redirect("auth/masuk");
		//	gagal
		
		$this->session->set_flashdata("error","Username sudah terdaftar");
		$this->session->set_flashdata("error","NIM sudah terdaftar");
		$this->session->set_flashdata("error","Terjadi kesalahan sistem. Silakan coba beberapa saat lagi.");
		redirect("auth/registrasisiswa");
	}

	public function resetpassword(){
		//	berhasil
		$this->session->set_flashdata("message","Kata kunci telah diatur ulang. Silakan login untuk masuk ke akun Anda.");
		redirect("auth/masuk");
		//	gagal
		
		$this->session->set_flashdata("error","Administrator tidak dapat mengirim pesan ke email Anda. Mohon ulangi pengisian data");
		redirect("auth/registrasisiswa");
	}
}
