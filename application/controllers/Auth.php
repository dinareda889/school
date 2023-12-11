<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {

	public function login()
	{
       check_already_login();
		$this->load->view('login_v/login');

	}
	public function process()
	{
        $post = $this->input->post(null,TRUE);
		if(isset($post['login'])){
			
			$this->load->model('User_m');
			$query = $this->User_m->login($post);
			if($query->num_rows()>0){
              $row = $query->row();
              $params = array(
				'userid'=>$row->user_id,
				'level'=>$row->level,
                'image'=>$row->image,
                'name'=>$row->name
              );
              $this->session->set_userdata($params);
              $this->session->set_flashdata('success', 'تم تسجيل الدخول بنجاح ');
              redirect('Dashboard','refresh');
			}else{
               $this->session->set_flashdata('danger', 'لا يمكنك الدخول هناك بيان خاطىء');
              redirect('Auth/login','refresh');
			}
		}

	}


	public function logout()
	{
      $params = array('userid','level','image','name');
		 $this->session->unset_userdata($params);
       redirect('Auth/login');
	}



}
