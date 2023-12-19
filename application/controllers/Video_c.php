<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Video_c extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        check_not_login();
        $this->load->model(['Video_m']);
        if ($this->session->userdata('site_lang')) {
            switch ($_SESSION['site_lang']) {
                case 'arabic':
                    $this->config->set_item('language', 'arabic');
                    break;
                case 'english':
                    $this->config->set_item('language', 'english');

                    break;
                case 'russian':
                    $this->config->set_item('language', 'russian');

                    break;
                default:
                    $this->config->set_item('language', 'english');

                    break;
            }
        }

    }
    public function index()
    {
        $data['all_company_stats'] = $this->Video_m->get()->result();
        $data['title'] = translate('Videos');
        $this->template->load('template', 'video_v/video_data', $data);
    }
    public function upload_video($file_name,$folder_name){
        $config['upload_path'] = 'uploads/' . $folder_name;
        $config['allowed_types'] = 'wmv|mp4|avi|mov';
        $config['max_size'] = '100000024*8000000';
        $config['max_filename'] = '25500';
        $config['encrypt_name'] = true;
        $this->load->library('upload', $config);
        $this->upload->initialize($config);
        if (!$this->upload->do_upload($file_name)) {
            $errors = $this->upload->display_errors();
            return false;
        } else {
            $datafile = $this->upload->data();
//            echo '<br>'. $datafile['file_name'];
            return $datafile['file_name'];
        }
    }
    function get_ajax_company_stats()
    {
        $list = $this->Video_m->get_datatables_company_stats();
        $data = array();
        $no = @$_POST['start'];
        foreach ($list as $item) {
            $no++;
            $row = array();
            $row[] = $no . ".";
            $row[] = $item->date_ar;
            $row[] ='
 <a href="#modal_details" data-toggle="modal" title="'.translate('The_Video_Link').'" 
                        onclick="get_load_details('.$item->id.')" class="btn btn-warning btn-sm"> 

                         <i class="fa fa-link" style="color: white;"></i></a>
';
//            $row[] = $item->description;
            $row[] = '
            <div class="btn-block  btn-group-sm">
            <a href="' . base_url() . 'Video_c/edit_video/' . $item->id . '" title="'.translate('Update').'"   class="btn btn-info btn-sm">
                                            <i class="fa fa-pencil-alt" > </i></a>
                         <a href="#" onclick=\'Swal.fire({
                                            title: "'.translate('Are_You_Sure_For_Delete').' ؟",
                                            text: "",
                                            icon: "warning",
                                            showCancelButton: true,
                                            confirmButtonClass: "btn-danger",
                                            confirmButtonText: "'.translate('Delete').'",
                                            cancelButtonText: "'.translate('Cancel').'",
                                            }).then((result) => {
                                             if (result.isConfirmed) {
                                            Swal.fire("'.translate('Deleted').'!", "", "success");
                                            window.location="'.base_url().'Video_c/delete_video/'.$item->id.'";
                                            }});\' class="btn btn-danger btn-sm">
                                            <i class="fa fa-trash"> </i></a>                    
                        </div>
            ';
            $data[] = $row;
        }
        $output = array(
            "draw" => @$_POST['draw'],
            "recordsTotal" => $this->Video_m->count_all_company_stats(),
            "recordsFiltered" => $this->Video_m->count_filtered_company_stats(),
            "data" => $data,
        );
        // output to json format
        echo json_encode($output);
    }
    public function get_load_details()
    {
        $id = $this->input->post('id');
        //$data['all_details'] = $this->Video_m->get_load_details($id)[0];
        $data['all_details'] = $this->Video_m->get($id)->row();
        $this->load->view('video_v/load_details_page', $data);
    }
    /****************************************************************/
    public function thumb($data, $folder_name)
    {
        $config['image_library'] = 'gd2';
        $config['source_image'] = $data['full_path'];
        $config['new_image'] = 'uploads/' . $folder_name . '/thumbs/' . $data['file_name'];
        $config['create_thumb'] = TRUE;
        $config['maintain_ratio'] = TRUE;
        $config['thumb_marker'] = '';
        $config['width'] = 275;
        $config['height'] = 250;
        $this->load->library('image_lib', $config);
        $this->image_lib->initialize($config);
        $this->image_lib->resize();
    }
    private function upload_image($file_name, $folder_name)
    {
        $config['upload_path'] = 'uploads/' . $folder_name;
        $config['allowed_types'] = 'gif|Gif|ico|ICO|jpg|JPG|jpeg|JPEG|BNG|png|PNG|bmp|BMP|WMV|wmv|MP3|mp3|FLV|flv|SWF|swf';
        $config['max_size'] = '1024*8';
        $config['encrypt_name'] = true;
        $this->load->library('upload', $config);
        $this->upload->initialize($config);
        if (!$this->upload->do_upload($file_name)) {
            return false;
        } else {
            $datafile = $this->upload->data();
            $this->thumb($datafile, $folder_name);
//            echo '<br>'. $datafile['file_name'];
            return $datafile['file_name'];
        }
    }
    public function add_video() /* Video/add_company_stats*/
    {
        $this->load->helper(array('form', 'url'));
        $this->load->library(array('form_validation'));

        $this->form_validation->set_rules('date',translate('The_Date'), 'required');
        $this->form_validation->set_rules('link', translate('Video_Link'), 'required|callback_check_youtube');
        if ($this->form_validation->run() == FALSE) {
            $company_stats = new stdClass();
            $company_stats->id = null;
            $company_stats->date = null;
            $company_stats->video_link = null;

            $data = array(
                'page' => 'add',
                'company_stats' => $company_stats,
            );
            $this->template->load('template', 'video_v/video_form', $data);
        } else {
            $post = $this->input->post(null, TRUE);
            if (isset($_POST['add'])) {
                $this->Video_m->add_company_stats($post,$video_link=null);
                if ($this->db->affected_rows() > 0) {
                    $this->session->set_flashdata('sukses',translate('Process_Done_Successfully'));
                }
                redirect('Video_c', 'refresh');
            }
        }
    }
    public function edit_video($id)
    {
        $this->load->helper(array('form', 'url'));
        $this->load->library('form_validation');
        $this->form_validation->set_rules('date',translate('The_Date'), 'required');
        $this->form_validation->set_rules('link', translate('Video_Link'), 'required|callback_check_youtube');
        if ($this->form_validation->run() == FALSE) {
            $query = $this->Video_m->get($id);
            if ($query->num_rows() > 0) {
                $company_stats = $query->row();
                $data = array(
                    'page' => 'edit',
                    'company_stats' => $company_stats,
                );
                $this->template->load('template', 'video_v/video_edit', $data);
            } else {
                redirect('Video_c', 'refresh');
            }
        } else {
            $post = $this->input->post(null, TRUE);
            if (isset($_POST['add'])) {
                $video_link = null;
                $this->Video_m->edit_company_stats($post,$video_link);
            }
            if ($this->db->affected_rows() > 0) {
                $this->session->set_flashdata('sukses',translate('Process_Done_Successfully'));
            } else {
                $this->session->set_flashdata('danger', translate('error_try_again'));
            }
            redirect('Video_c', 'refresh');
        }
    }
    public function delete_video($id)
    {
        $this->Video_m->delete_company_stats($id);
        if ($this->db->affected_rows() > 0) {
            $this->session->set_flashdata('success', translate('Delete_Done_Successfully'));
        }
        redirect('Video_c', 'refresh');
    }

    public function check_youtube($url){
        $parts = parse_url($url);
        $this->form_validation->set_message('check_youtube', translate('Should_be_youtube_link'));
        if (!empty($parts['host']) && $parts['host'] == 'www.youtube.com') {
            // your code
            return true;
        }else{
            return false;
        }
    }
}