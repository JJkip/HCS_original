<?php
class Reset_password extends CI_Controller {
    protected $data = array("title" => "Reset Password");
    function __construct() {
        parent::__construct();
        $this -> load -> model("reset_password/reset_model");
    }

    function index() {
        //Load form for password rest
        $this -> template -> load('reset', 'reset_password/request_reset', $this -> data);
    }

    //Check if email for request exists
    function email_exists() {
        $this -> form_validation -> set_rules('email_reset', 'Email', 'required|valid_email|xss_clean');
        $valid = $this -> form_validation -> run();

        if ($valid) {
            //Check if email exists
            $email = $this -> input -> post('email_reset', true);
            $exists = $this -> reset_model -> check_exists($email);
            if ($exists) {
                $reset_hash = $this -> getRandomWord();
                //Save random word and timestamp it
                $this -> reset_model -> save_hash_key($email, $reset_hash);

                //Send email to given user with reset link

                $reset_link = base_url() . "index.php/reset_password/recover_password/" . $reset_hash;

                $message = "Click on the link below to reset your password within the next 24 hours.";

                $message = $message . "\r\n" . $reset_link;

                $message = str_replace("\r\n", "<br>", $message);
                //Email reset Link and notify user
                $this -> send_email($message, $email, "Password reset");

            }

            $this -> template -> load('reset', 'reset_password/request_sent', $this -> data);
        } else {
            //Not valid email display errors.
            $this -> template -> load('reset', 'reset_password/request_reset', $this -> data);
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

    //Recover password
    function recover_password() {
        $reset_hash = $this -> uri -> segment(3);
        $this -> session -> unset_userdata('reset_user_data');
        $reset_user_data = $this -> reset_model -> get_user($reset_hash);
        $hours = 25;
        if (count($reset_user_data) > 0) {
            $reset_timestamp = $reset_user_data[0]['reset_timestamp'];
            $now = time();
            $time_diff = $now - $reset_timestamp;
            $hours = floor($time_diff / 3600);

        }
        //var_dump($hours);
        if ($hours < 25) {
            $this -> template -> load('reset', 'reset_password/reset_form', $this -> data);
            $this -> session -> set_userdata('reset_user_data', $reset_user_data);
        } else {
            $this -> template -> load('reset', 'reset_password/request_reset', $this -> data);
        }
    }

    //
    function reset_user_password() {
        $this -> form_validation -> set_rules('user_password', 'Password', 'trim|required|matches[user_password2]|md5|xss_clean');
        $this -> form_validation -> set_rules('user_password2', 'Password confirmation', 'trim|required|xss_clean');

        $valid = $this -> form_validation -> run();

        if ($valid) {
            $user_reset_data = $this -> session -> userdata('reset_user_data');
            $user_id = $user_reset_data[0]['user_id'];
            //Now change password
            $this -> reset_model -> reset_password($user_id);
            $this -> template -> load('reset', 'reset_password/reset_success', $this -> data);

        } else {
            $this -> template -> load('reset', 'reset_password/reset_form', $this -> data);
        }
    }

    //Get random word
    function getRandomWord() {
        $len = 20;
        $word = array_merge(range('a', 'z'), range('A', 'Z'), range(0, 9));
        shuffle($word);
        $random = substr(implode($word), 0, $len);
        return md5($random);
    }

}
