<?php
    class Siswa_model extends CI_Model {

        public function __construct()
        {
            parent::__construct();
        }

        public static function randompassword($password){
            $random     = "x0e7q5t1k3g8s2n4lr9f";
            $randompass = sha1(md5($random.md5($password).$random));
            return $randompass;
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

        public static function get_mapel_kelas($kelas){
            $CI     =& get_instance();
            $where  = array("kelas_id" => $kelas);

            $mapel  =   $CI->db->select('t_mapel.id as id_mapel, mata_pelajaran.nama as nama_mapel,
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


        public static function get_materi_list($tmapel){
            $CI     =& get_instance();
            $where  = array("t_mapel.id" => $tmapel);
            $mapel  = $CI->db->select("t_mapel.id, mata_pelajaran.id as id_mapel, materi.nama as nama_materi, materi.id as id_materi")
                            ->from("t_mapel")
                            ->join("mata_pelajaran", "t_mapel.mapel_id = mata_pelajaran.id")
                            ->join("detail_mapel", "detail_mapel.t_mapel_id = t_mapel.id")
                            ->join("materi", "detail_mapel.materi_id = materi.id")
                            ->where($where)
                            ->get()
                            ->result_array();
            return $mapel;
        }

        public static function get_current_materi(){
            $CI     =& get_instance();
            $where  = array("progress.siswa_id" => $CI->userid, "t_mapel.id" => $CI->mapel);

            $materi   =  $CI->db->select('progress.submateri_id as id_submateri')
                            ->from('progress')
                            ->join('submateri', 'progress.submateri_id = submateri.id')
                            ->join('materi', 'submateri.materi_id = materi.id')
                            ->join('detail_mapel', 'detail_mapel.materi_id = materi.id')
                            ->join('t_mapel', 'detail_mapel.t_mapel_id = t_mapel.id')
                            ->where($where)
                            ->order_by('submateri_id', 'DESC')
                            ->get();
            if($materi->num_rows() > 0){
                $current  = $materi->result_array();
                $current_id = $current[0]['id_submateri'];
                return $current_id;
            }
            else{
                return false;
            }
        }

        public static function get_materi_status($id_submateri){
            $CI     =& get_instance();
            $where  = array("siswa_id" => $CI->userid, "submateri_id" => $id_submateri);

            $materi   =  $CI->db->get_where('progress', $where);

            if($materi->num_rows() > 0){
                $current  = $materi->result_array();
                $current_status = $current[0]['status'];
                return $current_status;
            }
            else{
                return false;
            }
        }

        public static function get_mapel_by_konten($id){
            $CI     =& get_instance();
            $where  = array("kontenmateri.id" => $id);
            $mapel  = $CI->db->select('mata_pelajaran.id as id_mapel,
                                        mata_pelajaran.nama as nama_mapel,
                                        materi.id as id_materi,
                                        materi.nama as nama_materi,
                                        submateri.id as id_submateri,
                                        submateri.nama as nama_submateri')
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
            $CI     =& get_instance();
            $where  = array("kontenmateri.id" => $id);
            $materi  = $CI->db->select("kontenmateri.id as id_konten, kontenmateri.isi as isi, kontenmateri.tipe as tipe, 
                                        submateri.id as id_submateri, submateri.nama as nama_submateri,
                                        materi.id as id_materi, materi.nama as nama_materi,
                                        mata_pelajaran.id as id_mapel, mata_pelajaran.nama as nama_mapel,
                                        data_guru.id as id_dosen, data_guru.nama as nama_dosen
                                        ")
                            ->from('kontenmateri')
                            ->join('submateri', 'kontenmateri.submateri_id = submateri.id')
                            ->join('materi', 'submateri.materi_id = materi.id')
                            ->join('detail_mapel', 'detail_mapel.materi_id = materi.id')
                            ->join('t_mapel', 'detail_mapel.t_mapel_id = t_mapel.id')
                            ->join('mata_pelajaran', 't_mapel.mapel_id = mata_pelajaran.id')
                            ->join('data_guru', 't_mapel.dosen_id = data_guru.id')
                            ->where($where)
                            ->get()
                        ->result_array();
            return $materi;
        }

        public static function get_konten_detail_by_submateri($id_submateri){
            $CI     =& get_instance();
            $where  = array("submateri.id" => $id_submateri);
            $materi  = $CI->db->select("kontenmateri.id as id_konten, kontenmateri.isi as isi, kontenmateri.tipe as tipe, 
                                        submateri.id as id_submateri, submateri.nama as nama_submateri,
                                        materi.id as id_materi, materi.nama as nama_materi,
                                        mata_pelajaran.id as id_mapel, mata_pelajaran.nama as nama_mapel,
                                        data_guru.id as id_dosen, data_guru.nama as nama_dosen
                                        ")
                            ->from('kontenmateri')
                            ->join('submateri', 'kontenmateri.submateri_id = submateri.id')
                            ->join('materi', 'submateri.materi_id = materi.id')
                            ->join('detail_mapel', 'detail_mapel.materi_id = materi.id')
                            ->join('t_mapel', 'detail_mapel.t_mapel_id = t_mapel.id')
                            ->join('mata_pelajaran', 't_mapel.mapel_id = mata_pelajaran.id')
                            ->join('data_guru', 't_mapel.dosen_id = data_guru.id')
                            ->where($where)
                            ->limit(1,0)
                            ->get()
                        ->result_array();
            return $materi;
        }

        public static function progress_exist($submateri_id){
            $CI     =& get_instance();
            $where  = array("siswa_id" => $CI->userid, "submateri_id" => $submateri_id);

            $exist  = $CI->db->get_where('progress', $where)->num_rows();
            if($exist > 0)
                return true;
            else
                return false;
        }

        public static function progress_percentage($mapel){
            $CI     =& get_instance();
            // GET NUM OF SUBMATERI BY MAPEL IN T_MAPEL
            $where  = array("mapel_id" => $mapel);
            $total_submateri  =  $CI->db->select('submateri.id as id_submateri')
                                ->from('mata_pelajaran')
                                ->join('t_mapel', 't_mapel.mapel_id = mata_pelajaran.id')
                                ->join('detail_mapel', 'detail_mapel.t_mapel_id = t_mapel.id')
                                ->join('materi', 'materi.id = detail_mapel.materi_id')
                                ->join('submateri', 'submateri.materi_id = materi.id')
                                ->where($where)->get()->num_rows();

            // GET NUM OF SUBMATERI BY MAPEL AND SISWA IN PROGRESS
            $where2  = array("mapel_id" => $mapel, "siswa_id" => $CI->userid, "progress.status" => 1);
            $total_progress  =  $CI->db->select('submateri.id as id_submateri')
                                ->from('mata_pelajaran')
                                ->join('t_mapel', 't_mapel.mapel_id = mata_pelajaran.id')
                                ->join('detail_mapel', 'detail_mapel.t_mapel_id = t_mapel.id')
                                ->join('materi', 'materi.id = detail_mapel.materi_id')
                                ->join('submateri', 'submateri.materi_id = materi.id')
                                ->join('progress', 'progress.submateri_id = submateri.id')
                                ->where($where2)->get()->num_rows();

            if($total_submateri > 0)
                $percentage = round($total_progress/$total_submateri * 100);
            else
                $percentage = 0;
            return $percentage;
        }

        public static function get_tipe_konten($idkonten){
            $CI     =& get_instance();
            $where  =   array("id" => $idkonten);
            $tipe   =   $CI->db->get_where('kontenmateri', $where)->row()->tipe;
            return $tipe;
        }

        public static function get_first_materi($mapel){
            $CI     =& get_instance();
            $where  = array("t_mapel.id" => $mapel);

            $materi  =  $CI->db->select('submateri.id as id_submateri, kontenmateri.id as id_konten')
                            ->from('mata_pelajaran')
                            ->join('t_mapel', 't_mapel.mapel_id = mata_pelajaran.id')
                            ->join('detail_mapel', 'detail_mapel.t_mapel_id = t_mapel.id')
                            ->join('materi', 'materi.id = detail_mapel.materi_id')
                            ->join('submateri', 'submateri.materi_id = materi.id')
                            ->join('kontenmateri', 'kontenmateri.submateri_id = submateri.id')
                            ->where($where)
                            ->limit(1)
                            ->get()->result_array();
            return $materi; 
        }

        public static function get_first_kontenmateri($submateri){
            $CI     =& get_instance();
            $where  = array("submateri_id" => $submateri);

            $materi  =  $CI->db->get_where("kontenmateri", $where)->result_array();
            return $materi; 
        }

        public static function get_prev_materi($idkonten){
            $CI     =& get_instance();

            $tipe       =   $CI->Siswa_model->get_tipe_konten($idkonten);
            $detail     =   $CI->Siswa_model->get_konten_detail($idkonten);
            $submateri_id   =   $detail[0]['id_submateri'];
            $materi_id      =   $detail[0]['id_materi'];
            $mapel_id       =   $detail[0]['id_mapel'];



            $konten         =   '';

            // AMBIL DARI SUB MATERI YANG SAMA
            if($tipe == 'lab'){
                // konten class untuk sub materi yang sama
                $where      =   "submateri_id = $submateri_id AND tipe = 'class'";
                $konten_exist     =   $CI->db->get_where("kontenmateri", $where);

                if($konten_exist->num_rows() > 0){
                    // jika ada
                    $konten =   $konten_exist->row()->id;
                    return $konten;
                }
            }

            // AMBIL DARI MATERI YANG SAMA
            $where          =   "submateri.id < $submateri_id AND materi.id = $materi_id";
            $submateri_prev =   $CI->db->select("kontenmateri.id as id_konten")
                            ->from('kontenmateri')
                            ->join('submateri', 'kontenmateri.submateri_id = submateri.id')
                            ->join('materi', 'submateri.materi_id = materi.id')
                            ->join('detail_mapel', 'detail_mapel.materi_id = materi.id')
                            ->join('t_mapel', 'detail_mapel.t_mapel_id = t_mapel.id')
                            ->join('mata_pelajaran', 't_mapel.mapel_id = mata_pelajaran.id')
                            ->where($where)
                            ->order_by("kontenmateri.id", "DESC")
                            ->limit(1,0)
                            ->get();

            if( $submateri_prev->num_rows() > 0){
                $konten = $submateri_prev->row()->id_konten;
                return $konten;
            }

            // AMBIL DARI MAPEL YANG SAMA
            $where          =   "materi.id < $materi_id AND mata_pelajaran.id = $mapel_id";
            $materi_prev =   $CI->db->select("kontenmateri.id as id_konten")
                            ->from('kontenmateri')
                            ->join('submateri', 'kontenmateri.submateri_id = submateri.id')
                            ->join('materi', 'submateri.materi_id = materi.id')
                            ->join('detail_mapel', 'detail_mapel.materi_id = materi.id')
                            ->join('t_mapel', 'detail_mapel.t_mapel_id = t_mapel.id')
                            ->join('mata_pelajaran', 't_mapel.mapel_id = mata_pelajaran.id')
                            ->where($where)
                            ->order_by("kontenmateri.id", "DESC")
                            ->limit(1,0)
                            ->get();

            if( $materi_prev->num_rows() > 0){
                $konten = $materi_prev->row()->id_konten;
                return $konten;
            }
            return $konten;
        }
        

        public static function get_next_materi($idkonten){
            $CI     =& get_instance();
            $tipe       =   $CI->Siswa_model->get_tipe_konten($idkonten);
            $detail     =   $CI->Siswa_model->get_konten_detail($idkonten);
            
            $submateri_id   =   $detail[0]['id_submateri'];
            $materi_id      =   $detail[0]['id_materi'];
            $mapel_id       =   $detail[0]['id_mapel'];

            $konten         =   '';

            // UNTUK NEXT HARUS DICEK: APAKAH STATUS SUDAH 1
            $progress_status        =   $CI->Siswa_model->get_materi_status($submateri_id);
            
            // AMBIL DARI SUB MATERI YANG SAMA
            if($tipe == 'class'){
                // konten class untuk sub materi yang sama
                $where      =   "submateri_id = $submateri_id AND tipe = 'lab'";
                $konten_exist       =   $CI->db->get_where("kontenmateri", $where);

                if($konten_exist->num_rows() > 0){
                    // jika ada
                    $konten =   $konten_exist->row()->id;
                    return $konten;
                }
            }
            

            if($progress_status == 1){
                // AMBIL DARI MATERI YANG SAMA
                $where          =   "submateri.id > $submateri_id AND materi.id = $materi_id";
                $submateri_prev =   $CI->db->select("kontenmateri.id as id_konten")
                                ->from('kontenmateri')
                                ->join('submateri', 'kontenmateri.submateri_id = submateri.id')
                                ->join('materi', 'submateri.materi_id = materi.id')
                                ->join('detail_mapel', 'detail_mapel.materi_id = materi.id')
                                ->join('t_mapel', 'detail_mapel.t_mapel_id = t_mapel.id')
                                ->join('mata_pelajaran', 't_mapel.mapel_id = mata_pelajaran.id')
                                ->where($where)
                                ->order_by("kontenmateri.id", "DESC")
                                ->limit(1,0)
                                ->get();

                if( $submateri_prev->num_rows() > 0){
                    $konten = $submateri_prev->row()->id_konten;
                    return $konten;
                }

                // AMBIL DARI MAPEL YANG SAMA
                $where          =   "materi.id > $materi_id AND mata_pelajaran.id = $mapel_id";
                $materi_prev =   $CI->db->select("kontenmateri.id as id_konten")
                                ->from('kontenmateri')
                                ->join('submateri', 'kontenmateri.submateri_id = submateri.id')
                                ->join('materi', 'submateri.materi_id = materi.id')
                                ->join('detail_mapel', 'detail_mapel.materi_id = materi.id')
                                ->join('t_mapel', 'detail_mapel.t_mapel_id = t_mapel.id')
                                ->join('mata_pelajaran', 't_mapel.mapel_id = mata_pelajaran.id')
                                ->where($where)
                                ->order_by("kontenmateri.id", "DESC")
                                ->limit(1,0)
                                ->get();

                if( $materi_prev->num_rows() > 0){
                    $konten = $materi_prev->row()->id_konten;
                    return $konten;
                }
            }
            return $konten;
        }


        public static function update_pass($userid, $password){
            $CI =& get_instance();
            $randompass = $CI->Siswa_model->randompassword($password);

            $data_pass  =   array("password" => $randompass, );
            $where      =   array("user_id" => $userid, "level" => 2);

            $CI->db->where($where);
            if($CI->db->update('login', $data_pass)){
                $activity   =   "mengubah password";
                $this->Siswa_model->write_log($activity);
                
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
            if($CI->db->update('data_siswa', $data_guru)){
                $activity   =   "memperbarui foto";
                $this->Siswa_model->write_log($activity);
                return true;
            }
            else{
                return false;
            }
        }

        public static function update_profil($userid, $nama, $nip, $email){
            $CI =& get_instance();
            $data_guru  =   array("nama" => $nama, "nim" => $nip, "email" => $email);
            $where      =   array('id' => $userid);

            $CI->db->where($where);
            if($CI->db->update('data_siswa', $data_guru)){
                $activity   =   "memperbarui profil";
                $this->Siswa_model->write_log($activity);
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
}