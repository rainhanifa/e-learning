<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dosen extends CI_Controller {


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

		// DATA DOSEN
		$data['dosen'] 		= $this->Guru_model->get_dosen();
		$data['folder_foto_guru']	= base_url()."../upload/foto/guru/";
		$this->load->view('template/header');
		$this->load->view('dosen/index', $data);
		$this->load->view('template/footer');
	}


	public function hapus($id = 0)
	{
		if($id > 0){
			$hapus = $this->Guru_model->hapus_dosen($id);
			if($hapus){
				$this->session->set_flashdata("error", "Berhasil menghapus dosen");
			}
		}
		redirect("dosen");
	}


	public function detail($dosen = 0)
	{	
		if($dosen > 0){
			$data['js'] = '';
			$data['validasi'] = '';
			$data['modal'] = '';

			//DETAIL DOSEN
			$data['dosen'] 		= $this->Guru_model->get_detail_dosen($dosen);
			$data['mapel'] 		= $this->Guru_model->getMapelDosen($dosen);
			$data['folder_foto_guru']	= base_url()."../upload/foto/guru/";
			$this->load->view('template/header');
			$this->load->view('dosen/detail', $data);
			$this->load->view('template/footer');	
		}
		else
		{
			redirect("kelas");
		}
	}
}
