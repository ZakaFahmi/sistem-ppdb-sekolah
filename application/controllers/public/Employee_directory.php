<?php defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Aplikasi Website Sekolah | CMS (Content Management System) dan PPDB/PMB Online PREMIUM 
 * untuk sekolah SD/Sederajat, SMP/Sederajat, SMA/Sederajat, dan Perguruan Tinggi
 * @version    4.2.3
 * @author     LapakPHP | https://lapakphp.com/ | lapakphp@gmail.com
 * @copyright  (c) 2013-2019
 * @since      Version 4.2.3
 */

class Employee_directory extends Public_Controller {

	/**
	 * Total Rows
	 */
	public $total_rows = 0;

	/**
	 * Total Page
	 */
	public $total_pages = 0;

	/**
	 * Class constructor
	 * @return	Void
	 */
	public function __construct() {
		parent::__construct();
		$this->load->model('m_employees');
		$this->total_rows = $this->m_employees->more_employees(0)->num_rows();
		$this->total_pages = ceil($this->total_rows / 20);
	}

	/**
	 * Index
	 * @return	Void
	 */
	public function index() {
		$this->vars['page_title'] = (get_school_level() == 5 ? 'DOSEN DAN STAFF' : 'GURU DAN TENAGA KEPENDIDIKAN');
		$this->vars['total_pages'] = $this->total_pages;
		$this->vars['query'] = $this->m_employees->more_employees(-1);
		$this->vars['content'] = 'themes/'.theme_folder().'/loop-employees';
		$this->load->view('themes/'.theme_folder().'/index', $this->vars);
	}

	/**
	 * More Files
	 */
	public function more_employees() {
		$page_number = (int) $this->input->post('page_number', true);
		$offset = ($page_number - 1) * 20;
		$response = [];
		$query = $this->m_employees->more_employees($offset);
		$rows = [];
		foreach($query->result() as $row) {
			$photo = 'no-image.jpg';
			if ($row->photo && file_exists($_SERVER['DOCUMENT_ROOT'] . '/media_library/employees/'.$row->photo)) {
				$photo = $row->photo;
			}
			$rows[] = [
				'nik' => $row->nik,
				'full_name' => $row->full_name,
				'gender' => $row->gender,
				'birth_place' => $row->birth_place,
				'birth_date' => indo_date($row->birth_date),
				'photo' => base_url('media_library/employees/'.$photo),
				'employment_type' => $row->employment_type
			];
		}
		$response['rows'] = $rows;
		$this->output
			->set_content_type('application/json', 'utf-8')
			->set_output(json_encode($response, JSON_PRETTY_PRINT))
			->_display();
		exit;
	}
}