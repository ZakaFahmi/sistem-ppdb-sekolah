<?php defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Aplikasi Website Sekolah | CMS (Content Management System) dan PPDB/PMB Online PREMIUM 
 * untuk sekolah SD/Sederajat, SMP/Sederajat, SMA/Sederajat, dan Perguruan Tinggi
 * @version    4.2.3
 * @author     LapakPHP | https://lapakphp.com/ | lapakphp@gmail.com
 * @copyright  (c) 2013-2019
 * @since      Version 4.2.3
 */

class Chart extends Admin_Controller {

	/**
	 * Class constructor
	 * @return	Void
	 */
	public function __construct() {
		parent::__construct();
		$this->load->model('m_students');
	}

	/**
	 * Index
	 * @return	Void
	 */
	public function index() {
		$this->vars['title'] = 'GRAFIK';
		$this->vars['students'] = $this->vars['chart_students'] = true;
		$query = $this->m_students->student_by_student_status();
		$labels = [];
		$data = [];
		foreach($query->result() as $row) {
			array_push($labels, $row->labels);
			array_push($data, $row->data);
		}
		$this->vars['labels'] = json_encode($labels);
		$this->vars['data'] = json_encode($data);
		$this->vars['content'] = 'students/chart';
		$this->load->view('backend/index', $this->vars);
	}
}