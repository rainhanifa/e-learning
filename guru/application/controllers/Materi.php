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

	public function byMapel($id)
	{
		$data['js']	= '';
		$data['modal'] = '';
		$data['validasi'] = '';

		$data['materi'] = $this->Guru_model->getMateriDosenbyMapel($this->userid,$id);

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
					$data_detail		= array("t_mapel_id" => $mapel,
												"materi_id" => $materi_id);

					$activity   =   "menambahkan materi ".$materi." ke mata kuliah ID #".$mapel."";
		            $this->Guru_model->write_log($activity);

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

				$activity   =   "menambahkan submateri ".$submateri." ke materi ".$materi;
                $this->Guru_model->write_log($activity);

				redirect('materi');
			}
			else{
				// ERROR
				redirect('materi/tambah');
			}
		}
	}

	public function doUbah(){
		
		 $id 	=	$this->input->post('idmateri');
		 $nama 	=	$this->input->post('materi');

		 $where =	array("id" => $id);
		 $data 	=	array("nama" => $nama);

		 
		 $this->db->where($where);
		 if($this->db->update('materi', $data)){

			$activity   =   "mengubah materi ID #".$id." dengan nama baru: ".$nama;
            $this->Guru_model->write_log($activity);

		 	$this->session->set_flashdata('message', 'Berhasil');
		 }
		redirect('materi');;
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
		$data['userid'] 	= $this->userid;
		$data['submateri']	= $this->Guru_model->getSubMateriDosen($this->userid);
		$data['konten']		= $this->Guru_model->getKontenDetail($id);

		$data['js']	= array('cdn/tinymce/tinymce.min.js');
		$data['modal'] = '';
		$data['validasi'] = array($this->load->view('template/js/dynamic_kontenmateri', NULL, TRUE));

		$this->load->view('template/header');
		$this->load->view('materi/ubahkonten', $data);
		$this->load->view('template/footer');
	}

	public function hapuskonten($id){
		$hapus  	=	$this->Guru_model->hapus_konten($id);
		redirect('materi');
	}

	public function doTambahKonten(){
		if($_POST){
			$userid		=	$this->userid;
			$submateri 	=	$this->input->post('submateri');
			$tipe 		=	$this->input->post('kategori');
			
			// JIKA UPLOAD FILE
			if (!empty($_FILES['filemateri']['name'])) {
				// CEK FILE EXTENSION
				$file_ext = pathinfo($_FILES['filemateri']['name'],PATHINFO_EXTENSION);
				$folder   = '';
				if($file_ext == 'pdf'){
					// PDF
					$config['upload_path']          = realpath('./../')."/upload/materi/pdf";	
					$folder 	= 'pdf/';
				}
				else
				{
					// VIDEO
					$config['upload_path']          = realpath('./../')."/upload/materi/video";	
					$folder 	= 'video/';
				}

		    	$config['allowed_types']        = 'pdf|mp4|webm|oggv';
		    	$config['file_name']			= $submateri.'-'.$_FILES['filemateri']['name'];

	            $this->load->library('upload');
	            $this->upload->initialize($config);

	            if(!$this->upload->do_upload('filemateri'))
                {
                        echo $this->upload->display_errors();
                }
                else
                {
                        $isi = $folder.$this->upload->data('file_name');
						chmod($config['upload_path'].'/'.$isi, 0777); // note that it's usually changed to 0755
                }

			}
			else{
				// JIKA TIDAK
				$isi 	=	$this->input->post('isimateri');
			}

			$data_materi 	= array("submateri_id" => $submateri,
									"tipe" => $tipe,
									"isi" => $isi);


			// CEK JIKA KONTEN MATERI UNTUK TIPE TSB SUDAH ADA
			$where2 		= array('submateri_id' => $submateri, 'tipe' => $tipe);
			$konten_exist 	= $this->db->get_where('kontenmateri', $where2)->num_rows();

			if($konten_exist > 0){
				// UPDATE
				$id_exist 	= $this->db->get_where('kontenmateri', $where2)->row()->id;
				$this->db->where('id',$id_exist);
				if($this->db->update('kontenmateri', $data_materi)){

					$activity   =   "mengupdate konten materi ID #".$id_exist." tipe ".$tipe.")";
	                $this->Guru_model->write_log($activity);

					redirect('materi');
				}
			}
			else{
				if($this->db->insert('kontenmateri', $data_materi)){

					$activity   =   "menambahkan konten materi ".$tipe." untuk submateri ".$submateri;
	                $this->Guru_model->write_log($activity);

					redirect('materi');
				}	
			}
			var_dump($isi);
			var_dump($config);
			exit;
			redirect('materi/tambahkonten');
		}
	}

	public function activity($id)
	{
		$data['materi'] = $this->Guru_model->getMapelbyKonten($id);
		$data['konten']	= $this->Guru_model->getKontenDetail($id);
		$data['tugas']  = $this->Guru_model->getTugasKonten($id);

		$data['js']	= '';
		$data['modal'] =  '';
		$data['validasi'] = array($this->load->view('template/js/dynamic_tabkonten', NULL, TRUE));

		$this->load->view('template/header');
		$this->load->view('materi/konten', $data);
		$this->load->view('template/footer');
	}

	public function komentar(){
		$subyek		=	$this->input->post('subyek');
		$komentar	=	$this->input->post('komentar');
		$kontenmateri	=	$this->input->post('kontenmateri');

		$data_komentar	= array("user_id" 		=> $this->userid,
								"level"			=> $this->session->userdata('level'),
								"kontenmateri_id" => $kontenmateri,
								"subyek"	=> $subyek,
								"deskripsi"	=> $komentar,
								"tanggal"	=> date("Y-m-d H:i:s")
								);
		if($this->db->insert('komentar', $data_komentar)){
			echo "OK";
		}
		redirect("materi/activity/".$kontenmateri);
	}

	public function getMateriJSON($idmapel){
		$where 		=	array("t_mapel_id" => $idmapel);
		$materi		=	$this->db->select('detail_mapel.materi_id as id_materi, materi.nama as nama_materi')
									->from('detail_mapel')
									->join('materi', 'detail_mapel.materi_id = materi.id')
									->join('t_mapel', 't_mapel.id = detail_mapel.t_mapel_id')
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
