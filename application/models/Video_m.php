<?php
class Video_m extends CI_Model
{
    var $column_order_groups = array(null, 'company_stats.image', 'company_stats.date_ar', 'company_stats.title', 'company_stats.title_en','company_stats.link'); //set column field database for datatable orderable
    var $column_search_groups = array('company_stats.image', 'company_stats.date_ar', 'company_stats.title', 'company_stats.title_en','company_stats.link'); //set column field database for datatable searchable
    var $order_groups = array('company_stats.id' => 'desc');
    private function _get_datatables_query_company_stats()
    {
        $this->db->select('company_stats.*');
        $this->db->from('tbl_video as company_stats');
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
    function get_datatables_company_stats()
    {
        $this->_get_datatables_query_company_stats();
        if (@$_POST['length'] != -1)
            $this->db->limit(@$_POST['length'], @$_POST['start']);
        $query = $this->db->get();
        return $query->result();
    }
    function count_filtered_company_stats()
    {
        $this->_get_datatables_query_company_stats();
        $query = $this->db->get();
        return $query->num_rows();
    }
    function count_all_company_stats()
    {
        $this->db->select('company_stats.*');
        $this->db->from('tbl_video as company_stats');
        return $this->db->count_all_results();
    }
    /*************************************************************************/
    public function get($id = null)
    {
        $this->db->select('tbl_video.*');
        $this->db->from('tbl_video');
        if ($id != null) {
            $this->db->where('id', $id);
        }
        $this->db->order_by('id', 'desc');
        $query = $this->db->get();
        return $query;
    }
    public function add_company_stats($post,$video_link,$image = '')
    {
        $params =[
            'image' => $image,
            'date' => strtotime($post['date']),
            'date_ar' => $post['date'],
            'title' => $post['title'],
            'title_en' => $post['title_en']
        ];
        $link =  $post['link'];
        $video_id = explode("?v=", $link); // For videos like http://www.youtube.com/watch?v=...
        if (empty($video_id[1]))
            $video_id = explode("/v/", $link); // For videos like http://www.youtube.com/watch/v/..

        $video_id = explode("&", $video_id[1]); // Deleting any other params
        $video_id = $video_id[0];
        $params['video_link'] = $video_id;
        $this->db->insert('tbl_video', $params);
    }
    public function edit_company_stats($post,$video_link,$image = '')
    {
        $params = [
            'date' => strtotime($post['date']),
            'date_ar' => $post['date'],
              'title' => $post['title'],
            'title_en' => $post['title_en']
        ];
        $link =  $post['link'];
        if(!empty($post['link'])){


            $video_id = explode("?v=", $link); // For videos like http://www.youtube.com/watch?v=...
            if (empty($video_id[1]))
                $video_id = explode("/v/", $link); // For videos like http://www.youtube.com/watch/v/..

            $video_id = explode("&", $video_id[1]); // Deleting any other params
            $video_id = $video_id[0];


            $params['link_id'] = $video_id;
        }else{
            $params['video_link'] = $post['link'];
        }
        if (!empty($image)) {
            $params['image'] = $image;
        }
        $this->db->where('id', $post['id']);
        $this->db->update('tbl_video', $params);
    }
    public function delete_company_stats($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('tbl_video');
    }
    public function listing()
    {
        $this->db->select('tbl_video.*');
        $this->db->from('tbl_video');
        $this->db->order_by('id', 'desc');
        $query = $this->db->get();
        return $query->row();
    }


    public function get_count($where_arr)
    {
        if (!empty($where_arr)) {
            $this->db->where($where_arr);
        }
        return $this->db->get("tbl_video")->num_rows();
    }
    function get_all($where_arr = null, $limit = null, $start = 0)
    {
        $this->db->select('tbl_video.*')->from('tbl_video');
        if (!empty($where_arr)) {
            $this->db->where($where_arr);
        }

        if (!empty($limit)) {
            $this->db->limit($limit, $start);
        }
        $data = $this->db->order_by('id', 'DESC')->get()->result();

        /*        print_r($this->db->last_query());*/
        /*if (!empty($data)) {
            foreach ($data as $key => $event) {

                $data[$key]->imgs = get_by('tbl_web_photos_images', array('photos_id_fk' => $event->id), 1);

            }
        }*/
        return $data;
    }
}
?>