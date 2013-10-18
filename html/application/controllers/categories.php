<?php
class Categories extends CI_Controller {
    protected $data = array("title" => "Categories");
    function __construct() {
        parent::__construct();
        $this -> load -> model('categories/categories_model');
        $this -> data['all_categories'] = $this -> categories_model -> get_categories();
    }

    function index() {
        $action_id = $this -> uri -> segment(2);

        $this -> template -> load('default', 'categories/' . $this -> set_action($action_id), $this -> data);
    }

    function set_action($action_id) {
        switch ($action_id) {
            case '1' :
                return "add_category";
                break;
            case '2' :
                return "edit_category";
                break;
            default :
                break;
        }
    }

    //Add new
    function add_new() {

        $this -> form_validation -> set_rules("category", "Category", "required|xss_clean");
        $this -> form_validation -> set_rules('category', "category", "required|is_unique[categories.category]|xss_clean");
        $category = $this->input->post("category", true);
        $this->form_validation->set_message("is_unique", "$category already exists");
        $valid = $this -> form_validation -> run();

        if ($valid) {
            $this -> categories_model -> add_category();
            $this->data['category_item']= $this->input->post("category", true); 
            $this -> template -> load('default', 'categories/success_page', $this -> data);
        } else {
            $this -> template -> load('default', 'categories/add_category', $this -> data);
        }
    }

    //Edit category
    function edit_categories() {
       $submitted = $this -> input -> post('submit');
      if (is_numeric($submitted)){
              
          $this->session->set_userdata('edit_cat_id', $submitted);
          $this->data['to_edit']= $this->categories_model->get_category();
          $this -> template -> load('default', 'categories/add_category', $this -> data);
      }
    }

}
