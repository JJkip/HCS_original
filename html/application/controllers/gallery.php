<?php

class Gallery extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('Gallery_model');
        $this->load->helper(array('form'));
        $this->load->model("home/home_model");
//        $this->load->library('session');
//         $this->load->model('mediacenter_model');
    }

    function index_p() {

//        echo '<pre>';
//        $user_data = $this -> session -> userdata('user_data');
//        
        $this->data["organizations"] = $this->home_model->get_organizations();
//        var_dump($this->data["organizations"]); die;
        $this->data['org_id'] = 0;
        if ($this->uri->segment(3)) {
            $this->data['org_id'] = $this->uri->segment(3);
        }
        $images = $this->Gallery_model->get_images($this->data['org_id']);
        $this->load->model('mediacenter_model');
//        echo '<pre>';
//        var_dump($images);
//        die;
        foreach ($images as $image) {
            $dat_arr = array();
            $dat_arr['image_url'] = base_url() . 'uploads/media_center/gallery/unsorted/' . $image['image_path'];
            $dat_arr['thumb_url'] = base_url() . 'uploads/media_center/gallery/thumbs/' . $image['image_path'];
            $dat_arr['caption'] = $image['caption'];
            $dat_arr['created'] = date('j F Y', strtotime($image['created']));
            $user_info = $this->mediacenter_model->get_user_details($image['user_id']);
            $dat_arr['organization'] = $user_info->organization;
            $this->data['images'][] = $dat_arr;
        }
//        var_dump($data['images']);
//        die;
//        $data['images'] =

        $this->data['title'] = 'Photo gallery';
        $this->template->load('default', 'media_centre/gallery', array('error' => '', 'data' => $this->data));
//        $this->load->view('media_centre/gallery', $data);
    }

    function index() {
//        echo 'hit album function'; die;
        $this->data["organizations"] = $this->home_model->get_organizations();
//        var_dump($this->data["organizations"]); die;
        $this->data['org_id'] = 0;
        if ($this->uri->segment(3)) {
            $this->data['org_id'] = $this->uri->segment(3);
        }
//        $images = $this->Gallery_model->get_images($this->data['org_id']);
        $this->load->model('mediacenter_model');
//        echo '<pre>';
//        var_dump($images);
//        die;
//        foreach ($images as $image) {
//            if ($image['type'] == '.zip') {
//                echo 'in the zip'; die;
        $extensions = array(".jpg", ".png", ".gif", ".JPG", ".PNG", ".GIF"); // allowed extensions in photo gallery
        $folder_path = './uploads/media_center/gallery';
        $folders = scandir($folder_path, 0);
//        echo '<pre>';
//        var_dump($folders);
//        die;
        $ignore = array('.', '..', 'thumbs');
        $albums = array();
//                $captions = array();
        $random_pics = array();

        foreach ($folders as $album) {

            if (!in_array($album, $ignore)) {
                $album_arr['album'] = $album;
                if ($album == "unsorted") {
                    $album_arr['caption'] = "Other pictures from partners";
                    $album_arr['created'] = "NA";
                    array_push($albums, $album_arr);
                    $rand_dirs = glob($folder_path . '/' . $album . '/*.*', GLOB_NOSORT);
                    $rand_pic = $rand_dirs[array_rand($rand_dirs)];
                    array_push($random_pics, $rand_pic);
//                    array_push($albums, $album_arr);
                } else {
                    //use the album name to get the correct caption for the photos
                    $cap = $this->Gallery_model->get_album_caption($album);
                    if (is_object($cap)) {
                        $album_arr['caption'] = $cap->caption;
                        $album_arr['created'] = date('j F Y', strtotime($cap->created));
//                        array_push($albums, $album_arr);
                        array_push($albums, $album_arr);
                        $rand_dirs = glob($folder_path . '/' . $album . '/*.*', GLOB_NOSORT);
                        $rand_pic = $rand_dirs[array_rand($rand_dirs)];
                        array_push($random_pics, $rand_pic);
                    } else {
                        $album_arr['caption'] = $album;
                        $album_arr['created'] = "NA";
                    }
                }
//                array_push($albums, $album_arr);
//                $rand_dirs = glob($folder_path . '/' . $album . '/*.*', GLOB_NOSORT);
//                $rand_pic = $rand_dirs[array_rand($rand_dirs)];
//                array_push($random_pics, $rand_pic);
            }
        }
        $this->data['albums'] = $albums;
        $this->data['random_pics'] = $random_pics;
        $this->data['title'] = 'Photo gallery';
        $this->template->load('default', 'media_centre/albums', array('error' => '', 'data' => $this->data));
    }

    function album() {
//        echo 'huku tunafika';
//        echo '<pre>';
        $album = $this->uri->segment(3);
//        echo 'album: '.$album; die;
        $folder_path = './uploads/media_center/gallery';
// display photos in album
        $src_folder = $folder_path . '/' . $album;
        $src_files = scandir($src_folder);
        $extensions = array(".jpg", ".png", ".gif", ".JPG", ".PNG", ".GIF"); // allowed extensions in photo gallery
        $data = array();
        $ignore = array('.', '..', 'thumbs');
        foreach ($src_files as $file) {
            if (!in_array($file, $ignore)) {
                $ext = strrchr($file, '.');
                if (in_array($ext, $extensions)) {
//                $file_url=
                    $img_arr = array();
                    if ($album == "unsorted") {
                        $img_arr['image_url'] = base_url() . 'uploads/media_center/gallery/' . $album . '/' . $file;
                        $img_arr['thumb_url'] = base_url() . 'uploads/media_center/gallery/' . '/thumbs/' . $file;
                        $cap = $this->Gallery_model->get_album_caption($file);
                        if (is_object($cap)) {
                            $img_arr['caption'] = $cap->caption;
                            $img_arr['created'] = date('j F Y', strtotime($cap->created));
                        } else {
                            $img_arr['caption'] = $album;
                            $img_arr['created'] = "NA";
                        }
                    } else {
                        $img_arr['image_url'] = base_url() . 'uploads/media_center/gallery/' . $album . '/' . $file;
                        $img_arr['thumb_url'] = base_url() . 'uploads/media_center/gallery/' . $album . '/thumbs/' . $file;
                        $cap = $this->Gallery_model->get_album_caption($album);
                        if (is_object($cap)) {
                            $img_arr['caption'] = $cap->caption;
                            $img_arr['created'] = date('j F Y', strtotime($cap->created));
                        } else {
                            $img_arr['caption'] = $album;
                            $img_arr['created'] = "NA";
                        }
//                    array_push($data, $img_arr);
                        if (!is_dir($src_folder . '/thumbs')) {
                            mkdir($src_folder . '/thumbs');
                            chmod($src_folder . '/thumbs', 0777);
                            //chown($src_folder.'/thumbs', 'apache');
                        }
                        $thumb = $src_folder . '/thumbs/' . $file;
                        if (!file_exists($thumb)) {
                            $this->make_thumb($src_folder, $file, $thumb, 100);
                        }
                    }
                    array_push($data, $img_arr);
                }
            }
        }
//        echo '<pre>';
//        var_dump($data);
//        die;
        $this->template->load('default', 'media_centre/album', array('data' => $data));
//        var_dump($data);
//
//        die;
    }

    function make_thumb($folder, $src, $dest, $thumb_width) {

        $source_image = imagecreatefromjpeg($folder . '/' . $src);
        $width = imagesx($source_image);
        $height = imagesy($source_image);

        $thumb_height = floor($height * ($thumb_width / $width));

        $virtual_image = imagecreatetruecolor($thumb_width, $thumb_height);

        imagecopyresampled($virtual_image, $source_image, 0, 0, 0, 0, $thumb_width, $thumb_height, $width, $height);

        imagejpeg($virtual_image, $dest, 100);
    }

    function upload() {
        $data['title'] = 'New Photo';
        $this->template->load('default', 'media_centre/new_image', array('error' => '', 'data' => $data));
    }

    function do_upload() {
//        echo '<pre>';
//        var_dump($_FILES);
//        die;
        $data['title'] = 'New Photo';
        $config = array(
            'allowed_types' => 'jpg|jpeg|gif|png|zip',
            'max_size' => 0
        );
//        echo 'file type: '.$_FILES['userfile']['type']; die;
        if ($_FILES['userfile']['type'] == 'application/zip')
            $config['upload_path'] = './uploads/media_center/gallery/';
        else
            $config['upload_path'] = './uploads/media_center/gallery/unsorted/';
//        echo 'upload folder: '.$config['upload_path']; die;
        $this->load->library('upload', $config);
        $this->load->library('form_validation');
        $this->form_validation->set_rules('caption', 'Caption', 'required');
        if ($this->form_validation->run() == FALSE) {
//            $error = array('error' => 'Please fill all the fields');
            $this->template->load('default', 'media_centre/new_image', array('error' => 'Please fill all the fields', 'data' => $data));
        } else {
            if (!$this->upload->do_upload()) {
//                $error = array();
//                $this->load->view('media_centre/gallery', $error);
                $this->template->load('default', 'media_centre/new_image', array('error' => $this->upload->display_errors(), 'data' => $data));
            } else {
                $data = $this->upload->data();
//                echo '<pre>';
//                var_dump($data);
//                die;
                //check if the user uploaded a zipped folder or just a single image
                if ($data['file_ext'] == '.zip') {
                    //unzip the zipped folder and link it to the correct section
                    $this->load->library('unzip');
                    // Give it one parameter and it will extract to the same folder

                    $extracted = $this->unzip->extract($data['full_path']);
//                    var_dump($extracted);
                    if ($this->unzip->error_string() <> '') {
                        //use one of the paths to get the path folder
                        $path_array = explode("/", $extracted[0]);
//                        var_dump($path_array);
                        $data['file_name'] = $path_array[count($path_array) - 2];
                        $this->Gallery_model->set_images($data);
                        $this->session->set_flashdata('message', 'Your album has been created');
                        redirect('gallery');
                    } else {
                        $this->template->load('default', 'media_centre/new_image', array('error' => $this->unzip->error_string(), 'data' => $data));
                    }
                } else {

                    //resize image if it is more than 900 by 620
                    $image_size = $data['image_size_str'];
//                echo 'image size: ' . $image_size . '<br>';
                    $img_exploded = explode(" ", $image_size);
//                var_dump($img_exploded);
                    $width_arr = explode("=", $img_exploded[0]);
                    $height_arr = explode("=", $img_exploded[1]);
                    $width = (int) substr($width_arr[1], 1, strlen($width_arr[1]) - 2);
                    $height = (int) substr($height_arr[1], 1, strlen($height_arr[1]) - 2);
                    $img_src = $data['full_path'];
//                var_dump($width);
//                var_dump($height);
//                die;
//                var_dump($width_arr);
//                var_dump($height_arr);
//                die;
//                echo 'not '; die;
                    //now let us create the thumbnail for our image
                    $config = array(
                        'source_image' => $data['full_path'],
                        'new_image' => './uploads/media_center/gallery/thumbs',
                        'maintain_ration' => true,
                        'width' => 150,
                        'height' => 100
                    );
                    $this->load->library('image_lib', $config);
                    $this->image_lib->resize();
                    //resize image
                    $this->image_lib->clear();
                    if ($width > 900 || $height > 620) {
//                    echo 'image resize triggered';
//                    die;
                        $config2 = array(
                            'source_image' => $img_src,
                            'new_image' => './uploads/media_center/gallery/unsorted/',
                            'maintain_ration' => true,
                            'width' => 800,
                            'height' => 500,
                            'overwrite' => true
                        );
//                    echo 'the resize function was triggered';
//                    die;
                        $this->image_lib->initialize($config2);
                        $this->image_lib->resize();
                        $this->Gallery_model->set_images($data);
                        $this->session->set_flashdata('message', 'Your photo has successfully been uploaded.');
                        redirect('gallery');
                    }
//                die;
                    //we have uploaded the file, let us save it on the database
                }

//                echo 'after set';
//                die;
//                $this->load->view('mediacenter/upload_success', $data);
            }
        }
    }

}
