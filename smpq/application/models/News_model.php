<?php
defined('BASEPATH') or exit('No direct script access allowed');

class News_model extends CI_Model
{

    public function __construct()
    {
        parent::__construct();
    }

    public function search_berita($keyword){
        $this->db->like('title', $keyword);
        $query = $this->db->get("news");
        return $query->result_array();
    }
    public function search_berita_by_tag($keyword){
        $keyword = str_replace("%20", " ", $keyword);
        $this->db->like('tags', $keyword);
        $query = $this->db->get("news");
        return $query->result_array();
    }
    // Example method to fetch data
    public function get_recent_news(){
        $query = $this->db->limit(7);
        $query = $this->db->order_by('created_at', 'DESC');
                $query = $this->db->get('news'); 
                return $query->result_array();
    }
    public function get_news($id = null, $limit = null, $start = null, $sort = "ASC", $filterCategory = null)
    {
        // var_dump($filterCategory);die;
        
        if (is_null($id)) { // untuk mengambi semua berita tanpa mempedulikan id nya
            if($filterCategory == null){
                if($limit == null && $start == null){
                    $this->db->order_by('created_at', $sort);
                    $query = $this->db->get('news'); 
                    return $query->result_array();
                }else{
                    $this->db->order_by('created_at', $sort);
                    $this->db->limit($limit, $start);
                    $query = $this->db->get('news'); 
                    return $query->result_array();
                }    
            }else{

               if($limit == null && $start == null){
                    $this->db->where("category", "uowuwef");
                    $this->db->order_by('created_at', $sort);
                    $query = $this->db->get('news'); 
                    return $query->result_array();
                }else{
                    $this->db->where("category", "uowuwef");
                    $this->db->order_by('created_at', $sort);
                    $this->db->limit($limit, $start);
                    $query = $this->db->get('news'); 
                    return $query->result_array();
                } 
            }
        
            
        } else {
            $query = $this->db->get_where('news', array('id' => $id));
            return $query->row_array();
        }
    }

    public function get_news_by_priority($priority) {
        $query = $this->db->get_where('news', array('priority' => $priority));
                    return $query->row_array();
    }
    public function get_popular_news() {
            $query = $this->db->limit(5);
            $query = $this->db->order_by('view', 'DESC');
                    $query = $this->db->get('news'); 
                    return $query->result_array();
        
    }
    //     public function get_lowest_priority_news($id = null)
// {
//     $query = $this->db->order_by('priority', 'ASC');
//             $query = $this->db->get('news'); 
//             return $query->row_array();
// }
    public function set_news($data)
    {
        $this->db->insert('news', $data);
        $query = $this->db->where("created_at", $data['created_at']);
        $query = $this->db->get("news");
        return $query->row_array();
    }
    public function delete_news($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('news');
    }
    public function update_news($id, $data)
    {
        $this->db->where('id', $id);
        $this->db->update('news', $data);
    }
}

