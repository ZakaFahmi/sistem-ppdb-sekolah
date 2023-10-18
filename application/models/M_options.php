<?php defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Aplikasi Website Sekolah | CMS (Content Management System) dan PPDB/PMB Online PREMIUM 
 * untuk sekolah SD/Sederajat, SMP/Sederajat, SMA/Sederajat, dan Perguruan Tinggi
 * @version    4.2.3
 * @author     LapakPHP | https://lapakphp.com/ | lapakphp@gmail.com
 * @copyright  (c) 2013-2019
 * @since      Version 4.2.3
 */

class M_options extends CI_Model {

	/**
	 * Primary key
	 * @var String
	 */
	public static $pk = 'id';

	/**
	 * Table
	 * @var String
	 */
	public static $table = 'options';

	/**
	 * Class constructor
	 * @return	Void
	 */
	public function __construct() {
		parent::__construct();
	}

	/**
	 * Get data for pagination
	 * @param String
	 * @param Int
	 * @param Int
	 * @return Query
	 */
	public function get_options($group = 'student_status') {
		$query = $this->db
			->select('id, option')
			->where('group', $group)
			->where('is_deleted', 'false')
			->order_by('id', 'ASC')
			->get(self::$table);
		$data = [];
		foreach($query->result() as $row) {
			$data[$row->id] = $row->option;
		}
		return $data;
	}

	/**
	 * Get options id
	 * @param String 
	 * @param String 
	 * @return Int
	 */
	public function get_options_id($group = '', $option = '') {
		$query = $this->db
			->select('id')
			->where('group', $group)
			->where('LOWER(`option`)', $option)
			->limit(1)
			->get('options')
			->row();
		return $query->id;
	}
}