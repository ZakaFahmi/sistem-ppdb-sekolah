<?php defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Aplikasi Website Sekolah | CMS (Content Management System) dan PPDB/PMB Online PREMIUM 
 * untuk sekolah SD/Sederajat, SMP/Sederajat, SMA/Sederajat, dan Perguruan Tinggi
 * @version    4.2.3
 * @author     LapakPHP | https://lapakphp.com/ | lapakphp@gmail.com
 * @copyright  (c) 2013-2019
 * @since      Version 4.2.3
 */

class Backup_database extends Admin_Controller {

	/**
	 * Class constructor
	 * @return	Void
	 */
   public function __construct() {
      parent::__construct();
      if ($this->session->userdata('user_type') !== 'super_user')
      	redirect(base_url());
   }

   /**
	 * Backup Database
	 * @return	Void
	 */
	public function index() {
		$this->load->dbutil();
		$prefs = [
			'format' => 'zip',
			'filename' => 'backup-database-on-'.date("Y-m-d H-i-s").'.sql'
		];
		$backup =& $this->dbutil->backup($prefs); 
		$file_name = 'backup-database-on-'. date("Y-m-d-H-i-s") .'.zip';
		$this->zip->download($file_name);
	}
}