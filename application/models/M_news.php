<?php


defined('BASEPATH') OR exit('No direct script access allowed');

class M_news extends CI_Model {

    public function getNewsData($slug = null){
        if(isset($slug)){
            return $this->db->get_where('news',['news_slug' => $slug])->row_array();
        }else{
            return $this->db->get('news')->result_array();
        }
    }

    public function insertNews($table, $data){
        $this->db->insert($table,$data);
    }

    public function deleteNews($newsSlug){
        $news_id = $this->db->get_where('news',['news_slugz' => $newsSlug])->row_array()['news_id'];

        $this->db->where('news_slug', $newsSlug);
        $this->db->delete('news');
    
   
        $this->db->delete('comments',['news_id' => $news_id]);
    }

    public function updateNews($id, $data){
        $this->db->where('news_id', $id);
        $this->db->update('news', $data);
    }

    public function select_table($table){
        $this->db->get($table)->result_array();
    }

}

/* End of file M_news.php */
