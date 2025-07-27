<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Home extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();

$this->load->helper('text'); 
		$this->load->library('session');
		$this->load->library('encryption');
		$this->load->helper('cookie');
		$this->load->model('banner_model');
		$this->load->model('user_model');
		$this->load->model('news_model');
		$this->load->model('galeri_model');
		$this->load->model('category_model');
		$this->check_login();
	}
	public function index()
	{
		// var_dump(password_hash("1bismillah1", PASSWORD_DEFAULT));die;
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
	$banners = $this->banner_model->get_banner();
	$recentNews = $this->news_model->get_recent_news();
	$popularNews = $this->news_model->get_popular_news();
// var_dump($news);die;
	$locale = 'id_ID';
	$fmt = new IntlDateFormatter($locale, IntlDateFormatter::FULL, IntlDateFormatter::SHORT, 'Asia/Jakarta', IntlDateFormatter::GREGORIAN, 'd MMMM yyyy');

	// Format the date and time
	$recentNewsFinal = [];
	$popularNewsFinal = [];
	foreach($recentNews as $n){
		$cat = $this->category_model->get_category_by_id($n['category']);
		// var_dump($n['category']);
		// var_dump($cat);
		// echo "<hr>";
		$date = $fmt->format(intval($n['created_at']));
		$n['created_at'] = $date;
		$n['excerpt'] = str_replace('|', '', $n['excerpt']);
		$n['category'] = $cat['name'];
		// var_dump($n);
		// echo "<hr>";
	array_push($recentNewsFinal, $n);
	}
	// die;
	foreach($popularNews as $n){
		$date = $fmt->format(intval($n['created_at']));
		$n['created_at'] = $date;
		// var_dump($n);
		// echo "<hr>";
	array_push($popularNewsFinal, $n);
	}
// 	var_dump($recentNewsFinal);
// die;




	$galeries = $this->galeri_model->get_galeri();
	// var_dump($galeries);die;
		$data["banners"] = $banners;
		$data["recentNews"] = $recentNewsFinal;
		$data["popularNews"] = $popularNewsFinal;
		$data['user'] = $user;
		$data['galeries'] = $galeries;
		$this->load->view('header', $data);
		$this->load->view('home', $data);
		$this->load->view('footer');
	}
	public function check_login()
	{
		// $cookie = $this->input->cookie('session_cookie', TRUE);
		// // var_dump($cookie);die;
		// $session_data = [
		// 	"user_id" => $this->session->userdata("user_id"),
		// 	"username" => $this->session->userdata("username"),
		// 	"password" => $this->session->userdata("password"),
		// 	"logged_in" => $this->session->userdata("logged_in")
		// ];
		// if ($cookie) {
		// 	// Decrypt the cookie value
		// 	$cookie = json_decode($cookie);
		// 	$username = $cookie[0];
		// 	$password = $cookie[1];
		// 	$password = $this->encryption->decrypt($password);
		// 	$user = $this->user_model->get_user($username);
		// 	if ($user && password_verify($password, $user['password'])) {
		// 		if (!isset($session_data['logged_in']) && !$session_data['logged_in'] === TRUE) {
		// 			$session_data = [
		// 				"user_id" => $this->session->userdata("user_id"),
		// 				"username" => $this->session->userdata("username"),
		// 				"password" => $this->session->userdata("password"),
		// 				"logged_in" => $this->session->userdata("logged_in")
		// 			];
		// 			$this->session->set_userdata($session_data);
		// 		}
		// 	}

		// }
	}
}
