<?php
class News extends CI_Controller {

	function __construct() {
		parent::__construct();
		$this -> load -> model("hcs_tab/hcs_view_model");
		$this -> load -> model('mediacenter_model');
		$this -> data["organizations"] = $this -> hcs_view_model -> get_organizations();

		$pre_format_data = $this -> hcs_view_model -> get_news();
		foreach ($pre_format_data as $data) {
			$user_info = $this -> mediacenter_model -> get_user_details($data['user_id']);
			//            echo '<pre>';
			//            var_dump($user_info);
			//            echo '</pre>';
			if (count($user_info) > 0) {
				$data['organization'] = $user_info -> organization;
				$data['date_created'] = date('j F Y', strtotime($data['date_created']));
				$data['url'] = site_url('news/item/' . $data['slug']);
				$data['readmore'] = false;
				//we need to set a limit for the description we are displaying
				//if it is more than 50 words we add a read more link
				$ex_desc = explode(" ", $data['description']);
				$num_desc = count($ex_desc);
				$limit = 4;
				//            echo $num_desc.'&nbsp;';
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
				$this -> data['content'][] = $data;
			}
		}
		
		$this -> data['org_id'] = 0;
	}

	function index() {
		$this -> template -> load('default', 'hcs_tab_view/news', $this -> data);
	}
	


	function filter() {
		$organization_id = $this -> uri -> segment(3);
		$this -> data['org_id'] = $organization_id;
		$pre_format_data = $this -> hcs_view_model -> get_org_news($organization_id);
		//reset content
		$this -> data['content'] = array();
		foreach ($pre_format_data as $data) {
			$user_info = $this -> mediacenter_model -> get_user_details($data['user_id']);
			//            echo '<pre>';
			//            var_dump($user_info);
			//            echo '</pre>';
			if (count($user_info) > 0) {
				$data['organization'] = $user_info -> organization;
				$data['date_created'] = date('j F Y', strtotime($data['date_created']));
				$data['url'] = site_url('news/item/' . $data['slug']);
				$data['readmore'] = false;
				//we need to set a limit for the description we are displaying
				//if it is more than 50 words we add a read more link
				$ex_desc = explode(" ", $data['description']);
				$num_desc = count($ex_desc);
				$limit = 4;
				//            echo $num_desc.'&nbsp;';
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
				$this -> data['content'][] = $data;
			}
		}

		$this -> template -> load('default', 'hcs_tab_view/news', $this -> data);
	}

	//function repair() {
		//$this -> template -> load('default', 'home/home_kigen', $this -> data);
	//}

	function item() {
		$slug = $this -> uri -> segment(3);
		$item = $this -> hcs_view_model -> get_news_item($slug);
		$item -> date_created = date('j F Y', strtotime($item -> date_created));
		$user_info = $this -> mediacenter_model -> get_user_details($item -> user_id);
		$item -> organization = $user_info -> organization;
		$this -> data['item'] = $item;

		$this -> template -> load('default', 'hcs_tab_view/news_item', $this -> data);
		//        echo '<pre>';
		//        var_dump($item);
		////        echo 'slug: '.$slug;
		//        die;
	}

	function edit() {
		$id = $this -> uri -> segment(3);
		//        echo 'id: ' . $id . '<br>';
		$data = $this -> hcs_view_model -> get_news_item_by_id($id);
		//        echo '<pre>';
		//        var_dump($data);
		//        die;
		$this -> template -> load('default', 'hcs_tab_upload/edit_news', array('error' => '', 'data' => $data));
	}

	function do_edit() {
		$this -> load -> library('form_validation');
		$this -> form_validation -> set_rules('news_title', 'Title', 'required|xss_clean');
		$this -> form_validation -> set_rules('description', 'Description', 'required|xss_clean');
		$data = $this -> hcs_view_model -> get_news_item_by_id($this -> input -> post('news_id'));
		if ($this -> form_validation -> run() == FALSE) {
			$error = "Please fill in the title and description, we have reset it to the original text";
			$this -> template -> load('default', 'hcs_tab_upload/edit_news', array('error' => $error, 'data' => $data));
		} else {
			$config['upload_path'] = './uploads/news/';
			$file_path = $config['upload_path'];
			$config['allowed_types'] = '*';
			$filename = $this -> input -> post('file');
			//check if the user has uploaded a different file
			if ($_FILES['userfile']['size'] > 0) {
				$this -> load -> library('upload', $config);
				if (!$this -> upload -> do_upload()) {
					$error = array('error' => $this -> upload -> display_errors());
					$this -> template -> load('default', 'hcs_tab_upload/edit_news', array('error' => $this -> upload -> display_errors(), 'data' => $data));
				} else {
					if ($this -> input -> post('file') <> "") {
						//we need to delete the old file
						if (file_exists($file_path . $this -> input -> post('file'))) {
							try {
								unlink($file_path . $this -> input -> post('file'));
							} catch (Exception $e) {
								//                            var_dump($e->getMessage());
								//                            die;
							}
						}
					}
					$file_data = $this -> upload -> data();
					$filename = $file_data['file_name'];
				}
			}
			//we now push the data to our model and let it update the database
			$this -> load -> model("hcs_tab/hcs_tab_model");
			$this -> hcs_tab_model -> update_news($filename);
			$this -> session -> set_flashdata('message', 'Your news item has been updated');
			redirect('edit_content/7');
		}
	}

}
?>