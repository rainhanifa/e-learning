<?php
    class Guru_model extends CI_Model {

        public function __construct()
        {
                parent::__construct();
                $CI =& get_instance();
        }

        public static function randompassword($password){
            $random     = "x0e7q5t1k3g8s2n4lr9f";
            $randompass = sha1(md5($random.md5($password).$random));
            return $randompass;
        }

        public static function get_kelas(){
            $CI     =& get_instance();
            $where  =   array('status' => 1 );
            return $CI->db->get_where("data_kelas", $where)->result_array();;
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
                        ->order_by('data_siswa.nama')
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
            $where  =  array("status" => 1);
            $mapel  = $CI->db->get_where("mata_pelajaran", $where)->result_array();
            return $mapel;
        }

        public static function get_mapel_kelas($kelas){
            $CI     =& get_instance();
            $where  = array('t_jadwal.kelas_id' => $kelas, 'mata_pelajaran.status = 1');
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

        public static function get_kelas_by_mapel($tmapel){
            $CI     =& get_instance();
            $where  = array('t_mapel.id' => $tmapel);
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

        public static function getDetailMapel($mapel){
            $CI     =& get_instance();
            $where  = array("id" => $mapel);
            $mapel  = $CI->db->get_where("mata_pelajaran", $where)->result_array();
            return $mapel;
        }

        public static function get_full_detail_submateri($submateri){
            $CI =& get_instance();
            $where  =   array("submateri.id" => $submateri);
            $detail  = $CI->db->select('mata_pelajaran.id as id_mapel, mata_pelajaran.nama as nama_mapel, materi.id as id_materi, materi.nama as nama_materi, submateri.id as id_submateri, submateri.nama as nama_submateri, t_mapel.id as id_tmapel')
                            ->from('submateri')
                            ->join('materi', 'materi.id = submateri.materi_id')
                            ->join('detail_mapel', 'detail_mapel.materi_id = materi.id')
                            ->join('t_mapel', 't_mapel.id = detail_mapel.t_mapel_id')
                            ->join('mata_pelajaran', 't_mapel.mapel_id = mata_pelajaran.id')
                            ->where($where)->get()->result_array();
            return $detail;   
        }

        public static function get_full_detail_siswa($siswa){
            $CI =& get_instance();
            $where  =   array("data_siswa.id" => $siswa);
            $detail  = $CI->db->select('data_siswa.id as id_siswa, data_siswa.nama as nama_siswa, data_siswa.nim as nim_siswa, data_kelas.id as id_kelas, data_kelas.nama as nama_kelas, data_kelas.tahun as tahun_kelas')
                            ->from('data_siswa')
                            ->join('detail_kelas', 'detail_kelas.siswa_id = data_siswa.id')
                            ->join('data_kelas', 'detail_kelas.kelas_id = data_kelas.id')
                            ->where($where)->get()->result_array();
            return $detail;   
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
            $where  = array("dosen_id" => $dosen, "t_mapel.status" => 1);
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
            $where  = array("dosen_id" => $dosen, "t_mapel.status" => 1);
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


        public static function getMateriDosenbyMapel($dosen, $tmapel){
            $CI =& get_instance();
            $where  = array("dosen_id" => $dosen, "t_mapel.id" => $tmapel);
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

        public static function get_rapor($mapel, $kelas){
            $CI =& get_instance();
            return array(array("nama" => "A", "nilai" => 90),array("nama" => "B", "nilai" => 70));
        }


        public static function getNilaiSiswa($idsiswa, $idsubmateri){
            $CI =& get_instance();
            $where  =   array("submateri_id" => $idsubmateri, "siswa_id" => $idsiswa);
            $nilai  =   $CI->db->get_where('nilai',$where)->result_array();

            return $nilai;
        }

        public static function update_pass($userid, $password){
            $CI =& get_instance();
            $randompass = $CI->Guru_model->randompassword($password);

            $data_pass  =   array("password" => $randompass, );
            $where      =   array("user_id" => $userid, "level" => 1);

            $CI->db->where($where);
            if($CI->db->update('login', $data_pass)){
                $activity   =   "mengupdate foto untuk guru ID #".$userid;
                $CI->Guru_model->write_log($activity);
                return true;
            }
            else{
                return false;
            }
        }

        public static function update_foto($userid, $foto){
            $CI =& get_instance();
            $data_guru  =   array("foto" => $foto);
            $where      =   array('id' => $userid);

            $CI->db->where($where);
            if($CI->db->update('data_guru', $data_guru)){
                $activity   =   "mengupdate foto untuk guru ID #".$userid;
                $CI->Guru_model->write_log($activity);
                return true;
            }
            else{
                return false;
            }
        }

        public static function update_profil($userid, $nama, $nip, $email){
            $CI =& get_instance();
            $data_guru  =   array("nama" => $nama, "nip" => $nip, "email" => $email);
            $where      =   array('id' => $userid);

            $CI->db->where($where);
            if($CI->db->update('data_guru', $data_guru)){
                return true;
            }
            else{
                return false;
            }

        }

        public static function write_log($activity){
            $CI =& get_instance();

            $username   =   $CI->session->userdata('username');

            date_default_timezone_set("Asia/Jakarta");
            $time           = date("Y-m-d H:i:s");
            
            $log_data       = array("time" => $time, "username" => $username, "description" => $activity);
            if($CI->db->insert("activity_log", $log_data)){
                return true;
            }
            else{
                return false;
            }
        }

        public static function hapus_mapel($mapel){
            $CI =& get_instance();

            $hapus  =   array('status' => 0);
            $where  =   array("id" => $mapel);

            $CI->db->where($where);

            if($CI->db->update("mata_pelajaran", $hapus)){
                $where2     =   array('mapel_id' => $mapel);
                $CI->db->where($where2);
                if($CI->db->update("t_mapel", $hapus)){
                    //write log
                    $activity   =   "menghapus mata pelajaran ID #".$mapel;
                    $CI->Guru_model->write_log($activity);
                    return true;    
                }
                
            }
            return false;
        }

        public static function hapus_dosen_mapel($dosen, $mapel){
            $CI     =& get_instance();

            $hapus  =   array('status' => 0);
            $where  =   array("dosen_id" => $dosen, "mapel_id" => $mapel);

            $CI->db->where($where);
            if($CI->db->update("t_mapel", $hapus)){
                //write log
                $activity   =   "menghapus dosen ID #".$dosen." dari mata pelajaran ID #".$mapel;
                $CI->Guru_model->write_log($activity);
                return true;
            }
            return false;
        }

        public static function hapus_dosen($dosen){
            $CI     =& get_instance();

            $hapus = array("status" => 0);
            $where = array("user_id" => $dosen, "level" => 1);
            $CI->db->where($where);
            if($CI->db->update("login", $hapus)){
                //write log
                $activity   =   "menghapus dosen ID #".$dosen;
                $CI->Guru_model->write_log($activity);
                return true;
            }
            return false;
        }

        public static function hapus_kelas($kelas){
            $CI     =& get_instance();

            $hapus  =   array('status' => 0);
            $where  =   array("id" => $kelas);

            $CI->db->where($where);
            if($CI->db->update("data_kelas", $hapus)){
                //write log
                $activity   =   "menghapus kelas ID #".$kelas;
                $CI->Guru_model->write_log($activity);
                return true;
            }
            return false;
        }


        public static function hapus_konten($id){
            $CI =& get_instance();
            $where  =   array('id' => $id);
            if($CI->db->delete('kontenmateri', $where)){
                $activity   =   "menghapus konten ID #".$id;
                $CI->Guru_model->write_log($activity);
                return "Konten telah dihapus";
            }else{
                return "Konten gagal dihapus";
            }
        }


        public static function get_progress_by_dosen($dosen){
            $CI     =& get_instance();
            $where      =   array('dosen_id' => $dosen);

            $progress   =   $CI->db->select("data_siswa.id as id_siswa, 
                                            data_siswa.nama as nama_siswa, data_siswa.foto AS foto_siswa,
                                            submateri_id as id_submateri")
                                    ->from('progress')
                                    ->join('submateri', 'progress.submateri_id = submateri.id')
                                    ->join('materi', 'submateri.materi_id = materi.id')
                                    ->join('detail_mapel', 'materi.id = detail_mapel.materi_id')
                                    ->join('t_mapel', 'detail_mapel.t_mapel_id = t_mapel.id')
                                    ->join('mata_pelajaran', 't_mapel.mapel_id = mata_pelajaran.id')
                                    ->join('data_siswa', 'progress.siswa_id = data_siswa.id')
                                    ->where($where)
                                    ->group_by('data_siswa.id')
                                    ->get()
                                    ->result_array();
                                    //echo $CI->db->last_query();exit;
            return $progress;
        }

        public static function get_logs(){
            $CI     =& get_instance();
            $log    =   $CI->db->order_by('time', 'DESC')->get('activity_log')->result_array();
            return $log;
        }
    }
?>