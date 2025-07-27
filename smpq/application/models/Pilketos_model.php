<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pilketos_model extends CI_Model
{

    public function __construct()
    {
        parent::__construct();
    }


    public function get_dpt($nis = null)
    {
        if ($nis === null) {
            $this->db->order_by('nis', 'ASC');
            $query = $this->db->get('pilketos_dpt');
            return $query->result_array();
        }else{
            $this->db->where('nis', $nis);
            $query = $this->db->get('pilketos_dpt');
            return $query->row_array();
        }
    }
    public function get_dpt_by_kandidat($kandidat_nis)
    {
        $this->db->where('kandidat_dipilih', $kandidat_nis);
        $query = $this->db->get('pilketos_dpt');
        return $query->result_array();
    }
    public function get_dpt_belum_memilih()
    {
        $this->db->where('kandidat_dipilih', NULL);
        $query = $this->db->get('pilketos_dpt');
        return $query->result_array();
    }
    public function get_kandidat(){
        $this->db->order_by('total_vote', 'DESC');
        $query = $this->db->get("pilketos_kandidat");
        return $query->result_array();
        
    }
    public function vote($kandidat_nis, $dpt)
    {
        $this->db->set('is_vote', 1, FALSE);
        $this->db->set('kandidat_dipilih', $kandidat_nis, FALSE);
        $this->db->where('nis', $dpt);
        $this->db->update('pilketos_dpt');

        // $this->db->set('total_vote', 'total_vote + 1', FALSE);
        // $this->db->where('nis', $kandidat_nis);
        // $this->db->update('pilketos_kandidat');
        return $this->db->affected_rows();
    }
}
