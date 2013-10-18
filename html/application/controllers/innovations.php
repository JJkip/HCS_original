<?php
class Innovations extends CI_Controller {

    protected $data = array("title" => "Innovations and Lessons");

    function __construct() {

        parent::__construct();
        $this -> load -> model('innovations_and_lessons/innovations_model');
        $this -> data['innovations'] = $this -> innovations_model -> get_tools();
        $this -> data["organizations"] = $this -> innovations_model -> get_organizations();
        $this -> data['org_id'] = 0;
         $this -> data['form'] = $this -> session -> userdata('form');

    }

    function index() {

        $this -> template -> load('default', 'innovations/innovations', $this -> data);

    }

    function uploads() {
        $this -> template -> load('default', 'innovations/uploads', $this -> data);
    }
    
       //Open upload form
    function edit_uploads() {
        $this -> template -> load('default', 'innovations/edit_uploads', $this -> data);
    }

    function do_upload() {
        $config['upload_path'] = './uploads/innovations_and_lessons/';
        $config['allowed_types'] = '*';
        $config['max_size'] = 1024 * 8;

        $this -> load -> library('upload', $config);

        $validation = $this -> validate_file_upload();

        if ($validation) {

            if (!$this -> upload -> do_upload()) {
                $this -> data["status"] = array('error' => $this -> upload -> display_errors());

                $this -> template -> load('default', 'innovations/uploads', $this -> data);

            } else {
                $user_data = $this -> session -> userdata('user_data');
                $upload_data = $this -> upload -> data();

                $file_data = array();
                $file_data['title'] = $this -> input -> post('innovation_title', true);
                $file_data['file_name'] = $upload_data["orig_name"];
                $file_data['description'] = $this -> input -> post('description', true);
                $file_data['size'] = $upload_data["file_size"];
                $file_data['type'] = $upload_data["file_type"];
                $file_data['directory_path'] = "uploads/innovations_and_lessons/";
                $file_data['user_id'] = $user_data['user_id'];
                $file_data['upload_date'] = unix_to_human(time(), TRUE, 'eu');

                $this -> innovations_model -> save_file_data($file_data);

                $this -> data['status'] = array('upload_data' => $this -> upload -> data());
                
                $saved_file = $upload_data["client_name"];
                
                $this -> data['saved_file'] = $upload_data["client_name"];

                $this -> session -> set_flashdata('message', "$saved_file has successfully been uploaded.");

                //$this->template->load('default', 'documents/upload_docs', $this->data);

                redirect('innovations');

            }
        } else {
            $this -> template -> load('default', 'innovations/uploads', $this -> data);
        }
    }

    //Edit Innovation
    function do_edit() {
        $config['upload_path'] = './uploads/innovations_and_lessons/';
        $config['allowed_types'] = '*';
        $config['max_size'] = 1024 * 8;
        //$config['over_write'] = true;

        $this -> load -> library('upload', $config);

        $validation = $this -> validate_file_upload();

        if ($validation) {
            $upload_data = array();
            $file_data = array();
            $user_data = $this -> session -> userdata('user_data');
            $innovation = $this -> session -> userdata('form');
            $innovation_id = $innovation['innovation_id'];

            if (!$this -> upload -> do_upload()) {
                //No new file presented
                $file_data['title'] = $this -> input -> post('innovation_title', true);
                $file_data['description'] = $this -> input -> post('description', true);
                $file_data['user_id'] = $user_data['user_id'];
                 $file_data['edited'] = time();
            } else {
                //Means we have a new file
                $old_doc = $innovation['file_name'];

                if (file_exists('./uploads/innovations_and_lessons/' . $old_doc)) {
                    try {
                        unlink('./uploads/innovations_and_lessons/' . $old_doc);
                    } catch(Exception $e) {
                        //var_dump($e -> getMessage());
                    }
                }

                $upload_data = $this -> upload -> data();
                $file_data['title'] = $this -> input -> post('innovation_title', true);
                $file_data['file_name'] = $upload_data["orig_name"];
                $file_data['description'] = $this -> input -> post('description', true);
                $file_data['size'] = $upload_data["file_size"];
                $file_data['type'] = $upload_data["file_type"];
                $file_data['directory_path'] = "uploads/innovations_and_lessons/";
                $file_data['user_id'] = $user_data['user_id'];
                $file_data['edited'] = time();
            }
            $this -> session -> set_flashdata('message', "Innovation updated....!");
            $this -> innovations_model -> update_innovation($file_data, $innovation_id);
            redirect('edit_content/3');

        } else {
            $this -> template -> load('default', 'innovations/edit_uploads', $this -> data);
        }

    }

    function validate_file_upload() {
        $this -> form_validation -> set_rules('innovation_title', 'Title', 'required|xss_clean');
        $this -> form_validation -> set_rules('description', 'Description', 'xss_clean');
        return $this -> form_validation -> run();
    }
    
        function filter() {
        $organization_id = $this -> uri -> segment(3);
        $this -> data['org_id'] = $organization_id;
        $this -> data['innovations'] = $this -> innovations_model -> get_org_innovations($organization_id);
        $this -> template -> load('default', 'innovations/innovations', $this -> data);
    }

}
