<?php

class Home_model extends CI_Model {

    function __construct() {
        $this->load->model('mediacenter_model');
        parent::__construct();
    }
	
	function get_docs(){
		 $content = array();
        //Documents
        $this->db->select("documents.title, 
                           documents.description, 
                           documents.directory_path, 
                           documents.file_name, 
                           documents.size, 
                           documents.upload_date,
                           organizations.organization
                          
                          ");
        $this->db->from("documents");
		$this->db->join("users", "users.user_id = documents.user_id", "inner");
		$this->db->join("organizations", "organizations.organization_id = users.organization_id", "inner");
        $this->db->order_by("documents.upload_date", "DESC");
        $this->db->limit(10);
        $query = $this->db->get();
        
        if ($query) {
             return $query->result_array();
        }
	}
	
    function get_all_content() {
        $content = array();

        //Documents
        $this->db->order_by("upload_date", "DESC");
        $this->db->limit(10);
	
        $doc_quey = $this->db->get("documents");
        $org_users = array();
        if ($doc_quey) {

            foreach ($doc_quey->result() as $row) {
                //Array of user_id -> Organization
                $org_users[$row->user_id] = $this->mediacenter_model->get_user_details($row->user_id);
            }
            $content["org_users"] = $org_users;
            $content["documents"] = $doc_quey->result_array();
        }
		
        //News
        $this->db->order_by("news_id", "DESC");
        $this->db->limit(10);
        $query = $this->db->get('news');
        if ($query) {
            $news_before = $query->result_array();
            foreach ($news_before as $news) {
                $user_info = $this->mediacenter_model->get_user_details($news['user_id']);
                if (count($user_info) > 0) {
                    $news['organization'] = $user_info->organization;
                    $news['date_created'] = date('j F Y', strtotime($news['date_created']));
                    $news['url'] = site_url('news/item/' . $news['slug']);
                    $content["news"][] = $news;
                }
            }
//             $content["news"]
        }
//        $this -> db -> order_by("date_created", "DESC");
//        $news_query = $this -> db -> get("news");
//        if ($news_query) {
//            $content["news"] = $news_query -> result_array();
//        }
        //header('Content-Type: application/json; charset=utf-8');
        return json_encode($content);
    }

    function get_user_details($user_id) {
        //first get the user's organization id
        $this->db->select('users.organization_id, organizations.organization');
        $this->db->from('users');
        $this->db->join('organizations', 'organizations.organization_id  = users.organization_id', 'left');
        $this->db->where('users.user_id', $user_id);
        $query = $this->db->get();
        if ($query) {
            return $query->row()->organization;
        }
    }

    //Latest Documents
    function get_uploads() {
        $this->db->order_by("document_id", "DESC");
        $query = $this->db->get('documents');
        if ($query) {
            return $query->result_array();
        }
    }

    //Latest News
    function get_news() {
        $this->db->order_by("news_id", "DESC");
        $query = $this->db->get('news');
        if ($query) {
            return $query->result_array();
        }
    }
    public function fetch_docs(){
      		 $content = array();
        //Documents
        $this->db->select("documents.title, 
                           documents.description, 
                           documents.directory_path, 
                           documents.file_name, 
                           documents.size, 
                           documents.upload_date,
                           organizations.organization
                          
                          ");
        $this->db->from("documents");
		$this->db->join("users", "users.user_id = documents.user_id", "inner");
		$this->db->join("organizations", "organizations.organization_id = users.organization_id", "inner");
        $this->db->order_by("documents.upload_date", "DESC");
        $this->db->limit(4);
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

    function get_organization_docs($organization_id, $table) {

        $this->db->select("*");
        $this->db->from($table);

        //Latest Documents
        if (strcasecmp($table, "documents") == 0) {
            $this->db->order_by("upload_date", "DESC");
        }
        //Latest news
        elseif (strcasecmp($table, "news") == 0) {
            $this->db->order_by("date_created", "DESC");
        }
        $this->db->join("users", "users.user_id = " . $table . ".user_id", "inner");
        if ($organization_id != 0) {
            $this->db->where('organization_id', $organization_id);
        }
        $query = $this->db->get();
        $results = array();
        if ($query) {

           if (strcasecmp($table, "news") == 0) {
                $news_before = $query->result_array();
                foreach ($news_before as $news) {
                    $user_info = $this->mediacenter_model->get_user_details($news['user_id']);
                    $news['organization'] = $user_info->organization;
                    $news['date_created'] = date('j F Y', strtotime($news['date_created']));
                    $news['url'] = site_url('news/item/' . $news['slug']);
                    $results[] = $news;
                }
            } else {
                $results = $query->result_array();
            }
            return json_encode($results);
        }
    }

    //Filter by organization
    function filter_content($filter, $content) {

        $this->db->where('organization_id', $filter);

        $user_query = $this->db->get('users');

        $user_ids = array();

        $user_index = 0;
        if ($user_query) {

            foreach ($user_query->result() as $row) {

                $user_ids[$user_index] = $row->user_id;

                $user_index++;
            }
        }

        $this->db->where('organization_id', $filter);

        $user_query = $this->db->get('users');

        $user_ids = array();

        $user_index = 0;
        if ($user_query) {

            foreach ($user_query->result() as $row) {

                $user_ids[$user_index] = $row->user_id;

                $user_index++;
            }
        }
        $data = array();
        for ($i = 0; $i < count($user_ids); $i++) {
            $this->db->where("user_id", $user_ids[$i]);

            $data_query = $this->db->get($content);

            if ($data_query) {
                $data[$i] = $data_query->result_array();
            }
        }

        return json_encode($data);
    }

    function sort_content($sort, $content) {

    }

    //Sort
}

?>