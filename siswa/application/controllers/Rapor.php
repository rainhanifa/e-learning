<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Rapor extends CI_Controller {

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
        // CHECK MAPEL
        if(!$this->session->userdata('mapel')){
			redirect("beranda");
		}

        $this->mapel 	= $this->session->userdata('mapel');
        $this->username = $this->session->userdata('username');
        $this->userid   = $this->session->userdata('userid');
    }

	public function index(){
		if(!$this->session->userdata('mapel')){
			redirect("beranda");
		}
		$data['js'] = '';
		$data['validasi'] = '';
		$data['modal'] = '';

		//DAFTAR MATERI DAN NILAI
		$data['materi'] = $this->Siswa_model->get_materi_list($this->mapel);
		$data['rapor'] = array();

		$this->load->view('template/header');
		$this->load->view('rapor/index', $data);
		$this->load->view('template/footer');
	}

}
