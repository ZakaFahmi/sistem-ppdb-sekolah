<?php defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Aplikasi Website Sekolah | CMS (Content Management System) dan PPDB/PMB Online PREMIUM 
 * untuk sekolah SD/Sederajat, SMP/Sederajat, SMA/Sederajat, dan Perguruan Tinggi
 * @version    4.2.3
 * @author     LapakPHP | https://lapakphp.com/ | lapakphp@gmail.com
 * @copyright  (c) 2013-2019
 * @since      Version 4.2.3
 */

class Reset_password extends Public_Controller {

	/**
	 * Class constructor
	 * @return	Void
	 */
	public function __construct() {
		parent::__construct();
		$this->load->model('m_users');
	}

	/**
	 * Index
	 * @return	Void
	 */
	public function index() {
		$forgot_password_key = $this->uri->segment(2);
		if ($forgot_password_key) {
			$this->vars['page_title'] = 'Reset Password';
			$this->vars['content'] = 'users/reset_password';
			$this->load->view('users/index', $this->vars);
		} else {
			show_404();
		}
	}

	/**
	 * Process
	 */
	public function process() {
		$response = [];
		if ($this->validation()) {
			$fill_data = $this->fill_data();
			$is_exist = $this->model->isValExist('forgot_password_key', $fill_data['get_forgot_password_key'], 'users');
			if ($is_exist) {
				$query = $this->model->RowObject('users', 'forgot_password_key', $fill_data['get_forgot_password_key']);
				if ($query->is_active == 'true') { // Akun masih aktif
					$request_date = new DateTime($query->forgot_password_request_date);
					$today = new DateTime(date('Y-m-d H:i:s'));
					$diff = $today->diff($request_date);
					$hours = $diff->h;
					$hours = $hours + ($diff->days * 24);
					if ($hours > 48) { // lebih dari 2 x 24 jam maka cancel reset passwordnya
						$this->m_users->remove_forgot_password_key($query->id);
						$response['type'] = 'error';
						$response['message'] = 'expired';
					} else {
						unset($fill_data['get_forgot_password_key']);
						if ($this->m_users->reset_password($query->id, $fill_data)) { // reset password
							$response['type'] = 'success';
							$response['message'] = 'has_updated';
						} else { // gagal query
							$response['type'] = 'error';
							$response['message'] = 'cannot_updated';	
						}
					}
				} else { // Akun sudah di non aktifkan oleh admin
					$response['type'] = 'warning';
					$response['message'] = 'not_active';
				}
			} else { // forgot_password_key tidak ditemukan
				$response['message'] = '404';
			}
		} else { // validasi error
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
			'user_password' => password_hash($this->input->post('password', true), PASSWORD_BCRYPT),
			'get_forgot_password_key' => $this->input->post('forgot_password_key', true),
			'forgot_password_key' => NULL,
			'forgot_password_request_date' => NULL
		];
	}

	/**
	 * Validations Form
	 * @access  public
	 * @return Bool
	 */
	private function validation() {
		$this->load->library('form_validation');
		$val = $this->form_validation;
		$val->set_rules('password', 'Kata Sandi', 'trim|required|min_length[6]');
		$val->set_rules('c_password', 'Kata Sandi', 'trim|matches[password]');
		$val->set_message('min_length', '{field} harus diisi minimal 6 karakter');
		$val->set_message('required', '{field} harus diisi');
		$val->set_message('matches', '{field} kata sandi harus sama');
		$val->set_error_delimiters('<div>&sdot; ', '</div>');
		return $val->run();
	}
}