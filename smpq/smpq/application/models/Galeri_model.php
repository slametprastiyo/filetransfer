<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Galeri_model extends CI_Model
{

    public function __construct()
    {
        parent::__construct();
    }

    // Example method to fetch data
    public function search_galeri($keyword)
    {
        $this->db->like('caption', $keyword);
        $query = $this->db->get("galeri");
        return $query->result_array();
    }
    public function get_galeri($id = null)
    {


        if (is_null($id)) {
            $query = $this->db->limit(7);
            $query = $this->db->order_by('timestamp', "DESC");
            $query = $this->db->where('isTahfidz', 0);

            $query = $this->db->get('galeri'); // Replace 'my_table' with your actual table name
            return $query->result_array();
        } else {
            $query = $this->db->get_where('galeri', array('id' => $id));
            return $query->row_array();
        }
    }
    public function get_data($limit, $start)
    {
        $this->db->limit($limit, $start);
        $query = $this->db->get('galeri');

        if ($query->num_rows() > 0) {
            return $query->result();
        }
        return false;
    }
    public function get_data_tahfidz($limit, $start)
    {
        $this->db->limit($limit, $start);
        $this->db->where('isTahfidz', 1);

        $query = $this->db->get('galeri');

        if ($query->num_rows() > 0) {
            return $query->result_array();
        }
        return false;
    }
    public function load_more($id)
    {
        $query = $this->db->limit(10);
        $query = $this->db->where('id <', $id);
        $query = $this->db->order_by('timestamp', "DESC");
        $query = $this->db->get('galeri'); // Replace 'my_table' with your actual table name
        return $query->result_array();
    }

    //     public function get_lowest_priority_banner($id = null)
    // {
    //     $query = $this->db->order_by('priority', 'ASC');
    //             $query = $this->db->get('banner'); // Replace 'my_table' with your actual table name
    //             return $query->row_array();
    // }
    public function set_galeri($data)
    {
        return $this->db->insert('galeri', $data);
    }
    public function delete_galeri($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('galeri');
    }
    public function update_banner($id, $data)
    {
        $this->db->where('id', $id);
        $this->db->update('banner', $data);
    }
}
