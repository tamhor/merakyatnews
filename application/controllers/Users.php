<?php 

/**
 * 
 */
class Users extends Admin_Controller
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
		$this->var['title'] = 'View All Users';
		$this->var['query'] = $this->admin->get_all_users();
		$this->var['module'] = 'admin/all_users';
		$this->load->view('admin/index', $this->var);
	}

	public function create()
	{
		$news_data = [];
		$news_data['username'] = $this->input->post('username');
		$news_data['password'] = password_hash($this->input->post('password'), PASSWORD_BCRYPT);
		$news_data['full_name'] = $this->input->post('full_name');
		$news_data['email'] = $this->input->post('email');
		$news_data['role'] = $this->input->post('role');
		$news_data['is_delete'] = 0;

		$insert = $this->admin->insert_new_user($news_data);
		if($insert){
			$data['message'] = 'User berhasil ditambahkan';
			$data['type'] = 'success';
		}
		else {
			$data['message'] = "User gagal ditambahkan";
			$data['type'] = 'error';
		}
		redirect('users');
	}

	public function update()
	{
		$id = $this->input->post('id');
		$news_data = [];
		$news_data['username'] = $this->input->post('username');
		$news_data['password'] = password_hash($this->input->post('password'), PASSWORD_BCRYPT);
		$news_data['full_name'] = $this->input->post('full_name');
		$news_data['email'] = $this->input->post('email');
		$news_data['role'] = $this->input->post('role');
		$news_data['is_delete'] = 0;

		$update = $this->admin->update_user($news_data, $id);
		if($update){
			$data['message'] = 'User berhasil diubah';
			$data['type'] = 'success';
		}
		else {
			$data['message'] = "User gagal diubah";
			$data['type'] = 'error';
		}
		redirect('users');
	}

	public function delete()
	{
		$id = $this->input->post('id', true);
		if ($id && $id > 0) {
			$this->admin->delete_user($id);
		}
		
		redirect('users');
	}
}