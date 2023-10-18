<?php defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Aplikasi Website Sekolah | CMS (Content Management System) dan PPDB/PMB Online PREMIUM 
 * untuk sekolah SD/Sederajat, SMP/Sederajat, SMA/Sederajat, dan Perguruan Tinggi
 * @version    4.2.3
 * @author     LapakPHP | https://lapakphp.com/ | lapakphp@gmail.com
 * @copyright  (c) 2013-2019
 * @since      Version 4.2.3
 */

class M_pages extends CI_Model {

	/**
	 * Primary key
	 * @var String
	 */
	public static $pk = 'id';

	/**
	 * Table
	 * @var String
	 */
	public static $table = 'posts';

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
	 * @return Resource
	 */
	public function get_where($keyword = '', $limit = 0, $offset = 0) {
		$this->db->select('
			x1.id
			, x1.post_title
			, x2.user_full_name AS post_author
			, x1.created_at
			, x1.is_deleted
		');
		$this->db->join('users x2', 'x1.post_author = x2.id', 'LEFT');
		$this->db->where('x1.post_type', 'page');
		if (!empty($keyword)) {
			$this->db->group_start();
			$this->db->like('x1.post_title', $keyword);
			$this->db->or_like('x2.user_full_name', $keyword);
			$this->db->or_like('x1.created_at', $keyword);
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
		$this->db->join('users x2', 'x1.post_author = x2.id', 'LEFT');
		$this->db->where('x1.post_type', 'page');
		if (!empty($keyword)) {
			$this->db->group_start();
			$this->db->like('x1.post_title', $keyword);
			$this->db->or_like('x2.user_full_name', $keyword);
			$this->db->or_like('x1.created_at', $keyword);
			$this->db->group_end();
		}
		return $this->db->count_all_results('posts x1');
	}

	public function get_all() {
		return $this->db
			->select('id, post_title')
			->where('post_type', 'page')
			->where('is_deleted', 'false')
			->get(self::$table);
	}

	/**
	 * Get Another Pages
	 * @param 	Int
	 * @access 	public
	 * @return 	Query
	 */
	public function get_another_pages($id) {
		return $this->db
			->select('id, post_title, post_slug')
			->where('post_type', 'page')
			->where('is_deleted', 'false')
			->where(self::$pk.' <>', $id)
			->limit(10)
			->get(self::$table);
	}

	/**
	 * Search
	 * @param String
	 * @return Array
	 */
	public function search($keyword) {
		return $this->db
			->select('id, post_title, post_content, post_slug')
			->like('post_title', $keyword)
			->where('post_type', 'page')
			->where('post_status', 'publish')
			->where('post_visibility', 'public')
			->where('is_deleted', 'false')
			->limit(10)
			->get(self::$table);
	}
}