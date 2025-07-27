<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pegawai_model extends CI_Model {

    public function __construct() {
        parent::__construct();
        $this->load->database(); // Memuat library database
    }

    /**
     * Mengambil semua data pegawai.
     * @return array Array objek pegawai
     */
    public function get_all_pegawai() {
        $query = $this->db->get('pegawai');
        return $query->result(); // Mengembalikan hasil sebagai array objek
    }

    /**
     * Mengambil data pegawai berdasarkan ID.
     * @param int $id ID pegawai
     * @return object Objek pegawai atau NULL jika tidak ditemukan
     */
    public function get_pegawai_by_id($id) {
        $this->db->where('id', $id);
        $query = $this->db->get('pegawai');
        return $query->row(); // Mengembalikan satu baris hasil sebagai objek
    }

    /**
     * Menambahkan pegawai baru.
     * @param array $data Data pegawai (nama, nip)
     * @return bool TRUE jika berhasil, FALSE jika gagal
     */
    public function add_pegawai($data) {
        return $this->db->insert('pegawai', $data);
    }

    /**
     * Memperbarui data pegawai.
     * @param int $id ID pegawai
     * @param array $data Data yang akan diperbarui
     * @return bool TRUE jika berhasil, FALSE jika gagal
     */
    public function update_pegawai($id, $data) {
        $this->db->where('id', $id);
        return $this->db->update('pegawai', $data);
    }

    /**
     * Menghapus pegawai.
     * @param int $id ID pegawai
     * @return bool TRUE jika berhasil, FALSE jika gagal
     */
    public function delete_pegawai($id) {
        $this->db->where('id', $id);
        return $this->db->delete('pegawai');
    }
}
