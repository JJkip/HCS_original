<?php
class Drafts extends CI_Controller {
	function __construct() {
		parent::__construct();
		$this -> load -> model("hcs_tab/hcs_view_model");
		$this -> load -> model('drafts/drafts_model');
		$this -> load -> model('mediacenter_model');
	}
	
	public function index(){
		$this -> load -> model("hcs_tab/hcs_view_model");
		
		//get all
			$drafts=$this->drafts_model->get_drafts();
                                //start of paginations
                                $this->load->library('pagination');

                                 $config = array();
                                $config["base_url"] = base_url() . "drafts/index";
                                $config["total_rows"] = $this->drafts_model->record_count();
                                $config["per_page"] =2;
                                $config["uri_segment"] = 3;

                                $this->pagination->initialize($config);

                                $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
                                $drafts=$this->drafts_model->get_drafts($config["per_page"], $page);
                                //$data["users"]= $this->audition->fetch_users($config["per_page"], $page);
                                //end of paginations

			$this -> data["organizations"] = $this -> hcs_view_model -> get_organizations();
			$results=array();
			foreach ($drafts as $data) {
			$user_info = $this -> mediacenter_model -> get_user_details($data['user_id']);
			
	
			if (count($user_info) > 0) {
				$data['organization'] = $user_info -> organization;
				$data['date_created'] = date('j F Y', strtotime($data['date_created']));
				$data['url'] = site_url('drafts/view_draft/' . $data['draft_id']);
				$data['readmore'] = false;
				$data['No_of_comments']=$this->drafts_model->getTotalComments($data['draft_id']);
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
                                 $data["links"] = $this->pagination->create_links();
				$this->template->load('default', 'drafts/index', $this->data);
	}
	
	public function view_draft(){
		$id=$this->uri->segment(3);
		
		
		//get the details of the draft
		$draft=$this->drafts_model->getdraft($id);
		
		if($draft){
			//get the comments and the uploads
			$comments=$this->drafts_model->getdraftcomment($id);
			$com_results=array();
		
			foreach($comments as $data){
				$user_info = $this -> mediacenter_model -> get_user_details($data['user_id']);
				$data['organization']=$user_info->organization;
				array_push($com_results,$data);
				
			}
			
			
		}else{
			redirect('/drafts','refresh');
		}
		$user_data = $this->session->userdata('user_data');
       	$user_id = $user_data['user_id'];
		
		$draft -> date_created = date('j F Y', strtotime($draft -> date_created));
		$user_info = $this -> mediacenter_model -> get_user_details($draft -> user_id);
		$draft -> organization = $user_info -> organization;
		$data['user_id']=$user_id;
		$this -> data['draft'] = $draft;
		$data['draft']=$draft;
		$data['comments']=$com_results;
		
		$this->template->load('default', 'drafts/view_draft', $data);
		
	}
	public function edit(){
		if($_SERVER['REQUEST_METHOD']=="POST"){
			$this->load->library('form_validation');
			$this->form_validation->set_rules('title', 'Title', 'required');
			$this->form_validation->set_rules('description', 'Description', 'required');
			if ($this->form_validation->run() == FALSE)
				{
				$draft_id=$this->input->post('draft_id');
				redirect("drafts/edit/".$draft_id."",'edit');
			
				}else{
					$draft_id=$this->input->post('draft_id');
					$data=$this->input->post();
					$result=$this->drafts_model->edit_draft($data);
					if($result){
						$this->session->set_flashdata('message', 'Draft updated successfully');
						redirect("drafts/view_draft/".$draft_id."",'view_draft');
					}
				}
			
		}else{
			$id=$this->uri->segment('3');
			if(!$id){
				redirect('drafts','refresh');
			}
		
			$draft=$this->drafts_model->getdraft($id);
			$data['draft']=$draft;
			$this->template->load('default', 'drafts/edit_draft', $data);
		}
	}
	public function doComment(){
		if($_SERVER['REQUEST_METHOD']=="POST"){
			$draft_id=$this->input->post('draft_id');
			
			$description=$this->input->post('description');
			 $config['upload_path'] = './uploads/drafts/';
			$config['allowed_types'] = '*';
			$this->load->library('upload', $config);

		if ( ! $this->upload->do_upload())
		{
			$error = array('error' => $this->upload->display_errors());
		$this->session->set_flashdata('message', $error['error']);
		//$this->session->set_userdata('errors',$error);
		$url="drafts/view_draft/".$draft_id."";
		redirect($url,'error');

		}
		else
		{
			$data = array('upload_data' => $this->upload->data());
			
			$result=$this->drafts_model->savedraftComment($data);
			if($result){
				$this->session->set_flashdata('message', 'Draft has been added successfully');
				$url="drafts/view_draft/".$draft_id."";
				redirect($url,'success');
			}
		}
		}
		
	}
	public function create(){
		
		if($_SERVER['REQUEST_METHOD']=="POST"){
			$this->load->library('form_validation');
			$this->form_validation->set_rules('title', 'Title', 'required');
			$this->form_validation->set_rules('description', 'Description', 'required');
			//$this->form_validation->set_rules('userfile', 'File', 'required');
			if ($this->form_validation->run() == FALSE)
			{
				
			$this->template->load('default', 'drafts/create');
			}else{
			$config['upload_path'] = './uploads/drafts/';
			$config['allowed_types'] = '*';
			$this->load->library('upload', $config);

		if ( ! $this->upload->do_upload())
		{
				$error = array('error' => $this->upload->display_errors());
				$this->session->set_flashdata('message',$error['error']);
				$url="drafts/create/";
				redirect($url,'error');
		}
		else
		{
			$data = array('upload_data' => $this->upload->data());

			$result=$this->drafts_model->savedraft($data);
			if($result){
				$this->session->set_flashdata('message', 'Draft has been added successfully');
				redirect('drafts','refresh');
			
			}
		}
		}
		}else{
		
			$this->template->load('default', 'drafts/create');
		
		}
		
	}
}
	