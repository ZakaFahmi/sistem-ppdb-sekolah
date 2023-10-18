<?php defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Aplikasi Website Sekolah | CMS (Content Management System) dan PPDB/PMB Online PREMIUM 
 * untuk sekolah SD/Sederajat, SMP/Sederajat, SMA/Sederajat, dan Perguruan Tinggi
 * @version    4.2.3
 * @author     LapakPHP | https://lapakphp.com/ | lapakphp@gmail.com
 * @copyright  (c) 2013-2019
 * @since      Version 4.2.3
 */

class M_themes extends CI_Model {

	/**
	 * Primary key
	 * @var String
	 */
	public static $pk = 'id';

	/**
	 * Table
	 * @var String
	 */
	public static $table = 'themes';

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
		$this->db->select('id, theme_name, theme_folder, theme_author, is_active, is_deleted');
		if (!empty($keyword)) {
			$this->db->like('theme_name', $keyword);
			$this->db->or_like('theme_folder', $keyword);
			$this->db->or_like('theme_author', $keyword);
		}
		$this->db->order_by('theme_name');
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
			$this->db->like('theme_name', $keyword);
			$this->db->or_like('theme_folder', $keyword);
			$this->db->or_like('theme_author', $keyword);
		}
		return $this->db->count_all_results(self::$table);
	}

	/**
	 * get_active_themes
	 * @return String
	 */
	public function get_active_themes() {
		$query = $this->db
			->select('theme_folder')
			->where('is_active', 'true')
			->limit(1)
			->get(self::$table);
		if ($query->num_rows() === 1) {
			$result = $query->row();
			return $result->theme_folder;
		}
		return 'cosmo';
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