<?php
class User_management extends CI_Controller {

    protected $data = array("title" => "Users");
    function __construct() {
        parent::__construct();
        $this -> load -> model('users/users_model');
        $this -> data['regions'] = $this -> users_model -> get_regions();
        $this -> data['roles'] = $this -> users_model -> get_roles();
        $this -> data['status'] = $this -> users_model -> get_status();
        $this -> data["org_users"] = $this -> users_model -> get_users();
    }

    function index() {
        $action_id = $this -> uri -> segment(2);

        if ($action_id == 1) {
            $this -> template -> load('default', 'users/add_users', $this -> data);
        } elseif ($action_id == 2) {
            $this -> template -> load('default', 'users/manage_users', $this -> data);
        }

    }

    // Add user
    function add_user() {
        $valid = $this -> validate_users();
        if ($valid) {

            $email_details =$this -> users_model -> add_user();
            
            if(count($email_details)>0){
           
            $message = "User profile created for: " . base_url() ."\r\n";
            $message = $message . "User name: " .$email_details['email'] .  "\r\n";
            $message = $message . "Password: " .$email_details['password'] .  "\r\n";
            $message = str_replace("\r\n", "<br>", $message);
            
            $email_address = $email_details['email'];
            
               $this->send_email($message, $email_address, "HCS profile");
               
            }
            
            $this -> template -> load('default', 'users/success_page', $this -> data);
        } else {
            $this -> template -> load('default', 'users/add_users', $this -> data);
        }

    }
    
    
        //Send email
    function send_email($message, $email_address, $subject) {
        $this -> email -> from('admin@hcsshare.org', 'HCS Share Web admin');
        $this -> email -> to($email_address);
        $this -> email -> subject($subject);
        $this -> email -> message($message);

        $this -> email -> send();

        //echo $this -> email -> print_debugger();

    }

    // Add user
    function edit_user() {
        $valid = $this -> validate_existing_users();
        if ($valid) {

            $this -> users_model -> edit_user();

            $this -> template -> load('default', 'users/success_page', $this -> data);
        } else {
            $user_id = $this -> session -> userdata("current_user_id");
            $users = $this -> data["org_users"];

            for ($i = 0; $i < count($users); $i++) {
                $user = $users[$i];
                if ($user_id === $user["user_id"]) {
                    $this -> data["form"] = $user;
                }
            }
            $this -> template -> load('default', 'users/edit_users', $this -> data);
        }

    }

    //Manage user
    function manage_users() {
        $user_id = $this -> input -> post("submit");
        if (!is_numeric($user_id)) {
            $id_value = substr($user_id, 1);
           $this->users_model->delete_user($id_value);
            redirect('user_management/2');
        }else{
        
        $this -> session -> set_userdata("current_user_id", $user_id);
        $users = $this -> data["org_users"];

        for ($i = 0; $i < count($users); $i++) {
            $user = $users[$i];
            if ($user_id === $user["user_id"]) {
                $this -> data["form"] = $user;
            }
        }

        $this -> template -> load('default', 'users/edit_users', $this -> data);
        }
    }

    function validate_users() {
        //New user
        $this -> form_validation -> set_rules('user_profile_name', 'First name', 'trim|required|xss_clean');
        $this -> form_validation -> set_rules('user_profile_surname', 'Surname', 'trim|required|xss_clean');
        $this -> form_validation -> set_rules('user_profile_email', 'Email', 'trim|required|is_unique[user_profiles.user_profile_email]|valid_email');
        $this -> form_validation -> set_rules('user_password', 'Password', 'trim|required|matches[user_password2]|xss_clean');
        $this -> form_validation -> set_rules('user_password2', 'Password confirmation', 'trim|required|xss_clean');
        $this -> form_validation -> set_rules('role', 'Role', 'required|greater_than[0]');
        $this -> form_validation -> set_rules('region', 'Region', 'callback_check_region');
        $this -> form_validation -> set_rules('role', 'Role', 'callback_check_role');
        $this -> form_validation -> set_rules('status', 'Status', 'callback_check_status');

        $email = $this -> input -> post("user_profile_email", true);
        $this -> form_validation -> set_message('is_unique', "Email: $email already in use");

        return $this -> form_validation -> run();

    }

    function validate_existing_users() {
        $this -> form_validation -> set_rules('user_username', 'Username', 'xss_clean');
        $this -> form_validation -> set_rules('user_profile_name', 'First name', 'trim|required|xss_clean');
        $this -> form_validation -> set_rules('user_profile_surname', 'Surname', 'trim|required|xss_clean');
        $this -> form_validation -> set_rules('region', 'Region', 'callback_check_region');
        $this -> form_validation -> set_rules('role', 'Role', 'callback_check_role');
        $this -> form_validation -> set_rules('status', 'Status', 'callback_check_status');

        $password = $this -> input -> post('user_password', true);
        $password2 = $this -> input -> post('user_password2', true);

        if (!empty($password) || !empty($password2)) {
            $this -> form_validation -> set_rules('user_password', 'Password', 'trim|required|matches[user_password2]|md5|xss_clean');
            $this -> form_validation -> set_rules('user_password2', 'Password confirmation', 'trim|required|xss_clean');
        }
        return $this -> form_validation -> run();

    }

    function check_region($dropdown_selection) {
          
        if ($dropdown_selection == 0) {
            $this -> form_validation -> set_message('check_region', 'You must specifiy a value region');
            return false;
        } else {

            return true;
        }
    }

    function check_role($dropdown_selection) {

        if ($dropdown_selection == 0) {
            $this -> form_validation -> set_message('check_role', 'You must specifiy a value for role');
            return false;
        } else {

            return true;
        }
    }

    function check_status($dropdown_selection) {

        if ($dropdown_selection == 0) {
            $this -> form_validation -> set_message('check_status', 'You must specifiy a value for status');
            return false;
        } else {

            return true;
        }
    }

}
?>