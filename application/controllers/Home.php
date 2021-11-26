<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

    public function __construct()
    {
		parent::__construct();
		if($this->session->userdata('is_login') != 1){
			redirect('auth/login');
		}
		$this->load->model('m_home');
		$this->load->model('m_comment');
    }

	public function index()
	{
	
		$this->load->library('pagination');

		$config['base_url'] = base_url() . 'home/index';
		$config['total_rows'] = $this->m_home->countAllNews();
		$config['per_page'] = 3;
		$config['num_links'] = 4;

		$config['full_tag_open'] = '<nav> <ul class="pagination justify-content-center">';
		$config['full_tag_close'] = ' </ul></nav>';

		$config['first_link'] = 'First';
		$config['first_tag_open'] = ' <li class="page-item">';
		$config['first_tag_close'] = ' </li>';

		$config['last_link'] = 'Last';
		$config['last_tag_open'] = ' <li class="page-item">';
		$config['last_tag_close'] = ' </li>';

		$config['next_link'] = '&raquo';
		$config['next_tag_open'] = ' <li class="page-item">';
		$config['next_tag_close'] = ' </li>';

		$config['prev_link'] = '&laquo';
		$config['prev_tag_open'] = ' <li class="page-item">';
		$config['prev_tag_close'] = ' </li>';

		$config['cur_tag_open'] = ' <li class="page-item active"><a class="page-link" href="#">';
		$config['cur_tag_close'] = '</a> </li>';

		$config['num_tag_open'] = ' <li class="page-item">';
		$config['num_tag_close'] = ' </li>';

		$config['attributes'] = array('class' => 'page-link');

		$data['start'] = $this->uri->segment(3);

		$this->pagination->initialize($config);

		$data['newsData'] =  $this->m_home->getPaginateNews($config['per_page'], (empty($data['start'])) ? 0 : $data['start']);
		$data['latestNews'] = $this->m_home->getLatestNews();

		
		$this->load->view("client/template/header");
		$this->load->view("client/index",$data);
		$this->load->view("client/template/footer");
	}

	public function search_news()
	{
		$get = $this->input->get();

		$data['searchedNews'] = $this->m_home->searchNews($get['keyword']);
		$data['latestNews'] = $this->m_home->getLatestNews();
		$data['keyword'] = $get['keyword'];

		$this->load->view("client/template/header");
		$this->load->view("client/index",$data);
		$this->load->view("client/template/footer");
	}

	public function view_news($id)
	{
		$data['news'] = $this->m_home->getNews($id);
		$data['comments'] = $this->m_comment->getComment($id);


		$this->load->view("client/template/header");
		$this->load->view("client/view_news",$data);
		$this->load->view("client/template/footer");
	}

	public function view_comments()
	{
		$id = $this->session->userdata('id');

		$data['comment'] = $this->m_comment->getComment(null, $id);
	
		$this->load->view("client/template/header");
		$this->load->view("client/view_comments",$data);
		$this->load->view("client/template/footer");
	}

	public function upload_document()
	{
		$this->load->view("client/template/header");
		$this->load->view("client/upload_document");
		$this->load->view("client/template/footer");
	}

	public function insert_document()
	{
		$user_id = $this->session->userdata('id');

		if (!empty($_FILES['news_document']['name'])){
            $config['upload_path']          = './assets/document';
            $config['allowed_types']        = 'docx|pdf';
            $config['max_size']             = 5000;
            $config['max_width']            = 0;
            $config['max_height']           = 0;
            $config['overwrite']            = FALSE;
            $config['remove_spaces']        = TRUE;

    
            $this->load->library('upload', $config);
                if (!$this->upload->do_upload('news_document')){
                    $this->upload_document();
                }else{
                    $data = array(
                        'user_id' => $user_id,
                        'newsdoc_name' =>  $this->upload->data('file_name'),
                    );
                   
					$this->m_home->insertData('news_document',$data);
					
					$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
					Congratulation! your document has been uploaded.
					</div>');
    
                    redirect(base_url('home/upload_document'));
                }
        }else{
			$this->upload_document();
		}
	}

}

/* End of file Home.php */
