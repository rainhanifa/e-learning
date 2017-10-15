<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Materi extends CI_Controller {

	public function index()
	{
		$this->load->view('materi/index');
	}
}
