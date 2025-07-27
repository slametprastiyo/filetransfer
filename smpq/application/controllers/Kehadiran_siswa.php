<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Kehadiran_siswa extends CI_Controller
{
	public function __construct() 
	{
		parent::__construct();
        $this->load->model('user_model');
        $this->load->model('siswa_model');
        $this->load->model('kehadiran_siswa_model');
        $this->load->helper('date');



        // $this->load->model('Kehadiran_siswa_model');
        $this->check_login();

	}
	public function index()
	{
        // echo date('Y-m-d H:i:s', 1751896588);die;
		$this->load->view('kehadiran_siswa');
	}
	public function process(){
        $nis = $this->input->get("nis");
        // echo $nis; die;
        $siswa = $this->siswa_model->get_siswa($nis);
        // var_dump($siswa);
        // echo json_encode($siswa);die;
        if($siswa){
            // masukkan catatan kehadiran siswi tsb ke tabel 'kehadiran_siswa'
            $datetime = new DateTime('now', new DateTimeZone('Asia/Jakarta'));

// Get the Unix timestamp
$timestamp = $datetime->getTimestamp();
            $data = 
            [
                'siswa' => $nis,
                'waktu' => $timestamp
            ];
           echo $this->kehadiran_siswa_model->insert($data);
        }else{
            echo 0;
        }

    }
	public function check_login()
    {
        // $session_cookie = (array)(json_decode($_COOKIE['session_cookie']));
        // $session_cookie_user = (array)$session_cookie['user'];
        // $user = $this->user_model->get_user_by_id($session_cookie_user['user_id']);
        // $user_pass = $this->encryption->decrypt($session_cookie_user['password']);
        // var_dump(password_verify($user_pass, $user['password']));die;

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
