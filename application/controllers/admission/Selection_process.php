<?php defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Aplikasi Website Sekolah | CMS (Content Management System) dan PPDB/PMB Online PREMIUM 
 * untuk sekolah SD/Sederajat, SMP/Sederajat, SMA/Sederajat, dan Perguruan Tinggi
 * @version    4.2.3
 * @author     LapakPHP | https://lapakphp.com/ | lapakphp@gmail.com
 * @copyright  (c) 2013-2019
 * @since      Version 4.2.3
 */

class Selection_process extends Admin_Controller {
	
	/**
	 * Class constructor
	 * @return	Void
	 */
	public function __construct() {
		parent::__construct();
		$this->load->helper('form');
		$this->load->model(['m_majors', 'm_registrants']);
	}

	/**
	 * Index
	 * @return	Void
	 */
	public function index() {
		$this->vars['title'] = 'PROSES SELEKSI';
		$this->vars['admission'] = $this->vars['selection_process'] = true;
		$options = [];
		$options['unapproved'] = 'Tidak Diterima';
		if (in_array(get_school_level(), have_majors())) {
			$query = $this->m_majors->dropdown();
			foreach ($query as $key => $value) {
				$options[$key] = 'Diterima di '. $value;
			}
		} else {
			$options['approved'] = 'Diterima';
		}
		$this->vars['options'] = $options;
		$this->vars['content'] = 'admission/selection_process';
		$this->load->view('backend/index', $this->vars);
	}

	/**
	 * Autocomplete
	 */
	public function autocomplete() {
		$keyword = $this->input->get('term'); 
		$query = $this->m_registrants->autocomplete($keyword, 'selection_process');
		$data = [];
		if (in_array(get_school_level(), have_majors())) {
			foreach($query->result() as $row) {
				$data[] = $row->registration_number .' - '. $row->full_name.' (Pilihan I '.$row->first_choice.' - Pilihan II ' . $row->second_choice.')';
			}
		} else {
			foreach($query->result() as $row) {
				$data[] = $row->registration_number .' - '. $row->full_name;
			}
		}
		
		$this->output
			->set_content_type('application/json', 'utf-8')
			->set_output(json_encode($data, JSON_PRETTY_PRINT))
			->_display();
		exit;
	}

	public function save() {
		$response = [];
		if ($this->validation()) {
			$selection_result = $this->input->post('selection_result') == 'unset' ? NULL : $this->input->post('selection_result');
			$registrants = explode(',', $this->input->post('registrants'));
			$registration_number = [];
			foreach($registrants as $registrant) {
				$registration_number[] = trim(explode('-', $registrant)[0]);
			}
			$fill_data['created_by'] = $this->session->userdata('id');
			$response['action'] = 'save';
			$response['type'] = 'info';
			$response['message'] = $this->m_registrants->insert($selection_result, $registration_number);
		} else {
			$response['action'] = 'validation_errors';
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
	 */
	private function validation() {
		$this->load->library('form_validation');
		$val = $this->form_validation;
		$val->set_rules('selection_result', 'Selection Result', 'trim|required');
		$val->set_rules('registrants', 'Registrants', 'trim|required');
		$val->set_error_delimiters('<div>&sdot; ', '</div>');
		return $val->run();
	}
}