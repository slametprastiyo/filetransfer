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
		// $kandidat = [
		// 	"visi" => "Terwujudnya OSIS yang bertanggung jawab, saling menyayangi dan taat aturan.",
		// 	"misi" => [
		// 		"Membuat program yang memotivasi dan membangun nilai tanggung jawab",
		// 		"menanamkan sifat disiplin",
		// 		"membuat pengurus OSIS menjadi teladang yang baik untuk semua orang",
		// 		"menjalin hubungan yang baik dengan semua",
		// 		"menjadikan siswi yang memiliki sifat empati"
		// 	]
		// ];
		// $kandidat2 = [
        //     'visi' => 'Mewujudkan SMPQ AL MUANAWIYAH yang aktif, kreatif, inovatif, dan profesional. Menjadikan OSIS sebagai wadah yang menampung segala bakat, potensi, dan keahlian yang dimiliki siswa.',
        //     'misi' => [
        //         'Berpartisipasi aktif dalam ajang perlombaan akademik maupun non akademik di lingkungan sekolah dan masyarakat umum.',
        //         'Meningkatkan kedisiplinan siswa-siswi melalui peraturan yang tegas dan tanggung jawab.',
        //         'Menyelenggarakan suatu kegiatan ekstrakurikuler yang unik, kreatif, dan menarik bagi siswa-siswi.'
        //     ]
        // ];
        // $kandidat3 = [
        //     'visi' => 
        //         'Mewujudkan sekolah kreatif, berkualitas, dan berprestasi dengan menciptakan lingkungan yang mendukung perkembangan semua siswa melalui kegiatan inspiratif dan beragam.',
        //     'misi' => [
        //         'Meningkatkan kegiatan ekstrakurikuler. Menyediakan lebih banyak opsi kegiatan yang menarik dan bermanfaat untuk semua siswa.',
        //         'Meningkatkan komunikasi. Membuka saluran komunikasi yang lebih efektif antara siswa dan pihak sekolah.',
        //         'Memperkuat kebersamaan. Menciptakan berbagai acara yang memperat hubungan antar siswa dan membangun semangat tim.'
        //     ]
        // ];
		// var_dump($kandidat3);
		// echo "<hr>";
		// echo json_encode($kandidat3);die;
		$kandidatTmp = $this->pilketos_model->get_kandidat();
		// var_dump($kandidatTmp);
		// echo "<hr>";
		$kandidat = [];
		foreach($kandidatTmp as $ktmp){
			$data = [
				'nis'		=> $ktmp['nis'],
				'nama'		=> $ktmp['nama'],
				'visi_misi'		=> json_decode($ktmp['visi_misi'], true),
				'gambar'		=> $ktmp['gambar'],
				'no_urut'		=> $ktmp['no_urut'],
				'total_vote'		=> $ktmp['total_vote']
			];
			array_push($kandidat, $data);
		}
		// foreach($kandidat as $kd){
		// var_dump($kd['visi_misi']['misi']);	
		// echo "<hr>";		
		// }
		// die;
		$data = [
			"kandidat" => $kandidat
		];
        $this->load->view('pilketos', $data);
    }
	public function getDPT(){

		$nis = $this->input->get("nis");
		$password = $this->input->get("password");
		$dpt = $this->pilketos_model->get_dpt($nis);
		// echo json_encode($password);die;
		// echo json_encode($dpt['password'] == $password);die;
		if(strlen($nis) > 5 || strlen($password) > 4){
			$data = [
				'status' => false,
				'dpt' => $dpt
			];
			echo json_encode($data);
			return;
		}
		if($dpt && $dpt['password'] == $password){
			
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
		$password = $this->input->get("password");
		$kandidat = $this->input->get("kandidat");
		// echo $dpt;
		// echo "<br>";
		// echo $kandidat;
		// die;
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
		$this->load->model('pilketos_model');
		$kandidat = $this->pilketos_model->get_kandidat();
		$dptBelumMemilih = $this->pilketos_model->get_dpt_belum_memilih();
		$k = [];
		$totalVote = "";
		$kandidatName = "";
		foreach($kandidat as $key => $kd){
			$dpt = $this->pilketos_model->get_dpt_by_kandidat($kd['nis']);
			$allDPT = $this->pilketos_model->get_dpt();
			// array_push($k, [
			// 	'nama' => $kd['nama'],
			// 	'nis' => $kd['nis'],
			// 	'total_vote' => count($dpt),
			// ]);
			$kandidatName .= $kd['nama'] . "|";
			$totalVote .= count($dpt) . "|";
			// if($key < count($kandidat) - 1){
			// }else{
			// 	$kandidatName .= $kd['nama'];
			// 	$totalVote .= count($dpt);
			// }
		}
		// var_dump($dptBelumMemilih);
		// die;
		$totalVote .= count($dptBelumMemilih);
		$kandidatName .= "Belum Memilih";
		// var_dump($kandidatName);
		// die;
		// $totalVote = "";
		// $kandidatName = "";
		// foreach($kandidat as $key => $value){
		// 	if($key < count($kandidat) - 1){
		// 		$kandidatName .= $value['nama'] . "|";
		// 	}else{
		// 		$kandidatName .= $value['nama'];
		// 	}
		// }
		// foreach($kandidat as $key => $value){
		// 	if($key < count($kandidat) - 1){
		// 	$totalVote .= $value['total_vote'] . "|";
		// 	}else{
		// 		$totalVote .= $value['total_vote'];
		// 	}
		// }
		// var_dump($totalVote);
		// var_dump($kandidatName);
		// die;
		// var_dump($kandidat);die;
		$data = 
		[
			'kandidat' => $totalVote."&".$kandidatName
		];
        $this->load->view('pilketos_result', $data);
	}
	public function finalResult(){
		$this->load->model('pilketos_model');
		$kandidat = $this->pilketos_model->get_kandidat();
		
		foreach($kandidat as &$kd){
			$dpt = $this->pilketos_model->get_dpt_by_kandidat($kd['nis']);
			unset($kd['visi_misi']);
			$kd['totalVote'] = count($dpt);
		}
		
		echo json_encode($kandidat);
		// die;
	}

	public function getVoteCount(){
		// $kandidat = $this->pilketos_model->get_kandidat();
		$dpt = $this->pilketos_model->get_dpt();
		$dptBelumMemilih = $this->pilketos_model->get_dpt_belum_memilih();
		// $totalVote = 0;
		// foreach($kandidat as $key => $value){
		// 	$totalVote += $value['total_vote'];
		// }
		// var_dump($totalVote);
		// echo "<br>";
		// echo "<br>";
		// echo "<br>";
		// var_dump(count($dpt));die;
		$data = [
			'total_vote' => count($dpt) - count($dptBelumMemilih),
			'total_dpt' => count($dpt)
		];
		echo json_encode($data);

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