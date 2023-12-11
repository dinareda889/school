<?php
class Vendors_m extends CI_Model
{
  
  
    var $column_order_vendors = array(null,'vendor_name', 'email', 'mob', 'city_name','sub_cat'); //set column field database for datatable orderable
    var $column_search_vendors  = array('vendor_name', 'email','mob','city_name','main_cat'); //set column field database for datatable searchable
    var $order_vendors  = array('vendor_id' => 'desc'); // default order

    private function _get_datatables_query_vendors() {
     
      $this->db->select('tbl_vendors.* ,first_tbl.category_name as main_category_name ,
      second_tbl.category_name as sub_category_name,tbl_city.city_name
          
        ');
        $this->db->from('tbl_vendors');
        $this->db->join('tbl_category_service first_tbl', 'first_tbl.category_id=tbl_vendors.main_cat', 'LEFT');
        $this->db->join('tbl_category_service second_tbl', 'second_tbl.category_id=tbl_vendors.sub_cat', 'LEFT');
        $this->db->join('tbl_city', 'tbl_city.city_id=tbl_vendors.city_id_fk', 'LEFT');
        $i = 0;
        foreach ($this->column_search_vendors  as $item) { // loop column
            if(@$_POST['search']['value']) { // if datatable send POST for search
                if($i===0) { // first loop
                    $this->db->group_start(); // open bracket. query Where with OR clause better with bracket. because maybe can combine with other WHERE with AND.
                    $this->db->like($item, $_POST['search']['value']);
                } else {
                    $this->db->or_like($item, $_POST['search']['value']);
                }
                if(count($this->column_search_vendors ) - 1 == $i) //last loop
                    $this->db->group_end(); //close bracket
            }
            $i++;
        }

        if(isset($_POST['order'])) { // here order processing
            $this->db->order_by($this->column_order_vendors [$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
        }  else if(isset($this->order_vendors )) {
            $order = $this->order_vendors ;
            $this->db->order_by(key($order), $order[key($order)]);
        }
    }
    function get_datatables_vendors() {
        $this->_get_datatables_query_vendors();
        if(@$_POST['length'] != -1)
            $this->db->limit(@$_POST['length'], @$_POST['start']);
        $query = $this->db->get();
        return $query->result();
    }
    function count_filtered_vendors() {
        $this->_get_datatables_query_vendors();
        $query = $this->db->get();
        return $query->num_rows();
    }
    function count_all_vendors() {
      
        $this->db->from('tbl_vendors'); 
        return $this->db->count_all_results();
    }


/**************************************************************/

   public function edit_vendor ($post){ 
        

$params['vendor_name'] = $post['vendor_name'];
$params['email'] =$post['email'];
$params['mob'] =$post['mob'];
//$params['main_cat'] = $post['main_cat'];
//$params['sub_cat'] = $post['sub_cat'];
$params['start_hour'] = $post['start_hour'];
$params['end_hour'] = $post['end_hour'];
$params['city_id_fk'] = $post['city_id_fk'];

$params['updated'] =date('Y-m-d H:i:s');
$params['details'] = empty($post['details']) ? null : $post['details'];
//$params['promoted'] = empty($post['promoted']) ? 0 : $post['promoted'];
//$params['hotdeals'] = empty($post['hotdeals']) ? 0 : $post['hotdeals'];

$params['saturday'] = empty($post['saturday']) ? 0 : $post['saturday'];
$params['sunday'] = empty($post['sunday']) ? 0 : $post['sunday'];
$params['monday'] = empty($post['monday']) ? 0 : $post['monday'];
$params['tuesday'] = empty($post['tuesday']) ? 0 : $post['tuesday'];
$params['wednesday'] = empty($post['wednesday']) ? 0 : $post['wednesday'];
$params['thursday'] = empty($post['thursday']) ? 0 : $post['thursday'];
$params['friday'] = empty($post['friday']) ? 0 : $post['friday'];
 if($post['image'] != null) {
            $params['image'] = $post['image'];
        }
    
          $this->db->where('vendor_id',$post['vendor_id']);
        $this->db->update('tbl_vendors',$params);
  
    }
      public function add_vendor($post){
        $params = [
            'vendor_name'       =>$post['vendor_name'],
            'email'       =>$post['email'],
            'mob'       =>$post['mob'],
          //  'main_cat'       =>$post['main_cat'],
          //  'sub_cat'       =>$post['sub_cat'],
            'start_hour'       =>$post['start_hour'],
            'end_hour'       =>$post['end_hour'],
            'city_id_fk'       =>$post['city_id_fk'],
                  'image'       =>$post['image'],
  'details'=>empty($post['details']) ? null : $post['details'],
   // 'promoted'=>empty($post['promoted']) ? 0 : $post['promoted'],
   // 'hotdeals'=>empty($post['hotdeals']) ? 0 : $post['hotdeals'],
    'saturday'=>empty($post['saturday']) ? 0 : $post['saturday'],
    'sunday'=>empty($post['sunday']) ? 0 : $post['sunday'],
    'monday'=>empty($post['monday']) ? 0 : $post['monday'],
    'tuesday'=>empty($post['tuesday']) ? 0 : $post['tuesday'],
    'wednesday'=>empty($post['wednesday']) ? 0 : $post['wednesday'],
    'thursday'=>empty($post['thursday']) ? 0 : $post['thursday'],
    'friday'=>empty($post['friday']) ? 0 : $post['friday']
    
        ];
        $this->db->insert('tbl_vendors',$params);
    }

       public function get($id = null)
    {
        $this->db->select('tbl_vendors.*');
        $this->db->from('tbl_vendors');
     
        if ($id != null) {
            $this->db->where('vendor_id', $id);
        }
        $this->db->order_by('vendor_id','desc');
        $query = $this->db->get();
        return $query;
    }
      public function get_category_service($id = null,$type=null)
    {
        $this->db->select('*');
        $this->db->from('tbl_category_service');

        if ($id != null) {
            $this->db->where('category_id', $id);
        }
        if ($type != null) {
            $this->db->where('ttype', $type);
        }
        $this->db->order_by('category_id','asc');
        $query = $this->db->get();
        return $query;
    }

        
        public function delete_vendor($vendor_id)
    {
        $this->db->where('vendor_id',$vendor_id);
        $this->db->delete('tbl_vendors');
    }

    
  }