<?php defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Aplikasi Website Sekolah | CMS (Content Management System) dan PPDB/PMB Online PREMIUM 
 * untuk sekolah SD/Sederajat, SMP/Sederajat, SMA/Sederajat, dan Perguruan Tinggi
 * @version    4.2.3
 * @author     LapakPHP | https://lapakphp.com/ | lapakphp@gmail.com
 * @copyright  (c) 2013-2019
 * @since      Version 4.2.3
 */

class Home extends Public_Controller {

	/**
	 * Class constructor
	 * @return	Void
	 */
	public function __construct() {
		parent::__construct();
	}

	/**
	 * Index
	 * @return	Void
	 */
	public function index() {
		$this->vars['title'] = $this->session->userdata('website') . ' | ' . $this->session->userdata('tagline');
		$this->vars['content'] = 'themes/'.theme_folder().'/home';
		$this->load->view('themes/'.theme_folder().'/index', $this->vars);
	}
}