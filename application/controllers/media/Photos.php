<?php defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Aplikasi Website Sekolah | CMS (Content Management System) dan PPDB/PMB Online PREMIUM 
 * untuk sekolah SD/Sederajat, SMP/Sederajat, SMA/Sederajat, dan Perguruan Tinggi
 * @version    4.2.3
 * @author     LapakPHP | https://lapakphp.com/ | lapakphp@gmail.com
 * @copyright  (c) 2013-2019
 * @since      Version 4.2.3
 */

class Photos extends Admin_Controller {

	/**
	 * Class constructor
	 * @return	Void
	 */
	public function __construct() {
		parent::__construct();
		$this->load->model('m_photos');
		$this->pk = M_photos::$pk;
		$this->table = M_photos::$table;
	}

	/**
	 * Index
	 * @return	Void
	 */
	public function index() {
		$this->vars['title'] = 'PHOTO';
		$this->vars['media'] = $this->vars['albums'] = true;
		$this->vars['content'] = 'albums/photos';
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
		$query = $this->m_photos->get_where($keyword, $limit, $offset);
		$total_rows = $this->m_photos->total_rows($keyword);
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
	 * Deleted Permanently
	 */
	public function delete() {
		$response = [];
		$ids = explode(',', $this->input->post($this->pk));
		$success = 0;
		foreach($ids as $id) {
			$query = $this->model->RowObject($this->table, $this->pk, $id);
			if($this->m_photos->delete_permanently($id)) {
				@chmod(FCPATH.'media/albums/large/'.$query->photo_name, 0777);
				@chmod(FCPATH.'media/albums/medium/'.$query->photo_name, 0777);
				@chmod(FCPATH.'media/albums/thumbnail/'.$query->photo_name, 0777);
				@unlink(FCPATH.'media/albums/large/'.$query->photo_name);
				@unlink(FCPATH.'media/albums/medium/'.$query->photo_name);
				@unlink(FCPATH.'media/albums/thumbnail/'.$query->photo_name);
				$success++;
			}
		}
		$response = [
        	'action' => 'delete_permanently',
			'type' => 'info',
			'message' => $success.' record deleted successfully.'
		];

		$this->output
			->set_content_type('application/json', 'utf-8')
			->set_output(json_encode($response, JSON_PRETTY_PRINT))
			->_display();
		exit;
	}
}