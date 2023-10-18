<?php defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Aplikasi Website Sekolah | CMS (Content Management System) dan PPDB/PMB Online PREMIUM 
 * untuk sekolah SD/Sederajat, SMP/Sederajat, SMA/Sederajat, dan Perguruan Tinggi
 * @version    4.2.3
 * @author     LapakPHP | https://lapakphp.com/ | lapakphp@gmail.com
 * @copyright  (c) 2013-2019
 * @since      Version 4.2.3
 */

class M_pollings extends CI_Model {

	/**
	 * Primary key
	 * @var String
	 */
	public static $pk = 'id';

	/**
	 * Table
	 * @var String
	 */
	public static $table = 'pollings';

	/**
	 * Class constructor
	 * @return	Void
	 */
	public function __construct() {
		parent::__construct();
	}

	/**
	 * Save
	 * @return 	Json 
	 */
	public function save($answer_id) {
		$count = $this->db
			->where('ip_address', $_SERVER['REMOTE_ADDR'])
			->where('LEFT(created_at, 10)=', date('Y-m-d'))
			->count_all_results(self::$table);
		if ($count === 0) {
			return $this->model->insert(self::$table, [
					'ip_address' => $_SERVER['REMOTE_ADDR'],
					'answer_id' => $answer_id,
					'created_at' => date('Y-m-d H:i:s')
				]
			);
		}
	}

	/**
	 * Result
	 */
	public function polling_result($question_id) {
		if ($question_id && $question_id != 0 && ctype_digit((string) $question_id)) {
			return $this->db->query("
				SELECT x2.answer AS labels
				  , COUNT(*) AS data
				FROM pollings x1
				LEFT JOIN answers x2
				  ON x1.answer_id= x2.id
				WHERE x2.question_id = ?
				GROUP BY x1.answer_id
				ORDER BY 1 ASC
			", [(int) $question_id]);
		}
		return;		
	}
}