<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Rapor extends CI_Controller {

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
		redirect('mapel');
	}

	public function bymapel($idmapel){
		$data['js'] = '';
		$data['validasi'] = '';
		$data['modal'] = '';

		$data['idmapel']	=	$idmapel;
		$data['kelas'] = $this->Guru_model->get_kelas_by_mapel($idmapel);

		$this->load->view('template/header');
		$this->load->view('rapor/daftarkelas', $data);
		$this->load->view('template/footer');
	}

	public function kelas($idmapel,$idkelas){
		$data['js'] = '';
		$data['validasi'] = '';
		$data['modal'] = '';

		$data['idkelas']	= $idkelas;
		$data['idmapel']	= $idmapel;
		$data['kelas'] = $this->Guru_model->get_siswa_kelas($idkelas);
		$data['materi'] = $this->Guru_model->getMateriDosenByMapel($this->userid, $idmapel);

		$this->load->view('template/header');
		$this->load->view('rapor/daftarnilai', $data);
		$this->load->view('template/footer');
	}

	public function berinilai($idsiswa, $idmateri){
		$data['js'] = '';
		$data['validasi'] = '';
		$data['modal'] = '';

		$data['nilai'] = $this->Guru_model->getNilaiSiswa($idsiswa, $idmateri);
		$data['materi'] = $this->Guru_model->get_full_detail_submateri($idmateri);
		$data['siswa'] = $this->Guru_model->get_full_detail_siswa($idsiswa);

		$this->load->view('template/header');
		$this->load->view('rapor/formnilai', $data);
		$this->load->view('template/footer');
	}
}
