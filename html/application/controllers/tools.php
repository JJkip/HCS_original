<?php
class Tools extends CI_Controller {

    protected $data = array("title" => "Tools");

    function __construct() {

        parent::__construct();

        $this -> load -> model('tools/tools_model');

        $this -> data["organizations"] = $this -> tools_model -> get_organizations();

        $this -> data['org_tools'] = $this -> tools_model -> get_tools();

        $this -> data['org_id'] = 0;
        $this -> data['form'] = $this -> session -> userdata('form');
    }

    function index() {

        $this -> template -> load('default', 'tools/tools', $this -> data);

    }

    function upload_tools() {

        $this -> template -> load('default', 'tools/upload_tools', $this -> data);

    }
    
       //Open upload form
    function edit_uploads() {
        $this -> template -> load('default', 'tools/edit_tools', $this -> data);
    }

    function do_upload() {
        $config['upload_path'] = './uploads/tools/';
        $config['allowed_types'] = '*';
        $config['max_size'] = 1024 * 8;

        $this -> load -> library('upload', $config);

        $validation = $this -> validate_file_upload();

        if ($validation) {

            if (!$this -> upload -> do_upload()) {
                $this -> data["status"] = array('error' => $this -> upload -> display_errors());

                $this -> template -> load('default', 'tools/upload_tools', $this -> data);

            } else {
                $user_data = $this -> session -> userdata('user_data');
                $upload_data = $this -> upload -> data();

                $file_data = array();
                $file_data['title'] = $this -> input -> post('tool_title', true);
                $file_data['file_name'] = $upload_data["orig_name"];
                $file_data['description'] = $this -> input -> post('description', true);
                $file_data['size'] = $upload_data["file_size"];
                $file_data['type'] = $upload_data["file_type"];
                $file_data['directory_path'] = "uploads/tools/";
                $file_data['user_id'] = $user_data['user_id'];
                $file_data['upload_date'] = unix_to_human(time(), TRUE, 'eu');

                $this -> tools_model -> save_file_data($file_data);

                $this -> data['status'] = array('upload_data' => $this -> upload -> data());

                $saved_file = $upload_data["client_name"];

                $this -> data['saved_file'] = $saved_file;

                $this -> session -> set_flashdata('message', "$saved_file has successfully been uploaded.");

                redirect('tools');
                //$this -> template -> load('default', 'home/home', $this -> data);

            }
        } else {
            $this -> template -> load('default', 'tools/upload_tools', $this -> data);
        }
    }

    //Edit tools
    function do_edit() {
        $config['upload_path'] = './uploads/tools/';
        
        $config['allowed_types'] = '*';
        $config['max_size'] = 1024 * 8;
        //$config['over_write'] = true;

        $this -> load -> library('upload', $config);

        $validation = $this -> validate_file_upload();

        if ($validation) {
            $upload_data = array();
            $file_data = array();
            $user_data = $this -> session -> userdata('user_data');
            $tool = $this -> session -> userdata('form');
            $tool_id = $tool['tool_id'];

            if (!$this -> upload -> do_upload()) {
                //No new file presented
                $file_data['title'] = $this -> input -> post('tool_title', true);
                $file_data['description'] = $this -> input -> post('description', true);
                $file_data['user_id'] = $user_data['user_id'];
                $file_data['edited'] = time();
            } else {
                //Means we have a new file
                $old_doc = $tool['file_name'];
                
                if (file_exists('./uploads/tools/' . $old_doc)) {
                    try {
                        unlink('./uploads/tools/' . $old_doc);
                    } catch(Exception $e) {
                        //var_dump($e -> getMessage());
                    }
                }

                $upload_data = $this -> upload -> data();
                $file_data['title'] = $this -> input -> post('tool_title', true);
                $file_data['file_name'] = $upload_data["orig_name"];
                $file_data['description'] = $this -> input -> post('description', true);
                $file_data['size'] = $upload_data["file_size"];
                $file_data['type'] = $upload_data["file_type"];
                $file_data['directory_path'] = "uploads/tools/";
                $file_data['user_id'] = $user_data['user_id'];
                $file_data['edited'] = time();
				
            }

            $this -> session -> set_flashdata('message', "Tool updated....!");

            $this -> tools_model -> update_tools($file_data, $tool_id);
            redirect('edit_content/2');

        } else {
            $this -> template -> load('default', 'tools/edit_tools', $this -> data);
        }
    }

    function validate_file_upload() {
        $this -> form_validation -> set_rules('tool_title', 'Title', 'required|xss_clean');
        $this -> form_validation -> set_rules('description', 'Description', 'xss_clean');
        return $this -> form_validation -> run();
    }

    //
    function filter() {
        $organization_id = $this -> uri -> segment(3);
         $this -> data['org_id'] = $organization_id;
        $this -> data['org_tools'] = $this -> tools_model -> get_org_tools($organization_id);
        $this -> template -> load('default', 'tools/tools', $this -> data);
    }

}
