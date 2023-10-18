<?php defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Aplikasi Website Sekolah | CMS (Content Management System) dan PPDB/PMB Online PREMIUM 
 * untuk sekolah SD/Sederajat, SMP/Sederajat, SMA/Sederajat, dan Perguruan Tinggi
 * @version    4.2.3
 * @author     LapakPHP | https://lapakphp.com/ | lapakphp@gmail.com
 * @copyright  (c) 2013-2019
 * @since      Version 4.2.3
 */

class M_files extends CI_Model {

	/**
	 * Primary key
	 * @var String
	 */
	public static $pk = 'id';

	/**
	 * Table
	 * @var String
	 */
	public static $table = 'files';

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
		$this->db->select('
			x1.id
			, x1.file_title
			, x1.file_name
			, x1.file_type
			, x1.file_size
			, x2.category
			, x1.file_counter
			, x1.file_visibility
			, x1.is_deleted
		');
		$this->db->join('file_categories x2', 'x1.file_category_id = x2.id',  'LEFT');
		if (!empty($keyword)) {
			$this->db->like('x1.file_title', $keyword);
			$this->db->or_like('x1.file_type', $keyword);
			$this->db->or_like('x1.file_size', $keyword);
			$this->db->or_like('x2.category', $keyword);
			$this->db->or_like('x1.file_visibility', $keyword);
		}
		if ($limit > 0) {
			$this->db->limit($limit, $offset);
		}
		return $this->db->get(self::$table.' x1');
	}

	/**
	 * Get All Data
	 * @return Query
	 */
	public function get_by_category($slug) {
		$this->db
			->select('x1.id
					, x1.file_title
					, x1.file_name
					, x1.file_type
					, x1.file_size
					, x2.category
					, x1.file_counter
					, x1.file_visibility');
		$this->db->join('file_categories x2', 'x1.file_category_id = x2.id',  'LEFT');
		$this->db->where('x2.slug', $slug);
		$this->db->limit(20);
		if (! $this->auth->is_logged_in()) {
			$this->db->where('x1.file_visibility', 'public');
		}
		return $this->db->get('files x1');
	}

	/**
	 * Get Total row for pagination
	 * @param String
	 * @return Int
	 */
	public function total_rows($keyword = '') {
		$this->db->join('file_categories x2', 'x1.file_category_id = x2.id',  'LEFT');
		if (! $this->auth->is_logged_in()) {
			$this->db->where('x1.file_visibility', 'public');
		}
		if (!empty($keyword)) {
			$this->db->like('x1.file_title', $keyword);
			$this->db->or_like('x1.file_type', $keyword);
			$this->db->or_like('x1.file_size', $keyword);
			$this->db->or_like('x2.category', $keyword);
			$this->db->or_like('x1.file_visibility', $keyword);
		}
		return $this->db->count_all_results('files x1');
	}

	/**
	 * more_files
	 * @param Int
	 * @return query
	 */
	public function more_files($slug = '', $offset = 0) {
		$this->db
			->select('x1.id
					, x1.file_title
					, x1.file_name
					, x1.file_type
					, x1.file_size
					, x2.category
					, x1.file_counter
					, x1.file_visibility');
		$this->db->join('file_categories x2', 'x1.file_category_id = x2.id',  'LEFT');
		$this->db->where('x1.is_deleted', 'false');
		if ($slug) {
			$this->db->where('x2.slug', $slug);	
		}
		if (! $this->auth->is_logged_in()) {
			$this->db->where('x1.file_visibility', 'public');
		}
		if ($offset < 0) {
			$this->db->limit(20);
		}
		if ($offset > 0) {
			$this->db->limit(20, $offset);
		}
		return $this->db->get(self::$table.' x1');
	}

	/**
	 * count_all_results
	 * @return Int
	 */
	public function count_all_results() {
		$this->db->where('is_deleted', 'false');
		if (! $this->auth->is_logged_in()) {
			$this->db->where('file_visibility', 'public');
		}
		return $this->db->count_all_results(self::$table);
	}
}