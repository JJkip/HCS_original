<?php
class Feedback_model extends CI_Model {

    public function __construct() {
        $this->load->database();
    }
	public function savefeedback($data){
		$slug = url_title($this->input->post('title'), 'dash', TRUE);
        $user_data = $this->session->userdata('user_data');
        $user_id = $user_data['user_id'];
        $data = array(
            
            'slug' => $slug,
            'title'=>$this->input->post('title'),
            'category'=>$this->input->post('category'),
            'description' => $this->input->post('description'),
            'type' => $data['upload_data']['file_ext'],
            'size' => $data['upload_data']['file_size'],
            'user_id' => $user_id,
            'file' => $data['upload_data']['file_name'],
           
            
        );
		$inserted_data = $this->db->insert('feedback', $data);
		return $inserted_data;
		
	}

	public function get_feedback(){
			$this -> db -> select("*");
		$this -> db -> from("feedback");
		$this -> db -> order_by("feedback_id", "DESC");
		$query = $this -> db -> get();

		if ($query) {
			return $query -> result_array();
		}
	
	}public function get_feed($id){
		$query = $this -> db -> get_where('feedback', array('feedback_id' => $id));
		return $query -> row_array();
	
	}
}