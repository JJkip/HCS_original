<?php

class Edit_content extends CI_Controller {

	protected $data = array("title" => "Edit content");

	function __construct() {
		parent::__construct();
		$this -> load -> model("edit_content/edit_model");
	}

	function index() {
		$this -> session -> unset_userdata('content_id');
		$content_id = $this -> uri -> segment(2);
		$this -> session -> set_userdata('content_id', $content_id);
		$this -> data['content'] = $this -> show_content($content_id);
		$this -> template -> load('default', 'edit_content/edit_content', $this -> data);
	}
	
	function show_content($content_id) {
		$user_id = $this -> session -> userdata('row_content') -> user_id;
		$this -> session -> unset_userdata('upload_type');
		$this -> session -> unset_userdata('uploads');
		$this -> session -> unset_userdata('upload_label');
		
		switch ($content_id) {
			case '1' :
				//Documents
				$this -> session -> set_userdata('upload_type', 'documents');
				$this -> session -> set_userdata('upload_label', 'document');
				$uploads = $this -> edit_model -> fetch_uploads($user_id, "documents", "document_id");
				$this -> session -> set_userdata('uploads', $uploads);
				$content = array();
				for ($i = 0; $i < count($uploads); $i++) {
					$upload = $uploads[$i];
					$content[$upload['document_id']] = $upload['title'];
				}
				return $content;
				break;
			case '2' :
				//Organization tools
				$this -> session -> set_userdata('upload_type', 'organization_tools');
				$this -> session -> set_userdata('upload_label', 'tool');
				$uploads = $this -> edit_model -> fetch_uploads($user_id, "organization_tools", "tool_id");
				$this -> session -> set_userdata('uploads', $uploads);
				$content = array();
				for ($i = 0; $i < count($uploads); $i++) {
					$upload = $uploads[$i];
					$content[$upload['tool_id']] = $upload['title'];
				}
				return $content;
				break;

			case '3' :
				//Innovations and Lessons
				$this -> session -> set_userdata('upload_type', 'innovations_and_lessons');
				$this -> session -> set_userdata('upload_label', 'innovation');
				$uploads = $this -> edit_model -> fetch_uploads($user_id, "innovations_and_lessons", "innovation_id");
				$this -> session -> set_userdata('uploads', $uploads);
				$content = array();
				for ($i = 0; $i < count($uploads); $i++) {
					$upload = $uploads[$i];
					$content[$upload['innovation_id']] = $upload['title'];
				}
				return $content;
				break;

			case '4' :
				//Reports
				$this -> session -> set_userdata('upload_type', 'reports');
				$this -> session -> set_userdata('upload_label', 'report');
				$uploads = $this -> edit_model -> fetch_uploads($user_id, "reports", "report_id");
				$this -> session -> set_userdata('uploads', $uploads);
				$content = array();
				for ($i = 0; $i < count($uploads); $i++) {
					$upload = $uploads[$i];
					$content[$upload['report_id']] = $upload['title'];
				}

				return $content;
				break;

			case '5' :
				//Meeting minutes
				$this -> session -> set_userdata('upload_type', 'meeting_minutes');
				$this -> session -> set_userdata('upload_label', 'minutes');
				$uploads = $this -> edit_model -> fetch_uploads($user_id, "meeting_minutes", "meeting_minutes_id");
				$this -> session -> set_userdata('uploads', $uploads);
				$content = array();
				for ($i = 0; $i < count($uploads); $i++) {
					$upload = $uploads[$i];
					$content[$upload['meeting_minutes_id']] = $upload['title'];
				}
				return $content;
				break;
			case '6' :
				//Events
				$this -> session -> set_userdata('upload_type', 'events');
				$this -> session -> set_userdata('upload_label', 'event');
				$uploads = $this -> edit_model -> fetch_uploads($user_id, "events", "event_id");
				$this -> session -> set_userdata('uploads', $uploads);
				$content = array();
				for ($i = 0; $i < count($uploads); $i++) {
					$upload = $uploads[$i];
					$content[$upload['event_id']] = $upload['event_name'];
				}
				return $content;
				break;
			case '7' :
				//News
				$this -> session -> set_userdata('upload_type', 'news', "news_id");
				$this -> session -> set_userdata('upload_label', 'News item');
				$uploads = $this -> edit_model -> fetch_uploads($user_id, "news");
				$this -> session -> set_userdata('uploads', $uploads);
				$content = array();
				for ($i = 0; $i < count($uploads); $i++) {
					$upload = $uploads[$i];
					$content[$upload['news_id']] = $upload['news_title'];
				}
				return $content;
				break;
			case '8' :
				//Radio spots
				$this -> session -> set_userdata('upload_type', 'radio_spots');
				//                echo '<pre>';
				$uploads = $this -> edit_model -> fetch_uploads($user_id, "radio_spots");

				//                var_dump($uploads);
				//                die;
				$this -> session -> set_userdata('uploads', $uploads);
				$content = array();
				for ($i = 0; $i < count($uploads); $i++) {
					$upload = $uploads[$i];
					$content[$upload['id']] = $upload['title'];
				}
				return $content;
				break;
			case '9' :
				//Radio spots
				$this -> session -> set_userdata('upload_type', 'posters');
				//                echo '<pre>';
				$uploads = $this -> edit_model -> fetch_uploads($user_id, "posters");

				//                var_dump($uploads);
				//                die;
				$this -> session -> set_userdata('uploads', $uploads);
				$content = array();
				for ($i = 0; $i < count($uploads); $i++) {
					$upload = $uploads[$i];
					$content[$upload['id']] = $upload['title'];
				}
				return $content;
				break;
		}
	}

	//redirect to edit
	function redirect_to_edit() {
		//Get selected data
		$to_edit = $this -> input -> post('submit');
		//        echo 'the value '.$to_edit;die;
		if (!is_numeric($to_edit)) {
			//delete section
			$table = $this -> session -> userdata('upload_type');
			/**
			 * for the media center section we are using only one table
			 * so we need to convert that to point to the correct table and not the one provided
			 * by the session variable
			 * @author Kirui
			 */
			if ($table == "posters" || $table == "radio_spots")
				$table = "mediacenter";
			$id_value = substr($to_edit, 1);
			$id = $this -> set_unique_id();
			$this -> edit_model -> delete_content($table, $id, $id_value);
			$content_id = $this -> session -> userdata('content_id');
			$this -> data['content'] = $this -> show_content($content_id);
			$this -> session -> set_flashdata('message', 'The item has been deleted');
			$this -> template -> load('default', 'edit_content/edit_content', $this -> data);
		} else {
			//edit section
			/**
			 * for the media centre we are using a different approach
			 * get the id and pass that as part of the url variable
			 * @author Kirui
			 */
			$upload_type = $this -> session -> userdata('upload_type');

			if ($upload_type == "posters" || $upload_type == "radio_spots") {
				redirect('media_centre/edit/' . $to_edit);
			}

			$this -> session -> unset_userdata('form');
			$unique_id = $this -> set_unique_id();
			/**
			 ** for the news section we use a similar approach to the media center
			 * get the id of the selected item and redirect to the news controller
			 * and pass along the id
			 */
			if ($unique_id == "news_id") {
				redirect('news/edit/' . $to_edit);
			}
			$uploads = $this -> session -> userdata('uploads');
			//            echo '<pre>';
			//            var_dump($uploads);
			//            echo '</pre>';
			//            die;
			$content = array();

			for ($i = 0; $i < count($uploads); $i++) {
				$temp = $uploads[$i];
				if ($temp[$unique_id] === $to_edit) {
					$content = $temp;
				}
			}
			$this -> session -> set_userdata('form', $content);

			switch ($unique_id) {
				case 'document_id' :
					//Documents
					redirect('documents/edit_uploads');
					break;
				case 'tool_id' :
					//Tools
					redirect('tools/edit_uploads');
					break;
				case 'innovation_id' :
					//Innovations
					redirect('innovations/edit_uploads');
				case 'report_id' :
					//Reports
					redirect('hcs_tab_upload/edit_reports');
					break;
				case 'meeting_minutes_id' :
					//Meeting_minutes
					redirect('hcs_tab_upload/edit_minutes');
					break;
				case 'event_id' :
					//Meeting_minutes
					redirect('hcs_tab_upload/edit_events');
					break;
				case 'news_id' :
					//Meeting_minutes
					redirect('hcs_tab_upload/edit_news');
					break;
				default :
					break;
			}
		}
	}

	function redirect_to_upload() {
		$upload_type = $this -> session -> userdata('upload_type');
		$this -> session -> unset_userdata('form');
		switch ($upload_type) {
			case 'documents' :
				redirect('documents/upload_docs');
				break;

			case 'organization_tools' :
				redirect('tools/upload_tools');
				break;
			case 'innovations_and_lessons' :
				redirect('innovations/uploads');
				break;
			case 'reports' :
				redirect('hcs_tab_upload/new_report');
				break;
			case 'meeting_minutes' :
				redirect('hcs_tab_upload/new_minutes');
				break;
			case 'events' :
				redirect('hcs_tab_upload/new_events');
				break;
			case 'news' :
				redirect('hcs_tab_upload/new_news');
				break;
			case 'posters' :
				redirect('media_centre/index/poster');
				break;
			case 'radio_spots' :
				redirect('media_centre/index/radiospot');
				break;
			default :
				break;
		}
	}

	//Unique Id of given table
	function set_unique_id() {
		$upload_type = $this -> session -> userdata('upload_type');

		switch ($upload_type) {
			case 'documents' :
				return 'document_id';
				break;
			case 'organization_tools' :
				return 'tool_id';
				break;
			case 'innovations_and_lessons' :
				return 'innovation_id';
				break;
			case 'reports' :
				return 'report_id';
				break;
			case 'meeting_minutes' :
				return 'meeting_minutes_id';
				break;
			case 'events' :
				return 'event_id';
				break;
			case 'news' :
				return 'news_id';
				break;
			case 'posters' :
				return 'id';
				break;
			case 'radio_spots' :
				return 'id';
				break;
			default :
				break;
		}
	}

}
