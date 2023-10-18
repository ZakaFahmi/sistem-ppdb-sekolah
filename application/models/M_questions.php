<?php defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Aplikasi Website Sekolah | CMS (Content Management System) dan PPDB/PMB Online PREMIUM 
 * untuk sekolah SD/Sederajat, SMP/Sederajat, SMA/Sederajat, dan Perguruan Tinggi
 * @version    4.2.3
 * @author     LapakPHP | https://lapakphp.com/ | lapakphp@gmail.com
 * @copyright  (c) 2013-2019
 * @since      Version 4.2.3
 */

class M_questions extends CI_Model {

	/**
	 * Primary key
	 * @var String
	 */
	public static $pk = 'id';

	/**
	 * Table
	 * @var String
	 */
	public static $table = 'questions';

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
		$this->db->select('id, question, is_active, is_deleted');
		if (!empty($keyword)) {
			$this->db->like('question', $keyword);
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
		if (!empty($keyword)) {
			$this->db->like('question', $keyword);
		}
		return $this->db->count_all_results(self::$table);
	}

	/**
	 * Get Dropdown
	 * @return Array
	 */
	public function dropdown() {
		$this->db->select('id, question');
		$query = $this->db->get(self::$table);
		$data = [];
		foreach($query->result() as $row) {
			$data[$row->id] = $row->question;
		}
		return $data;
	}

	/**
	 * Get Active Question
	 * @access public
	 * @return Query
	 */
	public function get_active_question() {
		return $this->db
			->select('id, question')
			->where('is_active', 'true')
			->where('is_deleted', 'false')
			->limit(1)
			->get(self::$table)
			->row();
	}
}