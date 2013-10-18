<?php

class innovations_model extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    function save_file_data($data) {

        $this->db->insert('innovations_and_lessons', $data);
        /**
         * we need to insert the new document into our alerts table
         * from there it will be send in the weekly digest
         * @author Kirui Kennedy
         */
        $this->load->model('documents/documents_model');
        $alert_data = array();
        $alert_data['title'] = $data['title'];
        $alert_data['category'] = "innovations_and_lessons";
        $alert_data['url'] = "";
        $alert_data['source_id'] = $this->db->insert_id();
        $alert_data['user_group'] = "all";
        $this->documents_model->insert_alert($alert_data);
    }

    function get_tools() {

        $this->db->select("*");
        $this->db->from("innovations_and_lessons");
        $this->db->order_by("innovation_id", "DESC");
        $query = $this->db->get();
        return $query->result_array();
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

    function get_org_innovations($organization_id) {
        $this->db->select("*");
        $this->db->from("innovations_and_lessons");
        $this->db->join("users", "users.user_id = innovations_and_lessons.user_id", "inner");
        if ($organization_id != 0) {
            $this->db->where("organization_id", $organization_id);
        }
        $query = $this->db->get();
        if ($query) {
            return $query->result_array();
        }
    }

    function update_innovation($data, $innovation_id) {
        $this->db->where("innovation_id", $innovation_id);

        $this->db->update('innovations_and_lessons', $data);
    }

}
