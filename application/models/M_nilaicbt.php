<?php defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Aplikasi Website Sekolah | CMS (Content Management System) dan PPDB/PMB Online PREMIUM 
 * untuk sekolah SD/Sederajat, SMP/Sederajat, SMA/Sederajat, dan Perguruan Tinggi
 * @version    4.2.3
 * @author     LapakPHP | https://lapakphp.com/ | lapakphp@gmail.com
 * @copyright  (c) 2013-2019
 * @since      Version 4.2.3
 */

class M_Nilaicbt extends CI_Model {

	/**
	 * Primary key
	 * @var String
	 */
	public static $pk = 'id';

	/**
	 * Table
	 * @var String
	 */
	public static $table = 'cbt_nilai';

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
		$user_type = $this->session->userdata('user_type');
		$this->db->select('id, XTgl, type, level, year, XTokenUjian, organizer, XKodeMapel, XJumSoal, XKodeUjian, XTotalNilai, XNamaKelas, XSemester, XSetId, is_deleted');
		if (!empty($keyword)) {
			$this->db->group_start();
			$this->db->like('XTgl', $keyword);
			$this->db->or_like('type', $keyword);
			$this->db->or_like('level', $keyword);
			$this->db->or_like('year', $keyword);
			$this->db->or_like('XTokenUjian', $keyword);
			$this->db->or_like('organizer', $keyword);
			$this->db->or_like('XKodeMapel', $keyword);
			$this->db->or_like('XJumSoal', $keyword);
			$this->db->or_like('XKodeUjian', $keyword);
			$this->db->or_like('XTotalNilai', $keyword);
			$this->db->or_like('XNamaKelas', $keyword);
			$this->db->or_like('XSemester', $keyword);
			$this->db->or_like('XSetId', $keyword);
			$this->db->group_end();
		}
		if ($user_type === 'student') {
			$this->db->where('XNomerUjian', $this->session->userdata('user_name'));
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
			$this->db->group_start();
			$this->db->like('XTgl', $keyword);
			$this->db->or_like('type', $keyword);
			$this->db->or_like('level', $keyword);
			$this->db->or_like('year', $keyword);
			$this->db->or_like('XTokenUjian', $keyword);
			$this->db->or_like('organizer', $keyword);
			$this->db->or_like('XKodeMapel', $keyword);
			$this->db->or_like('XJumSoal', $keyword);
			$this->db->or_like('XKodeUjian', $keyword);
			$this->db->or_like('XTotalNilai', $keyword);
			$this->db->or_like('XNamaKelas', $keyword);
			$this->db->or_like('XSemester', $keyword);
			$this->db->or_like('XSetId', $keyword);
			$this->db->group_end();
		}
		if ($this->session->userdata('user_type') === 'student') {
			$this->db->where('XNomerUjian', $this->session->userdata('user_name'));
		}
		return $this->db->count_all_results(self::$table);;
	}
}