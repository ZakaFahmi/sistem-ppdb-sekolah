<?php defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Aplikasi Website Sekolah | CMS (Content Management System) dan PPDB/PMB Online PREMIUM 
 * untuk sekolah SD/Sederajat, SMP/Sederajat, SMA/Sederajat, dan Perguruan Tinggi
 * @version    4.2.3
 * @author     LapakPHP | https://lapakphp.com/ | lapakphp@gmail.com
 * @copyright  (c) 2013-2019
 * @since      Version 4.2.3
 */

class Import_students extends Admin_Controller {

	/**
	 * Class constructor
	 * @return	Void
	 */
	public function __construct() {
		parent::__construct();
		$this->load->model('m_options');
	}

	/**
	 * Index
	 * @return	Void
	 */
	public function index() {
		$this->vars['title'] = 'IMPORT PESERTA DIDIK';
		$this->vars['students'] = $this->vars['import_students'] = true;
		$this->vars['content'] = 'students/import_students';
		$this->load->view('backend/index', $this->vars);
	}

	/**
	 * Save
	 * @return 	Json 
	 */
	public function save() {
		$rows	= explode("\n", $this->input->post('students'));
		$success = 0;
		$failed = 0;
		$exist = 0;
		$school_level = get_school_level();
		foreach($rows as $row) {
			$exp = explode("\t", $row);
			if (count($exp) != 6) continue;
			$key = 'nis';
			if ($school_level == 5) {
				$key = 'nim';
			}
			$fill_data = [];
			$fill_data[$key] = trim($exp[0]);
			$fill_data['full_name'] = trim($exp[1]);
			$fill_data['gender'] = trim($exp[2]) == 'L' ? 'M' : 'F';
			$fill_data['street_address'] = trim($exp[3]);
			$fill_data['birth_place'] = trim($exp[4]);
			$fill_data['birth_date'] = trim($exp[5]);
			$fill_data['is_transfer'] = 'false';
			$fill_data['is_prospective_student'] = 'false';
			$fill_data['is_alumni'] = 'false';
			$fill_data['is_student'] = 'true';
			$fill_data['citizenship'] = 'WNI';
			$fill_data['student_status'] = $this->m_options->get_options_id('student_status', 'aktif');
			$fill_data['email'] = trim($exp[0]).'@'.str_replace(['http://www.', 'https://www.', 'http://', 'https://'], '', rtrim($this->session->userdata('website'), '/'));
			$is_exist = $this->model->isValExist($key, trim($exp[0]), 'students');
			if (!$is_exist) {
				$this->model->insert('students', $fill_data) ? $success++ : $failed++;
			} else {
				$exist++;
			}
		}
		$response = [];
		$response['type'] = 'info';
		$response['message'] = 'Success : ' . $success. ' rows, Failed : '. $failed .', Exist : ' . $exist;
		$this->output
			->set_content_type('application/json', 'utf-8')
			->set_output(json_encode($response, JSON_PRETTY_PRINT))
			->_display();
		exit;
	}
}