<?php defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Aplikasi Website Sekolah | CMS (Content Management System) dan PPDB/PMB Online PREMIUM 
 * untuk sekolah SD/Sederajat, SMP/Sederajat, SMA/Sederajat, dan Perguruan Tinggi
 * @version    4.2.3
 * @author     LapakPHP | https://lapakphp.com/ | lapakphp@gmail.com
 * @copyright  (c) 2013-2019
 * @since      Version 4.2.3
 */

class M_videos extends CI_Model {

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
	 * @return Query
	 */
	public function get_where($keyword = '', $limit = 0, $offset = 0) {
		$this->db->select('id, post_title, post_content, is_deleted');
		$this->db->where('post_type', 'video');
		if (!empty($keyword)) {
			$this->db->group_start();
			$this->db->like('post_title', $keyword);
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
		$this->db->where('post_type', 'video');
		if (!empty($keyword)) {
			$this->db->group_start();
			$this->db->like('post_title', $keyword);
			$this->db->group_end();
		}
		return $this->db->count_all_results(self::$table);
	}

	/**
	 * Get Recent Videos
	 * @return String
	 */
	public function get_recent_video($limit) {
		return $this->db
			->select('post_content')
			->where('post_type', 'video')
			->where('is_deleted', 'false')
			->order_by('created_at', 'DESC')
			->limit($limit)
			->get(self::$table);
	}

	/**
	 * Get All Videos
	 * @return String
	 */
	public function get_videos() {
		return $this->db
			->select('id, post_title, post_content')
			->where('post_type', 'video')
			->where('is_deleted', 'false')
			->order_by('created_at', 'DESC')
			->get(self::$table);
	}
}