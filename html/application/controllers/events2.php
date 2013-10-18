<?php
class Events extends CI_Controller {
    protected $data = array("title" => "HCS");

    function __construct() {
        parent::__construct();
        $this -> load -> model("hcs_tab/hcs_view_model");
        $content = $this -> hcs_view_model -> get_events();
        $this -> data['content'] = $content;
        $this -> data["organizations"] = $this -> hcs_view_model -> get_organizations();
        $this -> data['org_id'] = 0;
    }

    function index() {
        $this -> template -> load('default', 'hcs_tab_view/events', $this -> data);
    }

    function filter() {
        $organization_id = $this -> uri -> segment(3);
        $this -> data['org_id'] = $organization_id;

        $this -> data['content'] = $this -> hcs_view_model -> get_org_events($organization_id);

        $this -> template -> load('default', 'hcs_tab_view/events', $this -> data);

    }

}
?>