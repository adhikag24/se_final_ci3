<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Comment extends CI_Controller {

    public function __construct()
    {
		parent::__construct();
		if($this->session->userdata('is_login') != 1){
			redirect('auth/login');
		}
		$this->load->model('m_comment');
    }

    public function insert_comment()
    {
        $get = $this->input->get();
        $user_id = $this->session->userdata('id');

        $data = [
            'user_id'   => $user_id,
            'comment'   => $get['comment'],
            'news_id'   => $get['news_id']
        ];

        $this->m_comment->insertComment('comments',$data);

        redirect(base_url('home/view_news/'.$get['news_id']));
    }

    public function getComment($newsId)
    {
       $data['commentData'] = $this->m_comment->getComment($newsId);
       return $data;
    }

    public function update_comment()
    {
        $post = $this->input->post();
        $data = [
            'comment'  => $post['new_comment']
        ];

        $this->db->where('comment_id', $post['comment_id']);
        $this->db->update('comments', $data);

        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
        Congratulation your comments is updated.
        </div>');

        redirect('home/view_comments');
    }

    public function delete_comment($comment_id)
    {
        $this->db->delete('comments', ['comment_id' => $comment_id]);

        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
        Congratulation your comments is deleted.
        </div>');

        redirect('home/view_comments');
    }


}

/* End of file Home.php */
