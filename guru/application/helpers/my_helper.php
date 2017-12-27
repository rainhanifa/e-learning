<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

function getTotalSiswa($kelas){
    $CI =& get_instance();
    $where  =   array("kelas_id" => $kelas);
    $total  =   $CI->db->select("COUNT(siswa_id) AS total")->from("detail_kelas")->where($where)->get()->row()->total;
    return $total;
}

function getDosenMapel($mapel){
	$CI =& get_instance();
    $where  =   array("mapel_id" => $mapel, "login.status" => 1, "login.level" => 1,  "t_mapel.status" => 1);
    $dosen  =   $CI->db->select("t_mapel.id, data_guru.id as id_dosen, data_guru.nama as nama_dosen")->from("t_mapel")
    			->join("data_guru", "t_mapel.dosen_id = data_guru.id")
                ->join("login", "data_guru.id = login.user_id")
    			->where($where)->get()->result_array();
    return $dosen;
}

function getKelasMapel($mapel){
    $CI     =& get_instance();
    $where  = array('t_mapel.mapel_id' => $mapel);
    $mapel  = $CI->db->select('data_kelas.id as id_kelas, data_kelas.nama as nama_kelas, data_kelas.tahun as tahun_kelas')
                ->from('data_kelas')
                ->join('t_jadwal', 't_jadwal.kelas_id = data_kelas.id')
                ->join('t_mapel', 't_jadwal.t_mapel_id = t_mapel.id')
                ->join('mata_pelajaran', 't_mapel.mapel_id = mata_pelajaran.id')
                ->join('data_guru', 't_mapel.dosen_id = data_guru.id')
                ->where($where)
                ->get()
                ->result_array();
    return $mapel;
}

function getSubMateri($materi){
    $CI =& get_instance();
    $where  =   array("materi_id" => $materi);
    $submateri  = $CI->db->get_where('submateri', $where)->result_array();
    return $submateri;   
}

function getSubMateriTotal($materi){
    $CI =& get_instance();
    $where  =   array("materi_id" => $materi);
    $submateri  = $CI->db->get_where('submateri', $where)->num_rows();
    return $submateri;   
}

function getSubMateriNama($id){
    $CI =& get_instance();
    $where  =   array("id" => $id);
    $nama  = $CI->db->get_where('submateri', $where)->row()->nama;
    return $nama;   
}

function getKontenSubMateri($submateri){
    $CI =& get_instance();
    $where  =   array("submateri_id" => $submateri);
    $submateri  = $CI->db->get_where('kontenmateri', $where)->result_array();
    return $submateri;   
}

function kontenLab($submateri){
    $CI =& get_instance();
    $where  =   array("submateri_id" => $submateri, "tipe" => 'lab');
    $exist  = $CI->db->get_where('kontenmateri', $where)->num_rows();
    if($exist > 0)  {
        return $CI->db->get_where('kontenmateri', $where)->row()->id;
    }
    else{
        return 0;
    }
}

function kontenClass($submateri){
    $CI =& get_instance();
    $where  =   array("submateri_id" => $submateri, "tipe" => 'class');
    $exist  = $CI->db->get_where('kontenmateri', $where)->num_rows();
    if($exist > 0)  {
        return $CI->db->get_where('kontenmateri', $where)->row()->id;
    }
    else{
        return 0;
    }
}

function getTugasSiswa($idkonten){
    $CI =& get_instance();
    $where  =   array("id" => $idkonten);

    $konten     = $CI->db->get_where('kontenmateri', $where)->row();
    $submateri  = $konten->submateri_id;
    $tipe       = $konten->tipe;

    if($tipe == 'class')
        $col    =  'tugas_class';
    else
        $col    =  'tugas_lab';


    $tugas = $CI->db->select('progress.siswa_id as id_siswa, progress.'.$col.' as file_tugas, data_siswa.nama as nama_siswa')
            ->from('progress')
            ->join('data_siswa', 'progress.siswa_id = data_siswa.id')
            ->where($col." <> '' AND progress.submateri_id = $submateri")
            ->get()->result_array();

    /** PREVIOUSLY GET FROM TABLE TUGAS
    $tugas  = $CI->db->select("tugas.id as id_tugas, data_siswa.nama as nama_siswa, tugas.file as file_tugas")
                    ->from('tugas')
                    ->join('data_siswa', 'tugas.siswa_id = data_siswa.id')
                    ->where($where)
                    ->get()
                ->result_array();
    */
    return $tugas;   
}

function getNilaiSiswa($idsiswa, $idkonten){
    $CI =& get_instance();
    $where  =   array("kontenmateri_id" => $idkonten, "siswa_id" => $idsiswa);
    $nilai  =   $CI->db->get_where('nilai',$where);
    if($nilai->num_rows() > 0)
        return $nilai->row()->nilai;
    else
        return 0;
}

function getNilaiClass($idsiswa, $idsub){
    $CI =& get_instance();
    $where  =   array("submateri_id" => $idsub, "siswa_id" => $idsiswa);
    $nilai  =   $CI->db->get_where('nilai',$where);
    if(($nilai->num_rows()) > 0){
        return $nilai->row()->nilai_class;
    }
    else{
        return 0;
    }
}

function getNilaiLab($idsiswa, $idsub){
    $CI =& get_instance();
    $where  =   array("submateri_id" => $idsub, "siswa_id" => $idsiswa);
    $nilai  =   $CI->db->get_where('nilai',$where);
    if(($nilai->num_rows()) > 0)
        return $nilai->row()->nilai_lab;
    else
        return 0;
}

function getKomentar($idkonten){
    $CI =& get_instance();
    $where  =   array("kontenmateri_id" => $idkonten);
    $komentar  = $CI->db->order_by('tanggal', 'DESC')->get_where('komentar', $where)->result_array();
    return $komentar;   
}

function getNama($userid, $level){
    $CI =& get_instance();
    $where  =   array("id" => $userid);

    if($level == 2){
        $nama = $CI->db->get_where('data_siswa', $where)->row()->nama;
    }
    else{
        $nama = $CI->db->get_where('data_guru', $where)->row()->nama;   
    }
    return $nama;
}

function getKelasNama($id){
    $CI =& get_instance();
    $where  =   array("id" => $id);
    $nama  = $CI->db->get_where('data_kelas', $where)->row()->nama;
    return $nama;   
}


function getMapelNama($id){
    $CI =& get_instance();
    $where  =   array("id" => $id);
    $nama  = $CI->db->get_where('mata_pelajaran', $where)->row()->nama;
    return $nama;   
}


function getTMapelNama($idtmapel){
    $CI =& get_instance();
    $where  =   array("t_mapel.id" => $idtmapel);
    $nama  = $CI->db->select("mata_pelajaran.nama")
                    ->from("mata_pelajaran")
                    ->join("t_mapel", "t_mapel.mapel_id = mata_pelajaran.id")
                    ->where($where)
                    ->get()
                    ->row()
                    ->nama;
    return $nama;   
}

function get_progress($fields, $group_by, $where){
    $CI =& get_instance();

    $progress = $CI->db->select($fields)
                    ->from('progress')
                    ->join('submateri', 'progress.submateri_id = submateri.id')
                    ->join('materi', 'submateri.materi_id = materi.id')
                    ->join('detail_mapel', 'materi.id = detail_mapel.materi_id')
                    ->join('t_mapel', 'detail_mapel.t_mapel_id = t_mapel.id')
                    ->join('mata_pelajaran', 't_mapel.mapel_id = mata_pelajaran.id')
                    ->join('data_siswa', 'progress.siswa_id = data_siswa.id')
                    ->where($where)
                    ->group_by($group_by)
                    ->get()
                    ->result_array();
    return $progress;
}
?>