<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Master_ctr extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('Master_model');
        $admin = $this->session->userdata('admin');
        if (empty($admin)) {
            $this->session->set_flashdata('msg', 'Your session has been expired');
            redirect(base_url());
        }
    }

   
    public function index() {
        $arr['studentlist'] = $this->Master_model->get_all_student_list1();
        $this->load->view('admin/dashboard',$arr);
    }

    

    /////////////////////////Student ///////////////////////
    
    public function modal_add_student_call() {  
        $this->load->view('admin/modal_add_student');
    }
    
    public function save_student_details() {
        $this->Master_model->save_student_details1();
        redirect(base_url() . 'index.php/master_ctr/get_all_student_list');
    }
    
    public function get_all_student_list() {
        $arr['studentlist'] = $this->Master_model->get_all_student_list1();
        $this->load->view('admin/student_list', $arr);
    }
    
    public function edit_student_list() { 
        $stud_id  = $this->input->post('stud_id');
        $arr['productdet'] = $this->Master_model->edit_student_list1($stud_id);
        $this->load->view('admin/modal_edit_student_list', $arr);
    }
    
    public function update_student_list() { 
        $stud_id = trim($this->input->post('txtstud_id'));
        $this->Master_model->update_student_list1($stud_id);
        redirect(base_url() . 'index.php/master_ctr/get_all_student_list');
    }
    
    public function delete_student_list() { 
        $stud_id = $this->input->post('stud_id');
        $this->Master_model->delete_student_list1($stud_id);
    }
  
    public function hide_student_list() {  
        $stud_id = $this->input->post('stud_id');
        $this->Master_model->hide_student_list1($stud_id);
        redirect(base_url() . 'index.php/master_ctr/get_all_student_list');
    }
  
    public function unhide_student_list() {  
       $this->Master_model->unhide_student_list1();
       redirect(base_url() . 'index.php/master_ctr/get_all_student_list');
    }
    
    public function delete_selected_student_list() {
        $selectedStudIds = $this->input->post('studIds');
        $this->Master_model->deleteSelectedStudents($selectedStudIds);
        redirect(base_url() . 'index.php/master_ctr/get_all_student_list');
    }

    
    
     //////////////////////   CIRCLE  ///////////////////////////////////////
        
    public function circleindex() {
        $arr['div_data'] = $this->Master_model->circleindex_division_count();
        $this->load->view('admin/circle_list',$arr);
    }
    
    public function modal_add_circle() {  
        $this->load->view('admin/modal_add_circle');
    }
    
    public function save_circle_details(){
        $this->Master_model->save_circle_details1();
        redirect(base_url() .'index.php/master_ctr/circleindex');
    }
    
    public function modal_edit_circle() {
        $circle_id = $this->input->post('c_id');
        $arr['linedet'] = $this->Master_model->modal_edit_circle1($circle_id);
        $this->load->view('admin/modal_edit_circle',$arr);
    }
    
    public function update_circle_list(){
        $this->Master_model->update_circle_list1();
        redirect(base_url() .'index.php/master_ctr/circleindex');
    }
   
   
    //////////////////////   DIVISION  //////////////////////////////////
 
    public function show_division_list_by_c_id() {
        $circle_id  = trim($this->input->post('txt_circle_id'));
        $arr['Circle_list'] = $this->Master_model->get_circle_list_by_c_id($circle_id);
        $arr['Division_list'] = $this->Master_model->get_divsion_list_by_c_id($circle_id);
        $arr['circle_id'] = $circle_id;
        $this->load->view('admin/division_list',$arr);
    }
    public function show_divsion_list_save_edit_redirect($circle_id) {
        $arr['Circle_list'] = $this->Master_model->get_circle_list_by_c_id($circle_id);
        $arr['Division_list'] = $this->Master_model->get_divsion_list_by_c_id($circle_id);
        $arr['circle_id'] = $circle_id;
        $this->load->view('admin/division_list',$arr);
    }
    
    public function modal_add_division() {
        $circle_id  = trim($this->input->post('circle_id'));
        $arr['circle_id'] = $circle_id;
        $this->load->view('admin/modal_add_division',$arr);
    }
    
    public function save_division_details(){
        $circle_id = $this->input->post('circle_id');
        $this->Master_model->save_division_details1($circle_id);
        $this->show_divsion_list_save_edit_redirect($circle_id);
    }
    
    public function modal_edit_division() {  //fetching edit modal
        $div_id  = $this->input->post('div_id');
        $arr['div_data'] = $this->Master_model->modal_edit_division1($div_id);
        $this->load->view('admin/modal_edit_division',$arr);
    }
    
    public function update_division_list() {
       $circle_id= $this->Master_model->update_division_list1();
       $this->show_divsion_list_save_edit_redirect($circle_id);
    }
    
    
     //////////////////////  SUB-DIVISION  //////////////////////////////////
    
    
    
    public function sub_division_list() {
        $div_id = $this->input->post('txtdiv_id');
        $arr['div_data'] = $this->Master_model->get_division_list_by_div_id($div_id);
        $arr['subdivlist'] = $this->Master_model->get_sub_division_list_by_div_id($div_id);
        $arr['div_id'] = $div_id;
        $this->load->view('admin/sub_division_list',$arr);
    }
    
    public function show_sub_divsion_list_save_edit_redirect($div_id) {
        $arr['div_data'] = $this->Master_model->get_division_list_by_div_id($div_id);
        $arr['subdivlist'] = $this->Master_model->get_sub_division_list_by_div_id($div_id);
        $arr['div_id'] = $div_id;
        $this->load->view('admin/sub_division_list',$arr);
    }
    
    public function modal_add_sub_division() {  
        $div_id  = trim($this->input->post('div_id'));
        $arr['div_id'] = $div_id;
        $this->load->view('admin/modal_add_sub_division',$arr);
    }
    
    public function save_sub_division_details(){
        $div_id = $this->input->post('txtdiv_id');
        $this->Master_model->save_sub_division_details1($div_id);
        $this->show_sub_divsion_list_save_edit_redirect($div_id);                
    }
   
    public function modal_edit_sub_division() {  
        $sdiv_id  = $this->input->post('sdiv_id');
        $arr['sub_data'] = $this->Master_model->modal_edit_sub_division1($sdiv_id);
        $this->load->view('admin/modal_edit_sub_division',$arr);
    }
    
    public function update_sub_division_list() {
        $div_id = $this->Master_model->update_sub_division_list1();
        $this->show_sub_divsion_list_save_edit_redirect($div_id);   
    }
    
    
     //////////////////////  LINE  //////////////////////////////////
    
    
    public function show_line_list() {
        $sub_id = $this->input->post('txtsub_id');
        $arr['subdivlist'] = $this->Master_model->get_sub_divsion_list_By_sdiv_id($sub_id);
        $arr['linedet'] = $this->Master_model->get_line_list_By_sdiv_id($sub_id);
        $arr['sub_id'] = $sub_id;
        $this->load->view('admin/line_list',$arr);
    }
    
    public function show_line_list_save_edit_redirect($sub_id) {
        $arr['subdivlist'] = $this->Master_model->get_sub_divsion_list_By_sdiv_id($sub_id);
        $arr['linedet'] = $this->Master_model->get_line_list_By_sdiv_id($sub_id);
        $arr['sub_id'] = $sub_id;
        $this->load->view('admin/line_list',$arr);
    }
    
    public function modal_add_line_list() {  
        $sub_id  = trim($this->input->post('sub_id'));
        $arr['sub_id'] =$sub_id;
        $this->load->view('admin/modal_add_line_list',$arr);
    }
    
    public function save_line_details(){
        $sub_id = $this->input->post('sub_id');
        $this->Master_model->save_line_details1($sub_id);
        $this->show_line_list_save_edit_redirect($sub_id);
    }
    
    public function modal_edit_line_list() {
        $line_id = $this->input->post('line_id');
        $arr['linedet'] = $this->Master_model->modal_edit_line_list1($line_id);
        $this->load->view('admin/modal_edit_line_list',$arr);
    }
    
    public function update_line_list(){
        $sub_id= $this->Master_model->update_line_list1();
        $this->show_line_list_save_edit_redirect($sub_id);
    }
    
      //////////////////////  TOWER  //////////////////////////////////
    
    
    public function show_tower_list() {
        $line_id  = trim($this->input->post('txtlineid'));
        $arr['linedet'] = $this->Master_model->get_line_list_by_line_id($line_id);
        $arr['towerlist'] = $this->Master_model->get_tower_list_by_line_id($line_id);
        $arr['line_id'] = $line_id;
        $this->load->view('admin/tower_list',$arr);
    }
    
    public function show_tower_list_save_edit_redirect($line_id) {
        $arr['linedet'] = $this->Master_model->get_line_list_by_line_id($line_id);
        $arr['towerlist'] = $this->Master_model->get_tower_list_by_line_id($line_id);
        $arr['line_id'] = $line_id;
        $this->load->view('admin/tower_list',$arr);
    }
     
    public function modal_add_tower_list() {
        $line_id  = trim($this->input->post('line_id'));
        $arr['line_id'] = $line_id;
        $this->load->view('admin/modal_add_tower_list',$arr);
    }
    
    public function save_tower_list(){
        $line_id = $this->input->post('txtline_id');
        $this->Master_model->save_tower_list1();
        $this->show_tower_list_save_edit_redirect($line_id);
    }
    
    
    //////////////////////////////Ground Pertroling/////////////////////////////
    public function modal_add_ground_list() {
        $arr['tower_id'] = $this->input->post('tower_id');
        $this->load->view('admin/modal_add_ground_list',$arr);
    }
    
    public function show_ground_list_save_edit_redirect($tower_id) {
        $arr['towerdet'] = $this->Master_model->get_list_ground_petrolling($tower_id);
         $arr['tower_id']= $tower_id;
        $this->load->view('admin/ground_petrolling_list',$arr);
    }
    
    public function list_ground_petrolling() {
        $tower_id = $this->input->post('txt_tower_id');
        $arr['towerdet'] = $this->Master_model->get_list_ground_petrolling($tower_id);
        $arr['tower_id']= $tower_id;
        $this->load->view('admin/ground_petrolling_list',$arr);
    }
     
    public function save_Ground_Petrolling()
    {
        ob_start(); // Start output buffering at the beginning of your script
        $target_dir = FCPATH . 'images/' . basename($_FILES["profileToUpload"]["name"]);
        $file_name = $_FILES["profileToUpload"]["name"];
        $target_file = $target_dir;
        $uploadOk = 1;
        $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
        if (isset($_POST["submit"])) {   // Check if image file is a actual image or fake image
            $check = getimagesize($_FILES["profileToUpload"]["tmp_name"]);
            if ($check !== false) {
                echo "File is an image - " . $check["mime"] . ".";
                $uploadOk = 1;
            } else {
                echo "File is not an image.";
                $uploadOk = 0;
            }
        }
        if (file_exists($target_file)){ 
            unlink($target_file);
        }
        if ($_FILES["profileToUpload"]["size"] > 10000000) { 
            echo "Sorry, your file is too large.";
            $uploadOk = 0;
        }
        if (  // Allow certain file formats
            $imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
            && $imageFileType != "gif"
        ) {
            echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
            $uploadOk = 0;
        }
        if ($uploadOk == 0) // Check if $uploadOk is set to 0 by an error
        {
            echo "Sorry, your file was not uploaded.";
        } else  // if everything is ok, try to upload file
        {
            if (move_uploaded_file($_FILES["profileToUpload"]["tmp_name"], $target_file)) {
                $file_url = base_url('images/'.$target_file);
                $file_urla = $file_name;
                $this->Master_model->save_Ground_Petrolling1($file_urla);
                $tower_id = $this->input->post('txt_tid');
                $this->show_ground_list_save_edit_redirect($tower_id);
            } else {
                echo "Sorry, there was an error uploading your file.";
            }
        }
    }
    
    public function modal_edit_gpetroling_List() {  //fetching edit modal
        $g_id  = $this->input->post('g_id');
        $arr['gp_det'] = $this->Master_model->get_ground_list($g_id);
        $this->load->view('admin/modal_edit_gpetroling_list',$arr);
    }
    
    public function update_Ground_Petrolling()
    {
        ob_start(); // Start output buffering at the beginning of your script
        $target_dir = FCPATH . 'images/' . basename($_FILES["profileToUpload"]["name"]);
        $file_name = $_FILES["profileToUpload"]["name"];
        $target_file = $target_dir;
        $uploadOk = 1;
        $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
        if (isset($_POST["submit"])) {   // Check if image file is a actual image or fake image
            $check = getimagesize($_FILES["profileToUpload"]["tmp_name"]);
            if ($check !== false) {
                echo "File is an image - " . $check["mime"] . ".";
                $uploadOk = 1;
            } else {
                echo "File is not an image.";
                $uploadOk = 0;
            }
        }
        if (file_exists($target_file)){ 
           
            unlink($target_file);
        }
        if ($_FILES["profileToUpload"]["size"] > 10000000) { 
            echo "Sorry, your file is too large.";
            $uploadOk = 0;
        }
        if (  // Allow certain file formats
            $imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
            && $imageFileType != "gif"
        ) {
            echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
            $uploadOk = 0;
        }
        if ($uploadOk == 0) // Check if $uploadOk is set to 0 by an error
        {
            echo "Sorry, your file was not uploaded.";
        } else  // if everything is ok, try to upload file
        {
            if (move_uploaded_file($_FILES["profileToUpload"]["tmp_name"], $target_file)) {
                $file_url = base_url('images/'.$target_file);
                $file_urla = $file_name;
                 $this->Master_model->update_Ground_Petrolling1($file_urla);
                 $tower_id = $this->input->post('txtt_id');
               $this->show_ground_list_save_edit_redirect($tower_id);
            } else {
                echo "Sorry, there was an error uploading your file.";
            }
        }
    }
 
   
   //////////////////////////////////////////////////////Multiple Images Adding////////////////////////////////////////////////////////////////////
   
    public function modal_add_Mul_images() {  
        $this->load->view('admin/modal_add_Mul_images');
    }
    
    
    public function save_mul_images() {
        ob_start();
        $uploadOk = 1;
        $maxImages = 5;
        $uploadedImagesCount = count($_FILES["profileToUpload"]["tmp_name"]);
        $uploadedCount = 0;
        $file_names = []; // Initialize an empty array to store file names
        for ($i = 0; $i < $uploadedImagesCount; $i++) {// Loop through each uploaded file
            $target_dir = FCPATH . 'images/';
            $file_name = $_FILES["profileToUpload"]["name"][$i];
            $target_file = $target_dir . basename($file_name);
            $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
            $check = getimagesize($_FILES["profileToUpload"]["tmp_name"][$i]); // Check if the file is an actual image or fake image
            if ($check === false) {
                 $this->session->set_flashdata('error', 'File is not an image.');
                $uploadOk = 0;
            }
            // Check file size
            $maxFileSize = 5 * 1024 * 1024; // 10 megabytes in bytes
            if ($_FILES["profileToUpload"]["size"][$i] > $maxFileSize) {
               $this->session->set_flashdata('error', 'Sorry, your file is too large. Maximum allowed size is 10MB.');
                $uploadOk = 0;
            }
            // Allow certain file formats
            if (!in_array($imageFileType, array("jpg", "jpeg", "png", "gif"))) {
                $this->session->set_flashdata('error', 'Sorry, only JPG, JPEG, PNG & GIF files are allowed.');
                $uploadOk = 0;
            }
            if ($uploadOk == 1) { // If everything is ok, try to upload the file
               if (move_uploaded_file($_FILES["profileToUpload"]["tmp_name"][$i], $target_file)) {
                    $file_names[] = $file_name; // Collect all file names in an array
                    $uploadedCount++;
                    if ($uploadedCount >= $maxImages) {// Break the loop if the maximum number of images is reached
                        break;
                    }
                } else {
                    echo "Sorry, there was an error uploading one of your files.";
                }
            }
        }
        if (!empty($file_names)) { // Call the model method with the array of file names
            $this->Master_model->save_mul_images1($file_names);
            $this->session->set_flashdata('success', 'Data saved successfully.');
        }
      redirect(base_url() . 'index.php/master_ctr/get_all_mulimages');
    }
    
    
    public function get_all_mulimages() {
        $arr['imageslist'] = $this->Master_model->get_all_mulimages1();
        $this->load->view('admin/mulimages_list', $arr);
    }
    
    
    public function delete_image_list() { 
        $img_id = $this->input->post('img_id');
        $this->Master_model->delete_image_list1($img_id);
    }
    
    
    public function delete_selected_images_list() {
        $selectedImgIds = $this->input->post('imgIds');
        $this->Master_model->delete_selected_images_list1($selectedImgIds);
        redirect(base_url() . 'index.php/master_ctr/get_all_student_list');
    }

    
    
    
}
