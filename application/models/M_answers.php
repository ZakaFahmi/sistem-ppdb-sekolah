<?php defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Aplikasi Website Sekolah | CMS (Content Management System) dan PPDB/PMB Online PREMIUM 
 * untuk sekolah SD/Sederajat, SMP/Sederajat, SMA/Sederajat, dan Perguruan Tinggi
 * @version    4.2.3
 * @author     LapakPHP | https://lapakphp.com/ | lapakphp@gmail.com
 * @copyright  (c) 2013-2019
 * @since      Version 4.2.3
 */

class M_answers extends CI_Model {

	/**
	 * Primary key
	 * @var String
	 */
	public static $pk = 'id';

	/**
	 * Table
	 * @var String
	 */
	public static $table = 'answers';

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
		$this->db->select('x1.id, x2.question,	x1.answer, x1.is_deleted');
		$this->db->join('questions x2', 'x1.question_id = x2.id', 'LEFT');
		if (!empty($keyword)) {
			$this->db->like('x2.question', $keyword);
			$this->db->or_like('x1.answer', $keyword);
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
		$this->db->join('questions x2', 'x1.question_id = x2.id', 'LEFT');
		if (!empty($keyword)) {
			$this->db->like('x2.question', $keyword);
			$this->db->or_like('x1.answer', $keyword);
		}
		return $this->db->count_all_results(self::$table .' x1');
	}

	/**
	 * Get All Answer By Question ID
	 * @param 	Int
	 * @access 	public
	 * @return 	Query
	 */
	public function get_answers($question_id) {
		return $this->db
			->select('id, answer')
			->where('question_id', $question_id)
			->where('is_deleted', 'false')
			->get('answers');
	}
}