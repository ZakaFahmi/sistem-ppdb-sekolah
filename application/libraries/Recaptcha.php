<?php defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Aplikasi Website Sekolah | CMS (Content Management System) dan PPDB/PMB Online PREMIUM 
 * untuk sekolah SD/Sederajat, SMP/Sederajat, SMA/Sederajat, dan Perguruan Tinggi
 * @version    4.2.3
 * @author     LapakPHP | https://lapakphp.com/ | lapakphp@gmail.com
 * @copyright  (c) 2013-2019
 * @since      Version 4.2.3
 */

class Recaptcha {

    /**
     * The CodeIgniter super object
     *
     * @var Object
     * @access public
     */
    public $CI;

    /**
     * @var signupURL
     * @access private
     */
    private $signupURL = "https://www.google.com/recaptcha/admin";

    /**
     * @var siteVerifyURL
     * @access private
     */
    private $siteVerifyURL = "https://www.google.com/recaptcha/api/siteverify?";

    /**
     * @var secret_key
     * @access private
     */
    private $secret_key;

    /**
     * @var site_key
     * @access private
     */
    private $site_key;

    /**
     * @var _version
     * @access private
     */
    private $_version = "php_1.0";

    /**
     * Constructtor
     * @access public
     */
    public function __construct() {
        $this->CI = & get_instance();
        $this->CI->load->model('m_settings');
        $recaptcha = $this->CI->m_settings->get_recaptcha();
        $this->site_key = $recaptcha['recaptcha_site_key'];
        $this->secret_key = $recaptcha['recaptcha_secret_key'];
        if (!$this->site_key || !$this->secret_key) {
            die("Recaptcha site key dan secret key belum diatur. Silahkan masuk ke menu Pengaturan / Umum.");
        }
    }

    /**
     * Function to convert an array into query string
     * @param Array $data Array of params
     * @return String query string of parameters
     */
    private function _encodeQS($data) {
        $req = "";
        foreach ($data as $key => $value) {
            $req .= $key . '=' . urlencode(stripslashes($value)) . '&';
        }
        return substr($req, 0, strlen($req) - 1);
    }

    /**
     * Function for verifying user's input
     * @param String $response User's input
     * @param String $remoteIp Remote IP you wish to send to reCAPTCHA, if NULL $this->input->ip_address() will be called
     * @return Array Array of response
     */
    public function verifyResponse($response, $remoteIp = NULL) {
        if ($response == NULL || strlen($response) == 0) {
            $return = [
                'success' => FALSE,
                'error_codes' => 'missing-input'
            ];
        }
        $getResponse = $this->_submitHttpGet(
            $this->siteVerifyURL, [
                'secret' => $this->secret_key,
                'remoteip' => (!is_null($remoteIp)) ? $remoteIp : $this->CI->input->ip_address(),
                'v' => $this->_version,
                'response' => $response
            ]
        );
        $answers = json_decode($getResponse, TRUE);
        if (trim($answers ['success']) == TRUE) {
            $return = [
                'success' => TRUE,
                'error_codes' => ''
            ];
        } else {
            $return = [
                'success' => FALSE,
                'error_codes' => $answers['error-codes']
            ];
        }
        return $return;
    }

    /**
     * HTTP GET to communicate with reCAPTCHA server
     * @param String $path URL to GET
     * @param Array $data Array of params
     * @return String JSON response from reCAPTCHA server
     */
    private function _submitHTTPGet($path, $data) {
        $req = $this->_encodeQS($data);
        $response = file_get_contents($path . $req);
        return $response;
    }
}
