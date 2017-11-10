<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Beranda extends CI_Controller {

	public function __construct()
    {
        parent::__construct();
        // JS

		$data['js'] = '';
		$data['validasi'] = '';

        // CHECK LOGIN
        if(!$this->session->userdata('level')){
        	$this->session->set_flashdata("error","Anda harus login untuk mengakses halaman ini ");
        	redirect("../auth/masuk");
        }
    }
	

	public function index()
	{
		$data['js'] = '';
		$data['validasi'] = '';

		//HASIL PROGRESS
		$data['hasilprogress'] = 0;
		$this->load->view('template/header');
		$this->load->view('beranda/index', $data);
		$this->load->view('template/footer');
	}
}
