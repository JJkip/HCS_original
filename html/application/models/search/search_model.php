<?php

class Search_model extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    function search_docs($search_text) {
        $search_results = array();
        $docs = array();
        $tools = array();
        $innovations = array();
        $reports = array();
        $meeting_minutes = array();


        //Documents
        $this->db->like('title', $search_text);
        $this->db->or_like('file_name', $search_text);
        $docs_query = $this->db->get('documents');
        if ($docs_query) {
            $docs = $docs_query->result_array();
        }

        //Tools
        $this->db->like('title', $search_text);
        $this->db->or_like('file_name', $search_text);
        $tools_query = $this->db->get('organization_tools');
        if ($tools_query) {
            $tools = $tools_query->result_array();
        }

        //Innovations
        $this->db->like('title', $search_text);
        $this->db->or_like('file_name', $search_text);
        $innovations_query = $this->db->get('innovations_and_lessons');
        if ($innovations_query) {
            $innovations = $innovations_query->result_array();
        }

        //Reports
        $this->db->like('title', $search_text);
        $this->db->or_like('file_name', $search_text);
        $reports_query = $this->db->get('reports');
        if ($reports_query) {
            $reports = $reports_query->result_array();
        }

        //Meeting Minutes
        $this->db->like('title', $search_text);
        $this->db->or_like('file_name', $search_text);
        $minutes_query = $this->db->get('meeting_minutes');
        if ($minutes_query) {
            $meeting_minutes = $minutes_query->result_array();
        }


//check if we have any items from our search
        if (count($docs) > 0 || count($tools) > 0 || count($innovations) > 0 || count($reports) > 0 || count($meeting_minutes) > 0)
            $items = 0;
        else
            $items = -1;
        $search_results["Documents"] = $docs;
        $search_results["Tools"] = $tools;
        $search_results["Innovations"] = $innovations;
        $search_results["Reports"] = $reports;
        $search_results["Meeting minutes"] = $meeting_minutes;
        $data=array ('items'=>$items,'search_results'=>$search_results);
        
//        $data['items']=$items;
//        $data['search_results']=$search_results;
//        echo '<pre>';
//        var_dump($data);
//         echo '</pre>';
        return $data;
    }

    function get_docs($title) {
        $this->db->select('*');
        $this->db->like('title', $title);
        $query = $this->db->get('documents');
        if ($query->num_rows > 0) {
            foreach ($query->result_array() as $row) {
                $new_row['label'] = htmlentities(stripslashes($row['title']));
                $new_row['value'] = htmlentities(stripslashes($row['file_name']));
                $row_set[] = $new_row;
                //build an array
            }
            echo json_encode($row_set);
            //format the array into json data
        }
    }

}
