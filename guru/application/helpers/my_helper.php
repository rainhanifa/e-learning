<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

function getTotalSiswa($kelas){
    $CI =& get_instance();
    $where  =   array("kelas_id" => $kelas);
    $total  =   $CI->db->select("COUNT(siswa_id) AS total")->from("detail_kelas")->where($where)->get()->row()->total;
    return $total;
}
?>