<?phpdefined('BASEPATH') or exit('No direct script access allowed');class Web extends CI_Controller{    function __construct()    {        parent::__construct();        $this->load->model(['Web_m']);        $this->load->library('pagination');        $this->config->load('config');        if (!$this->session->userdata('site_lang')) {            $this->session->set_userdata('site_lang', 'english');        }else{            switch ($_SESSION['site_lang']) {                case 'arabic':                    $this->config->set_item('language', 'arabic');                    break;                case 'english':                    $this->config->set_item('language', 'english');                    break;                case 'russian':                    $this->config->set_item('language', 'russian');                    break;                default:                    $this->config->set_item('language', 'english');                    break;            }        }        $this->company_data = $this->fungsi->company_data();        $this->about_us = $this->Web_m->get_about_us()[0];        /*  $this->jobs_tasnif = $this->Web_m->get_jobs_tasnif();          $this->product_tasnif = $this->Web_m->get_product_tasnif();         */    }    public function messages($type, $text, $method = false)    {        $CI =& get_instance();        $CI->load->library("session");        if ($type == 'success') {            return $CI->session->set_flashdata('message', '<script  src="' . base_url() . 'assets/sweet_alert2/sweetalert2.js"></script><script  src="' . base_url() . 'assets/sweet_alert2/sweetalert2.all.js"></script><script  src="' . base_url() . 'assets/sweet_alert2/sweetalert2.all.min.js"></script><script> Swal.fire({                    icon:"success",                    title:"' . $text . '"                 })</script>');        } elseif ($type == 'warning') {            return $CI->session->set_flashdata('message', '<div class="alert alert-warning alert-dismissable"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a><strong>   !</strong> ' . $text . '.</div>');        } elseif ($type == 'error') {            return $CI->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissable"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a><strong> !</strong> ' . $text . '.</div>');        } else {        }    }    public function index()    {        $data['title'] = translate_web('Home_Page');        $data['subview'] = 'web_v/home';        $data['about_us'] = $this->Web_m->get_about_us();        $data['projects'] = $this->Web_m->get_projects('', 6);        $data['blogs'] = $this->Web_m->get_blogs('', 3);        $data['video'] = $this->Web_m->get_video();    /*    echo '<pre>';        print_r($data);        die;        echo '</pre>';*/        $this->load->view('template_web', $data);    }    public function about_us()    {        $data['title'] = translate_web('About_Us_Page');        $data['about_us'] = $this->Web_m->get_about_us();        $data['team'] = $this->Web_m->get_team();        $data['subview'] = 'web_v/about_us';        $this->load->view('template_web', $data);    }    public function sitemap()    {        $data['title'] = translate_web('site_map');        $data['subview'] = 'web_v/sitemap';        $data['projects'] = $this->Web_m->get_projects();        $data['blogs'] = $this->Web_m->get_blogs();        $data['jobs'] = $this->Web_m->get_jobs();        $this->load->view('template_web', $data);    }    public function contact_us()    {        $this->load->model(['Msg_m']);        $this->load->helper(array('form', 'url'));        $this->load->library('form_validation');        if ($this->session->userdata('site_lang') && ($this->session->userdata('site_lang') == 'english')) {            $this->form_validation->set_message('required', 'Field is required!');        } else {            $this->form_validation->set_message('required', 'الحقل اجباري!');        }        $this->form_validation->set_rules('name', translate_web('Enter_Name'), 'required');        $this->form_validation->set_rules('email', translate_web('Enter_Email'), 'required');        $this->form_validation->set_rules('phone', translate_web('Enter_phone'), 'required');        if ($this->form_validation->run() == FALSE) {            $contact = new stdClass();            $contact->name = null;            $contact->email = null;            $contact->phone = null;            $contact->message = null;            $data = array(                'title' => translate_web('contact_us'),                'loader' => 'not',                'page' => 'add',                'all_contact' => $contact,                'subview' => 'web_v/contact',            );            $this->load->view('template_web', $data);        } else {            $post = $this->input->post(null, TRUE);            if (isset($_POST['add'])) {                $this->Msg_m->add_contact();            }            if ($this->db->affected_rows() > 0) {                $this->messages('success', translate_web('Message_Send_Successfully'));            }            redirect('contact_us', 'refresh');        }    }    public function contact($blog_id)    {        $this->load->model(['Msg_m']);        $this->load->model(['Project_m']);        $this->load->helper(array('form', 'url'));        $this->load->library('form_validation');        if ($this->session->userdata('site_lang') && ($this->session->userdata('site_lang') == 'english')) {            $this->form_validation->set_message('required', 'Field is required!');        } else {            $this->form_validation->set_message('required', 'الحقل اجباري!');        }        $this->form_validation->set_rules('name', translate_web('Enter_Name'), 'required');        $this->form_validation->set_rules('email', translate_web('Enter_Email'), 'required');        $this->form_validation->set_rules('phone', translate_web('Enter_phone'), 'required');        if ($this->form_validation->run() == FALSE) {            $contact = new stdClass();            $contact->name = null;            $contact->email = null;            $contact->phone = null;            $contact->message = null;            $blog_id = base64_decode($blog_id);            $data['one_project'] = $this->Project_m->get_one_project(array('id' => $blog_id));            $data['projects'] = $this->Project_m->get_all_projects(array(), 10);            $data['subview'] = 'web_v/project-details';            $this->load->view('template_web', $data);        } else {            $post = $this->input->post(null, TRUE);            if (isset($_POST['add'])) {                $this->Msg_m->add_contact();            }            if ($this->db->affected_rows() > 0) {                $this->messages('success', translate_web('Message_Send_Successfully'));            }            redirect('one_project/' . base64_encode($_POST['project_id']), 'refresh');        }    }    public function register()    {        $this->load->model(['Register_m']);        $this->load->helper(array('form', 'url'));        $this->load->library('form_validation');        if ($this->session->userdata('site_lang') && ($this->session->userdata('site_lang') == 'english')) {            $this->form_validation->set_message('required', 'Field is required!');        } else {            $this->form_validation->set_message('required', 'الحقل اجباري!');        }        $this->form_validation->set_rules('f_name', translate_web('First_Name'), 'required');        $this->form_validation->set_rules('l_name', translate_web('Last_Name'), 'required');        $this->form_validation->set_rules('email', translate_web('Enter_Email'), 'required');        $this->form_validation->set_rules('phone', translate_web('Enter_phone'), 'required');        $this->form_validation->set_rules('nationality', translate_web('Nationality'), 'required');        if ($this->form_validation->run() == FALSE) {            $contact = new stdClass();            $contact->f_name = null;            $contact->l_name = null;            $contact->email = null;            $contact->phone = null;            $contact->nationality = null;            $data = array(                'title' => translate_web('Register'),                'loader' => 'not',                'page' => 'add',                'all_contact' => $contact,                'subview' => 'web_v/home',            );            $this->load->view('template_web', $data);        } else {            $post = $this->input->post(null, TRUE);            if (isset($_POST['add'])) {                $this->Register_m->add();            }            if ($this->db->affected_rows() > 0) {                $this->messages('success', translate_web('Message_Send_Successfully'));            }            redirect('Web', 'refresh');        }    }    /*----------------------- start blog ------------------------------*/    function blogs()    {        $this->load->model(['News_m']);        $config = array();        $config["base_url"] = base_url() . "blogs";        $config["total_rows"] = $this->News_m->get_count(array());        /*        print_r($this->db->last_query());*/        $config["per_page"] = 12;        $config["uri_segment"] = 2;        /*coustom html */        $config['full_tag_open'] = '<ul class="pagination justify-content-center">';        $config['full_tag_close'] = '</ul>';        $config['cur_tag_open'] = '<li class="page-item  "><a class="active" >';        $config['cur_tag_close'] = '</a></li>';        $config['num_tag_open'] = '<li class="page-item ">';        $config['num_tag_close'] = '</li>';        $config['prev_tag_open'] = '<li class="page-item"> ';        $config['prev_tag_close'] = '</li>';        $config['next_tag_open'] = '<li class="page-item"> ';        $config['next_tag_close'] = '</li>';        $config['num_links'] = 6;        $config['next_link'] = '<i class="fa fa-angle-left"></i>									<span class="sr-only">' . translate_web('Next') . '</span>';        $config['prev_link'] = '<i class=" fa fa-angle-right"></i>									<span class="sr-only">' . translate_web('Previous') . '</span>';        /*coustom html */        $this->pagination->initialize($config);        $page = ($this->uri->segment(2)) ? $this->uri->segment(2) : 0;        $data["links"] = $this->pagination->create_links();        $data['blogs'] = $this->News_m->get_all_blogs(array(), $config["per_page"], $page);        $data['subview'] = 'web_v/blog';        $this->load->view('template_web', $data);    }    function one_blog($event_id)    {        $this->load->model(['News_m']);        $event_id = base64_decode($event_id);        $data['one_blog'] = $this->News_m->get_one_blog(array('id' => $event_id));        if (empty($data['one_blog'])) {            access_denied();        } else {            $data['blogs'] = $this->News_m->get_all_blogs(array(), 10);            $data['subview'] = 'web_v/blog_detail';            /*		$this->load->view($data['subview'], $data);*/            $this->load->view('template_web', $data);        }    }    /*----------------------- end blog ------------------------------*/    /*----------------------- start project ------------------------------*/    function projects()    {        $this->load->model(['Project_m']);        $config = array();        $config["base_url"] = base_url() . "projects";        $config["total_rows"] = $this->Project_m->get_count(array());        /*        print_r($this->db->last_query());*/        $config["per_page"] = 12;        $config["uri_segment"] = 2;        /*coustom html */        $config['full_tag_open'] = '<ul class="pagination justify-content-center">';        $config['full_tag_close'] = '</ul>';        $config['cur_tag_open'] = '<li class="page-item  "><a class="active" >';        $config['cur_tag_close'] = '</a></li>';        $config['num_tag_open'] = '<li class="page-item ">';        $config['num_tag_close'] = '</li>';        $config['prev_tag_open'] = '<li class="page-item"> ';        $config['prev_tag_close'] = '</li>';        $config['next_tag_open'] = '<li class="page-item"> ';        $config['next_tag_close'] = '</li>';        $config['num_links'] = 6;        $config['next_link'] = '<i class="fa fa-angle-left"></i>									<span class="sr-only">' . translate_web('Next') . '</span>';        $config['prev_link'] = '<i class=" fa fa-angle-right"></i>									<span class="sr-only">' . translate_web('Previous') . '</span>';        /*coustom html */        $this->pagination->initialize($config);        $page = ($this->uri->segment(2)) ? $this->uri->segment(2) : 0;        $data["links"] = $this->pagination->create_links();        $data['projects'] = $this->Project_m->get_all_projects(array(), $config["per_page"], $page);        $data['subview'] = 'web_v/projects';        $this->load->view('template_web', $data);    }    function one_project($blog_id)    {        $this->load->model(['Project_m']);        $blog_id = base64_decode($blog_id);        $data['one_project'] = $this->Project_m->get_one_project(array('id' => $blog_id));        if (empty($data['one_project'])) {            access_denied();        } else {            $data['projects'] = $this->Project_m->get_all_projects(array(), 10);            $data['subview'] = 'web_v/project-details';            $this->load->view('template_web', $data);        }    }    /*----------------------- end project ------------------------------*/    /*  function send_comment()      {          $this->load->model(['News_m']);          $this->News_m->add_comment();          if ($this->db->affected_rows() > 0) {              $this->session->set_flashdata('success', 'تمت العملية بنجاح ');          }          redirect('one_blog/' . base64_encode($_POST['data']['blog_id']), 'refresh');      }*/    public function send_comment()    {        $this->load->model(['News_m']);        $this->load->helper(array('form', 'url'));        $this->load->library(array('form_validation'));        $this->form_validation->set_rules('data[name]', translate('user_name_comment'), 'required');        $this->form_validation->set_rules('data[email]', translate('user_email_comment'), 'required');        $this->form_validation->set_rules('data[comment]', translate('user_comment'), 'required');        if ($this->form_validation->run() == FALSE) {            if (empty($_POST)) {                redirect('blogs', 'refresh');            } else {                $blog_id = $_POST['data']['blog_id'];                $data['one_blog'] = $this->News_m->get_one_blog(array('id' => $blog_id));                $data['blogs'] = $this->News_m->get_all_blogs(array(), 10);                $data['subview'] = 'web_v/blog_detail';                $this->load->view('template_web', $data);            }        } else {            $post = $this->input->post(null, TRUE);            $this->News_m->add_comment();            if ($this->db->affected_rows() > 0) {                $this->messages('success', translate_web('Comment_Send_Successfully'));                redirect('one_blog/' . base64_encode($_POST['data']['blog_id']), 'refresh');            }        }    }    /*----------------------- start blog ------------------------------*/    function careers()    {        $this->load->model(['Jobs_m']);        $config = array();        $config["base_url"] = base_url() . "careers";        $config["total_rows"] = $this->Jobs_m->get_count(array());        /*        print_r($this->db->last_query());*/        $config["per_page"] = 12;        $config["uri_segment"] = 2;        /*coustom html */        $config['full_tag_open'] = '<ul class="pagination justify-content-center">';        $config['full_tag_close'] = '</ul>';        $config['cur_tag_open'] = '<li class="page-item  "><a class="active" >';        $config['cur_tag_close'] = '</a></li>';        $config['num_tag_open'] = '<li class="page-item ">';        $config['num_tag_close'] = '</li>';        $config['prev_tag_open'] = '<li class="page-item"> ';        $config['prev_tag_close'] = '</li>';        $config['next_tag_open'] = '<li class="page-item"> ';        $config['next_tag_close'] = '</li>';        $config['num_links'] = 6;        $config['next_link'] = '<i class="fa fa-angle-left"></i><span class="sr-only">' . translate_web('Next') . '</span>';        $config['prev_link'] = '<i class=" fa fa-angle-right"></i><span class="sr-only">' . translate_web('Previous') . '</span>';        /*coustom html */        $this->pagination->initialize($config);        $page = ($this->uri->segment(2)) ? $this->uri->segment(2) : 0;        $data["links"] = $this->pagination->create_links();        $data['careers'] = $this->Jobs_m->get_all_careers(array(), $config["per_page"], $page);        $data['subview'] = 'web_v/careers';        $this->load->view('template_web', $data);    }    function one_career($career_id)    {        $this->load->model(['Jobs_m']);        $career_id = base64_decode($career_id);        $data['one_career'] = $this->Jobs_m->get_one_career(array('id' => $career_id));        $data['subview'] = 'web_v/career_details';        $this->load->view('template_web', $data);    }    /*----------------------- end blog ------------------------------*/    public function thumb($data, $folder_name)    {        $config['image_library'] = 'gd2';        $config['source_image'] = $data['full_path'];        $config['new_image'] = 'uploads/' . $folder_name . '/thumbs/' . $data['file_name'];        $config['create_thumb'] = TRUE;        $config['maintain_ratio'] = TRUE;        $config['thumb_marker'] = '';        $config['width'] = 275;        $config['height'] = 250;        $this->load->library('image_lib', $config);        $this->image_lib->initialize($config);        $this->image_lib->resize();    }    private function upload_image($file_name, $folder_name)    {        $config['upload_path'] = 'uploads/' . $folder_name;        $config['allowed_types'] = 'pdf|PDF|gif|Gif|ico|ICO|jpg|JPG|jpeg|JPEG|BNG|png|PNG|bmp|BMP|WMV|wmv|MP3|mp3|FLV|flv|SWF|swf';        $config['max_size'] = '100000024*8';        $config['encrypt_name'] = true;        $this->load->library('upload', $config);        $this->upload->initialize($config);        if (!$this->upload->do_upload($file_name)) {            /*echo $this->upload->display_errors();            die;*/            return false;        } else {            $datafile = $this->upload->data();            $this->thumb($datafile, $folder_name);//            echo '<br>'. $datafile['file_name'];            return $datafile['file_name'];        }    }    public function apply_job()    {        $this->load->model(['Jobs_m']);        $this->load->helper(array('form', 'url'));        $this->load->library(array('form_validation'));        $this->form_validation->set_rules('data[name]', translate('user_name_comment'), 'required');        $this->form_validation->set_rules('data[email]', translate('user_email_comment'), 'required');        if (empty($_FILES['file_cv']['name'])) {            $this->form_validation->set_rules('file_cv', translate('file_cv'), 'required');        }        if ($this->form_validation->run() == FALSE) {            if (empty($_POST)) {                redirect('careers', 'refresh');            } /*   echo ' if <pre>';            print_r($_POST);            die;*/            else {                $career_id = $_POST['data']['career_id'];                $data['one_career'] = $this->Jobs_m->get_one_career(array('id' => $career_id));                $data['subview'] = 'web_v/career_details';                $this->load->view('template_web', $data);            }        } else {            $post = $this->input->post(null, TRUE);            $file_cv = $this->upload_image("file_cv", 'careers');            $this->Jobs_m->apply_job($file_cv);            if ($this->db->affected_rows() > 0) {                $this->messages('success', translate_web('Data_Send_Successfully'));            }            redirect('one_career/' . base64_encode($_POST['data']['career_id']), 'refresh');        }    }}