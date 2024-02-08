<?phpclass Web_m extends CI_Model{    public function get_about_us($id = null)    {        $this->db->select('tbl_about_us.*');        $this->db->from('tbl_about_us');        if ($id != null) {            $this->db->where('id', $id);        }        $this->db->order_by('id','desc');        $query = $this->db->get();        return $query->result();    }    public function get_projects($id = null,$limit =null)    {        $this->db->select('tbl_projects.*');        $this->db->from('tbl_projects');        if ($id != null) {            $this->db->where('id', $id);        }        $this->db->order_by('id','desc');        if($limit !=''){            $this->db->limit($limit);        }        $query = $this->db->get();        return $query->result();    }    public function get_jobs($id = null,$limit =null)    {        $this->db->select('tbl_web_jobs.*');        $this->db->from('tbl_web_jobs');        if ($id != null) {            $this->db->where('id', $id);        }        $this->db->order_by('id','desc');        if($limit !=''){            $this->db->limit($limit);        }        $query = $this->db->get();        return $query->result();    }    public function get_blogs($id = null,$limit=null)    {        $this->db->select('tbl_news.*');        $this->db->from('tbl_news');        if ($id != null) {            $this->db->where('id', $id);        }        $this->db->order_by('id','desc');        if($limit !=''){            $this->db->limit($limit);        }        $query = $this->db->get();        return $query->result();    }    public function get_team($id = null)    {        $this->db->select('tbl_team.*');        $this->db->from('tbl_team');        if ($id != null) {            $this->db->where('id', $id);        }        $this->db->order_by('order_num','ASC');        $query = $this->db->get();        return $query->result();    }    public function get_video($id = null)    {        $this->db->select('tbl_video.*');        $this->db->from('tbl_video');        if ($id != null) {            $this->db->where('id', $id);        }        $this->db->order_by('id','desc');        $query = $this->db->get();        return $query->row_array();    }}?>