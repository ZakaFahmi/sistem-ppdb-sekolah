<?php defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Aplikasi Website Sekolah | CMS (Content Management System) dan PPDB/PMB Online PREMIUM 
 * untuk sekolah SD/Sederajat, SMP/Sederajat, SMA/Sederajat, dan Perguruan Tinggi
 * @version    4.2.3
 * @author     LapakPHP | https://lapakphp.com/ | lapakphp@gmail.com
 * @copyright  (c) 2013-2019
 * @since      Version 4.2.3
 */

class Download extends Public_Controller {

	/**
	 * Total Rows
	 */
	public $total_rows = 0;

	/**
	 * Total Page
	 */
	public $total_pages = 0;

	/**
	 * Class constructor
	 * @return	Void
	 */
	public function __construct() {
		parent::__construct();
		$this->load->model('m_files');
		$this->total_rows = $this->m_files->more_files($this->uri->segment(2), 0)->num_rows();
		$this->total_pages = ceil($this->total_rows / 20);
	}

	/**
	 * Index
	 * @return	Void
	 */
	public function index() {
		$slug = $this->uri->segment(2);
		if (alpha_dash($slug)) {
			$this->vars['page_title'] = strtoupper(str_replace('-', ' ', $slug));
			$this->vars['total_pages'] = $this->total_pages;
			$this->vars['query'] = $this->m_files->more_files($slug, -1);
			$this->vars['content'] = 'themes/'.theme_folder().'/loop-files';
			$this->load->view('themes/'.theme_folder().'/index', $this->vars);
		} else {
			show_404();
		}
	}

	/**
	 * More Files
	 */
	public function more_files() {
		$slug = $this->input->post('slug', true);
		$page_number = intval($this->input->post('page_number', true));
		$offset = ($page_number - 1) * 20;
		$response = [];
		if (alpha_dash($slug)) {
			$query = $this->m_files->more_files($slug, $offset);
			$rows = [];
			foreach($query->result() as $row) {
				$rows[] = $row;
			}
			$response['rows'] = $rows;
		}

		$this->output
			->set_content_type('application/json', 'utf-8')
			->set_output(json_encode($response, JSON_PRETTY_PRINT))
			->_display();
		exit;
	}

	/**
	 * force_download
	 */
	public function force_download() {
		$id = (int) $this->uri->segment(4);
		if ($id && $id > 0 && ctype_digit((string) $id)) {
			$this->load->helper(array('download', 'text'));
         $query = $this->model->RowObject('files', 'id', $id);
         $data = file_get_contents("./media_library/files/" . $query->file_name);
         $name = url_title(strtolower($query->file_title), '-'). $query->file_ext;
         $this->db->query("UPDATE files SET file_counter = file_counter + 1 WHERE id = ?", [$id]);
         force_download($name, $data);
		} else {
			show_404();	
		}
	}
}