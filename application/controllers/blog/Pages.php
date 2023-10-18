<?php defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Aplikasi Website Sekolah | CMS (Content Management System) dan PPDB/PMB Online PREMIUM 
 * untuk sekolah SD/Sederajat, SMP/Sederajat, SMA/Sederajat, dan Perguruan Tinggi
 * @version    4.2.3
 * @author     LapakPHP | https://lapakphp.com/ | lapakphp@gmail.com
 * @copyright  (c) 2013-2019
 * @since      Version 4.2.3
 */

class Pages extends Admin_Controller {

	/**
	 * Class constructor
	 * @return	Void
	 */
	public function __construct() {
		parent::__construct();
		$this->load->model('m_pages');
		$this->pk = M_pages::$pk;
		$this->table = M_pages::$table;
	}

	/**
	 * Index
	 * @return	Void
	 */
	public function index() {
		$this->vars['title'] = 'HALAMAN';
		$this->vars['blog'] = $this->vars['pages'] = true;
		$this->vars['content'] = 'pages/read';
		$this->load->view('backend/index', $this->vars);
	}

	/**
	 * Add new
	 */
	public function create() {
		$this->load->helper('form');
		$id = $this->uri->segment(4);
		if ($id && $id > 0 && ctype_digit((string) $id)) {
			$this->vars['query'] = $this->model->RowObject($this->table, $this->pk, $id);
		} else {
			$this->vars['query'] = false;
		}
		$this->vars['title'] = $id && is_int(intval($id)) ? 'Edit Halaman' : 'Tambah Halaman';
		$this->vars['blog'] = $this->vars['pages'] = true;
		$this->vars['action'] = site_url('blog/pages/save/'.$id);
		$this->vars['content'] = 'pages/create';
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
		$query = $this->m_pages->get_where($keyword, $limit, $offset);
		$total_rows = $this->m_pages->total_rows($keyword);
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
	 * Find by ID
	 * @return 	Json 
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
	 * Save | Update
	 * @return 	Json 
	 */
	public function save() {
		$id = $this->uri->segment(4);
		$response = [];
		if ($this->validation()) {
			$fill_data = $this->fill_data();
			if ($id && $id > 0 && ctype_digit((string) $id)) {
				$fill_data['updated_at'] = date('Y-m-d H:i:s');
				$fill_data['updated_by'] = $this->session->userdata('id');
				unset($fill_data['post_author']);
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
	 * Save published date
	 * @return 	Object 
	 */
	public function save_published_date() {
		$id = (int) $this->input->post('id', true);
		$response = [];
		$fill_data = [
			'created_at' => $this->input->post('created_at', true)
		];
		if ($id && $id > 0 && ctype_digit((string) $id)) {
			$fill_data['updated_at'] = date('Y-m-d H:i:s');
				$fill_data['updated_by'] = $this->session->userdata('id');
			$response['action'] = 'update';		
			$response['type'] = $this->model->update($id, $this->table, $fill_data) ? 'success' : 'error';
			$response['message'] = $response['type'] == 'success' ? 'updated' : 'not_updated'; 
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
			'post_title' => $this->input->post('post_title', true),
			'post_content' => $this->input->post('post_content'),
			'post_author' => $this->session->userdata('id'),
			'post_type' => 'page',
			'post_status' => $this->input->post('post_status', true),
			'post_visibility' => $this->input->post('post_visibility', true),
			'post_comment_status' => $this->input->post('post_comment_status', true),
			'post_slug' => slugify($this->input->post('post_title', true))
		];
	}

	/**
	 * Validations Form
	 */
	private function validation() {
		$this->load->library('form_validation');
		$val = $this->form_validation;
		$val->set_rules('post_title', 'Judul', 'trim|required');
		$val->set_rules('post_content', 'Konten', 'trim|required');
		$val->set_rules('post_status', 'Status', 'trim|required|in_list[publish,draft]');
		$val->set_rules('post_visibility', 'Visibilitas', 'trim|required|in_list[public,private]');
		$val->set_rules('post_comment_status', 'Komentar', 'trim|required|in_list[open,close]');
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