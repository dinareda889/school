<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Banners extends CI_Controller {
    function __construct()
    {
        parent::__construct();
        check_not_login();
        $this->load->model(['Banners_m']);
    }
    
    public function index()
    {
        //$data['all_banners'] = $this->Banners_m->get();
        $data['title']='البنرات';
        $this->template->load('template','banners/banner_data',$data);
    }

    function  get_ajax_banners()
    {
        $list = $this->Banners_m->get_datatables_banners();
        $data = array();
        $no = @$_POST['start'];

        foreach ($list as $item) {
            $no++;
            $row = array();

            if (!empty($item->image) && (file_exists('uploads/banners/' . $item->image))) {
                $image= base_url() . 'uploads/banners/' . $item->image;
            } else {
                $image=  base_url() . 'uploads/defult_image.jpg';
            }

            $row[] = $no . ".";
            $row[] = '<img src="' . $image. '"  height="100px" width="150px" alt="" />';

//            $row[] = $item->description;

            $row[]='
            <div class="btn-block  btn-group-sm">
                                    <a href="#modal_details" data-toggle="modal" title="تفاصيل" 
                        onclick="get_load_details('.$item->banner_id.')" class="btn btn-warning btn-sm"> 
                         <i class="fa fa-eye"></i></a>
           
                  
            <a href="'.base_url().'Banners/edit_banners/'.$item->banner_id.'" title="تعديل"   class="btn btn-info btn-sm">
                                            <i class="fa fa-pencil-alt"> </i></a>
            <a href="#" title="حذف"  onclick=\'swal({
                                            title: "هل انت متأكد من الحذف ؟",
                                            text: "",
                                            type: "warning",
                                            showCancelButton: true,
                                            confirmButtonClass: "btn-danger",
                                            confirmButtonText: "حذف",
                                            cancelButtonText: "إلغاء",
                                            closeOnConfirm: false
                                            },
                                            function(){
                                            swal("تم الحذف!", "", "success");
                                            window.location="'.base_url().'Banners/delete_banners/'.$item->banner_id.'";
                                            });\' class="btn btn-danger btn-sm">
                                            <i class="fa fa-trash"> </i></a>
                                            
                        </div>
            ';
            $data[] = $row;
        }
        $output = array(
            "draw" => @$_POST['draw'],
            "recordsTotal" => $this->Banners_m->count_all_banners(),
            "recordsFiltered" => $this->Banners_m->count_filtered_banners(),
            "data" => $data,
        );
        // output to json format
        echo json_encode($output);
    }

    public function get_load_details()
    {
        $id = $this->input->post('id');
        //$data['all_details'] = $this->Banners_m->get_load_details($id)[0];
        $data['all_details'] = $this->Banners_m->get($id)->row();
        $this->load->view('banners/load_details_page', $data);
    }
    /****************************************************************/


    public function thumb($data,$folder_name)
    {

        $config['image_library'] = 'gd2';
        $config['source_image'] = $data['full_path'];
        $config['new_image'] = 'uploads/'.$folder_name.'/thumbs/' . $data['file_name'];
        $config['create_thumb'] = TRUE;
        $config['maintain_ratio'] = TRUE;
        $config['thumb_marker'] = '';
        $config['width'] = 275;
        $config['height'] = 250;
        $this->load->library('image_lib', $config);
        $this->image_lib->initialize($config);
        $this->image_lib->resize();

    }

    private  function upload_image($file_name,$folder_name){
        $config['upload_path'] = 'uploads/'.$folder_name;
        $config['allowed_types'] = 'gif|Gif|ico|ICO|jpg|JPG|jpeg|JPEG|BNG|png|PNG|bmp|BMP|WMV|wmv|MP3|mp3|FLV|flv|SWF|swf';
        $config['max_size']    = '1024*8';
        $config['encrypt_name']=true;
        $this->load->library('upload',$config);
        $this->upload->initialize($config);
        if(! $this->upload->do_upload($file_name)){
            return  false;
        }else{
            $datafile = $this->upload->data();
            $this->thumb($datafile,$folder_name);
//            echo '<br>'. $datafile['file_name'];
            return  $datafile['file_name'];
        }
    }

    public function add_banners() /* Banners/add_banners*/
    {
        $this->load->helper(array('form','url'));
        $this->load->library(array('form_validation'));
        $this->form_validation->set_rules('description', ' الوصف بالعربي', 'required');
        $this->form_validation->set_rules('description_en', ' الوصف بالانجليزي', 'required');

        if (empty($_FILES['image']['name']))
        {
            $this->form_validation->set_rules('image', 'الصورة ', 'required');
        }
        if ($this->form_validation->run() == FALSE) {
            $banners = new stdClass();
            $banners->banner_id = null;
            $banners->description = null;
            $banners->image = null;

            $data = array(
                'page' => 'add',
                'banners' => $banners,

            );
            $this->template->load('template', 'banners/banner_form', $data);
        } else {


            $post = $this->input->post(null, TRUE);
            if (isset($_POST['add'])) {
                $image = $this->upload_image("image",'banners');
                $this->Banners_m->add_banners($post,$image);
                if ($this->db->affected_rows() > 0) {
                    $this->session->set_flashdata('success', 'تمت العملية بنجاح ');
                }
                redirect('Banners', 'refresh');
            }
        }
    }

    public function edit_banners($id)
    {
        $this->load->helper(array('form', 'url'));
        $this->load->library('form_validation');
        $this->form_validation->set_rules('description', ' الوصف بالعربي', 'required');
        $this->form_validation->set_rules('description_en', ' الوصف بالانجليزي', 'required');


        if ($this->form_validation->run() == FALSE) {
            $query = $this->Banners_m->get($id);
            if ($query->num_rows() > 0) {
                $banners = $query->row();

                $data = array(
                    'page' => 'edit',
                    'banners' => $banners,
                );
                $this->template->load('template', 'banners/banner_edit', $data);
            } else {
                redirect('Banners', 'refresh');
            }
        } else {
            $post = $this->input->post(null, TRUE);
            if (isset($_POST['add'])) {
                $image = $this->upload_image("image",'banners');
                $this->Banners_m->edit_banners($post,$image);
            }
            if ($this->db->affected_rows() > 0) {
                $this->session->set_flashdata('success', 'تمت العملية بنجاح ');
            }else{
                $this->session->set_flashdata('danger', 'حدث خطأ يرجي المحاوله مره أخري ');
            }
            redirect('Banners', 'refresh');
        }
    }
    
    public function delete_banners($banner_id){

        $this->Banners_m->delete_banner($banner_id);
        if($this->db->affected_rows() >0){
            $this->session->set_flashdata('success', 'تم الحذف بنجاح');
        }
        redirect('Banners','refresh');
    }

    /*public function process()
    {
        $this->load->helper(array('form'));
        $this->load->library(array('form_validation'));
        $this->load->helper('file');
        $this->form_validation->set_rules('image', '', 'callback_file_check');
        if ($this->form_validation->run() == FALSE and $_POST['banner_id'] != '')
        {
            $query = $this->Banners_m->get($_POST['banner_id']);
            if($query->num_rows() >0){
                $banners = $query->row();
                $data = array(
                    'page'          => 'edit',
                    'all_banners'=>$banners,
                );
                $this->template->load('template','banners/banner_form',$data);
            }else{
                redirect('Banners','refresh');
            }
        }elseif($this->form_validation->run() == FALSE and $_POST['banner_id'] == ''){
            $banners = new stdClass();
            $banners->banner_id = null;
            $data = array(
                'page'          => 'add',
                'all_banners'=>$banners,
            );
            $this->template->load('template','banners/banner_form',$data);
        }else{
            $config['upload_path'] = './uploads/banners/';
            $config['allowed_types'] = 'gif|jpg|png|jpeg';
            $config['max_size']     = '20480';
            $config['file_name']     = 'banner-'.date('Ymd').substr(md5(rand()),0,10);
            $this->load->library('upload', $config);
            $post = $this->input->post(null,true);
            if(isset($_POST['add'])){
                if(@$_FILES['image']['name'] != null){
                    if ($this->upload->do_upload('image'))
                    {
                        $post['image'] = $this->upload->data('file_name');
                        $this->Banners_m->add($post);
                        if($this->db->affected_rows() >0){
                            $this->session->set_flashdata('success', 'Success adddddddd ');
                        }
                        redirect('Banners');
                    }
                    else
                    {
                        $error = $this->upload->display_errors();
                        $this->session->set_flashdata('error',$error);
                        redirect('Banners');
                    }
                }else{
                    $post['image'] = null;
                    $this->Banners_m->add($post);
                    if($this->db->affected_rows() >0){
                        $this->session->set_flashdata('success', 'Success addede ');
                    }
                    redirect('Banners');
                }
            }elseif (isset($_POST['edit'])){
                if(@$_FILES['image']['name'] != null){
                    if ($this->upload->do_upload('image'))
                    {
                        $item = $this->Banners_m->get($post['banner_id'])->row();
                        if($item->image != null){
                            $target_file = './uploads/banners/'.$item->image ;
                            unlink($target_file);
                        }
                        $post['image'] = $this->upload->data('file_name');
                        $this->Banners_m->edit($post);
                        if($this->db->affected_rows() >0){
                            $this->session->set_flashdata('success', 'Success adddddddd ');
                        }
                        redirect('Banners');
                    }
                    else
                    {
                        $error = $this->upload->display_errors();
                        $this->session->set_flashdata('error',$error);
                        redirect('Banners/add');
                    }
                }else{
                    $post['image'] = null;
                    $this->Banners_m->edit($post);
                    if($this->db->affected_rows() >0){
                        $this->session->set_flashdata('success', 'Success addede ');
                    }
                    redirect('Banners');
                }
            }
            if($this->db->affected_rows() >0){
                $this->session->set_flashdata('success', 'Success deleted ');
            }
            redirect('Banners','refresh');
        }
    }
    public function file_check($str){
        $allowed_mime_type_arr = array('application/pdf','image/gif','image/jpeg','image/pjpeg','image/png','image/x-png');
        $mime = get_mime_by_extension($_FILES['image']['name']);
        if(isset($_FILES['image']['name']) && $_FILES['image']['name']!=""){
            if(in_array($mime, $allowed_mime_type_arr)){
                return true;
            }else{
                $this->form_validation->set_message('file_check', 'Please select only pdf/gif/jpg/png file.');
                return false;
            }
        }else{
            $this->form_validation->set_message('file_check', 'Please choose a file to upload.');
            return false;
        }
    }*/

}