<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Beranda extends CI_Controller {
	var $username = '';

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

        $this->mapel 	= $this->session->userdata('mapel');

        $this->username = $this->session->userdata('username');
    }
	

	public function index()
	{
		if($this->session->userdata('mapel')){
			redirect("beranda/materi");
		}

		$data['js'] = '';
		$data['validasi'] = '';

		//MAPEL PILIHAN SESUAI KELAS
		$data['mapel'] = $this->Siswa_model->get_mapel_siswa($this->username);

		$this->load->view('beranda/mapel', $data);
	}

	public function materi()
	{

		if(!$this->session->userdata('mapel')){
			redirect("beranda");
		}

		$data['js'] = '';
		$data['validasi'] = '';

		//HASIL PROGRESS
		$data['hasilprogress'] = 0;
		$data['materi'] = $this->Siswa_model->get_materi_siswa($this->username, $this->mapel);

		$this->load->view('template/header');
		$this->load->view('beranda/index', $data);
		$this->load->view('template/footer');
	}

	public function mapel($id){
		$this->session->set_userdata('mapel', $id);
		redirect("beranda/materi");
	}
}
