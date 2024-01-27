<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login_model extends CI_Model {

    public function getByUsername($username){
        $this->db->where('username',$username);
        $admin = $this->db->get('masteradmin')->row_array();
        //echo $this->db->last_query();
        return $admin;
    }
    
    
     

}
