<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Tags_model extends CI_Model
{

    public function __construct()
    {
        parent::__construct();
    }
    public function set_tags($data)
    {
        return $this->db->insert('tags', $data);
    }

    public function get_tags(){
        $query = $this->db->get("tags");
        return $query->result_array();
    }
    public function get_popular_tags(){
        $query = $this->db->limit(6);
        $query = $this->db->order_by('used', 'DESC');
        $query = $this->db->get("tags");
        return $query->result_array();
    }
    public function get_tag_by_name($name){

        $query = $this->db->get_where('tags', array('name' => $name));
            return $query->row_array();
    }
    public function update_tag($data, $name){
        $this->db->where('name', $name);
        return $this->db->update('tags', $data);
    }

}