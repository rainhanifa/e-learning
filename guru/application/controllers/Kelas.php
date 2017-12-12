<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kelas extends CI_Controller {


	public function __construct()
    {
        parent::__construct();

        // CHECK LOGIN
        if(($this->session->userdata('level') != 1) && ($this->session->userdata('level') != 9)){
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
		$data['modal'] = array($this->load->view("template/modal/tambah_kelas", NULL, TRUE));

		//HASIL PROGRESS
		$data['kelas'] 		= $this->Guru_model->get_kelas();
		$this->load->view('template/header');
		$this->load->view('kelas/index', $data);
		$this->load->view('template/footer');
	}

	public function detail($kelas = 0)
	{	
		if($kelas > 0){
			$data['js'] = '';
			$data['validasi'] = '';
			$data['modal'] = '';

			//DETAIL KELAS
			$data['kelas'] 		= $this->Guru_model->get_kelas_by_id($kelas);
			$data['siswa'] 		= $this->Guru_model->get_siswa_kelas($kelas);
			$data['folder_foto_siswa']	= base_url()."../upload/foto/siswa/";
			$this->load->view('template/header');
			$this->load->view('kelas/detail', $data);
			$this->load->view('template/footer');	
		}
		else
		{
			redirect("kelas");
		}
	}

	public function tambah(){
		if($_POST){
			$nama	=	$this->input->post('nama');
			$tahun	=	$this->input->post('tahun');

			$data_kelas	= array('nama' => $nama,
								'tahun' => $tahun);

			if($this->db->insert("data_kelas", $data_kelas)){
				$activity   =   "menambahkan kelas ".$nama." (".$tahun.")";
                $this->Guru_model->write_log($activity);
				$this->session->set_flashdata("message","Berhasil menambahkan kelas");
			}
			else
			{
				$this->session->set_flashdata("error","Kegagalan sistem.");
			}
		}
		redirect("kelas");
	}

	public function mapel($kelas = 0)
	{	
		if($kelas > 0){
			$data['js'] = '';
			$data['validasi'] = '';
			$data['modal'] = '';

			//DETAIL KELAS
			$data['kelas'] 		= $this->Guru_model->get_kelas_by_id($kelas);
			$data['mapel'] 		= $this->Guru_model->get_mapel_kelas($kelas);
			$data['available_mapel'] 		= $this->Guru_model->getAvailableMapelKelas($kelas);

			$this->load->view('template/header');
			$this->load->view('kelas/mapel', $data);
			$this->load->view('template/footer');	
		}
		else
		{
			redirect("kelas");
		}
	}

	public function tambah_mapel(){
		if($_POST){
			$mapel 	=	$this->input->post('mapel');
			$kelas 	=	$this->input->post('kelas');

			// GET T_MAPEL
			$data_jadwal	=	array("t_mapel_id" => $mapel,
										"kelas_id" => $kelas,
										"tahun" => date('Y'),
										"jam" => date('H:i'));

			if($this->db->insert('t_jadwal', $data_jadwal)){
				$activity   =   "menambahkan jadwal mata kuliah ID #".$mapel." untuk kelas id #".$kelas.")";
                $this->Guru_model->write_log($activity);
				redirect("kelas/mapel/".$kelas);
			}
		}
	}

	public function hapus($idkelas){
		$hapus = $this->Guru_model->hapus_kelas($idkelas);
		if($hapus){
			$this->session->set_flashdata("error","Berhasil menghapus kelas");
		}
		redirect('kelas');
	}
}
