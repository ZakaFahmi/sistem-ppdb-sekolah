<?php defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Aplikasi Website Sekolah | CMS (Content Management System) dan PPDB/PMB Online PREMIUM 
 * untuk sekolah SD/Sederajat, SMP/Sederajat, SMA/Sederajat, dan Perguruan Tinggi
 * @version    4.2.3
 * @author     LapakPHP | https://lapakphp.com/ | lapakphp@gmail.com
 * @copyright  (c) 2013-2019
 * @since      Version 4.2.3
 */

class Nilaicbt extends Admin_Controller {

	/**
	 * Class constructor
	 * @return	Void
	 */
	public function __construct() {
		parent::__construct();
		$this->load->model('m_nilaicbt');
		$this->pk = M_nilaicbt::$pk;
		$this->table = M_nilaicbt::$table;
	}

	/**
	 * Index
	 * @return	Void
	 */
	public function index() {
		$this->vars['title'] = 'Nilai USBK';
		$this->vars['nilaicbt'] = true;
		$this->vars['content'] = 'nilaicbt/read';
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
		$query = $this->m_nilaicbt->get_where($keyword, $limit, $offset);
		$total_rows = $this->m_nilaicbt->total_rows($keyword);
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
		$id = (int) $this->input->post('id', true);
		$response = [];
		if ($this->validation()) {
			$fill_data = $this->fill_data();
			if ($id && $id > 0 && ctype_digit((string) $id)) {
				$query = $this->model->RowObject($this->table, $this->pk, $id);
				if ($query->XNomerUjian == $this->session->userdata('profile_id')) {
					$fill_data['updated_at'] = date('Y-m-d H:i:s');
				$fill_data['updated_by'] = $this->session->userdata('id');
					$response['action'] = 'update';		
					$response['type'] = $this->model->update($id, $this->table, $fill_data) ? 'success' : 'error';
					$response['message'] = $response['type'] == 'success' ? 'updated' : 'not_updated'; 
				} else {
					$response['type'] = 'error';
					$response['message'] = 'forbidden';
				}
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
			'XNomerUjian' => $this->session->userdata('profile_id'),
			'XTgl' => $this->input->post('XTgl', true),
			'type' => $this->input->post('type', true),
			'level' => $this->input->post('level', true),
			'year' => $this->input->post('year', true),
			'XTokenUjian' => $this->input->post('XTokenUjian', true),
			'organizer' => $this->input->post('organizer', true),
			'XKodeMapel' => $this->input->post('XKodeMapel', true),
			'XJumSoal' => $this->input->post('XJumSoal', true),
			'XKodeUjian' => $this->input->post('XKodeUjian', true),
			'XNamaKelas' => $this->input->post('XNamaKelas', true),
			'XSemester' => $this->input->post('XSemester', true),
			'XSetId' => $this->input->post('XSetId', true),
			'XTotalNilai' => $this->input->post('XTotalNilai', true)
		];
	}

	/**
	 * Validations Form
	 * @return Boolean
	 */
	private function validation() {
		$this->load->library('form_validation');
		$val = $this->form_validation;
		$val->set_rules('XTgl', 'Nama Prestasi', 'trim|required');
		$val->set_rules('type', 'Jenis Prestasi', 'trim|required|numeric');
		$val->set_rules('level', 'Tingkat Prestasi', 'trim|required|numeric');
		$val->set_rules('year', 'Tahun', 'trim|required|numeric|min_length[4]|max_length[4]');
		$val->set_rules('XTokenUjian', 'Penyelenggara', 'trim');
		$val->set_rules('organizer', 'Penyelenggara', 'trim');
		$val->set_rules('XKodeMapel', 'Penyelenggara', 'trim');
		$val->set_rules('XJumSoal', 'Penyelenggara', 'trim');
		$val->set_rules('XKodeUjian', 'Penyelenggara', 'trim');
		$val->set_rules('XTotalNilai', 'Penyelenggara', 'trim');
		$val->set_rules('XNamaKelas', 'Penyelenggara', 'trim');
		$val->set_rules('XSemester', 'Penyelenggara', 'trim');
		$val->set_rules('XSetId', 'Penyelenggara', 'trim');
		$val->set_error_delimiters('<div>&sdot; ', '</div>');
		return $val->run();
	}
}