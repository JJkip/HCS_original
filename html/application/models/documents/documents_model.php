<?php

class Documents_model extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    function get_categories() {

        $query = $this->db->get('categories');

        $categories = array();

        foreach ($query->result() as $row) {

            $categories[$row->category_id] = $row->category;
        }

        return $categories;
    }

    function get_alerts() {
        $this->db->select('*');
        $this->db->from("alerts");
        $this->db->where('sent', "0");
        $this->db->order_by('id', 'ASC');
//        $this->db->order_by('category','ASC');
        $query = $this->db->get();

        return $query->result();
    }

    function update_alert($id) {
        date_default_timezone_set('Africa/Nairobi');
        $date = date('Y-m-d h:i:s', time());

//        echo 'date: '.$date; die;
        $data = array(
            'sent' => 1,
            'sent_on' => $date,
        );
        $this->db->where('id', $id);
        $this->db->update('alerts', $data);
    }

    function update_alert_list($id) {
        date_default_timezone_set('Africa/Nairobi');
        $date = date('Y-m-d h:i:s', time());

//        echo 'date: '.$date; die;
        $data = array(
            'sent' => 1,
            'sent_on' => $date,
        );
        $this->db->where('id', $id);
        $this->db->update('alerts_subscriber_list', $data);
    }

    function insert_digest($digest) {
        $this->db->insert('alerts_digest', $digest);
        return $this->db->insert_id();
    }

    function get_pending_digests() {
        $this->db->select('al.email,al.id,d.digest');
        $this->db->from("alerts_subscriber_list as al");
        $this->db->join("alerts_digest as d", "d.id = al.digest_id", "left");
        $this->db->where('al.sent', "0");
        $this->db->order_by("al.id", "asc");
        $this->db->limit(10);
        $query = $this->db->get();
        return $query->result();
    }

    function get_user_emails($type) {
        $this->db->select('user_profile_email');
        $this->db->from("user_profiles");

        $query = $this->db->get();
        return $query->result();
    }

    function get_champions() {
        $this->db->select('u.user_username as email,pr.user_profile_name');
        $this->db->from("users as u");
        $this->db->join("user_profiles as pr", "pr.user_profile_user_id = u.user_id", "left");
        $this->db->where('u.user_cizacl_role_id', 4);
        $query = $this->db->get();
        return $query->result();
    }

    function insert_emailing_list($data) {
        $this->db->insert('alerts_subscriber_list', $data);
//        return $this->db->insert_id();
    }

    function get_docs($org_id = 0, $category = 0) {
        //        $organization_id = $this->session->userdata('organization_id');
        //        $category = $this->session->userdata('category_id');
        if ($category <> 0) {
            $this->db->select('document_id');
            $this->db->from("document_categories");
            $this->db->where('category_id', $category);
            $query = $this->db->get();
            $num_rows = $query->num_rows();
            $res = $query->result();
            $ids = '';
            $counter = 1;
            foreach ($res as $r) {
                if ($counter == $num_rows)
                    $ids .= $r->document_id;
                else
                    $ids .= $r->document_id . ',';
                $counter++;
            }
            $id_arr = explode(",", $ids);
            //            echo '<pre>';
            //            var_dump($id_arr);
            //            die;
        }
        $this->db->select("*");
        $this->db->from("documents");
        $this->db->order_by("document_id", "DESC");
        $this->db->join("users", "users.user_id = documents.user_id", "inner");
        $this->db->where('organization_id', $org_id);
        if ($category <> 0)
            $this->db->where_in('document_id', $id_arr);

        $query = $this->db->get();

        return $query->result_array();
    }

    function save_file_data($data, $categories) {

        $this->db->insert('documents', $data);

        $user_data = $this->session->userdata('user_data');

        $user_id = $user_data['user_id'];

        $this->db->where('user_id', $user_id);

        $document_id = $this->db->insert_id();
        /**
         * we need to insert the new document into our alerts table
         * from there it will be send in the weekly digest
         * @author Kirui Kennedy
         */
        $alert_data = array();
        $alert_data['title'] = $data['title'];
        $alert_data['category'] = "document";
        $alert_data['url'] = "";
        $alert_data['source_id'] = $document_id;
        $alert_data['user_group'] = "all";
        $this->insert_alert($alert_data);
        foreach ($categories as $key => $value) {

            if (isset($_POST[$key])) {
                $composite = array();
                $composite['document_id'] = $document_id;
                $composite['category_id'] = $key;
                $this->db->insert('document_categories', $composite);
            }
        }
    }

    function update_docs($data, $categories, $document_id) {
        $this->db->where("document_id", $document_id);

        $this->db->update('documents', $data);

        //First delete all document categories
        $doc_categories = $this->get_doc_categories($document_id);
        $this->db->where_in('category_id', $doc_categories);
        $this->db->delete('document_categories');

        foreach ($categories as $key => $value) {
            if (isset($_POST[$key])) {
                $composite = array();
                $composite['document_id'] = $document_id;
                $composite['category_id'] = $key;
                $this->db->insert('document_categories', $composite);
            }
        }
    }

    //Check composite PK
    function check_PK($document_id, $category_id) {

        $exists = FALSE;
        $this->db->where('document_id', $document_id);
        $this->db->where('category_id', $category_id);
        $query = $this->db->get('document_categories');

        var_dump($document_id, $category_id);

        if (1 > 0) {
            $exists = TRUE;
        }

        return $exists;
    }

    //Fetch document categories
    function get_doc_categories($document_id) {
        $this->db->select('category_id');
        $this->db->where('document_id', $document_id);
        $category_query = $this->db->get('document_categories');
        $categories = array();

        if ($category_query) {
            $i = 0;
            foreach ($category_query->result() as $row) {
                $categories[$i] = $row->category_id;
                $i++;
            }
        }
        return $categories;
    }

    function insert_alert($data) {
        $this->db->insert('alerts', $data);
    }

}
