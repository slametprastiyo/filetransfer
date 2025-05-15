<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Home extends CI_Controller
{
	public function __construct()
	{ 
		parent::__construct();

		$this->load->model('galeri_model');
        $this->load->library('pagination');
	}
	public function index()
	{
		$config['base_url'] = site_url('tahfidz/index'); // The base URL for pagination links
		$this->db->where('isTahfidz', 1);
		$this->db->from('galeri');
        $config['total_rows'] = $this->db->count_all_results(); // Total rows in your table
        $config['per_page'] = 2; // Number of items per page
        $config['uri_segment'] = 3; // The segment that contains the page number
        $this->pagination->initialize($config);

        $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;

        $data['results'] = $this->galeri_model->get_data_tahfidz($config['per_page'], $page); // Custom function to fetch data
        $data['links'] = $this->pagination->create_links();
		// var_dump($data['links']);die;
		$this->load->view('header');
		$this->load->view('tahfidz', $data);
		$this->load->view('footer');
	}
}
