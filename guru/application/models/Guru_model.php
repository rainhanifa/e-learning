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
                        ->where("level = 1 AND status = 1")->get()->result_array();
            return $dosen;
        }

        public static function get_detail_dosen($id){
            $CI     =& get_instance();
            $where  = array("level" => 1, "id" => $id);
            $dosen  = $CI->db->select("*, data_guru.nama as nama_guru")->from("data_guru")->join("login", "login.user_id = data_guru.id AND login.status = 1")
                        ->where($where)->get()->result_array();
            return $dosen;
        }

        public static function get_mapel(){
            $CI     =& get_instance();
            $mapel  = $CI->db->get("mata_pelajaran")->result_array();
            return $mapel;
        }


        public static function get_mapel_kelas($kelas){
            $CI     =& get_instance();
            $where  = array('t_jadwal.kelas_id' => $kelas);
            $mapel  = $CI->db->select('t_jadwal.id as id_jadwal, mata_pelajaran.nama as nama_mapel, data_guru.nama as nama_dosen')
                        ->from('t_jadwal')
                        ->join('t_mapel', 't_jadwal.t_mapel_id = t_mapel.id')
                        ->join('mata_pelajaran', 't_mapel.mapel_id = mata_pelajaran.id')
                        ->join('data_guru', 't_mapel.dosen_id = data_guru.id')
                        ->where($where)
                        ->get()
                        ->result_array();
            return $mapel;
        }


        public static function getDetailMapel($mapel){
            $CI     =& get_instance();
            $where  = array("id" => $mapel);
            $mapel  = $CI->db->get_where("mata_pelajaran", $where)->result_array();
            return $mapel;
        }


        public static function getAvailableDosen($mapel){
            $CI =& get_instance();
           
            // $where  = "NOT EXISTS
            //             (SELECT * FROM t_mapel WHERE mapel_id = ".$mapel.")";
            // $dosen  = $CI->db->select("*")->FROM("data_guru")
            //                 ->join("login", "data_guru.id = login.user_id")
            //                 ->where($where." AND login.level = 1")->get()->result_array();
            $dosen  = $CI->db->query("SELECT * FROM data_guru JOIN login ON data_guru.id = login.user_id
                                        WHERE data_guru.id NOT IN
                                        (SELECT dosen_id FROM t_mapel WHERE mapel_id = ".$mapel.")
                                        AND login.level = 1 AND login.status = 1")->result_array();
            return $dosen;
        }

        public static function getMapelDosen($dosen){
            $CI =& get_instance();
            $where  = array("dosen_id" => $dosen);
            $mapel  = $CI->db->select("t_mapel.id as id_mapel, nama as nama_mapel")
                            ->from("t_mapel")
                            ->join("mata_pelajaran", "t_mapel.mapel_id = mata_pelajaran.id")
                            ->where($where)
                            ->get()
                            ->result_array();
            return $mapel;
        }

        public static function getMateriDosen($dosen){
            $CI =& get_instance();
            $where  = array("dosen_id" => $dosen);
            $mapel  = $CI->db->select("mata_pelajaran.nama as nama_mapel,
                                    materi.nama as nama_materi, materi.id as id_materi")
                            ->from("t_mapel")
                            ->join("mata_pelajaran", "t_mapel.mapel_id = mata_pelajaran.id")
                            ->join("detail_mapel", "detail_mapel.t_mapel_id = t_mapel.id")
                            ->join("materi", "detail_mapel.materi_id = materi.id")
                            ->where($where)
                            ->get()
                            ->result_array();
            return $mapel;
        }


        public static function getMateriDosenbyMapel($dosen, $mapel){
            $CI =& get_instance();
            $where  = array("dosen_id" => $dosen, "mata_pelajaran.id" => $mapel);
            $mapel  = $CI->db->select("mata_pelajaran.nama as nama_mapel,
                                    materi.nama as nama_materi, materi.id as id_materi")
                            ->from("t_mapel")
                            ->join("mata_pelajaran", "t_mapel.mapel_id = mata_pelajaran.id")
                            ->join("detail_mapel", "detail_mapel.t_mapel_id = t_mapel.id")
                            ->join("materi", "detail_mapel.materi_id = materi.id")
                            ->where($where)
                            ->get()
                            ->result_array();
            return $mapel;
        }

        public static function getSubMateriDosen($dosen){
            $CI =& get_instance();
            $where  = array("dosen_id" => $dosen);
            $mapel  = $CI->db->select("submateri.id as id_submateri, submateri.nama as nama_submateri")
                            ->from("t_mapel")
                            ->join("mata_pelajaran", "t_mapel.mapel_id = mata_pelajaran.id")
                            ->join("detail_mapel", "detail_mapel.t_mapel_id = t_mapel.id")
                            ->join("materi", "detail_mapel.materi_id = materi.id")
                            ->join("submateri", "submateri.materi_id = materi.id")
                            ->where($where)
                            ->get()
                            ->result_array();
            return $mapel;
        }

        public static function getMateribyNama($nama){
            $CI =& get_instance();
            $where  = array("nama" => $nama);
            $materi  = $CI->db->get_where('materi', $where)->result_array();
            return $materi;
        }

        public static function checkMateriExist($nama){
            $CI =& get_instance();
            $where  = array("nama" => $nama);
            $materi  = $CI->db->get_where('materi', $where);;
            if($materi->num_rows() > 0){
                return $materi->row()->id;
            }
            else{
                return false;
            }
        }

        public static function getMateriDetail($id){
            $CI =& get_instance();
            $where  = array("materi.id" => $id);
            $materi  = $CI->db->get_where('materi',$where)->result_array();
            return $materi;
        }

        public static function getKontenDetail($id){
            $CI =& get_instance();
            $where  = array("kontenmateri.id" => $id);
            $materi  = $CI->db->get_where('kontenmateri',$where)->result_array();
            return $materi;
        }

        public static function getMapelbyKonten($id){
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


        public static function getAvailableMapelKelas($id_kelas){
            $CI =& get_instance();
            $mapel  = $CI->db->query("SELECT t_mapel.id as id_mapel, mata_pelajaran.nama as nama_mapel,
                                        data_guru.nama as nama_dosen
                                        FROM mata_pelajaran
                                        JOIN t_mapel ON t_mapel.mapel_id = mata_pelajaran.id
                                        JOIN data_guru ON t_mapel.dosen_id = data_guru.id
                                        WHERE t_mapel.id NOT IN
                                        (SELECT t_mapel_id FROM t_jadwal WHERE t_jadwal.kelas_id = ".$id_kelas.")
                                    ")->result_array();
            return $mapel;
        }


        public static function getTugasKonten($id){
            $CI =& get_instance();
            $where  = array("kontenmateri.id" => $id);
            $mapel  = $CI->db->select('tugas.id as id_tugas, tugas.file as file_tugas, data_siswa.id as id_siswa, data_siswa.nama as nama_siswa, data_siswa.nim as nim_siswa')
                                ->from('tugas')
                                ->join('kontenmateri', 'kontenmateri.id = tugas.kontenmateri_id')
                                ->join('data_siswa', 'data_siswa.id = tugas.siswa_id')
                                ->where($where)
                                ->get()
                                ->result_array();
            return $mapel;
        }

        public static function deleteKonten($id){
            $CI =& get_instance();
            $where  =   array('id' => $id);
            if($CI->db->delete('kontenmateri', $where)){
                return "Konten telah dihapus";
            }else{
                return "Konten gagal dihapus";
            }
        }

    }
?>