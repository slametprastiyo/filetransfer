<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Category_model extends CI_Model
{
    public function is_exist($table, $column, $value){
        $this->db->where($column, $value);
        $query = $this->db->get($table);

        if ($query->num_rows() > 0) {
            return TRUE;
        } else {
            return FALSE;
        }
    }
    public function insert($name){
        $data = [
            "name"  => $name
        ];
        $this->db->insert("news_category", $data);
    }
    public function get_category_by_id($id){
        $query = $this->db->get_where("news_category", ["id" => $id]);
        return $query->row_array();
    }
    public function get_category_by_name($name){
        $query = $this->db->get_where("news_category", ["name" => $name]);
        return $query->row_array();
    }
}

