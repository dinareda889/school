<?phpdefined('BASEPATH') or exit('No direct script access allowed');class Team extends CI_Controller{    function __construct()    {        parent::__construct();        check_not_login();        $this->load->model(['Team_m']);        if ($this->session->userdata('site_lang')) {            switch ($_SESSION['site_lang']) {                case 'arabic':                    $this->config->set_item('language', 'arabic');                    break;                case 'english':                    $this->config->set_item('language', 'english');                    break;                case 'russian':                    $this->config->set_item('language', 'russian');                    break;                default:                    $this->config->set_item('language', 'english');                    break;            }        }    }    public function index()    {        //$data['all_team'] = $this->Team_m->get();        $data['title'] = '' . translate('Our_Team') . '';        $this->template->load('template', 'team/team_data', $data);    }    function get_ajax_team()    {        $list = $this->Team_m->get_datatables_team();        $data = array();        $no = @$_POST['start'];        foreach ($list as $item) {            $no++;            $row = array();            if (!empty($item->image) && (file_exists('uploads/team/' . $item->image))) {                $image = base_url() . 'uploads/team/' . $item->image;            } else {                $image = base_url() . 'uploads/defult_image.jpg';            }            $row[] = $no . ".";            $row[] = '<img src="' . $image . '"  alt="" class="direct-chat-img"/>';            $row[] = $item->name;            $row[] = $item->name_en;            $row[] = $item->name_ru;            $row[] = $item->job_title;            $row[] = $item->job_title_en;            $row[] = $item->job_title_ru;//            $row[] = $item->description;            $row[] = '            <div class="btn-group  btn-group-sm">                  <a href="' . base_url() . 'Team/edit_team/' . $item->id . '" title="' . translate('Update') . '"   class="btn btn-info btn-xs">                                            <i class="fa fa-pencil-alt"> </i></a>            <a href="#" title="حذف"  onclick=\'Swal.fire({                                            title: "' . translate('Are_You_Sure_For_Delete') . ' ؟",                                            icon: "warning",                                            showCancelButton: true,                                            confirmButtonClass: "btn-danger",                                            confirmButtonText: "' . translate('Delete') . '",                                            cancelButtonText: "' . translate('Cancel') . '",                                             }).then((result) => {                                             if (result.isConfirmed) {                                            Swal.fire("' . translate('Deleted') . '!", "", "success");                                            window.location="' . base_url() . 'Team/delete_team/' . $item->id . '";                                            }});\' class="btn btn-danger btn-sm">                                            <i class="fa fa-trash"> </i></a>                                                                    </div>            ';            $data[] = $row;        }        $output = array(            "draw" => @$_POST['draw'],            "recordsTotal" => $this->Team_m->count_all_team(),            "recordsFiltered" => $this->Team_m->count_filtered_team(),            "data" => $data,        );        // output to json format        echo json_encode($output);    }    public function get_load_details()    {        $id = $this->input->post('id');        //$data['all_details'] = $this->Team_m->get_load_details($id)[0];        $data['all_details'] = $this->Team_m->get($id)->row();        $this->load->view('team/load_details_page', $data);    }    /****************************************************************/    public function thumb($data, $folder_name)    {        $config['image_library'] = 'gd2';        $config['source_image'] = $data['full_path'];        $config['new_image'] = 'uploads/' . $folder_name . '/thumbs/' . $data['file_name'];        $config['create_thumb'] = TRUE;        $config['maintain_ratio'] = TRUE;        $config['thumb_marker'] = '';        $config['width'] = 275;        $config['height'] = 250;        $this->load->library('image_lib', $config);        $this->image_lib->initialize($config);        $this->image_lib->resize();    }    private function upload_image($file_name, $folder_name)    {        $config['upload_path'] = 'uploads/' . $folder_name;        $config['allowed_types'] = 'gif|Gif|ico|ICO|jpg|JPG|jpeg|JPEG|BNG|png|PNG|bmp|BMP|WMV|wmv|MP3|mp3|FLV|flv|SWF|swf';        $config['max_size'] = '1024*8';        $config['encrypt_name'] = true;        $this->load->library('upload', $config);        $this->upload->initialize($config);        if (!$this->upload->do_upload($file_name)) {            return false;        } else {            $datafile = $this->upload->data();            $this->thumb($datafile, $folder_name);//            echo '<br>'. $datafile['file_name'];            return $datafile['file_name'];        }    }    public function add_team() /* Team/add_team*/    {        $this->load->helper(array('form', 'url'));        $this->load->library(array('form_validation'));        $this->form_validation->set_rules('name', translate('The_Name_in_Arabic'), 'required');        $this->form_validation->set_rules('name_en', translate('The_Name_in_English'), 'required');//        $this->form_validation->set_rules('name_ru', translate('The_Name_in_Russian'), 'required');        $this->form_validation->set_rules('job_title', translate('Job_title_in_Arabic'), 'required');        $this->form_validation->set_rules('job_title_en', translate('Job_title_in_English'), 'required');//        $this->form_validation->set_rules('job_title_ru', translate('Job_title_in_Russian'), 'required');        if (empty($_FILES['image']['name'])) {            $this->form_validation->set_rules('image', translate('Profile_Image'), 'required');        }        if ($this->form_validation->run() == FALSE) {            $team = new stdClass();            $team->id = null;            $team->name = null;            $team->job_title = null;            $team->image = null;            $data = array(                'page' => 'add',                'team' => $team,            );            $this->template->load('template', 'team/team_form', $data);        } else {            $post = $this->input->post(null, TRUE);            if (isset($_POST['add'])) {                $image = $this->upload_image("image", 'team');                $this->Team_m->add_team($post, $image);                if ($this->db->affected_rows() > 0) {                    $this->session->set_flashdata('sukses', translate('Process_Done_Successfully'));                }                redirect('Team', 'refresh');            }        }    }    public function edit_team($id)    {        $this->load->helper(array('form', 'url'));        $this->load->library('form_validation');        $this->form_validation->set_rules('name', translate('The_Name_in_Arabic'), 'required');        $this->form_validation->set_rules('name_en', translate('The_Name_in_English'), 'required');        $this->form_validation->set_rules('name_ru', translate('The_Name_in_Russian'), 'required');        $this->form_validation->set_rules('job_title', translate('Job_title_in_Arabic'), 'required');        $this->form_validation->set_rules('job_title_en', translate('Job_title_in_English'), 'required');        $this->form_validation->set_rules('job_title_ru', translate('Job_title_in_Russian'), 'required');        if ($this->form_validation->run() == FALSE) {            $query = $this->Team_m->get($id);            if ($query->num_rows() > 0) {                $team = $query->row();                $data = array(                    'page' => 'edit',                    'team' => $team,                );                $this->template->load('template', 'team/team_edit', $data);            } else {                redirect('Team', 'refresh');            }        } else {            $post = $this->input->post(null, TRUE);            if (isset($_POST['add'])) {                $image = $this->upload_image("image", 'team');                $this->Team_m->edit_team($post, $image);            }            if ($this->db->affected_rows() > 0) {                $this->session->set_flashdata('sukses', translate('Process_Done_Successfully'));            } else {                $this->session->set_flashdata('danger', translate('Error_Try_again_later'));            }            redirect('Team', 'refresh');        }    }    public function delete_team($id)    {        $this->Team_m->delete_team($id);        if ($this->db->affected_rows() > 0) {            $this->session->set_flashdata('success', translate('Process_Done_Successfully'));        }        redirect('Team', 'refresh');    }}?>