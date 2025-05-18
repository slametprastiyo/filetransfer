<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pilketos_model extends CI_Model {
    
    public function __construct() {
        parent::__construct();
    }

    public function get_dpt($nis) {
        $this->db->where('nis', $nis);
        $query = $this->db->get('pilketos_dpt');
        return $query->row_array();
    }
}
?>
