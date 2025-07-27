<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('banner_model');
        $this->load->model('news_model');
        $this->load->model('user_model');
        $this->load->model('galeri_model');
        $this->load->model('category_model');
        $this->load->model('user_role_model');
        $this->load->model('Controller_model');
        $this->load->model('News_additional_image_model');
        $this->load->model('kehadiran_gtk_model');
        $this->load->library('image_lib');
        $this->load->library('pagination');
        $this->load->library('form_validation');
        $this->load->helper('form');

        $this->check_login();

    }
    public function index()
    {
        $this->load->view('header', );
        $this->load->view('admin/index');
        $this->load->view('footer');
    }
    public function tahfidz(){
        $this->load->view('header', );
        $this->load->view('admin/tahfidz');
        $this->load->view('footer');
        
    }

    public function program()
    {

        // var_dump($data);die;
        $this->load->view('admin/admin-header', );
        $this->load->view('admin/program', );
        $this->load->view('admin/admin-footer');
    }
    public function banner()
    {
        $data['banners'] = $this->banner_model->get_banner();
        // $data["banners"] = json_decode(json_encode($result), true);
        $data["error"] = "";
        $data["success"] = "";
        // var_dump($data);die;
        // foreach($data['banners'] as $b){
        //     var_dump($b);
        //     echo "<hr>";
        // }
        // die;
        $this->load->view('admin/admin-header', );
        $this->load->view('admin/banner', $data);
        $this->load->view('admin/admin-footer');
    }
    public function banner_upload()
    {
        // var_dump($_POST['banner-mobile']);die;

        $path = './public/assets/images';
        $newName = time();

        $mobile = null;
        $desktop = null;
        $config['upload_path'] = $path;
        $config['allowed_types'] = 'webp|jpg|jpeg|png';

        $newFileName = $newName;
        $config['file_name'] = $newFileName; // Generate a new file name

        $this->load->library('upload', $config);

        if (!$this->upload->do_upload('banner-mobile')) {
            $error = $this->upload->display_errors();
            $data["success"] = false;
            $this->session->set_flashdata("error", $error);
            // $this->load->view('admin/banner', $data);
            // $this->load->view('admin/admin-footer');
            redirect("admin/banner");
            // var_dump( $this->upload->data());die;

        } else {
            $upload_data = $this->upload->data();
            $filePath = $upload_data['full_path'];
            $fileSize = $upload_data['file_size']; // File size in KB
            $fileResizedPath = $path . "/" . $upload_data['raw_name'] . $upload_data['file_ext'];
            // var_dump($upload_data['file_ext']);die;
            if ($fileSize > 500) { // Resize configuration
                $resizeConfig['image_library'] = 'gd2';
                $resizeConfig['source_image'] = $filePath;
                $resizeConfig['maintain_ratio'] = TRUE;
                $resizeConfig['width'] = 1000; // Resize to 800 pixels width
                $resizeConfig['height'] = 800; // Resize to 600 pixels height if needed 
                $this->image_lib->initialize($resizeConfig);
                ($this->image_lib->resize());
            }
            // var_dump($upload_data['file_ext']);die;

            $new_file_name = $path . "/" . $newName . "-mobile" . $upload_data['file_ext']; // Set your desired new file name
            // echo $filePath;
            // echo $new_file_name;die;
            rename($filePath, $new_file_name);
            // $webpImagePath = $this->generate_new_name($upload_data['raw_name'], $upload_data['file_ext']); // Convert the resized image to WebP

            if ($upload_data['file_ext'] != ".webp") {
                $mobileName = $newName . "-mobile.webp";
                $this->convert_to_webp_format($new_file_name, "./public/assets/images/" . $mobileName);

                if (file_exists($new_file_name)) {
                    unlink($new_file_name);
                }
            }
            $mobile = $newName . "-mobile.webp";
            // -------------------------------------------------
            if (!$this->upload->do_upload('banner-desktop')) {
                $error = $this->upload->display_errors();
                $data["success"] = false;
                $this->session->set_flashdata("error", $error);
                // $this->load->view('admin/banner', $data);
                // $this->load->view('admin/admin-footer');
                redirect("admin/banner");
                // var_dump( $this->upload->data());die;

            } else {
                $upload_data = $this->upload->data();
                $filePath = $upload_data['full_path'];
                $fileSize = $upload_data['file_size']; // File size in KB
                $fileResizedPath = $path . "/" . $upload_data['raw_name'] . $upload_data['file_ext'];
                // var_dump($upload_data['file_ext']);die;
                if ($fileSize > 500) { // Resize configuration
                    $resizeConfig['image_library'] = 'gd2';
                    $resizeConfig['source_image'] = $filePath;
                    $resizeConfig['maintain_ratio'] = TRUE;
                    $resizeConfig['width'] = 2000; // Resize to 800 pixels width
                    $resizeConfig['height'] = 1000; // Resize to 600 pixels height if needed 
                    $this->image_lib->initialize($resizeConfig);
                    ($this->image_lib->resize());
                }
                // var_dump($upload_data['file_ext']);die;

                $new_file_name = $path . "/" . $newName . "-desktop" . $upload_data['file_ext']; // Set your desired new file name
                // echo $new_file_name;die;
                rename($filePath, $new_file_name);
                // $webpImagePath = $this->generate_new_name($upload_data['raw_name'], $upload_data['file_ext']); // Convert the resized image to WebP

                if ($upload_data['file_ext'] != ".webp") {
                    $desktopName = $newName . "-desktop.webp";
                    $this->convert_to_webp_format($new_file_name, "./public/assets/images/" . $desktopName);
                    if (file_exists($new_file_name)) {
                        unlink($new_file_name);
                    }
                }
                $desktop = $newName . "-desktop.webp";
            }
            // -------------------------------------------------


        }




        // var_dump($mobile);
        // echo "<hr>";
        // var_dump($desktop);die;
        $save = [
            "name"
        ];


        // Retrieve input value
        $name = $this->input->post('name');
        $lastBanner = $this->banner_model->get_banner(null, "DESC", "one");
        // var_dump($lastBanner);
        if ($lastBanner == null) {
            $save = [
                'name' => $name,
                'mobile' => $mobile,
                'desktop' => $desktop,
                'timestamp' => time()
            ];
        } else {
            $save = [
                'name' => $name,
                'mobile' => $mobile,
                'desktop' => $desktop,
                'timestamp' => time(),
                'priority' => ((int) $lastBanner['priority']) + 1
            ];
        }
        $this->banner_model->set_banner($save);

        $data["error"] = "";
        $data["success"] = true;

        $this->session->set_flashdata("success", true);

        redirect("admin/banner");
    }


    private function generate_new_name()
    { // Generate a new unique name using the current timestamp and a random number
        $newName = time() . '_' . rand(1000, 9999) . '.webp';
        return './public/assets/images/' . $newName;
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
            $image = imagecreatefrompng($source);
        } else {
            echo "Unsupported image type.";
            return;
        } // Convert and save the image as WebP 
        $result = imagewebp($image, $destination, 80); // 80 is the quality factor (0-100) 
        imagedestroy($image);
        return $result;
    }


    public function banner_delete()
    {
        $id = $this->uri->segment(3);
        // var_dump($id);
        $banner = $this->banner_model->get_banner($id);
        // var_dump($banner);die;
        $file_path_mobile = './public/assets/images/' . $banner['mobile'];
        $file_path_desktop = './public/assets/images/' . $banner['desktop'];
        // var_dump(file_exists($file_path));die;
        // Delete the image file from the directory
        if (file_exists($file_path_mobile)) {
            unlink($file_path_mobile);
        }
        if (file_exists($file_path_desktop)) {
            unlink($file_path_desktop);
        }
        // var_dump($this->uri->segment_array());
        if($this->banner_model->delete_banner($id)){
            $higherPriotityBanners = $this->banner_model->get_banner(null, "DESC", "all", (int) $banner['priority']);
            foreach ($higherPriotityBanners as $hpb) {
                $data = [
                    'name' => $hpb['name'],
                    'mobile' => $hpb['mobile'],
                    'desktop' => $hpb['desktop'],
                    'timestamp' => time(),
                    'priority' => ((int) $hpb['priority']) - 1
                ];
                $this->banner_model->update_banner($hpb['id'], $data);
            }
            $this->reset_priority();
            // var_dump($banner);die;
            echo 1;
        }
        
        // redirect("admin/banner");

    }


    public function banner_priority()
    {
        // $string = "3";
        // var_dump($string);
        // $number = intval($string);
        // var_dump($number);die;
        // var_dump($this->uri->segment_array());die;
        $move = $this->uri->segment(3);
        $id = $this->uri->segment(4);
        // var_dump($move);die;
        $banner = $this->banner_model->get_banner($id);
        $priority = ((int) $banner['priority']);
        // var_dump( $priority);die;
        $data = [
            'name' => $banner['name'],
            'mobile' => $banner['mobile'],
            'desktop' => $banner['desktop'],
            'timestamp' => $banner['timestamp']
        ];
        if ($move == "up") {
            $priority = $priority + 1;
            $d['priority'] = $priority;

            $higherPriotityBanner = $this->banner_model->get_banner_by_priority($priority);
            if ($higherPriotityBanner != null) {
                $this->banner_model->update_banner($id, $d);
                $data = [
                    'priority' => ((int) $higherPriotityBanner['priority']) - 1
                ];
                echo ($this->banner_model->update_banner($higherPriotityBanner['id'], $data));

            }

        }
        if ($move == "down") {
            if ($priority > 0) {
                $priority = $priority - 1;
            }else if($priority == 0){
                $priority = 1;
            }
            $d['priority'] = $priority;
            $lowerPriotityBanner = $this->banner_model->get_banner_by_priority($priority);
            if ($lowerPriotityBanner != null) {
                $this->banner_model->update_banner($id, $d);
                $data = [
                    'priority' => ((int) $lowerPriotityBanner['priority']) + 1
                ];
                echo ($this->banner_model->update_banner($lowerPriotityBanner['id'], $data));
                // if($this->banner_model->update_banner($lowerPriotityBanner['id'], $data)){
                //     echo json_encode(['status'=> 1]);
                // }else{
                //     echo json_encode(['status'=> 0]);
                // }

            }
        }
        if ($move == "top") {

            $higherPriotityBanners = $this->banner_model->get_banner(null, "DESC", "all", intval($banner['priority']));
            $highestPriority = $this->banner_model->get_banner(null, "DESC", "one", 0);
            $d['priority'] = intval($highestPriority['priority']);
            // var_dump($higherPriotityBanners);die;
            foreach($higherPriotityBanners as $hpb){
                $data = [
                    'priority' => ((int) $hpb['priority']) - 1
                ];
                $this->banner_model->update_banner(intval($hpb['id']), $data);
            }

            echo($this->banner_model->update_banner($id, $d));
        }
        if ($move == "bottom") {

            $lowerPriotityBanners = $this->banner_model->get_lower_priority_banners(intval($banner['priority']), "all");
            $d['priority'] = 1;
            // var_dump($lowerPriotityBanners);die;
            foreach($lowerPriotityBanners as $lpb){
                $data = [
                    'priority' => ((int) $lpb['priority']) + 1
                ];
                $this->banner_model->update_banner(intval($lpb['id']), $data);
            }

            echo($this->banner_model->update_banner($id, $d));
        }

        // maintain nilai priority
//         $lowestPriorityBanner = $this->banner_model->get_lowest_priority_banner();
//         $lowestPriority = (int)$lowestPriorityBanner['priority'];
//         if($lowestPriority > 0){
// $this->reset_priority($lowestPriority);die;
//         }
        // $this->reset_priority();
        // var_dump($lowestPriorityBanner);die;
        // maintain nilai priority end
        // redirect("admin/banner");
        // echo json_encode([
        //     'status' => 'success',
        // 'banners' => $this->banner_model->get_banner()
        // ]);

    }
    public function repopulateBanner()
    {
        echo json_encode($this->banner_model->get_banner_sort_by_priority("DESC"));
    }
    private function reset_priority()
    {
        $banners = $this->banner_model->get_banner(null, "ASC");
        if($banners){
            // var_dump($banners);die;
            $newBanners = [];
    
            $lowestPriorityBanner = $this->banner_model->get_banner(null, "ASC", "one");
            $lowestPriority = (int) $lowestPriorityBanner['priority'];
            // var_dump($lowestPriority);
            if ($lowestPriority > 1) {
    
                foreach ($banners as $banner) {
                    $data = [
                      
                        'priority' => (((int) $banner['priority']) - $lowestPriority) + 1
                    ];
                    array_push($newBanners, $data);
                    $this->banner_model->update_banner($banner['id'], $data);
                    // var_dump($data);
                    // echo "<hr>";
                }
            }

        }


    }
    public function galeri()
    {
        $data['galeries'] = $this->galeri_model->get_galeri();

        // var_dump($data);die;
        $this->load->view('header', );
        $this->load->view('admin/galeri', $data);
        $this->load->view('footer');
    }
  
    public function galeri_upload() {
        $count_files = count($_FILES['userfile']['name']);
        $upload_data = [];

        $group = time();
        for ($i = 0; $i < $count_files; $i++) {
            $_FILES['file']['name'] = $_FILES['userfile']['name'][$i];
            $_FILES['file']['type'] = $_FILES['userfile']['type'][$i];
            $_FILES['file']['tmp_name'] = $_FILES['userfile']['tmp_name'][$i];
            $_FILES['file']['error'] = $_FILES['userfile']['error'][$i];
            $_FILES['file']['size'] = $_FILES['userfile']['size'][$i];

            // Generate a unique file name
            $new_name = time() . '_' .$i;

            $config['upload_path'] = './public/assets/images/tes/';
            $config['allowed_types'] = 'jpg|png|webp';  // Allowed types: jpg, png, and webp
            $config['max_size'] = 1000;  // Adjust as needed
            $config['file_name'] = $new_name;

            $this->load->library('upload', $config);

            if (!$this->upload->do_upload('file')) {
                $error = array('error' => $this->upload->display_errors());
                $this->load->view('upload_form', $error);
                return;
            } else {
                $data = $this->upload->data();
                // $upload_data[] = $data;

                // Resize if file size is larger than 500KB
                if ($data['file_size'] > 500) {  // size in KB
                    $resize_config['image_library'] = 'gd2';
                    $resize_config['source_image'] = $data['full_path'];
                    // $resize_config['new_image'] = './public/assets/images/tes/resized_' . $new_name;
                    $resize_config['maintain_ratio'] = TRUE;
                    $resize_config['width'] = 800;  // Set your desired width
                    $resize_config['height'] = 600;  // Set your desired height

                    $this->image_lib->initialize($resize_config);

                    if (!$this->image_lib->resize()) {
                        $error = array('error' => $this->image_lib->display_errors());
                        $this->load->view('upload_form', $error);
                        return;
                    }

                    $this->image_lib->clear();
                }

                $resize_config['image_library'] = 'gd2';
                $resize_config['source_image'] = $data['full_path'];
                $resize_config['new_image'] = './public/assets/images/tes/thumb_' . $new_name. $data['file_ext'];
                $resize_config['maintain_ratio'] = TRUE;
                $resize_config['width'] = 10;  // Set your desired width
                $resize_config['height'] = 10;  // Set your desired height

                $this->image_lib->initialize($resize_config);

                if (!$this->image_lib->resize()) {
                    $error = array('error' => $this->image_lib->display_errors());
                    $this->load->view('upload_form', $error);
                    return;
                }

                $this->image_lib->clear();
                // $resized_file_path = 'thumb_' . pathinfo($new_name, PATHINFO_FILENAME) . $data['file_ext'];
                // $this->resize_image($data['full_path'], $resized_file_path);
                // Check if the image is in WebP format, if not convert it
                if ($data['file_ext'] !== '.webp') {
                    // $image_path = $data['full_path'];
                    $webp_image_path = './public/assets/images/tes/' . pathinfo($new_name, PATHINFO_FILENAME) . '.webp';

                    $this->convert_to_webp_format($data['full_path'], $webp_image_path);
                    
                }
            //     $resized_file_path = 'thumb_' . pathinfo($new_name, PATHINFO_FILENAME) . '.webp';
            // $this->resize_image($data['full_path'], $resized_file_path);
            }
            usleep(600000);
        }

        // $this->load->view('upload_success', array('upload_data' => $upload_data));
    }


    public function galeri_delete()
    {
        $id = $this->uri->segment(3);
        // var_dump($id);die;
        $galeri = $this->galeri_model->get_galeri($id);
        // var_dump($galeri);die;
        $file_path_hd = './public/assets/images/' . $galeri['hd'];
        $file_path_thumb = './public/assets/images/' . $galeri['thumb'];
        // var_dump(file_exists($file_path_hd));die;
        // Delete the image file from the directory
        if (file_exists($file_path_hd)) {
            unlink($file_path_hd);
        }
        if (file_exists($file_path_thumb)) {
            unlink($file_path_thumb);
        }
        // var_dump($this->uri->segment_array());
        $this->galeri_model->delete_galeri($id);
        redirect("admin/galeri");

    }



    public function news()
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
	$fmt = new IntlDateFormatter($locale, IntlDateFormatter::FULL, IntlDateFormatter::SHORT, 'Asia/Jakarta', IntlDateFormatter::GREGORIAN, 'dd / MM / YYYY HH:mm \'WIB\'');

    

	// Format the date and time
	$newsDateFormated = [];
	foreach($data['results'] as $n){
		$date = $fmt->format(intval($n['created_at']));
		$n['created_at'] = $date;
        $isi = str_replace("|", "\n", $n['isi']);
        $n['isi'] = $isi;
	array_push($newsDateFormated, $n);
	}
	$data['news'] = $newsDateFormated;
    // var_dump($data);die;
        $this->load->view('admin/admin-header', );
        $this->load->view('admin/news', $data);
        $this->load->view('admin/admin-footer');
    }
//     public function news_upload()
//     {

        

//         $config['upload_path'] = './public/assets/images/';
//         $config['allowed_types'] = 'webp|jpg|jpeg|png';
//         $config['max_size'] = 2048;
//         $newFileName = time();
//         $config['file_name'] = $newFileName; // Generate a new file name



//         $this->load->library('upload', $config);

//         if (!$this->upload->do_upload('userfile')) {
//             $error = $this->upload->display_errors();
//             $this->session->set_flashdata("error", $error);
//             redirect("admin/news");

//         } else {


//             $upload_data = $this->upload->data();

//             // Save the original file path
//             $original_file_path = $upload_data['full_path'];

//             // Create a resized image
//             $resized_file_path = $upload_data['file_path'] . "thumb" . $upload_data['file_name'];
//             $this->resize_image($original_file_path, $resized_file_path);

//             // $data = array('upload_data' => $upload_data, 'original_file_path' => $original_file_path, 'resized_file_path' => $resized_file_path);
//             $isi = htmlspecialchars($this->input->post("isi"));
//             // var_dump($isi);
//             // echo "<br>";
//             $isi = str_replace("\n", "|", $isi);
//             $isi = "|" . $isi . "|";
//             // var_dump($isi);die;
//             $excerpt = $isi;
//             if (strlen($isi) > 350) {
//                 $excerpt = substr($excerpt, 0,350);
//             }
//             $file_extension = pathinfo($upload_data['file_name'], PATHINFO_EXTENSION);

//             // mengkonversi hd image ke webp
//             if($file_extension != "webp"){
//                 $this->convert_to_webp_format("./public/assets/images/".$newFileName . "." . $file_extension, "./public/assets/images/".$newFileName .".webp");
//                 if(file_exists("./public/assets/images/".$newFileName . "." . $file_extension)){
//                     unlink("./public/assets/images/".$newFileName . "." . $file_extension);
//                 }
              
//             }
//             // category start -------------------------------------------------------------------------------------
//             $inputCat = $this->input->post("category");
//             $is_exist = $this->category_model->is_exist("news_category", "name", $inputCat);
           
//             //// kalau sudah ada, maka ambil id nya
//             if($is_exist == true){
//                 $cat = $this->category_model->get_category_by_name($inputCat);
//             }else{
//                 ///// kalau belum ada, maka tambahkan ke tabel
//                 $this->category_model->insert($inputCat);
//                 $cat = $this->category_model->get_category_by_name($inputCat);
//             }

//             // tags start -------------------------------------------------------------------------------------
//         $this->load->model('tags_model');
//         $tags = $this->input->post("tagar");
//         $tags = explode(",", $tags); 
//         $tags = array_filter($tags); // menghapus value kosong
//         $tags = array_unique($tags); // menghapus value duplikat
//         $tags = array_values($tags); // mengindeks ulang array
//         $tags = array_map('trim', $tags);
//         $tagar = "";
//         $allExistingTags = $this->tags_model->get_tags();


//         // $newTags = [];
//         $newTags = []; // menampung tag-tag baru tmp
//         $existingTags = []; // menampung tag-tag yang sudah ada tmp

//         foreach($tags as $key => $tag){
//             // $tag = trim($tag);
//             // $tag = strtolower($tag);
//             $new = 0;
//             foreach($allExistingTags as $allExistingTag){
//                 if($tag == $allExistingTag['name']){
//                     $new += 0;
//                 }else{
//                     $new += 1;
//                 }

//             }
//             if($new < count($allExistingTags)){
//                 array_push($existingTags, $tag);
//             }else if($new == count($allExistingTags)){
//                 array_push($newTags, $tag);
//             }
//             if($key >= (count($tags) - 1)){
//             $tagar .= $tag;                
//             }else{
//             $tagar .= $tag . ",";                

//             }
//         }
//         foreach($newTags as $nt){ //masukkan tag-tag baru
//             $this->tags_model->set_tags(
//                 [
//                     'name'  => $nt,
//                     'used'  => 1
//                 ]
//             );
//         }

        
//         foreach($existingTags as $et){ // update existing tags
//             // echo $et . " is an existing tag";
//             // echo "<br>";
//             $currentTag = $this->tags_model->get_tag_by_name($et);
//             $data = [
//                 'name'  => $currentTag['name'],
//                 'used'  => (int) $currentTag['used'] + 1
//             ];
//             $this->tags_model->update_tag($data, $et);
//         }
// // tags end -----------------------------------------------------------------------
//             $save = [
//                 "title" => strtolower(htmlspecialchars($this->input->post('judul'))),
//                 "excerpt" => $excerpt,
//                 "hd" => $newFileName . ".webp",
//                 "thumb" => "thumb" . $newFileName . "." . $file_extension,
//                 "created_at" => time(),
//                 // "isi"           => nl2br($isi)
//                 "category" => $cat['id'],
//                 "tags"  => $tagar,
//                 "isi" => $isi,
//                 "link" => $this->input->post('link'),

//             ];


//             // Get the file extension using pathinfo()

//             $this->news_model->set_news($save);


// // --- Handle Additional Images --------------------------------------------------
//         // The HTML form input for these images should be named 'additional_images[]'
//         if (!empty($_FILES['additional_images']['name'][0])) {
//             // var_dump("helo");die;
//             $additional_upload_config['upload_path'] = './public/assets/images/';
//             $additional_upload_config['allowed_types'] = 'webp|jpg|jpeg|png';
//             $additional_upload_config['max_size'] = 2048; // 2MB per image

//             $this->upload->initialize($additional_upload_config); // Re-initialize upload library for additional images

//             $files = $_FILES['additional_images'];
//             $num_files = count($files['name']);

//             for ($i = 0; $i < $num_files; $i++) {
//                 // Prepare single file for upload library
//                 $_FILES['additional_image_single']['name'] = $files['name'][$i];
//                 $_FILES['additional_image_single']['type'] = $files['type'][$i];
//                 $_FILES['additional_image_single']['tmp_name'] = $files['tmp_name'][$i];
//                 $_FILES['additional_image_single']['error'] = $files['error'][$i];
//                 $_FILES['additional_image_single']['size'] = $files['size'][$i];

//                 $additional_newFileName = time() . '_' . uniqid(); // Unique name for each additional image
//                 $additional_upload_config['file_name'] = $additional_newFileName;
//                 $this->upload->initialize($additional_upload_config, TRUE); // TRUE for reset

//                 if ($this->upload->do_upload('additional_image_single')) {
//                     $additional_upload_data = $this->upload->data();
//                     $additional_original_file_path = $additional_upload_data['full_path'];
//                     $additional_file_extension = pathinfo($additional_upload_data['file_name'], PATHINFO_EXTENSION);

//                     // Create thumbnail for additional image
//                     $additional_thumb_filename = "thumb" . $additional_newFileName . "." . $additional_file_extension;
//                     $additional_resized_file_path = $additional_upload_data['file_path'] . $additional_thumb_filename;
//                     $this->resize_image($additional_original_file_path, $additional_resized_file_path);

//                     // Convert additional image to WebP
//                     $additional_hd_filename = $additional_newFileName . ".webp";
//                     if(strtolower($additional_file_extension) != "webp"){
//                         if ($this->convert_to_webp_format($additional_original_file_path, $additional_upload_data['file_path'] . $additional_hd_filename)) {
//                             // Delete original additional file after successful WebP conversion
//                             if(file_exists($additional_original_file_path)){
//                                 unlink($additional_original_file_path);
//                             }
//                         } else {
//                             log_message('error', 'Failed to convert additional image to WebP: ' . $additional_original_file_path);
//                             // Continue processing other images even if one fails
//                         }
//                     } else {
//                         // If already webp, just ensure the filename is correct for saving
//                         $additional_hd_filename = $additional_upload_data['file_name'];
//                     }

//                     // Save additional image data to news_additional_image table
//                     $additional_data = [
//                         'news_id' => $news_id,
//                         'filename_hd' => $additional_hd_filename,
//                         'filename_thumb' => $additional_thumb_filename,
//                         'created_at' => time()
//                     ];
//                     $this->news_additional_image_model->insert_additional_image($additional_data);

//                 } else {
//                     // Log error for individual additional image upload failure
//                     log_message('error', 'Additional image upload failed: ' . $this->upload->display_errors());
//                 }
//             }
//         }
// // --- Handle Additional Images end -----------------------------------------

//             $this->session->set_flashdata("success", true);

//             redirect("admin/news");
//         }
//     }

    public function news_upload()
    {
        // Load necessary models
        $this->load->model('news_model');
        $this->load->model('category_model');
        $this->load->model('tags_model');
        $this->load->model('news_additional_image_model'); // New model for additional images

// var_dump($_FILES);die;
        // --- Main Image Upload ---
        $config['upload_path'] = './public/assets/images/';
        $config['allowed_types'] = 'webp|jpg|jpeg|png';
        $config['max_size'] = 2048; // 2MB
        $newFileName = time();
        $config['file_name'] = $newFileName; // Generate a new file name

        $this->load->library('upload', $config);

        if (!$this->upload->do_upload('userfile')) {
            $error = $this->upload->display_errors();
            $this->session->set_flashdata("error", $error);
            redirect("admin/news");
            return; // Stop execution if main upload fails
        } else {
            $upload_data = $this->upload->data();
            $original_file_path = $upload_data['full_path'];
            $file_extension = pathinfo($upload_data['file_name'], PATHINFO_EXTENSION);

            // Create a resized thumbnail for the main image
            $main_thumb_filename = "thumb" . $newFileName . "." . $file_extension;
            $resized_file_path = $upload_data['file_path'] . $main_thumb_filename;
            $this->resize_image($original_file_path, $resized_file_path);

            // Convert main image to WebP if not already
            $main_hd_filename = $newFileName . ".webp";
            if(strtolower($file_extension) != "webp"){
                if ($this->convert_to_webp_format($original_file_path, $upload_data['file_path'] . $main_hd_filename)) {
                    // Delete original file after successful WebP conversion
                    if(file_exists($original_file_path)){
                        unlink($original_file_path);
                    }
                } else {
                    // Handle WebP conversion failure for main image
                    log_message('error', 'Failed to convert main image to WebP: ' . $original_file_path);
                    $this->session->set_flashdata("error", "Failed to process main image.");
                    redirect("admin/news");
                    return;
                }
            } else {
                // If already webp, just ensure the filename is correct for saving
                $main_hd_filename = $upload_data['file_name'];
            }
        }

        // --- Content Processing ---
        $isi = htmlspecialchars($this->input->post("isi"));
        $isi = str_replace("\n", "|", $isi); // Custom delimiter for newlines
        $isi = "|" . $isi . "|"; // Custom wrapper
        $excerpt = $isi;
        if (strlen($isi) > 350) {
            $excerpt = substr($excerpt, 0, 350);
        }

        // --- Category Handling ---
        $inputCat = $this->input->post("category");
        $cat = null;
        if (!empty($inputCat)) {
            $is_exist = $this->category_model->is_exist("news_category", "name", $inputCat);

            if($is_exist == true){
                $cat = $this->category_model->get_category_by_name($inputCat);
            }else{
                $this->category_model->insert($inputCat);
                $cat = $this->category_model->get_category_by_name($inputCat);
            }
        }

        // --- Tags Handling ---
        $tags = $this->input->post("tagar");
        $tags = explode(",", $tags);
        $tags = array_filter($tags); // remove empty values
        $tags = array_unique($tags); // remove duplicate values
        $tags = array_values($tags); // re-index array
        $tags = array_map('trim', $tags);

        $tagar_string = ""; // To store comma-separated tags for the news table
        $allExistingTags = $this->tags_model->get_tags();

        $newTags = []; // To hold new tags
        $existingTags = []; // To hold existing tags

        // Optimized tag detection
        $existingTagNames = array_column($allExistingTags, 'name'); // Get just the names for faster lookup

        foreach($tags as $tag){
            if (in_array($tag, $existingTagNames)) {
                $existingTags[] = $tag;
            } else {
                $newTags[] = $tag;
            }
        }

        foreach($newTags as $nt){
            $this->tags_model->set_tags(
                [
                    'name'  => $nt,
                    'used'  => 1
                ]
            );
        }

        foreach($existingTags as $et){
            $currentTag = $this->tags_model->get_tag_by_name($et);
            if ($currentTag) { // Ensure tag exists before updating
                $data = [
                    'name'  => $currentTag['name'],
                    'used'  => (int) $currentTag['used'] + 1
                ];
                $this->tags_model->update_tag($data, $et);
            }
        }
        $tagar_string = implode(",", $tags); // Reconstruct the tag string for saving

        // --- Save News Article (Main Data) ---
        $save = [
            "title" => strtolower(htmlspecialchars($this->input->post('judul'))),
            "excerpt" => $excerpt,
            "hd" => $main_hd_filename,
            "thumb" => $main_thumb_filename,
            "created_at" => time(),
            "category" => $cat ? $cat['id'] : null, // Use null if no category
            "tags"  => $tagar_string,
            "isi" => $isi,
            "link" => $this->input->post('link'),
        ];

        // This will return the ID of the newly inserted news article
        // Make sure your news_model->set_news method returns the insert_id()
        $uploaded_news = $this->news_model->set_news($save);

        if (!$uploaded_news) {
            $this->session->set_flashdata("error", "Failed to save news article.");
            redirect("admin/news");
            return;
        }
        // var_dump($uploaded_news);die;
// var_dump($_FILES['additional_images']['name'][0]);die;
        // --- Handle Additional Images ---
        // The HTML form input for these images should be named 'additional_images[]'
        // Check if files were actually uploaded and there are no PHP upload errors

        // if (isset($_FILES['additional_images']) ) {
        if (isset($_FILES['additional_images']) && !empty($_FILES['additional_images']['name'][0])) {

// echo "hello";die;

            $additional_upload_config['upload_path'] = './public/assets/images/news_additional_image/';
            $additional_upload_config['allowed_types'] = 'webp|jpg|jpeg|png';
            $additional_upload_config['max_size'] = 2048; // 2MB per image

            // Get the total number of files in the array
            $num_files = count($_FILES['additional_images']['name']);

            for ($i = 0; $i < $num_files; $i++) {
                // Check for PHP upload errors for the current file
                if ($_FILES['additional_images']['error'][$i] !== UPLOAD_ERR_OK) {
                    log_message('error', 'Additional image upload PHP error for file ' . $_FILES['additional_images']['name'][$i] . ': ' . $_FILES['additional_images']['error'][$i]);
                    // Optionally, set a flashdata message for this specific file error
                    continue; // Skip to the next file
                }

                // Prepare single file for CodeIgniter's upload library
                // This is a common workaround for array file inputs
                $_FILES['additional_image_single'] = [
                    'name' => $_FILES['additional_images']['name'][$i],
                    'type' => $_FILES['additional_images']['type'][$i],
                    'tmp_name' => $_FILES['additional_images']['tmp_name'][$i],
                    'error' => $_FILES['additional_images']['error'][$i],
                    'size' => $_FILES['additional_images']['size'][$i]
                ];

                $additional_newFileName = time() . '_' . uniqid(); // Unique name for each additional image
                $additional_upload_config['file_name'] = $additional_newFileName;

                // IMPORTANT: Re-initialize the upload library for each file
                // The TRUE argument resets the library's internal state
                $this->upload->initialize($additional_upload_config);

                if ($this->upload->do_upload('additional_image_single')) {
                    $additional_upload_data = $this->upload->data();
                    $additional_original_file_path = $additional_upload_data['full_path'];
                    $additional_file_extension = pathinfo($additional_upload_data['file_name'], PATHINFO_EXTENSION);

                    // Create thumbnail for additional image
                    $additional_thumb_filename = "thumb" . $additional_newFileName . "." . $additional_file_extension;
                    $additional_resized_file_path = $additional_upload_data['file_path'] . $additional_thumb_filename;
                    $this->resize_image($additional_original_file_path, $additional_resized_file_path);

                    // Convert additional image to WebP
                    $additional_hd_filename = $additional_newFileName . ".webp";
                    if(strtolower($additional_file_extension) != "webp"){
                        if ($this->convert_to_webp_format($additional_original_file_path, $additional_upload_data['file_path'] . $additional_hd_filename)) {
                            // Delete original additional file after successful WebP conversion
                            if(file_exists($additional_original_file_path)){
                                unlink($additional_original_file_path);
                            }
                        } else {
                            log_message('error', 'Failed to convert additional image to WebP: ' . $additional_original_file_path);
                            // Continue processing other images even if one fails
                        }
                    } else {
                        // If already webp, just ensure the filename is correct for saving
                        $additional_hd_filename = $additional_upload_data['file_name'];
                    }

                    // Save additional image data to news_additional_image table
                    $additional_data = [
                        'news_id' => $uploaded_news['id'],
                        'filename_hd' => $additional_hd_filename,
                        'filename_thumb' => $additional_thumb_filename,
                        'created_at' => time()
                    ];
                    $this->news_additional_image_model->insert_additional_image($additional_data);

                } else {
                    // Log error for individual additional image upload failure
                    log_message('error', 'Additional image upload failed for file ' . $_FILES['additional_images']['name'][$i] . ': ' . $this->upload->display_errors());
                }
            }
        }
// die;
// echo "additional image not read"; die;
        // --- Final Redirection ---
        $this->session->set_flashdata("success", true);
        redirect("admin/news");
    }
    public function news_edit()
    {
        $id = $this->uri->segment(3);
        $berita = $this->news_model->get_news($id);
        $isi = $berita['isi'];
        $isi = str_replace('|', "\n", $isi);

        $berita = [
            'title' => $berita['title'],
            'id' => $berita['id'],
            // 'isi'   => str_replace('<br />', "\n", $berita['isi']),
            // 'isi'   =>  $berita['isi'],
            'isi' => $isi,
            'hd' => $berita['hd'],
            'thumb' => $berita['thumb'],
            'created_at' => $berita['created_at']
        ];
        $data['berita'] = $berita;
        // var_dump($berita);die;
        if ($berita) {
            $this->load->view('admin/admin-header', );
            $this->load->view('admin/news-edit', $data);
            $this->load->view('admin/admin-footer');
        } else {
            redirect("admin/news");
        }
    }
    public function news_update()
    {
        // var_dump($this->input->post('id'));die;
        $config['upload_path'] = './public/assets/images/';
        $config['allowed_types'] = 'webp|jpg|jpeg|png';
        $config['max_size'] = 2048; // 1MB
        $newFileName = time();
        $config['file_name'] = $newFileName; // Generate a new file name

        $this->load->library('upload', $config);

        if (!empty($_FILES['userfile']['name'])) {
            if (!$this->upload->do_upload('userfile')) {
                $error = $this->upload->display_errors();
                $this->session->set_flashdata("error", $error);
                // $this->load->view('admin/banner', $data);
                // $this->load->view('admin/admin-footer');
                redirect("admin/news");

            
            // Get the file extension using pathinfo()
                redirect("admin/news");

            } else {
                // hapus foto lama
                $news = $this->news_model->get_news($this->input->post('id'));
                // var_dump($news);die;
                $file_path_hd = './public/assets/images/' . $news['hd'];
                $file_path_thumb = './public/assets/images/' . $news['thumb'];
                $this->unlinkImage($file_path_hd, $file_path_thumb);



                $upload_data = $this->upload->data();

                // Save the original file path
                $original_file_path = $upload_data['full_path'];

                // Create a resized image
                $resized_file_path = $upload_data['file_path'] . "thumb" . $upload_data['file_name'];
                $this->resize_image($original_file_path, $resized_file_path);

                // $data = array('upload_data' => $upload_data, 'original_file_path' => $original_file_path, 'resized_file_path' => $resized_file_path);
                $isi = htmlspecialchars($this->input->post("isi"));
                // var_dump($isi);
                // echo "<br>";
                $isi = str_replace("\n", "|", $isi);
                $isi = "|" . $isi . "|";
                // var_dump($isi);die;
                $excerpt = $isi;
                if (strlen($isi) > 200) {
                    $excerpt = substr($excerpt, 0, 50);
                }
                $file_extension = pathinfo($upload_data['file_name'], PATHINFO_EXTENSION);

                if($file_extension != "webp"){
                    $this->convert_to_webp_format("./public/assets/images/".$newFileName . "." . $file_extension, "./public/assets/images/".$newFileName .".webp");
                    if(file_exists("./public/assets/images/".$newFileName . "." . $file_extension)){
                        unlink("./public/assets/images/".$newFileName . "." . $file_extension);
                    }
                    
                }
                    $save = [
                        "title" => htmlspecialchars($this->input->post('judul')),
                        "excerpt" => $excerpt,
                        "hd" => $newFileName . ".webp",
                        "thumb" => "thumb" . $newFileName . "." . $file_extension,
                        "created_at" => time(),
                        // "isi"           => nl2br($isi)
                        "isi" => $isi
                    ];

                
                // Get the file extension using pathinfo()

                $this->news_model->update_news(htmlspecialchars($this->input->post('id')), $save);


                // $result = $this->banner_decode(json_encode($result), true);
                // $data["error"] = "";
                // $data["success"] = true;
                $this->session->set_flashdata("success-update", true);

                // $this->load->view('admin/banner', $data);
                // $this->load->view('admin/admin-footer');
                redirect("admin/news");
            }
        } else {
            $isi = htmlspecialchars($this->input->post("isi"));
            // var_dump($isi);
            // echo "<br>";
            $isi = str_replace("\n", "|", $isi);
            $isi = "|" . $isi . "|";
            // var_dump($isi);die;
            $excerpt = $isi;
            if (strlen($isi) > 200) {
                $excerpt = substr($excerpt, 0, 50);
            }
            $save = [
                "title" => htmlspecialchars($this->input->post('judul')),
                "excerpt" => $excerpt,
                "created_at" => time(),
                "isi" => $isi
            ];
            // Get the file extension using pathinfo()

            $this->news_model->update_news(htmlspecialchars($this->input->post('id')), $save);

            // $result = $this->banner_decode(json_encode($result), true);
            // $data["error"] = "";
            // $data["success"] = true;
            $this->session->set_flashdata("success-update", true);

            // $this->load->view('admin/banner', $data);
            // $this->load->view('admin/admin-footer');
            redirect("admin/news");
        }
    }
    // private function generate_new_file_name()

    public function unlinkImage($file_path_hd, $file_path_thumb)
    {
        if (file_exists($file_path_hd)) {
            unlink($file_path_hd);
        }
        if (file_exists($file_path_thumb)) {
            unlink($file_path_thumb);
        }
    }
    public function news_delete()
    {
        $id = $this->uri->segment(3);
        // var_dump($id);die;
        $news = $this->news_model->get_news($id);
        // var_dump($news);die;
        $file_path_hd = './public/assets/images/' . $news['hd'];
        $file_path_thumb = './public/assets/images/' . $news['thumb'];
        // var_dump(file_exists($file_path));die;
        // Delete the image file from the directory
        if (file_exists($file_path_hd)) {
            unlink($file_path_hd);
        }
        if (file_exists($file_path_thumb)) {
            unlink($file_path_thumb);
        }
        // var_dump($this->uri->segment_array());
        $this->news_model->delete_news($id);

        // $this->reset_priority();
        redirect("admin/news");

    }
    public function user_role(){
        $data = [
            'user_role' => $this->user_role_model->get_roles()
        ];
        
        $this->load->view("admin/user_role", $data);
    }
    public function add_user_role(){
        $this->load->view("admin/add_user_role");

    }

    public function insert_user_role(){
        $newRole = $this->input->post("role");
        $newRoleName = $this->input->post("role_name");
        $this->user_role_model->insert($newRole, $newRoleName);
                redirect("admin/user_role");
    }
    public function delete_user_role(){
        $id = $this->uri->segment(3);
        $this->user_role_model->delete($id);
                redirect("admin/user_role");


    }
    public function user_management(){
        $data = [
            "users" =>  $users = $this->user_model->get_users(),
            "available_roles"   => $this->user_role_model->get_roles()

        ];
       
        // var_dump($data['available_roles']);die;
        $this->load->view("admin/user_management", $data);
    }

    public function add_user(){
        $data = [
            'user_role' => $this->user_role_model->get_roles()

        ];
        $this->load->view("admin/add_user", $data);
    }
     public function insert_user()
    {
        // var_dump($this->input->post("role"));die;


    // Aturan validasi untuk setiap field
        $this->form_validation->set_rules('username', 'Username', 'required|min_length[4]|max_length[50]|is_unique[user.username]');
        $this->form_validation->set_rules('fullname', 'Full Name', 'required|min_length[5]|max_length[100]');
        $this->form_validation->set_rules('password', 'Password', 'required|min_length[6]');
        $this->form_validation->set_rules('passconf', 'Password Confirmation', 'required|matches[password]');

        // Mengatur pesan error kustom
        $this->form_validation->set_message('required', 'Field {field} harus diisi.');
        $this->form_validation->set_message('min_length', 'Field {field} minimal {param} karakter.');
        $this->form_validation->set_message('max_length', 'Field {field} maksimal {param} karakter.');
        $this->form_validation->set_message('is_unique', 'Field {field} sudah digunakan, silakan pilih yang lain.');
        $this->form_validation->set_message('matches', 'Konfirmasi password tidak cocok dengan password.');
if ($this->form_validation->run() == FALSE)
        {
            // Jika validasi gagal, kembali ke form dengan error
           $data = [
            'user_role' => $this->user_role_model->get_roles()

        ];
        $this->load->view("admin/add_user", $data);
        }
        else
        {
            $selected_roles = $this->input->post('role');
            // Jika tidak ada role yang dipilih (misalnya form dikirim tanpa checkbox tercentang), set ke array kosong
            if (!is_array($selected_roles)) {
                $selected_roles = [];
            }
            // Menggabungkan array role ID menjadi string yang dipisahkan koma
            $roles_string = implode(',', $selected_roles);

            $data = array(
                'id'         => $this->generate_unique_id(), // Menghasilkan ID unik
                'username'   => $this->input->post('username'),
                'fullname'   => $this->input->post('fullname'),
                'password'   => password_hash($this->input->post('password'), PASSWORD_BCRYPT), // Hash password
                'created_at' => time(), // Mengubah created_at menjadi Unix timestamp
                'role'       => $roles_string
            );

            // Panggil method model untuk menyimpan data
            $this->user_model->insert_user($data);

            // Redirect ke halaman sukses atau halaman lain
            echo "<script>alert('Data user berhasil ditambahkan!'); window.location.href='" . base_url('admin/user_management') . "';</script>";
        }
    }
    public function delete_user(){
        
    }




// user face start --------------------------------------------------------------------------
    public function manage_user_face(){
        $data['users'] = $this->user_model->get_all_users_for_dropdown();
        // var_dump($data['users']);die;
        $this->load->view('admin/manage_user_face', $data);
    }
    public function save_user_face()
    {
        // Pastikan hanya menerima permintaan POST
        if ($this->input->method() !== 'post') {
            $this->output->set_status_header(405)
                         ->set_content_type('application/json')
                         ->set_output(json_encode(['status' => 'error', 'message' => 'Metode tidak diizinkan.']));
            return;
        }

        // Ambil raw POST data (payload JSON)
        $input_data = json_decode($this->input->raw_input_stream, true);

        // Validasi input
        if (!isset($input_data['user_id']) || !isset($input_data['face_descriptor'])) {
            $this->output->set_status_header(400)
                         ->set_content_type('application/json')
                         ->set_output(json_encode(['status' => 'error', 'message' => 'Data tidak lengkap (user_id atau face_descriptor hilang).']));
            return;
        }

        $user_id = $input_data['user_id'];
        $face_descriptor_json = $input_data['face_descriptor']; // Ini sudah string JSON dari frontend

        // Opsional: Validasi lebih lanjut pada user_id dan face_descriptor_json
        // if (!is_numeric($user_id)) {
        //     $this->output->set_status_header(400)
        //                  ->set_content_type('application/json')
        //                  ->set_output(json_encode(['status' => 'error', 'message' => 'ID Pengguna tidak valid.']));
        //     return;
        // }

        // Pastikan string JSON valid
        json_decode($face_descriptor_json);
        if (json_last_error() !== JSON_ERROR_NONE) {
            $this->output->set_status_header(400)
                         ->set_content_type('application/json')
                         ->set_output(json_encode(['status' => 'error', 'message' => 'Format descriptor wajah tidak valid.']));
            return;
        }

        // Panggil model untuk menyimpan data wajah
        if ($this->user_model->update_user_face($user_id, $face_descriptor_json)) {
            $this->output->set_content_type('application/json')
                         ->set_output(json_encode(['status' => 'success', 'message' => 'Data wajah berhasil disimpan/diperbarui.']));
        } else {
            $this->output->set_status_header(500) // Internal Server Error
                         ->set_content_type('application/json')
                         ->set_output(json_encode(['status' => 'error', 'message' => 'Gagal menyimpan/memperbarui data wajah ke database.']));
        }
    }

    /**
     * Endpoint API untuk mengambil semua face descriptor dari database.
     * Digunakan oleh frontend untuk membangun FaceMatcher.
     */
    public function get_all_face_descriptors()
    {
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
// user face end --------------------------------------------------------------------------






    // controller manager start --------------------------------------------
    public function controller(){
        $data['controllers'] = $this->Controller_model->get_all_controllers();
        $this->load->view('admin/controller', $data);
    }
    public function add_controller(){
        $this->load->view("admin/add_controller");

    }

     public function insert_controller()
    {
       

            // Get the 'controller_name' from the POST data
            $controller_name = $this->input->post('controller_name', TRUE); // TRUE for XSS filtering

            // Prepare data for insertion
            $data = array(
                'name' => $controller_name
                // 'id' is auto-incremented, so no need to include it here
            );

            // Insert the data into the 'controller' table using the model
            $this->Controller_model->insert_controller($data);
                redirect("admin/controller");

        
    }
    public function delete_controller($id = null)
    {
        $id = $this->uri->segment(3);
        $this->Controller_model->delete_controller($id);

        
        // Redirect back to the controller list page
        redirect('admin/controller');
    }
    // controller manager --------------------------------------------

    public function check_login()
    {
        // $session_cookie = (array)(json_decode($_COOKIE['session_cookie']));
        // $session_cookie_user = (array)$session_cookie['user'];
        // $user = $this->user_model->get_user_by_id($session_cookie_user['user_id']);
        // $user_pass = $this->encryption->decrypt($session_cookie_user['password']);
        // var_dump(password_verify($user_pass, $user['password']));die;

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

        // cek cookie
        // $session_cookie = $this->input->cookie('session_cookie', TRUE);
        // var_dump();

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
        // 	if (!($user && password_verify($password, $user['password']))) {
        //         redirect('auth/login');
        // 	}
        // }else if(isset($session_data['user_id'])){
        //     $user = $this->user_model->get_user($session_data['user_id']);
        // 	if (!(password_verify($session_data['password'], $user['password']))) {
        //         redirect('auth/login');
        //     }
        // }
    }
    // private function generate_new_file_name()
    // {
    //     return time(); // Example of generating a new file name
    // }
    public function rekap_kehadiran_gtk(){
        $data['kehadiran'] = json_encode($this->kehadiran_gtk_model->getAll());
        $this->load->view("admin/rekap_kehadiran_gtk", $data);
    }
    
    private function resize_image($source_path, $target_path)
    {
        $config['image_library'] = 'gd2';
        $config['source_image'] = $source_path;
        $config['new_image'] = $target_path;
        $config['create_thumb'] = FALSE;
        $config['maintain_ratio'] = TRUE;
        $config['width'] = 50; // Width of the thumbnail
        $config['height'] = 40; // Height of the thumbnail

        $this->image_lib->initialize($config);

        if (!$this->image_lib->resize()) {
            echo $this->image_lib->display_errors();
        }

        $this->image_lib->clear(); // Clear settings for next use
    }
    // Fungsi untuk menghasilkan ID unik (string acak)
    private function generate_unique_id($length = 16) {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
        return $randomString;
    }

    
}
