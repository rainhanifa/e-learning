<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Catatan extends CI_Controller {


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
		$data['showlogs'] 		= $this->Guru_model->get_logs();
		$this->load->view('template/header');
		$this->load->view('catatan/index', $data);
		$this->load->view('template/footer');
	}

}
