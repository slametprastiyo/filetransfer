<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Banner_model extends CI_Model
{

    public function __construct()
    {
        parent::__construct();
    }

    // Example method to fetch data
    public function get_banner($id = null, $sort = 'DESC', $quantity = "all", $rangeMin = 0)
    {
        if ($quantity == "all") {
            if ($rangeMin != 0) {

                if (is_null($id)) {
                    $this->db->where("priority >", $rangeMin);
                    $query = $this->db->order_by('priority', $sort);
                    $query = $this->db->get('banner');
                    return $query->result_array();
                } else {
                    $query = $this->db->get_where('banner', array('id' => $id));
                    return $query->row_array();
                }

            } else {

                if (is_null($id)) {
                    $query = $this->db->order_by('priority', $sort);
                    $query = $this->db->get('banner');
                    return $query->result_array();
                } else {
                    $query = $this->db->get_where('banner', array('id' => $id));
                    return $query->row_array();
                }

            }
        } else {
            $query = $this->db->order_by('priority', $sort);
            $query = $this->db->get('banner');
            return $query->row_array();

        }
    }
    public function get_lower_priority_banners($rangeMax, $quantity = "one")
    {
        if($quantity != "one"){
            $this->db->where("priority <", $rangeMax);
            $query = $this->db->get('banner');
            return $query->result_array();
        }else{
            $this->db->where("priority <", $rangeMax);
            $query = $this->db->get('banner');
            return $query->row_array();
        }
    }
    public function get_banner_sort_by_priority($sort = "DESC")
    {
        $query = $this->db->order_by('priority', $sort);
        $query = $this->db->get('banner');
        return $query->result_array();
    }
    public function get_banner_by_priority($priority)
    {
        $query = $this->db->get_where('banner', array('priority' => $priority));
        return $query->row_array();
    }
    //     public function get_lowest_priority_banner($id = null)
// {
//     $query = $this->db->order_by('priority', 'ASC');
//             $query = $this->db->get('banner'); 
//             return $query->row_array();
// }
    public function set_banner($data)
    {
        return $this->db->insert('banner', $data);
    }
    public function delete_banner($id)
    {
        $this->db->where('id', $id);
        return $this->db->delete('banner');
    }
    public function update_banner($id, $data)
    {
        $this->db->where('id', $id);
        return $this->db->update('banner', $data);
    }
}

