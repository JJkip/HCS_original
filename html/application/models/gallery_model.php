<?php

class Gallery_model extends CI_Model {

    var $gallery_path;
    var $gallery_path_url;

    function Gallery_model() {
//        parent::Model();

        $this->gallery_path = './uploads/media_center/gallery';
        $this->gallery_path_url = base_url() . 'uploads/media_center/gallery/';
    }

    function do_upload() {

        $config = array(
            'allowed_types' => 'jpg|jpeg|gif|png',
            'upload_path' => $this->gallery_path,
            'max_size' => 20000
        );

        $this->load->library('upload', $config);
        $this->upload->do_upload();
        $image_data = $this->upload->data();

        $config = array(
            'source_image' => $image_data['full_path'],
            'new_image' => $this->gallery_path . '/thumbs',
            'maintain_ration' => true,
            'width' => 150,
            'height' => 100
        );

        $this->load->library('image_lib', $config);
        $this->image_lib->resize();
    }

    function get_images($org=0) {
        if ($org <> 0) {
            $this->db->select('user_id');
            $this->db->from('users');
            $this->db->where('organization_id', $org);
            $query = $this->db->get();
//            echo '<pre>';
            $num_rows = $query->num_rows();
            $counter = 1;
            $res = $query->result();
            $ids = '';
            foreach ($res as $r) {
                if ($counter == $num_rows)
                    $ids.=$r->user_id;
                else
                    $ids.=$r->user_id . ',';
                $counter++;
            }
            $id_arr = explode(",", $ids);
        }
        $this->db->select('*');
        $this->db->from('gallery');
        if ($org <> 0)
            $this->db->where_in('user_id', $id_arr);
        $this->db->where('type !=', '.zip');
        $this->db->order_by('id', 'DESC');
        $query = $this->db->get();
        return $query->result_array();
//        $query = $this->db->get('gallery');
//        return $query->result_array();
//        return $images;
    }

    function set_images($file_details) {
        $user_data = $this->session->userdata('user_data');
        $user_id = $user_data['user_id'];
        $data = array(
            'caption' => $this->input->post('caption'),
            'type' => $file_details['file_ext'],
            'size' => $file_details['file_size'],
            'user_id' => $user_id,
            'image_path' => $file_details['file_name']
        );
//        echo '<br>the data array';
//        var_dump($data);
//        die;
        return $this->db->insert('gallery', $data);
    }

    function get_album_caption($album) {
        $this->db->select('*');
        $this->db->from('gallery');
        $this->db->where('image_path', $album);
        $query = $this->db->get();
        return $query->row();
    }

}

