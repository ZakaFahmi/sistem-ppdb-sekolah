<?php defined('BASEPATH') or exit('No direct script access allowed');

/**
 * Aplikasi Website Sekolah | CMS (Content Management System) dan PPDB/PMB Online PREMIUM 
 * untuk sekolah SD/Sederajat, SMP/Sederajat, SMA/Sederajat, dan Perguruan Tinggi
 * @version    4.2.3
 * @author     LapakPHP | https://lapakphp.com/ | lapakphp@gmail.com
 * @copyright  (c) 2013-2019
 * @since      Version 4.2.3
 */


/**
 * copyright
 * @return string
 */
if (!function_exists('copyright')) {
	function copyright($year = '', $link = '', $company = '') {
		if ($year != '') {
			if (strlen($year) != 4 || !is_numeric($year)) {
				return;
			}
		}
		$start = $year == '' ? date('Y') : $year;
		define('CREATED', $start);
		$string = 'Copyright &copy; ';
		$string .= date('Y') > CREATED ? CREATED . ' - ' . date('Y') : CREATED;
		$string .= '<a href="';
		$string .= $link == '' ? base_url() : $link;
		$string .= '"> ';
		$string .= $company == '' ? str_replace(array('http://', 'https://'), '', rtrim(base_url(), '/')) : $company;
		$string .= '</a>';
		$string .= ' All rights reserved.';
		return $string;
	}
}

/**
 * filesize_formatted
 * @return string
 */
if (!function_exists('filesize_formatted')) {
	function filesize_formatted($size) {
		$units = ['B', 'KB', 'MB', 'GB', 'TB', 'PB', 'EB', 'ZB', 'YB'];
		$power = $size > 0 ? floor(log($size, 1024)) : 0;
		return number_format($size / pow(1024, $power), 2, '.', ',') . ' ' . $units[$power];
	}
}

/**
 * create_dir
 * @return string
 */
if (!function_exists('create_dir')) {
	function create_dir($dir) {
		if (!is_dir($dir)) {
			if (!mkdir($dir, 0777, true)) {
				die('Not create directory : ' . $dir);
			}
		}
	}
}

/**
 * extract_themes
 * @return string
 */
if (! function_exists('extract_themes')) {
	function extract_themes() {
		$zip = new ZipArchive;
		$zip->open('./views/themes/default.zip');
		@chmod(FCPATH . 'views/themes', 0775);
		$zip->extractTo('./views/themes/');
		@chmod(FCPATH . 'views/themes/default/', 0775);
		$zip->close();
	}
}

/**
 * datasource
 * @return string
 */
if (! function_exists('datasource')) {
	function datasource($group = '') {
		$CI = &get_instance();
		$query = $CI->db
			->select('id, option')
			->where('group', $group)
			->order_by('option', 'ASC')
			->get('options');
		$data = [];
		foreach($query->result() as $row) {
			$data[$row->id] = $row->option;
		}
		return json_encode($data);
	}
}

/**
 * School Level
 * @return string
 */
if (! function_exists('get_school_level')) {
	function get_school_level() {
		$CI = &get_instance();
		return (int) $CI->session->userdata('school_level');
	}
}

// '1': 'Elementary School (SD / Sederajat)', // SD
// '2': 'Junior High school (SMP / Sederajat)', // SMP
// '3': 'Senior High School (SMA / Sederajat)', // SMA
// '4': 'Vocational High School (SMK)', // SMK
// '5': 'University (Universitas)'

/**
 * Have Majors
 * @return Array
 */
if (! function_exists('have_majors')) {
	function have_majors() {
		return [3, 4, 5];
	}
}

/**
 * encode_str
 * @return string
 */
if (!function_exists('encode_str')) {
	function encode_str($str) {
		$CI = &get_instance();
		$CI->load->library('encrypt');
		$ret = $CI->encrypt->encode($str, $CI->config->item('encryption_key'));
		$ret = strtr($ret, array('+' => '.', '=' => '-', '/' => '~'));
		return $ret;
	}
}

/**
 * decode_str
 * @return string
 */
if (!function_exists('decode_str')) {
	function decode_str($str) {
		$CI = &get_instance();
		$CI->load->library('encrypt');
		$str = strtr($str, array('.' => '+', '-' => '=', '~' => '/'));
		return $CI->encrypt->decode($str, $CI->config->item('encryption_key'));
	}
}

/**
 * indo_date
 * @return string
 */
if (!function_exists('indo_date')) {
	function indo_date($date) {
		if (is_valid_date($date)) {
			$parts = explode("-", $date);
			$result = $parts[2] . ' ' . bulan($parts[1]) . ' ' . $parts[0];
			return $result;
		}
		return '';
	}
}

/**
 * english_date
 * @return string
 */
if (!function_exists('english_date')) {
	function english_date($date) {
		if (is_valid_date($date)) {
			$parts = explode("-", $date);
			$result = $parts[2] . ', ' . month($parts[1]) . ' ' . $parts[0];
			return $result;
		}
		return '';
	}
}

/**
 * Day Name
 * @return string
 */
if (! function_exists('day_name')) {
	function day_name($idx) {
		$arr = ['', 'Senin', 'Selasa', 'Rabu', 'Kamis', 'Jum\'at', 'Sabtu', 'Minggu'];
		return $arr[$idx];
	}
}

/**
 * is_valid_date
 * @return string
 */
if (!function_exists('is_valid_date')) {
	function is_valid_date($date) {
		if (preg_match("/^([0-9]{4})-([0-9]{2})-([0-9]{2})$/", $date, $parts)) {
			return checkdate($parts[2], $parts[3], $parts[1]) ? true : false;
		}
		return false;
	}
}

/**
 * bulan
 * @return string
 */
if (!function_exists('bulan')) {
	function bulan($key = '') {
		$data = [
			'01' => 'Jan',
			'02' => 'Feb',
			'03' => 'Mar',
			'04' => 'Apr',
			'05' => 'Mei',
			'06' => 'Jun',
			'07' => 'Jul',
			'08' => 'Agu',
			'09' => 'Sep',
			'10' => 'Okt',
			'11' => 'Nop',
			'12' => 'Des',
		];
		return $key === '' ? $data : $data[$key];
	}
}

/**
 * month
 * @return string
 */
if (!function_exists('month')) {
	function month($key = '') {
		$data = [
			'01' => 'January',
			'02' => 'February',
			'03' => 'March',
			'04' => 'April',
			'05' => 'May',
			'06' => 'June',
			'07' => 'July',
			'08' => 'August',
			'09' => 'September',
			'10' => 'October',
			'11' => 'November',
			'12' => 'December',
		];
		return $key === '' ? $data : $data[$key];
	}
}

/**
 * get_ip_address
 * @return string
 */
if (! function_exists('get_ip_address')) {
	function get_ip_address() {
		return getenv('HTTP_X_FORWARDED_FOR') ? getenv('HTTP_X_FORWARDED_FOR') : getenv('REMOTE_ADDR');
	}
}

/**
 * check_internet_connection
 * @return bool
 */
if (! function_exists('check_internet_connection')) {
	function check_internet_connection() {
		return checkdnsrr('google.com');
	}
}

/**
 * array_date
 * @return array
 */
if ( ! function_exists('array_date')) {
   function array_date($start, $end) {
      $range = [];
      if (is_valid_date($start))
         $start = strtotime($start);
      if (is_valid_date($end) )
         $end = strtotime($end);
      if ($start > $end)
         return array_date($end, $start);
      do {
         $range[] = date('Y-m-d', $start);
         $start = strtotime("+ 1 day", $start);
      }
      while($start <= $end);
      return $range;
   }
}

/**
 * delete_cache
 * @return void
 */
if (! function_exists('delete_cache')) {
	function delete_cache() {
		$CI = &get_instance();
		$CI->load->helper('directory');
		$path = APPPATH . 'cache';
		$files = directory_map($path, FALSE, TRUE);
		foreach ($files as $file) {
			if ($file !== 'index.html' && $file !== '.htaccess') {
				@chmod($path . '/' . $file, 0777);
				@unlink($path . '/' . $file);
			}
		}
	}
}

/**
 * Alpha Dash
 * Check if a-z or 0-9 or _-
 * @param String
 * @return Bool
 */
if (! function_exists('alpha_dash')) {
	function alpha_dash($str) {
		return (bool) preg_match('/^[a-z0-9_-]+$/i', $str);
	}
}

/**
 * Create Slug
 * @param String
 * @param String
 * @return String
 */
if (! function_exists('slugify')) {
	function slugify($string, $separator = '-') {
		if (function_exists('iconv')) {
	        $string = @iconv('UTF-8', 'ASCII//TRANSLIT', $string);
	    }
	    $string = preg_replace("/[^a-zA-Z0-9 -]/", "", $string);
	    $string = strtolower($string);
	    $string = str_replace(" ", $separator, $string);
	    return $string;
	}
}

/**
 * Call Student Name
 * @param Int
 * @return String
 */
if (! function_exists('call_student_name')) {
	function call_student_name( $school_level ) {
		return (int) $school_level >= 5 ? 'Mahasiswa' : 'Peserta Didik';
	}
}

/**
 * Call Academic Year
 * @param Int
 * @return String
 */
if (! function_exists('call_academic_year')) {
	function call_academic_year( $school_level ) {
		return (int) $school_level >= 5 ? 'Tahun Akademik' : 'Tahun Pelajaran';
	}
}

/**
 * Call Academic Year
 * @param Int
 * @return String
 */
if (! function_exists('call_employee_name')) {
	function call_employee_name( $school_level ) {
		return (int) $school_level >= 5 ? 'Staf dan Dosen' : 'GTK';
	}
}

/**
 * Call Head Master
 * @param Int
 * @return String
 */
if (! function_exists('call_headmaster')) {
	function call_headmaster( $school_level ) {
		$str = '';
		switch ($school_level) {
			case 5:
				$str = 'Rektor';
				break;
			case 6:
				$str = 'Ketua';
				break;
			case 7:
				$str = 'Direktur';
				break;
			default:
				$str = 'Kepala Sekolah';
				break;
		}
		return $str;
	}
}
