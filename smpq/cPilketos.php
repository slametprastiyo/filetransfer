<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pilketos extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('pilketos_model');

	}
	public function index()
	{
        $this->load->view('pilketos');
    }
	public function getDPT(){

		$nis = $this->input->get("nis");
		$dpt = $this->pilketos_model->get_dpt($nis);
		if($dpt){
			echo true;
		}else{
			echo false;
		}
	}
	public function vote(){
		$dpt = $this->input->get("nis");
		$kandidat = $this->input->get("kandidat");
		$check = $this->pilketos_model->get_dpt($dpt);
		if($check){
			$this->pilketos_model->vote($kandidat);
			echo true;
		}else{
			echo false;
		}
	}
}