<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Ppdb extends CI_Controller
{
	public function __construct() 
	{
		parent::__construct();
        $this->load->model('news_model');
        $this->load->library('pagination');


	}
	public function index()
	{


		$this->load->view('header');
		$this->load->view('ppdb');
		$this->load->view('footer');
	}
}
