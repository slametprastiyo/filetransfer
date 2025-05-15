<?php
defined('BASEPATH') or exit('No direct script access allowed');

class News_category_model extends CI_Model
{

    public function __construct()
    {
        parent::__construct();
    }
    public function set_news_category($data)
    {
        return $this->db->insert('news_category', $data);
    }

    public function get_categories(){
        $query = $this->db->get("news_category");
        return $query->result_array();
    }
    public function get_category_by_id($id){

        $query = $this->db->get_where('news_category', array('id' => $id));
            return $query->row_array();
    }
    public function get_category_by_name($name){

        $query = $this->db->get_where('news_category', array('name' => $name));
            return $query->row_array();
    }

}