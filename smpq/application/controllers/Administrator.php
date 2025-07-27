<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Administrator extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('pegawai_model');
        $this->load->model('kehadiran_model');
        $this->load->helper('url'); // Untuk fungsi base_url()
        $this->load->helper('date'); // Untuk fungsi date_default_timezone_set() dan date()

        // Set zona waktu default untuk aplikasi (sesuaikan dengan lokasi Anda, misal Asia/Jakarta untuk WIB)
        date_default_timezone_set('Asia/Jakarta');
    }

    public function index() {
        // Mengambil semua data pegawai
        $data['pegawai'] = $this->pegawai_model->get_all_pegawai();

        // Loop untuk setiap pegawai untuk mendapatkan rata-rata waktu kehadiran
        foreach ($data['pegawai'] as $key => $pegawai) {
            $data['pegawai'][$key]->rata_rata_jam_masuk = $this->kehadiran_model->get_rata_rata_jam_masuk_pegawai($pegawai->id);
        }

        // Memuat view dashboard admin
        $this->load->view('admin/dashboard', $data);
    }

    /**
     * Menampilkan rekap kehadiran bulanan untuk pegawai tertentu.
     * @param int $id_pegawai ID pegawai
     * @param int|null $year Tahun (default: tahun sekarang)
     * @param int|null $month Bulan (default: bulan sekarang)
     */
    public function rekap_bulanan($id_pegawai, $year = null, $month = null) {
        $data['pegawai'] = $this->pegawai_model->get_pegawai_by_id($id_pegawai);
        if (!$data['pegawai']) {
            show_404(); // Tampilkan halaman 404 jika pegawai tidak ditemukan
        }

        // Ambil tahun dan bulan dari parameter URL atau gunakan default (tahun/bulan sekarang)
        $selected_year = $this->input->get('year') ?: ($year ?: date('Y'));
        $selected_month = $this->input->get('month') ?: ($month ?: date('m'));

        $data['current_year'] = $selected_year;
        $data['current_month'] = $selected_month;
        // Dapatkan nama bulan dari angka bulan
        $data['month_name'] = date('F', mktime(0, 0, 0, $selected_month, 10)); // 10 adalah tanggal dummy

        // Mengambil data kehadiran bulanan dari model
        $data['kehadiran_bulanan'] = $this->kehadiran_model->get_kehadiran_bulanan_by_pegawai(
            $id_pegawai,
            $selected_year,
            $selected_month
        );

        // Siapkan daftar tahun dan bulan untuk dropdown navigasi
        $data['years'] = range(date('Y') - 5, date('Y') + 1); // Contoh: 5 tahun ke belakang dan 1 tahun ke depan
        $data['months'] = array(
            '01' => 'Januari', '02' => 'Februari', '03' => 'Maret', '04' => 'April',
            '05' => 'Mei', '06' => 'Juni', '07' => 'Juli', '08' => 'Agustus',
            '09' => 'September', '10' => 'Oktober', '11' => 'November', '12' => 'Desember'
        );

        $this->load->view('admin/rekap_bulanan', $data);
    }

    // Fungsi opsional untuk mencatat kehadiran (bisa dipanggil via URL atau form)
    public function catat_kehadiran_test($id_pegawai) {
        if ($this->kehadiran_model->catat_kehadiran($id_pegawai)) {
            echo "Kehadiran pegawai ID " . $id_pegawai . " berhasil dicatat.";
        } else {
            echo "Gagal mencatat kehadiran.";
        }
    }

    // Fungsi opsional untuk melihat rekap kehadiran detail per pegawai (jika diperlukan)
    public function rekap_detail($id_pegawai) {
        $data['pegawai'] = $this->pegawai_model->get_pegawai_by_id($id_pegawai);
        if (!$data['pegawai']) {
            show_404(); // Tampilkan halaman 404 jika pegawai tidak ditemukan
        }

        $data['kehadiran_list'] = $this->kehadiran_model->get_kehadiran_by_pegawai($id_pegawai);

        // Format timestamp untuk tampilan
        foreach ($data['kehadiran_list'] as $key => $kehadiran) {
            $data['kehadiran_list'][$key]->waktu_formatted = date('d-m-Y H:i:s', $kehadiran->waktu_kehadiran);
        }

        $this->load->view('admin/rekap_detail', $data); // Anda perlu membuat view ini jika ingin menggunakannya
    }
}
