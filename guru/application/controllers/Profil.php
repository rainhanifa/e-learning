<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Profil extends CI_Controller {

	var $username;
	public function __construct()
    {
        parent::__construct();
        // MODEL
        $this->load->model("Guru_model");

        // CHECK LOGIN
        if(!$this->session->userdata('level')){
        	$this->session->set_flashdata("error","Anda harus login untuk mengakses halaman ini ");
        	redirect("../auth/masuk");
        }
        
        // SET USERNAME
        $this->username = $this->session->userdata('username');
    }
	

	public function index()
	{
        // JS
		$data['js'] = '';
		$data['validasi'] = '';
		$data['modal'] = '';

		//PROFIL SISWA
		$data['profil'] = $this->Guru_model->get_profil($this->username, $this->session->userdata('level'));
		$this->load->view('template/header');
		$this->load->view('profil/index', $data);
		$this->load->view('template/footer');
	}

	public function ubah()
	{
        // JS
		$data['js']			= array('form-validator/formValidation.js', 'form-validator/bootstrap.js');
		$data['validasi']	= array($this->load->view('template/js/validasi_ubahprofil', NULL, TRUE));
		$data['modal'] = '';

		//PROFIL SISWA
		$data['profil'] = $this->Guru_model->get_profil($this->username, $this->session->level);
		$data['kelas']	= $this->Guru_model->get_kelas();

		$this->load->view('template/header');
		$this->load->view('profil/ubah', $data);
		$this->load->view('template/footer');
	}
	
	public function doUbah(){
		if($_POST){
			$folder_foto_guru   =   '../upload/foto/guru/';

			$id 	= $this->input->post('id');
			$nama	= $this->input->post('nama');
			$nip 	= $this->input->post('nip');
			$email	= $this->input->post('mail');

			$password	= $this->input->post('kunci');
			$confirm 	= $this->input->post('ulangi_kunci');

			// UPDATE FOTO PROFIL
			if (!empty($_FILES['profil']['name'])) {
				// UPLOAD FOTO PROFIL
		        $config['upload_path']          = FCPATH.$folder_foto_guru;
	            $config['allowed_types']        = 'gif|jpg|png|jpeg|pdf|docx|zip';
	            // RENAME
	            $foto 							= $this->username."-".$_FILES["profil"]['name'];
	            $config['file_name']			= $foto;

				$this->load->library('upload');
				
				$this->upload->initialize($config);

				if($this->upload->do_upload('profil')) {
	                // CHANGE MODE\
	                chmod($config['upload_path'].$foto, 0777); // note that it's usually changed to 0755
	                $this->Guru_model->update_foto($id, $foto);
	            }
	            else{
					$this->session->set_flashdata('message','<label class="label label-danger clues">Jenis file untuk foto profil tidak didukung</label>');
	            }
			}

			// UPDATE PASSWORD
			if($password <> '' and $confirm <> ''){
				if($password == $confirm){
					$this->Guru_model->update_pass($id, $password);
				}

			}
			// UPDATE PROFIL LAIN
			if($this->Guru_model->update_profil($id, $nama, $nip, $email)){
					$this->session->set_flashdata('message','<label class="label label-success clues">Ubah profil berhasil</label>');
			}else{
					$this->session->set_flashdata('message','<label class="label label-danger clues">Ubah profil gagal</label>');
			}

		}
		redirect('profil/ubah');
	}
}