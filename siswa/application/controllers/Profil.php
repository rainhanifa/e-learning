<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Profil extends CI_Controller {

	var $username;
	public function __construct()
    {
        parent::__construct();
        // MODEL
        $this->load->model("Siswa_model");

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

		//PROFIL SISWA
		$data['profil'] = $this->Siswa_model->get_profil($this->username);
		$this->load->view('template/header');
		$this->load->view('profil/index', $data);
		$this->load->view('template/footer');
	}

	public function ubah()
	{
        // JS
		$data['js'] = '';
		$data['validasi'] = '';
		
		//PROFIL SISWA
		$data['profil'] = $this->Siswa_model->get_profil($this->username);
		$data['kelas']	= $this->Siswa_model->get_kelas();
		$this->load->view('template/header');
		$this->load->view('profil/ubah', $data);
		$this->load->view('template/footer');
	}
}