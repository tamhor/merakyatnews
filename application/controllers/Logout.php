<?php defined('BASEPATH') or exit('No direct script access allowed');
	
	/**
	 * 
	 */
	class Logout extends CI_Controller
	{
		
		function __construct()
		{
			parent::__construct();
			$this->load->library('auth');
		}

		public function admin()
		{

			if (!$this->auth->is_logged_in_admin()) {
				redirect('login');
			}
			
			$logged_in = $this->session->userdata('logged_in');

			if (!empty($logged_in)) {
				$this->session->sess_destroy();
			}

			redirect('login');
		}

		public function user()
		{

			if (!$this->auth->is_logged_in_user()) {
				redirect(base_url());
			}
			
			$logged_in = $this->session->userdata('logged_in');

			if (!empty($logged_in)) {
				$this->session->sess_destroy();
			}

			redirect(base_url());
		}
	}