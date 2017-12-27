<?php
    class Front_model extends CI_Model {

        public function __construct()
        {
                parent::__construct();
        }

        public static function randompassword($password){
            $random     = "x0e7q5t1k3g8s2n4lr9f";
            $randompass = sha1(md5($random.md5($password).$random));
            return $randompass;
        }

        public static function check_username($username){
            $CI     =& get_instance();
            $exist  = $CI->db->get_where("login", "username = '".$username."'")->num_rows();
            if ($exist > 0) {
                return true;
            }
            return false;
        }

        public static function check_nim($nim){
            $CI     =& get_instance();
            $exist  = $CI->db->get_where("data_siswa", "nim = '".$nim."'")->num_rows();
            if ($exist > 0) {
                return true;
            }
            return false;
        }

        public static function get_kelas(){
            $CI     =& get_instance();
            $where  = array('status' => 1 );
            return $CI->db->get_where("data_kelas", $where)->result_array();;
        }

        public static function insert_guru($username, $password, $namalengkap, $nip, $email, $foto){
            $CI =& get_instance();
            
            $data_guru  =   array("nama"    => $namalengkap,
                                    "nip"       => $nip,
                                    "email"     => $email,
                                    "foto"      => $foto);
            // insert to tabel guru
            if($CI->db->insert("data_guru", $data_guru)){
                // get last insert id
                $user_id    = $CI->db->insert_id();

                //Untuk random password
                $CI->load->model('Front_model');
                $randompass = $CI->Front_model->randompassword($password);


                $data_login = array("username" => $username,
                                    "password" => $randompass,
                                    "user_id"  => $user_id,
                                    "level"    => 1
                                    );

                if($CI->db->insert("login", $data_login)){
                    return true;
                }
                else{
                    return false;
                }
            }else{
                return false;
            }
        }


        public static function insert_siswa($username, $password, $namalengkap, $nim, $email, $foto, $kelas){
            $CI =& get_instance();
            
            $data_siswa  =   array("nama"    => $namalengkap,
                                    "nim"       => $nim,
                                    "email"     => $email,
                                    "foto"      => $foto);
            // insert to tabel guru
            if($CI->db->insert("data_siswa", $data_siswa)){
                // get last insert id
                $user_id    = $CI->db->insert_id();
                //Untuk random password
                $CI->load->model('Front_model');
                $randompass = $CI->Front_model->randompassword($password);


                $data_login = array("username" => $username,
                                    "password" => $randompass,
                                    "user_id"  => $user_id,
                                    "level"    => 2
                                    );

                if($CI->db->insert("login", $data_login)){
                    // MASUKKAN SISWA KE KELAS
                    $data_detail_kelas  =   array("kelas_id" => $kelas, "siswa_id" =>$user_id);
                    if($CI->db->insert("detail_kelas", $data_detail_kelas)){
                        return true;
                    }
                    else{
                        return false;
                    }
                }
                else{
                    return false;
                }
            }else{
                return false;
            }
        }

        public static function login($username, $password){
            $CI =& get_instance();

            // CEK USERNAME
            if($CI->Front_model->check_username($username)){
                $data_login     = array("username" => $username, "password" => $password);
                // CEK PASSWORD SESUAI
                $match      = $CI->db->get_where("login", $data_login);
                if($match->num_rows() > 0){
                    return $match->row();
                }
                else{
                    return "Kata kunci tidak sesuai dengan nama pengguna tersebut.";
                }
            }
            else{
                return "Nama pengguna tidak ditemukan.";
            }

        }

        public static function write_log($username, $activity){
            $CI =& get_instance();

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
?>