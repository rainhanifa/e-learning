<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

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

function getNilaiClass($idsub){
    $CI =& get_instance();
    $where  =   array("submateri_id" => $idsub, "siswa_id" => $CI->userid);
    $nilai  =   $CI->db->get_where('nilai',$where);
    if(($nilai->num_rows()) > 0){
        return $nilai->row()->nilai_class;
    }
    else{
        return 0;
    }
}

function getNilaiLab($idsub){
    $CI =& get_instance();
    $where  =   array("submateri_id" => $idsub, "siswa_id" => $CI->userid);
    $nilai  =   $CI->db->get_where('nilai',$where);
    if(($nilai->num_rows()) > 0)
        return $nilai->row()->nilai_lab;
    else
        return 0;
}

function get_current_materi(){
    $CI     =& get_instance();
    $where  = array("user_id" => $CI->userid);

    $materi   =  $CI->db->select('*')
                    ->from('progress_belajar')
                    ->where($where)
                    ->order_by('submateri_id', 'DESC')
                    ->limit(1)
                    ->get();
    if($materi->num_rows() > 0){
        $current  = $materi->result_array();
        $current_id = $current[0]['submateri_id'];
        return $current_id;
    }
    else{
        return false;
    }
}

function set_progress($submateri, $class, $lab, $status){
    $CI     =& get_instance();
    // CHECK IF PROGRESS EXIST
    $exist  = $CI->Siswa_model->progress_exist($submateri);
    if($exist){
        if(($class != '') || ($lab != '')){
            // UPDATE IF UPLOADED
            if($class != ''){
                $data_progress  =   array("tugas_class" => $class);
            }
            else if($lab != ''){
                $data_progress  =   array("tugas_lab" => $lab);
            }
            $where  =   array("siswa_id" => $CI->userid, "submateri_id" => $submateri);

            $CI->db->where($where);
            if($CI->db->update('progress', $data_progress)){

                $tipekonten = "";
                if($class)
                    $tipekonten = 'class';
                else
                    $tipekonten = 'lab';
                $activity   =   "mengupload tugas ".$tipekonten."untuk submateri ".$submateri.")";
                $CI->Siswa_model->write_log($activity);
                
                return true;
            }
        }
    }
    else{
        $data_progress  =   array("siswa_id" => $CI->userid,
                            "submateri_id" => $submateri,
                            "tugas_class" => $class,
                            "tugas_lab" => $lab,
                            "status" => 0);
        if($CI->db->insert('progress', $data_progress)){
            return true;
        }
    }
        
    return false;
}

function get_progress_submateri($submateri_id){
    $CI     =& get_instance();

    // Siswa_model->progress_exist($submateri)
    $where  = array("siswa_id" => $CI->userid, "submateri_id" => $submateri_id);

    $exist  = $CI->db->get_where('progress', $where);
    if($exist->num_rows() > 0){
        $status   = $exist->row()->status;

        if($status == 1){
            return 'OK';
        }else{
            return 'Proses';
        }
    }
    else
        return 'Belum';
}
?>