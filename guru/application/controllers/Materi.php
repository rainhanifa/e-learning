<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Materi extends CI_Controller {

	public function __construct()
    {
        parent::__construct();
        // MODEL
        $this->load->model("Guru_model");

        // CHECK LOGIN
        if(!$this->session->userdata('level')){
        	$this->session->set_flashdata("error","Anda harus login untuk mengakses halaman ini ");
        	redirect("../auth/masuk");
        }
        
        // SET USERNAME
        $this->username = $this->session->userdata('username');
        // SET USER ID
        $this->userid = $this->session->userdata('userid');
    }
	public function index()
	{
		$data['js']	= '';
		$data['modal'] = '';
		$data['validasi'] = '';

		$data['materi'] = $this->Guru_model->getMateriDosen($this->userid);

		$this->load->view('template/header');
		$this->load->view('materi/index', $data);
		$this->load->view('template/footer');
	}

	public function tambah()
	{
		$data['userid'] = $this->userid;
		$data['mapel']	  = $this->Guru_model->getMapelDosen($this->userid);

		$data['js']	= '';
		$data['modal'] = '';
		$data['validasi'] = '';

		$this->load->view('template/header');
		$this->load->view('materi/tambah', $data);
		$this->load->view('template/footer');
	}

	public function ubah($id)
	{
		$data['userid'] = $this->username;
		$data['mapel']	  = $this->Guru_model->getMapelDosen($this->userid);
		$data['materi']	  = $this->Guru_model->getMateriDetail($id);

		$data['js']	= '';
		$data['modal'] = '';
		$data['validasi'] = '';

		$this->load->view('template/header');
		$this->load->view('materi/ubah', $data);
		$this->load->view('template/footer');
	}

	public function doTambah(){
		if($_POST){
			$userid		=	$this->userid;
			$mapel 		=	$this->input->post('mapel');
			$materi 	=	$this->input->post('materi');
			$submateri 	=	$this->input->post('submateri');

			$materi_exist 	=	$this->Guru_model->checkMateriExist($materi);

			// JIKA MATERI ADA
			if($materi_exist){
				// GUNAKAN ID MATERI DI SINI
				$materi_id 	=	$materi_exist;
			}
			else
			{
				// INSERT NEW MATERI
				$data_materi 	= array("nama" => $materi);
				if($this->db->insert('materi', $data_materi)){
					// INSERT KE TABEL DETAIL MAPEL
					$materi_id 			= $this->db->insert_id();
					$data_detail		= array("mapel_id" => $mapel,
												"materi_id" => $materi_id);
				}
				else{
					// ERROR
					redirect('materi/tambah');
				}
			}
			$data_submateri 	= array("materi_id" => $materi_id,
											"nama" => $submateri);

			if($this->db->insert('submateri', $data_submateri)){
				redirect('materi');
			}
			else{
				// ERROR
				redirect('materi/tambah');
			}
		}
	}
}
