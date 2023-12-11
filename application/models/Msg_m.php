<?php
class Msg_m extends CI_Model
{


    /***************************************************************************************/

    var $column_order_msgs = array(null,null,'msg_title', 'user_phone','email'); //set column field database for datatable orderable
    var $column_search_msgs  = array('msg_title', 'user_phone','email'); //set column field database for datatable searchable
    var $order_msgs  = array('msg_id' => 'desc'); // default order

    private function _get_datatables_query_msgs($status=null) {

        $this->db->select('tbl_messages.*');
//        $this->db->select('tbl_messages.*,api_users.user_name,api_users.user_email');
        $this->db->from('tbl_messages');
//        $this->db->join('api_users','api_users.user_id = tbl_messages.customer_id');
        if ($status != null) {
            $this->db->where('act_ended', $status);
        }

        $i = 0;
        foreach ($this->column_search_msgs  as $item) { // loop column
            if(@$_POST['search']['value']) { // if datatable send POST for search
                if($i===0) { // first loop
                    $this->db->group_start(); // open bracket. query Where with OR clause better with bracket. because maybe can combine with other WHERE with AND.
                    $this->db->like($item, $_POST['search']['value']);
                } else {
                    $this->db->or_like($item, $_POST['search']['value']);
                }
                if(count($this->column_search_msgs ) - 1 == $i) //last loop
                    $this->db->group_end(); //close bracket
            }
            $i++;
        }

        if(isset($_POST['order'])) { // here order processing
            $this->db->order_by($this->column_order_msgs [$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
        }  else if(isset($this->order_msgs )) {
            $order = $this->order_msgs ;
            $this->db->order_by(key($order), $order[key($order)]);
        }
    }
    function get_datatables_msgs($status=null) {
        $this->_get_datatables_query_msgs($status);
        if(@$_POST['length'] != -1)
            $this->db->limit(@$_POST['length'], @$_POST['start']);
        $query = $this->db->get();
        return $query->result();
    }
    function count_filtered_msgs($status=null) {
        $this->_get_datatables_query_msgs($status);
        $query = $this->db->get();
        return $query->num_rows();
    }
    function count_all_msgs($status=null) {

        $this->db->from('tbl_messages');
        if ($status != null) {
            $this->db->where('act_ended', $status);
        }
        return $this->db->count_all_results();
    }




    public function make_read($msg_id){

        $params['act_ended_date']  = date('Y-m-d');
        $params['act_ended_time']  = date('h:i A');
        $params['act_ended_emp_id']  = $this->get_emp_id_edit_one($this->session->userdata('userid'));
        $params['act_ended'] = 'read';



        $this->db->where('msg_id',$msg_id);
        $this->db->update('tbl_messages',$params);
    }

    public function get_emp_id_edit_one($user_id)
    {
        $this->db->where('user_id', $user_id);
        $query = $this->db->get('users');
        if ($query->num_rows() > 0) {
            if($_SESSION['level'] == 1){
                return $query->row()->user_id;
            }else{
                return $query->row()->agent_brok_fk;
            }


        } else {
            return 0;
        }
    }


    public function delete_msgs($msg_id)
    {
        $this->db->where('msg_id',$msg_id);
        $this->db->delete('tbl_messages');
    }


    public function get_msg_details($msg_id)
    {
        $this->db->select('tbl_messages.*');
        $this->db->from('tbl_messages');

        $this->db->where('msg_id', $msg_id);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            $a = 0;
            foreach ($query->result() as $row) {
                $arr[$a] = $row;
                $a++;
            }
            return$arr;
        } else {
            return false;
        }
    }


    public function count_all_new_msgs($act_type = null)
    {
        $this->db->select('*');
        $this->db->from('tbl_messages');
        if ($act_type != null) {
            $this->db->where('act_ended', $act_type);
        }
        $query=$this->db->get();
        return $query;
    }

    public function add_contact(){
        $data['msg_title']= $this->input->post('name') ;
        $data['email']= $this->input->post('email') ;
        $data['user_phone']= $this->input->post('phone') ;
        $data['msg_content']= $this->input->post('message') ;

        $data['msg_time']  = time();
        $data['msg_date']  = date('Y-m-d');

        $this->db->insert('tbl_messages',$data);
        return $this->db->insert_id();
    }

}