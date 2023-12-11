<?php
class Jobs_m extends CI_Model
{
    var $column_order_jobs = array(null, 'tbl_web_jobs.date_ar', 'tbl_web_jobs.title', 'tbl_web_jobs.title_en', 'tbl_web_jobs.title_ru'); //set column field database for datatable orderable
    var $column_search_jobs = array('tbl_web_jobs.date_ar', 'tbl_web_jobs.title', 'tbl_web_jobs.title_en', 'tbl_web_jobs.title_ru'); //set column field database for datatable searchable
    var $order_jobs = array('tbl_web_jobs.id' => 'desc');
    private function _get_datatables_query_jobs()
    {
        $this->db->select('tbl_web_jobs.*');
        $this->db->from('tbl_web_jobs');

        $i = 0;
        foreach ($this->column_search_jobs as $item) {
            if (@$_POST['search']['value']) {
                if ($i === 0) { // first loop
                    $this->db->group_start();
                    $this->db->like($item, $_POST['search']['value']);
                } else {
                    $this->db->or_like($item, $_POST['search']['value']);
                }
                if (count($this->column_search_jobs) - 1 == $i)
                    $this->db->group_end();
            }
            $i++;
        }
        if (isset($_POST['order'])) {
            $this->db->order_by($this->column_order_jobs [$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
        } else if (isset($this->order_jobs)) {
            $order = $this->order_jobs;
            $this->db->order_by(key($order), $order[key($order)]);
        }
    }
    function get_datatables_jobs()
    {
        $this->_get_datatables_query_jobs();
        if (@$_POST['length'] != -1)
            $this->db->limit(@$_POST['length'], @$_POST['start']);
        $query = $this->db->get();
        return $query->result();
    }
    function count_filtered_jobs()
    {
        $this->_get_datatables_query_jobs();
        $query = $this->db->get();
        return $query->num_rows();
    }
    function count_all_jobs()
    {
        $this->db->from('tbl_web_jobs');
        return $this->db->count_all_results();
    }
    /**************************************************************/
    public function add_jobs($post)
    {
        $params = [
            'date_ar' => $post['date'],
            'date' => strtotime($post['date']),
            'title' => $post['title'],
            'title_en' => $post['title_en'],
            'title_ru' => $post['title_ru'],
            'details' => $post['details'],
            'details_en' => $post['details_en'],
            'details_ru' => $post['details_ru'],
            'responsibilities' => $post['responsibilities'],
            'responsibilities_en' => $post['responsibilities_en'],
            'responsibilities_ru' => $post['responsibilities_ru'],
            'education_experience' => $post['education_experience'],
            'education_experience_en' => $post['education_experience_en'],
            'education_experience_ru' => $post['education_experience_ru'],
            'skills' => $post['skills'],
            'skills_en' => $post['skills_en'],
            'skills_ru' => $post['skills_ru']
        ];

        $this->db->insert('tbl_web_jobs', $params);
    }
    public function edit_jobs($post)
    {
        $params = [
            'title' => $post['title'],
            'title_en' => $post['title_en'],
            'title_ru' => $post['title_ru'],
            'details' => $post['details'],
            'details_en' => $post['details_en'],
            'details_ru' => $post['details_ru'],
            'responsibilities' => $post['responsibilities'],
            'responsibilities_en' => $post['responsibilities_en'],
            'responsibilities_ru' => $post['responsibilities_ru'],
            'education_experience' => $post['education_experience'],
            'education_experience_en' => $post['education_experience_en'],
            'education_experience_ru' => $post['education_experience_ru'],
            'skills' => $post['skills'],
            'skills_en' => $post['skills_en'],
            'skills_ru' => $post['skills_ru']
        ];

        $this->db->where('id', $post['id']);
        $this->db->update('tbl_web_jobs', $params);
    }
    public function get($jobs_id = null)
    {
        $this->db->select('*');
        $this->db->from('tbl_web_jobs');
        if ($jobs_id != null) {
            $this->db->where('id', $jobs_id);
        }
        $this->db->order_by('id', 'desc');
        $query = $this->db->get();
        return $query;
    }
    public function delete_jobs($jobs_id)
    {
        $this->db->where('id', $jobs_id);
        $this->db->delete('tbl_web_jobs');
    }



    /*-------------------------web site----------------------------*/
    function get_all_careers($where_arr = null, $limit = null, $start = 0)
    {
        $this->db->select('tbl_web_jobs.*')->from('tbl_web_jobs');
        if (!empty($where_arr)) {
            $this->db->where($where_arr);
        }

        if (!empty($limit)) {
            $this->db->limit($limit, $start);
        }
        $events = $this->db->order_by('id','DESC')->get()->result();

        /*        print_r($this->db->last_query());*/
        if (!empty($events)) {
            foreach ($events as $key => $event) {

                $events[$key]->imgs = get_by('tbl_news_images', array('news_id_fk' => $event->id), 1);

            }
        }
        return $events;
    }

    function get_one_career($where_arr)
    {
        $this->db->select('tbl_web_jobs.*')->from('tbl_web_jobs');
        if (!empty($where_arr)) {
            $this->db->where($where_arr);
        }

        $event = $this->db->get()->row();
        if (!empty($event)) {

            $event->imgs = get_by('tbl_news_images', array('news_id_fk' => $event->id));
            $event->comments = get_by('blog_comment', array('blog_id' => $event->id));

        }
        return $event;
    }

    public function get_count($where_arr)
    {
        if (!empty($where_arr)) {
            $this->db->where($where_arr);
        }
        return $this->db->get("tbl_web_jobs")->num_rows();
    }

    function apply_job($file_cv='')
    {
        $data = $this->input->post('data');
        $data['file_cv'] = $file_cv;

        /*		$data = $_POST;*/
        /*echo "<pre>";
        print_r($data);
        die;*/
        $this->db->insert('career_files', $data);
    }
    function delete_career_order($table, $where_arr = false)
    {
        if (!empty($where_arr)) {
            $this->db->where($where_arr);
        }
        $this->db->delete($table);
    }


}