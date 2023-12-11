<?php
class Banners_m extends CI_Model
{


    var $column_order_groups = array(null); //set column field database for datatable orderable
    var $column_search_groups = array( ); //set column field database for datatable searchable
    var $order_groups = array('banners.banner_id' => 'desc');
    private function _get_datatables_query_banners()
    {
        $this->db->select('banners.*');
        $this->db->from('tbl_banners as banners');

        $i = 0;
        foreach ($this->column_search_groups as $item) {
            if (@$_POST['search']['value']) {
                if ($i === 0) { // first loop
                    $this->db->group_start();
                    $this->db->like($item, $_POST['search']['value']);
                } else {
                    $this->db->or_like($item, $_POST['search']['value']);
                }
                if (count($this->column_search_groups) - 1 == $i)
                    $this->db->group_end();
            }
            $i++;
        }
        if (isset($_POST['order'])) {
            $this->db->order_by($this->column_order_groups [$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
        } else if (isset($this->order_groups)) {
            $order = $this->order_groups;
            $this->db->order_by(key($order), $order[key($order)]);
        }
    }
    function get_datatables_banners()
    {
        $this->_get_datatables_query_banners();
        if (@$_POST['length'] != -1)
            $this->db->limit(@$_POST['length'], @$_POST['start']);
        $query = $this->db->get();
        return $query->result();
    }
    function count_filtered_banners()
    {
        $this->_get_datatables_query_banners();
        $query = $this->db->get();
        return $query->num_rows();
    }
    function count_all_banners()
    {
        $this->db->select('banners.*');
        $this->db->from('tbl_banners as banners');

        return $this->db->count_all_results();
    }

    /*************************************************************************/
    public function get($id = null)
    {
        $this->db->select('tbl_banners.* , users.name as publisher_name ');
        $this->db->from('tbl_banners');
        $this->db->join('users','users.user_id = tbl_banners.user_id');
        if ($id != null) {
            $this->db->where('banner_id', $id);
        }
        $this->db->order_by('banner_id','desc');
        $query = $this->db->get();
        return $query;
    }
    public function add_banners($post,$image='')
    {
        $params = [
            'user_id' => $_SESSION['userid'],
            'image' => $image,

            'description' => $post['description'],
            'description_en' => $post['description_en'],
            'created' => date('Y-m-d H:i:s')
        ];
        $this->db->insert('tbl_banners', $params);

    }
    public function edit_banners($post,$image='')
    {
        $params = [
            'description' => $post['description'],
            'description_en' => $post['description_en'],
            'updated' => date('Y-m-d H:i:s')
        ];
        if(!empty($image)) {
            $params['image'] = $image;
        }
        $this->db->where('banner_id',$post['banner_id']);
        $this->db->update('tbl_banners',$params);
    }
    
    public function delete_banner($banner_id)
    {
        $item = $this->get($banner_id)->row();
        if($item->image != null){
            $target_file = './uploads/banners/'.$item->image ;
            unlink($target_file);
        }

        $this->db->where('banner_id',$banner_id);
        $this->db->delete('tbl_banners');
    }
   

}
?>