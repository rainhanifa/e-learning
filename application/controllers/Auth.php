<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {

	
	public function index()
	{
		redirect('auth/masuk');
	}

	public function masuk()
	{
		$data['js']			= array('form-validator/formValidation.js', 'form-validator/bootstrap.js');
		$data['validasi'] 	= array($this->load->view('template/js/validasi_login', NULL, TRUE),
								$this->load->view('template/js/js_modal', NULL, TRUE),
								$this->load->view('template/js/validasi_forgotpass', NULL, TRUE));
		$this->load->view('template/header');
		$this->load->view('auth/masuk', $data);
		$this->load->view('template/footer');
	}

	public function registrasiguru(){
		$data['js']	= array('form-validator/formValidation.js', 'form-validator/bootstrap.js');
		$data['validasi'] 	= array($this->load->view('template/js/validasi_registrasi', NULL, TRUE));
		$this->load->view('template/header');
		$this->load->view('auth/registrasiguru', $data);
		$this->load->view('template/footer');
	}

	public function registrasisiswa(){
		$data['js']	= array('form-validator/formValidation.js', 'form-validator/bootstrap.js');
		$data['validasi'] 	= array($this->load->view('template/js/validasi_registrasi', NULL, TRUE));
		$this->load->view('template/header');
		$this->load->view('auth/registrasisiswa', $data);
		$this->load->view('template/footer');
	}
}
