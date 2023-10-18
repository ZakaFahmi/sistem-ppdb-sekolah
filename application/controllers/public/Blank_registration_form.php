<?php defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Aplikasi Website Sekolah | CMS (Content Management System) dan PPDB/PMB Online PREMIUM 
 * untuk sekolah SD/Sederajat, SMP/Sederajat, SMA/Sederajat, dan Perguruan Tinggi
 * @version    4.2.3
 * @author     LapakPHP | https://lapakphp.com/ | lapakphp@gmail.com
 * @copyright  (c) 2013-2019
 * @since      Version 4.2.3
 */

class Blank_registration_form extends Public_Controller {

	/**
	 * Constructor
	 * @access  public
	 */
	public function __construct() {
		parent::__construct();
	}
	
	/**
	 * Index
	 * @access  public
	 */
	public function index() {
		$this->load->library('admission');
		$this->admission->blank_pdf();
	}
}