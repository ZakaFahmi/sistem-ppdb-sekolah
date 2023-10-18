<?php defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Aplikasi Website Sekolah | CMS (Content Management System) dan PPDB/PMB Online PREMIUM 
 * untuk sekolah SD/Sederajat, SMP/Sederajat, SMA/Sederajat, dan Perguruan Tinggi
 * @version    4.2.3
 * @author     LapakPHP | https://lapakphp.com/ | lapakphp@gmail.com
 * @copyright  (c) 2013-2019
 * @since      Version 4.2.3
 */

class Student_directory extends Public_Controller {

	/**
	 * Class constructor
	 * @return	Void
	 */
	public function __construct() {
		parent::__construct();
		$this->load->helper('form');
		$this->load->model(['m_students', 'm_academic_years', 'm_class_groups']);
	}

	/**
	 * Index
	 * @return	Void
	 */
	public function index() {
		$this->vars['content'] = 'themes/'.theme_folder().'/loop-students';
		$this->vars['ds_academic_years'] = $this->m_academic_years->dropdown();
		$this->vars['ds_class_groups'] = $this->m_class_groups->dropdown();
		$this->load->view('themes/'.theme_folder().'/index', $this->vars);
	}

	/**
	 * Search Students
	 */
	public function search_students() {
		$response = [];
		if ($this->validation()) {
			$academic_year_id = (int) $this->input->post('academic_year_id', true);
			$class_group_id = (int) $this->input->post('class_group_id', true);
			$query = $this->m_students->search_students($academic_year_id, $class_group_id);
			$rows = [];
			foreach($query->result() as $row) {
				$photo = 'no-image.jpg';
				if ($row->photo && file_exists($_SERVER['DOCUMENT_ROOT'] . '/media_library/students/'.$row->photo)) {
					$photo = $row->photo;
				}
				$rows[] = [
					'nis' => $row->nis,
					'nim' => $row->nim,
					'full_name' => $row->full_name,
					'gender' => $row->gender,
					'birth_place' => $row->birth_place,
					'birth_date' => indo_date($row->birth_date),
					'photo' => base_url('media_library/students/'.$photo)
				];
			}
			$response['rows'] = $rows;
		} else {
			$response['type'] = 'error';
			$response['message'] = validation_errors();
		}
			
		$this->output
			->set_content_type('application/json', 'utf-8')
			->set_output(json_encode($response, JSON_PRETTY_PRINT))
			->_display();
		exit;
	}

	/**
	 * Validations Form
	 * @return Boolean
	 */
	private function validation() {
		$this->load->library('form_validation');
		$val = $this->form_validation;
		$val->set_rules('academic_year_id', 'Tahun Pelajaran', 'trim|required|numeric');
		$val->set_rules('class_group_id', 'Kelas', 'trim|required|numeric');
		$val->set_error_delimiters('<div>&sdot; ', '</div>');
		return $val->run();
	}
}