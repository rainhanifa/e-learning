<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {

	var $folder_foto_guru   =   'upload/foto/guru/';
	var $folder_foto_siswa  =   'upload/foto/siswa/';
	var $folder_tugas  		=   'upload/tugas/';

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
		$data['validasi'] 	= array($this->load->view('template/js/js_modal', NULL, TRUE),
								$this->load->view('template/js/validasi_login', NULL, TRUE),
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

		$data['kelas']	=	$this->Front_model->get_kelas();
		$this->load->view('template/header');
		$this->load->view('auth/registrasisiswa', $data);
		$this->load->view('template/footer');
	}

	public function domasuk(){
        $user   = $_POST['namalogin'];
        $pass   = $_POST['kuncilogin'];

        // CHECK USERNAME
        if($this->Front_model->check_username($user)){

        	//RANDOM PASSWORD
            $pass = $this->Front_model->randompassword($pass);

            $login =  $this->Front_model->login($user, $pass);
        	if(is_object($login)){
        		$user_data 		=	array("username" => $login->username,
        									"userid"=> $login->user_id,
        									"level"  => $login->level);
	        	$this->session->set_userdata($user_data);

	        	$this->Front_model->write_log($user, "login ke sistem");

	        	if($login->level == 1){
	        		redirect("guru");
	        	}
	        	else if($login->level == 9){
	        		redirect("guru/dosen");
	        	}
	        	else
	        	{
	        		redirect("siswa");
	        	}
	        }
	        else{
	        	$this->session->set_flashdata("error", $login);
	        }
        }
        else{
			$this->session->set_flashdata("error","Periksa nama pengguna");
        }
		redirect("auth/masuk");
	}

	public function doregistrasiguru(){
		if($_POST){
	        $namalengkap    = $this->input->post('nama');
	        //$guru_kelas     = $this->input->post('gurukelas');
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
	                // CHANGE MODE\
	                chmod($config['upload_path'].$foto, 0777); // note that it's usually changed to 0755

	                // VALIDASI INPUT
	                if($pengguna<>'' and $namalengkap<>'' and $nip<>'' and $email<>'' and $password<>'' and $repassword<>''){
			            if($password == $repassword){
			            	// SIMPAN KE DB
			                if($this->Front_model->insert_guru($pengguna, $password, $namalengkap, $nip, $email, $foto)){
								//	berhasil

	        					$this->Front_model->write_log($pengguna, "mendaftar sebagai guru");

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
		if($_POST){
			$pengguna       = $_POST['pengguna'];
            $namalengkap    = $_POST['namasiswa'];
            $siswa_kelas    = $_POST['siswakelas'];
            $absen          = $_POST['absen'];
            $email          = $_POST['mailsiswa'];

            $password       = $_POST['kunci'];
            $repassword     = $_POST['ulangikunci'];
            
	        // CHECK USERNAME
	        if(!$this->Front_model->check_username($pengguna)){

		        // CHECK NIM
		        if(!$this->Front_model->check_nim($absen)){
		        	// UPLOAD FOTO PROFIL
			        $config['upload_path']          = FCPATH.$this->folder_foto_siswa;
		            $config['allowed_types']        = 'gif|jpg|png|jpeg|pdf|docx|zip';
		            // RENAME
		            $foto 							= $pengguna."-".$_FILES["profilsiswa"]['name'];
		            $config['file_name']			= $foto;

					$this->load->library('upload');
					
					$this->upload->initialize($config);

					if($this->upload->do_upload('profilsiswa')) {
		                // CHANGE MODE
		                chmod(FCPATH.$this->folder_foto_siswa.$foto, 0777); // note that it's usually changed to 0755


			        	if($pengguna<>'' and $namalengkap<>'' and $siswa_kelas<>'' and $absen<>'' and $email<>'' and $password<>'' and $repassword<>''){
		                    if($password == $repassword){
		                        if($this->Front_model->insert_siswa($pengguna, $password, $namalengkap, $absen, $email, $foto, $siswa_kelas)){
									//	berhasil

		                        	// BUAT FOLDER TUGAS SISWA
	                                $nama_folder_tugas_siswa = FCPATH.$this->folder_tugas.$pengguna;
	                                $oldmask = umask(0); //temporarily set umask
	                                mkdir($nama_folder_tugas_siswa, 0777, true);
	                                umask($oldmask); // reset umask

	        						$this->Front_model->write_log($pengguna, "mendaftar sebagai mahasiswa kelas ".$siswa_kelas);

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
		            }
		            else{
						$this->session->set_flashdata("error","Jenis file untuk foto profil tidak didukung");
	            	}
		        }
		        else{
		        	$this->session->set_flashdata("error","NIM sudah terdaftar");
		        }
	        }
	        else{
	        	$this->session->set_flashdata("error","Username sudah terdaftar");
	        }
                
		}
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

	public function create_admin(){
		$data_admin = array("nama" => "Super Admin", "nip" => 0, "email" => "rainhanifa@gmail.com");
		if($this->db->insert("data_guru", $data_admin)){
			$user_id 	= $this->db->insert_id();
			$password = $this->Front_model->randompassword("superadmin123");

			$admin_data = array("username" => "superadmin", "password" => $password,
							 "user_id" => $user_id, "level" => 9);
			if($this->db->insert("login", $admin_data)){
				echo "OK!";
			}
			else{
				echo "Failed";
			}
		}
		
	}

	public function keluar(){

	    $this->Front_model->write_log($this->session->userdata("username"), "logout dari sistem");

		$this->session->sess_destroy();
		$user_data 	= array("username", "level", "userid", "mapel");
		$this->session->unset_userdata($user_data);


		$this->session->set_flashdata("message","Anda telah keluar dari sistem.");
		redirect("auth/masuk");

	}
}
