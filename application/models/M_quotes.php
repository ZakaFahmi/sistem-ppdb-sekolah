<?php defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Aplikasi Website Sekolah | CMS (Content Management System) dan PPDB/PMB Online PREMIUM 
 * untuk sekolah SD/Sederajat, SMP/Sederajat, SMA/Sederajat, dan Perguruan Tinggi
 * @version    4.2.3
 * @author     LapakPHP | https://lapakphp.com/ | lapakphp@gmail.com
 * @copyright  (c) 2013-2019
 * @since      Version 4.2.3
 */

class M_quotes extends CI_Model {

	/**
	 * Primary key
	 * @var String
	 */
	public static $pk = 'id';

	/**
	 * Table
	 * @var String
	 */
	public static $table = 'quotes';

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
		$this->db->select('id, quote, quote_by, status, url, is_deleted');
		if (!empty($keyword)) {
			$this->db->like('quote', $keyword);
			$this->db->or_like('quote_by', $keyword);
			$this->db->or_like('status', $keyword);
			$this->db->or_like('url', $keyword);
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
			$this->db->like('quote', $keyword);
			$this->db->or_like('quote_by', $keyword);
			$this->db->or_like('status', $keyword);
			$this->db->or_like('url', $keyword);
		}
		return $this->db->count_all_results(self::$table);
	}

		/**
	 * Get All Quotes
	 * @access public
	 * @return Query
	 */
	public function get_quotes() {
		return $this->db
			->select('id, quote, quote_by, status, url')
			->where('is_deleted', 'false')
			->get(self::$table);
	}
}