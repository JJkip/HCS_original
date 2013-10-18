<?php

class Media_centre extends CI_Controller {

    protected $data = array("title" => "Media centre");

    function __construct() {
        parent::__construct();
        $this->load->helper(array('form', 'url'));
        $this->load->model('mediacenter_model');
        $this->load->model("home/home_model");
//        $this->load->library('session');
    }

    function index() {
//        $data_before = $this->mediacenter_model->get_organizations();

        $action = $this->uri->segment(3);
        switch ($action) {
            case 'radiospot':
                $data['title'] = 'New radio spot';
                $data['section'] = '0';
//                $this->load->view('media_centre/create', array('error' => '', 'data' => $data));
                $this->template->load('default', 'media_centre/create', array('error' => '', 'data' => $data));
                break;
            case 'poster':
                $data['title'] = 'New poster';
                $data['section'] = '2';
//                $this->load->view('media_centre/create', array('error' => '', 'data' => $data));
                $this->template->load('default', 'media_centre/create', array('error' => '', 'data' => $data));
                break;
            case 'video':
                //test inclusion
                $data['title'] = 'New video';
                $data['section'] = '1';
//                $this->load->view('media_centre/create', array('error' => '', 'data' => $data));
                $this->template->load('default', 'media_centre/create', array('error' => '', 'data' => $data));
//                redirect(base_url() . 'index.php/media_centre/request_youtube');
//                $this->load->view('media_centre/create', array('error' => ' ', 'data' => $data));
                break;
            default :
                $data['title'] = 'New video';
                $data['section'] = '1';
//                $this->load->view('media_centre/create', array('error' => '', 'data' => $data));
                $this->template->load('default', 'media_centre/create', array('error' => '', 'data' => $data));
        }
    }

    function edit() {
        $id = $this->uri->segment(3);
//        echo '<pre>';
        $data = $this->mediacenter_model->get_item_by_id($id);
        $this->template->load('default', 'media_centre/edit', array('error' => '', 'data' => $data));
//        var_dump($data);
//        die;
//        echo 'id: ' . $id;
//        die;
    }

    function manage() {
        $section = $this->uri->segment(3);
        switch ($section) {
            case 'posters':
                break;
            case 'radiospots':
                break;
            case 'videos':
                break;
            case 'gallery':
                break;
            default:
        }
    }

    function item() {
//        echo 'we are here man'; die;
        $slug = $this->uri->segment(3);
        $item = $this->mediacenter_model->get_item($slug);
        $item->created = date('j F Y', strtotime($item->created));
        $item->size = floor($item->size);
        switch ($item->type) {
            case '.jpg':
                $item->css_class = 'description-img';
                break;
            case '.pdf':
                $item->css_class = 'description-pdf';
                break;
            default :
                $item->css_class = 'description-img';
        }
        if ($item->category_id == '0')
            $item->download_link = base_url() . 'uploads/media_center/radio_spots/' . $item->file;
        else
            $item->download_link = base_url() . 'uploads/media_center/posters/' . $item->file;
        $user_info = $this->mediacenter_model->get_user_details($item->user_id);
        $item->organization = $user_info->organization;
        $this->data['media'] = $item;
        $this->data['title'] = $item->title;
        $this->template->load('default', 'media_centre/item', $this->data);
//        echo '<pre>';
//        var_dump($item);
//        die;
    }

    function radiospots() {
        $this->data['media'] = array();
        $this->data["organizations"] = $this->home_model->get_organizations();
        $this->data['org_id'] = 0;
        if ($this->uri->segment(3)) {
            $this->data['org_id'] = $this->uri->segment(3);
        }
        $data_before = $this->mediacenter_model->get_media('0', $this->data['org_id']);
//        $data_before = $this->mediacenter_model->get_media('0');
//        echo '<pre>';
//        var_dump($data_before);
//        die;
        //we need to get the correct file type to use on the class description
        foreach ($data_before as $radiospot) {
            //add the css class for styling
            $radiospot['css_class'] = 'description-mp3';
            //convert date to a readable format
            $radiospot['created'] = date('j F Y', strtotime($radiospot['created']));
            //round off all file sizes
            $radiospot['size'] = floor($radiospot['size']);
            //create download link
            $radiospot['download_link'] = base_url() . 'uploads/media_center/radio_spots/' . $radiospot['file'];
            //let us add the org info, first retrieve it based on the user id
            $user_info = $this->mediacenter_model->get_user_details($radiospot['user_id']);
            $radiospot['organization'] = $user_info->organization;
//            var_dump($user_info);
//            die;
            $this->data['media'][] = $radiospot;
        }
        $this->data['title'] = 'Radio spots';
        $this->data['section'] = 'radiospots';
//                $this->load->view('media_centre/radiospots', $data);
        $this->template->load('default', 'media_centre/radiospots', $this->data);
    }

    public function posters() {
        //get all the radio spots
        $this->data['media'] = array();
        $this->data["organizations"] = $this->home_model->get_organizations();
//        echo '<pre>';
//        var_dump($this->data["organizations"]); die;
        $this->data['org_id'] = 0;
        if ($this->uri->segment(3)) {
            $this->data['org_id'] = $this->uri->segment(3);
        }
        $data_before = $this->mediacenter_model->get_media('2', $this->data['org_id']);
        //we need to get the correct file type to use on the class description
        foreach ($data_before as $media) {
            //add the css class for styling
            $media['css_class'] = 'description-img';
            //convert date to a readable format
            $media['created'] = date('j F Y', strtotime($media['created']));
            //round off all file sizes
            $media['size'] = floor($media['size']);
            //create download link
            $media['download_link'] = base_url() . 'uploads/media_center/posters_fliers/' . $media['file'];
            $user_info = $this->mediacenter_model->get_user_details($media['user_id']);
            $media['organization'] = $user_info->organization;
            $this->data['media'][] = $media;
        }
        $this->data['title'] = 'Posters/Fliers';
        $this->data['section'] = 'posters';
//                $this->load->view('media_centre/radiospots', $data);
        $this->template->load('default', 'media_centre/radiospots', $this->data);
    }

    function do_upload() {
        $category = $_POST['category_id'];
        $data = array();
        switch ($category) {
            case '0':
                $view = 'radiospots';
                $config['upload_path'] = './uploads/media_center/radio_spots/';
                $config['allowed_types'] = 'mp3|wav|mp4';
                $data['title'] = "New radio spot";
                break;
            case '2':
                $view = 'posters';
                $config['upload_path'] = './uploads/media_center/posters_fliers/';
                $config['allowed_types'] = 'png|jpg|pdf';
                $data['title'] = "New poster/flier";
                break;
            case '1':
                $view = 'videos';
                $config['upload_path'] = './uploads/media_center/videos/';
                $config['allowed_types'] = '*';
                $data['title'] = "New video";
                break;
        }
        $data['section'] = $this->input->post('category_id');
        $config['max_size'] = '0';
        $config['max_width'] = '0';
        $config['max_height'] = '0';
        $this->load->library('upload', $config);
        $this->load->library('form_validation');
        $this->form_validation->set_rules('title', 'Title', 'required');
//        $this->form_validation->set_rules('userfile', 'File', 'required');

        if ($this->form_validation->run() == FALSE) {
            $error = array('error' => 'Please fill all the fields', 'data' => $data);
            $this->template->load('default', 'media_centre/create', $error);
        } else {
            if (!$this->upload->do_upload()) {
                $error = array('error' => $this->upload->display_errors(), 'data' => $data);


                $this->template->load('default', 'media_centre/create', $error);
            } else {
                $data = array('upload_data' => $this->upload->data());
//                echo '<pre>';
//                var_dump($data);
//                die;
                //we have uploaded the file, let us save it on the database
                //for videos we are storing them in a different table so we have to check this
                if ($category == '1') {
                    //this is a video, we are sending it to youtube
                    $this->youtube_upload($data);
//                    echo 'after sending';
//                    die;
                } else {
                    $this->mediacenter_model->set_media($data);
                }
//                echo 'after set';
//                die;
//                $this->load->view('mediacenter/upload_success', $data);
                //we have saved the data succesfully, let us now redirect the user to the
                $this->session->set_flashdata('message', 'Your upload has been saved succesfully');
                redirect('media_centre/' . $view);
//                $this->template->load('default', 'media_centre/upload_success', $data);
            }
        }
    }

    function do_edit() {
        $this->load->library('form_validation');
        $this->form_validation->set_rules('title', 'Title', 'required|xss_clean');
        $data = $this->mediacenter_model->get_item_by_id($this->input->post('id'));
        if ($this->form_validation->run() == FALSE) {
            $this->template->load('default', 'media_centre/edit', array('error' => 'You deleted the title, please edit it and make sure it is not blank', 'data' => $data));
        } else {
            $file_data = array();
            $file_data['new_file'] = 0;
            $file_path = "";
            switch ($this->input->post('category_id')) {
                case '0':
                    $view = 'radiospot';
                    $section = 8;
                    $config['upload_path'] = './uploads/media_center/radio_spots/';
                    $file_path = $config['upload_path'];
                    $config['allowed_types'] = 'mp3|wav|mp4';
                    break;
                case '2':
                    $view = 'poster';
                    $section = 9;
                    $config['upload_path'] = './uploads/media_center/posters_fliers/';
                    $file_path = $config['upload_path'];
                    $config['allowed_types'] = 'png|jpg|pdf';
                    break;
                case '1':
                    $view = 'video';
                    $section = 10;
                    $config['upload_path'] = './uploads/media_center/videos/';
                    $file_path = $config['upload_path'];
                    $config['allowed_types'] = '*';
                    break;
                default :
                    break;
            }
            //check if the user has uploaded a different file
            if ($_FILES['userfile']['size'] > 0) {
                /**
                 * new file to upload, check category it falls in
                 * keys --> 0 => radiospot,1 => video, 2 => posters
                 */
                $this->load->library('upload', $config);
                if (!$this->upload->do_upload()) {
                    $error = array('error' => $this->upload->display_errors());
                    $this->template->load('default', 'media_centre/edit', array('error' => $this->upload->display_errors(), 'data' => $data));
                } else {
                    //we need to delete the old file
                    if (file_exists($file_path . $this->input->post('file'))) {
                        try {
                            unlink($file_path . $this->input->post('file'));
                        } catch (Exception $e) {
//                            var_dump($e->getMessage());
//                            die;
                        }
                    }
                    $file_data['new_file'] = 1;
                    $file_data['file_details'] = $this->upload->data();
                }
            }
            //we now push the data to our model and let it update the database
            $this->mediacenter_model->update_media($file_data);
            $this->session->set_flashdata('message', 'Your ' . $view . ' has been updated');
            redirect('edit_content/' . $section);
        }
    }

    //CALL THIS METHOD FIRST BY GOING TO
    //www.your_url.com/index.php/request_youtube
    public function request_youtube() {
        $params['key'] = $this->config->item('youtube_consumer_key');
        $params['secret'] = $this->config->item('youtube_consumer_secret');
        $params['algorithm'] = 'HMAC-SHA1';

        $this->load->library('google_oauth', $params);
        $data = $this->google_oauth->get_request_token(site_url('media_centre/media_centre/access_youtube'));
//        var_dump($data);
//        die;
        $this->session->set_userdata('token_secret', $data['token_secret']);
        redirect($data['redirect']);
    }

    function authorize_yt() {

    }

    //This method will be redirected to automatically
    //once the user approves access of your application
    public function access_youtube() {
        $params['key'] = $this->config->item('youtube_consumer_key');
        $params['secret'] = $this->config->item('youtube_consumer_secret');
        $params['algorithm'] = 'HMAC-SHA1';
        $this->load->library('google_oauth', $params);
        $oauth = $this->google_oauth->get_access_token(false, $this->session->userdata('token_secret'));
//        echo '<pre>';
//        var_dump($oauth);
//        die;
//        $this->session->set_userdata('oauth_token', $oauth['oauth_token']);
//        $this->session->set_userdata('oauth_token_secret', $oauth['oauth_token_secret']);
        //we are going to save these two fields to the database as we will always use them
        $res = $this->mediacenter_model->set_access_token($oauth);
//        var_dump($res);
//        die;
        //redirect the application so that we can do a video upload
        $data['title'] = 'New video';
        $data['section'] = '1';
        $this->load->view('media_centre/create', array('error' => '', 'data' => $data));
    }

    public function youtube_upload($data) {
//        echo '<pre>';
////        var_dump($_POST);
//        var_dump($data);
//        die;
        $videoPath = './uploads/media_center/videos/' . $data['upload_data']['file_name'];
        $videoType = $data['upload_data']['file_type']; //This is the mime type of the video ex: 'video/3gpp'
        $params['apikey'] = $this->config->item('youtube_api_key');
//we need to get our oauth keys from the database
        $keys = $this->mediacenter_model->get_access_token();
//        var_dump($keys); die;
        $params['oauth']['key'] = $this->config->item('youtube_consumer_key');
        $params['oauth']['secret'] = $this->config->item('youtube_consumer_secret');
        $params['oauth']['algorithm'] = 'HMAC-SHA1';
        $params['oauth']['access_token'] = array('oauth_token' => urlencode($keys->oauth_token),
            'oauth_token_secret' => urlencode($keys->oauth_token_secret));
        $this->load->library('youtube', $params);
        //get the user details so that we can use it as part of the tags
        $tag_res = $this->mediacenter_model->get_current_user_details();
        $tags = $tag_res->organization;
        $title = $_POST['title'];
        $description = ( $_POST['description'] == '' ? $title : $_POST['description']);
        $metadata = '<entry xmlns="http://www.w3.org/2005/Atom" xmlns:media="http://search.yahoo.com/mrss/" xmlns:yt="http://gdata.youtube.com/schemas/2007"><media:group><media:title type="plain">' . $title . '</media:title><media:description type="plain">' . $description . '</media:description><media:category scheme="http://gdata.youtube.com/schemas/2007/categories.cat">News</media:category><media:keywords>' . $tags . '</media:keywords></media:group></entry>';
//        echo '<pre>';
        $res = $this->youtube->directUpload($videoPath, $videoType, $metadata);
//        echo '<pre>';
//        if ($res != false) {
//            var_dump($res);
//        } else {
//            var_dump($res);
//        }
//        die;
        $this->videos();
//        echo $res . '<br>';
//        var_dump(explode(":", $res));
//        die;
    }

    function videos() {
        $params['apikey'] = $this->config->item('youtube_api_key');
//we need to get our oauth keys from the database
        $keys = $this->mediacenter_model->get_access_token();
//        var_dump($keys); die;
        $params['oauth']['key'] = $this->config->item('youtube_consumer_key');
        $params['oauth']['secret'] = $this->config->item('youtube_consumer_secret');
        $params['oauth']['algorithm'] = 'HMAC-SHA1';
        $params['oauth']['access_token'] = array('oauth_token' => urlencode($keys->oauth_token),
            'oauth_token_secret' => urlencode($keys->oauth_token_secret));
        $this->load->library('youtube', $params);
        $res = json_decode($this->youtube->getUserUploads(), true);
//        echo '<pre>';
//        var_dump($res['feed']['entry']); die;
        $videos = array();
        $items = $res['feed']['entry'];
//        var_dump($items);
        foreach ($items as $item) {
            $id = end(explode("/", $item['id']['$t']));
//            echo $id.'<br>'; die;
//            var_dump($id_arr); die;

            $item_array = array();
            $item_array['title'] = $item['title']['$t'];
            $item_array['description'] = $item['content']['$t'];
            $item_array['link'] = $item['link'][0]['href'];
            $item_array['keywords'] = $item['media$group']['media$keywords']['$t'];
            $item_array['id'] = $id;

            $videos[] = $item_array;
//            echo $item_array['title'];
        }
//        var_dump($videos);
        $data['media'] = $videos;
        $data['title'] = 'Videos';
//        $this->load->view('media_centre/videos', $data);
        $this->template->load('default', 'media_centre/videos', $data);
//        die;
    }

}