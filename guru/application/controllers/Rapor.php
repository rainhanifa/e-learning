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

	public function assignnilai(){
		if($_POST){
			$id_hasil 	=	$this->input->post('id_hasil');
			$id_siswa 	=	$this->input->post('id_siswa');
			$id_submateri 	=	$this->input->post('id_submateri');
			$id_tmapel 	=	$this->input->post('id_tmapel');
			$id_kelas 	=	$this->input->post('id_kelas');

			$nilai_class 	=	$this->input->post('nilai_class');
			$nilai_lab 		=	$this->input->post('nilai_lab');


			$data_nilai 	=	array("siswa_id" => $id_siswa,
									"submateri_id" => $id_submateri,
									"nilai_class" => $nilai_class,
									"nilai_lab" => $nilai_lab
								);

			if($id_hasil != ''){
				// UPDATE QUERY

				$this->db->where('id', $id_hasil);
				$this->db->update('nilai', $data_nilai);
				// SET PROGRESS STATUS TO 1
				$where			=	array("siswa_id" => $id_siswa, "submateri_id" => $id_submateri);
				$data_progress	=	array("status" => 1);

				$this->db->where($where);

				if($this->db->update('progress', $data_progress)){
					redirect('rapor/kelas/'.$id_tmapel.'/'.$id_kelas);			
				}
				
			}
			else{
				// CREATE QUERY
				if($this->db->insert('nilai', $data_nilai)){
					redirect('rapor/kelas/'.$id_mapel.'/'.$id_kelas);			
				}
				echo $this->db->last_query();exit;
			}
		}
		$this->session->set_flashdata("Data nilai tidak dapat disimpan");
		redirect('rapor/berinilai/'.$id_siswa.'/'.$id_submateri);			
	}

	public function printnilai($idkelas, $idmapel){
 		//var_dump($source);exit;
        $pdfFilePath = "Laporan Nilai.pdf";
        //lokasi file css yang akan di load
        $stylesheet = file_get_contents(FCPATH.'assets/css/bootstrap.css');
        $stylesheet .= file_get_contents(FCPATH.'assets/css/style.css');
        $stylesheet .= file_get_contents(FCPATH.'assets/css/guru.css');

        $pdf = $this->m_pdf->load();

        $data['idkelas']	= $idkelas;
		$data['idmapel']	= $idmapel;
		$data['kelas'] = $this->Guru_model->get_siswa_kelas($idkelas);
		$data['materi'] = $this->Guru_model->getMateriDosenByMapel($this->userid, $idmapel);

		$this->load->view('rapor/printnilai', $data);
		$html 	 = $this->load->view('rapor/printnilai', $data, TRUE);
		
		$pdf->AddPage('P'); //L to landscape
        $pdf->WriteHTML($stylesheet, 1);
        $pdf->WriteHTML($html);

        $pdf->Output($pdfFilePath, "I"); //F to save as file, D to download, I view in browser
        exit();
	}
}
