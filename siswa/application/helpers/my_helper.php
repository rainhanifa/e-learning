<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');


function getField($tables,$field,$pk,$value)
    {
        $CI =& get_instance();
        $data=$CI->db->query("select $field from $tables where $pk='$value'");
        if($data->num_rows()>0)
        {
            $data=$data->row_array();
            return $data[$field];
        }
        else
        {
            return '';
        }
    }

function get_status_pinjaman_by_id($id){
    $CI =& get_instance();
    $query_pinjaman     = "SELECT COUNT(dp.id_detail) AS total
                            FROM detail_peminjaman as dp
                            WHERE dp.id_peminjaman = $id AND dp.status_dokumen = 0";
    $jumlah             = $CI->db->query($query_pinjaman)->row()->total;
    if($jumlah > 0){
        $teks               = $jumlah." dokumen belum kembali";
        $query_jatuh_tempo  = "SELECT DATEDIFF(tanggal_jatuh_tempo, CURDATE()) AS selisih,
                                (SELECT CASE WHEN tanggal_jatuh_tempo>CURDATE() THEN 'false' ELSE 'true' END) AS lewat
                                FROM master_peminjaman WHERE id = $id";
        $selisih            = $CI->db->query($query_jatuh_tempo)->row()->selisih;
        $lewat              = $CI->db->query($query_jatuh_tempo)->row()->lewat;

        if($lewat=="true"){
            $label          = "<span class='label label-important'>".$teks."</span>";
        }
        else{
            if($selisih < 5){
                $label          = "<span class='label label-warning'>".$teks."</span>";
            }
        }
    }
    else{
        $label              = "<span class='label label-success'>OK</span>";
    }

    return $label;
}

function get_jumlah_dokumen_akan_jatuh_tempo(){
    $CI =& get_instance();
    $query_pinjaman     = "SELECT COUNT(dp.id_detail) AS total
                            FROM detail_peminjaman as dp, master_peminjaman as mp
                            WHERE dp.id_peminjaman = mp.id AND dp.status_dokumen = 0 
                                AND DATEDIFF(tanggal_jatuh_tempo, CURDATE()) < 5 
                                AND tanggal_jatuh_tempo > CURDATE()";
    $jumlah             = $CI->db->query($query_pinjaman)->row()->total;
    return $jumlah;
}

function get_jumlah_dokumen_jatuh_tempo(){
    $CI =& get_instance();
    $query_pinjaman     = "SELECT COUNT(dp.id_detail) AS total
                            FROM detail_peminjaman as dp, master_peminjaman as mp
                            WHERE dp.id_peminjaman = mp.id AND dp.status_dokumen = 0 
                                AND tanggal_jatuh_tempo <= CURDATE()";
    $jumlah             = $CI->db->query($query_pinjaman)->row()->total;
    return $jumlah;
}


function dokumen_lengkap_by_master($id)
{
    $CI =& get_instance();
    $query_lengkap = "SELECT dd.* FROM detail_data as dd
                        WHERE dd.id_master_data = $id AND dd.status = 1 ";
    $detail_dokumen = $CI->db->query($query_lengkap)->result_array() ;
    return $detail_dokumen;
}