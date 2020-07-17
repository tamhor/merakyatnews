<?php defined('BASEPATH') or exit('No direct script access allowed');

class Auth 
{
  public $CI;

  public function __construct()
  {
    $this->CI = &get_instance();
    $this->CI->load->model('m_admin', 'admin');
    $this->CI->load->library('session');
  }

  /**
	* Fungsi untuk mengecek apakah login berhasil atau tidak
	* @access public
	* @return bool
	*/
	public function logged_in_admin($username, $password)
	{
		$query = $this->CI->admin->logged_in_admin($username);
		if ($query->num_rows() === 1) {
			$data = $query->row();
			if ($username == $data->username && password_verify($password, $data->password)) {
// 			if ($username == $data->username && $password == $data->password) {
				$session_data = [];
				$session_data['logged_in'] = true;
				$session_data['id'] = $data->id;
				$session_data['full_name'] = $data->full_name;
				$session_data['role'] = $data->role;
				$this->CI->session->set_userdata($session_data);
				return true;
			}
			return false;
		}
		return false;
	}

	public function logged_in_user($username, $password)
	{
		$query = $this->CI->admin->logged_in_user($username);
		if ($query->num_rows() === 1) {
			$data = $query->row();
			if ($username == $data->username && password_verify($password, $data->password)) {
            // if ($username == $data->username && $password == $data->password) {
				$session_data = [];
				$session_data['logged_in'] = true;
				$session_data['id'] = $data->id;
				$session_data['full_name'] = $data->full_name;
				$session_data['role'] = $data->role;
				$this->CI->session->set_userdata($session_data);
				return true;
			}
			return false;
		}
		return false;
	}

	/**
	* fungsi untuk mengecek status login
	* @access public
	* @return bool
	*/
	public function is_logged_in_admin()
	{
		if ($this->CI->session->userdata('logged_in') !== NULL && $this->CI->session->userdata('logged_in') && $this->CI->session->userdata('role') == 1) {
			return true;
		}
		return false;
	}
	
	public function is_logged_in_user()
	{
		if ($this->CI->session->userdata('logged_in') !== NULL && $this->CI->session->userdata('logged_in') && $this->CI->session->userdata('role') == 0) {
			return true;
		}
		return false;
	}

	/**
	* fungsi untuk membatasi akses jika status login tidak aktif
	* @access public
	* @return void
	*/
	public function restrict()
	{
		if (!$this->is_logged_in_admin()) {
			redirect('login');
		}elseif (!$this->is_logged_in_user()) {
			redirect('user_login');
		}
	}
}
