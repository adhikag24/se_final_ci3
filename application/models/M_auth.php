<?php 


defined('BASEPATH') OR exit('No direct script access allowed');

class M_auth extends CI_Model {

    public function insertMember($table,$data){
        $this->db->insert($table,$data);
    }

    public function validateLogin($email,$password){
       $is_member =  $this->db->get_where('member',['member_email' => $email])->row_array();

       if($is_member){
            if($is_member['member_password'] == md5($password)){
                return $is_member;
            }else{
                return 0;
            }
       }else{
           return 0;
       }
    }
    

}

/* End of file M_auth.php */
