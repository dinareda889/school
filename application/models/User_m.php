<?php

class User_m extends CI_Model
{

    public function login($post)
    {

        $this->db->select('*');
        $this->db->from('users');
        $this->db->where('username', $post['username']);
        $this->db->where('password', sha1($post['password']));
        
        $query = $this->db->get();
        return $query;
    }


    public function get($id = null)
    {
        $this->db->select('*');
        $this->db->from('users');
        if ($id != null) {
            $this->db->where('user_id', $id);
        }
        $query = $this->db->get();
        return $query;
    }

    public function get_app($id = null)
    {
        $this->db->select('*');
        $this->db->from('api_users');
        if ($id != null) {
            $this->db->where('user_id', $id);
        }
        $query = $this->db->get();
        return $query;
    }

    public function edit_app($post)
    {

        $params['user_name'] = $post['username'];


        if ($post['image'] != null) {
            $params['m_image'] = $post['image'];
        }
        $params['user_email'] = $post['email'];
        if (!empty($post['password'])) {
            $params['user_pass'] = ($post['password']);
        }
        $params['user_phone'] = ($post['phone']);
        $this->db->where('user_id', $post['user_id']);
        $this->db->update('api_users', $params);

    }

    public function add_app($post)
    {

        //  $params['name']     = $post['fullname'];
        $params['user_name'] = $post['username'];
        //$params['user_pass'] = sha1($post['password']);
        $params['m_image'] = $post['image'];
        $params['user_email'] = $post['email'];
        $params['user_pass'] = ($post['password']);

        $params['user_phone'] = ($post['user_phone']);
        $this->db->insert('api_users', $params);

        $insert_id = $this->db->insert_id();
        // $this->send_mail_reg($data_insert['user_email'],$randomDigits);

        $all = $this->getAllpromocode();
        if (isset($all) and $all != null) {
            foreach ($all as $val) {
                $users['promo_id_fk'] = $val->promo_id;
                $users['user_id_fk'] = $insert_id;
                $this->db->insert('tbl_promo_code_users', $users);
            }
        }
    }

    public function getAllpromocode()
    {
        $this->db->select('*');
        $this->db->from("tbl_promo_code");

        $this->db->where('tbl_promo_code.to_date_s>=', strtotime("now"));

        $this->db->order_by("promo_id", "desc");
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            $data = array();
            $i = 0;
            foreach ($query->result() as $row) {
                $data[$i] = $row;

            }
            return $query->result();
        }
        return false;

    }

    public function add($post)
    {
        $params['name'] = $post['fullname'];
        $params['username'] = $post['username'];
        $params['password'] = sha1($post['password']);
        $params['image'] = $post['image'];
        $params['email'] = $post['email'];
        $params['x_y_z'] = ($post['password']);
        $params['level'] = 1;

        $this->db->insert('users', $params);


    }

    public function edit($post)
    {
        $params['name'] = $post['fullname'];
        $params['username'] = $post['username'];
        $params['email'] = $post['email'];
        if (!empty($post['password'])) {
            $params['password'] = sha1($post['password']);
        }

        if ($post['image'] != null) {
            $params['image'] = $post['image'];
        }
        $params['x_y_z'] = ($post['password']);
        //  $params['address']  = $post['address'] != "" ? $post['address'] :null ;
        //    $params['level']    = $post['level'];
        $this->db->where('user_id', $post['user_id']);
        $this->db->update('users', $params);

    }

    public function delete_user($user_id)
    {

        $this->db->where('user_id', $user_id);
        $this->db->delete('users');


    }

    /*************************/

    var $column_order = array(null, 'user_name', 'user_email', 'user_phone'); //set column field database for datatable orderable
    var $column_search_no = array('user_name', 'user_email', 'user_phone'); //set column field database for datatable searchable
    var $order_orders_no = array('user_id' => 'desc'); // default order

    private function _get_datatables_query_orders($act_type)
    {

        $this->db->select('api_users.*');
        $this->db->from('api_users');
        if ($act_type != null) {
            // $this->db->where("api_users.status", $act_type);
        }
        $this->db->where("api_users.status", $act_type);
        $i = 0;
        foreach ($this->column_search_no as $item) { // loop column
            if (@$_POST['search']['value']) { // if datatable send POST for search
                if ($i === 0) { // first loop
                    $this->db->group_start(); // open bracket. query Where with OR clause better with bracket. because maybe can combine with other WHERE with AND.
                    $this->db->like($item, $_POST['search']['value']);
                } else {
                    $this->db->or_like($item, $_POST['search']['value']);
                }
                if (count($this->column_search_no) - 1 == $i) //last loop
                    $this->db->group_end(); //close bracket
            }
            $i++;
        }

        if (isset($_POST['order'])) { // here order processing
            $this->db->order_by($this->column_order [$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
        } else if (isset($this->order_orders_no)) {
            $order = $this->order_orders_no;
            $this->db->order_by(key($order), $order[key($order)]);
        }
    }

    function get_datatables_orders($act_type)
    {
        $this->_get_datatables_query_orders($act_type);
        if (@$_POST['length'] != -1)
            $this->db->limit(@$_POST['length'], @$_POST['start']);
        $query = $this->db->get();
        return $query->result();
    }

    function count_filtered_orders($act_type)
    {
        $this->_get_datatables_query_orders($act_type);
        $query = $this->db->get();
        return $query->num_rows();
    }

    function count_all_orders($act_type = null)
    {
        if ($act_type != null) {
            $this->db->where('status', $act_type);
        }
        $this->db->from('api_users');
        return $this->db->count_all_results();
    }


    public function count_all_api_users($act_type = null)
    {
        $this->db->select('*');
        $this->db->from('api_users');
        if ($act_type != null) {
            $this->db->where('status', $act_type);
        }
        $query = $this->db->get();
        return $query;
    }


    public function delete_web_user($user_id)
    {
        $this->db->where('user_id', $user_id);
        $this->db->delete('api_users');
    }

    public function make_active($user_id)
    {

        $params['status'] = 1;

        $this->db->where('user_id', $user_id);
        $this->db->update('api_users', $params);

    }

    public function make_dis_active($user_id)
    {

        $params['status'] = 0;

        $this->db->where('user_id', $user_id);
        $this->db->update('api_users', $params);

    }


    public function delete_app_user($user_id)
    {
        $this->db->where('user_id', $user_id);
        $this->db->delete('api_users');


        $this->db->where('user_id_fk', $user_id);
        $this->db->delete('tbl_promo_code_users');


    }

    public function check_data($where_arr)
    {
        $this->db->where($where_arr);
        $query = $this->db->get('api_users');
        return $query->num_rows();
    }

    function add_user($post){

        $params['user_name'] = $post['username'];
        $params['user_phone'] = ($post['user_phone']);
        $params['status'] = 1;
        $this->db->insert('api_users', $params);

       return $insert_id = $this->db->insert_id();
    }

}

?>
