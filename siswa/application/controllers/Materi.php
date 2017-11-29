<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Materi extends CI_Controller {
	var $username = '';
	var $mapel = '';

	public function __construct()
    {
        parent::__construct();

        // MODEL
        $this->load->model("Siswa_model");

        // JS

		$data['js'] = '';
		$data['validasi'] = '';

        // CHECK LOGIN
        if(!$this->session->userdata('level')){
        	$this->session->set_flashdata("error","Anda harus login untuk mengakses halaman ini ");
        	redirect("../auth/masuk");
        }
        // CHECK MAPEL
        if(!$this->session->userdata('mapel')){
			redirect("beranda");
		}

        $this->mapel 	= $this->session->userdata('mapel');

        $this->username = $this->session->userdata('username');
    }

	public function index(){
		$id 	=	$this->Siswa_model->get_current_materi($this->username, $this->mapel);
		if(!$id){
			// JIKA USER BARU PERTAMA KALI MENGAKSES MATA KULIAH INI
			$id =	$this->Siswa_model->get_first_materi($this->mapel);
			// SET PROGRESS KE MATERI AWAL
			$set_progress = $this->set_progress($id,'');	
		}
		
		redirect("materi/activity/$id");
	}

	public function activity($id)
	{
		if(!$this->session->userdata('mapel')){
			redirect("beranda");
		}
		// CEK CURRENT PROGRESS
			// JIKA CURRENT PROGRESS != SEKARANG
				// SET PROGRESS

		$data['js'] = '';
		$data['validasi'] = '';
		$data['modal'] = '';

		//MAPEL PILIHAN SESUAI KELAS
		$data['materi'] = $this->Siswa_model->get_mapel_by_konten($id);
		$data['konten'] = $this->Siswa_model->get_konten_detail($id);

		$this->load->view('template/header');
		$this->load->view('materi/index', $data);
		$this->load->view('template/footer');
	}

	public function set_progress($submateri, $tugas){
		$user 			= 	$this->Siswa_model->get_profil($this->username);
		$id 			=	$user[0]['id_siswa'];

		$data_progress  =   array("user_id" => $id,
                            "submateri_id" => $submateri,
                            "tugas_id" => $tugas);
		if($this->db->insert('progress_belajar', $data_progress)){
			return true;
		}
		else{
			return false;
		}
	}

	// TUGAS
		// JIKA UPLOAD TUGAS
			// SET PROGRESS DENGAN TUGAS_ID
		// JIKA TUGAS SUDAH DINILAI DOSEN
			// SET PROGRESS DENGAN SUBMATERI BERIKUTNYA
}
