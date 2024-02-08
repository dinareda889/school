<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Config_company extends CI_Controller {


    function __construct()
    {
        parent::__construct();
        check_not_login();
        $this->load->model('Config_company_m');
        $this->load->library('form_validation');
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

    private  function upload_image($file_name,$folder_name){
        $config['upload_path'] = 'uploads/'.$folder_name;
        $config['allowed_types'] = 'gif|Gif|ico|ICO|jpg|JPG|jpeg|JPEG|BNG|png|PNG|bmp|BMP|WMV|wmv|MP3|mp3|FLV|flv|SWF|swf|webp';
        $config['max_size']    = '1024*8';
        $config['encrypt_name']=true;
        $this->load->library('upload',$config);
        $this->upload->initialize($config);
        if(! $this->upload->do_upload($file_name)){
            return  false;
        }else{
            $datafile = $this->upload->data();
            //$this->thumb($datafile,$folder_name);
//            echo '<br>'. $datafile['file_name'];
            return  $datafile['file_name'];
        }
    }
    private  function upload_file($file_name){
        $config['upload_path'] = 'uploads/main/files';
        $config['allowed_types'] = 'gif|Gif|ico|ICO|jpg|JPG|jpeg|JPEG|BNG|png|PNG|bmp|BMP|WMV|wmv|MP3|mp3|FLV|flv|SWF|swf|pdf|PDF|xls|xlsx|mp4|doc|docx|txt|rar|tar.gz|zip';
        $config['max_size']    = '1000000000';
        $config['overwrite'] = true;
        $this->load->library('upload',$config);
        $this->upload->initialize($config);
        if(! $this->upload->do_upload($file_name)){
            return  false;
        }else {
            $datafile = $this->upload->data();
            return $datafile['file_name'];
        }
    }
  /*  public function index() {
        $site = $this->Config_company_m->listing();
        $this->form_validation->set_rules('nameweb','Website name website','required');
        $this->form_validation->set_rules('email','Email','valid_email');

        if($this->form_validation->run() === FALSE) {

            $data = array(	'title'	=> 'General Configuration',
                'site'	=> $site
                //'isi'	=> 'admin/konfigurasi/list'
            );
            $this->template->load('template','config_company_v/config_company',$data);
        }else{


            $this->load->helper(array('form', 'url'));
            $config['upload_path'] = './uploads/main/';
            $config['allowed_types'] = 'gif|jpg|png|jpeg';
            $config['max_size']     = '20480';
            $config['file_name']     = 'main-'.date('Ymd').substr(md5(rand()),0,10);
            $this->load->library('upload', $config);

            $i = $this->input;
            if($i->post('image') != null){
                $my_image = $i->post('image');
            }

            $data['id_config'] = $i->post('id_config');
            $data['nameweb'] = $i->post('nameweb');
            $data['abbreviation_name'] = $i->post('abbreviation_name');
            $data['slogan'] = $i->post('slogan');
            $data['summary_company'] = $i->post('summary_company');
            $data['summary_company_short'] = $i->post('summary_company_short');
            $data['website'] = $i->post('website');
            $data['email'] = $i->post('email');
            $data['address'] = $i->post('address');
            $data['telepon'] = $i->post('telepon');
            $data['hp'] = $i->post('hp');
            $data['fax'] = $i->post('fax');
            $data['keywords'] = $i->post('keywords');
            $data['metatext'] = $i->post('metatext');
            $data['facebook'] = $i->post('facebook');
            $data['twitter'] = $i->post('twitter');
            $data['youtube'] = $i->post('youtube');
            $data['instagram'] = $i->post('instagram');
            $data['google_map'] = $i->post('google_map');
            $data['id_user'] = $this->session->userdata('id');

            if($i->post('image') != null){
                $data['image']  = $i->post('image');
            }



            $about_image = $this->upload_image("about_image",'main');
            if(!empty($about_image)){ $data['about_image'] = $about_image; }
            $company_pdf= $this->upload_file("company_pdf");
            if(!empty($company_pdf)){ $data['company_pdf'] = $company_pdf; }


            if(@$_FILES['image']['name'] != null){
                if ($this->upload->do_upload('image'))
                {
                    $data['image'] = $this->upload->data('file_name');

                    $this->Config_company_m->edit($data);
                   $this->session->set_flashdata('sukses',translate('Process Done Successfully'));
                    redirect(base_url('Config_company'));
                }
                else
                {
                    $error = $this->upload->display_errors();
                    $this->session->set_flashdata('error',$error);
                    redirect(base_url('Config_company'));
                }


            }else{
                // $data['image'] = null;
                $this->Config_company_m->edit($data);
               $this->session->set_flashdata('sukses',translate('Process Done Successfully'));
                redirect(base_url('Config_company'));
            }


        }
    }*/
    public function test_sql(){
        $sql='CREATE TABLE `smratech_smratech`.`tbl_company_stats` (`id` INT NOT NULL AUTO_INCREMENT , `company_clients` INT NULL DEFAULT NULL , `company_services` INT NULL DEFAULT NULL , `company_projects` INT NULL DEFAULT NULL , `company_projects_done` INT NULL DEFAULT NULL , PRIMARY KEY (`id`)) ENGINE = InnoDB;';
   $query= $this->db->query($sql);
    print_r($query->result_array());
    }

public function index() {
        $site = $this->Config_company_m->listing();
        $this->form_validation->set_rules('nameweb','Website name website','required');
        $this->form_validation->set_rules('email','Email','valid_email');

        if($this->form_validation->run() === FALSE) {

            $data = array(	'title'	=> 'General Configuration',
                'site'	=> $site
                //'isi'	=> 'admin/konfigurasi/list'
            );
            $this->template->load('template','config_company_v/config_company',$data);
        }else{


            /*$this->load->helper(array('form', 'url'));
            $config['upload_path'] = './uploads/main/';
            $config['allowed_types'] = 'gif|jpg|png|jpeg';
            $config['max_size']     = '20480';
            $config['file_name']     = 'main-'.date('Ymd').substr(md5(rand()),0,10);
            $this->load->library('upload', $config);


            if($i->post('image') != null){
                $my_image = $i->post('image');
            }*/
            $i = $this->input;
            $data['id_config'] = $i->post('id_config');
            $data['nameweb'] = $i->post('nameweb');
            $data['nameweb_en'] = $i->post('nameweb_en');
            $data['nameweb_ru'] = $i->post('nameweb_ru');

            $data['abbreviation_name'] = $i->post('abbreviation_name');
            $data['slogan'] = $i->post('slogan');

            $data['website'] = $i->post('website');
            $data['email'] = $i->post('email');
            $data['address'] = $i->post('address');
            $data['address_en'] = $i->post('address_en');
            $data['address_ru'] = $i->post('address_ru');
            $data['telepon'] = $i->post('telepon');
            $data['telepon_code'] = '+971-'.$i->post('telepon');
            $data['hp'] = $i->post('hp');
            $data['hp_code'] = '+971-'.$i->post('hp');
            $data['fax'] = $i->post('fax');
            $data['fax_code'] = '+971-'.$i->post('fax');
            $data['keywords'] = $i->post('keywords');
            $data['metatext'] = $i->post('metatext');
            $data['facebook'] = $i->post('facebook');
            $data['twitter'] = $i->post('twitter');
            $data['youtube'] = $i->post('youtube');
            $data['instagram'] = $i->post('instagram');
            $data['snapchat'] = $i->post('snapchat');
            $data['tiktok'] = $i->post('tiktok');
            $data['google_map'] = $i->post('google_map');
            $data['registration_link'] = $i->post('registration_link');
            $data['id_user'] = $this->session->userdata('id');

           /* if($i->post('image') != null){
                $data['image']  = $i->post('image');
            }*/
            /*	$data = array(	'id_config'	        => $i->post('id_config'),
                                'nameweb'			=> $i->post('nameweb'),
                                'abbreviation_name'	=> $i->post('abbreviation_name'),
                                'slogan'			=> $i->post('slogan'),
                                'summary_company'	=> $i->post('summary_company'),
                                'website'			=> $i->post('website'),
                                'email'				=> $i->post('email'),
                                'address'			=> $i->post('address'),
                                'telepon'			=> $i->post('telepon'),
                                'hp'				=> $i->post('hp'),
                                'fax'				=> $i->post('fax'),
                                'keywords'			=> $i->post('keywords'),
                                'metatext'			=> $i->post('metatext'),
                                'facebook'			=> $i->post('facebook'),
                                'twitter'			=> $i->post('twitter'),
                                'instagram'			=> $i->post('instagram'),
                                'google_map'		=> $i->post('google_map'),
                                'image'             => empty($my_image) ? null : $my_image,
                                'id_user'			=> $this->session->userdata('id'));
                    */
            $image = $this->upload_image("image",'main');
            if(!empty($image)){ $data['image'] = $image; }

            $about_image = $this->upload_image("about_image",'main');
            if(!empty($about_image)){ $data['about_image'] = $about_image; }
            $company_pdf= $this->upload_file("company_pdf");
            if(!empty($company_pdf)){ $data['company_pdf'] = $company_pdf; }

            $link =  $i->post('video');
            $video_id = explode("?v=", $link); // For videos like http://www.youtube.com/watch?v=...
            if (empty($video_id[1]))
                $video_id = explode("/v/", $link); // For videos like http://www.youtube.com/watch/v/..

            $video_id = explode("&", $video_id[1]); // Deleting any other params
            $video_id = $video_id[0];
            $data['video'] = $video_id;

            $this->Config_company_m->edit($data);
           $this->session->set_flashdata('sukses',translate('Process_Done_Successfully'));
            redirect(base_url('Config_company'));
            /*if(@$_FILES['image']['name'] != null){
                if ($this->upload->do_upload('image'))
                {
                    $data['image'] = $this->upload->data('file_name');

                    $this->Config_company_m->edit($data);
                   $this->session->set_flashdata('sukses',translate('Process Done Successfully'));
                    redirect(base_url('Config_company'));
                }
                else
                {
                    $error = $this->upload->display_errors();
                    $this->session->set_flashdata('error',$error);
                    redirect(base_url('Config_company'));
                }


            }else{
                // $data['image'] = null;

            }*/

            /*$this->Config_company_m->edit($data);
            $this->session->set_flashdata('sukses','Company configuration updated successfully');
            redirect(base_url('Config_company'));*/
        }
    }
}