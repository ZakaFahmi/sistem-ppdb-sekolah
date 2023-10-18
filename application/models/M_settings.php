<?php defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Aplikasi Website Sekolah | CMS (Content Management System) dan PPDB/PMB Online PREMIUM 
 * untuk sekolah SD/Sederajat, SMP/Sederajat, SMA/Sederajat, dan Perguruan Tinggi
 * @version    4.2.3
 * @author     LapakPHP | https://lapakphp.com/ | lapakphp@gmail.com
 * @copyright  (c) 2013-2019
 * @since      Version 4.2.3
 */

class M_settings extends CI_Model {

	/**
	 * Primary key
	 * @var String
	 */
	public static $pk = 'id';

	/**
	 * Table
	 * @var String
	 */
	public static $table = 'settings';

	/**
	 * Class constructor
	 * @return	Void
	 */
	public function __construct() {
		parent::__construct();
	}

	/**
	 * Get data for pagination
	 * @param String
	 * @param Int
	 * @param Int
	 * @return Query
	 */
	public function get_where($keyword, $limit = 0, $offset = 0, $group = 'general') {
		$this->db->select('id, variable, COALESCE(`value`, `default`) AS value, description, is_deleted');
		$this->db->where('group', $group);
		if (!empty($keyword)) {
			$this->db->group_start();
			$this->db->like('description', $keyword);
			$this->db->or_like('value', $keyword);
			$this->db->group_end();
		}
		if ($limit > 0) {
			$this->db->limit($limit, $offset);
		}
		return $this->db->get(self::$table);
	}

	/**
	 * Get Total row for pagination
	 * @param String
	 * @return Int
	 */
	public function total_rows($keyword, $group) {
		$this->db->where('group', $group);
		if (!empty($keyword)) {
			$this->db->group_start();
			$this->db->like('description', $keyword);
			$this->db->or_like('value', $keyword);
			$this->db->group_end();
		}
		return $this->db->count_all_results(self::$table);
	}

	/**
	 * Get Setting Values
	 * @param array
	 * @return array
	 */
	public function get_setting_values($group_access = 'public') {
		$query = $this->db
			->select('variable, COALESCE(`value`, `default`) AS `value`')
			->like('group_access', $group_access)
			->get(self::$table);
		$settings = [];
		foreach($query->result() as $row) {
			$settings[$row->variable] = $row->value;
		}
		return $settings;
	}

	/**
	 * mail_server_settings
	 * @return array
	 */
	function mail_server_settings() {
		$query = $this->db
			->select("variable, COALESCE(value, default, '') setting_value")
			->where('group', 'mail_server')
			->get('settings');
		$data = [];
		foreach($query->result() as $row) {
			$data[$row->variable] = $row->setting_value;
		}
		return $data;
	}

	/**
	 * Recaptcha
	 * @return array
	 */
	function get_recaptcha() {
		$query = $this->db
			->select("variable, value")
			->where_in('variable', ['recaptcha_site_key', 'recaptcha_secret_key'])
			->get('settings');
		$data = [];
		$data['recaptcha_site_key'] = NULL;
		$data['recaptcha_secret_key'] = NULL;
		foreach($query->result() as $row) {
			if ($row->variable == 'recaptcha_site_key') {
				$data['recaptcha_site_key'] = $row->value;
			}
			if ($row->variable == 'recaptcha_secret_key') {
				$data['recaptcha_secret_key'] = $row->value;
			}
		}
		return $data;
	}

	/**
	 * Get Sendgrid API Key
	 * @return array
	 */
	public function get_sendgrid_api_key() {
		$query = $this->db
			->select("variable, value")
			->where('variable', 'sendgrid_api_key')
			->get('settings');
		if ($query->num_rows() === 1) {
			$res = $query->row();
			return $res->value ? $res->value : $res->default_value;
		}
		return NULL;
	}
}