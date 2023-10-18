<?php defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Aplikasi Website Sekolah | CMS (Content Management System) dan PPDB/PMB Online PREMIUM 
 * untuk sekolah SD/Sederajat, SMP/Sederajat, SMA/Sederajat, dan Perguruan Tinggi
 * @version    4.2.3
 * @author     LapakPHP | https://lapakphp.com/ | lapakphp@gmail.com
 * @copyright  (c) 2013-2019
 * @since      Version 4.2.3
 */

class M_alumni extends CI_Model {

	/**
	 * Primary key
	 * @var String
	 */
	public static $pk = 'id';

	/**
	 * Table
	 * @var String
	 */
	public static $table = 'students';

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
		$this->db->select('id, nis, full_name, gender, street_address, photo, start_date, end_date, is_deleted');
		$this->db->where('is_alumni', 'true');
		if (!empty($keyword)) {
			$this->db->group_start();
			$this->db->like('nis', $keyword);
			$this->db->or_like('full_name', $keyword);
			$this->db->or_like('gender', $keyword);
			$this->db->or_like('street_address', $keyword);
			$this->db->or_like('start_date', $keyword);
			$this->db->or_like('end_date', $keyword);
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
		$this->db->where('is_alumni', 'true');
		if (!empty($keyword)) {
			$this->db->group_start();
			$this->db->like('nis', $keyword);
			$this->db->or_like('full_name', $keyword);
			$this->db->or_like('gender', $keyword);
			$this->db->or_like('street_address', $keyword);
			$this->db->or_like('start_date', $keyword);
			$this->db->or_like('end_date', $keyword);
			$this->db->group_end();
		}
		return $this->db->count_all_results(self::$table);
	}

	/**
	 * More Alumni
	 * @param Int
	 * @return query
	 */
	public function more_alumni($offset = 0) {
		$this->db->select("
			id
			, nis
			, nim
			, full_name
			, IF(gender = 'M', 'Laki-laki', 'Perempuan') AS gender
			, birth_place
			, LEFT(start_date, 4) AS start_date
			, LEFT(end_date, 4) AS end_date
			, birth_date
			, photo
		");
		$this->db->where('is_deleted', 'false');
		$this->db->where('is_alumni', 'true');
		if ($offset < 0) {
			$this->db->limit(20);
		}
		if ($offset > 0) {
			$this->db->limit(20, $offset);
		}
		$this->db->order_by('end_date', 'ASC');
		$this->db->order_by('full_name', 'ASC');
		return $this->db->get(self::$table);
	}
}