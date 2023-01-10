<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login_model extends CI_Model
{
    
    function login_funct($email, $pass)
    {
        $this->db->select('*');
        $this->db->from('tbl_users');
        $this->db->where(array('email' => $email, 'password'=> $pass));
        $query = $this->db->get();

        $user = $query->row();
        return $user;
    }

    function create_user($data){
        $this->db->insert('tbl_users',$data);
    }

}

?>