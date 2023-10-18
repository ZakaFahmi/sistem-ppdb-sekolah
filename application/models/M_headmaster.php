<?php defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Aplikasi Website Sekolah | CMS (Content Management System) dan PPDB/PMB Online PREMIUM 
 * untuk sekolah SD/Sederajat, SMP/Sederajat, SMA/Sederajat, dan Perguruan Tinggi
 * @version    4.2.3
 * @author     LapakPHP | https://lapakphp.com/ | lapakphp@gmail.com
 * @copyright  (c) 2013-2019
 * @since      Version 4.2.3
 */

class M_headmaster extends CI_Model {

	/**
	 * Primary key
	 * @var String
	 */
	public static $pk = 'id';

	/**
	 * Table
	 * @var String
	 */
	public static $table = 'headmaster';

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
		$this->db->select('id, caption, deskripsi, email, facebook, instagram, twitter, image, is_deleted');
		if (!empty($keyword)) {
			$this->db->like('caption', $keyword);
			$this->db->or_like('deskripsi', $keyword);
			$this->db->or_like('email', $keyword);
			$this->db->or_like('facebook', $keyword);
			$this->db->or_like('instagram', $keyword);
			$this->db->or_like('twitter', $keyword);
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
			$this->db->like('caption', $keyword);
			$this->db->or_like('deskripsi', $keyword);
			$this->db->or_like('email', $keyword);
			$this->db->or_like('facebook', $keyword);
			$this->db->or_like('instagram', $keyword);
			$this->db->or_like('twitter', $keyword);
		}
		return $this->db->count_all_results(self::$table);
	}

	/**
	 * Get All Image Sliders
	 * @access public
	 * @return Query
	 */
	public function get_headmaster() {
		return $this->db
			->select('id, caption, deskripsi, facebook, instagram, twitter, image')
			->where('is_deleted', 'false')
			->get(self::$table);
	}
}