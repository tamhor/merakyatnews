<?php defined('BASEPATH') or exit('No direct script access allowed');
/**
 * 
 */
class Pending extends Admin_Controller
{
	
	function __construct()
	{
		parent::__construct();
		$this->load->model('m_admin', 'admin');
		$this->load->helper(array('form', 'url'));
		$this->load->library('session');
		if (!$this->auth->is_logged_in_admin()) {
				if(!$this->auth->is_logged_in_user())
				    redirect('login');
			}
	}

	public function index()
	{
		$auth = $this->session->userdata('id');
		// var_dump($auth);die;
		$this->var['title'] = 'Pending Posts';
		if($this->auth->is_logged_in_admin()){
			$this->var['query'] = $this->admin->get_pending_posts();
		}else{
			$this->var['query'] = $this->db
            ->select('p.id, p.post_title, c.cat_title, p.user_id, p.created_at')
            ->where("p.user_id = '$auth' AND p.post_cat_id = c.id AND p.is_delete = 0")
            ->get('posts p, categories c')
            ->result();
		}
		$this->var['module'] = 'admin/pending_posts';
		$this->load->view('admin/index', $this->var);
	}

	public function show()
	{
		$id = (int) $this->uri->segment(3);
		$news_data = [];
		$news_data['is_public'] = $this->input->post('is_public');

		$this->var['title'] = 'Show Post';
		$this->var['id'] = $id;
		$this->var['module'] = 'admin/show_post';
		// $this->var['message'] = NULL;
		$this->var['query'] = $id && $id > 0 && ctype_digit((string) $id) ? 
													$this->admin->get_post_row_obj($id) : ($this->var['message']['type'] == 'error' ? 
													$this->var['message']['query'] : false); 
		$this->var['categories'] = $this->admin->get_all_categories();
		$this->var['action'] = site_url('pending/show/'.$id);

		$update = $this->admin->update_post($news_data, $id);
		if($update){
			$this->var['message'] = 'Berita berhasil diposting';
			$this->var['type'] = 'success';
		}
		else {
			$this->var['message'] = "Berita gagal diposting";
			$this->var['type'] = 'error';
		}

		$this->load->view('admin/index', $this->var);
	}

	// public function create()
	// {
	// 	$id = (int) $this->uri->segment(3);

	// 	$this->var['title'] = $id && $id > 0 ? 'Edit Post Entry' : 'Add New Post';
	// 	$this->var['module'] = 'admin/add_post';
	// 	$this->var['message'] = $this->save();
	// 	$this->var['query'] = $id && $id > 0 && ctype_digit((string) $id) ? 
	// 												$this->admin->get_post_row_obj($id) : ($this->var['message']['type'] == 'error' ? 
	// 												$this->var['message']['query'] : false); 
	// 	$this->var['categories'] = $this->admin->get_all_categories();
	// 	$this->var['action'] = site_url('news/create/save/'.$id);
	// 	$this->load->view('admin/index', $this->var);
	// }

	
	public function delete()
	{
		$id = $this->input->post('id', true);
		if ($id && $id > 0) {
			$this->admin->delete_post($id);
		}

		redirect('news');
	}

	/*
	* @return array
	* save post on create and update action if validation passed
	*/

	public function update()
	{
		
	}


	/**
	* @return bool
	* @access public
	* form validation for create and update
	*/
	public function form_validate()
	{
		$this->load->helper('form');
		$this->load->library('form_validation');
		$this->form_validation->set_rules('post_title', 'post title', 'required');
		$this->form_validation->set_rules('post_content', 'post content', 'required');
		$this->form_validation->set_rules('post_cat_id', 'post category', 'required', array('required' => 'The %s must be selected.'));
		$this->form_validation->set_rules('post_img', 'image', 'callback_file_check');
		$this->form_validation->set_rules('post_lvl', 'showing', 'required');
		$this->form_validation->set_error_delimiters('<li>', '</li>');
		return $this->form_validation->run();
	}	
}
