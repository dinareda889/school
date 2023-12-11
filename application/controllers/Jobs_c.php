<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Jobs_c extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        check_not_login();
        $this->load->model('Jobs_m');
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
        $data['title'] = translate('Employment_management');
        $this->template->load('template', 'jobs_v/jobs_data', $data);
    }

    public function get_load_details()
    {
        $id = $this->input->post('id');
        $data['all_details'] = $this->Jobs_m->get($id)->row();
        $this->load->view('jobs_v/load_details_page', $data);
    }

    function get_ajax_jobs()
    {
        $list = $this->Jobs_m->get_datatables_jobs();
        $data = array();
        $no = @$_POST['start'];
        foreach ($list as $item) {
            $no++;
            $row = array();
            $row[] = $no . ".";
            $row[] = $item->date_ar;
            $row[] = $item->title;
            $row[] = $item->title_en;
            $row[] = $item->title_ru;
            $row[] = '<div class="btn-group btn-group-sm">

            <a href="#modal_details" data-toggle="modal" title="' . translate('Details') . '" 
                        onclick="get_load_details(' . $item->id . ')" class="btn btn-warning btn-sm"> 
                         <i class="fa fa-eye" style="color: white;"></i></a>
                         <a href="' . base_url() . 'Jobs_c/career_orders/' . base64_encode($item->id) . '"
												class="btn btn-info  btn-outline" title="' . translate('career_orders') . '">
													<i class="fas fa-briefcase"></i> 
												</a>
                        <a href="' . site_url('Jobs_c/edit_jobs/' . $item->id) . '" class="btn btn-info"><i class="fa fa-pencil-alt"></i></a>
                  
                                  <a href="#" onclick=\'Swal.fire({
                                            title: "' . translate('Are_You_Sure_For_Delete') . ' ؟",
                                            icon: "warning",
                                            showCancelButton: true,
                                            confirmButtonClass: "btn-danger",
                                            confirmButtonText: "' . translate('Delete') . '",
                                            cancelButtonText: "' . translate('Cancel') . '",
                                             }).then((result) => {
                                             if (result.isConfirmed) {
                                            Swal.fire("' . translate('Deleted') . '!", "", "success");
                                            window.location="' . base_url() . 'Jobs_c/delete_jobs/' . $item->id . '";
                                            }});\' class="btn btn-danger btn-sm">
                                            <i class="fa fa-trash"> </i></a>
                                 </div>
                      ';
            $data[] = $row;
        }
        $output = array(
            "draw" => @$_POST['draw'],
            "recordsTotal" => $this->Jobs_m->count_all_jobs(),
            "recordsFiltered" => $this->Jobs_m->count_filtered_jobs(),
            "data" => $data,
        );
        // output to json format
        echo json_encode($output);
    }

    public function thumb_photos($data)
    {

        $config['image_library'] = 'gd2';
        $config['source_image'] = $data['full_path'];
        $config['new_image'] = 'uploads/web/photos/thumbs/' . $data['file_name'];
        $config['create_thumb'] = TRUE;
        $config['maintain_ratio'] = TRUE;
        $config['thumb_marker'] = '';
        $config['width'] = 275;
        $config['height'] = 250;
        $this->load->library('image_lib', $config);
        $this->image_lib->initialize($config);
        $this->image_lib->resize();

    }

    private function upload_image_photos($file_name)
    {
        $config['upload_path'] = 'uploads/web/photos';
        $config['allowed_types'] = 'gif|Gif|ico|ICO|jpg|JPG|jpeg|JPEG|BNG|png|PNG|bmp|BMP|WMV|wmv|MP3|mp3|FLV|flv|SWF|swf';
        $config['max_size'] = '800000000000000000000000000000000000000000000000000000';
        $config['encrypt_name'] = true;
        $this->load->library('upload', $config);
        $this->upload->initialize($config);
        if (!$this->upload->do_upload($file_name)) {
            /*            $errors = $this->upload->display_errors();
            print_r($errors);
            die;*/
            return false;
        } else {
            $datafile = $this->upload->data();
            $this->thumb_photos($datafile);
//            echo '<br>'. $datafile['file_name'];
            return $datafile['file_name'];
        }
    }

    private function upload_muli_image($input_name)
    {
        $filesCount = count($_FILES[$input_name]['name']);
        for ($i = 0; $i < $filesCount; $i++) {
            $_FILES['userFile']['name'] = $_FILES[$input_name]['name'][$i];
            $_FILES['userFile']['type'] = $_FILES[$input_name]['type'][$i];
            $_FILES['userFile']['tmp_name'] = $_FILES[$input_name]['tmp_name'][$i];
            $_FILES['userFile']['error'] = $_FILES[$input_name]['error'][$i];
            $_FILES['userFile']['size'] = $_FILES[$input_name]['size'][$i];
            $all_img[] = $this->upload_image_photos("userFile");
        }
        return $all_img;


    }


    public function add_jobs() // Jobs_c/add_jobs
    {
        $this->load->helper(array('form', 'url'));
        $this->load->library('form_validation');
        $this->form_validation->set_rules('date', translate('The_Date'), 'required');
        $this->form_validation->set_rules('title', translate('Job_title_in_Arabic'), 'required');
        $this->form_validation->set_rules('title_en', translate('Job_title_in_English'), 'required');
        $this->form_validation->set_rules('title_ru', translate('Job_title_in_Russian'), 'required');
        $this->form_validation->set_rules('details', translate('Job_Details_in_Arabic'), 'required');
        $this->form_validation->set_rules('details_en', translate('Job_Details_in_English'), 'required');
        $this->form_validation->set_rules('details_ru', translate('Job_Details_in_Russian'), 'required');
        $this->form_validation->set_rules('responsibilities', translate('Job_responsibilities_in_Arabic'), 'required');
        $this->form_validation->set_rules('responsibilities_en', translate('Job_responsibilities_in_English'), 'required');
        $this->form_validation->set_rules('responsibilities_ru', translate('Job_responsibilities_in_Russian'), 'required');
        $this->form_validation->set_rules('education_experience', translate('Job_Education_and_Experience_in_Arabic'), 'required');
        $this->form_validation->set_rules('education_experience_en', translate('Job_Education_and_Experience_in_English'), 'required');
        $this->form_validation->set_rules('education_experience_ru', translate('Job_Education_and_Experience_in_Russian'), 'required');
        $this->form_validation->set_rules('skills', translate('Job_Skills_in_Arabic'), 'required');
        $this->form_validation->set_rules('skills_en', translate('Job_Skills_in_English'), 'required');
        $this->form_validation->set_rules('skills_ru', translate('Job_Skills_in_Russian'), 'required');


        if ($this->form_validation->run() == FALSE) {
            $jobs = new stdClass();
            $jobs->id = null;
            $jobs->title = null;

            $data = array(
                'page' => 'add',
                'all_jobs' => $jobs
            );
            $this->template->load('template', 'jobs_v/jobs_form', $data);
        } else {
            $post = $this->input->post(null, TRUE);
            if (isset($_POST['add'])) {
                $this->Jobs_m->add_jobs($post);
                if ($this->db->affected_rows() > 0) {
                    $this->session->set_flashdata('success', translate('Process Done Successfully'));
                }
                redirect('Jobs_c', 'refresh');
            }
        }
    }

    public function edit_jobs($id)
    {
        $this->load->helper(array('form', 'url'));
        $this->load->library('form_validation');
        $this->form_validation->set_rules('date', translate('The_Date'), 'required');
        $this->form_validation->set_rules('title', translate('Job_title_in_Arabic'), 'required');
        $this->form_validation->set_rules('title_en', translate('Job_title_in_English'), 'required');
        $this->form_validation->set_rules('title_ru', translate('Job_title_in_Russian'), 'required');
        $this->form_validation->set_rules('details', translate('Job_Details_in_Arabic'), 'required');
        $this->form_validation->set_rules('details_en', translate('Job_Details_in_English'), 'required');
        $this->form_validation->set_rules('details_ru', translate('Job_Details_in_Russian'), 'required');
        $this->form_validation->set_rules('responsibilities', translate('Job_responsibilities_in_Arabic'), 'required');
        $this->form_validation->set_rules('responsibilities_en', translate('Job_responsibilities_in_English'), 'required');
        $this->form_validation->set_rules('responsibilities_ru', translate('Job_responsibilities_in_Russian'), 'required');
        $this->form_validation->set_rules('education_experience', translate('Job_Education_and_Experience_in_Arabic'), 'required');
        $this->form_validation->set_rules('education_experience_en', translate('Job_Education_and_Experience_in_English'), 'required');
        $this->form_validation->set_rules('education_experience_ru', translate('Job_Education_and_Experience_in_Russian'), 'required');
        $this->form_validation->set_rules('skills', translate('Job_Skills_in_Arabic'), 'required');
        $this->form_validation->set_rules('skills_en', translate('Job_Skills_in_English'), 'required');
        $this->form_validation->set_rules('skills_ru', translate('Job_Skills_in_Russian'), 'required');


        if ($this->form_validation->run() == FALSE) {
            $query = $this->Jobs_m->get($id);
            if ($query->num_rows() > 0) {
                $jobs = $query->row();
                $data = array(
                    'page' => 'edit',
                    'all_jobs' => $jobs
                );
                $this->template->load('template', 'jobs_v/jobs_edit', $data);
            } else {
                redirect('Jobs_c', 'refresh');
            }
        } else {
            $post = $this->input->post(null, TRUE);
            if (isset($_POST['edit'])) {

                $this->Jobs_m->edit_jobs($post);
            }
            if ($this->db->affected_rows() > 0) {
                $this->session->set_flashdata('success', translate('Process Done Successfully'));
            }
            redirect('Jobs_c', 'refresh');
        }
    }

    public function delete_jobs($id)
    {
        $this->Jobs_m->delete_jobs($id);
        if ($this->db->affected_rows() > 0) {
            $this->session->set_flashdata('sukses', translate('Process_Done_Successfully'));
        }
        redirect('Jobs_c', 'refresh');
    }


    function career_orders($career_id)
    {
        $career_id = base64_decode($career_id);
        $data['title'] = translate('career_orders');
        $data['orders'] = get_by('career_files', array('career_id' => $career_id));
        $this->template->load('template', 'jobs_v/career_files', $data);
    }

    function delete_career_order($id, $career_id)
    {
        $career_id = base64_decode($career_id);
        $order = get_by('career_files', array('id' => $id), 1);
        if (!empty($order)&&(!empty($order->file_cv))) {
            unlink('uploads/careers/' . $order->file_cv);
        }
        $this->Jobs_m->delete_career_order('career_files', array('id' => $id));
        if ($this->db->affected_rows() > 0) {
            $this->session->set_flashdata('success', translate('Messages_success'));
        } else {
            $this->session->set_flashdata('danger', translate('Messages_danger'));
        }
        redirect('Jobs_c/career_orders/' . base64_encode($career_id), 'refresh');
    }

}