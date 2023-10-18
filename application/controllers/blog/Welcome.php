<?php defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Aplikasi Website Sekolah | CMS (Content Management System) dan PPDB/PMB Online PREMIUM 
 * untuk sekolah SD/Sederajat, SMP/Sederajat, SMA/Sederajat, dan Perguruan Tinggi
 * @version    4.2.3
 * @author     LapakPHP | https://lapakphp.com/ | lapakphp@gmail.com
 * @copyright  (c) 2013-2019
 * @since      Version 4.2.3
 */

class Welcome extends Admin_Controller {

	/**
	 * Class constructor
	 * @return	Void
	 */
	public function __construct() {
		parent::__construct();
		$this->load->model('m_posts');
		$this->pk = M_posts::$pk;
		$this->table = M_posts::$table;
	}

	/**
	 * Index
	 * @return	Void
	 */
	public function index() {
		$this->vars['title'] = 'SAMBUTAN ' . (get_school_level() == 5 ? 'REKTOR' : (get_school_level() == 6 ? 'KETUA': (get_school_level() == 7 ? 'DIREKTUR' : 'KEPALA SEKOLAH')));
		$this->vars['blog'] = $this->vars['welcome'] = true;
		$this->vars['query'] = $this->m_posts->get_welcome();
		$this->vars['content'] = 'posts/welcome';
		$this->load->view('backend/index', $this->vars);
	}

	/**
	 * Save or Update
	 * @return 	Object
	 */
	public function save() {
		$response = [];
		if ($this->validation()) {
			$fill_data = $this->fill_data();
			$fill_data['updated_at'] = date('Y-m-d H:i:s');
				$fill_data['updated_by'] = $this->session->userdata('id');
			$response['action'] = 'update';
			$response['type'] = $this->m_posts->welcome_update($fill_data) ? 'success' : 'error';
			$response['message'] = $response['type'] == 'success' ? 'updated' : 'not_updated';
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
	 * fill_data
	 */
	private function fill_data() {
		return [
			'post_content' => $this->input->post('post_content'),
			'post_type' => 'welcome'
		];
	}

	/**
	 * Validations Form
	 */
	private function validation() {
		$this->load->library('form_validation');
		$val = $this->form_validation;
		$val->set_rules('post_content', 'Sambutan Kepala Sekolah', 'trim|required');
		$val->set_error_delimiters('<div>&sdot; ', '</div>');
		return $val->run();
	}

	/**
	 * Insert image in tinyMCE Editor
	 */
	public function tinymce_upload() {
		$this->tinymce_upload_handler();
	}
}
