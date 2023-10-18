<?php defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Aplikasi Website Sekolah | CMS (Content Management System) dan PPDB/PMB Online PREMIUM 
 * untuk sekolah SD/Sederajat, SMP/Sederajat, SMA/Sederajat, dan Perguruan Tinggi
 * @version    4.2.3
 * @author     LapakPHP | https://lapakphp.com/ | lapakphp@gmail.com
 * @copyright  (c) 2013-2019
 * @since      Version 4.2.3
 */

class M_students extends CI_Model {

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
		$this->db->select("
			x1.id
			, COALESCE(x1.nis, '') nis
			, COALESCE(x1.nim, '') nim
			, x1.full_name
			, x2.option AS student_status
			, x1.gender
			, COALESCE(x1.birth_place, '') birth_place
			, x1.birth_date
			, x1.photo
			, x1.is_deleted
			");
		$this->db->join('options x2', 'x1.student_status = x2.id', 'LEFT');
		$this->db->where('x1.is_student', 'true');
		if (!empty($keyword)) {
			$this->db->group_start();
			$this->db->like('x1.nis', $keyword);
			$this->db->or_like('x2.option', $keyword);
			$this->db->or_like('x1.full_name', $keyword);
			$this->db->or_like('x1.gender', $keyword);
			$this->db->or_like('x1.birth_place', $keyword);
			$this->db->or_like('x1.birth_date', $keyword);
			$this->db->group_end();
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
		$this->db->join('options x2', 'x1.student_status = x2.id', 'LEFT');
		$this->db->where('x1.is_student', 'true');
		if (!empty($keyword)) {
			$this->db->group_start();
			$this->db->like('x1.nis', $keyword);
			$this->db->or_like('x2.option', $keyword);
			$this->db->or_like('x1.full_name', $keyword);
			$this->db->or_like('x1.gender', $keyword);
			$this->db->or_like('x1.birth_place', $keyword);
			$this->db->or_like('x1.birth_date', $keyword);
			$this->db->group_end();
		}
		return $this->db->count_all_results('students x1');
	}

	/**
	 * Autocomplete
	 * @param Int
	 * @param Int
	 * @param String
	 * @return resource
	 */
	public function autocomplete($academic_year_id, $class_group_id, $keyword) {
		$like = '%'.$this->db->escape_like_str($keyword).'%';
		$binding_params = [			
			(int) $academic_year_id,
			(int) $class_group_id,
			$like,
			$like,
			$like,
			$like
		];
		$query = $this->db->query("
			SELECT x21.* FROM (
			  SELECT x1.id
			    , x1.registration_number
			    , x1.nis
			    , x1.nim
			    , x1.full_name
			    , x1.is_prospective_student
			  FROM students x1
			  WHERE x1.is_student = 'true'
			  UNION
			  SELECT x1.id
			    , x1.registration_number
			    , x1.nis
			    , x1.nim
			    , x1.full_name
			    , x1.is_prospective_student
			  FROM students x1
			  WHERE x1.is_prospective_student = 'true'
			  AND x1.selection_result IS NOT NULL
			  AND x1.selection_result <> 'unapproved'
			) x21
			WHERE x21.id NOT IN (
			  SELECT student_id FROM class_group_settings
			  WHERE academic_year_id = ?
			  AND class_group_id = ?
			)
			AND (
			  x21.registration_number LIKE ?
			  OR x21.nis LIKE ?
			  OR x21.nim LIKE ?
			  OR x21.full_name LIKE ?
			) 
		", $binding_params);
		return $query;
	}

	/**
	 * Get total student by student status
	 */
	public function student_by_student_status() {
		return $this->db->query("
			SELECT x2.`option` AS labels
				, COUNT(*) AS data 
			FROM students x1
			JOIN `options` x2 ON x1.student_status = x2.id
			WHERE x1.is_student = 'true' 
			GROUP BY 1
			ORDER BY 1 ASC
		");
	}

	/**
	 * More Students
	 * @param Int
	 * @return query
	 */
	public function search_students($academic_year_id, $class_group_id) {
		$this->db->select("
			x1.id
		  , x2.nis
		  , x2.nim
		  , x2.full_name
		  , IF(x2.gender = 'M', 'Laki-laki', 'Perempuan') AS gender
		  , COALESCE(x2.birth_place, '') birth_place
		  , x2.birth_date
		  , x2.photo
		");
		$this->db->join('students x2', 'x1.student_id = x2.id', 'LEFT');
		$this->db->where('x1.is_deleted', 'false');
		$this->db->where('x1.academic_year_id', $academic_year_id);
		$this->db->where('x1.class_group_id', $class_group_id);
		$this->db->order_by('x2.full_name', 'ASC');
		return $this->db->get('class_group_settings x1');
	}

	/**
	 * get_active_students
	 * @return query
	 */
	public function get_active_students() {
		return $this->db
			->select('id, nis, nim, full_name, email')
			->where('is_student', 'true')
			->where('is_deleted', 'false')
			->get(self::$table);
	}
}