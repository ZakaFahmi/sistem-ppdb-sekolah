<?php defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Aplikasi Website Sekolah | CMS (Content Management System) dan PPDB/PMB Online PREMIUM 
 * untuk sekolah SD/Sederajat, SMP/Sederajat, SMA/Sederajat, dan Perguruan Tinggi
 * @version    4.2.3
 * @author     LapakPHP | https://lapakphp.com/ | lapakphp@gmail.com
 * @copyright  (c) 2013-2019
 * @since      Version 4.2.3
 */

class Logout extends CI_Controller {

	/**
	 * Constructor
	 * @access  public
	 */
	public function __construct() {
		parent::__construct();
		$this->load->model('m_users');
	}

	/**
	 * index()
	 * Fungsi untuk menghapus data session users
	 * @access  public
	 * @return   void
	 */
	public function index() {
		if (!$this->auth->is_logged_in())
			redirect(base_url());
		$id = (int) $this->session->userdata('id');
		if (!empty($id)) {
			$this->session->sess_destroy();
			$this->m_users->reset_logged_in($id);
		}
		redirect('login', 'refresh');
	}
 }