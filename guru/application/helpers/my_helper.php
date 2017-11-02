<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

function getTotalSiswa($kelas){
    $CI =& get_instance();
    $where  =   array("kelas_id" => $kelas);
    $total  =   $CI->db->select("COUNT(siswa_id) AS total")->from("detail_kelas")->where($where)->get()->row()->total;
    return $total;
}

function getDosenMapel($mapel){
	$CI =& get_instance();
    $where  =   array("mapel_id" => $mapel, "login.status" => 1, "login.level" => 1);
    $dosen  =   $CI->db->select("t_mapel.id, data_guru.id as id_dosen, data_guru.nama as nama_dosen")->from("t_mapel")
    			->join("data_guru", "t_mapel.dosen_id = data_guru.id")
                ->join("login", "data_guru.id = login.user_id")
    			->where($where)->get()->result_array();
    return $dosen;
}

function getSubMateri($materi){
    $CI =& get_instance();
    $where  =   array("materi_id" => $materi);
    $submateri  = $CI->db->get_where('submateri', $where)->result_array();
    return $submateri;   
}

function getKontenSubMateri($submateri){
    $CI =& get_instance();
    $where  =   array("submateri_id" => $submateri);
    $submateri  = $CI->db->get_where('kontenmateri', $where)->result_array();
    return $submateri;   
}

function kontenLab($submateri){
    $CI =& get_instance();
    $where  =   array("submateri_id" => $submateri, "tipe" => 2);
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
    $where  =   array("submateri_id" => $submateri, "tipe" => 1);
    $exist  = $CI->db->get_where('kontenmateri', $where)->num_rows();
    if($exist > 0)  {
        return $CI->db->get_where('kontenmateri', $where)->row()->id;
    }
    else{
        return 0;
    }
}
?>