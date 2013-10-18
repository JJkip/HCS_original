<?php

class Edit_model extends CI_Model {

	function __construct() {
		parent::__construct();
	}

	function fetch_uploads($user_id, $table, $id_name = NULL) {
		$this -> db -> where('user_id', $user_id);
		if ($table == "radio_spots") {
			$this -> db -> where('category_id', 0);
			$this -> db -> order_by('id', 'desc');
			$query = $this -> db -> get('mediacenter');
		} elseif ($table == "posters") {
			$this -> db -> where('category_id', 2);
			$this -> db -> order_by('id', 'desc');
			$query = $this -> db -> get('mediacenter');
		} else {
			if (isset($id_name)) {
					
				$this -> db -> order_by('edited', 'desc');
				$this -> db -> order_by($id_name, 'desc');
			}

			$query = $this -> db -> get($table);
		}
		if ($query) {
			return $query -> result_array();
			//            echo '<br>query: ' . $this->db->last_query();
		}
	}

	function delete_content($table, $id, $id_value) {
		$this -> db -> select('*');
		$this -> db -> from($table);
		$this -> db -> where($id, $id_value);
		$query = $this -> db -> get();
		$events_table = strcasecmp("events", $table);
		$file_name = NULL;
		if ($table == "mediacenter") {
			$section = $this -> session -> userdata('upload_type');
			if ($section == "posters")
				$dir_path = './uploads/media_center/posters/';
			elseif ($section == "radio_spots")
				$dir_path = './uploads/media_center/radio_spots/';
			$file_name = $query -> row() -> file;
		} elseif ($table == "news") {
			$dir_path = './uploads/news/';
			$file_name = $query -> row() -> file;
		} elseif ($events_table != 0) {
			$file_name = $query -> row() -> file_name;
			$dir_path = $query -> row() -> directory_path;
		}

		//        echo 'file: ' . $dir_path . $file_name;
		//        die;
		if (isset($file_name)) {
			if ($file_name <> "" && $dir_path <> "") {
				if (file_exists($dir_path . $file_name)) {
					try {
						unlink($dir_path . $file_name);
					} catch (Exception $e) {

					}
				}
			}
		}

		$this -> db -> where($id, $id_value);
		$this -> db -> delete($table);
	}

}
