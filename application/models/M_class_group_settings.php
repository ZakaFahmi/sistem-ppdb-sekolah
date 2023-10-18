<?php defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Aplikasi Website Sekolah | CMS (Content Management System) dan PPDB/PMB Online PREMIUM 
 * untuk sekolah SD/Sederajat, SMP/Sederajat, SMA/Sederajat, dan Perguruan Tinggi
 * @version    4.2.3
 * @author     LapakPHP | https://lapakphp.com/ | lapakphp@gmail.com
 * @copyright  (c) 2013-2019
 * @since      Version 4.2.3
 */

class M_class_group_settings extends CI_Model {

	/**
	 * Primary key
	 * @var String
	 */
	public static $pk = 'id';

	/**
	 * Table
	 * @var String
	 */
	public static $table = 'class_group_settings';

	/**
	 * Class constructor
	 * @return	Void
	 */
	public function __construct() {
		parent::__construct();
		$this->load->model('m_options');
	}

	/**
	 * Save
	 * @param Int
	 * @param Int
	 * @param array
	 * @return bool
	 */
	public function insert($academic_year_id = 0, $class_group_id = 0, $ids = []) {
		$fill_data = [];
		foreach($ids as $id) {
			$is_exist = $this->model->isValExist('id', $id, 'students');
			if ($is_exist && !$this->is_exist($academic_year_id, $class_group_id, $id)) {
				$fill_data[] = [
					'academic_year_id' => $academic_year_id,
					'class_group_id' => $class_group_id,
					'student_id' => $id
				];
				$student_status = $this->m_options->get_options_id('student_status', 'aktif');
				if ($student_status > 0) {
					$this->db
						->where('id', $id)
						->update('students', [
							'student_status' => $student_status,
							'is_student' => 'true'
						]);
				}
			}
		}
		if (count($fill_data) > 0) {
			$this->db->insert_batch(self::$table, $fill_data);	
			return true;
		}
		return false;
	}

	/**
	 * Chek if not exist
	 * @param Int
	 * @param Int
	 * @param Int
	 * @return Bool
	 */
	private function is_exist($academic_year_id = 0, $class_group_id = 0, $student_id = 0) {
		if ($academic_year_id > 0 && $class_group_id > 0 && $student_id > 0) {
			$count = $this->db
				->where('academic_year_id', $academic_year_id)
				->where('class_group_id', $class_group_id)
				->where('student_id', $student_id)
				->count_all_results(self::$table);
			return $count > 0;
		}
		return true;
	}
}