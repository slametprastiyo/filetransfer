<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Program extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
	}
	public function index()
	{
		$this->load->view('program-header');
		$this->load->view('program');
		$this->load->view('program-footer');
	}
	
	

	
}
