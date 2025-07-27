<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Berita extends CI_Controller
{
	public function __construct() 
	{
		parent::__construct();
        $this->load->model('news_model');
        $this->load->library('pagination');


	}
	public function index()
	{
		$config['base_url'] = site_url('berita/index'); // The base URL for pagination links
        $config['total_rows'] = $this->db->count_all('news'); // Total rows in your table
        $config['per_page'] = 10; // Number of items per page
        $config['uri_segment'] = 3; // The segment that contains the page number
        $this->pagination->initialize($config);

        $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;

        $data['results'] = $this->news_model->get_news(null, $config['per_page'], $page, "DESC"); // Custom function to fetch data
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
		// var_dump($data);die;
		
		$this->load->view('header');
		$this->load->view('baca-berita',$data);
		$this->load->view('footer');
	}
	function create(){
		$this->load->view('header');
		$this->load->view('admin/berita-create');
		$this->load->view('footer');
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
}
