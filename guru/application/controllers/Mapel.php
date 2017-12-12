<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mapel extends CI_Controller {


	public function __construct()
    {
        parent::__construct();

        // CHECK LOGIN
        if(!$this->session->userdata('level')){
        	$this->session->set_flashdata("error","Anda harus login untuk mengakses halaman ini ");
        	redirect("../auth/masuk");
        }

        // MODEL
        $this->load->model("Guru_model");

        // SET USER ID
        $this->userid = $this->session->userdata('userid');
    }
	

	public function index()
	{
		$data['js'] = '';
		$data['validasi'] = '';
		$data['modal']	= array($this->load->view("template/modal/tambah_mapel", NULL, TRUE));

		
		$this->load->view('template/header');

		if($this->session->userdata('level') == 1){
			// DATA MAPEL UNTUK GURU
			$data['mapel'] 		= $this->Guru_model->getMapelDosen($this->userid);
			$this->load->view('mapel/index-guru', $data);	
		}
		else
		{
			// DATA MAPEL UNTUK ADMIN
			$data['mapel'] 		= $this->Guru_model->get_mapel();
			$this->load->view('mapel/index', $data);		
		}
		

		$this->load->view('template/footer');
	}


	public function detail($tmapel = 0)
	{	
		// TAMPILKAN MATERI DARI MAPEL DENGAN DOSEN TSB 
		if($mapel > 0){
			$data['js'] = '';
			$data['validasi'] = '';

			//DETAIL TMAPEL
			$data['mapel'] 		= $this->Guru_model->get_tmapel_materi($tmapel);
			$this->load->view('template/header');
			$this->load->view('mapel/detail', $data);
			$this->load->view('template/footer');	
		}
		else
		{
			redirect("kelas");
		}
	}

	public function tambah(){
		if($_POST){
			$nama_mapel	= $this->input->post("nama");

			$data_mapel	= array("nama" => $nama_mapel);
			if($this->db->insert("mata_pelajaran", $data_mapel)){
				$activity   =   "menambahkan mata_kuliah ".$nama_mapel;
                $this->Guru_model->write_log($activity);

				$this->session->set_flashdata("error","Berhasil menambahkan mata kuliah");
			}
			else
			{
				$this->session->set_flashdata("error","Kegagalan sistem.");
			}
		}
		else
		{
        	$this->session->set_flashdata("error","Lengkapi semua data terlebih dahulu");
		}
		redirect("mapel");
	}


	public function tambahdosen($mapel = 0)
	{	
		
		if($mapel > 0){
			$data['js'] = '';
			$data['validasi'] = '';
			$data['modal'] = '';

			//CARI DOSEN YANG BELUM MASUK MAPEL
			$data['available'] 		= $this->Guru_model->getAvailableDosen($mapel);
			//GET NAMA MAPEL
			$data['mapel']			= $this->Guru_model->getDetailMapel($mapel);
			$this->load->view('template/header');
			$this->load->view('mapel/tambah_dosen_mapel', $data);
			$this->load->view('template/footer');	
		}
		else
		{
			redirect("kelas");
		}
	}

	public function do_tambah_dosen(){
		if($_POST){
			$mapel	= $this->input->post("mapel");
			$dosen	= $this->input->post("dosen");

			$data_t_mapel	= array("mapel_id" => $mapel, "dosen_id" => $dosen);
			if($this->db->insert("t_mapel", $data_t_mapel)){
				$activity   =   "menambahkan dosen ID #".$dosen." ke mata kuliah ID #".$mapel."";
                $this->Guru_model->write_log($activity);

				$this->session->set_flashdata("error","Berhasil menambahkan dosen");
			}
			else
			{
				$this->session->set_flashdata("error","Kegagalan sistem.");
			}
		}
		else
		{
        	$this->session->set_flashdata("error","Lengkapi semua data terlebih dahulu");
		}
		redirect("mapel");
	}

	public function hapusdosen($id_dosen, $id_mapel){
		$hapus 	= $this->Guru_model->hapus_dosen_mapel($id_dosen, $id_mapel);
		if($hapus){
			$this->session->set_flashdata("error","Berhasil menghapus dosen");
		}
		redirect("mapel");
	}

	public function hapus($id_mapel){
		$hapus 	= $this->Guru_model->hapus_mapel($id_mapel);
		if($hapus){
			$this->session->set_flashdata("error","Berhasil menghapus mata kuliah");
		}
		redirect("mapel");
	}
}
