<?php defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Aplikasi Website Sekolah | CMS (Content Management System) dan PPDB/PMB Online PREMIUM 
 * untuk sekolah SD/Sederajat, SMP/Sederajat, SMA/Sederajat, dan Perguruan Tinggi
 * @version    4.2.3
 * @author     LapakPHP | https://lapakphp.com/ | lapakphp@gmail.com
 * @copyright  (c) 2013-2019
 * @since      Version 4.2.3
 */

class Administrator extends Admin_Controller {

	/**
	 * Class constructor
	 * @return	Void
	 */
	public function __construct() {
		parent::__construct();
		$this->load->model(['m_users', 'm_user_groups']);
		$this->pk = M_users::$pk;
		$this->table = M_users::$table;
	}

	/**
	 * Index
	 * @return	Void
	 */
	public function index() {
		$this->vars['title'] = 'USER ADMINISTRATOR';
		$this->vars['acl'] = $this->vars['administrator'] = true;
		$this->vars['user_groups_dropdown'] = json_encode($this->m_user_groups->dropdown());
		$this->vars['content'] = 'users/administrator';
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
		$query = $this->m_users->get_where($keyword, $limit, $offset, 'administrator');
		$total_rows = $this->m_users->total_rows($keyword);
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
	 * @param 	Int $id
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
		if ($this->validation($id)) {
			$fill_data = $this->fill_data();
			if ($id && $id > 0 && ctype_digit((string) $id)) {
				$fill_data['updated_at'] = date('Y-m-d H:i:s');
				$fill_data['updated_by'] = $this->session->userdata('id');
				$response['action'] = 'update';
				$response['type'] = $this->model->update($id, $this->table, $fill_data) ? 'success' : 'error';
				$response['message'] = $response['type'] == 'success' ? 'updated' : 'not_updated';
			} else {
				$fill_data['created_by'] = $this->session->userdata('id');
				$response['action'] = 'save';
				$response['type'] = $this->model->insert($this->table, $fill_data) ? 'success' : 'error';
				$response['message'] = $response['type'] == 'success' ? 'created' : 'not_created';
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
	 * fill_data
	 * @param int
	 * @return array
	 */
	private function fill_data() {
		$data = [];
		$data['user_name'] = $this->input->post('user_name', true);
		$user_password = $this->input->post('user_password', true);
		if ($user_password) {
			$data['user_password'] = password_hash($user_password, PASSWORD_BCRYPT);
		}
		$data['user_email'] = $this->input->post('user_email') ? $this->input->post('user_email', true) : NULL;
		$data['user_url'] = $this->input->post('user_url') ? prep_url($this->input->post('user_url', true)) : NULL;
		$data['user_full_name'] = $this->input->post('user_full_name', true);
		$data['biography'] = $this->input->post('biography', true);
		$data['user_group_id'] = $this->input->post('user_group_id') ? $this->input->post('user_group_id') : 0;
		$data['user_type'] = 'administrator';
		return $data;
	}

	/**
	 * Validations Form
	 * @param int
	 * @return Boolean
	 */
	private function validation($id = 0) {
		$this->load->library('form_validation');
		$val = $this->form_validation;
		$val->set_rules('user_name', 'User Name', 'trim|required');
		if ($id && $id > 0 && ctype_digit((string) $id)) {
			$val->set_rules('user_password', 'Password', 'trim|min_length[6]');
		} else {
			$val->set_rules('user_password', 'Password', 'trim|required|min_length[6]');
		}
		$val->set_rules('user_email', 'Email', 'trim|required|valid_email');
		$val->set_rules('user_url', 'URL', 'trim|valid_url');
		$val->set_rules('user_full_name', 'Full Name', 'trim|required');
		$val->set_rules('biography', 'Biography', 'trim');
		$val->set_message('required', '{field} harus diisi');
		$val->set_message('valid_email', '{field} harus diisi dengan format email yang benar');
		$val->set_error_delimiters('<div>&sdot; ', '</div>');
		return $val->run();
	}
}
