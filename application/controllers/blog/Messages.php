<?php defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Aplikasi Website Sekolah | CMS (Content Management System) dan PPDB/PMB Online PREMIUM 
 * untuk sekolah SD/Sederajat, SMP/Sederajat, SMA/Sederajat, dan Perguruan Tinggi
 * @version    4.2.3
 * @author     LapakPHP | https://lapakphp.com/ | lapakphp@gmail.com
 * @copyright  (c) 2013-2019
 * @since      Version 4.2.3
 */

class Messages extends Admin_Controller {

	/**
	 * Class constructor
	 * @return	Void
	 */
	public function __construct() {
		parent::__construct();
		$this->load->model('m_messages');
		$this->pk = M_messages::$pk;
		$this->table = M_messages::$table;
	}

	/**
	 * Index
	 * @return	Void
	 */
	public function index() {
		$this->vars['title'] = 'PESAN MASUK';
		$this->vars['blog'] = $this->vars['messages'] = true;
		$this->vars['content'] = 'messages/read';
		$this->load->view('backend/index', $this->vars);
	}

	/**
	 * Pagination
	 * @return	Json
	 */
	public function pagination() {
		$page_number = (int) $this->input->post('page_number', true);
		$limit = (int) $this->input->post('per_page', true);
		$keyword = trim($this->input->post('keyword', true));
		$offset = ($page_number * $limit);
		$query = $this->m_messages->get_where($keyword, $limit, $offset);
		$total_rows = $this->m_messages->total_rows($keyword);
		$total_page = $limit > 0 ? ceil($total_rows / $limit) : 1;
		$response = [];
		$response['total_page'] = 0;
		$response['total_rows'] = 0;
		if ($query->num_rows() > 0) {
			$rows = [];
			foreach($query->result() as $row) {
				$rows[] = $row;
			}
			$response = [
				'total_page' => (int) $total_page,
				'total_rows' => (int) $total_rows,
				'rows' => $rows
			];
		}

		$this->output
			->set_content_type('application/json', 'utf-8')
			->set_output(json_encode($response, JSON_PRETTY_PRINT))
			->_display();
		exit;
	}

	/**
	 * find_id
	 * @param 	int $id
	 * @return 	Object
	 */
	public function find_id() {
		$id = (int) $this->input->post('id', true);
		$query = [];
		if ($id && $id > 0 && ctype_digit((string) $id)) {
			$query = $this->model->RowObject($this->table, $this->pk, $id);
		}
		$this->output
			->set_content_type('application/json', 'utf-8')
			->set_output(json_encode($query, JSON_PRETTY_PRINT))
			->_display();
		exit;
	}

	/**
	 * Save or Update
	 * @return 	Object
	 */
	public function save() {
		$id = (int) $this->input->post('id', true);
		$response = [];
		if ($this->validation()) {
			$fill_data = $this->fill_data();
			if ($id && $id > 0 && ctype_digit((string) $id)) {
				$fill_data['updated_at'] = date('Y-m-d H:i:s');
				$fill_data['updated_by'] = $this->session->userdata('id');
				$response['action'] = 'update';
				$response['type'] = $this->m_messages->reply($id, $fill_data) == 202 ? 'success' : 'error';
				$response['message'] = $response['type'] == 'success' ? 'email_send' : 'email_not_send';
			} else {
				$response['action'] = 'save';
				$response['type'] = 'error';
				$response['message'] = 'forbidden';
			}
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
	 * Fill Data
	 * @return Array
	 */
	private function fill_data() {
		return [
			'comment_subject' => $this->input->post('comment_subject', true),
			'comment_reply' => $this->input->post('comment_reply', true)
		];
	}

	/**
	 * Validations Form
	 * @return Boolean
	 */
	private function validation() {
		$this->load->library('form_validation');
		$val = $this->form_validation;
		$val->set_rules('comment_subject', 'Subject', 'trim|required');
		$val->set_rules('comment_reply', 'Reply', 'trim|required');
		$val->set_error_delimiters('<div>&sdot; ', '</div>');
		return $val->run();
	}
}
