<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User_model extends CI_Model {
    
    public function __construct() {
        parent::__construct();
    }

    public function get_users(){
        // $query = $this->db->get("user");
        // return $query->result_array();
        $this->db->select('user.id as user_id, user.username as user_username, user.role as user_role, user_role.name as user_role_name');
        $this->db->from('user');
        $this->db->join('user_role', 'user_role.id = user.role', 'left'); // Use LEFT JOIN
        $query = $this->db->get();
        return $query->result_array();
    }

    public function get_user($username) {
        $this->db->where('username', $username);
        $query = $this->db->get('user');
        return $query->row_array();
    }
    public function get_user_by_id($id) {
        $this->db->where('id', $id);
        $query = $this->db->get('user');
        return $query->row_array();
    }
    
    public function insert_user($data)
    {
        if (!isset($data['face'])) {
            $data['face'] = NULL; // Atau '{}' jika Anda ingin default ke objek JSON kosong
        }
        return $this->db->insert('user', $data);
    }
    public function get_all_users_for_dropdown()
    {
        $this->db->select('id, username, fullname');
        $query = $this->db->get('user');
        return $query->result();
    }
    public function get_all_user_face_descriptors()
    {
        $this->db->select('id, username, fullname, face');
        $query = $this->db->get('user');
        return $query->result_array(); // Mengembalikan array asosiatif untuk kemudahan parsing di JS
    }
    public function update_user_face($user_id, $face_descriptor_json)
    {
        $data = array(
            'face' => $face_descriptor_json // Data wajah dalam format JSON string
        );
        $this->db->where('id', $user_id);
        return $this->db->update('user', $data);
    }
}
