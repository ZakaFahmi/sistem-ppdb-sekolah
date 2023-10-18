<?php defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Aplikasi Website Sekolah | CMS (Content Management System) dan PPDB/PMB Online PREMIUM 
 * untuk sekolah SD/Sederajat, SMP/Sederajat, SMA/Sederajat, dan Perguruan Tinggi
 * @version    4.2.3
 * @author     LapakPHP | https://lapakphp.com/ | lapakphp@gmail.com
 * @copyright  (c) 2013-2019
 * @since      Version 4.2.3
 */

class Subscriber extends Public_Controller {

	/**
	 * Class constructor
	 * @return	Void
	 */
	public function __construct() {
		parent::__construct();
		$this->load->model('m_subscribers');
	}
		
	/**
	 * Save | Update
	 * @return 	Json 
	 */
	public function save() {
		$response = [];
		if ($this->validation()) {
			$email = $this->input->post('subscriber', true);
			$response['type'] = $this->m_subscribers->save($email) ? 'success' : 'info';
			$response['message'] = $response['type'] == 'success' ? 'Email anda sudah tersimpan' : 'Email anda sudah terdaftar dalam database kami.';
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
		$val->set_rules('subscriber', 'Email', 'trim|required|valid_email');
		$val->set_message('valid_email', 'Masukan email dengan format yang benar');
		$val->set_error_delimiters('<div>&sdot; ', '</div>');
		return $val->run();
	}
}