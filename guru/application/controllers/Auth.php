<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {

	public function logout()
	{
		$this->load->view('home/index');
	}

}
