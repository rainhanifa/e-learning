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
					$this->db->insert('detail_mapel', $data_detail);
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

	public function tambahkonten()
	{
		$data['userid'] = $this->userid;
		$data['mapel']	  = $this->Guru_model->getMapelDosen($this->userid);

		$data['js']	= array('cdn/tinymce/tinymce.min.js');
		$data['modal'] = '';
		$data['validasi'] = array($this->load->view('template/js/dynamic_kontenmateri', NULL, TRUE));

		$this->load->view('template/header');
		$this->load->view('materi/tambahkonten', $data);
		$this->load->view('template/footer');
	}

	public function ubahkonten($id)
	{
		$data['userid'] = $this->userid;
		$data['mapel']	= $this->Guru_model->getMapelDosen($this->userid);
		$data['konten']	= $this->Guru_model->getKontenDetail($id);

		$data['js']	= '';
		$data['modal'] = '';
		$data['validasi'] = array($this->load->view('template/js/dynamic_kontenmateri', NULL, TRUE));

		$this->load->view('template/header');
		$this->load->view('materi/tambahkonten', $data);
		$this->load->view('template/footer');
	}


	public function doTambahKonten(){
		if($_POST){
			$userid		=	$this->userid;
			$submateri 	=	$this->input->post('submateri');
			$tipe 		=	$this->input->post('kategori');

			// JIKA UPLOAD FILE
				// $isi = file
			// JIKA TIDAK
				$isi 	=	$this->input->post('isimateri');


			// INSERT NEW KONTEN MATERI
			$data_materi 	= array("submateri_id" => $submateri,
									"tipe" => $tipe,
									"isi" => $isi);

			if($this->db->insert('kontenmateri', $data_materi)){
				redirect('materi');
			} 	
			else{
				// ERROR
				redirect('materi/tambahkonten');
			}
		}
	}

	public function getMateriJSON($idmapel){
		$where 		=	array("mapel_id" => $idmapel);
		$materi		=	$this->db->select('detail_mapel.materi_id as id_materi, materi.nama as nama_materi')
									->from('detail_mapel')
									->join('materi', 'detail_mapel.materi_id = materi.id')
									->where($where)
								->get()->result_array();
		// push to array
		$data 		= array();
		foreach($materi as $materi){
			$data[$materi['id_materi']] = $materi['nama_materi'];
	    }
		// return as encoded
		echo json_encode($data);
		exit;
	}

	public function getSubMateriJSON($idmateri){
		$where 		=	array("materi_id" => $idmateri);
		$submateri		=	$this->db->get_where('submateri', $where)->result_array();
		// push to array
		$data 		= array();
		foreach($submateri as $submateri){
			$data[$submateri['id']] = $submateri['nama'];
	    }
		// return as encoded
		echo json_encode($data);
		exit;
	}
}
