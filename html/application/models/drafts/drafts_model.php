<?php
class Drafts_model extends CI_Model {

    public function __construct() {
        $this->load->database();
    }
	public function savedraft($data){
		$slug = url_title($this->input->post('title'), 'dash', TRUE);
        $user_data = $this->session->userdata('user_data');
        $user_id = $user_data['user_id'];
        $data = array(
            
            'slug' => $slug,
            'draft_title'=>$this->input->post('title'),
            'description' => $this->input->post('description'),
            'type' => $data['upload_data']['file_ext'],
            'size' => $data['upload_data']['file_size'],
            'user_id' => $user_id,
            'file' => $data['upload_data']['file_name'],
           
            
        );
		$inserted_data = $this->db->insert('drafts', $data);
		return $inserted_data;
		
	}
	public function savedraftComment($data){
		$slug = url_title($this->input->post('title'), 'dash', TRUE);
        $user_data = $this->session->userdata('user_data');
        $user_id = $user_data['user_id'];
        $data = array(
            'comment_title' => $this->input->post('title'),
            'slug' => $slug,
            'description' => $this->input->post('description'),
            'type' => $data['upload_data']['file_ext'],
            'size' => $data['upload_data']['file_size'],
            'user_id' => $user_id,
            'file' => $data['upload_data']['file_name'],
            'draft_id'=>$this->input->post('draft_id'),
            
        );
		$inserted_data = $this->db->insert('draft_comments', $data);
		return $inserted_data;
	}
         public function record_count(){
         return $this->db->count_all("drafts");
    }
	public function get_drafts($limit,$start){
		$this -> db -> select("*");
                $this->db->limit($limit, $start);
		$this -> db -> from("drafts");
		$this -> db -> order_by("draft_id", "DESC");
		$query = $this -> db -> get();

		if ($query) {
			return $query -> result_array();
		}
	
		
	}
	public function getdraftcomment($draft_id){
		$this -> db -> select("*");
		$this -> db -> from("draft_comments");
		$this->db->where('draft_id',$draft_id);
		$this -> db -> order_by("draft_id", "DESC");
		$query = $this -> db -> get();

		if ($query) {
			return $query -> result_array();
		}
	
		
	}
	public function getdraft($draft_id){
		$query = $this -> db -> get_where('drafts', array('draft_id' => $draft_id));
		return $query -> row();
	
	}public function getTotalComments($draft_id){
			
		$this -> db -> from("draft_comments");
		$this->db->where('draft_id',$draft_id);
		$result=$this->db->count_all_results();
		if(count($result)){
			return $result;
		}else{
			return 0;
		}

	}
	public function edit_draft($draft){
		$data = array(
               'draft_title' => $draft['title'],
               'description' => $draft['description'],
               
            );
		
		$this->db->where('draft_id', $draft['draft_id']);
		if($this->db->update('drafts', $data)){
			return true;
		}else{
			return false;
		}
	}
}
