<?php

class Photos_web_m extends CI_Model
{
    var $column_order_row = array(null, 'date', 'title', 'title_en'); //set column field database for datatable orderable
    var $column_search_row = array('date', 'title', 'title_en');//set column field database for datatable searchable
    var $order_row = array('date' => 'asc'); // default order ,'driver_id' => 'desc'



    private function _get_datatables_query_photos() {
        $this->db->select('tbl_web_photos.*');
        $this->db->from('tbl_web_photos');
        $i = 0;
        foreach ($this->column_search_row  as $item) { // loop column
            if(@$_POST['search']['value']) { // if datatable send POST for search
                if($i===0) { // first loop
                    $this->db->group_start(); // open bracket. query Where with OR clause better with bracket. because maybe can combine with other WHERE with AND.
                    //if($_POST['search']['value'] == 'ذكر' || $_POST['search']['value'] == 'انثي'){ $this->db->like($item, $gender_array[$_POST['search']['value'] ]);}
                    //if($_POST['search']['value'] == 'عام' || $_POST['search']['value'] == 'ازهر'){ $this->db->like($item, $ta3lem_array[$_POST['search']['value'] ]);}
                    $this->db->like($item, $_POST['search']['value']);
                } else {
                    //if($_POST['search']['value'] == 'ذكر' || $_POST['search']['value'] == 'انثي'){ $this->db->or_like($item, $gender_array[$_POST['search']['value'] ]);}
                    //if($_POST['search']['value'] == 'عام' || $_POST['search']['value'] == 'ازهري'){ $this->db->or_like($item, $ta3lem_array[$_POST['search']['value'] ]);}
                    $this->db->or_like($item, $_POST['search']['value']);
                }
                if(count($this->column_search_row ) - 1 == $i) //last loop
                    $this->db->group_end(); //close bracket
            }
            $i++;
        }
        if (isset($_POST['order'])) { // here order processing
            $this->db->order_by($this->column_order_row [$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
        } else if (isset($this->order_row)) {
            foreach ($this->order_row  as $key=>$value) {
                //$order = $this->order_drivers;
                $this->db->order_by($key, $value);
            }
        }
    }
    function get_datatables_photos() {
        $this->_get_datatables_query_photos();
        if(@$_POST['length'] != -1)
            $this->db->limit(@$_POST['length'], @$_POST['start']);
        $query = $this->db->get();
        return $query->result();
    }
    function count_filtered_photos() {
        $this->_get_datatables_query_photos();
        $query = $this->db->get();
        return $query->num_rows();
    }
    function count_all_photos() {
        $this->db->select('tbl_web_photos.*');
        $this->db->from('tbl_web_photos');
        return $this->db->count_all_results();
    }

    public function get($photos_id = null)
    {
        $this->db->select('tbl_web_photos.*');
        $this->db->from('tbl_web_photos');
        if ($photos_id != null) {
            $this->db->where('id', $photos_id);
        }
        $this->db->order_by('id','desc');
        $query = $this->db->get();
        return $query;
    }
    function slug($string, $spaceRepl = "/")
    {
        $string = str_replace("&", "and", $string);

        $string = preg_replace("/[^a-zA-Z0-9 _-]/", "", $string);

        $string = strtolower($string);

        $string = preg_replace("/[ ]+/", " ", $string);

        $string = str_replace(" ", $spaceRepl, $string);

        return $string;
    }
    /**************************************************************/
    function create_unique_slug_ar($string,$table='tbl_web_photos',$field='slug_title',$key=NULL,$value=NULL)
    {
        $t =& get_instance();
        $slug = url_title($string);
        $slug = strtolower($slug);
        $i = 0;
        $params = array ();
        $params[$field] = $slug;

        if($key)$params["$key !="] = $value;

        while ($t->db->where($params)->get($table)->num_rows())
        {
            if (!preg_match ('/-{1}[0-9]+$/', $slug ))
                $slug .= '-' . ++$i;
            else
                $slug = preg_replace ('/[0-9]+$/', ++$i, $slug );

            $params [$field] = $slug;
        }
        return $slug;
    }

    function edit_unique_slug_ar($string,$property_id,$key=NULL,$value=NULL)
    {
        $t =& get_instance();
        $slug = url_title($string);
        $slug = strtolower($slug);
        $i = 0;
        $params = array ();
        $params['slug_title'] = $slug;

        if($key)$params["$key !="] = $value;

        while ($t->db->where($params)->where('id !=',$property_id)->get('tbl_web_photos')->num_rows())
        {
            if (!preg_match ('/-{1}[0-9]+$/', $slug ))
                $slug .= '-' . ++$i;
            else
                $slug = preg_replace ('/[0-9]+$/', ++$i, $slug );

            $params ['slug_title'] = $slug;
        }
        return $slug;
    }

    /**************************************************************/
    public function add_photos($main_image){
        $data['date']= strtotime($this->input->post('date'));
        $data['date_ar'] = $this->input->post('date');
        $data['title']=$this->input->post('title');
        $data['title_en']=$this->input->post('title_en');
        $data["main_image"] =$main_image;

        $data['details'] = $this->input->post('details');
        $data['details_en'] = $this->input->post('details_en');
        $data['slug_title'] =$this->create_unique_slug_ar($this->input->post('title'));
        $data['slug_title_en'] =$this->create_unique_slug_ar($this->input->post('title_en'));

        $data['publisher']=$_SESSION['user_name'];

        $this->db->insert('tbl_web_photos',$data);
        return $this->db->insert_id();
    }
    public function insert_photo($all_img,$id){
        foreach ($all_img as  $value) {
            if (!empty($value)) {
                $data["images_name"] =$value;
                $data['photos_id_fk']=$id;
                $this->db->insert("tbl_web_photos_images", $data);
            }
        }

    }
    public function edit_photos($main_image = '',$id =''){
        $data['date']= strtotime($this->input->post('date'));
        $data['date_ar'] = $this->input->post('date');
        $data['title']=$this->input->post('title');
        $data['title_en']=$this->input->post('title_en');

        if(!empty($main_image)){
            $data["main_image"] =$main_image;
        }

        $data['details'] = $this->input->post('details');
        $data['details_en'] = $this->input->post('details_en');
        $data['slug_title'] =$this->edit_unique_slug_ar($this->input->post('title'),$id);
        $data['slug_title_en'] =$this->edit_unique_slug_ar($this->input->post('title_en'),$id);


        $this->db->where('id',$id);
        $this->db->update('tbl_web_photos',$data);
    }
    public function delete($id)
    {

        $this->delete_images($id);

        /*****************************************************************/

        $main_image= $this->get($id)->row()->main_image;
        if(!empty($main_image)) {
            if (file_exists("uploads/web/photos/" . $main_image)) {
                $image = ("uploads/web/photos/" . $main_image);
                unlink($image);
            }
            if (file_exists("uploads/web/photos/". '/thumbs/' . $main_image)) {
                $image = ("uploads/web/photos/" . '/thumbs/' .$main_image);
                unlink($image);
            }
        }
        $this->db->where('id', $id);
        $this->db->delete('tbl_web_photos');
    }
    public function delete_images($id){

        $images= $this->get_photos($id);

        if(!empty($images)) {
            foreach ($images as $row) {
                if (file_exists("uploads/web/photos/" . $row->images_name)) {
                    $image = ("uploads/web/photos/" . $row->images_name);
                    unlink($image);
                }
                if (file_exists("uploads/web/photos/" . '/thumbs/' . $row->images_name)) {
                    $image = ("uploads/web/photos/" . '/thumbs/' . $row->images_name);
                    unlink($image);
                }
            }
        }
        $this->db->where('photos_id_fk',$id);
        $this->db->delete('tbl_web_photos_images');

    }

    public function delete_image($images_id){

        $image= $this->get_photo($images_id);

        if(!empty($image)) {
            if (file_exists("uploads/web/photos/" . $image->images_name)) {
                $imagee = ("uploads/web/photos/" . $image->images_name);
                unlink($imagee);
            }
            if (file_exists("uploads/web/photos/". '/thumbs/' . $image->images_name)) {
                $imagee = ("uploads/web/photos/" . '/thumbs/' . $image->images_name);
                unlink($imagee);
            }
        }
        $this->db->where('images_id',$images_id);
        $this->db->delete('tbl_web_photos_images');

    }

    public function get_photo($images_id){
        $this->db->select('*');
        $this->db->from('tbl_web_photos_images');
        $this->db->where('images_id',$images_id);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->row();
        }
        return false;
    }
    public function get_photos($id){
        $this->db->select('*');
        $this->db->from('tbl_web_photos_images');
        $this->db->where('photos_id_fk',$id);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->result();
        }
        return false;
    }
}