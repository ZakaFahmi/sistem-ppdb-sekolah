<?php defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Aplikasi Website Sekolah | CMS (Content Management System) dan PPDB/PMB Online PREMIUM 
 * untuk sekolah SD/Sederajat, SMP/Sederajat, SMA/Sederajat, dan Perguruan Tinggi
 * @version    4.2.3
 * @author     LapakPHP | https://lapakphp.com/ | lapakphp@gmail.com
 * @copyright  (c) 2013-2019
 * @since      Version 4.2.3
 */

class Headmaster extends Admin_Controller {

	/**
	 * Class constructor
	 * @return	Void
	 */
	public function __construct() {
		parent::__construct();
		$this->load->model('m_headmaster');
		$this->pk = M_headmaster::$pk;
		$this->table = M_headmaster::$table;
	}

	/**
	 * Index
	 * @return	Void
	 */
	public function index() {
		$this->vars['title'] = 'Headmaster';
		$this->vars['blog'] = $this->vars['headmaster'] = true;
		$this->vars['content'] = 'headmaster/read';
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
		$query = $this->m_headmaster->get_where($keyword, $limit, $offset);
		$sql = $this->db->last_query();
		$total_rows = $this->m_headmaster->total_rows($keyword);
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

		$response['sql'] = $sql;
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
		$id = (int) $this->input->post('id', true);
		$response = [];
		if ($this->validation()) {
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
	 * Fill Data
	 * @return Array
	 */
	private function fill_data() {
		return [
			'caption' => $this->input->post('caption', true),
			'deskripsi' => $this->input->post('deskripsi', true),
			'email' => $this->input->post('email', true),
			'facebook' => $this->input->post('facebook', true),
			'instagram' => $this->input->post('instagram', true),
			'twitter' => $this->input->post('twitter', true)
		];
	}

	/**
	 * Validations Form
	 * @return Boolean
	 */
	private function validation() {
		$this->load->library('form_validation');
		$val = $this->form_validation;
		$val->set_rules('caption', 'Description', 'trim');
		$val->set_rules('deskripsi', 'Deskripsi', 'trim');
		$val->set_rules('email', 'EMail', 'trim');
		$val->set_rules('facebook', 'Facebook', 'trim');
		$val->set_rules('instagram', 'Instagram', 'trim');
		$val->set_rules('twitter', 'Twitter', 'trim');
		$val->set_error_delimiters('<div>&sdot; ', '</div>');
		return $val->run();
	}

	/**
	 * Upload
	 * @return Void
	 */
	public function upload() {
		$id = (int) $this->input->post('id', true);
		$response = [];
		if ($id && $id > 0 && ctype_digit((string) $id)) {
			$query = $this->model->RowObject($this->table, $this->pk, $id);
			$file_name = $query->image;
			$config = [];
			$config['upload_path'] = './media_library/headmaster/';
			$config['allowed_types'] = 'jpg|png|jpeg';
			$config['max_size'] = 0;
			$config['encrypt_name'] = TRUE;
			$this->load->library('upload', $config);
			if ( ! $this->upload->do_upload('file')) {
				$response['action'] = 'validation_errors';
				$response['type'] = 'error';
				$response['message'] = $this->upload->display_errors();
			} else {
				$file = $this->upload->data();
				$update = $this->model->update($id, $this->table, ['image' => $file['file_name']]);
				if ($update) {
					// chmood new file
					@chmod(FCPATH.'media_library/headmaster/'.$file['file_name'], 0777);
					// chmood old file
					@chmod(FCPATH.'media_library/headmaster/'.$file_name, 0777);
					// unlink old file
					@unlink(FCPATH.'media_library/headmaster/'.$file_name);
					// resize new image
					$this->image_resize(FCPATH.'media_library/headmaster', $file['file_name']);
				}
				$response['action'] = 'upload';
				$response['type'] = 'success';
				$response['message'] = 'uploaded';
			}
		} else {
			$response['action'] = 'error';
			$response['type'] = 'error';
			$response['message'] = 'Not initialize ID or ID is not numeric !';
		}

		$this->output
			->set_content_type('application/json', 'utf-8')
			->set_output(json_encode($response, JSON_PRETTY_PRINT))
			->_display();
		exit;
	}

	/**
	  * Resize Images
	  */
	 private function image_resize($source, $file_name) {
		$this->load->library('image_lib');
		$config['image_library'] = 'gd2';
		$config['source_image'] = $source .'/'.$file_name;
		$config['maintain_ratio'] = false;
		$config['width'] = intval($this->session->userdata('image_headmaster_width'));
		$config['height'] = intval($this->session->userdata('image_headmaster_height'));
		$this->image_lib->initialize($config);
		$this->image_lib->resize();
	}
}