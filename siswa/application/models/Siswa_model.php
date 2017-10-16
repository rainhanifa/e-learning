<?php
    class Siswa_model extends CI_Model {

        public function __construct()
        {
                parent::__construct();
        }

        public static function get_kelas(){
            $CI     =& get_instance();
            return $CI->db->get("data_kelas")->result_array();;
        }

        public static function get_profil($username){
        	$CI     =& get_instance();

        	$profil =	$CI->db->select('data_siswa.id as id_siswa, username,
        					data_siswa.nama as nama_siswa,
        					nim, email, foto,
        					data_kelas.id as id_kelas, data_kelas.nama as nama_kelas,
        					data_kelas.tahun as tahun_kelas')
        				->from('data_siswa')
        				->join('login', 'data_siswa.id = login.user_id')
        				->join('detail_kelas', 'data_siswa.id = detail_kelas.siswa_id')
        				->join('data_kelas', 'detail_kelas.kelas_id = data_kelas.id')
        				->where('login.username = "'.$username.'"')->get()->result_array();
        	return $profil;
        }

    }
?>