<?php
class Register_m extends CI_Model
{


    /***************************************************************************************/

    var $column_order_msgs = array(null,null,'f_name','l_name', 'phone','email','nationality'); //set column field database for datatable orderable
    var $column_search_msgs  = array('f_name','l_name', 'phone','email','nationality'); //set column field database for datatable searchable
    var $order_msgs  = array('id' => 'desc'); // default order

    private function _get_datatables_query_msgs($status=null) {

        $this->db->select('tbl_register.*');
        $this->db->from('tbl_register');
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

        $this->db->from('tbl_register');
        if ($status != null) {
            $this->db->where('act_ended', $status);
        }
        return $this->db->count_all_results();
    }





    public function delete_msgs($msg_id)
    {
        $this->db->where('id',$msg_id);
        $this->db->delete('tbl_register');
    }


    public function add(){
        $data['f_name']= $this->input->post('f_name') ;
        $data['l_name']= $this->input->post('l_name') ;
        $data['email']= $this->input->post('email') ;
        $data['phone']= $this->input->post('phone') ;
        $data['nationality']= $this->input->post('nationality') ;

        $data['msg_time']  = time();
        $data['msg_date']  = date('Y-m-d');

        $this->db->insert('tbl_register',$data);
        return $this->db->insert_id();
    }

}