<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User_role_model extends CI_Model
{
	public function get_roles(){
		$query = $this->db->get("user_role");
		return $query->result_array();
	}
	public function insert($role, $roleName){
		$data = [
			"role"	=> $role,
			"name"	=> $roleName
		];
		$this->db->insert('user_role', $data);
		return $this->db->affected_rows();
	}
	public function delete($id){
		$this->db->where('id', $id);
        $this->db->delete('user_role');
	}
}