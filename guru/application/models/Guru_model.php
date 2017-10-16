<?php
    class Guru_model extends CI_Model {

        public function __construct()
        {
                parent::__construct();
        }

        public static function get_kelas(){
            $CI     =& get_instance();
            return $CI->db->get("data_kelas")->result_array();;
        }


        public static function get_kelas_by_id($kelas){
            $CI     =& get_instance();
            $where  = array("id" => $kelas);
            return $CI->db->get_where("data_kelas", $where)->result_array();;
        }


        public static function get_profil($username, $level){
            $CI     =& get_instance();

            $profil =   $CI->db->select('data_guru.id as id_guru, username,
                            data_guru.nama as nama_guru,
                            nip, email, foto,')
                        ->from('data_guru')
                        ->join('login', 'data_guru.id = login.user_id')
                        ->where('login.username = "'.$username.'" AND login.level = '.$level)->get()->result_array();
            return $profil;
        }

        public static function get_kelas_mapel($mapel, $dosen){
            $CI     =& get_instance();

            $data =   $CI->db->select('data_siswa.id as id_siswa, username,
                            data_siswa.nama as nama_siswa,
                            nim, email, foto,
                            data_kelas.id as id_kelas, data_kelas.nama as nama_kelas,
                            data_kelas.tahun as tahun_kelas')
                        ->from('data_siswa')
                        ->join('login', 'data_siswa.id = login.user_id')
                        ->join('detail_kelas', 'data_siswa.id = detail_kelas.siswa_id')
                        ->join('data_kelas', 'detail_kelas.kelas_id = data_kelas.id')
                        ->where('login.username = "'.$username.'"')->get()->result_array();
            return $data;
        }


        public static function get_siswa_kelas($kelas){
            $CI     =& get_instance();
            $where   =  array("detail_kelas.kelas_id" => $kelas,
                                "level" => 2);
            $data =   $CI->db->select('data_siswa.id as id_siswa, username,
                            data_siswa.nama as nama_siswa,
                            nim, email, foto')
                        ->from('data_siswa')
                        ->join('login', 'data_siswa.id = login.user_id')
                        ->join('detail_kelas', 'data_siswa.id = detail_kelas.siswa_id')
                        ->where($where)->get()->result_array();
            return $data;
        }


        public static function get_dosen(){
            $CI     =& get_instance();
            $dosen  = $CI->db->select("*")->from("data_guru")->join("login", "login.user_id = data_guru.id")
                        ->where("level = 1")->get()->result_array();
            return $dosen;
        }



        public static function get_detail_dosen($id){
            $CI     =& get_instance();
            $where  = array("level" => 1, "id" => $id);
            $dosen  = $CI->db->select("*, data_guru.nama as nama_guru")->from("data_guru")->join("login", "login.user_id = data_guru.id")
                        ->where($where)->get()->result_array();
            return $dosen;
        }

    }
?>