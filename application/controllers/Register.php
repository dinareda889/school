<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Register extends CI_Controller
{


    function __construct()
    {
        parent::__construct();
        check_not_login();
        $this->load->model(['Register_m']);

    }


    public function index() // Register/
    {
        // $data['all_properties_msgs'] = $this->Register_m->get();
        $data['title'] = translate('Register_Messages');
        $this->template->load('template', 'register_v/register_data', $data);
    }

    function get_ajax()
    {
        $list = $this->Register_m->get_datatables_msgs('');

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
            $row[] = '  <i class="far fa-msgs mr-1"></i>' . $item->f_name;
            $row[] = '  <i class="far fa-msgs mr-1"></i>' . $item->l_name;
            $row[] = $item->phone;
            $row[] = $item->email;
            $row[] = $item->nationality;
            $row[] = '';
            $data[] = $row;
        }
        $output = array(
            "draw" => @$_POST['draw'],
            "recordsTotal" => $this->Register_m->count_all_msgs(''),
            "recordsFiltered" => $this->Register_m->count_filtered_msgs(''),
            "data" => $data,
        );
        // output to json format
        echo json_encode($output);
    }

}
?>