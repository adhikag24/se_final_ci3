<?php 


defined('BASEPATH') OR exit('No direct script access allowed');

class M_comment extends CI_Model {

  public function countAllNews()
  {
      return $this->db->get('news')->num_rows();
  }

 public function insertComment($table,$data){
     $this->db->insert($table,$data);
 }

 public function getComment($news_id = null, $user_id = null)
 {
     if (isset($news_id)){
        $query = $this->db->query("SELECT comments.*, member.member_name
        FROM comments
        LEFT JOIN member
        ON comments.user_id=member.member_id
        WHERE comments.news_id = $news_id
        ORDER BY comments.comment_id DESC
        ");
        return $query->result_array();
     }else{
        $query = $this->db->query("SELECT comments.*, member.member_name
        FROM comments
        LEFT JOIN member
        ON comments.user_id=member.member_id
        WHERE comments.user_id = $user_id
        ORDER BY comments.comment_id DESC
        ");
        return $query->result_array();
     }
   
 }
    

}

/* End of file M_auth.php */
