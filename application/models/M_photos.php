<?php defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Aplikasi Website Sekolah | CMS (Content Management System) dan PPDB/PMB Online PREMIUM 
 * untuk sekolah SD/Sederajat, SMP/Sederajat, SMA/Sederajat, dan Perguruan Tinggi
 * @version    4.2.3
 * @author     LapakPHP | https://lapakphp.com/ | lapakphp@gmail.com
 * @copyright  (c) 2013-2019
 * @since      Version 4.2.3
 */

class M_photos extends CI_Model {

	/**
	 * Primary key
	 * @var String
	 */
	public static $pk = 'id';

	/**
	 * Table
	 * @var String
	 */
	public static $table = 'photos';

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
		$this->db->select('x1.id, CONCAT("thumbnail/",x1.photo_name) AS photo_name, x2.album_title, x1.is_deleted');
		$this->db->join('albums x2', 'x1.photo_album_id=x2.id', 'left');
		if (!empty($keyword)) {
			$this->db->like('x2.album_title', $keyword);
		}
		if ($limit > 0) {
			$this->db->limit($limit, $offset);
		}
		return $this->db->get(self::$table.' x1');
	}

	/**
	 * Get Total row for pagination
	 * @param String
	 * @return Int
	 */
	public function total_rows($keyword = '') {
		$this->db->join('albums x2', 'x1.photo_album_id=x2.id', 'left');
		if (!empty($keyword)) {
			$this->db->like('x2.album_title', $keyword);
		}
		return $this->db->count_all_results('photos x1');
	}

	/**
	 * @param Int
	 * @return Boolean
	 */
	public function delete_permanently($id) {
		$this->db->trans_start();
		$this->db->where(self::$pk, $id)->delete(self::$table);
		$this->db->trans_complete();
		return $this->db->trans_status();
	}

	/**
	 * Get Images By ALbum ID
	 * @param 	Int
	 * @return Query
	 */
	public function get_image_by_album_id($id) {
		return $this->db
			->select('photo_name')
			->where('photo_album_id', $id)
			->get(self::$table);
	}
}