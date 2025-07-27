<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kehadiran_siswa_model extends CI_Model {
    
    public function __construct() {
        parent::__construct();
    }

    public function insert($data) {
        $this->db->insert('kehadiran_siswa', $data);
        return $this->db->affected_rows();
    }
}
?>
