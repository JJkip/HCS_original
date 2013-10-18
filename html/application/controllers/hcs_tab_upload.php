<?php

class Hcs_tab_upload extends CI_Controller {

    protected $data = array("title" => "HCS");

    function __construct() {

        parent::__construct();

        $this->load->model("hcs_tab/hcs_tab_model");
        
        $this -> data['form'] = $this -> session -> userdata('form');
    
    }

    function index() {

        $tab_id = $this->uri->segment(2);

        $current_tab = $this->select_tab($tab_id);

        $this->template->load('default', 'hcs_tab_upload/' . $current_tab, $this->data);
    }
    
    //Open upload reports
    function edit_reports() {
       
        $this -> template -> load('default', 'hcs_tab_upload/edit_reports', $this -> data);
    }
    
        //Open upload minutes
    function edit_minutes() {
        $this -> template -> load('default', 'hcs_tab_upload/edit_minutes', $this -> data);
    }
    
           //Open saved events
    function edit_events() {
        $this -> template -> load('default', 'hcs_tab_upload/edit_events', $this -> data);
    }
    
    
           //Open saved news
    function edit_news() {
        $this -> template -> load('default', 'hcs_tab_upload/edit_news', $this -> data);
    }
    
    //New report
    function new_report(){
       $this -> template -> load('default', 'hcs_tab_upload/reports', $this -> data);
    }
    
    //New Minutes
     function new_minutes(){
       $this -> template -> load('default', 'hcs_tab_upload/meeting_minutes', $this -> data);
    }
     
     //New events
     function new_events(){
       $this -> template -> load('default', 'hcs_tab_upload/events', $this -> data);
    }
     
     //New news
     function new_news(){
       $this -> template -> load('default', 'hcs_tab_upload/news', $this -> data);
    }

    function select_tab($tab_id) {
        switch ($tab_id) {
            case '1' :
                //Reports
                return "reports";
                break;
            case '2' :
                //Meeting minutes
                return "meeting_minutes";
                break;

            case '3' :
                //Events
                return "events";
                break;

            case '4' :
                //News
                return "news";
                break;

            default :
                return "reports";
                break;
        }
    }

    //Reports
    function upload_report() {
        $config['upload_path'] = './uploads/hcs_tab/reports/';
        $config['allowed_types'] = '*';
        $config['max_size'] = 1024 * 8;

        $this->load->library('upload', $config);
        $valid = $this->validate_report();
        if ($valid) {
            if (!$this->upload->do_upload()) {
                $this->data["status"] = array('error' => $this->upload->display_errors());

                $this->template->load('default', 'hcs_tab_upload/reports', $this->data);
            } else {
                $user_data = $this->session->userdata('user_data');
                $upload_data = $this->upload->data();

                $file_data = array();
                $file_data['title'] = $this->input->post('report_title', true);
                $file_data['file_name'] = $upload_data["orig_name"];
                $file_data['description'] = $this->input->post('description', true);
                $file_data['size'] = $upload_data["file_size"];
                $file_data['type'] = $upload_data["file_type"];
                $file_data['category'] = $this->input->post('category', true);
                $file_data['directory_path'] = "uploads/hcs_tab/reports/";
                $file_data['user_id'] = $user_data['user_id'];
                $file_data['upload_date'] = unix_to_human(time(), TRUE, 'eu');

                $this->hcs_tab_model->save_file_data($file_data, 'reports');

                $this->data['status'] = array('upload_data' => $this->upload->data());

                $saved_file = $upload_data["client_name"];
                $this->data['saved_file'] = $upload_data["client_name"];

                $this->session->set_flashdata('message', "$saved_file has successfully been uploaded.");

                //$this->template->load('default', 'documents/upload_docs', $this->data);

                redirect('reports/1');
            }
        } else {
            $this->template->load('default', 'hcs_tab_upload/reports', $this->data);
        }
    }

   //Edit report
    function update_report() {
        $config['upload_path'] = './uploads/hcs_tab/reports/';
        $config['allowed_types'] = '*';
        $config['max_size'] = 1024 * 8;
        //$config['over_write'] = true;

        $this -> load -> library('upload', $config);

        $validation = $this -> validate_report();

        if ($validation) {
            $upload_data = array();
            $file_data = array();
            $user_data = $this -> session -> userdata('user_data');
            $report = $this -> session -> userdata('form');
            $report_id = $report['report_id'];

            if (!$this -> upload -> do_upload()) {
                //No new file presented
                $file_data['title'] = $this -> input -> post('report_title', true);
                $file_data['description'] = $this -> input -> post('description', true);
                $file_data['user_id'] = $user_data['user_id'];
                $file_data['edited'] = time();
            } else {
                //Means we have a new file
                $old_doc = $report['file_name'];

                if (file_exists('./uploads/hcs_tab/reports/' . $old_doc)) {
                    try {
                        unlink('./uploads/hcs_tab/reports/' . $old_doc);
                    } catch(Exception $e) {
                        //var_dump($e -> getMessage());
                    }
                }

                $upload_data = $this -> upload -> data();
                $file_data['title'] = $this -> input -> post('report_title', true);
                $file_data['file_name'] = $upload_data["orig_name"];
                $file_data['description'] = $this -> input -> post('description', true);
                $file_data['size'] = $upload_data["file_size"];
                $file_data['type'] = $upload_data["file_type"];
                $file_data['directory_path'] =  "uploads/hcs_tab/reports/";
                $file_data['user_id'] = $user_data['user_id'];
                $file_data['edited'] = time();
            }

            $this -> session -> set_flashdata('message', "Report updated....!");
            $this -> hcs_tab_model -> update_reports($file_data, $report_id);
            redirect('edit_content/4');

        } else {
            $this -> template -> load('default', 'hcs_tab_upload/edit_reports', $this -> data);
        }

    }

    function validate_report() {
        $this->form_validation->set_rules('report_title', 'Title', 'required|xss_clean');
        $this->form_validation->set_rules('description', 'Description', 'xss_clean');
        return $this->form_validation->run();
    }

    //Meeting minutes
    function upload_minutes() {
        $config['upload_path'] = './uploads/hcs_tab/meeting_minutes/';
        $config['allowed_types'] = '*';
        $config['max_size'] = 1024 * 8;

        $this->load->library('upload', $config);
        $valid = $this->validate_minutes();
        if ($valid) {
            if (!$this->upload->do_upload()) {
                $this->data["status"] = array('error' => $this->upload->display_errors());

                $this->template->load('default', 'hcs_tab_upload/meeting_minutes', $this->data);
            } else {
                $user_data = $this->session->userdata('user_data');
                $upload_data = $this->upload->data();

                $file_data = array();
                $file_data['file_name'] = $upload_data["orig_name"];
                $file_data['type'] = $upload_data["file_type"];
                $file_data['size'] = $upload_data["file_size"];
                $file_data['title'] = $this->input->post('meeting_title', true);
                $file_data['description'] = $this->input->post('description', true);
                $file_data['directory_path'] = "uploads/hcs_tab/meeting_minutes/";
                $file_data['user_id'] = $user_data['user_id'];
                $file_data['upload_date'] = unix_to_human(time(), TRUE, 'eu');

                $this->hcs_tab_model->save_file_data($file_data, 'meeting_minutes');

                $this->data['status'] = array('upload_data' => $this->upload->data());

                $saved_file = $upload_data["client_name"];
                $this->data['saved_file'] = $upload_data["client_name"];

                $this->session->set_flashdata('message', "$saved_file has successfully been uploaded.");

                //$this->template->load('default', 'documents/upload_docs', $this->data);

                redirect('meeting_minutes');
            }
        } else {
            $this->template->load('default', 'hcs_tab_upload/meeting_minutes', $this->data);
        }
    }

    //Edit report
    function update_minutes() {
        $config['upload_path'] = './uploads/hcs_tab/meeting_minutes/';
        $config['allowed_types'] = '*';
        $config['max_size'] = 1024 * 8;
        //$config['over_write'] = true;

        $this -> load -> library('upload', $config);

        $validation = $this -> validate_minutes();

        if ($validation) {
            $upload_data = array();
            $file_data = array();
            $user_data = $this -> session -> userdata('user_data');
            $minutes = $this -> session -> userdata('form');
            $meeting_minutes_id = $minutes['meeting_minutes_id'];

            if (!$this -> upload -> do_upload()) {
                //No new file presented
                $file_data['title'] = $this -> input -> post('meeting_title', true);
                $file_data['description'] = $this -> input -> post('description', true);
                $file_data['user_id'] = $user_data['user_id'];
                $file_data['edited'] = time();
            } else {
                //Means we have a new file
                $old_doc = $minutes['file_name'];

                if (file_exists('./uploads/hcs_tab/meeting_minutes/' . $old_doc)) {
                    try {
                        unlink('./uploads/hcs_tab/meeting_minutes/' . $old_doc);
                    } catch(Exception $e) {
                        //var_dump($e -> getMessage());
                    }
                }

                $upload_data = $this -> upload -> data();
                $file_data['title'] = $this -> input -> post('meeting_title', true);
                $file_data['file_name'] = $upload_data["orig_name"];
                $file_data['description'] = $this -> input -> post('description', true);
                $file_data['size'] = $upload_data["file_size"];
                $file_data['type'] = $upload_data["file_type"];
                $file_data['directory_path'] = "uploads/hcs_tab/meeting_minutes/";
                $file_data['user_id'] = $user_data['user_id'];
                $file_data['edited'] = time();
            }

            $this -> session -> set_flashdata('message', "Meeting minutes updated....!");
            $this -> hcs_tab_model -> update_minutes($file_data, $meeting_minutes_id);
            redirect('edit_content/5');

        } else {
            $this -> template -> load('default', 'hcs_tab_upload/edit_minutes', $this -> data);
        }

    }

    function validate_minutes() {
        $this->form_validation->set_rules('meeting_title', 'Title', 'required|xss_clean');
        $this->form_validation->set_rules('description', 'Description', 'xss_clean');
        return $this->form_validation->run();
    }

    //Events
    function add_events() {
        $valid_event = $this->validate_event();

        if ($valid_event) {

            $this->hcs_tab_model->save_event();

            $event = $this->input->post('event_name', true);

            $this->session->set_flashdata('message', "$event has successfully been uploaded.");
			
			$year = date('Y');
            $month = date('m');
            redirect(base_url(). "index.php/events/show_calendar/$year/$month");
        } else {
            $this->template->load('default', 'hcs_tab_upload/events', $this->data);
        }
    }
    
    function update_events() {
        $event = $this -> session -> userdata('form');
        $event_id = $event['event_id'];
        $valid_event = $this->validate_event();

        if ($valid_event) {

            $this->hcs_tab_model->update_event($event_id);

            $event = $this->input->post('event_name', true);

            $this->session->set_flashdata('message', "$event has successfully been updated.");
            redirect('edit_content/6');
        } else {
            $this->template->load('default', 'hcs_tab_upload/edit_events', $this->data);
        }
    }

    function validate_event() {
        $this->form_validation->set_rules('event_name', 'Event name', 'required|xss_clean');
        $this->form_validation->set_rules('event_venue', 'Event venue', 'required|xss_clean');
        $this->form_validation->set_rules('description', 'Description', 'xss_clean');
        $this->form_validation->set_rules('start_date', 'Start time', 'required|xss_clean');
        $this->form_validation->set_rules('end_date', 'End Time', 'required|xss_clean');

        return $this->form_validation->run();
    }

    //News
    function add_news() {
        $valid = $this->validate_news();
//        echo '<pre>';
        if ($valid) {
            //first check if a user has included a file attachment
            //if file size is greater than zero we have a file to upload
            $filename="";
            if ($_FILES['userfile']['size'] > 0) {
                $config['upload_path'] = './uploads/news';
                $config['allowed_types'] = '*';
                $config['max_size'] = '0';
                $config['max_width'] = '0';
                $config['max_height'] = '0';
                $this->load->library('upload', $config);
                if (!$this->upload->do_upload()) {
                    $error = array('error' => $this->upload->display_errors());

                    $this->load->view('mediacenter/create', $error);
                    $this->template->load('default', 'media_centre/create', $error);
                } else {
                    $data = $this->upload->data();
                    $filename=$data['file_name'];
//                    var_dump($data); die;
                }
            }
//            echo 'file: '.$filename;

            $this->hcs_tab_model->save_news($filename);

            $news = $this->input->post('news_title', true);

            $this->session->set_flashdata('message', "$news has successfully been uploaded.");

            redirect('news');

            $this->template->load('default', 'hcs_tab_upload/success_page', $this->data);
        } else {
            $this->template->load('default', 'hcs_tab_upload/news', $this->data);
        }
    }


    function update_news() {
        /*
         * Kirui Edit this as may be appropriate
         */
    }
   

    function validate_news() {
        $this->form_validation->set_rules('news_title', 'News title', 'required|xss_clean');
        $this->form_validation->set_rules('description', 'Description', 'xss_clean');

        return $this->form_validation->run();
    }

}

