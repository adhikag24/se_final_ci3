<?php 


defined('BASEPATH') OR exit('No direct script access allowed');

class M_home extends CI_Model {

  public function countAllNews()
  {
      return $this->db->get('news')->num_rows();
  }

  public function getNews($id = null)
  {
    if(isset($id)){
        return $this->db->get_where('news',['news_id'=>$id])->row_array();
    }else{
        return $this->db->get('news')->result_array();
    }
  }

  public function getLatestNews()
  {
    return $this->db->select('news.*')->from('news')->order_by("news_id", "desc")->limit(3)->get()->result_array();
  }

  public function getPaginateNews($limit, $start = 0)
  {
    $query = $this->db->query("SELECT news.*, member.member_name
    FROM news
    LEFT JOIN member
    ON news.author_id=member.member_id
    ORDER BY news_id DESC
    LIMIT $limit OFFSET $start
    ");
    return $query->result_array();
  }

  public function insertData($table, $data)
  {
    return $this->db->insert($table,$data);
  }

  public function searchNews($keyword)
  {
    return $this->db->like('news_title', $keyword)->get('news')->result_array();
  }

}

