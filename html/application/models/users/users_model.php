<?php
class Users_model extends CI_Model {
    function __construct() {
        parent::__construct();
    }

    //Regions
    function get_regions() {
        $query = $this -> db -> get('regions');
        $regions = array();
        $regions[0] = " -- ";
        if ($query) {
            foreach ($query->result() as $row) {
                $regions[$row -> region_id] = $row -> region;
            }
        }

        return $regions;
    }

    //Roles
    function get_roles() {
        $this -> db -> where('cizacl_role_id !=', '1');
        //Not Admin
        $this -> db -> where('cizacl_role_id !=', '2');
        //Not Guest
        $query = $this -> db -> get('cizacl_roles');

        $roles = array();
        $roles[0] = " -- ";
        if ($query) {
            foreach ($query->result() as $row) {
                $roles[$row -> cizacl_role_id] = $row -> cizacl_role_name;
            }
        }

        return $roles;
    }

    //Get status
    function get_status() {
        $query = $this -> db -> get("user_status");
        $status = array();
        $status[0] = " -- ";
        if ($query) {
            foreach ($query->result() as $row) {
                $status[$row -> user_status_id] = $row -> user_status_name;
            }
        }
        return $status;
    }

    //Organization users
    function get_users() {
        $user_data = $this -> session -> userdata('user_data');
        $user_id = $user_data['user_id'];
        $this -> db -> where('user_id', $user_id);

        $org_query = $this -> db -> get("users");

        $organization_id = '';

        if ($org_query) {
            foreach ($org_query->result() as $row) {
                $organization_id = $row -> organization_id;
            }
        }
        //Limit to users belonging to an organization
        $this -> db -> where("organization_id", $organization_id);
        $this -> db -> from('users');
        $this -> db -> from('user_profiles');
        $this -> db -> from('user_status');
        $this -> db -> from('cizacl_roles');
        $this -> db -> where('user_id = user_profile_user_id');
        $this -> db -> where('user_cizacl_role_id = cizacl_role_id');
        $this -> db -> where('user_profile_user_status_code = user_status_code');
        $query = $this -> db -> get();

        Return $query -> result_array();

    }

     function delete_user($user_id) {
         //Users table
        $this -> db -> where('user_id', $user_id);
        $this -> db -> delete('users');
        
        //User profile
        $this -> db -> where('user_profile_user_id', $user_id);
        $this -> db -> delete('user_profiles');
    }

    //Done by champions
    function add_user() {
        //Get Organization_ID
        $user_data = $this -> session -> userdata('user_data');

        $user_id = $user_data['user_id'];

        $this -> db -> where('user_id', $user_id);

        $champ_query = $this -> db -> get("users");

        $org_id = '';

        if ($champ_query) {
            foreach ($champ_query->result() as $row) {
                $org_id = $row -> organization_id;
            }
        }
        $plain_pass = $this -> input -> post("user_password", true);
        
        $data = array();
        $data['user_cizacl_role_id'] = $this -> input -> post("role", true);
        $data['user_username'] = $this -> input -> post("user_profile_email", true);
        $data['organization_id'] = $org_id;
        $data['region_id'] = $this -> input -> post("region", true);
        $data['user_password'] = md5($plain_pass);
        $this -> db -> insert("users", $data);
        $user_query = $inserted_user_id = $this -> db -> insert_id();
        //Save User profiles
        $user_profile = array();
        $user_profile["user_profile_name"] = $this -> input -> post("user_profile_name", true);
        $user_profile["user_profile_surname"] = $this -> input -> post("user_profile_surname", true);
        $user_profile["user_profile_email"] = $this -> input -> post("user_profile_email", true);
        $user_profile["user_profile_user_status_code"] = $this -> input -> post("status", true);
        $user_profile["user_profile_added_by"] = $user_id;
        $user_profile["user_profile_user_id"] = $inserted_user_id;
        $user_profile["user_profile_added"] = time();
        $profile_query = $this -> db -> insert("user_profiles", $user_profile);
        
        $email_details = array();
        
        if($user_query && $profile_query){
            $email_details['email'] = $this -> input -> post("user_profile_email", true);
            $email_details['password'] = $plain_pass;
        }
        
        return $email_details;
    }

    //Edit user
    function edit_user() {
        //Get Organization_ID
        $user_data = $this -> session -> userdata('user_data');

        $user_id = $user_data['user_id'];
        $this -> db -> where('user_id', $user_id);
        $champ_query = $this -> db -> get("users");

        $org_id = '';

        if ($champ_query) {
            foreach ($champ_query->result() as $row) {
                $org_id = $row -> organization_id;
            }
        }

        $user_id_edited = $this -> input -> post("user_id_edited", true);

        $data = array();
        $data['user_cizacl_role_id'] = $this -> input -> post("role", true);
        $data['region_id'] = $this -> input -> post("region", true);
        $this -> db -> where("user_id", $user_id_edited);
        $this -> db -> update("users", $data);

        //Save User profiles
        $user_profile = array();
        $user_profile["user_profile_name"] = $this -> input -> post("user_profile_name", true);
        $user_profile["user_profile_surname"] = $this -> input -> post("user_profile_surname", true);
        $user_profile["user_profile_email"] = $this -> input -> post("user_profile_email", true);
        $user_profile["user_profile_user_status_code"] = $this -> input -> post("status", true);
        $user_profile["user_profile_edited"] = time();
        $user_profile["user_profile_edited_by"] = $user_id;
        $this -> db -> where("user_profile_user_id", $user_id_edited);
        $this -> db -> update("user_profiles", $user_profile);
    }

}
?>