<?php

class Hcs_tab_view extends CI_Controller {

    protected $data = array("title" => "HCS");

    function __construct() {
        parent::__construct();
        $this->load->model("hcs_tab/hcs_view_model");
        $this->load->model("home/home_model");
    }

    function index() {
        $tab_id = $this->uri->segment(2);
        $view = $this->select_view($tab_id);

        $this->template->load('default', 'hcs_tab_view/' . $view, $this->data);
    }

    //Select the view to display and fetch relevant content
    function select_view($tab_id) {
        switch ($tab_id) {
            case '1':
                $category = 'financial';
                $content = $this->hcs_view_model->get_reports($category);
                $this->data['content'] = $content;
                return "reports";
                break;
            case '2':
                $category = 'narrative';
                $content = $this->hcs_view_model->get_reports($category);
                $this->data['content'] = $content;
                return "reports";
                break;
            case '3':
                $this->data['org_id'] = 0;
                if ($this->uri->segment(3)) {
                    $this->data['org_id'] = $this->uri->segment(3);
                }
                $content = $this->hcs_view_model->get_events($this->data['org_id']);

                $content = $this->_prepare_content($content);
                $this->data['content'] = $content;
                $this->data["organizations"] = $this->home_model->get_organizations();
//                echo '<pre>';
//                var_dump($this->data["organizations"]);
//                die;
                
                return "events";
                break;
            case '4':
                $content = $this->hcs_view_model->get_minutes();
                $this->data['content'] = $content;
                return "meeting_minutes";
                break;
            case '5':
                $content = $this->hcs_view_model->get_news();
                $this->data['content'] = $content;
                return "news";
                break;
            default:
                break;
        }
    }

    function _prepare_content($content) {
        //load the mediacenter model so that we can access the get_user_details function
        $this->load->model('mediacenter_model');
        $data = array();
        foreach ($content as $c) {
            $user_info = $this->mediacenter_model->get_user_details($c['user_id']);
            $c['organization'] = $user_info->organization;
//            $c['organization']
            $data[] = $c;
        }
        return $data;
    }

}

?>