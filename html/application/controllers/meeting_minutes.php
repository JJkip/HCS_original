<?php
class Meeting_minutes extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this -> load -> model("hcs_tab/hcs_view_model");
        $content = $this -> hcs_view_model -> get_minutes();
        $this -> data['content'] = $content;
        $this -> data["organizations"] = $this -> hcs_view_model -> get_organizations();
        $this -> data['org_id'] = 0;
    }

    function index() {
        $this -> template -> load('default', 'hcs_tab_view/meeting_minutes', $this -> data);
    }

    function filter() {
        $organization_id = $this -> uri -> segment(3);
        $this -> data['org_id'] = $organization_id;

        $this -> data['content'] = $this -> hcs_view_model -> get_org_minutes($organization_id);

        $this -> template -> load('default', 'hcs_tab_view/meeting_minutes', $this -> data);

    }

}
?>