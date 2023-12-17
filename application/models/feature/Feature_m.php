<?php
class Feature_m extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }
    public function insert()
    {

        /*echo "<pre>";
        print_r($_POST);
        echo "</pre>";
        die;*/
        $data['description_ar'] = $this->input->post('description_ar', true);
        $data['description_en'] = $this->input->post('description_en', true);
        $data['title_ar'] = $this->input->post('title_ar', true);  
        $data['title_en'] = $this->input->post('title_en', true);
        $data['icon'] = $this->input->post('icon', true);
        $data['date_ar'] = date("Y-m-d");
        $data['date'] = strtotime(date("Y-m-d"));
        $data['publisher'] = $_SESSION['user_id'];
        $data['publisher_name'] = $_SESSION['user_name'];
      

        $this->db->insert('feature', $data);
    }

    public function fetch_feature()
    {
        $this->db->select('*');
        $this->db->from('feature');
        $this->db->order_by('id', 'DESC');
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            $i = 0;
            foreach ($query->result() as $row) {
                $data[$i] = $row;
                $i++;
            }
            return $data;
        }
        return false;
    }

    public function delete($id)
    {
        
        $this->db->where('id', $id);
        $this->db->delete('feature');
    }

    public function get_by_id($id)
    {
        $this->db->where('id', $id);
        $query = $this->db->get_where("feature", array('id' => $id));
        if ($query->num_rows() > 0) {
            return $query->row();
        } else {
            return false;
        }
    }

    public function update($id)
    {
        $data['title_ar'] = $this->input->post('title_ar', true);  
        $data['title_en'] = $this->input->post('title_en', true);
        $data['description_ar'] = $this->input->post('description_ar', true);
        $data['description_en'] = $this->input->post('description_en', true);
        $data['icon'] = $this->input->post('icon', true);
        $data['date_ar'] = date("Y-m-d");
        $data['date'] = strtotime(date("Y-m-d"));
        $data['publisher'] = $_SESSION['user_id'];
        $data['publisher_name'] = $_SESSION['user_name'];
        $this->db->where('id', $id);
        $this->db->update('feature', $data);
    }
} // END CLASS