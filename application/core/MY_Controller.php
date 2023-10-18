<?php defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Aplikasi Website Sekolah | CMS (Content Management System) dan PPDB/PMB Online PREMIUM 
 * untuk sekolah SD/Sederajat, SMP/Sederajat, SMA/Sederajat, dan Perguruan Tinggi
 * @version    4.2.3
 * @author     LapakPHP | https://lapakphp.com/ | lapakphp@gmail.com
 * @copyright  (c) 2013-2019
 * @since      Version 4.2.3
 */
	
class MY_Controller extends CI_Controller {

	/**
	 * General Variable
	 * @var Array
	 */
	protected $vars = [];
	
	/**
	 * Class constructor
	 * @return	Void
	 */
	public function __construct() {
		parent::__construct();
		$timezone = NULL !== $this->session->userdata('timezone') ? $this->session->userdata('timezone') : 'Asia/Jakarta';
		date_default_timezone_set($timezone);
		if (is_dir(FCPATH.'install')) {
			redirect(base_url().'install','refresh');
		}
	}
}

require_once(APPPATH.'/core/Public_Controller.php');
require_once(APPPATH.'/core/Admin_Controller.php');