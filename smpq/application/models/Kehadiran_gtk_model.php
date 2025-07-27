<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kehadiran_gtk_model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }
    public function getAll(){
          $this->db->select('kg.id, kg.id_gtk, u.fullname, kg.datang, kg.pulang, kg.tanggal');
        $this->db->from('kehadiran_gtk kg'); // Alias 'kg' untuk tabel kehadiran_gtk
        $this->db->join('user u', 'u.id = kg.id_gtk', 'left'); // Alias 'u' untuk tabel user
        $query = $this->db->get();
        return $query->result_array();
    }
    public function get_kehadiran_by_user_by_date($id_gtk, $tanggal) {
        $this->db->where('id_gtk', $id_gtk);
        $this->db->where('tanggal', $tanggal);
        $query = $this->db->get('kehadiran_gtk');
        return $query->row_array();
    }
    public function insert($data){
        $this->db->insert("kehadiran_gtk", $data);
        return $this->db->affected_rows();
    }
    public function update($uid, $data){
        $this->db->where('id_gtk', $uid);
        $this->db->update('kehadiran_gtk', $data);
        return $this->db->affected_rows();
        
    }
}
