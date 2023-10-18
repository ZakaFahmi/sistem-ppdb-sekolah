<?php defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Aplikasi Website Sekolah | CMS (Content Management System) dan PPDB/PMB Online PREMIUM 
 * untuk sekolah SD/Sederajat, SMP/Sederajat, SMA/Sederajat, dan Perguruan Tinggi
 * @version    4.2.3
 * @author     LapakPHP | https://lapakphp.com/ | lapakphp@gmail.com
 * @copyright  (c) 2013-2019
 * @since      Version 4.2.3
 */

class M_tags extends CI_Model {

	/**
	 * Primary key
	 * @var String
	 */
	public static $pk = 'id';

	/**
	 * Table
	 * @var String
	 */
	public static $table = 'tags';

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
		$this->db->select('id, tag, slug, is_deleted');
		if (!empty($keyword)) {
			$this->db->like('tag', $keyword);
			$this->db->or_like('slug', $keyword);
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
			$this->db->like('tag', $keyword);
			$this->db->or_like('slug', $keyword);
		}
		return $this->db->count_all_results(self::$table);
	}

	/**
	 * Create Tag from posts
	 * @param String
	 * @return Void
	 */
	public function create($str) {
		$tags = explode(',', $str);
		foreach ($tags as $tag) {
			$count = $this->db
				->where('tag', trim($tag))
				->count_all_results(self::$table);
			if ($count == 0 && trim($tag) != '') {
				$data = [
					'tag' => trim($tag),
					'slug' => url_title(trim($tag))
				];
				$this->db->insert(self::$table, $data);
			}
		}
	}

	/**
	 * Get All Tags
	 * @access public
	 * @return Query
	 */
	public function get_tags() {
		return $this->db
			->select('id, tag, slug')
			->where('is_deleted', 'false')
			->get(self::$table);
	}
}