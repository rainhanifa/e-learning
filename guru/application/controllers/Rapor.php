<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Rapor extends CI_Controller {

	public function index()
	{
		$this->load->view('rapor/index');
	}
}
