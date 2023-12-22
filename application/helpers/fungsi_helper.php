<?php

function check_already_login()
{
    $ci = &get_instance();
    $user_session = $ci->session->userdata('userid');
    if ($user_session) {
        redirect('dashboard');
    }
}

function check_not_login()
{
    $ci = &get_instance();
    $user_session = $ci->session->userdata('userid');
    if (!$user_session) {
        redirect('auth/login');
    }
}

function check_admin()
{
    $ci = &get_instance();
    $ci->load->library('fungsi');
    if ($ci->fungsi->user_login()->level != 1) {
        redirect('dashboard');
    }
}

function indo_curreny($nominal)
{
    $result = " LE " . number_format($nominal, 2, ',', ',' . '');
    return $result;
}

function format_date($date)
{
    $d = substr($date, 8, 2);
    $m = substr($date, 5, 2);
    $y = substr($date, 0, 4);
    return $d . '-' . $m . '-' . $y;
}

function translate($word = '')
{
    $CI = &get_instance();
    if ($CI->session->has_userdata('set_lang')) {
        $set_lang = $CI->session->userdata('set_lang');
    } else {
        $set_lang = 'english';
    }
    if ($set_lang == '') {
        $set_lang = 'english';
    }
    $query = $CI->db->get_where('languages', array('word' => $word));
    if ($query->num_rows() > 0) {
        if (isset($query->row()->$set_lang) && $query->row()->$set_lang != '') {
            return $query->row()->$set_lang;
        } else {
            return $query->row()->english;
        }
    } else {
        $arrayData = array(
            'word' => $word,
            'type_word' => 'dash',
            'english' => ucwords(str_replace('_', ' ', $word)),
        );
        $CI->db->insert('languages', $arrayData);
        return ucwords(str_replace('_', ' ', $word));
    }
}
function translate_web($word = '')
{
    $CI = &get_instance();
    if ($CI->session->has_userdata('set_lang')) {
        $set_lang = $CI->session->userdata('set_lang');
    } else {
        $set_lang = 'english';
    }
    if ($set_lang == '') {
        $set_lang = 'english';
    }
    $query = $CI->db->get_where('languages', array('word' => $word));
    if ($query->num_rows() > 0) {
        if (isset($query->row()->$set_lang) && $query->row()->$set_lang != '') {
            return $query->row()->$set_lang;
        } else {
            return $query->row()->english;
        }
    } else {
        $arrayData = array(
            'word' => $word,
            'type_word' => 'web',
            'english' => ucwords(str_replace('_', ' ', $word)),
        );
        $CI->db->insert('languages', $arrayData);
        return ucwords(str_replace('_', ' ', $word));
    }
}



function thumb($data, $filepath = false)
{
    $CI =& get_instance();
    $config = array();
    $config['image_library'] = 'gd2';
    $config['source_image'] = $data['full_path'];
    $file_path_check = 'uploads/' . $filepath . '/thumbs';
    // Checking whether file exists or not
    if (!file_exists($file_path_check)) {

        // Create a new file or direcotry
        mkdir($file_path_check, 0777, true);
    }

    if ($filepath == false) {
        $config['new_image'] = 'uploads/thumbs/' . $data['file_name'];
    } else {
        $config['new_image'] = 'uploads/' . $filepath . '/thumbs/' . $data['file_name'];
    }
    $config['create_thumb'] = TRUE;
    $config['maintain_ratio'] = TRUE;
    $config['thumb_marker'] = '';
    $config['width'] = 350;
    $config['height'] = 200;
    $CI->load->library('image_lib', $config);
    $CI->image_lib->initialize($config);
    $CI->image_lib->resize();
}

function upload_muli_image($input_name, $folder)
{
    $filesCount = count($_FILES[$input_name]['name']);
    for ($i = 0; $i < $filesCount; $i++) {
        $_FILES['userFile']['name'] = $_FILES[$input_name]['name'][$i];
        $_FILES['userFile']['type'] = $_FILES[$input_name]['type'][$i];
        $_FILES['userFile']['tmp_name'] = $_FILES[$input_name]['tmp_name'][$i];
        $_FILES['userFile']['error'] = $_FILES[$input_name]['error'][$i];
        $_FILES['userFile']['size'] = $_FILES[$input_name]['size'][$i];
        $all_img[] = upload_image("userFile", $folder);
    }
    return $all_img;
}

function upload_image($file_name, $filepath = false)
{
    $CI =& get_instance();
    $file_path_check = 'uploads/' . $filepath;
    // Checking whether file exists or not
    if (!file_exists($file_path_check)) {
        // Create a new file or direcotry
        mkdir($file_path_check, 0777, true);
    }


    if ($filepath == false) {
        $config['upload_path'] = 'uploads/images';
    } else {
        $config['upload_path'] = 'uploads/' . $filepath;
    }
    $config['allowed_types'] = 'gif|Gif|ico|ICO|jpg|JPG|jpeg|JPEG|BNG|png|PNG|bmp|BMP|WMV|wmv|MP3|mp3|FLV|flv|SWF|swf|pdf|PDF';
    $config['encrypt_name'] = true;
    $config['overwrite'] = true;
    $CI->load->library('upload', $config);
    $CI->upload->initialize($config);
    if (!$CI->upload->do_upload($file_name)) {
//        log_message('error', 'Image Upload Error: ' . $CI->upload->display_errors());
//        echo $CI->upload->display_errors();
        return false;
    } else {
        $datafile = $CI->upload->data();
        thumb($datafile, $filepath);
        return $datafile['file_name'];
    }
}
function get_by($table, $where_arr = false, $select = false)
{
    $CI =& get_instance();
    if (!empty($where_arr)) {
        $CI->db->where($where_arr);
    }
    $query = $CI->db->get($table);
    if ($query->num_rows() > 0) {
        if (!empty($select) && $select != 1) {
            return $query->row()->$select;
        } else {
            if ($select == 1) {
                return $query->row();
            } else {
                return $query->result();
            }
        }
    } else {
        return false;
    }
}

function access_denied()
{
    redirect(site_url('Web'));
}
?>