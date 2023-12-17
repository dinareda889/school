<?php
class Feature_c extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('pagination');
        if ($this->session->userdata('is_logged_in') == 0) {
            redirect('login');
        }
        $this->load->helper(array('url', 'text', 'permission', 'form'));

        $this->load->model('Difined_model');
        $this->load->model('feature/Feature_m');

    }
    private function test($data = array())
    {
        echo "<pre>";
        print_r($data);
        echo "</pre>";
        die;
    }

   
    private function url()
    {
        unset($_SESSION['url']);
        $this->session->set_flashdata('url', 'http://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI']);
    }
    //-----------------------------------------
    private function message($type, $text)
    {
        
        $CI =& get_instance();
        $CI->load->library("session");
        if ($type == 'success') {
            return $CI->session->set_flashdata('message', '<script> swal({
                    type:"success",
                    title:"' . $text . '" ,
                    confirmButtonText: "تم"
                })</script>');
        } elseif ($type == 'warning') {
            return $CI->session->set_flashdata('message', '<div class="alert alert-warning alert-dismissable"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a><strong>   !</strong> ' . $text . '.</div>');
        } elseif ($type == 'error') {
            return $CI->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissable"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a><strong> !</strong> ' . $text . '.</div>');
        }
    }
    //-----------------------------------------

    public function index() //feature/Feature_c

    {
        if ($this->input->post('save') == 'save') {
     
            $this->Feature_m->insert();
            $this->message('success', 'تم إضافة الخصائص بنجاح');
            redirect('feature/Feature_c/all_feature', 'refresh');
        }
    
        $data['all_feature'] = $this->Difined_model->select_all("feature", "id", "", "id", "DESC");
        $data['title'] = 'إضافة الخصائص ';
        $data['subview'] = 'admin/feature/feature';
        $this->load->view('admin_index', $data);
    }
    public function all_feature() //role_id_fk

    {

        $data['all_feature'] = $this->Difined_model->select_all("feature", "id", "", "id", "DESC");
        $data['title'] = ' كل الخصائص ';
        $data['subview'] = 'admin/feature/all_feature';
        $this->load->view('admin_index', $data);
    }

    public function update( $id)
    {
        $id = base64_decode($id);

        if ($this->input->post('save') == 'save') {
   
            $this->Feature_m->update($id);
            $this->message('success', 'تم التعديل بنجاح');
            redirect('feature/Feature_c/all_feature', 'refresh');
        }
      
        $data['all_feature'] = $this->Difined_model->select_all("feature", "id", "", "id", "DESC");
        $data['title'] = 'تعديل الخصائص ';
        $data['one_data']=$this->Feature_m->get_by_id($id);

        $data['subview'] = 'admin/feature/feature';
        $this->load->view('admin_index', $data);
    }

    public function delete($id)
    {
        $id = base64_decode($id);
        $this->Feature_m->delete($id);
        redirect('feature/Feature_c/all_feature','refresh');
    }

} // END CLASS
