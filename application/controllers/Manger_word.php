<?phpdefined('BASEPATH') or exit('No direct script access allowed');class Manger_word extends CI_Controller{    function __construct()    {        parent::__construct();        check_not_login();        $this->load->model(['Manger_word_m']);        if ($this->session->userdata('site_lang')) {            switch ($_SESSION['site_lang']) {                case 'arabic':                    $this->config->set_item('language', 'arabic');                    break;                case 'english':                    $this->config->set_item('language', 'english');                    break;                case 'russian':                    $this->config->set_item('language', 'russian');                    break;                default:                    $this->config->set_item('language', 'english');                    break;            }        }    }    public function index()    {        $data['all'] = $this->Manger_word_m->get()->result();        $data['title'] = translate('About_company');        $this->template->load('template', 'manger_word/data', $data);    }    function get_ajax()    {        $list = $this->Manger_word_m->get_datatables();        $data = array();        $no = @$_POST['start'];        foreach ($list as $item) {            $no++;            $row = array();            $row[] = $no . ".";            $row[] = $item->word_ar;            $row[] = $item->word_en;/*            $row[] = $item->word_ru;*///            $row[] = $item->description;            $row[] = '            <div class="btn-block  btn-group-sm">            <a href="' . base_url() . 'Manger_word/edit/' . $item->id . '" title="'.translate('Update').'"   class="btn btn-info btn-sm">                                            <i class="fa fa-pencil-alt" > </i></a>                                                                    </div>            ';            $data[] = $row;        }        $output = array(            "draw" => @$_POST['draw'],            "recordsTotal" => $this->Manger_word_m->count_all(),            "recordsFiltered" => $this->Manger_word_m->count_filtered(),            "data" => $data,        );        // output to json format        echo json_encode($output);    }    public function get_load_details()    {        $id = $this->input->post('id');        //$data['all_details'] = $this->Manger_word_m->get_load_details($id)[0];        $data['all_details'] = $this->Manger_word_m->get($id)->row();        $this->load->view('manger_word/load_details_page', $data);    }    /****************************************************************/    public function thumb($data, $folder_name)    {        $config['image_library'] = 'gd2';        $config['source_image'] = $data['full_path'];        $config['new_image'] = 'uploads/' . $folder_name . '/thumbs/' . $data['file_name'];        $config['create_thumb'] = TRUE;        $config['maintain_ratio'] = TRUE;        $config['thumb_marker'] = '';        $config['width'] = 275;        $config['height'] = 250;        $this->load->library('image_lib', $config);        $this->image_lib->initialize($config);        $this->image_lib->resize();    }    private function upload_image($file_name, $folder_name)    {        $config['upload_path'] = 'uploads/' . $folder_name;        $config['allowed_types'] = 'gif|Gif|ico|ICO|jpg|JPG|jpeg|JPEG|BNG|png|PNG|bmp|BMP|WMV|wmv|MP3|mp3|FLV|flv|SWF|swf';        $config['max_size'] = '1024*8';        $config['encrypt_name'] = true;        $this->load->library('upload', $config);        $this->upload->initialize($config);        if (!$this->upload->do_upload($file_name)) {            return false;        } else {            $datafile = $this->upload->data();            $this->thumb($datafile, $folder_name);//            echo '<br>'. $datafile['file_name'];            return $datafile['file_name'];        }    }    public function add() /* manger_word/add*/    {        $this->load->helper(array('form', 'url'));        $this->load->library(array('form_validation'));        $this->form_validation->set_rules('word_title_ar', ''.translate('word_title_ar').'', 'required');        $this->form_validation->set_rules('word_title_en', ''.translate('word_title_en').'', 'required');        $this->form_validation->set_rules('word_ar', ''.translate('word_ar').'', 'required');        $this->form_validation->set_rules('word_en', ''.translate('word_en').'', 'required');               if ($this->form_validation->run() == FALSE) {            $company_stats = new stdClass();            $company_stats->id = null;            $company_stats->word_ar = null;            $company_stats->word_en = null;            $company_stats->word_title_ar = null;            $company_stats->word_title_en = null;            $data = array(                'page' => 'add',                'company_stats' => $company_stats,            );            $this->template->load('template', 'manger_word/form', $data);        } else {            $post = $this->input->post(null, TRUE);            if (isset($_POST['add'])) {                $this->Manger_word_m->add($post);                if ($this->db->affected_rows() > 0) {                    $this->session->set_flashdata('sukses',translate('Process_Done_Successfully'));                }                redirect('Manger_word', 'refresh');            }        }    }    public function edit($id)    {        $this->load->helper(array('form', 'url'));        $this->load->library('form_validation');        $this->form_validation->set_rules('word_title_ar', ''.translate('word_title_ar').'', 'required');        $this->form_validation->set_rules('word_title_en', ''.translate('word_title_en').'', 'required');        $this->form_validation->set_rules('word_ar', ''.translate('word_ar').'', 'required');        $this->form_validation->set_rules('word_en', ''.translate('word_en').'', 'required');        if ($this->form_validation->run() == FALSE) {            $query = $this->Manger_word_m->get($id);            if ($query->num_rows() > 0) {                $company_stats = $query->row();                $data = array(                    'page' => 'edit',                    'company_stats' => $company_stats,                );                $this->template->load('template', 'manger_word/edit', $data);            } else {                redirect('Manger_word', 'refresh');            }        } else {            $post = $this->input->post(null, TRUE);            if (isset($_POST['add'])) {                $this->Manger_word_m->edit($post);            }            if ($this->db->affected_rows() > 0) {                $this->session->set_flashdata('sukses',translate('Process_Done_Successfully'));            } else {                $this->session->set_flashdata('danger', translate('error_try_again'));            }            redirect('Manger_word', 'refresh');        }    }    public function delete($id)    {        $this->Manger_word_m->delete($id);        if ($this->db->affected_rows() > 0) {            $this->session->set_flashdata('success', translate('Delete_Done_Successfully'));        }        redirect('Manger_word', 'refresh');    }}