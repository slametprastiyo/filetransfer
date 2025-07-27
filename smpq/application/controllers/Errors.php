<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Errors extends CI_Controller {

    public function page_not_found() {
        $this->output->set_status_header('404'); // Penting untuk mengirim header 404
        $this->load->view('errors/html/error_404'); // Muat view kustom Anda
    }
}