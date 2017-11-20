<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kelas extends CI_Controller {


	public function __construct()
    {
        parent::__construct();

        // CHECK LOGIN
        if($this->session->userdata('level') != 9){
        	$this->session->set_flashdata("error","Anda harus login untuk mengakses halaman ini ");
        	redirect("../auth/masuk");
        }

        // MODEL
        $this->load->model("Guru_model");
    }
	

	public function index()
	{
		$data['js'] = '';
		$data['validasi'] = '';
		$data['modal'] = '';

		//HASIL PROGRESS
		$data['kelas'] 		= $this->Guru_model->get_kelas();
		$this->load->view('template/header');
		$this->load->view('kelas/index', $data);
		$this->load->view('template/footer');
	}

	public function detail($kelas = 0)
	{	
		if($kelas > 0){
			$data['js'] = '';
			$data['validasi'] = '';
			$data['modal'] = '';

			//DETAIL KELAS
			$data['kelas'] 		= $this->Guru_model->get_kelas_by_id($kelas);
			$data['siswa'] 		= $this->Guru_model->get_siswa_kelas($kelas);
			$data['folder_foto_siswa']	= base_url()."../upload/foto/siswa/";
			$this->load->view('template/header');
			$this->load->view('kelas/detail', $data);
			$this->load->view('template/footer');	
		}
		else
		{
			redirect("kelas");
		}
	}

	public function mapel($kelas = 0)
	{	
		if($kelas > 0){
			$data['js'] = '';
			$data['validasi'] = '';
			$data['modal'] = array($this->load->view("template/modal/tambah_mapel", NULL, TRUE));

			//DETAIL KELAS
			$data['kelas'] 		= $this->Guru_model->get_kelas_by_id($kelas);
			$data['mapel'] 		= $this->Guru_model->get_mapel_by_kelas($kelas);
			$this->load->view('template/header');
			$this->load->view('kelas/mapel', $data);
			$this->load->view('template/footer');	
		}
		else
		{
			redirect("kelas");
		}
	}
}
