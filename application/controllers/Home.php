<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	
	public function index()
	{
		$data['js'] = '';
		$data['validasi'] = '';
		$data['modal'] = '';
		$this->load->view('template/header');
		$this->load->view('home/index', $data);
		$this->load->view('template/footer');
	}
}
