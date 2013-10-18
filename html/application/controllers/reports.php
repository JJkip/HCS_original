<?php
class Reports extends CI_Controller {
    protected $data = array("title" => "HCS");

    function __construct() {
        parent::__construct();
        $this -> load -> model("hcs_tab/hcs_view_model");
        $this -> data["organizations"] = $this -> hcs_view_model -> get_organizations();
        $this -> data['org_id'] = 0;
    }

    function index() {  
     //var_dump($this->cizacl->check_isAllowed(3, 'reports'));
        $this -> select_view($this -> uri -> segment(2));

        $this -> template -> load('default', 'hcs_tab_view/reports', $this -> data);
    }

    function select_view($tab_id) {

        $this -> session -> unset_userdata('category');

        switch ($tab_id) {
            case '1' :
                $category = 'financial';
                $content = $this -> hcs_view_model -> get_reports($category);
                $this -> session -> set_userdata('category', $category);
                $this -> data['content'] = $content;
                break;
            case '2' :
                $category = 'narrative';
                $content = $this -> hcs_view_model -> get_reports($category);
                $this -> session -> set_userdata('category', $category);
                $this -> data['content'] = $content;
                break;
        }
    }
    function filter() {
        $organization_id = $this -> uri -> segment(3);
        $this -> data['org_id'] = $organization_id;

        $tab_id = $this -> uri -> segment(3);

        $report_type = $this -> session -> userdata('category');

        if ($tab_id == 1) {
            //Get Financial
            $report_type = 'financial';
        } elseif ($tab_id == 2) {
            //Get Narratives
            $report_type = 'narrative';
        }
        $this -> data['content'] = $this -> hcs_view_model -> get_org_reports($organization_id, $report_type);

        $this -> template -> load('default', 'hcs_tab_view/reports', $this -> data);

    }

}
