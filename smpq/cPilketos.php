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
			$data = [
				'status' => true,
				'dpt' => $dpt
			];
			echo json_encode($data);
		}else{
			$data = [
				'status' => false,
				'dpt' => $dpt
			];
			echo json_encode($data);
		}
	}
	public function vote(){
		$dpt = $this->input->get("dpt");
		$kandidat = $this->input->get("kandidat");
		// echo $kandidat;die;
		$check = $this->pilketos_model->get_dpt($dpt);
		if($check){
			// echo json_encode($check);die;
			$vote = $this->pilketos_model->vote($kandidat);
			echo $vote;
		}else{
			echo false;
		}
	}
}