<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Profil extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();

		$this->load->library('session');
		$this->load->library('encryption');
		$this->load->helper('cookie');
		$this->load->model('banner_model');
		$this->load->model('user_model');
		$this->load->model('news_model');
		$this->load->model('galeri_model');
	}
	public function index()
	{

		// $data = $this->encryption->encrypt("coba");
		// var_dump($this->encryption->decrypt($data));
		// die;
		$user = null;
		$userID = $this->session->userdata("user_id");
		if($userID){
			$user = $this->user_model->get_user_by_id($userID);
			if (!($user && password_verify($this->session->userdata("password"), $user['password']))) {
				$user = null;
			}
		}
	// var_dump($galeries);die;
		$this->load->view('header' );
		$this->load->view('profil');
		$this->load->view('footer');
	}
	
}
