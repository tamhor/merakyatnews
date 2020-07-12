<?php 

/**
 * 
 */
class Subs extends Admin_Controller
{
	
	function __construct()
	{
		parent::__construct();
		$this->load->model('m_admin', 'admin');
		if (!$this->auth->is_logged_in_admin()) {
			redirect('login');
		}
	}

	public function index()
	{
		$this->var['title'] = 'Subs Categories';
		$this->var['categories'] = $this->admin->get_all_categories();
		$this->var['query'] = $this->admin->get_all_subs();
		$this->var['module'] = 'admin/subs_category';
		$this->load->view('admin/index', $this->var);
	}

	public function create()
	{
		$cat_id = $this->input->post('cat_id');
		$sub_title = $this->input->post('sub_title');
		if (trim($sub_title)) {

			$data['cat_id'] = $cat_id;
			$data['sub_title'] = $sub_title;
			$data['sub_slug'] = url_title(strtolower($sub_title), '-');
			$data['is_delete'] = 0;
			$this->admin->insert_new_sub($data);
		}
		redirect('subs');
	}

	public function update()
	{
		$cat_id = $this->input->post('cat_id');
		$sub_title = $this->input->post('sub_title');
		if (trim($sub_title)) {

			$data['cat_id'] = $cat_id;
			$data['sub_title'] = $sub_title;
			$data['sub_slug'] = url_title(strtolower($sub_title), '-');
			$data['is_delete'] = 0;
			$this->admin->update_sub($data);
		}
		redirect('subs');
	}

	public function delete()
	{
		$id = $this->input->post('id', true);
		if ($id && $id > 0) {
			$this->admin->delete_sub($id);
		}
		
		redirect('subs');
	}
}
