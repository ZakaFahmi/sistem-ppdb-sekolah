<?php defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Aplikasi Website Sekolah | CMS (Content Management System) dan PPDB/PMB Online PREMIUM 
 * untuk sekolah SD/Sederajat, SMP/Sederajat, SMA/Sederajat, dan Perguruan Tinggi
 * @version    4.2.3
 * @author     LapakPHP | https://lapakphp.com/ | lapakphp@gmail.com
 * @copyright  (c) 2013-2019
 * @since      Version 4.2.3
 */

class Under_construction extends CI_Controller {

	/**
	 * Constructor
	 * @access  public
	 */
	public function __construct() {
		parent::__construct();
		if ($this->session->userdata('site_maintenance') == 'false') {
			redirect('home', 'refresh');
		}
	}

	/**
	 * Index
	 * @access  public
	 */
	public function index() {
		$this->load->view('frontend/under_construction');
	}
}