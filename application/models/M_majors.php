<?php defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Aplikasi Website Sekolah | CMS (Content Management System) dan PPDB/PMB Online PREMIUM 
 * untuk sekolah SD/Sederajat, SMP/Sederajat, SMA/Sederajat, dan Perguruan Tinggi
 * @version    4.2.3
 * @author     LapakPHP | https://lapakphp.com/ | lapakphp@gmail.com
 * @copyright  (c) 2013-2019
 * @since      Version 4.2.3
 */

class M_majors extends CI_Model {

	/**
	 * Primary key
	 * @var String
	 */
	public static $pk = 'id';

	/**
	 * Table
	 * @var String
	 */
	public static $table = 'majors';

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
	public function get_where($keyword = '', $limit = 0, $offset = 0) {
		$this->db->select('id, major, short_name, is_deleted');
		if (!empty($keyword)) {
			$this->db->like('major', $keyword);
			$this->db->or_like('short_name', $keyword);
		}
		if ($limit > 0) {
			$this->db->limit($limit, $offset);
		}
		return $this->db->get(self::$table);
	}

	/**
	 * Get Total row for pagination
	 * @param String
	 * @return Int
	 */
	public function total_rows($keyword = '') {
		return $this->db
			->like('major', $keyword)
			->or_like('short_name', $keyword)
			->count_all_results(self::$table);
	}

	/**
	 * Dropdown
	 * @return array
	 */
	public function dropdown(array $options = []) {
		$query = $this->db
			->select('id, major')
			->where('is_deleted', 'false')
			->get(self::$table);
		$data = [];
		if (count($options) > 0) {
			foreach($options as $key => $value) {
				$data[$key] = $value;	
			}
		}
		if ($query->num_rows() > 0) {
			foreach($query->result() as $row) {
				$data[$row->id] = $row->major;
			}
		}
		return $data;
	}
}