<?php

class Search_docs extends CI_Controller {

    protected $data = array("title" => "Search results");

    function __construct() {
        parent::__construct();
        $this->load->model('search/search_model');
    }

    function index() {
        $search = $this->input->post('search_docs', true);
        
        $items = $this->search_model->search_docs($search);
        
        $this->data['search_results'] = $items['search_results'];
        $this->data['items'] = $items['items'];
        $this->template->load('default', 'search/search_docs', $this->data);
    }

}