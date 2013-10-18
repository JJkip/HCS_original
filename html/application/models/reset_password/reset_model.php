<?php
/**
 *
 */
class Reset_model extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    function check_exists($email) {
        $this -> db -> where("user_profile_email", $email);
        $query = $this -> db -> get("user_profiles");
        $exists = false;

        if ($query) {
            if ($query -> num_rows() > 0) {
                $exists = true;
            }
        }
        return $exists;
    }

    function save_hash_key($email, $reset_hash) {
        $this -> db -> where('user_profile_email', $email);
        $data = array();
        $data['reset_hash'] = $reset_hash;
        $data['reset_timestamp'] = time();
        $this -> db -> update("user_profiles", $data);
    }

    function get_user($reset_hash) {
        $this -> db -> where('reset_hash', $reset_hash);
        $this -> db -> select('*');
        $this -> db -> from('user_profiles');
        $this -> db -> join("users", "users.user_id = user_profiles.user_profile_user_id", "inner");
        $query = $this -> db -> get();
        if ($query) {
            return $query -> result_array();
        }
    }

    function reset_password($user_id) {
        $data = array();
        $data['user_password'] = $this -> input -> post("user_password", true);
        $this -> db -> where('user_id', $user_id);
        $this -> db -> update("users", $data);
        
        $user_profile = array();       
        $user_profile['reset_hash'] = "";
        $user_profile['reset_timestamp'] = 0;
        $this -> db -> where('user_profile_user_id', $user_id);
        $this -> db -> update("user_profiles", $user_profile);
 
    }

}
