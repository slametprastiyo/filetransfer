<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pilketos_model extends CI_Model
{

    public function __construct()
    {
        parent::__construct();
    }

    public function get_dpt($nis)
    {
        $this->db->where('nis', $nis);
        $query = $this->db->get('pilketos_dpt');
        return $query->row_array();
    }
    public function vote($kandidat_nis)
    {
        $this->db->set('total_vote', 'total_vote + 1', FALSE);
        $this->db->where('nis', $kandidat_nis);
        $this->db->update('pilketos_kandidat');
        return $this->db->affected_rows();
    }
}
