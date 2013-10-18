<?php
class Categories_model extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    function add_category() {

        $category_id = $this -> input -> post("category_id", true);
        $data = array();
        $data["category"] = $this -> input -> post("category", true);
      
        if (!empty($category_id)) {
          $this -> db -> where("category_id", $category_id);

          $this -> db -> update("categories", $data);

        } else {
            $this -> db -> insert("categories", $data);
        }
    }

    function get_categories() {
        $query = $this -> db -> get("categories");

        $categories = array();

        if ($query) {
            foreach ($query->result() as $row) {
                $categories[$row -> category_id] = $row -> category;
            }
        }
        return $categories;
    }

    function get_category() {
        $cat_id = $this -> session -> userdata('edit_cat_id');
        $this -> db -> where('category_id', $cat_id);
        $query = $this -> db -> get('categories');

        if ($query) {
            return $query -> result_array();
        }

    }

}
