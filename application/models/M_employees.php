<?php defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Aplikasi Website Sekolah | CMS (Content Management System) dan PPDB/PMB Online PREMIUM 
 * untuk sekolah SD/Sederajat, SMP/Sederajat, SMA/Sederajat, dan Perguruan Tinggi
 * @version    4.2.3
 * @author     LapakPHP | https://lapakphp.com/ | lapakphp@gmail.com
 * @copyright  (c) 2013-2019
 * @since      Version 4.2.3
 */

class M_employees extends CI_Model {

	/**
	 * Primary key
	 * @var String
	 */
	public static $pk = 'id';

	/**
	 * Table
	 * @var String
	 */
	public static $table = 'employees';

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
		$this->db->select("
			x1.id
			, x1.nik
			, x1.full_name
			, x2.option AS employment_type
			, x1.gender
			, COALESCE(x1.birth_place, '') birth_place
			, x1.birth_date
			, x1.photo, x1.is_deleted
		");
		$this->db->join('options x2', 'x1.employment_type = x2.id', 'LEFT');
		if (!empty($keyword)) {
			$this->db->like('x1.nik', $keyword);
			$this->db->or_like('x1.full_name', $keyword);
			$this->db->or_like('x1.gender', $keyword);
			$this->db->or_like('x1.birth_place', $keyword);
			$this->db->or_like('x1.birth_date', $keyword);
			$this->db->or_like('x2.option', $keyword);
		}
		if ($limit > 0) {
			$this->db->limit($limit, $offset);
		}
		return $this->db->get(self::$table. ' x1');
	}

	/**
	 * Get Total row for pagination
	 * @param String
	 * @return Int
	 */
	public function total_rows($keyword = '') {
		$this->db->join('options x2', 'x1.employment_type = x2.id', 'LEFT');
		if (!empty($keyword)) {
			$this->db->like('x1.nik', $keyword);
			$this->db->or_like('x1.full_name', $keyword);
			$this->db->or_like('x1.gender', $keyword);
			$this->db->or_like('x1.birth_place', $keyword);
			$this->db->or_like('x1.birth_date', $keyword);
			$this->db->or_like('x2.option', $keyword);
		}
		return $this->db->count_all_results(self::$table.' x1');
	}

	/**
	 * More Employees
	 * @param Int
	 * @return query
	 */
	public function more_employees($offset = 0) {
		$this->db->select("
			x1.id
		  , x1.nik
		  , x1.full_name
		  , IF(x1.gender = 'M', 'Laki-laki', 'Perempuan') AS gender
		  , x1.birth_place
		  , x1.birth_date
		  , x1.photo
		  , COALESCE(x2.option, '-') AS employment_type
		");
		$this->db->join('options x2', 'x1.employment_type = x2.id', 'LEFT');
		$this->db->where('x1.is_deleted', 'false');
		if ($offset < 0) {
			$this->db->limit(20);
		}
		if ($offset > 0) {
			$this->db->limit(20, $offset);
		}
		$this->db->order_by('x1.full_name', 'ASC');
		return $this->db->get(self::$table.' x1');
	}

	/**
	 * get_active_employees
	 * @return query
	 */
	public function get_active_employees() {
		return $this->db
			->select('id, nik, full_name, email')
			->where('is_deleted', 'false')
			->get(self::$table);
	}
}