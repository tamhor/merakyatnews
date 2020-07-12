<?php defined('BASEPATH') or exit('No direct script access allowed');
/**
 * 
 */
class Home extends Public_Controller
{
	
	function __construct()
	{
		parent::__construct();
		$this->load->model('m_public', 'public');
		$this->load->helper('text');
		$this->load->helper('form');
	}

	public function index()
	{
		$this->var['title'] = 'Merakyat News';
		$this->var['posts'] = $this->public->get_all_posts();
		$this->var['categories'] = $this->public->get_all_categories();
		$this->var['breaking_news'] = $this->public->get_post_breaking_news();
		$this->var['sliders'] = $this->public->get_post_sliders();
		$this->var['lasts'] = $this->public->get_post_lasts();
		$this->var['populars'] = $this->public->get_post_populars();
		$this->var['firsts'] = $this->public->get_1st_category();
		$this->var['seconds'] = $this->public->get_2nd_category();
		$this->var['thirds'] = $this->public->get_3rd_category();
		$this->var['module'] = 'public/landing';

		// print_r($this->var['populars']);die;
		$this->load->view('public/layouts', $this->var);
	}
	
	public function category_page()
	{
		$id = (int) $this->uri->segment(3);

		$this->var['cat_id'] = $this->public->get_category_id($id);
		$this->var['posts'] = $this->public->get_post_by_cat_id($id);
		foreach ($this->var['cat_id'] as $title) {
			$this->var['title'] = $title->cat_title;
		}
		$this->var['categories'] = $this->public->get_all_categories();
		$this->var['breaking_news'] = $this->public->get_post_breaking_news();
		$this->var['lasts'] = $this->public->get_post_lasts();
		if ($this->var['posts']) {
			$this->var['module'] = 'public/category';
		}else {
			$this->var['module'] = 'public/404';
		}
		$this->var['populars'] = $this->public->get_post_populars();

		// var_dump($this->var['posts']);die;
		$this->load->view('public/layouts', $this->var);
	}
	
	public function read()
	{
		$this->var['links'] = site_url($this->uri->uri_string());
		$id = (int) $this->uri->segment(3);
		$this->load->library('pagination');

		$config['base_url'] = 'http://example.com/index.php/test/page/';
		$config['total_rows'] = 200;
		$config['per_page'] = 20;

		$this->var['action'] = site_url('home/post_comment');
		$this->var['posts'] = $this->public->get_post_by_id($id);
		$this->var['comment_count'] = $this->public->get_comments($id)->num_rows();
		$this->var['comments'] = $this->public->get_comments($id)->result();
		$this->var['related'] = $this->public->get_post_by_cat_id($id);
		$this->var['categories'] = $this->public->get_all_categories();
		$this->var['breaking_news'] = $this->public->get_post_breaking_news();
		if ($this->var['posts']) {
			$this->var['title'] = $this->var['posts']->post_title;
			$this->var['module'] = 'public/read_page';
		}else {
			$this->var['title'] = '404 Page Not Found';
			$this->var['module'] = 'public/404';
		}
		$this->var['populars'] = $this->public->get_post_populars();

		// var_dump($this->var['links']);die;
		$this->load->view('public/layouts', $this->var);
	}

	public function post_comment()
	{

		$news_data = [];
		$news_data['post_id'] = $this->input->post('post_id');
		$news_data['username'] = $this->input->post('username');
		$news_data['comment'] = $this->input->post('comment');
		$news_data['created_at'] = date('Y-m-d H:i:s');
		$news_data['is_delete'] = 0;

		$insert = $this->public->insert_comment($news_data);
		if($insert){
			$data['message'] = 'Comment berhasil ditambahkan';
			$data['type'] = 'success';
		}
		else {
			$data['message'] = "Comment gagal ditambahkan";
			$data['type'] = 'error';
		}
		redirect($_SERVER['HTTP_REFERER']);

	}

	public function search()
	{
		$this->var['title'] = 'Search Result';
		$this->var['posts'] = $this->public->get_all_posts();
		$this->var['categories'] = $this->public->get_all_categories();
		$this->var['breaking_news'] = $this->public->get_post_breaking_news();
		$this->var['sliders'] = $this->public->get_post_sliders();
		$this->var['lasts'] = $this->public->get_post_lasts();
		$this->var['populars'] = $this->public->get_post_populars();
		$this->var['search']=$this->public->get_search($this->input->post('search'));
		if ($this->var['search']) {
			$this->var['module'] = 'public/search';
		}else {
			$this->var['module'] = 'public/404';
		}

		// var_dump($this->var['search']);die;
		$this->load->view('public/layouts', $this->var);
	}
}