<?php
class Events extends CI_Controller {
    protected $data = array("title" => "Calendar");
    function __construct() {
        parent::__construct();
        $this -> load -> model("calendar/calendar_model");
        $this -> data["organizations"] = $this -> calendar_model-> get_organizations();
        $this -> data['org_id'] = 0;
       }

    function index() {
      
        //$this -> show_calendar(); 
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
    
    function show_event(){
       echo $event_id= $this->uri->segment(3);       
    }
    
 
}

/* End of file calendar.php */
/* Location: ./application/controllers/calendar.php */
