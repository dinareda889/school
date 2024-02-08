<?php

class About_us_m extends CI_Model
{
    var $column_order_groups = array(null, 'company_stats.about_us_short', 'company_stats.about_us_short_en'); //set column field database for datatable orderable

    var $column_search_groups = array('company_stats.about_us_short', 'company_stats.about_us_short_en'); //set column field database for datatable searchable

    var $order_groups = array('company_stats.id' => 'desc');

    private function _get_datatables_query_company_stats()

    {

        $this->db->select('company_stats.*');

        $this->db->from('tbl_about_us as company_stats');


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

        $this->db->from('tbl_about_us as company_stats');


        return $this->db->count_all_results();

    }


    /*************************************************************************/

    public function get($id = null)

    {

        $this->db->select('tbl_about_us.*');

        $this->db->from('tbl_about_us');

        if ($id != null) {

            $this->db->where('id', $id);

        }

        $this->db->order_by('id', 'desc');

        $query = $this->db->get();

        return $query;

    }

    public function add_company_stats($post)

    {

        $params = [
            'our_vision' => $post['our_vision'],
            'our_vision_en' => $post['our_vision_en'],
            'our_vision_ru' => $post['our_vision_ru'],
            'our_mission' => $post['our_mission'],
            'our_mission_en' => $post['our_mission_en'],
            'our_mission_ru' => $post['our_mission_ru'],
            'our_goals' => $post['our_goals'],
            'our_goals_en' => $post['our_goals_en'],
            'our_goals_ru' => $post['our_goals_ru'],
            'about_us' => $post['about_us'],
            'about_us_en' => $post['about_us_en'],
            'about_us_ru' => $post['about_us_ru'],
            'about_us_short' => $post['about_us_short'],
            'about_us_short_en' => $post['about_us_short_en'],
            'about_us_short_ru' => $post['about_us_short_ru']
        ];

        $this->db->insert('tbl_about_us', $params);


    }

    public function edit_company_stats($post)

    {

        $params = [
            'our_vision' => $post['our_vision'],
            'our_vision_en' => $post['our_vision_en'],
            'our_mission' => $post['our_mission'],
            'our_mission_en' => $post['our_mission_en'],
            'our_goals' => $post['our_goals'],
            'our_goals_en' => $post['our_goals_en'],
            'about_us' => $post['about_us'],
            'about_us_en' => $post['about_us_en'],
            'about_us_short' => $post['about_us_short'],
            'about_us_short_en' => $post['about_us_short_en']
        ];

        $this->db->where('id', $post['id']);

        $this->db->update('tbl_about_us', $params);

    }


    public function delete_company_stats($id)

    {

        $this->db->where('id', $id);

        $this->db->delete('tbl_about_us');

    }

    public function listing()
    {

        $this->db->select('tbl_about_us.*');

        $this->db->from('tbl_about_us');

        $this->db->order_by('id', 'desc');

        $query = $this->db->get();

        return $query->row();

    }


}

?>