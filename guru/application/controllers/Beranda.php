<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Beranda extends CI_Controller {

	var $folder_tugas;
	var $userid;

	public function __construct()
    {
        parent::__construct();

        // CHECK LOGIN
        if(!$this->session->userdata('level')){
        	$this->session->set_flashdata("error","Anda harus login untuk mengakses halaman ini ");
        	redirect("../auth/masuk");
        }

        // SET USER
        $this->userid = $this->session->userdata('userid');
        // MODEL
        $this->load->model("Guru_model");

        // TUGAS
        $this->folder_tugas 	=	base_url().'/upload/tugas/';
    }
	

	public function index()
	{
		$data['js'] = '';
		$data['validasi'] = '';
		$data['modal'] = '';

		//HASIL PROGRESS
		$data['daftarsiswa'] 		= $this->Guru_model->get_progress_by_dosen($this->userid);
		$data['url_tugas']	= $this->folder_tugas;

		$this->load->view('template/header');
		$this->load->view('beranda/index', $data);
		$this->load->view('template/footer');
	}
}
