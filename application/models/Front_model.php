<?php
    class Front_model extends CI_Model {

        public function __construct()
        {
                parent::__construct();
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
            return $CI->db->get("data_kelas")->result_array();;
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
                $random     = "x0e7q5t1k3g8s2n4lr9f";
                $randompass = sha1(md5($random.md5($password).$random));


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


        public static function insert_siswa($username, $password, $namalengkap, $nim, $email, $foto){
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
                $random     = "x0e7q5t1k3g8s2n4lr9f";
                $randompass = sha1(md5($random.md5($password).$random));


                $data_login = array("username" => $username,
                                    "password" => $randompass,
                                    "user_id"  => $user_id,
                                    "level"    => 2
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
}
?>