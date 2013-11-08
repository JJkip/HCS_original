<?php
class Feedback extends CI_Controller {
	function __construct() {
		parent::__construct();
		$this -> load -> model("hcs_tab/hcs_view_model");
		$this -> load -> model('feedback/feedback_model');
		$this -> load -> model('mediacenter_model');
	}
	
	public function index(){
		$this -> load -> model("hcs_tab/hcs_view_model");
		
		//get all
			$feedback=$this->feedback_model->get_feedback();
			

			$this -> data["organizations"] = $this -> hcs_view_model -> get_organizations();
			$results=array();
			foreach ($feedback as $data) {
			$user_info = $this -> mediacenter_model -> get_user_details($data['user_id']);
			
	
			if (count($user_info) > 0) {
				$data['organization'] = $user_info -> organization;
				$data['date_created'] = date('j F Y', strtotime($data['date_created']));
				$data['url'] = site_url('feedback/view_feedback/' . $data['feedback_id']);
				$data['readmore'] = false;
				//we need to set a limit for the description we are displaying
				//if it is more than 50 words we add a read more link
				$ex_desc = explode(" ", $data['description']);
				$num_desc = count($ex_desc);
				$limit = 4;
			
				if ($num_desc > $limit) {
					$data['readmore'] = true;
					$desc = "";
					for ($i = 0; $i < $limit; $i++) {
						$desc .= $ex_desc[$i] . " ";
					}
					$data['description'] = trim($desc) . '...';
				} else {
					$data['description'] = implode(" ", $ex_desc);
				}
				
			}
			
			array_push($results,$data);
		}
				
				
				$this -> data['content'] = $results;
				$this->template->load('default', 'feedback/index', $this->data);
	}
	public function create(){
		if($_SERVER['REQUEST_METHOD']=="POST"){
			
			 $config['upload_path'] = './uploads/feedback/';
			$config['allowed_types'] = '*';
			$this->load->library('upload', $config);

		if ( ! $this->upload->do_upload())
		{
			$error = array('error' => $this->upload->display_errors());
		$this->session->set_flashdata('message', $error['error']);
		
		$url="feedback/create/";
		redirect($url,'error');

		}
		else
		{
			$data = array('upload_data' => $this->upload->data());
			
			$result=$this->feedback_model->savefeedback($data);
			if($result){
				$this->session->set_flashdata('message', 'Your feedback has been added successfully');
				$url="feedback/create";
				redirect($url,'success');
			}
		}
		}else{
				if($this->session->flashdata('message')){
			$data['flash_message']=$this->session->flashdata('message');
				}
				else{
				$data['flash_message']="";
				
				}
			$this->template->load('default', 'feedback/create',$data);	
		
		}
	
	}	
	public function view_feedback(){
		$id=$this->uri->segment(3);
		if(!$id){
			$this->template->load('default', 'feedback/create');
		}
		$data=$this->feedback_model->get_feed($id);
	
		
		if($data){
			$user_info = $this -> mediacenter_model -> get_user_details($data['user_id']);
			$data['organization']=$user_info->organization;
			
		}else{
			redirect('feedback/index','refresh');
		}
		
		$this->template->load('default','feedback/view_feedback',$data);
			
			
		}

}