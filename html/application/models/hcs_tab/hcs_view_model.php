<?php

class Hcs_view_model extends CI_Model {

	function __construct() {
		parent::__construct();
	}

	//Organizations
	function get_organizations() {
		$query = $this -> db -> get("organizations");
		$organizations = array();
		$organizations["0"] = "--Select organization--";
		if ($query) {

			foreach ($query->result() as $row) {
				$organizations[$row -> organization_id] = $row -> organization;
			}
		}
		return $organizations;
	}

	//Reports: Financial/Narrative
	function get_reports($category) {
		$this -> db -> where('category', $category);
		$this -> db -> order_by("report_id", "DESC");
		$query = $this -> db -> get("reports");

		if ($query) {
			return $query -> result_array();
		}
	}

	function get_org_reports($organization_id, $report_type) {
		$this -> db -> select("*");
		$this -> db -> from("reports");
		$this -> db -> order_by("report_id", "DESC");
		$this -> db -> join("users", "users.user_id = reports.user_id", "inner");
		if ($organization_id != 0) {
			$this -> db -> where("organization_id", $organization_id);
		}
		$this -> db -> where('category', $report_type);

		$query = $this -> db -> get();

		if ($query) {
			return $query -> result_array();
		}
	}

	//Events
	function get_events() {
		$this -> db -> order_by("event_id", "DESC");
		$query = $this -> db -> get("events");

		if ($query) {
			return $query -> result_array();
		}
	}

	function get_org_events($organization_id) {
		$this -> db -> select("*");
		$this -> db -> from("events");
		$this -> db -> order_by("event_id", "DESC");
		$this -> db -> join("users", "users.user_id = events.user_id", "inner");
		if ($organization_id != 0) {
			$this -> db -> where("organization_id", $organization_id);
		}

		$query = $this -> db -> get();

		if ($query) {
			return $query -> result_array();
		}
	}

	//Meeting minutes
	function get_minutes() {
		$this -> db -> order_by("meeting_minutes_id", "DESC");
		$query = $this -> db -> get("meeting_minutes");

		if ($query) {
			return $query -> result_array();
		}
	}

	function get_org_minutes($organization_id) {
		$this -> db -> select("*");
		$this -> db -> from("meeting_minutes");
		$this -> db -> order_by("meeting_minutes_id", "DESC");
		$this -> db -> join("users", "users.user_id = meeting_minutes.user_id", "inner");
		if ($organization_id != 0) {
			$this -> db -> where("organization_id", $organization_id);
		}

		$query = $this -> db -> get();

		if ($query) {
			return $query -> result_array();
		}
	}

	//News
	function get_news() {
		$this -> db -> select("*");
		$this -> db -> from("news");
		$this -> db -> order_by("news_id", "DESC");
		$query = $this -> db -> get();
		

		//$this -> db -> order_by("news_id", "DESC");
		if ($query) {
			return $query -> result_array();
		}
	}

	function get_org_news($organization_id) {
		$this -> db -> select("*");
		$this -> db -> from("news");
		$this -> db -> order_by("news_id", "DESC");
		$this -> db -> join("users", "users.user_id = news.user_id", "inner");
		if ($organization_id != 0) {
			$this -> db -> where("users.organization_id", $organization_id);
		}
		$query = $this -> db -> get();

		if ($query) {
			return $query -> result_array();
		}
	}

	function get_news_item($slug) {
		$query = $this -> db -> get_where('news', array('slug' => $slug));
		return $query -> row();
	}

	function get_news_item_by_id($id) {
		$query = $this -> db -> get_where('news', array('news_id' => $id));
		return $query -> row();
	}

}
