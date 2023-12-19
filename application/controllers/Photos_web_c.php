<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Photos_web_c extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        check_not_login();
        $this->load->model(['Photos_web_m']);
    }


    public function messages($type, $text, $method = false)
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

    public function index()/*Photos_web_c*/
    {
        $data['all_records'] = $this->Photos_web_m->get();
        $data['title'] = translate('Photo_album');
        $data['subview'] = 'photos_web/photos_web_data';
      /*  $this->load->view('admin_index', $data);*/
        $this->template->load('template', $data['subview'], $data);

    }
    public function get_load_details()
    {
        $id = $this->input->post('id');
        $data['all_details'] = $this->Photos_web_m->get($id)->row();
        $data['images'] =$this->Photos_web_m->get_photos($id);
        $this->load->view('photos_web/load_details_page', $data);
    }


    function get_ajax_photos() {
        $list = $this->Photos_web_m->get_datatables_photos();
        $data = array();
        $no = @$_POST['start'];
        foreach ($list as $item) {
            $no++;
            $row = array();
            $row[] = $no.".";
            $row[] = $item->date_ar;
            $row[] = $item->title;
            $row[] = $item->title_en;

            /*$row[] = '<div class="btn-group">
            <!--<a href="'.site_url('Drivers/drivers_details_report/'.$item->id ).'" title="تفاصيل"   class="btn btn-warning btn-sm"> 
                        <i class="fa fa-eye"></i></a>-->
                   <a href="'.site_url('Photos_web_c/edit_photos/'.$item->id ).'" class="btn btn-info"><i class="fa fa-pencil-alt"></i></a>
                   <a href="'.site_url('Photos_web_c/delete_photos/'.$item->id ).'" onclick="return confirm(\'Are You Sure To Delete? \')"
                    class="btn btn-danger btn-xs"><i class="fa fa-trash"></i> </a> 
                      </div>';**/
            $row[]='
            <a href="#modal_details" data-toggle="modal" title="'.translate('Details').'" 
                        onclick="get_load_details('.$item->id.')" class="btn btn-warning btn-sm"> 

                         <i class="fa fa-eye" style="color: white;"></i></a>
            <a href="'.base_url().'Photos_web_c/edit_photos/'.$item->id.'" title="'.translate('Update').'" class="btn btn-info btn-sm">

                                            <i class="fa fa-pencil-alt" > </i></a>
            <a href="#" title="' . translate('Delete') . '"  onclick=\'Swal.fire({
                                            title: "' . translate('Are_You_Sure_For_Delete') . '",
                                           icon: "warning",
                                            showCancelButton: true,
                                            confirmButtonClass: "btn-danger",
                                            confirmButtonText: "' . translate('Delete') . '",
                                            cancelButtonText: "' . translate('Cancel') . '",
                                             }).then((result) => {
                                             if (result.isConfirmed) {
                                           Swal.fire("' . translate('Deleted') . '!", "", "success");
                                            window.location="'.base_url().'Photos_web_c/delete_photos/'.$item->id.'";
                                            }});\' class="btn btn-danger btn-sm">

                                            <i class="fa fa-trash"> </i></a>
            ';
            $data[] = $row;
        }
        $output = array(
            "draw" => @$_POST['draw'],
            "recordsTotal" => $this->Photos_web_m->count_filtered_photos(),
            "recordsFiltered" => $this->Photos_web_m->count_filtered_photos(),
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

    private  function upload_image_photos($file_name){
        $config['upload_path'] = 'uploads/web/photos';
        $config['allowed_types'] = 'gif|Gif|ico|ICO|jpg|JPG|jpeg|JPEG|BNG|png|PNG|bmp|BMP|WMV|wmv|MP3|mp3|FLV|flv|SWF|swf';
        $config['max_size']    = '800000000000000000000000000000000000000000000';
        $config['encrypt_name']=true;
        $this->load->library('upload',$config);
        $this->upload->initialize($config);
        if(! $this->upload->do_upload($file_name)){
            return  false;
        }else{
            $datafile = $this->upload->data();
            $this->thumb_photos($datafile);
//            echo '<br>'. $datafile['file_name'];
            return  $datafile['file_name'];
        }
    }

    private function upload_muli_image($input_name){
        $filesCount = count($_FILES[$input_name]['name']);
        for($i = 0; $i < $filesCount; $i++){
            $_FILES['userFile']['name'] = $_FILES[$input_name]['name'][$i];
            $_FILES['userFile']['type'] = $_FILES[$input_name]['type'][$i];
            $_FILES['userFile']['tmp_name'] = $_FILES[$input_name]['tmp_name'][$i];
            $_FILES['userFile']['error'] = $_FILES[$input_name]['error'][$i];
            $_FILES['userFile']['size'] = $_FILES[$input_name]['size'][$i];
            $all_img[]=$this->upload_image_photos("userFile");
        }
        return $all_img;



    }

    public function add_photos() /*Photos_web_c/add_photos*/
    {
        $this->load->helper(array('form', 'url'));
        $this->load->library('form_validation');
        $this->form_validation->set_rules('date', translate('The_date'), 'required');
        $this->form_validation->set_rules('title', translate('Album_title_in_arabic'), 'required');
        $this->form_validation->set_rules('title_en', translate('Album_title_in_english'), 'required');
        if (empty($_FILES['main_image']['name']))
        {
            $this->form_validation->set_rules('main_image', translate('Main_picture'), 'required');
        }
        if ($this->form_validation->run() == FALSE)
        {
            $photos = new stdClass();
            $photos->date = null;
            $photos->main_image = null;
            $photos->title = null;
            $data = array(
                'title' => translate('Add_image'),
                'page' => 'add',
                'subview' => 'photos_web/photos_web_form',
                'all_photos'=>$photos,
            );

            $this->template->load('template',$data['subview'], $data);

        }else{
            $post= $this->input->post(null,TRUE);
            if(isset($_POST['add'])){

                $main_image = $this->upload_image_photos("main_image",'photos');
                $id = $this->Photos_web_m->add_photos($main_image);

                $all_img = $this->upload_muli_image("img_album","photos");
                $this->Photos_web_m->insert_photo($all_img, $id);
                redirect('Photos_web_c','refresh');


            }
            if($this->db->affected_rows() >0){
                $this->session->set_flashdata('success', translate('Messages_success'));
                //$this->session->set_flashdata('success', 'تمت العملية بنجاح ');
            }
            redirect('Photos_web_c','refresh');
        }
    }

    public function edit_photos($id) /*Photos_web_c/edit_photos*/
    {
        $this->load->helper(array('form', 'url'));
        $this->load->library('form_validation');
        $this->form_validation->set_rules('date', translate('The_date'), 'required');
        $this->form_validation->set_rules('title', translate('Album_title_in_arabic'), 'required');
        $this->form_validation->set_rules('title_en', translate('Album_title_in_english'), 'required');
        /*if (empty($_FILES['main_image']['name']))
        {
            $this->form_validation->set_rules('main_image', 'الصوره الرئيسيه', 'required');
        }*/
        if ($this->form_validation->run() == FALSE)
        {
            $query = $this->Photos_web_m->get($id);

            $photos = $query->row();
            $images =$this->Photos_web_m->get_photos($id);
            $data = array(
                'title' => translate('Editing_the_picture'),
                'page' => 'edit',
                'subview' => 'photos_web/photos_web_edit',
                'all_photos'=>$photos,
                'images'=>$images,
            );

            $this->template->load('template',$data['subview'], $data);
        }else{
            $post= $this->input->post(null,TRUE);
            if(isset($_POST['edit'])){

                $main_image = $this->upload_image_photos("main_image",'photos');
                $this->Photos_web_m->edit_photos($main_image,$id);

                $all_img = $this->upload_muli_image("img_album","photos");
                $this->Photos_web_m->insert_photo($all_img, $id);
                redirect('Photos_web_c','refresh');


            }
            if($this->db->affected_rows() >0){
                $this->session->set_flashdata('success', translate('Messages_success'));
                //$this->session->set_flashdata('success', 'تمت العملية بنجاح ');
            }
            redirect('Photos_web_c','refresh');
        }
    }

    public function delete_photos($id){ //
        $this->Photos_web_m->delete($id);
        $this->session->set_flashdata('success', translate('delete_successfully'));
        redirect('Photos_web_c','refresh');
    }
    public function delete_image(){ //
        $images_id =$this->input->post('images_id');
        $this->Photos_web_m->delete_image($images_id);
        //$this->message('success','تم الحذف بنجاح');
        //redirect('Photos_web_c','refresh');
    }



}
?>