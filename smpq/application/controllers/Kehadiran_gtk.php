<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Kehadiran_gtk extends CI_Controller
{
	public function __construct() 
	{
		parent::__construct();
        $this->load->model('user_model');
        $this->load->model('kehadiran_gtk_model');
        $this->load->helper('date');
        $this->load->library('session');
        date_default_timezone_set('Asia/Jakarta');


	}

    public function index(){
        $this->load->view("auth/pengenalan_wajah");
    }

    public function dashboard(){
        // $uid = $this->input->get("id");
        // $user = $this->user_model->get_user_by_id($uid);
        // // var_dump($user);die;
        // 
        // var_dump($this->session->userdata('user_id') == null);die;

$user_id = $this->session->tempdata('user_id');
$user = $this->user_model->get_user_by_id($user_id);
if($user){
            $current_date = date('Y-m-d');
            $kehadiran = $this->kehadiran_gtk_model->get_kehadiran_by_user_by_date($user_id, $current_date);
            // var_dump($kehadiran);die;


            $data['user'] = $user;
            $data['id'] = $user_id;
            $data['kehadiran'] = $kehadiran;
// var_dump($data['kehadiran']);die;

            $date = new DateTime();
            $formatter = new IntlDateFormatter(
                'id_ID',
                IntlDateFormatter::FULL,
                IntlDateFormatter::NONE,
                'Asia/Jakarta' // Ganti jika zona waktu server Anda berbeda
            );
            $formatter->setPattern('EEEE, dd MMMM yyyy');
            $data['today'] = $formatter->format($date);;


        }else{
            redirect("Kehadiran_gtk");
        }
    $this->load->view("Kehadiran_gtk_dashboard", $data);
        // $this->load->view("geolocation", $data);

    // Now you can unset it, after the view has been loaded
    

        // }else{
        //     redirect("Kehadiran_gtk/user_not_found");
        // }
    }
	public function process(){
        $uid = $this->input->get("id");
        // echo $nis; die;
        $user = $this->user_model->get_user_by_id($uid);
        // var_dump($user);die;
        // echo json_encode($siswa);die;
        if($user){
            $data['id'] = $uid;
        $this->load->view("geolocation", $data);
        }else{
            redirect("Kehadiran_gtk/user_not_found");
        }

    }

    public function catat_kehadiran(){
        $uid = $this->input->get("id");

        if($uid == null){
            redirect("Kehadiran_gtk/error");
        }
        $current_date = date('Y-m-d');


        $current_time_str = date('H:i:s');
        // Create DateTime objects for comparison
        $current_time_obj = DateTime::createFromFormat('H:i:s', $current_time_str);
        $threshold_time_obj = DateTime::createFromFormat('H:i:s', '06:45:00');

        // Compare the times
        if ($current_time_obj < $threshold_time_obj) {
            $current_time_str = '06:45:00';
        }

        $data = [
            "id_gtk"    => $uid,
            "datang"    => $current_time_str,
            "tanggal"   => $current_date
        ];

var_dump($this->kehadiran_gtk_model->insert($data));die;
        if($this->kehadiran_gtk_model->insert($data)){
            $flashdata = [
                'message' => 'Kehadiran telah dicatat!',
                'type' => 'success'
            ];
            $this->session->set_flashdata($flashdata);
            redirect("Kehadiran_gtk/dashboard");


        }else{
            echo "data gagal disimpan";

        }

    }
    public function catat_kepulangan(){
        $uid = $this->input->get("id");

        if($uid == null){
            redirect("Kehadiran_gtk/error");
        }
        $current_date = date('Y-m-d');

        $current_time_str = date('H:i:s');
        // Create DateTime objects for comparison
        $current_time_obj = DateTime::createFromFormat('H:i:s', $current_time_str);
        $threshold_time_obj = DateTime::createFromFormat('H:i:s', '15:00:00');

        // Compare the times
        if ($current_time_obj > $threshold_time_obj) {
            $current_time_str = '15:00:00';
        }

        $data = [
            "pulang"    => $current_time_str
        ];

        if($this->kehadiran_gtk_model->update($uid,$data)){
            $flashdata = [
                'message' => 'Kepulangan telah dicatat!',
                'type' => 'success'
            ];
            $this->session->set_flashdata($flashdata);
            redirect("Kehadiran_gtk/dashboard");
        }else{
            echo "data gagal disimpan";

        }
    }

    public function user_not_found(){
        $this->load->view("user_not_found");
    }
    public function error(){
        $this->load->view("Kehadiran_gtk_error");
    }
    public function get_all_face_descriptors(){
        // Pastikan hanya menerima permintaan GET
        if ($this->input->method() !== 'get') {
            $this->output->set_status_header(405)
                         ->set_content_type('application/json')
                         ->set_output(json_encode(['status' => 'error', 'message' => 'Metode tidak diizinkan.']));
            return;
        }

        $descriptors_from_db = $this->user_model->get_all_user_face_descriptors();
        
        // Filter out users who don't have face data (face column is NULL or empty)
        $filtered_descriptors = array_filter($descriptors_from_db, function($user) {
            return !empty($user['face']);
        });

        $this->output->set_content_type('application/json')
                     ->set_output(json_encode(['status' => 'success', 'data' => array_values($filtered_descriptors)])); // array_values untuk reset index array
    
    }
}
