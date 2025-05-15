<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Webp extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->library('image_lib');
        $this->load->helper('file');
        $this->load->helper('url');


    }
	public function index()

	{
        $data = [
            "name" => null
        ];
		$this->load->view('convert_webp', $data);

	}
    public function convert()
    {
        $directory_path ='./public/assets/images/convert_webp';
delete_files($directory_path, TRUE);
        $path = './public/assets/images/convert_webp';
        $newName = time();
        $config['upload_path'] = $path;
        $config['allowed_types'] = 'webp|jpg|jpeg|png';
        $config['file_name'] = $newName;
        $this->load->library('upload', $config);
        if (!$this->upload->do_upload('fileToConvert')) {
            $error = $this->upload->display_errors();
            $this->session->set_flashdata("error", $error);
            // $this->load->view('admin/banner', $data);
            // $this->load->view('admin/admin-footer');
            redirect("webp");
            // var_dump( $this->upload->data());die;

        } else {
            $upload_data = $this->upload->data();
            $this->convert_to_webp_format($upload_data['full_path'], "./public/assets/images/convert_webp/".$newName.".webp");
            $data = [
                "name" => $newName
            ];
		$this->load->view('convert_webp', $data);
        }
    }
    private function convert_to_webp_format($source, $destination)
    { // Get the image info 
        $info = getimagesize($source);
        if ($info['mime'] == 'image/jpeg') {
            $image = imagecreatefromjpeg($source);
        } elseif ($info['mime'] == 'image/gif') {
            $image = imagecreatefromgif($source);
        } elseif ($info['mime'] == 'image/jpg') {
            $image = imagecreatefromjpeg($source);
        } elseif ($info['mime'] == 'image/png') {
            $image = @imagecreatefrompng($source);
        } else {
            echo "Unsupported image type.";
            return;
        } 
        $result = imagewebp($image, $destination, 90); // 80 is the quality factor (0-100) 
        imagedestroy($image);
        return $result;
    }
}
