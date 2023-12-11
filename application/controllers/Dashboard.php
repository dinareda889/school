<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

    public function index()
    {


        //	$this->load->view('dashboard');
        check_not_login();

        $data['title']='الصفحة الرئيسية';

        $this->template->load('template','dashboard',$data);

    }


}
