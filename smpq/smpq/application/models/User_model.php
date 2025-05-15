<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User_model extends CI_Model {
    
    public function __construct() {
        parent::__construct();
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
    
    public function create_user($username, $password) {
        $data = array(
            'username' => $username,
            'password' => password_hash($password, PASSWORD_DEFAULT)
        );
        return $this->db->insert('user', $data);
    }
}
?>
