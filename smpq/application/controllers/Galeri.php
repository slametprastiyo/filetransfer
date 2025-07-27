<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Galeri extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();

        $this->load->model('galeri_model');
        $this->load->library('pagination');
    }
    public function index()
    {
        $config['base_url'] = site_url('galeri/index'); // The base URL for pagination links
        $config['total_rows'] = $this->db->count_all('galeri'); // Total rows in your table
        $config['per_page'] = 2; // Number of items per page
        $config['uri_segment'] = 3; // The segment that contains the page number
        $this->pagination->initialize($config);

        $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;

        $data['results'] = $this->galeri_model->get_data($config['per_page'], $page); // Custom function to fetch data
        $data['links'] = $this->pagination->create_links();

        $this->load->view('header');
        $this->load->view('galeri_test', $data);

    }
    public function load_more()
    {
        $id = $this->uri->segment(3);
        $newPhotos = $this->galeri_model->load_more($id);
        $is_last = true;
        if ($newPhotos != []) {
            $last = $newPhotos[count($newPhotos) - 1];
            $next = $this->galeri_model->load_more($last['id']);
            // var_dump($next == null);die;
            if ($next != null) {
                $is_last = false;
            }
        }
        echo json_encode([
            'data' => $newPhotos,
            'is_last' => $is_last
        ]);
    }
}