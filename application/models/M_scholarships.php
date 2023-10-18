<?php defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Aplikasi Website Sekolah | CMS (Content Management System) dan PPDB/PMB Online PREMIUM 
 * untuk sekolah SD/Sederajat, SMP/Sederajat, SMA/Sederajat, dan Perguruan Tinggi
 * @version    4.2.3
 * @author     LapakPHP | https://lapakphp.com/ | lapakphp@gmail.com
 * @copyright  (c) 2013-2019
 * @since      Version 4.2.3
 */

class M_scholarships extends CI_Model {

	/**
	 * Primary key
	 * @var String
	 */
	public static $pk = 'id';

	/**
	 * Table
	 * @var String
	 */
	public static $table = 'scholarships';

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
		$user_type = $this->session->userdata('user_type');
		$this->db->select('id, type, description, start_year, end_year, is_deleted');
		if ($user_type === 'student') {
			$this->db->where('student_id', $this->session->userdata('profile_id'));
		}
		if (!empty($keyword)) {
			$this->db->group_start();
			$this->db->like('type', $keyword);
			$this->db->or_like('description', $keyword);
			$this->db->or_like('start_year', $keyword);
			$this->db->or_like('end_year', $keyword);
			$this->db->group_end();
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
		if ($this->session->userdata('user_type') === 'student') {
			$this->db->where('student_id', $this->session->userdata('profile_id'));
		}
		if (!empty($keyword)) {
			$this->db->group_start();
			$this->db->like('type', $keyword);
			$this->db->or_like('description', $keyword);
			$this->db->or_like('start_year', $keyword);
			$this->db->or_like('end_year', $keyword);
			$this->db->group_end();
		}
		return $this->db->count_all_results(self::$table);;
	}
}