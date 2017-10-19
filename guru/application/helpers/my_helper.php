<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

function getTotalSiswa($kelas){
    $CI =& get_instance();
    $where  =   array("kelas_id" => $kelas);
    $total  =   $CI->db->select("COUNT(siswa_id) AS total")->from("detail_kelas")->where($where)->get()->row()->total;
    return $total;
}

function getDosenMapel($mapel){
	$CI =& get_instance();
    $where  =   array("mapel_id" => $mapel);
    $dosen  =   $CI->db->select("t_mapel.id, data_guru.id as id_dosen, data_guru.nama as nama_dosen")->from("t_mapel")
    			->join("data_guru", "t_mapel.dosen_id = data_guru.id")
    			->where($where)->get()->result_array();
    return $dosen;
}

function getDosen($mapel){
    $CI =& get_instance();
   
    $where  = "NOT EXISTS
                (SELECT * FROM t_mapel WHERE mapel_id = ".$mapel.")";
    $dosen  = $CI->db->select("*")->FROM("data_guru")
                    ->join("login", "data_guru.id = login.user_id")
                    ->where($where." AND login.level = 1")->get()->result_array();
    //$dosen  = $CI->db->query("SELECT * FROM data_guru JOIN login ON data_guru.id = login.user_id
                                // WHERE NOT EXISTS
                                // (SELECT * FROM t_mapel WHERE mapel_id = $mapel)
                                // AND login.level = 1")->result_array();
    return $dosen;
}
?>