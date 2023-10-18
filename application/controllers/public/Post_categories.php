<?php defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Aplikasi Website Sekolah | CMS (Content Management System) dan PPDB/PMB Online PREMIUM 
 * untuk sekolah SD/Sederajat, SMP/Sederajat, SMA/Sederajat, dan Perguruan Tinggi
 * @version    4.2.3
 * @author     LapakPHP | https://lapakphp.com/ | lapakphp@gmail.com
 * @copyright  (c) 2013-2019
 * @since      Version 4.2.3
 */

class Post_categories extends Public_Controller {

	/**
	 * Class constructor
	 * @return	Void
	 */
	public function __construct() {
		parent::__construct();
		$this->load->model('m_posts');
	}

	/**
	 * Index
	 * @return	Void
	 */
	public function index() {
		$slug = $this->uri->segment(2);
		if (alpha_dash($slug)) {
			$query = $this->model->RowObject('post_categories', 'slug', $slug);
			$this->vars['title'] = strtoupper(str_replace('-', ' ', $slug));
			$total_rows = $this->m_posts->more_posts($slug, 0)->num_rows();
			$this->vars['total_rows'] = $total_rows;
			$this->vars['total_page'] = ceil($total_rows / 6);
			$this->vars['query'] = $this->m_posts->more_posts($slug, -1);
			$this->vars['content'] = 'themes/'.theme_folder().'/loop-posts';
			$this->load->view('themes/'.theme_folder().'/index', $this->vars);
		} else {
			show_404();
		}
	}

	/**
	 * More Posts
	 */
	public function more_posts() {
		$slug = $this->input->post('slug', true);
		$page_number = intval($this->input->post('page_number', true));
		$offset = ($page_number - 1) * 6;
		$response = [];
		if (alpha_dash($slug)) {
			$query = $this->m_posts->more_posts($slug, $offset);
			$total_rows = $this->m_posts->more_posts($slug, 0)->num_rows();
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
}