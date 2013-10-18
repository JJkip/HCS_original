<?php
class Home extends CI_Controller {
    protected $data = array("title" => "home");
    function __construct() {
    	
        parent::__construct();

        $this -> load -> model("home/home_model");
        $this -> load -> model("calendar/calendar_model");
        $this -> data["organizations"] = $this -> home_model -> get_organizations();
        $this -> data['documents'] = $this -> home_model -> get_uploads();
        $this -> data["news"] = $this -> home_model -> get_news();
        

        $this -> data['calendar'] = $this->calendar_model->generate(date('Y'), date('m'));

    }
    
     function show_calendar($year=null, $month=null) {

                     
         $this -> data['calendar'] = $this->calendar_model->generate($year, $month);
         
         $this -> template -> load('default', 'hcs_tab_view/events', $this -> data);
    }
    
    function get_event(){
        $event_id = $_REQUEST['event_id'];
        $data = $this->calendar_model->get_event($event_id);
        
        echo $data;
    }

    function index() {
        $this -> template -> load('default', 'home/home', $this -> data);

    }

    function get_all() {
        $content = $this -> home_model -> get_all_content();
        echo $content;
    }

    function organization_docs() {
        $organization_id = $_REQUEST['organization_id'];
        $table = $_REQUEST['table'];

        //$response = $this -> home_model -> filter_content($filter, $content);
        $response = $this -> home_model -> get_organization_docs($organization_id, $table);

        //echo $organization_id . " : " . $table;
         echo $response;
    }

    function sort_content() {
        $sort = $_REQUEST['sort'];
        $content = $_REQUEST['content'];

        echo "Sort: " . $sort;
    }

}
