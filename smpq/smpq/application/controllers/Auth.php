<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('user_model');
        $this->load->library('session');
        $this->load->helper('cookie');
        $this->load->library('encryption');
    }

    public function register()
    {
        $this->load->view('register');
    }

    public function do_register()
    {
        $username = $this->input->post('username');
        $password = $this->input->post('password');

        $this->user_model->create_user($username, $password);
        $this->session->set_flashdata('success', 'Registration successful!');
        redirect('auth/login');
    }

    public function login()
    {
        $this->check_login();

        // var_dump(time());
        // var_dump( password_hash("b15m1ll4h", PASSWORD_DEFAULT));die;
        $this->load->view('auth/login');
    }

    public function do_login()
    {
        $username = htmlspecialchars($this->input->post('username'));
        $password = htmlspecialchars($this->input->post('password'));
        $remember = $this->input->post('ingat'); // Check if 'remember me' is selected
// die;
        $user = $this->user_model->get_user($username);

        if ($user && password_verify($password, $user['password'])) {
            // var_dump($user);
            // die;
            $session_data = array(
                'logged_in' => true,
                'user' => [
                    'user_id' => $user['id'],
                    'username' => $user['username'],
                    'role' => $user['role'],
                    'password' => $this->encryption->encrypt($password)
                ]
            );
            // var_dump($session_data);die;
            $this->session->set_userdata($session_data);

            // Check if 'remember me' is selected
            if ($remember) {
                $data_cookie = json_encode(
                    [
                        'logged_in' => true,
                        'user' => [
                            'user_id' => $user['id'],
                            'username' => $user['username'],
                            'role' => $user['role'],
                            'password' => $this->encryption->encrypt($password)
                        ]
                    ]
                        );
                // var_dump($data_cookie);die;
                $this->input->set_cookie('session_cookie',$data_cookie, (60 * 24 * 7));
            }

            $this->session->set_flashdata('success', 'Login successful!');
            redirect('admin');
        } else {
            // var_dump('gagal');die;
            $this->session->set_flashdata('error', 'Invalid username or password.');
            redirect('auth/login');
        }
    }


    public function logout()
    {
        $this->session->sess_destroy();
        delete_cookie('session_cookie');
        redirect('home');
    }
    public function check_login()
    {
        if (isset($_SESSION['logged_in']) && isset($_SESSION['user']) ) {
            if($_SESSION['user']['role'] == 1){
                $user = $this->user_model->get_user_by_id($_SESSION['user']['user_id']);
                if ($user && password_verify($this->encryption->decrypt($_SESSION['user']['password']), $user['password'])) {
                    // var_dump($this->encryption->decrypt($_SESSION['user']['password']));die;
                    redirect('admin');
                }
            }
        }
        // $cookie = $this->input->cookie('session_cookie', TRUE);
        // $session_data = [
        //     "user_id" => $this->session->userdata("user_id"),
        //     "username" => $this->session->userdata("username"),
        //     "password" => $this->session->userdata("password"),
        //     "logged_in" => $this->session->userdata("logged_in")
        // ];
        // var_dump($session_data);
        // die;
        // if ($cookie) {
        //     // Decrypt the cookie value
        //     $cookie = json_decode($cookie);
        //     $username = $cookie[0];
        //     $password = $cookie[1];
        //     $password = $this->encryption->decrypt($password);
        //     $user = $this->user_model->get_user($username);
        //     if ($user && password_verify($password, $user['password'])) {
        //         if (!isset($session_data['logged_in']) && !$session_data['logged_in'] === TRUE) {
        //             $session_data = [
        //                 "user_id" => $this->session->userdata("user_id"),
        //                 "username" => $this->session->userdata("username"),
        //                 "password" => $this->session->userdata("password"),
        //                 "logged_in" => $this->session->userdata("logged_in")
        //             ];
        //             $this->session->set_userdata($session_data);
        //         }
        //     }
        //     redirect('admin');

        // }
    }
}

