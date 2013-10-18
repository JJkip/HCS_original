<?php

class Documents extends CI_Controller {

    protected $data = array();

    function __construct() {

        parent::__construct();
        $this->load->model('documents/documents_model');
        $this->load->model('mediacenter_model');
        $categories = $this->documents_model->get_categories();
        $this->data['form'] = $this->session->userdata('form');

        $this->data['categories'] = $categories;
        /* KEYS:
         * Regional Key: 1=>Somaliland, 2=>Puntland 3=>South Central
         * Organization Key: 1 => UK Aid, 2 => Save the children, 3 => THET, 4 => psi, 5 => Troicaire, 6 => Health poverty action
         */
    }

    function create_alert_digest() {
        $alerts = $this->documents_model->get_alerts();
        if (count($alerts) > 0) {
            $digest_arr = array();
            $digest_arr['documents'] = array();
            $digest_arr['tools'] = array();
            $digest_arr['innovations'] = array();
            $digest_arr['radiospots'] = array();
            $digest_arr['posters'] = array();
            $digest_arr['reports'] = array();
            $digest_arr['events'] = array();
            $digest_arr['minutes'] = array();
            $digest_arr['news'] = array();
//        echo '<pre>';
//        var_dump($alerts);
//        die;
            foreach ($alerts as $alert) {
//            echo $alert->category . '<br>';
                switch ($alert->category) {
                    case 'tool':
                        $digest_arr['tools'][] = $alert->title;
                        break;
                    case 'document':
                        $digest_arr['documents'][] = $alert->title;
                        break;
                    case 'event':
                        $digest_arr['events'][] = $alert->title;
                        break;
                    case 'reports':
                        $digest_arr['reports'][] = $alert->title;
                        break;
                    case 'meeting_minutes':
                        $digest_arr['minutes'][] = $alert->title;
                        break;
                    case 'news':
                        $digest_arr['news'][] = $alert->title;
                        break;
                    case 'innovations_lessons':
                        $digest_arr['innovations'][] = $alert->title;
                        break;
                    case 'poster':
                        $digest_arr['posters'][] = $alert->title;
                        break;
                    case 'radiospot':
                        $digest_arr['radiospots'][] = $alert->title;
                        break;
                    default :
                        break;
                }
                //we need to update the alerts to show that we have sent it
                $this->documents_model->update_alert($alert->id);
            }
//        var_dump($digest_arr);
            $digest = "<body>";
            $digest.="<h3>This is what has been going on</h3>";
            if (count($digest_arr['documents']) > 0) {
                $digest.="<h4>" . count($digest_arr['documents']) . " new document(s)</h4>";
                $digest.="<ul>";
                foreach ($digest_arr['documents'] as $document) {
                    $digest.="<li>" . $document . "</li>";
                }
                $digest.="</ul>";
            }
            if (count($digest_arr['tools']) > 0) {
                $digest.="<h4>" . count($digest_arr['tools']) . " new tool(s)</h4>";
                $digest.="<ul>";
                foreach ($digest_arr['tools'] as $document) {
                    $digest.="<li>" . $document . "</li>";
                }
                $digest.="</ul>";
            }
            if (count($digest_arr['reports']) > 0) {
                $digest.="<h4>" . count($digest_arr['reports']) . " new report(s)</h4>";
                $digest.="<ul>";
                foreach ($digest_arr['reports'] as $document) {
                    $digest.="<li>" . $document . "</li>";
                }
                $digest.="</ul>";
            }
            if (count($digest_arr['events']) > 0) {
                $digest.="<h4>" . count($digest_arr['events']) . " new event(s)</h4>";
                $digest.="<ul>";
                foreach ($digest_arr['events'] as $document) {
                    $digest.="<li>" . $document . "</li>";
                }
                $digest.="</ul>";
            }
            if (count($digest_arr['tools']) > 0) {
                $digest.="<h4>" . count($digest_arr['minutes']) . " new meeting minutes</h4>";
                $digest.="<ul>";
                foreach ($digest_arr['minutes'] as $document) {
                    $digest.="<li>" . $document . "</li>";
                }
                $digest.="</ul>";
            }
            if (count($digest_arr['news']) > 0) {
                $digest.="<h4>" . count($digest_arr['news']) . " new news item(s)</h4>";
                $digest.="<ul>";
                foreach ($digest_arr['news'] as $document) {
                    $digest.="<li>" . $document . "</li>";
                }
                $digest.="</ul>";
            }
            if (count($digest_arr['innovations']) > 0) {
                $digest.="<h4>" . count($digest_arr['tools']) . " new innovation(s)</h4>";
                $digest.="<ul>";
                foreach ($digest_arr['innovations'] as $document) {
                    $digest.="<li>" . $document . "</li>";
                }
                $digest.="</ul>";
            }
            if (count($digest_arr['posters']) > 0) {
                $digest.="<h4>" . count($digest_arr['posters']) . " new poster(s)</h4>";
                $digest.="<ul>";
                foreach ($digest_arr['posters'] as $document) {
                    $digest.="<li>" . $document . "</li>";
                }
                $digest.="</ul>";
            }
            if (count($digest_arr['radiospots']) > 0) {
                $digest.="<h4>" . count($digest_arr['radiospots']) . " new radiospot(s)</h4>";
                $digest.="<ul>";
                foreach ($digest_arr['radiospots'] as $document) {
                    $digest.="<li>" . $document . "</li>";
                }
                $digest.="</ul>";
            }
            $digest.='<p>Learn more by visiting <a href="' . site_url() . '">HCS-SHARE</a></p>';
            $digest.="</body>";
            $data['digest'] = $digest;
            //post the digest message
            $digest_id = $this->documents_model->insert_digest($data);
            //create the subscriber list to email to
            $this->create_alert_list($digest_id);
        }
        echo 'nothing to send at the moment';
        die;
    }

    function create_alert_list($digest_id) {
        //get a list of all user emails
        $emails = $this->documents_model->get_user_emails("all");
        $data = array();
        $counter = 0;
        foreach ($emails as $email) {
            $data[$counter] = array(
                'email' => $email->user_profile_email,
                'digest_id' => $digest_id,
            );
            $this->documents_model->insert_emailing_list($data[$counter]);
            $counter++;
        }
        echo '<br>done creating list';
//        echo '<pre>';
//        var_dump($data);
//        $this->documents_model->insert_emailing_list($data);
        die;
    }

    function send_emails() {
        $out_box = $this->documents_model->get_pending_digests();
        if (count($out_box) > 0) {
            date_default_timezone_set('Africa/Nairobi');
            $date = date('Y-m-d h:i a', time());
//            echo 'date: '.$date; die;
//            echo '<pre>';
//            var_dump($out_box);
            $this->load->library('email');
            $this->email->from('info@hcsshare.org', 'HCS-SHARE');

            $this->email->subject('HCS-SHARE Update as of ' . $date);
            foreach ($out_box as $out) {
                $this->email->to($out->email);
                $this->email->message($out->digest);
                $this->email->send();
                //update the subscriber so that we don't send it twice
                $this->documents_model->update_alert_list($out->id);
//                echo $this->email->print_debugger();
//                die;
            }
        }
        echo 'nothing more to send';
        die;
    }

    function send_champions_email() {
        /**
         * get all the HCS champions
         */
        $champions = $this->documents_model->get_champions();
//        echo '<pre>';
//        var_dump($champions);
//        die;
        $html = "<body>";
        $html.="<h4>Hello HCS SHARE Champions,</h4>";
        $html.="<p>I hope your week went well?</p>";
        $html.="<p>Do you have activities this week that should be put on the event calendar?</p>";
        $html.="<p>What new documents do you have to share with the HCS partners?</p>";
        $html.="<p>Have you uploaded anything new in the past week?</p>";
        $html.="<p>Thank you for all of your extra work on making HCS SHARE a success!</p>";
        $html.="<p>Thanks,</p>";
        $html.="<p>Daun</p>";

        date_default_timezone_set('Africa/Nairobi');
        $date = date('Y-m-d h:i a', time());
//            echo 'date: '.$date; die;
//        echo '<pre>';
//            var_dump($out_box);
        $this->load->library('email');
        $this->email->from('info@hcsshare.org', 'HCS-SHARE');

        $this->email->subject('HCS-SHARE Champions update - ' . $date);
//        $this->email->subject('Are the crons running? Yes!');
//        $this->email->to('kiruik@gmail.com');
//        $this->email->message($html);
//        $this->email->send();
//        die;
        foreach ($champions as $champion) {
//            echo $champion->email . '<br>';
            $this->email->to($champion->email);
            $this->email->message($html);
            $this->email->send();
        }

        echo 'nothing more to send';
        die;
    }

    function index() {
        $this->data['organization_id'] = $this->uri->segment(3);
        $this->data['category_id'] = 0;
        $this->data['region_id'] = $this->uri->segment(2);
        if ($this->uri->segment(4)) {
            $this->data['category_id'] = $this->uri->segment(4);
        }
        $this->data['saved_docs'] = $this->documents_model->get_docs($this->data['organization_id'], $this->data['category_id']);

        $this->data['related_media'] = $this->mediacenter_model->documents_related_media($this->data['organization_id']);
        //        echo '<pre>';
        //        var_dump($this->data['related_media']);
        //        die;
        $select = array("0" => "--Select category--");
        $this->data['categories'] = array_merge($select, $this->data['categories']);
        //        echo $this->data['organization_id'].' '.$this->data['region_id']; die;
        //        echo '<pre>';
        //        var_dump($this->data['categories']); die;
        $this->template->load('default', 'documents/documents', $this->data);
    }

    function upload_docs() {

        $this->template->load('default', 'documents/upload_docs', $this->data);
    }

    //Open upload form
    function edit_uploads() {
        $form = $this->data['form'];
        $document_id = $form['document_id'];
        //Fetch all
        $this->data['doc_categories'] = $this->documents_model->get_doc_categories($document_id);

        $this->template->load('default', 'documents/edit_uploads', $this->data);
    }

    function do_upload() {
        $config['upload_path'] = './uploads/documents/';
        $config['allowed_types'] = '*';
        $config['max_size'] = 1024 * 8;

        $this->load->library('upload', $config);

        $validation = $this->validate_file_upload();

        if ($validation) {

            if (!$this->upload->do_upload()) {
                $this->data["status"] = array('error' => $this->upload->display_errors());

                $this->template->load('default', 'documents/upload_docs', $this->data);
            } else {
                $user_data = $this->session->userdata('user_data');
                $upload_data = $this->upload->data();

                $file_data = array();
                $file_data['title'] = $this->input->post('doc_title', true);
                $file_data['file_name'] = $upload_data["orig_name"];
                $file_data['description'] = $this->input->post('description', true);
                $file_data['size'] = $upload_data["file_size"];
                $file_data['type'] = $upload_data["file_type"];
                $file_data['directory_path'] = "uploads/documents/";
                $file_data['user_id'] = $user_data['user_id'];
                $file_data['upload_date'] = unix_to_human(time(), TRUE, 'eu');

                $this->documents_model->save_file_data($file_data, $this->data['categories']);

                $this->data['status'] = array('upload_data' => $this->upload->data());

                $saved_file = $upload_data["client_name"];
                $this->data['saved_file'] = $upload_data["client_name"];

                $this->session->set_flashdata('message', "$saved_file has successfully been uploaded.");

                //$this->template->load('default', 'documents/upload_docs', $this->data);
                redirect('edit_content/1');
                //redirect('home');
            }
        } else {
            $this->template->load('default', 'documents/upload_docs', $this->data);
        }
    }

    function do_edit() {
        $config['upload_path'] = './uploads/documents/';
        $config['allowed_types'] = '*';
        $config['max_size'] = 1024 * 8;
        //$config['over_write'] = true;

        $this->load->library('upload', $config);

        $validation = $this->validate_file_upload();

        if ($validation) {
            $upload_data = array();
            $file_data = array();
            $user_data = $this->session->userdata('user_data');
            $document_id = $this->input->post('document_id', true);
            if (!$this->upload->do_upload()) {
                //No new file presented
                $file_data['title'] = $this->input->post('doc_title', true);
                $file_data['description'] = $this->input->post('description', true);
                $file_data['user_id'] = $user_data['user_id'];
                $file_data['edited'] = time();
            } else {
                //Means we have a new file
                $old_doc_data = $this->session->userdata('form');
                $old_doc = $old_doc_data['file_name'];

                if (file_exists('./uploads/documents/' . $old_doc)) {
                    try {
                        unlink('./uploads/documents/' . $old_doc);
                    } catch (Exception $e) {

                    }
                }
                $upload_data = $this->upload->data();
                $file_data['title'] = $this->input->post('doc_title', true);
                $file_data['file_name'] = $upload_data["orig_name"];
                $file_data['description'] = $this->input->post('description', true);
                $file_data['size'] = $upload_data["file_size"];
                $file_data['type'] = $upload_data["file_type"];
                $file_data['directory_path'] = "uploads/documents/";
                $file_data['user_id'] = $user_data['user_id'];
                $file_data['edited'] = time();
            }

            $this->session->set_flashdata('message', "Document updated....!");
            $this->documents_model->update_docs($file_data, $this->data['categories'], $document_id);
            redirect('edit_content/1');
        } else {
            $this->template->load('default', 'documents/edit_uploads', $this->data);
        }
    }

    function validate_file_upload() {
        $this->form_validation->set_rules('doc_title', 'Title', 'required|xss_clean');
        $this->form_validation->set_rules('description', 'Description', 'xss_clean');
        return $this->form_validation->run();
    }

}
