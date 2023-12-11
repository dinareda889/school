<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Msg extends CI_Controller
{


    function __construct()
    {
        parent::__construct();
        check_not_login();
        $this->load->model(['Msg_m']);
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


    public function msgs() // Msg/msgs
    {
        // $data['all_properties_msgs'] = $this->Msg_m->get();
        $data['title'] = translate('Unread_Messages');
        $this->template->load('template', 'msg_v/msg_reading', $data);
    }

    public function msgs_read() // Msg/msgs_read
    {
        // $data['all_properties_msgs'] = $this->Msg_m->get();
        $data['title'] = translate('Read_Messages');
        $this->template->load('template', 'msg_v/msg_read', $data);
    }

    function get_ajax_msgs_reading()
    {
        $list = $this->Msg_m->get_datatables_msgs('reading');

        $data = array();
        $no = @$_POST['start'];
        foreach ($list as $item) {
            $no++;
            $row = array();

            $row[] = $no . ".";
            $row[] = '<a class="text-default"><i class="far fa-calendar mr-1"></i>' . $item->msg_date . '</a>
              <br><description class="text-maroon"><i class="far fa-clock mr-1"></i>' . date('h:i a', $item->msg_time) . '</description>
              ';
//            $row[] = $item->msg_title;
            $row[] = '  <i class="far fa-msgs mr-1"></i>' . $item->msg_title;
            $row[] = $item->user_phone;
            $row[] = $item->email;


            /*$row[] = '<div class="btn-group btn-group-sm">
                   <a title="تحديد الرسالة كمقروءة " href="'.site_url('Msg/make_read/'.$item->msg_id).'" onclick="return confirm(\'Are You Sure To Mark msg as Read ? \')" 
                    class="btn btn-success btn-sm"><i class="fab fa-readme"></i> </a>
                 <a title="حذف الرسالة "  href="'.site_url('Msg/delete_msg/'.$item->msg_id).'" onclick="return confirm(\'Are You Sure To Delete? \')" 
                    class="btn btn-danger btn-sm"><i class="fa fa-trash"></i> </a>

<a  title="الإطلاع علي تفاصيل الرسالة " href="#modal_details" data-toggle="modal" onclick="get_msg_details('.$item->msg_id.')" class="btn btn-warning btn-sm"> <i class="fa fa-eye"></i></a>
   
                      </div>
';*/

            $row[] = '
            <div class="btn-group  btn-group-sm">
           <a  title="'.translate('Details').'" href="#modal_details" data-toggle="modal" onclick="get_msg_details(' . $item->msg_id . ')" 
           class="btn btn-warning btn-sm"> <i class="fa fa-eye"></i></a>
   
           
                    <a href="#" title="' . translate('Mark_the_message_as_read') . '"  onclick=\'Swal.fire({
                                            title: "' . translate('Are_you_sure_to_mark_the_message_as_read?') . '",
                                            text: "",
                                            icon: "warning",
                                            showCancelButton: true,
                                            confirmButtonClass: "btn-danger",
                                            confirmButtonText: "' . translate('Save') . '",
                                            cancelButtonText: "' . translate('Cancel') . '",
                                            }).then((result) => {
                                            if (result.isConfirmed) {
                                            Swal.fire("' . translate('Mark_the_message_as_read') . '", "", "success");
                                            window.location="' . base_url() . 'Msg/make_read/' . $item->msg_id . '";
                                            }
                                            });\' class="btn btn-success btn-sm">
                                            <i class="fab fa-readme"></i></a>
            <a href="#" title="' . translate('Delete') . '"  onclick=\'Swal.fire({
                                            title: "' . translate('Are_you_sure_for_delete') . '",
                                            text: "",
                                            icon: "warning",
                                            showCancelButton: true,
                                            confirmButtonClass: "btn-danger",
                                            confirmButtonText: "' . translate('Delete') . '",
                                            cancelButtonText: "' . translate('Cancel') . '",
                                            }).then((result) => {
                                              if (result.isConfirmed) {
            Swal.fire("' . translate('Deleted') . '", "", "success");
            window.location = "' . base_url() . 'Msg/delete_msg/' . $item->msg_id . '";
        }});\' class="btn btn-danger btn-sm">
                                            <i class="fa fa-trash"> </i></a>
                                            
                        </div>
            ';
            $row[] = '';
            $data[] = $row;
        }
        $output = array(
            "draw" => @$_POST['draw'],
            "recordsTotal" => $this->Msg_m->count_all_msgs('reading'),
            "recordsFiltered" => $this->Msg_m->count_filtered_msgs('reading'),
            "data" => $data,
        );
        // output to json format
        echo json_encode($output);
    }


    function get_ajax_msgs_read()
    {
        $list = $this->Msg_m->get_datatables_msgs('read');


        $data = array();
        $no = @$_POST['start'];
        foreach ($list as $item) {
            $no++;
            $row = array();

            $row[] = $no . ".";
            $row[] = '<a class="text-default"><i class="far fa-calendar mr-1"></i>' . $item->msg_date . '</a>
              <br><description class="text-default"><i class="far fa-clock mr-1"></i>' . date('h:i a', $item->msg_time) . '</description>
              ';
            //            $row[] = $item->msg_title;
            $row[] = '  <i class="far fa-msgs mr-1"></i>' . $item->msg_title;
            $row[] = $item->user_phone;
            $row[] = $item->email;


            // $row[] = $item->msg_price ; ;
            /*   $row[] = '<div class="btn-group btn-group-sm">
                         <a href="'.site_url('msgproperty/make_read/'.$item->msg_id).'" onclick="return confirm(\'Are You Sure To Convert msgs To Read ? \')"
                          class="btn btn-success btn-sm"><i class="fas fa-thumbs-up"></i> </a>

                            </div>
      ';*/
            $row[] = '<a class="text-danger"><i class="far fa-calendar mr-1"></i>' . $item->act_ended_date . '</a>
              <br><description class="text-danger"><i class="far fa-clock mr-1"></i>' . $item->act_ended_time . '</description>
              ';
            $row[] = '<a  title="'.translate('Show_The_Details').'" href="#modal_details" data-toggle="modal" onclick="get_msg_details(' . $item->msg_id . ')" class="btn btn-warning btn-sm"> <i class="fa fa-eye"></i></a>
   ';
            $data[] = $row;
        }
        $output = array(
            "draw" => @$_POST['draw'],
            "recordsTotal" => $this->Msg_m->count_all_msgs('read'),
            "recordsFiltered" => $this->Msg_m->count_filtered_msgs('read'),
            "data" => $data,
        );
        // output to json format
        echo json_encode($output);
    }


    public
    function make_read($msg_id)
    {
        $this->Msg_m->make_read($msg_id);
        if ($this->db->affected_rows() > 0) {
/*            $this->session->set_flashdata('success', 'تم تحديد الرسالة كرسالة مقروئة');*/
            $this->session->set_flashdata('success',translate('Marked_the_message_as_read') );

        }
        redirect('Msg/msgs', 'refresh');
    }


    public
    function get_msg_details()
    {
        $msg_id = $this->input->post('msg_id');

        $data['all_details'] = $this->Msg_m->get_msg_details($msg_id);

        $this->load->view('msg_v/msg_detail_page', $data);
    }


    public
    function delete_msg($msg_id)
    {
        $this->Msg_m->delete_msgs($msg_id);
        if ($this->db->affected_rows() > 0) {
           $this->session->set_flashdata('success',translate('Process_Done_Successfully'));
        }
        redirect('Msg/msgs', 'refresh');
    }

}