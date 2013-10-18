<?php
class Calendar_model extends CI_Model {

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


    function get_event($event_id) {
        $this -> db -> where("event_id", $event_id);
        $query = $this -> db -> get("events");
        if ($query) {
            return json_encode($query -> result_array());
        }
    }

    function generate($year, $month, $organization_id = null) {

        $query = $this -> db -> query("SELECT DISTINCT DATE_FORMAT(start_date, '%Y-%m-%e') AS start_date
                                            FROM events
                                            WHERE start_date LIKE '$year-$month%' ");
        //date format eliminates zeros make
        //days look 05 to 5

        $data = array();

        foreach ($query->result() as $row) {//for every date fetch data
            $a = array();
            $i = 0;

            $this -> db -> select("*");
            $this -> db -> from("events");
            $this -> db -> like("start_date", $row -> start_date);
            $query2 = $this -> db -> get();

            foreach ($query2->result() as $row) {
                //<a href=""></a>
                $event_name = $row -> event_name;
                $event_id = $row -> event_id;
                $base_url = base_url();
                //'<a href='.base_url().'index.php/calendar/show_event/'.$event_id .'>'.$event_name.'</a>';
                $link = '<a href= "#" onclick = "show_event(' . $event_id . ');" >' . $event_name . '</a>';
                //
                $a[$i] = $link;
                //make data array to put to specific date
                $i++;
            }
            $data[substr($row -> start_date, 8, 2)] = $a;

        }

        return $this -> calendar -> generate($year, $month, $data);
    }

}
