<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Search extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();

        $this->load->model('galeri_model');
        $this->load->model('news_model');
    }
    public function q()
    {
         $keyword = $this->uri->segment(3);
        // $galeri = $this->galeri_model->search_galeri($keyword);
        // $berita = $this->news_model->search_berita($keyword);
        // $b = [];
        // $c = [];
        $allResult = [];
        $ids = [];

        $berita = $this->news_model->search_berita($keyword);
        $beritaTagBased = $this->news_model->search_berita_by_tag($keyword);
        foreach($berita as $br){
            $allResult[] = $br['id'];
        }
        foreach($beritaTagBased as $btb){
            $allResult[] = $btb['id'];
        }
        // var_dump($allResult);
        // echo 
        foreach($allResult as $ar){
            if(!in_array($ar, $ids )){
                $ids[] = $ar;
            }
        }
        // foreach($berita as $br){
        //     array_push($b, $br['id']);
        // }

        // foreach($beritaTagBased as $btb){
        //     foreach($b as $bResult){
        //         if($btb['id'] != $bResult){
        //             array_push($c, $btb['id']);
        //         }
        //     }
        //     // var_dump($btb['id']);
        // }
        // var_dump($b);
        // echo "<hr>";
        // var_dump($c);
        // $b = array_unique($b);
        $finalResult = [];

        foreach($ids as $id){
          array_push($finalResult, $this->news_model->get_news($id,null,null,"ASC"));
        }
        // var_dump($finalResult);
        // die;
        $data = [
            // 'berita' => $this->news_model->search_berita($keyword),
            'berita' => $finalResult,
            'galeri' => $this->galeri_model->search_galeri($keyword)
        ];
        echo json_encode($data);
    }
   
}