<?php defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Aplikasi Website Sekolah | CMS (Content Management System) dan PPDB/PMB Online PREMIUM 
 * untuk sekolah SD/Sederajat, SMP/Sederajat, SMA/Sederajat, dan Perguruan Tinggi
 * @version    4.2.3
 * @author     LapakPHP | https://lapakphp.com/ | lapakphp@gmail.com
 * @copyright  (c) 2013-2019
 * @since      Version 4.2.3
 */

class M_class_groups extends CI_Model {

	/**
	 * Primary key
	 * @var String
	 */
	public static $pk = 'id';

	/**
	 * Table
	 * @var String
	 */
	public static $table = 'class_groups';

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
			, CONCAT(x1.class, IF((x2.short_name <> ''), CONCAT(' ',x2.short_name),''),IF((x1.sub_class <> ''),CONCAT(' - ',x1.sub_class),'')) AS class_group
			, x1.is_deleted
		");
		$this->db->join('majors x2', 'x1.major_id = x2.id', 'LEFT');
		if (!empty($keyword)) {
			$this->db->like("CONCAT(x1.class, IF((x2.short_name <> ''), CONCAT(' ',x2.short_name),''),IF((x1.sub_class <> ''),CONCAT(' - ',x1.sub_class),''))", $keyword);
		}
		$this->db->order_by('x1.class', 'ASC');
		$this->db->order_by('x1.sub_class', 'ASC');
		$this->db->order_by('x1.major_id', 'ASC');
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
		$this->db->join('majors x2', 'x1.major_id = x2.id', 'LEFT');
		if (!empty($keyword)) {
			$this->db->like("CONCAT(x1.class, IF((x2.short_name <> ''), CONCAT(' ',x2.short_name),''),IF((x1.sub_class <> ''),CONCAT(' - ',x1.sub_class),''))", $keyword);
		}
		return $this->db->count_all_results('class_groups x1');
	}

	/**
	 * Dropdown
	 * @return Array
	 */
	public function dropdown() {
		$query = $this->db
			->select("x1.id, CONCAT(x1.class, IF((x2.short_name <> ''), CONCAT(' ',x2.short_name),''),IF((x1.sub_class <> ''),CONCAT(' - ',x1.sub_class),'')) AS class_group")
			->join('majors x2', 'x1.major_id = x2.id', 'LEFT')
			->where('x1.is_deleted', 'false')
			->order_by('class_group', 'ASC')
			->get('class_groups x1');
		$data = [];
		if ($query->num_rows() > 0) {
			foreach($query->result() as $row) {
				$data[$row->id] = $row->class_group;
			}
		}
		return $data;
	}
}