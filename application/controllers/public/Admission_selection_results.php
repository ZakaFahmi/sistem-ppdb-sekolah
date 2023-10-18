<?php defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Aplikasi Website Sekolah | CMS (Content Management System) dan PPDB/PMB Online PREMIUM 
 * untuk sekolah SD/Sederajat, SMP/Sederajat, SMA/Sederajat, dan Perguruan Tinggi
 * @version    4.2.3
 * @author     LapakPHP | https://lapakphp.com/ | lapakphp@gmail.com
 * @copyright  (c) 2013-2019
 * @since      Version 4.2.3
 */

class Admission_selection_results extends Public_Controller {

	/**
	 * Constructor
	 * @access  public
	 */
	public function __construct() {
		parent::__construct();
		$this->load->model(['m_registrants', 'm_settings']);
	}

	/**
	 * Index
	 * @access  public
	 */
	public function index() {
		// if isset
		if (null !== $this->session->userdata('announcement_start_date') && null !== $this->session->userdata('announcement_end_date')) {
			// If not in array, redirect
			$date_range = array_date($this->session->userdata('announcement_start_date'), $this->session->userdata('announcement_end_date'));
			if (!in_array(date('Y-m-d'), $date_range)) {
				redirect(base_url());
			}
		}
		$recaptcha = $this->m_settings->get_recaptcha();
		$this->vars['recaptcha_site_key'] = $recaptcha['recaptcha_site_key'];
		$this->vars['page_title'] = 'Hasil Seleksi Penerimaan '. (get_school_level() == 5 ? 'Mahasiswa' : 'Peserta Didik').' Baru Tahun '.$this->session->userdata('admission_year');
		$this->vars['action'] = 'admission_selection_results/selection_results';
		$this->vars['button'] = '<i class="fa fa-search"></i> LIHAT HASIL SELEKSI';
		$this->vars['onclick'] = 'selection_results()';
		$this->vars['content'] = 'themes/'.theme_folder().'/admission-search-form';
		$this->load->view('themes/'.theme_folder().'/index', $this->vars);
	}

	/**
    * Selection Results
    * @return JSON
    */
   public function selection_results() {
   	$this->load->library('recaptcha');
		$response = [];
		$recaptcha = $this->input->post('recaptcha');
		$recaptcha_verified = $this->recaptcha->verifyResponse($recaptcha);
		if ($recaptcha_verified['success']) {
			$birth_date = $this->input->post('birth_date', true);	
			$registration_number = $this->input->post('registration_number', true);
			if (is_valid_date($birth_date) && strlen($registration_number) == 10 && ctype_digit((string) $registration_number)) {
				$query = $this->m_registrants->selection_result($registration_number, $birth_date);
				$response['type'] = $query['type'];
				$response['message'] = $query['message'];
			} else {
				$response['type'] = 'error';
				$response['message'] = 'Format data yang anda masukan tidak benar.';
			}
		} else {
			$response['type'] = 'recaptcha_error';
    		$response['message'] = 'Recaptcha Error!';
		}

		$this->output
			->set_content_type('application/json', 'utf-8')
			->set_output(json_encode($response, JSON_PRETTY_PRINT))
			->_display();
		exit;
   }
}