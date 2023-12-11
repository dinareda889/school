<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        check_not_login();
        check_admin();
        $this->load->model('User_m');
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

    public function index()
    {

        $data['all_users'] = $this->User_m->get();
        $this->template->load('template', 'user/user_data', $data);

    }


    public function adduser()
    {
        $this->load->helper(array('form', 'url'));
        $this->load->library('form_validation');
        $this->form_validation->set_rules('fullname', translate('Name'), 'required');
        $this->form_validation->set_rules('username', translate('Username'), 'required|min_length[5]|is_unique[users.username]');
        $this->form_validation->set_rules('password', translate('Password'), 'required|min_length[5]');
        $this->form_validation->set_rules('passconf', translate('Password_Confirmation'), 'required|matches[password]',
            array('matches' => 'You must provide a %s.')
        );
        $this->form_validation->set_rules('email', translate('Email'), 'trim|required|valid_email');

        if ($this->form_validation->run() == FALSE) {


            $this->template->load('template', 'user/user_form_add_new');
        } else {

            $config['upload_path'] = './uploads/user/';
            $config['allowed_types'] = 'gif|jpg|png|jpeg';
            $config['max_size'] = '204800';
            $config['file_name'] = 'user-' . date('Ymd') . substr(md5(rand()), 0, 10);
            $this->load->library('upload', $config);


            $post = $this->input->post(null, TRUE);

            if (isset($_POST['add'])) {

                if (@$_FILES['image']['name'] != null) {
                    if ($this->upload->do_upload('image')) {
                        $post['image'] = $this->upload->data('file_name');
                        $this->User_m->add($post);
                        if ($this->db->affected_rows() > 0) {
                            $this->session->set_flashdata('success', translate('Process_Done_Successfully'));
                        }
                        redirect('User');
                    } else {
                        $error = $this->upload->display_errors();
                        $this->session->set_flashdata('error', $error);
                        redirect('User');
                    }


                } else {
                    $post['image'] = null;
                    $this->User_m->add($post);
                }
                if ($this->db->affected_rows() > 0) {
                    $this->session->set_flashdata('success', translate('Process_Done_Successfully'));
                }
                redirect('User', 'refresh');

            }

        }


    }

    public function edituserApp($id)
    {

        $this->load->helper(array('form', 'url'));
        // $this->form_validation->set_rules('fullname', 'Name', 'required');
        $this->form_validation->set_rules('username', 'Username', 'required|min_length[5]|callback_username_check_app');
        //  $this->form_validation->set_rules('email', 'Email', 'required|callback_email_check_app');
        $this->form_validation->set_rules('email', 'email', 'required|valid_email|trim|callback_email_check_app',
            array(
                'required' => 'required ',
                'valid_email' => 'This is not an email  ',
                'trim' => 'Cannot contain spaces',

            ));

        $this->form_validation->set_rules('phone', 'User phone', 'required|numeric|min_length[11]|max_length[11]|trim|callback_phone_check_app',
            array(
                'required' => 'required',
                'min_length' => 'The phone number must be 11 numbers',
                'max_length' => 'The phone number must be 11 numbers',
                'numeric' => 'The phone number is only numbers',
                'trim' => 'Cannot contain spaces',

            ));

        if ($this->input->post('password')) {

            $this->form_validation->set_rules('password', 'Password', 'min_length[5]');
            $this->form_validation->set_rules('passconf', 'Password Confirmation', 'matches[password]',
                array('matches' => 'You must provide a %s.')
            );
        }
        if ($this->input->post('passconf')) {

            $this->form_validation->set_rules('passconf', 'Password Confirmation', 'matches[password]',
                array('matches' => 'You must provide a %s.')
            );
        }
        // $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');

        //  $this->form_validation->set_rules('level', 'level', 'required');


        $this->form_validation->set_message('required', '%s Error Message');
        $this->form_validation->set_message('min_length', '{filed} minmum 5 charcters ');
        $this->form_validation->set_message('is_unique', '{filed} must be unique ');

        $this->form_validation->set_error_delimiters('<span class="help-block">', '</span>');
        if ($this->form_validation->run() == FALSE) {
            $query = $this->User_m->get_app($id);
            if ($query->num_rows() > 0) {
                $data['all_users'] = $query->row();
                $this->template->load('template', 'user/app_user_form_edit', $data);
            } else {

                redirect('User', 'refresh');
            }

        } else {

            $config['upload_path'] = './uploads/user/';
            $config['allowed_types'] = 'gif|jpg|png|jpeg';
            $config['max_size'] = '20480';
            $config['file_name'] = 'user-' . date('Ymd') . substr(md5(rand()), 0, 10);
            $this->load->library('upload', $config);

            $post = $this->input->post(null, TRUE);


            if (@$_FILES['image']['name'] != null) {
                if ($this->upload->do_upload('image')) {
                    $item = $this->User_m->get_app($post['user_id'])->row();
                    if ($item->m_image != null) {
                        $target_file = './uploads/user/' . $item->m_image;
                        unlink($target_file);
                    }
                    $post['image'] = $this->upload->data('file_name');
                    $this->User_m->edit_app($post);
                    if ($this->db->affected_rows() > 0) {
                        $this->session->set_flashdata('success', translate('Process_Done_Successfully'));

                    }
                    redirect('User/app_users_active');
                } else {
                    $error = $this->upload->display_errors();
                    $this->session->set_flashdata('error', $error);
                    //  redirect('User/edit/'.$id);
                }
            } else {
                $post['image'] = null;
                // if(isset($_POST['edit'])){
                $this->User_m->edit_app($post);
                //}
                if ($this->db->affected_rows() > 0) {
                    $this->session->set_flashdata('success', 'تمت العملية بنجاح');
                }
                redirect('User/app_users_active');
            }


        }


    }


    public function phone_check_app()
    {
        $post = $this->input->post(null, TRUE);
        $query = $this->db->query("SELECT * FROM api_users WHERE user_phone = '$post[phone]' AND user_id != '$post[user_id]'");
        if ($query->num_rows() > 0) {

            $this->form_validation->set_message('phone_check_app', 'this Phone was existed ');
            return FALSE;
        } else {
            return TRUE;
        }

    }

    public function email_check_app()
    {
        $post = $this->input->post(null, TRUE);
        $query = $this->db->query("SELECT * FROM api_users WHERE user_email = '$post[email]' AND user_id != '$post[user_id]'");
        if ($query->num_rows() > 0) {

            $this->form_validation->set_message('email_check_app', 'this Email was existed ');
            return FALSE;
        } else {
            return TRUE;
        }

    }

    public function username_check_app()
    {
        $post = $this->input->post(null, TRUE);
        $query = $this->db->query("SELECT * FROM api_users WHERE user_name = '$post[username]' AND user_id != '$post[user_id]'");
        if ($query->num_rows() > 0) {

            $this->form_validation->set_message('username_check_app', 'this name was existed ');
            return FALSE;
        } else {
            return TRUE;
        }

    }

    function randomDigits($length)
    {
        $numbers = range(0, 9);
        shuffle($numbers);
        for ($i = 0; $i < $length; $i++) {
            global $digits;
            $digits .= $numbers[$i];
        }
        return ($digits);
    }

    public function adduserApp()
    {
        $this->load->helper(array('form', 'url'));
        $this->load->library('form_validation');
        // $this->form_validation->set_rules('user_phone', 'Phone', 'required');
        $this->form_validation->set_rules('username', 'Username', 'required|min_length[5]|is_unique[users.username]');
        $this->form_validation->set_rules('password', 'Password', 'required|min_length[5]');
        $this->form_validation->set_rules('passconf', 'Password Confirmation', 'required|matches[password]',
            array('matches' => 'You must provide a %s.')
        );
        $this->form_validation->set_rules('email', 'email', 'required|valid_email|trim',
            array(
                'required' => 'required ',
                'valid_email' => 'This is not an email  ',
                'trim' => 'Cannot contain spaces',

            ));
        $this->form_validation->set_rules('user_phone', 'user_phone', 'required|numeric|min_length[11]|max_length[11]|trim',
            array(
                'required' => 'required',
                'min_length' => 'The phone number must be 11 numbers',
                'max_length' => 'The phone number must be 11 numbers',
                'numeric' => 'The phone number is only numbers',
                'trim' => 'Cannot contain spaces',

            ));

        if ($this->form_validation->run() == FALSE) {


            $this->template->load('template', 'user/app_user_form_add_new');
        } else {
            $post = $this->input->post(null, TRUE);
            if (!$this->add_is_unique($post['email'], $post['user_phone'])) {
                $data['message'] = 'This User already exists';
                $data['success'] = 0;
                $this->session->set_flashdata('response', 'This User already exists ');
                $this->template->load('template', 'user/app_user_form_add_new', $data);
            } else {


                $config['upload_path'] = './uploads/user/';
                $config['allowed_types'] = 'gif|jpg|png|jpeg';
                $config['max_size'] = '204800';
                $config['file_name'] = 'user-' . date('Ymd') . substr(md5(rand()), 0, 10);
                $this->load->library('upload', $config);


                $post = $this->input->post(null, TRUE);


                if (isset($_POST['add'])) {

                    if (@$_FILES['image']['name'] != null) {
                        if ($this->upload->do_upload('image')) {
                            $post['image'] = $this->upload->data('file_name');
                            $randomDigits = $this->randomDigits(8);;
                            $this->User_m->add_app($post);
                            $this->send_mail_reg($post['email'], $post['password']);
                            if ($this->db->affected_rows() > 0) {
                                $this->session->set_flashdata('success', translate('Process_Done_Successfully'));

                            }
                            redirect('User/adduserApp');
                        } else {
                            $error = $this->upload->display_errors();
                            $this->session->set_flashdata('error', $error);
                            redirect('User/adduserApp');
                        }


                    } else {
                        $randomDigits = $this->randomDigits(8);;
                        $post['image'] = null;
                        $this->User_m->add_app($post);
                        $this->send_mail_reg($post['email'], $post['password']);

                    }
                    if ($this->db->affected_rows() > 0) {
                        $this->session->set_flashdata('success', 'تمت العملية بنجاح');
                    }
                    redirect('User/adduserApp', 'refresh');

                }

            }
        }


    }

    public function send_mail_reg($to, $password)
    {

        $subject = "Kabboot App";
        $from = 'app@kabboot.com';
//$emailContect = "Your Password Is : $randomDigits";
        $emailContect = "Your Password Is : $password ";
        $config['protocol'] = 'mail';
        $config['smtp_host'] = 'ssl://smtp.gmail.com';
        $config['smtp_port'] = '465';
        $config['smtp_timeout'] = '7';
        $config['smtp_user'] = 'app@kabboot.com';    // Important
        $config['smtp_pass'] = '!@#app123456789';  //Important
        $config['charset'] = 'utf-8';
        $config['newline'] = "\r\n";
        $config['mailtype'] = 'text'; // or html
        $config['validation'] = TRUE; // bool whether to validate email or not
        $this->email->initialize($config);
        $this->email->set_newline("\r\n");
        $this->email->from($from, 'Kabboot App');
        $this->email->to($to);
        $this->email->subject($subject);
        $this->email->message($emailContect);
        $this->email->send();
    }

    private function add_is_unique($m_email, $m_tel)
    {
        $m = $this->db
            ->group_start()
            ->or_where('user_email', $m_email)
            ->or_where('user_phone', $this->ArToEn(substr($m_tel, 1)))
            ->or_where('user_phone', $this->EnToAr(substr($m_tel, 1)))
            ->or_where('user_phone', $this->ArToEn($m_tel))
            ->or_where('user_phone', $this->EnToAr($m_tel))
            ->group_end()
            ->get('api_users')->num_rows();
        $m2 = $this->db
            ->group_start()
            ->or_where('user_email', $m_email)
            ->or_where('user_phone', $this->ArToEn(substr($m_tel, 1)))
            ->or_where('user_phone', $this->EnToAr(substr($m_tel, 1)))
            ->or_where('user_phone', $this->ArToEn($m_tel))
            ->or_where('user_phone', $this->EnToAr($m_tel))
            ->group_end()
            ->get('api_users')->num_rows();
        if ($m == 0 && $m2 == 0) {
            return true;
        }
    }

    private function EnToAr($string)
    {
        return strtr($string, array('0' => '٠', '1' => '١', '2' => '٢', '3' => '٣', '4' => '٤', '5' => '٥', '6' => '٦', '7' => '٧', '8' => '٨', '9' => '٩'));
    }

    private function ArToEn($string)
    {
        return strtr($string, array('۰' => '0', '۱' => '1', '۲' => '2', '۳' => '3', '۴' => '4', '۵' => '5', '۶' => '6', '۷' => '7', '۸' => '8', '۹' => '9', '٠' => '0', '١' => '1', '٢' => '2', '٣' => '3', '٤' => '4', '٥' => '5', '٦' => '6', '٧' => '7', '٨' => '8', '٩' => '9'));
    }


    public function add()
    {
        $this->load->helper(array('form', 'url'));

        $this->form_validation->set_rules('fullname', 'Name', 'required');
        $this->form_validation->set_rules('username', 'Username', 'required|min_length[5]|is_unique[users.username]');
        $this->form_validation->set_rules('password', 'Password', 'required|min_length[5]');
        $this->form_validation->set_rules('passconf', 'Password Confirmation', 'required|matches[password]',
            array('matches' => 'You must provide a %s.')
        );


        // $this->form_validation->set_rules('address', 'Address', 'required');
        //  $this->form_validation->set_rules('level', 'Role In System', 'required');


        $this->form_validation->set_message('reguired', '%s Error Message');
        $this->form_validation->set_message('min_length', '{filed} minmum 5 charcters ');
        $this->form_validation->set_message('is_unique', '{filed} must be unique ');

        $this->form_validation->set_error_delimiters('<span class="help-block">', '</span>');
        if ($this->form_validation->run() == FALSE) {

            $this->template->load('template', 'user/user_form_add');
        } else {

            $config['upload_path'] = './uploads/user/';
            $config['allowed_types'] = 'gif|jpg|png|jpeg';
            $config['max_size'] = '204800';
            $config['file_name'] = 'user-' . date('Ymd') . substr(md5(rand()), 0, 10);
            $this->load->library('upload', $config);


            $post = $this->input->post(null, TRUE);

            if (isset($_POST['add'])) {

                if (@$_FILES['image']['name'] != null) {
                    if ($this->upload->do_upload('image')) {
                        $post['image'] = $this->upload->data('file_name');
                        $this->User_m->add($post);
                        if ($this->db->affected_rows() > 0) {
                            $this->session->set_flashdata('success', translate('Process_Done_Successfully'));

                        }
                        redirect('User');
                    } else {
                        $error = $this->upload->display_errors();
                        $this->session->set_flashdata('error', $error);
                        redirect('User');
                    }


                } else {
                    $post['image'] = null;
                    $this->User_m->add($post);
                }
                if ($this->db->affected_rows() > 0) {
                    $this->session->set_flashdata('success', translate('Process_Done_Successfully'));

                }
                redirect('User', 'refresh');

            }
            /*echo'<pre>';
            print_r($_POST);

            //die;
                                   if(isset($_POST['add'])){

                                       if(@$_FILES['image']['name'] != null){
                                if ($this->upload->do_upload('image'))
                                {
                                    $post['image'] = $this->upload->data('file_name');
                                  $this->User_m->add($post);
                                    if($this->db->affected_rows() >0){
                                        $this->session->set_flashdata('success', 'Success added ');
                                    }
                                    redirect('User');
                                }
                                else
                                {
                                    $error = $this->upload->display_errors();
                                    $this->session->set_flashdata('error',$error);
                                    redirect('User');
                                }


                            }else{
                                $post['image'] = null;
                                      $this->User_m->add($post);
                            }
                            if($this->db->affected_rows() >0){
                                $this->session->set_flashdata('success', 'Success added ');
                            }
                    redirect('User','refresh');

                            }
            */


            $this->User_m->add($post);
            if ($this->db->affected_rows() > 0) {
                $this->session->set_flashdata('success', translate('Process_Done_Successfully'));

            }
            //    redirect('User','refresh');

        }


    }


    public function edit($id)
    {

        $this->load->helper(array('form', 'url'));
        $this->form_validation->set_rules('fullname', translate('Name'), 'required');
        $this->form_validation->set_rules('username', translate('Username'), 'required|min_length[5]|callback_username_check');
        if ($this->input->post('password')) {

            $this->form_validation->set_rules('password', translate('Password'), 'min_length[5]');
            $this->form_validation->set_rules('passconf', translate('Password_Confirmation'), 'matches[password]',
                array('matches' => 'You must provide a %s.')
            );
        }
        if ($this->input->post('passconf')) {

            $this->form_validation->set_rules('passconf', translate('Password_Confirmation'), 'matches[password]',
                array('matches' => 'You must provide a %s.')
            );
        }
        $this->form_validation->set_rules('email', translate('Email'), 'trim|required|valid_email');

        //  $this->form_validation->set_rules('level', 'level', 'required');


        $this->form_validation->set_message('required', '%s Error Message');
        $this->form_validation->set_message('min_length', '{filed} minmum 5 charcters ');
        $this->form_validation->set_message('is_unique', '{filed} must be unique ');

        $this->form_validation->set_error_delimiters('<span class="help-block">', '</span>');
        if ($this->form_validation->run() == FALSE) {
            $query = $this->User_m->get($id);
            if ($query->num_rows() > 0) {
                $data['all_users'] = $query->row();
                $this->template->load('template', 'user/user_form_edit', $data);
            } else {

                redirect('User', 'refresh');
            }

        } else {

            $config['upload_path'] = './uploads/user/';
            $config['allowed_types'] = 'gif|jpg|png|jpeg';
            $config['max_size'] = '20480';
            $config['file_name'] = 'user-' . date('Ymd') . substr(md5(rand()), 0, 10);
            $this->load->library('upload', $config);

            $post = $this->input->post(null, TRUE);

            if (@$_FILES['image']['name'] != null) {
                if ($this->upload->do_upload('image')) {
                    $item = $this->User_m->get($post['user_id'])->row();
                    if ($item->image != null) {
                        $target_file = './uploads/user/' . $item->image;
                        unlink($target_file);
                    }
                    $post['image'] = $this->upload->data('file_name');
                    $this->User_m->edit($post);
                    if ($this->db->affected_rows() > 0) {
                        $this->session->set_flashdata('success', translate('Process_Done_Successfully'));

                    }
                    redirect('User');
                } else {
                    $error = $this->upload->display_errors();
                    $this->session->set_flashdata('error', $error);
                    redirect('User/edit/' . $id);
                }
            } else {
                $post['image'] = null;
                // if(isset($_POST['edit'])){
                $this->User_m->edit($post);
                //}
                if ($this->db->affected_rows() > 0) {
                    $this->session->set_flashdata('success', translate('Process_Done_Successfully'));

                }
                redirect('User', 'refresh');
            }
            /* $post= $this->input->post(null,TRUE);
             $this->User_m->edit($post);
             if($this->db->affected_rows() >0){
                 $this->session->set_flashdata('success', 'Success added ');
             }
             redirect('User','refresh');*/

        }


    }

    public function username_check()
    {
        $post = $this->input->post(null, TRUE);
        $query = $this->db->query("SELECT * FROM users WHERE username = '$post[username]' AND user_id != '$post[user_id]'");
        if ($query->num_rows() > 0) {

            $this->form_validation->set_message('username_check', 'this name was existed ');
            return FALSE;
        } else {
            return TRUE;
        }

    }

    public function del($user_id)
    {


        $item = $this->User_m->get($user_id)->row();
        if ($item->image != null) {
            $target_file = './uploads/user/' . $item->image;
            unlink($target_file);

        }

        $user_id = $this->input->post('user_id');
        $this->User_m->delete_user($user_id);
        if ($this->db->affected_rows() > 0) {
            $this->session->set_flashdata('success', translate('Process_Done_Successfully'));
        }
        redirect('User', 'refresh');
    }

    public function app_users_active()
    {

        $this->template->load('template', 'user/web_users_active');
    }

    public function app_users()
    {

        $this->template->load('template', 'user/web_users');
    }

    function get_ajax_not()
    {
        $list = $this->User_m->get_datatables_orders(0);
        $data = array();
        $nos = @$_POST['start'];
        foreach ($list as $item) {
            $nos++;

            $row = array();


            $row[] = $nos . ".";
            $row[] = $item->user_name;
            $row[] = $item->user_phone;
            $row[] = $item->user_email;
            $row[] = $item->user_city;
            $row[] = '<div class="btn-group btn-group-sm">

                   <a title="Active User" href="' . site_url('User/make_active/' . $item->user_id) . '" onclick="return confirm(\'Are You Sure To Active User ? \')" 

                    class="btn btn-success btn-sm"><i class="far fa-check-circle nav-icon"></i> </a> 
 <a title="Edit User" href="' . site_url('User/edituserApp/' . $item->user_id) . '" class="btn btn-info"><i class="fa fa-pencil-alt"></i></a>
 
                      <a  title="Delete User" href="' . site_url('User/delete_app_user/' . $item->user_id) . '" onclick="return confirm(\'Are You Sure To Delete? \')" 
                    class="btn btn-danger btn-sm"><i class="fa fa-trash"></i> </a>
                      </div>
                      </div>

';
            $row[] = '
                  
               
                   ';
            $data[] = $row;

        }
        $output = array(
            "draw" => @$_POST['draw'],
            "recordsTotal" => $this->User_m->count_all_orders(0),
            "recordsFiltered" => $this->User_m->count_filtered_orders(0),
            "data" => $data,
        );
        // output to json format
        echo json_encode($output);

    }

    function get_ajax_yes()
    {
        $list = $this->User_m->get_datatables_orders(1);
        $data = array();
        $nos = @$_POST['start'];
        foreach ($list as $item) {
            $nos++;

            $row = array();


            $row[] = $nos . ".";
            $row[] = $item->user_name;
            $row[] = $item->user_phone;
            $row[] = $item->user_email;
            $row[] = $item->user_city;
            $row[] = '<div class="btn-group btn-group-sm">

                   <a title="Disactive User" href="' . site_url('User/make_dis_active/' . $item->user_id) . '" onclick="return confirm(\'Are You Sure To Un active User ? \')" 

                    class="btn btn-warning btn-sm"><i class="fas fa-ban nav-icon"></i> </a> 
 <a title="Edit User" href="' . site_url('User/edituserApp/' . $item->user_id) . '" class="btn btn-info"><i class="fa fa-pencil-alt"></i></a>
 
                     <a title="Delete User" href="' . site_url('User/delete_app_user/' . $item->user_id) . '" onclick="return confirm(\'Are You Sure To Delete? \')" 
                    class="btn btn-danger btn-sm"><i class="fa fa-trash"></i> </a>
                     <a title="Delete User" href="#" data-toggle="modal" data-target="#myModal" onclick="get_phone(' . $item->user_phone . ');" 
                    class="btn btn-success btn-sm"><i class="fas fa-sms"></i> </a>
                   
                      </div>

';

            $data[] = $row;

        }
        $output = array(
            "draw" => @$_POST['draw'],
            "recordsTotal" => $this->User_m->count_all_orders(1),
            "recordsFiltered" => $this->User_m->count_filtered_orders(1),
            "data" => $data,
        );
        // output to json format
        echo json_encode($output);

    }

    public function make_active($user_id)
    {

        $this->User_m->make_active($user_id);

        if ($this->db->affected_rows() > 0) {

            $this->session->set_flashdata('success', translate('Process_Done_Successfully'));

        }

        redirect('User/app_users_active', 'refresh');

    }

    public function make_dis_active($user_id)
    {

        $this->User_m->make_dis_active($user_id);

        if ($this->db->affected_rows() > 0) {

            $this->session->set_flashdata('success', translate('Process_Done_Successfully'));

        }

        redirect('User/app_users', 'refresh');

    }

    public function delete_app_user($user_id)
    {
        $this->User_m->delete_app_user($user_id);
        if ($this->db->affected_rows() > 0) {
            $this->session->set_flashdata('success', translate('Process_Done_Successfully'));

        }
        redirect('User/app_users_active', 'refresh');
    }

    /********************************************/

    public function check_user_data()
    {
        if ($this->input->post('user_phone')) {
            $data = $this->User_m->check_data(array('user_phone' => $this->input->post('user_phone')));
            if (isset($data) && !empty($data) && ($data > 0)) {
                $response = array('valid' => false, 'message' => translate('The_mobile_number_is_already_registered'));
                echo json_encode($response);
                return;
            } else {
                $response = array('valid' => true);
                echo json_encode($response);
                return;
            }
        }
        if ($this->input->post('username')) {
            $data = $this->User_m->check_data(array('user_name' => $this->input->post('username')));
            if (isset($data) && !empty($data) && ($data > 0)) {
                $response = array('valid' => false, 'message' => translate('Customer_name_already_registered'));
                echo json_encode($response);
                return;
            } else {
                $response = array('valid' => true);
                echo json_encode($response);
                return;
            }
        }
    }

    function add_user()
    {
        $post = $this->input->post(null, TRUE);
        $user_id = $this->User_m->add_user($post);
        if ($this->db->affected_rows() > 0) {
            $data['list'] = $this->User_m->get_datatables_orders(1);
            $data['insert_id'] = $user_id;
            echo json_encode($data);
        }
    }

    function http_response($url, $status = null, $wait = 3)
    {
        $time = microtime(true);
        $expire = $time + $wait;

        // we fork the process so we don't have to wait for a timeout
        $pid = pcntl_fork();
        if ($pid == -1) {
            die('could not fork');
        } else if ($pid) {
            // we are the parent
            $ch = curl_init();
            curl_setopt($ch, CURLOPT_URL, $url);
            curl_setopt($ch, CURLOPT_HEADER, TRUE);
            curl_setopt($ch, CURLOPT_NOBODY, TRUE); // remove body
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
            $head = curl_exec($ch);
            $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
            curl_close($ch);

            if (!$head) {
                return FALSE;
            }

            if ($status === null) {
                if ($httpCode == 0) {
                    return TRUE;
                } else {
                    return FALSE;
                }
            } elseif ($status == $httpCode) {
                return TRUE;
            }

            return FALSE;
            pcntl_wait($status); //Protect against Zombie children
        } else {
            // we are the child
            while (microtime(true) < $expire) {
                sleep(0.5);
            }
            return FALSE;
        }
    }

    public function send_sms()
    {

        $message = $this->input->post('message');
        $phone = '966' . $this->input->post('phone');
        $url = 'https://sms.malath.net.sa/httpSmsProvider.aspx?username=thabaeh&password=Thabaehjeddah&mobile=' . $phone . '&unicode=none&message=' . $message . '&sender=ADVERTIS-AD';
        $ch = curl_init();   // set url
        curl_setopt($ch, CURLOPT_URL, $url);   //return the transfer as a string
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); // $output contains the output string
        $output = curl_exec($ch);  // close curl resource to free up system resources
        curl_close($ch);


    }


}

?>