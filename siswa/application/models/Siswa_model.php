<?php
    class Siswa_model extends CI_Model {

        public function __construct()
        {
                parent::__construct();
        }

        public static function get_kelas(){
            $CI     =& get_instance();
            return $CI->db->get("data_kelas")->result_array();
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

        public static function get_mapel(){
            $CI     =& get_instance();
            return $CI->db->get("data_kelas")->result_array();
        }

        public static function get_mapel_kelas($kelas){
            $CI     =& get_instance();
            $where  = array("kelas_id" => $kelas);

            $mapel  =   $CI->db->select('mata_pelajaran.id as id_mapel, mata_pelajaran.nama as nama_mapel,
                                data_guru.id as id_guru, data_guru.nama as nama_guru')
                                ->from('t_jadwal')
                                ->join('t_mapel', 't_mapel.id = t_jadwal.t_mapel_id')
                                ->join('mata_pelajaran', 't_mapel.mapel_id = mata_pelajaran.id')
                                ->join('data_guru', 't_mapel.dosen_id = data_guru.id')
                            ->where($where)->get()->result_array();
            return $mapel;
        }

        public static function get_mapel_siswa($username){
            $CI     =& get_instance();
            $where  = array("username" => $username);

            $data_siswa = $CI->Siswa_model->get_profil($username);
            $id_kelas   = $data_siswa[0]['id_kelas'];

            $mapel  = $CI->Siswa_model->get_mapel_kelas($id_kelas);
            return $mapel;
        }


        public static function get_materi_list($mapel){
            $CI     =& get_instance();
            $where  = array("mapel_id" => $mapel);

            $mapel  =  $CI->db->get('mata_pelajaran')->result_array();
            return $mapel;
        }


        public static function get_current_materi($username, $mapel){
            $CI     =& get_instance();

            $profil =  $CI->Siswa_model->get_profil($username);
            $id_siswa     =  $profil[0]['id_siswa'];
            $where  = array("user_id" => $id_siswa);

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

         public static function get_mapel_by_konten($id){
            $CI =& get_instance();
            $where  = array("kontenmateri.id" => $id);
            $mapel  = $CI->db->select('mata_pelajaran.nama as nama_mapel, materi.nama as nama_materi, submateri.nama as nama_submateri')
                                ->from('mata_pelajaran')
                                ->join('t_mapel', 't_mapel.mapel_id = mata_pelajaran.id')
                                ->join('detail_mapel', 'detail_mapel.t_mapel_id = t_mapel.id')
                                ->join('materi', 'detail_mapel.materi_id = materi.id')
                                ->join('submateri', 'submateri.materi_id = materi.id')
                                ->join('kontenmateri', 'kontenmateri.submateri_id = submateri.id')
                                ->where($where)
                                ->get()
                                ->result_array();
            return $mapel;
        }

        public static function get_konten_detail($id){
            $CI =& get_instance();
            $where  = array("kontenmateri.id" => $id);
            $materi  = $CI->db->get_where('kontenmateri',$where)->result_array();
            return $materi;
        }

        public static function get_first_materi($mapel){
            $CI     =& get_instance();
            $where  = array("mapel_id" => $mapel);

            $materi  =  $CI->db->select('submateri.id as id_submateri')
                            ->from('mata_pelajaran')
                            ->join('t_mapel', 't_mapel.mapel_id = mata_pelajaran.id')
                            ->join('detail_mapel', 'detail_mapel.t_mapel_id = t_mapel.id')
                            ->join('materi', 'materi.id = detail_mapel.materi_id')
                            ->join('submateri', 'submateri.materi_id = materi.id')
                            ->where($where)
                            ->limit(1)
                            ->get()->row()->id_submateri;
            return $materi; 
        }

    }
?>