<?php

class Mediacenter_model extends CI_Model {

    public function __construct() {
        $this->load->database();
    }

    public function get_media($slug = FALSE, $org=0) {
        if ($slug === FALSE) {
            $query = $this->db->get('mediacenter');
            return $query->result_array();
        }
        if ($org <> 0) {
            //we have an organization id, let us fetch all users belonging to this organization
            $this->db->select('user_id');
            $this->db->from('users');
            $this->db->where('organization_id', $org);
            $query = $this->db->get();
//            echo '<pre>';
            $num_rows = $query->num_rows();
            $counter = 1;
            $res = $query->result();
            $ids = '';
            foreach ($res as $r) {
                if ($counter == $num_rows)
                    $ids.=$r->user_id;
                else
                    $ids.=$r->user_id . ',';
                $counter++;
            }
            $id_arr = explode(",", $ids);
        }
        $this->db->select('*');
        $this->db->from('mediacenter');
        $this->db->where('category_id', $slug);
        if ($org <> 0)
            $this->db->where_in('user_id', $id_arr);
        $this->db->order_by('id', 'DESC');
        $query = $this->db->get();
        return $query->result_array();
    }

    function get_item($slug) {
        $query = $this->db->get_where('mediacenter', array('slug' => $slug));
        return $query->row();
    }

    function get_item_by_id($id) {
        $query = $this->db->get_where('mediacenter', array('id' => $id));
        return $query->row();
    }

    public function update_media($media) {
        $this->load->helper('url');
//        echo '<pre>';
//        var_dump($file_details);

        $slug = url_title($this->input->post('title'), 'dash', TRUE);
        $data = array(
            'title' => $this->input->post('title'),
            'slug' => $slug,
            'description' => $this->input->post('description')
        );
        if ($media['new_file'] == '1') {
            $data['size'] = $media['file_details']['file_size'];
            $data['type'] = $media['file_details']['file_ext'];
            $data['file'] = $media['file_details']['file_name'];
        }

        $this->db->where('id', $this->input->post('id'));
        return $this->db->update('mediacenter', $data);
    }

    public function set_media($file_details) {
        $this->load->helper('url');
//        echo '<pre>';
//        var_dump($file_details);

        $slug = url_title($this->input->post('title'), 'dash', TRUE);
        $user_data = $this->session->userdata('user_data');
        $user_id = $user_data['user_id'];
        $data = array(
            'title' => $this->input->post('title'),
            'slug' => $slug,
            'description' => $this->input->post('description'),
            'type' => $file_details['upload_data']['file_ext'],
            'size' => $file_details['upload_data']['file_size'],
            'user_id' => $user_id,
            'file' => $file_details['upload_data']['file_name'],
            'category_id' => $this->input->post('category_id')
        );
//        echo '<br>the data array';
//        var_dump($data);
//        die;
        $inserted_data = $this->db->insert('mediacenter', $data);
        /**
         * we need to insert the new document into our alerts table
         * from there it will be send in the weekly digest
         * @author Kirui Kennedy
         */
        $this->load->model('documents/documents_model');
        $alert_data = array();
        $alert_data['title'] = $data['title'];
        if ($this->input->post('category_id') == "0")
            $alert_data['category'] = "radiospot";
        if ($this->input->post('category_id') == "1")
            $alert_data['category'] = "video";
        if ($this->input->post('category_id') == "2")
            $alert_data['category'] = "poster";
        $alert_data['url'] = "";
        $alert_data['source_id'] = $this->db->insert_id();
        $alert_data['user_group'] = "all";
        $this->documents_model->insert_alert($alert_data);

        return $inserted_data;
    }

    function set_video() {
        $this->load->helper('url');
        $slug = url_title($this->input->post('title'), 'dash', TRUE);
        $user_data = $this->session->userdata('user_data');
        $user_id = $user_data['user_id'];
        $data = array(
            'title' => $this->input->post('title'),
            'slug' => $slug,
            'description' => $this->input->post('description'),
            'type' => $file_details['upload_data']['file_ext'],
            'size' => $file_details['upload_data']['file_size'],
            'user_id' => $user_id,
            'file' => $file_details['upload_data']['file_name'],
            'category_id' => $this->input->post('category_id')
        );
//        echo '<br>the data array';
//        var_dump($data);
//        die;
        return $this->db->insert('mediacenter', $data);
    }

    function set_access_token($token_data) {
//        echo '<pre>';
//        var_dump($token_data); die;
        $data = array(
            'oauth_token' => $token_data['oauth_token'],
            'oauth_token_secret' => $token_data['oauth_token_secret']
        );
        return $this->db->insert('tokens', $data);
    }

    function get_access_token() {
        $query = $this->db->query('SELECT oauth_token,oauth_token_secret FROM tokens ORDER BY id DESC LIMIT 1');
        return $query->row();
    }

    function get_current_user_details() {
        $user_data = $this->session->userdata('user_data');
        $user_id = $user_data['user_id'];

        //first get the user's organization id
        $this->db->select('users.organization_id,organizations.organization');
        $this->db->from('users');
        $this->db->join('organizations', 'organizations.organization_id  = users.organization_id', 'left');
        $this->db->where('users.user_id', $user_id);
        $query = $this->db->get();
//        $row = $query->row();
//        //we have the organization id, let us get the
//        var_dump($row);
//        die;
//        $query = $this->db->get_where('users', array('id' => $id), $limit, $offset);
        return $query->row();
    }

    function get_user_details($user_id) {
        //first get the user's organization id
        $this->db->select('users.organization_id,organizations.organization');
        $this->db->from('users');
        $this->db->join('organizations', 'organizations.organization_id  = users.organization_id', 'left');
        $this->db->where('users.user_id', $user_id);
        $query = $this->db->get();
//        $row = $query->row();
//        //we have the organization id, let us get the
//        var_dump($row);
//        die;
//        $query = $this->db->get_where('users', array('id' => $id), $limit, $offset);
        if($query){
        return $query->row();
		}
    }

    function documents_related_media($organization_id) {
//        $organization_id=4;
        //get all users in the provided organization
        $this->db->select('user_id');
        $this->db->from('users');
        $this->db->where('organization_id', $organization_id);
        $query = $this->db->get();
//        echo '<pre>';
        $num_rows = $query->num_rows();
        $counter = 1;
        $res = $query->result();
        $ids = '';
        foreach ($res as $r) {
            if ($counter == $num_rows)
                $ids.=$r->user_id;
            else
                $ids.=$r->user_id . ',';
            $counter++;
        }
        $id_arr = explode(",", $ids);
//        echo $ids;
//        we have the user ids, let us use this to get all documents
        $this->db->select('title,slug');
        $this->db->from('mediacenter');
//        $this->db->where('category_id', $slug);
        $this->db->where_in('user_id', $id_arr);
        $this->db->order_by('id', 'DESC');
        $this->db->limit(10);
        $query = $this->db->get();
        return $query->result_array();
//        die;
    }

    function get_organizations() {
        $this->db->select('*');
        $this->db->from('organizations');
        $query = $this->db->get();
        $res = $query->result_array();
        $row = array();
        foreach ($res as $r) {

        }
    }

}