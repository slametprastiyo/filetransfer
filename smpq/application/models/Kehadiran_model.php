<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kehadiran_model extends CI_Model {

    public function __construct() {
        parent::__construct();
        $this->load->database(); // Memuat library database
    }

    /**
     * Mencatat waktu kehadiran untuk seorang pegawai.
     * @param int $id_pegawai ID pegawai
     * @param int $timestamp Waktu kehadiran dalam format timestamp UNIX (opsional, default current time)
     * @return bool TRUE jika berhasil, FALSE jika gagal
     */
    public function catat_kehadiran($id_pegawai, $timestamp = NULL) {
        if ($timestamp === NULL) {
            $timestamp = time(); // Gunakan waktu saat ini jika tidak disediakan
        }
        $data = array(
            'id_pegawai'    => $id_pegawai,
            'waktu_kehadiran' => $timestamp
        );
        return $this->db->insert('kehadiran', $data);
    }

    /**
     * Mengambil semua catatan kehadiran.
     * @return array Array objek kehadiran
     */
    public function get_all_kehadiran() {
        $this->db->select('k.*, p.nama, p.nip');
        $this->db->from('kehadiran k');
        $this->db->join('pegawai p', 'p.id = k.id_pegawai');
        $this->db->order_by('k.waktu_kehadiran', 'DESC');
        $query = $this->db->get();
        return $query->result();
    }

    /**
     * Mengambil rekap kehadiran untuk seorang pegawai.
     * @param int $id_pegawai ID pegawai
     * @return array Array objek kehadiran untuk pegawai tersebut
     */
    public function get_kehadiran_by_pegawai($id_pegawai) {
        $this->db->where('id_pegawai', $id_pegawai);
        $this->db->order_by('waktu_kehadiran', 'DESC');
        $query = $this->db->get('kehadiran');
        return $query->result();
    }

    /**
     * Menghitung rata-rata jam masuk untuk seorang pegawai.
     * Menggunakan fungsi SQL untuk mengekstrak waktu dan menghitung rata-rata detik dari tengah malam.
     * @param int $id_pegawai ID pegawai
     * @return string Waktu rata-rata dalam format HH:MM:SS atau NULL jika tidak ada data
     */
    public function get_rata_rata_jam_masuk_pegawai($id_pegawai) {
        // Penting: FALSE pada select agar CodeIgniter tidak menambahkan backticks pada fungsi SQL
        $this->db->select('SEC_TO_TIME(AVG(TIME_TO_SEC(FROM_UNIXTIME(waktu_kehadiran)))) AS rata_rata_jam', FALSE);
        $this->db->where('id_pegawai', $id_pegawai);
        $query = $this->db->get('kehadiran');
        $result = $query->row();

        if ($result && $result->rata_rata_jam !== NULL) {
            return $result->rata_rata_jam;
        }
        return 'N/A'; // Atau '00:00:00' jika tidak ada data
    }

    /**
     * Mengambil catatan kehadiran harian untuk seorang pegawai dalam satu bulan tertentu.
     * Jika ada beberapa absensi dalam sehari, waktu akan digabungkan.
     * @param int $id_pegawai ID pegawai
     * @param int $year Tahun
     * @param int $month Bulan (1-12)
     * @return array Array objek yang berisi 'tanggal' dan 'waktu_masuk' (gabungan waktu)
     */
    public function get_kehadiran_bulanan_by_pegawai($id_pegawai, $year, $month) {
        // Hitung timestamp awal dan akhir untuk bulan yang diberikan
        $start_date = strtotime("$year-$month-01 00:00:00");
        // Dapatkan timestamp akhir hari terakhir di bulan tersebut
        $end_date = strtotime(date('Y-m-t 23:59:59', $start_date));

        $this->db->select('FROM_UNIXTIME(k.waktu_kehadiran, "%Y-%m-%d") AS tanggal,
                           GROUP_CONCAT(FROM_UNIXTIME(k.waktu_kehadiran, "%H:%i:%s") ORDER BY k.waktu_kehadiran ASC SEPARATOR ", ") AS waktu_kehadiran_harian', FALSE);
        $this->db->from('kehadiran k');
        $this->db->where('k.id_pegawai', $id_pegawai);
        $this->db->where('k.waktu_kehadiran >=', $start_date);
        $this->db->where('k.waktu_kehadiran <=', $end_date);
        $this->db->group_by('tanggal'); // Kelompokkan berdasarkan tanggal
        $this->db->order_by('tanggal', 'ASC'); // Urutkan berdasarkan tanggal
        $query = $this->db->get();
        return $query->result();
    }
}
