<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pilketos extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('pilketos_model');
        $this->load->model('user_model');
		$this->load->library('encryption');

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
				'is_vote' => $dpt['is_vote'],
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
			// echo json_encode($check['is_vote']);die;
			if($check['is_vote'] == 0){
				$vote = $this->pilketos_model->vote($kandidat, $dpt);
				// echo $vote;die;
				$data = [
				'status' => $vote
			];
			echo json_encode($data);
			}else{
				$data = [
				'status' => 'voted'
			];
			echo json_encode($data);
			}
			
		}else{
			$data = [
				'status' => 'failed'
			];
			echo json_encode($data);
		}
	}
	public function result(){
		$this->check_login();
        $this->load->view('pilketos_result');
	}
	public function check_login()
    {

        $logged_in = $this->session->userdata("logged_in");
        $user_data = $this->session->userdata("user");
        // cek session
        if (!isset($logged_in) && !isset($user_data)) {

            //jika session tidak ada, cek cookie
            $session_cookie = $_COOKIE['session_cookie'];
            if (!isset($session_cookie)) {
                redirect("auth/login");
            } else {
                $session_cookie = (array) (json_decode($session_cookie));
                $session_cookie_user = (array) $session_cookie['user'];
                $user = $this->user_model->get_user_by_id($session_cookie_user['user_id']);
                if (!$user) {
                    redirect("auth/login");
                } else {
                    $user_pass = $this->encryption->decrypt($session_cookie_user['password']);
                    if (!password_verify($user_pass, $user['password'])) {
                        redirect("auth/login");
                    } else {
                        // var_dump(password_verify($user_pass, $user['password']));
                        // die;
                        $session_data = array(
                            'logged_in' => true,
                            'user' => [
                                'user_id' => $user['id'],
                                'username' => $user['username'],
                                'role' => $user['role'],
                                'password' => $this->$session_cookie_user['password']
                            ]
                        );
                        // var_dump($session_data);die;
                        $this->session->set_userdata($session_data);
                    }
                }
            }
            // cek cookie
        } else {
            // var_dump($user_data['password']);die;
            $user = $this->user_model->get_user_by_id($user_data['user_id']);
            // var_dump($user);die;
            $user_data_password = $this->encryption->decrypt($user_data['password']);
            if (!$user && password_verify($user_data_password, $user['password'])) {
                // var_dump($user_data_password);die;
                redirect("auth/login");
            }
        }

       
    }
}