<?php
class Landing_page extends CI_Controller {

    protected $data = array("title" => "Login");

    function __construct() {
        parent::__construct();
    }
    function index() {

        $this->load->view('home/landing_page');
        //$this -> template -> load('universal', 'cizacl/login', $this -> data);
    }

    
}

