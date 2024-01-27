<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Master_model extends CI_Model 
{

 
    
    /////////////////////////////SAVE Student Information////////////////////////////
    
   
    public function save_student_details1() {
        $fullname = $this->input->post('txtfullname');
        $DOB = $this->input->post('txtdateofbirth');
        $gender = $this->input->post('txtgender');
        $email = $this->input->post('txtemail');
        $phone = $this->input->post('txtphone');
        $address = $this->input->post('txtaddress');
        $category = $this->input->post('txtcategory');
        $addmissionType = $this->input->post('txtaddtype');
        $data = array
            (
            'Full_Name ' => $fullname,
            'DOB ' => $DOB,
            'Gender' => $gender,
            'Email_address' => $email,
            'Phone_Number' => $phone,
            'Address' => $address,
            'Prog_Type  ' => $category,
            'Addmision_Type  ' => $addmissionType,
        );
            $this->db->insert('student_info', $data);
    }
    
    
    public function get_all_student_list1() {
        $this->db->select('a.*');
        $this->db->from('student_info a');
         $this->db->where('status', 0);
        $query = $this->db->get();
        return $query->result();
    }
    
    
    public function edit_student_list1($stud_id) {
        $this->db->select('*');
        $this->db->from('student_info');
        $this->db->where('stud_id', $stud_id);
        $query = $this->db->get();
        return $query->result();
    }
    
    
    public function delete_student_list1($stud_id) {
        $this->db->where('stud_id', $stud_id);
        $this->db->delete('student_info'); // Assuming your table name is 'orders'
    }
   
   
    public function hide_student_list1($stud_id) {
        $tr = array(
                'status' => 1
            );
        $this->db->where('stud_id ', $stud_id);
        $this->db->update('student_info', $tr);
    }

  
    public function unhide_student_list1() {
        $tr = array(
                'status' => 0
            );
        $this->db->update('student_info', $tr);
    }
    
    
    public function update_student_list1($stud_id) {
        $fullname = $this->input->post('txtfullname');
        $DOB = $this->input->post('txtdateofbirth');
        $gender = $this->input->post('txtgender');
        $email = $this->input->post('txtemail');
        $phone = $this->input->post('txtphone');
        $address = $this->input->post('txtaddress');
        $category = $this->input->post('txtcategory');
        $addmissionType = $this->input->post('txtaddtype');
        $data = array
            (
            'Full_Name ' => $fullname,
            'DOB ' => $DOB,
            'Gender' => $gender,
            'Email_address' => $email,
            'Phone_Number' => $phone,
            'Address' => $address,
            'Prog_Type  ' => $category,
            'Addmision_Type  ' => $addmissionType,
        );
        $this->db->where('stud_id ', $stud_id);
        $this->db->update('student_info', $data);
    }
    
    
    public function deleteSelectedStudents($selectedStudIds) {
        if (count($selectedStudIds) > 0) {
            $this->db->where_in('stud_id', $selectedStudIds);
            $this->db->delete('student_info');
        }
    }

    
   ///////////////////////////////////////circle.////////////////////////////////////////////////////////////
    public function circleindex_division_count() {
        $this->db->select('count(a.division_name) as divisioncount, b.circle_name,b.c_id');
        $this->db->from('division a');
        $this->db->join('circle_master b', 'a.c_id = b.c_id','right');
        $this->db->group_by('b.circle_name');
        $query = $this->db->get();
        return $query->result();
        return $query->result();
    }
   
   
    public function save_circle_details1() {
        $circle_name = $this->input->post('txtcircle_name');
        $existing_circle = $this->db->get_where('circle_master', array('circle_name' => $circle_name))->row();
        if ($existing_circle) {
            $this->session->set_flashdata('msgemail', 'Circle name already exists in the database. Record not added.');
        } else {
            $data = array(
                'circle_name' => $circle_name
            );
            $this->db->insert('circle_master', $data);
            $this->session->set_flashdata('msgemail', 'Record Added Successfully!');
        }
    }
    
    public function modal_edit_circle1($circle_id) {
        $this->db->where('c_id ', $circle_id);
        $this->db->from('circle_master');
        $query = $this->db->get();
        return $query->result();
    }
    
    public function update_circle_list1() {
        $c_id = $this->input->post('txtc_id');
        $circle_name = $this->input->post('txtcircle_name');
        $existingCircle = $this->db->get_where('circle_master', array('circle_name' => $circle_name))->row();
        if ($existingCircle && $existingCircle->c_id != $c_id) {
             $this->session->set_flashdata('msgemail', 'Duplicate circle name. Record not updated');
        } else {
            $data = array(
                'circle_name' => $circle_name,
            );
            $this->db->where('c_id', $c_id);
            $this->db->update('circle_master', $data);
            $this->session->set_flashdata('msgemail', 'Record Updated Successfully!');
        }
    }
    
     //////////////////////   DIVISION  //////////////////////////////////
    public function get_circle_list_by_c_id($circle_id) {
        $this->db->where('c_id', $circle_id);
        $this->db->from(' circle_master a');
        $query = $this->db->get();
        return $query->result();
    }
    
    public function get_divsion_list_by_c_id($circle_id){
        $this->db->select('a.*,COUNT(b.div_id) AS subdivcount');
        $this->db->where('c_id', $circle_id);
        $this->db->from('division a');
        $this->db->join(' sub_division b', 'b.div_id = a.div_id', 'left');
        $this->db->group_by( 'a.div_id');
        $query = $this->db->get();
        return $query->result();
    }
    
    public function save_division_details1($circle_id) {
        $division_name = $this->input->post('division_name');
        $data = array
            (
                'c_id' => $circle_id,
                'division_name' => $division_name,
            );
        $this->db->insert('division', $data);
    }
    
    public function modal_edit_division1($div_id) { 
        $this->db->select('*');
        $this->db->from('division');
        $this->db->where('div_id', $div_id);
        $query = $this->db->get();
        return $query->result();
    }
    
    public function update_division_list1() {
        $div_id = $this->input->post('txt_div_id');
        $dividion_name= $this->input->post('txtdiv_name');
        $data = array
            (
            'division_name ' => $dividion_name
        );
        $this->db->where('div_id ', $div_id);
        $this->db->update('division', $data);
        $this->db->select('c_id');
        $this->db->where('div_id', $div_id);
        $query = $this->db->get('division');
        $result = $query->row();
        if ($result) {
            return $result->c_id;
        } else {
            return false; // Return an appropriate value if the record was not found
        }
    }
    
    
    ////////////////////////////Sub division//////////////////////////////////////////////////////
    public function get_division_list_by_div_id($div_id) {
        $this->db->select('*');
        $this->db->from('division');
        $this->db->where('div_id', $div_id);
        $query = $this->db->get();
        return $query->result();
    }
    
    public function get_sub_division_list_by_div_id($div_id){
        $this->db->select('a.*,COUNT(b.sdiv_id) AS linelistcount');
        $this->db->where('div_id', $div_id);
        $this->db->from('sub_division a');
        $this->db->join('line_master b', 'b.sdiv_id = a.sdiv_id', 'left');
        $this->db->group_by( 'a.sdiv_id');
        $query = $this->db->get();
        return $query->result();
    }
    
    public function save_sub_division_details1($div_id) {
        $sub_division_name = $this->input->post('sub_division_name');
        $data = array(
            'div_id' => $div_id,
            'sub_name' => $sub_division_name,
        );
        $this->db->insert('sub_division', $data);
    }
    
    public function modal_edit_sub_division1($sdiv_id) {
        $this->db->select('*');
        $this->db->from('sub_division');
        $this->db->where('sdiv_id', $sdiv_id);
        $query = $this->db->get();
        return $query->result();
    }
    
    public function update_sub_division_list1() {
        $sub_div_id = $this->input->post('sub_div_id');
        $txtsubdiv_name= $this->input->post('txtsubdiv_name');
        $data = array
            (
            'sub_name ' => $txtsubdiv_name
        );
        $this->db->where('sdiv_id ',$sub_div_id);
        $this->db->update('sub_division', $data);
        $this->db->select('div_id');
        $this->db->where('sdiv_id', $sub_div_id);
        $query = $this->db->get('sub_division');
        $result = $query->row();
        if ($result) {
            return $result->div_id;
        } else {
            return false; // Return an appropriate value if the record was not found
        }
    }
    
    ///////////////////////////////////Line List//////////////////////////////////////////
    public function get_sub_divsion_list_By_sdiv_id($sub_id){
        $this->db->select('*');
        $this->db->from('sub_division');
        $this->db->where('sdiv_id', $sub_id);
        $query = $this->db->get();
        return $query->result();
    }
    
    public function get_line_list_By_sdiv_id($sub_id) {
        $this->db->select('a.*,COUNT(b.line_id) AS towerlistcout');
        $this->db->where('sdiv_id', $sub_id);
        $this->db->from('line_master a');
        $this->db->join('tower_master b', 'b.line_id = a.line_id', 'left');
        $this->db->group_by( 'a.line_id');
        $query = $this->db->get();
        return $query->result();
    }
    
    
    public function save_line_details1($sub_id) {
        $txtline_name = $this->input->post('txtline_name');
        $voltage_level = $this->input->post('voltage_level');
        $data = array(
            'sdiv_id' =>$sub_id,
            'line_name' => $txtline_name,
            'voltage' => $voltage_level,
        );
        $this->db->insert('line_master', $data);
    }
    
    public function modal_edit_line_list1($line_id) {
        $this->db->select('*');
        $this->db->from('line_master a');
        $this->db->where('line_id', $line_id);
        $query = $this->db->get();
        return $query->result();
    }
    
    public function update_line_list1() {
        $line_id = $this->input->post('txtline_id');
        $line_name = $this->input->post('txt_line_Name');
        $voltage = $this->input->post('txt_voltage');
        $data = array(
            'line_name' => $line_name,
            'voltage' => $voltage,
        );
        $this->db->where('line_id', $line_id);
        $this->db->update(' line_master', $data);
         $this->db->select('sdiv_id');
        $this->db->where('line_id', $line_id);
        $query = $this->db->get('line_master');
        $result = $query->row();
    
        if ($result) {
            return $result->sdiv_id;
        } else {
            return false; // Return an appropriate value if the record was not found
        }
    }
    
    
    ///////////////////////////////////Tower/////////////////////////
    public function get_line_list_by_line_id($line_id) {
        $this->db->select('*');
        $this->db->from('line_master');
        $this->db->where('line_id', $line_id);
        $query = $this->db->get();
        return $query->result();
    }
    
    public function get_tower_list_by_line_id($line_id){
        $this->db->select('*');
        $this->db->from('tower_master');
        $this->db->where('line_id', $line_id);
        $query = $this->db->get();
        return $query->result();
    }
    
    public function save_tower_list1() {
        $line_id = $this->input->post('txtline_id');
        $Longitude = $this->input->post('Longitude');
        $Latitude = $this->input->post('Latitude');
        $Distance_btw_Mtr = $this->input->post('Distance_btw_Mtr');
        $tower_Type1 = $this->input->post('tower_Type1');
        $tower_Type2 = $this->input->post('tower_Type2');
        $data = array
            (
                'line_id' => $line_id,
                'longitude' => $Longitude,
                'latitude' => $Latitude,
                'distance' => $Distance_btw_Mtr,
                'tower_one' => $tower_Type1,
                'tower_two' => $tower_Type2,
            );
        $this->db->insert('tower_master', $data);
    }
    
    ///////////////////////  Ground Petrolling    ////////////////////
    
    public function save_Ground_Petrolling1($target_file)
    {
        $data = array(
        'tower_id	'=> $this->input->post('txt_tid'),    //txt_tid
        'date' => $this->input->post('date'),
        'worker' => $this->input->post('worker'),
        'notes' => $this->input->post('txt_note'),
        'image' => $target_file, // Assuming you have uploaded the image file
        );
        $this->db->insert('ground_petrolling',$data);
    }
    
    public function get_list_ground_petrolling($tower_id) {
        $this->db->where('tower_id', $tower_id);
        $this->db->from('ground_petrolling a');
        $query = $this->db->get();
        return $query->result();
    }
    
     public function get_ground_list($g_id) {
        $this->db->select('*');
        $this->db->from('ground_petrolling');
        $this->db->where('g_id', $g_id);
        $query = $this->db->get();
        return $query->result();
    }
    
    public function update_Ground_Petrolling1($target_file)
    {
        $id = $this->input->post('txtg_id');
        $data = array(
        'date' => $this->input->post('date'),
        'worker' => $this->input->post('worker'),
        'notes' => $this->input->post('txt_note'),
        'image' => $target_file, // Assuming you have uploaded the image file
        );
        $this->db->where('g_id', $id);
        $this->db->update(' ground_petrolling', $data);
    }
      
///////////////////////////////////////////////////////////////////////Multiple Images Adding//////////////////////////////////////////////////////////////////////////////////////

    public function save_mul_images1($file_names)
    {
        foreach ($file_names as $file_name) {
            $data = array(
                'img_name' => $this->input->post('txtimgname'),
                'images' => $file_name,
            );
            $this->db->insert('mulimages', $data);
        }
    }
    
    public function get_all_mulimages1() {
        $this->db->select('a.*');
        $this->db->from('mulimages a');
        $query = $this->db->get();
        return $query->result();
    }

    public function delete_image_list1($img_id) {
        $this->db->where('img_id', $img_id);
        $this->db->delete('mulimages'); // Assuming your table name is 'orders'
    }
    
    
    public function delete_selected_images_list1($selectedImgIds) {
        if (count($selectedImgIds) > 0) {
            $this->db->where_in('img_id', $selectedImgIds);
            $this->db->delete('mulimages');
        }
    }


}
