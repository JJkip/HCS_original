<?php

class Hcs_tab_model extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    //Upload Report/Meeting minutes
    function save_file_data($data, $table) {

        $this->db->insert($table, $data);
        /**
         * we need to push the news item to the alerts table
         * @author Kirui Kennedy
         */
        $this->load->model('documents/documents_model');
        $alert_data = array();
        $alert_data['title'] = $data["title"];
        $alert_data['category'] = $table;
        $alert_data['url'] = "";
        $alert_data['source_id'] = $this->db->insert_id();
        $alert_data['user_group'] = "all";
        $this->documents_model->insert_alert($alert_data);
    }

    //Save Event
    function save_event() {
        $user_data = $this->session->userdata('user_data');
        $start_date = strtotime($this->input->post("start_date", true));
        $end_date = strtotime($this->input->post("end_date", true));

        $data = array();
        $data["event_name"] = $this->input->post("event_name", true);
        $data["description"] = $this->input->post("description", true);
        $data["start_date"] = date("Y-m-d H:i:s", $start_date);
        $data["end_date"] = date("Y-m-d H:i:s", $end_date);
        $data["event_venue"] = $this->input->post("event_venue", true);
        $data["user_id"] = $user_data['user_id'];
        $this->db->insert("events", $data);
        /**
         * we need to push the news item to the alerts table
         * @author Kirui Kennedy
         */
        $this->load->model('documents/documents_model');
        $alert_data = array();
        $alert_data['title'] = $data["event_name"];
        $alert_data['category'] = "event";
        $alert_data['url'] = "";
        $alert_data['source_id'] = $this->db->insert_id();
        $alert_data['user_group'] = "all";
        $this->documents_model->insert_alert($alert_data);
    }

    //Update Event
    function update_event($event_id) {
        $user_data = $this->session->userdata('user_data');
        $start_date = strtotime($this->input->post("start_date", true));
        $end_date = strtotime($this->input->post("end_date", true));

        $data = array();
        $data["event_name"] = $this->input->post("event_name", true);
        $data["description"] = $this->input->post("description", true);
        $data["start_date"] = date("Y-m-d H:i:s", $start_date);
        $data["end_date"] = date("Y-m-d H:i:s", $end_date);
        $data["event_venue"] = $this->input->post("event_venue", true);
        $data['edited'] = time();
        $this->db->where('event_id', $event_id);
        $this->db->update("events", $data);
    }

    //Save News
    function save_news($file_name) {
        $this->load->helper('url');
        $user_data = $this->session->userdata('user_data');
        $data = array();
        $data["news_title"] = $this->input->post("news_title", true);
        $data['slug'] = url_title($data["news_title"], 'dash', TRUE);
        $data["description"] = $this->input->post("description", true);
        $data["date_created"] = unix_to_human(time(), TRUE, 'eu');
        $data["user_id"] = $user_data['user_id'];
        $data["file"] = $file_name;
        $this->db->insert('news', $data);
        /**
         * we need to push the news item to the alerts table
         * @author Kirui Kennedy
         */
        $this->load->model('documents/documents_model');
        $alert_data = array();
        $alert_data['title'] = $data["news_title"];
        $alert_data['category'] = "news";
        $alert_data['url'] = "";
        $alert_data['source_id'] = $this->db->insert_id();
        $alert_data['user_group'] = "all";
        $this->documents_model->insert_alert($alert_data);
    }

    //Update News
    function update_news($file_name) {
        $this->load->helper('url');
        $data = array();
        $data["news_title"] = $this->input->post("news_title", true);
        $data['slug'] = url_title($data["news_title"], 'dash', TRUE);
        $data["description"] = $this->input->post("description", true);
        $data["file"] = $file_name;
		$data['edited'] = time();
        $this->db->where('news_id', $this->input->post("news_id"));
        return $this->db->update('news', $data);
    }

    //Update reports
    function update_reports($data, $report_id) {
        $this->db->where("report_id", $report_id);
        $this->db->update('reports', $data);
    }

    //Update meeting minutes
    function update_minutes($data, $meeting_minutes_id) {
        $this->db->where("meeting_minutes_id", $meeting_minutes_id);
        $this->db->update('meeting_minutes', $data);
    }

}
