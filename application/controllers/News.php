<?php defined('BASEPATH') or exit('No direct script access allowed');
/**
 * 
 */
class News extends Admin_Controller
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
		$this->var['title'] = 'View All Public Posts';
		if($this->auth->is_logged_in_admin()){
			$this->var['query'] = $this->admin->get_all_posts();
		}else{
			$this->var['query'] = $this->db
            ->select('p.id, p.post_title, c.cat_title, p.user_id, p.created_at')
            ->where("p.user_id = '$auth' AND p.post_cat_id = c.id AND p.is_delete = 0")
            ->get('posts p, categories c')
            ->result();
		}
		$this->var['module'] = 'admin/all_posts';
		$this->load->view('admin/index', $this->var);
	}
	
	public function users()
	{
		$auth = $this->session->userdata('id');
		// var_dump($auth);die;
		$this->var['title'] = 'View All Public Posts';
		if($this->auth->is_logged_in_admin()){
			$this->var['query'] = $this->admin->get_user_posts();
		}else{
		
		}
		$this->var['module'] = 'admin/all_posts';
		$this->load->view('admin/index', $this->var);
	}

	public function create()
	{
		$id = (int) $this->uri->segment(3);
		$auth = $this->session->userdata('id');

		$this->var['title'] = $id && $id > 0 ? 'Edit Post Entry' : 'Add New Post';
		$this->var['module'] = 'admin/add_post';
		$this->var['message'] = $this->save();
		$this->var['query'] = $id && $id > 0 && ctype_digit((string) $id) ? 
													$this->admin->get_post_row_obj($id) : ($this->var['message']['type'] == 'error' ? 
													$this->var['message']['query'] : false); 
		$this->var['categories'] = $this->admin->get_all_categories();
		$this->var['action'] = $id && $id > 0 ? site_url('news/create/save/'.$id) : site_url('news/create/save/');
		$this->load->view('admin/index', $this->var);
	}

	public function get_subs()
	{
		$id = $this->input->post('post_cat_id');
		$data = $this->admin->get_add_subs($id);
		$lists = "<option value=''>--Please-Select---</option>";
		foreach($data as $row){
            $lists .= "<option value='".$row->id."'>".$row->sub_title."</option>";
        }
        $callback = array('list_subs'=>$lists); 
        echo json_encode($callback);
	}

	
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

	public function save()
	{
		$id = (int) $this->uri->segment(4);
		$this->load->helper('file');

		if ($this->form_validate()) {
			$config = array(
				'upload_path' => "uploads/",
				'allowed_types' => "jpg|png|jpeg",
				'overwrite' => FALSE,
				'max_size' => "2048000", // Can be set to particular file size , here it is 2 MB(2048 Kb)
				'file_name' => time().'-'.$id.'-'.$_FILES["post_img"]['name']
				// 'max_height' => "768",
				// 'max_width' => "1024"
			);
			$this->load->library('upload', $config);

			if($this->upload->do_upload('post_img')){
				$image = $this->upload->data();

				$news_data = [];
				$news_data['post_title'] = $this->input->post('post_title');
				$news_data['post_content'] = $this->input->post('post_content');
				$news_data['post_cat_id'] = $this->input->post('post_cat_id');
				$news_data['post_sub_id'] = $this->input->post('post_sub_id');
				$news_data['post_slug'] = url_title(strtolower($this->input->post('post_title')), '-');
				$news_data['post_img'] = $image['file_name'];
				$news_data['post_lvl'] = $this->input->post('post_lvl');
				$news_data['user_id'] = $this->session->userdata('id');
				$news_data['is_public'] = $this->input->post('is_public');
				$news_data['is_delete'] = 0;
			
				if ($id && $id > 0) {
						$update = $this->admin->update_post($news_data, $id);
						if($update){
							$data['message'] = 'Berita berhasil diubah';
							$data['type'] = 'success';
						}
						else {
							$data['message'] = "Berita gagal diubah";
							$data['type'] = 'error';
						}
				}
				else {
					$news_data['created_at'] = date('Y-m-d H:i:s');
					$insert = $this->admin->insert_new_post($news_data);
					if($insert){
					    $data['query'] = $this->admin->get_post_row_obj($insert);
					    $data['action'] = site_url('news/create/save/'.$insert);
						$data['message'] = 'Berita berhasil ditambahkan';
						$data['type'] = 'success';
					}
					else {
						$data['message'] = "Berita gagal ditambahkan";
						$data['type'] = 'error';
					}
				}	
			}else{
				$data['message'] = $this->upload->display_errors();
				$data['type'] = 'error';
			}
		}else {
			$news_data['hidden_img'] = $this->input->post('hidden_img');
			$news_data['post_title'] = $this->input->post('post_title');
			$news_data['post_content'] = $this->input->post('post_content');
			$news_data['post_cat_id'] = $this->input->post('post_cat_id');
			$news_data['post_lvl'] = $this->input->post('post_lvl');
			$news_data['created_at'] = 'Now';
			$data['message'] = validation_errors();
			$data['type'] = 'error';
			$data['query'] = (object) $news_data;
		}
		return $data;
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

	public function file_check($str){
        $allowed_mime_type_arr = array('image/jpeg','image/pjpg','image/png');
        $mime = get_mime_by_extension($_FILES['post_img']['name']);
        if(isset($_FILES['post_img']['name']) && $_FILES['post_img']['name']!=""){
            if(in_array($mime, $allowed_mime_type_arr)){
                return true;
            }else{
                $this->form_validation->set_message('file_check', 'Please select only gif/jpg/png file.');
                return false;
            }
        }else{
            $this->form_validation->set_message('file_check', 'Please choose a file to upload.');
            return false;
        }
    }
}
