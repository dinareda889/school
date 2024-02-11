<?php

class Manger_word_m extends CI_Model
{
    var $column_order_groups = array(null, 'word_title_ar', 'word_title_en'); //set column field database for datatable orderable

    var $column_search_groups = array('word_title_ar', 'word_title_en'); //set column field database for datatable searchable

    var $order_groups = array('id' => 'desc');

    private function _get_datatables_query()

    {

        $this->db->select('*');

        $this->db->from('tbl_manger_word ');


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

    function get_datatables()

    {

        $this->_get_datatables_query();

        if (@$_POST['length'] != -1)

            $this->db->limit(@$_POST['length'], @$_POST['start']);

        $query = $this->db->get();

        return $query->result();

    }

    function count_filtered()

    {

        $this->_get_datatables_query();

        $query = $this->db->get();

        return $query->num_rows();

    }

    function count_all()

    {

        $this->db->select('*');

        $this->db->from('tbl_manger_word ');


        return $this->db->count_all_results();

    }


    /*************************************************************************/

    public function get($id = null)

    {

        $this->db->select('tbl_manger_word.*');

        $this->db->from('tbl_manger_word');

        if ($id != null) {

            $this->db->where('id', $id);

        }

        $this->db->order_by('id', 'desc');

        $query = $this->db->get();

        return $query;

    }

    public function add($post)

    {

        $params = [
            'word_title_ar' => $post['word_title_ar'],
            'word_title_en' => $post['word_title_en'],
            'word_ar' => $post['word_ar'],
            'word_en' => $post['word_en'],
            ];

        $this->db->insert('tbl_manger_word', $params);


    }

    public function edit($post)

    {

        $params = [
            'word_title_ar' => $post['word_title_ar'],
            'word_title_en' => $post['word_title_en'],
            'word_ar' => $post['word_ar'],
            'word_en' => $post['word_en'],
        ];


        $this->db->where('id', $post['id']);

        $this->db->update('tbl_manger_word', $params);

    }


    public function delete($id)

    {

        $this->db->where('id', $id);

        $this->db->delete('tbl_manger_word');

    }

    public function listing()
    {

        $this->db->select('tbl_manger_word.*');

        $this->db->from('tbl_manger_word');

        $this->db->order_by('id', 'desc');

        $query = $this->db->get();

        return $query->row();

    }


}

?>