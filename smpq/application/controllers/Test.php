<?php
defined('BASEPATH') or exit('No direct script access allowed');

require 'vendor/autoload.php';

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use PhpOffice\PhpSpreadsheet\Writer\Xls;
use PhpOffice\PhpSpreadsheet\Writer\Csv;

class Test extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();


        $this->load->model('news_model');
    }
    public function index()
    {

        $recentNews = $this->news_model->get_recent_news();
        // var_dump($news);die;
        $locale = 'id_ID';
        $fmt = new IntlDateFormatter($locale, IntlDateFormatter::FULL, IntlDateFormatter::SHORT, 'Asia/Jakarta', IntlDateFormatter::GREGORIAN, 'd MMMM yyyy');

        // Format the date and time
        $recentNewsDateFormated = [];
        foreach ($recentNews as $n) {
            $date = $fmt->format(intval($n['created_at']));
            $n['created_at'] = $date;
            // var_dump($n);
            // echo "<hr>";
            array_push($recentNewsDateFormated, $n);
        }

            $spreadsheet = new Spreadsheet();
    
            $sheet = $spreadsheet->getActiveSheet();
    
            $sheet->setCellValue('A1', 'ID');
            $sheet->setCellValue('B1', 'Judul');
            $sheet->setCellValue('C1', 'Tanggal Dibuat');
    
            $rowCount = 2;
            foreach($recentNewsDateFormated as $data)
            {
                $sheet->setCellValue('A'.$rowCount, $data['id']);
                $sheet->setCellValue('B'.$rowCount, $data['title']);
                $sheet->setCellValue('C'.$rowCount, $data['created_at']);
                $rowCount++;
            }
    
            
                $writer = new Xlsx($spreadsheet);
                $final_filename = 'test.xlsx';
            
    
            // $writer->save($final_filename);
            header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
            header('Content-Disposition: attactment; filename="'.urlencode($final_filename).'"');
            $writer->save('php://output');
    
        
    }
    public function geolocation(){
        $this->load->view("geolocation");
    }
    
    public function dynamicNotif(){
        $this->load->view("test/dynamic-notif");
    }
    public function cssBorderAnimation(){
        $this->load->view("test/css-border-animation");
    }
    public function rotation(){
        $this->load->view("test/rotation");
    }
}