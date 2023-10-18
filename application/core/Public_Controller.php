<?php defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Aplikasi Website Sekolah | CMS (Content Management System) dan PPDB/PMB Online PREMIUM 
 * untuk sekolah SD/Sederajat, SMP/Sederajat, SMA/Sederajat, dan Perguruan Tinggi
 * @version    4.2.3
 * @author     LapakPHP | https://lapakphp.com/ | lapakphp@gmail.com
 * @copyright  (c) 2013-2019
 * @since      Version 4.2.3
 */

class Public_Controller extends MY_Controller {

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
		
		// Load Text Helper
		$this->load->helper(['text', 'blog_helper']);

		// redirect if under construction
		if ($this->session->userdata('site_maintenance') == 'true' && 
			$this->session->userdata('site_maintenance_end_date') >= date('Y-m-d') && 
			$this->uri->segment(1) !== 'login') {
			redirect('under-construction');
		}

		//  cache file
		if ($this->session->userdata('site_cache') == 'true' && intval($this->session->userdata('site_cache_time')) > 0) {
			$this->output->cache($this->session->userdata('site_cache_time'));
		}

		// Load Top Menus
		$this->load->model('m_menus');
		$this->vars['menus'] = $this->m_menus->get_parent_menu();
	}
}