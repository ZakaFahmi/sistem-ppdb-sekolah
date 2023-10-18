<?php defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Aplikasi Website Sekolah | CMS (Content Management System) dan PPDB/PMB Online PREMIUM 
 * untuk sekolah SD/Sederajat, SMP/Sederajat, SMA/Sederajat, dan Perguruan Tinggi
 * @version    4.2.3
 * @author     LapakPHP | https://lapakphp.com/ | lapakphp@gmail.com
 * @copyright  (c) 2013-2019
 * @since      Version 4.2.3
 */

class M_academic_years extends CI_Model {

	/**
	 * Primary key
	 * @var String
	 */
	public static $pk = 'id';

	/**
	 * Table
	 * @var String
	 */
	public static $table = 'academic_years';

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
		$this->db->select('id, academic_year, semester, is_active, is_deleted');
		if (!empty($keyword)) {
			$this->db->like('academic_year', $keyword);
			$this->db->or_like('semester', $keyword);
		}
		if ($limit > 0) {
			$this->db->limit($limit, $offset);
		}
		return $this->db->get(self::$table);
	}

	/**
	 * Get active academic year ID
	 * @return Int
	 */
	public function get_active_id() {
		$query = $this->db
			->select('id')
			->where('is_active', 'true')
			->order_by('academic_year', 'DESC')
			->limit(1)
			->get(self::$table)
			->row();
		return $query->id;
	}

	/**
	 * Get Total row for pagination
	 * @param String
	 * @return Int
	 */
	public function total_rows($keyword = '') {
		if (!empty($keyword)) {
			$this->db->like('academic_year', $keyword);
			$this->db->or_like('semester', $keyword);
		}
		return $this->db->count_all_results(self::$table);
	}

	/**
	 * Dropdown
	 * @return array
	 */
	public function dropdown() {
		$query = $this->db
			->select('id, academic_year')
			->where('is_deleted', 'false')
			->order_by('academic_year', 'DESC')
			->get(self::$table);
		$data = [];
		if ($query->num_rows() > 0) {
			foreach($query->result() as $row) {
				$data[$row->id] = $row->academic_year;
			}
		}
		return $data;
	}

	/**
	 * Set not active
	 * @param Int
	 * @return bool
	 */
	public function set_not_active($id = 0) {
		if ($id > 0) {
			$this->db->where(self::$pk . ' !=', $id);
		}
		return $this->db->update(self::$table, ['is_active' => 'false']);
	}
}