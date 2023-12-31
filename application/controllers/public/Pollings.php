<?php defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Aplikasi Website Sekolah | CMS (Content Management System) dan PPDB/PMB Online PREMIUM 
 * untuk sekolah SD/Sederajat, SMP/Sederajat, SMA/Sederajat, dan Perguruan Tinggi
 * @version    4.2.3
 * @author     LapakPHP | https://lapakphp.com/ | lapakphp@gmail.com
 * @copyright  (c) 2013-2019
 * @since      Version 4.2.3
 */

class Pollings extends Public_Controller {

	/**
	 * Class constructor
	 * @return	Void
	 */
	public function __construct() {
		parent::__construct();
		$this->load->model('m_pollings');
	}
		
	/**
	 * Save | Update
	 * @return 	Json 
	 */
	public function save() {
		$response = [];
		if ($this->validation()) {
			$answer_id = (int) $this->input->post('answer_id', true);
			$response['type'] = $this->m_pollings->save($answer_id) ? 'success' : 'info';
			$response['message'] = $response['type'] == 'success' ? 'Terima kasih sudah mengikuti polling kami.' : 'Anda sudah mengikuti polling kami hari ini.';
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
		$val->set_rules('answer_id', 'Jawaban', 'trim|required|numeric');
		$val->set_error_delimiters('<div>&sdot; ', '</div>');
		return $val->run();
	}

	/**
	 * Eesult
	 */
	public function result() {
		$this->vars['title'] = 'Hasil Jajak Pendapat';
		$query = get_active_question();
		$results = $this->m_pollings->polling_result($query->id);
		$labels = [];
		$data = [];
		foreach($results->result() as $row) {
			array_push($labels, $row->labels);
			array_push($data, $row->data);
		}
		$this->vars['labels'] = json_encode($labels);
		$this->vars['data'] = json_encode($data);
		$this->vars['question'] = $query->question;
		$this->vars['content'] = 'themes/'.theme_folder().'/polling-result';
		$this->load->view('themes/'.theme_folder().'/index', $this->vars);
	}
}