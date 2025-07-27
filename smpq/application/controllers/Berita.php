<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Berita extends CI_Controller
{
	public function __construct() 
	{
		parent::__construct();
        $this->load->model('news_model');
        $this->load->library('pagination');
		$this->load->model('news_category_model');
		$this->load->model('tags_model');
		$this->load->model('user_model');
		$this->load->model('news_additional_image_model');


	}
	public function index()
	{
		$filterCategory = $this->input->get("category");
		// var_dump($filterCategory);
		// die;

		$config['base_url'] = site_url('berita/index'); // The base URL for pagination links
        $config['total_rows'] = $this->db->count_all('news'); // Total rows in your table
        $config['per_page'] = 2; // Number of items per page
        $config['uri_segment'] = 3; // The segment that contains the page number
        $this->pagination->initialize($config);

        $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;

if($filterCategory != null){
        $data['results'] = $this->news_model->get_news(null, $config['per_page'], $page, "DESC", $filterCategory); // Custom function to fetch data	
}else{
        $data['results'] = $this->news_model->get_news(null, $config['per_page'], $page, "DESC", null); // Custom function to fetch data	

}
// var_dump($data['results']);die;
        $data['links'] = $this->pagination->create_links();
		// var_dump($data['results']);die;
		$data['popular_news'] = $this->news_model->get_popular_news();
		// var_dump($data['popular_news']);die;

		$locale = 'id_ID';
	$fmt = new IntlDateFormatter($locale, IntlDateFormatter::FULL, IntlDateFormatter::SHORT, 'Asia/Jakarta', IntlDateFormatter::GREGORIAN, 'EEEE, d MMMM yyyy HH:mm \'WIB\'');

	// Format the date and time
	$newsDateFormated = [];
	foreach($data['results'] as $n){
		$date = $fmt->format(intval($n['created_at']));
		$n['created_at'] = $date;
		// var_dump($n);
		// echo "<hr>";
	array_push($newsDateFormated, $n);
	}
	$data['results'] = $newsDateFormated;

		$this->load->view('header');
		$this->load->view('berita', $data);
		$this->load->view('footer');
	}
	
    public function baca()
	{
        $id = $this->uri->segment(3);
		// var_dump($id);die;
		if($id == null){
			redirect('berita');
		}
		if(isset( $_GET['ref'])){
			$ref = $_GET['ref'];
		}else{
			$ref = "";
		}
		// var_dump($ref);die;
		if($id == null){
			redirect('#berita');
		}
		$data['berita'] = $this->news_model->get_news($id);
		if(!$data['berita']){
			return redirect('berita');
		}
		// var_dump($data);die;
		// $this->increaseView($data['berita']);
		$isi = $data['berita']['isi'];
		$isi = str_replace("|", "</p><p>", $isi);
		$data['berita']['isi'] = $isi;
		

		$locale = 'id_ID';
        $fmt = new IntlDateFormatter($locale, IntlDateFormatter::FULL, IntlDateFormatter::SHORT, 'Asia/Jakarta', IntlDateFormatter::GREGORIAN, 'EEEE, d MMMM yyyy HH:mm \'WIB\'');

        // Format the date and time
        $date = $fmt->format(intval($data['berita']['created_at']));


		$data['popular_news'] = $this->news_model->get_popular_news();

		// $date = date('D,d M Y', intval($data['berita']['created_at']));
		$data['berita']['created_at'] = $date;
		$data['ref'] = $ref;
		$data['tags'] = explode(",", $data['berita']['tags']);
		$data['additional_images'] = $this->news_additional_image_model->get_additional_images($id);
		$dataogs['ogs'] = 
		[
			"title"	=> $data['berita']['title'],
			"image"	=> $data['berita']['hd'],
			"url"	=> base_url()
		];
		// var_dump($data);die;
		
		$this->load->view('header', $dataogs);
		$this->load->view('baca-berita',$data);
		$this->load->view('footer');
	}
	function create(){
		$this->check_login();

		$data = [
			'categories' => $categories = $this->news_category_model->get_categories(),
			'tags' => $this->tags_model->get_popular_tags()
		];
		

		$this->load->view('berita-create-header');
		$this->load->view('admin/berita-create', $data);
		$this->load->view('berita-create-footer');
	}
	function increaseView(){
		// var_dump($data);
		$id = $_GET['id'];
		$data = $this->news_model->get_news($id);
		$data['view'] = intval($data['view']) + 1;
		// var_dump($data);
		// die;
		$this->news_model->update_news($data['id'], $data);
	}
	public function check_login()
    {
		// var_dump($this->session->userdata("logged_in"));die;

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
