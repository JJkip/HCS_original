<?php

class Tools_model extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    function save_file_data($data) {

        $this->db->insert('organization_tools', $data);
        /**
         * we need to insert the new document into our alerts table
         * from there it will be send in the weekly digest
         * @author Kirui Kennedy
         */
        $this -> load -> model('documents/documents_model');
        $alert_data = array();
        $alert_data['title'] = $data['title'];
        $alert_data['category'] = "tool";
        $alert_data['url'] = "";
        $alert_data['source_id'] = $this->db->insert_id();
        $alert_data['user_group'] = "all";
        $this->documents_model->insert_alert($alert_data);
    }

    function get_tools() {
        $this->db->select("*");
        $this->db->from("organization_tools");
        $this->db->order_by("tool_id", "DESC");
        $query = $this->db->get();

        return $query->result_array();
    }

    function get_org_tools($organization_id) {
        $this->db->select("*");
        $this->db->from("organization_tools");
        $this->db->join("users", "users.user_id = organization_tools.user_id", "inner");
        if ($organization_id != 0) {
            $this->db->where("organization_id", $organization_id);
        }
        $query = $this->db->get();
        if ($query) {
            return $query->result_array();
        }
    }

    //Organizations
    function get_organizations() {
        $query = $this->db->get("organizations");
        $organizations = array();
        $organizations["0"] = "--Select organization--";
        if ($query) {

            foreach ($query->result() as $row) {
                $organizations[$row->organization_id] = $row->organization;
            }
        }
        return $organizations;
    }

    //
    function update_tools($data, $tool_id) {
        $this->db->where("tool_id", $tool_id);

        $this->db->update('organization_tools', $data);
    }

}
