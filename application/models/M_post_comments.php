<?php defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Aplikasi Website Sekolah | CMS (Content Management System) dan PPDB/PMB Online PREMIUM 
 * untuk sekolah SD/Sederajat, SMP/Sederajat, SMA/Sederajat, dan Perguruan Tinggi
 * @version    4.2.3
 * @author     LapakPHP | https://lapakphp.com/ | lapakphp@gmail.com
 * @copyright  (c) 2013-2019
 * @since      Version 4.2.3
 */

class M_post_comments extends CI_Model {

	/**
	 * Primary key
	 *
	 * @var string
	 */
	public static $pk = 'id';

	/**
	 * Table
	 * @var String
	 */
	public static $table = 'comments';

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
	public function get_where($keyword = '', $limit = 0, $offset = 0) {
		$this->db->select('
			x1.id
			, x1.comment_author
			, x1.comment_email
			, x1.created_at
			, x1.comment_content
			, x1.comment_status
			, x2.post_title
			, x2.id AS post_id
			, x2.post_slug
			, x1.is_deleted'
		);
		$this->db->where('x1.comment_type', 'post');
		$this->db->join('posts x2', 'x1.comment_post_id = x2.id', 'LEFT');
		if (!empty($keyword)) {
			$this->db->group_start();
			$this->db->like('x1.comment_author', $keyword);
			$this->db->or_like('x1.comment_email', $keyword);
			$this->db->or_like('x1.created_at', $keyword);
			$this->db->or_like('x1.comment_content', $keyword);
			$this->db->group_end();
		}
		if ($limit > 0) {
			$this->db->limit($limit, $offset);
		}
		return $this->db->get(self::$table.' x1');
	}

	/**
	 * Get Total row for pagination
	 * @param String
	 * @return Int
	 */
	public function total_rows($keyword = '') {
		$this->db->where('comment_type', 'post');
		if (!empty($keyword)) {
			$this->db->group_start();
			$this->db->like('x1.comment_author', $keyword);
			$this->db->or_like('x1.comment_email', $keyword);
			$this->db->or_like('x1.created_at', $keyword);
			$this->db->or_like('x1.comment_content', $keyword);
			$this->db->group_end();
		}
		return $this->db->count_all_results(self::$table);
	}

	/**
	 * get_recent_comments
	 * @return Query
	 */
	public function get_recent_comments() {
		return $this->db
			->select('x2.id, x1.comment_author, x1.comment_url, x1.comment_content, x2.id AS post_id, x2.post_title, x2.post_slug')
			->join('posts x2', 'x1.comment_post_id = x2.id', 'LEFT')
			->where('x1.comment_type', 'post')
			->where('x1.is_deleted', 'false')
			->order_by('x1.created_at', 'DESC')
			->limit(5)
			->get(self::$table. ' x1');
	}

	/**
	 * get_recent_comments
	 * @param 	int
	 * @return 	Query
	 */
	public function get_post_comments($id) {
		return $this->db
			->select('x1.id, x1.comment_author, x1.comment_url, LEFT(x1.created_at, 10) AS created_at, x1.comment_content')
			->join('posts x2', 'x1.comment_post_id = x2.id', 'LEFT')
			->where('x1.comment_type', 'post')
			->where('x1.comment_status', 'approved')
			->where('x1.is_deleted', 'false')
			->where('x1.comment_post_id', $id)
			->order_by('x1.created_at', 'DESC')
			->limit($this->session->userdata('comment_per_page'))
			->get(self::$table. ' x1');
	}

	/**
	 * More Comments
	 * @param 	int
	 * @param 	int
	 * @return 	Query
	 */
	public function more_comments($comment_post_id, $offset = 0) {
		$this->db->select('x1.id, x1.comment_author, x1.comment_url, LEFT(x1.created_at, 10) AS created_at, x1.comment_content');
		$this->db->join('posts x2', 'x1.comment_post_id = x2.id', 'LEFT');
		$this->db->where('x1.comment_type', 'post');
		$this->db->where('x1.comment_status', 'approved');
		$this->db->where('x1.is_deleted', 'false');
		$this->db->where('x1.comment_post_id', $comment_post_id);
		$this->db->order_by('x1.created_at', 'DESC');
		if ($offset < 0) {
			$this->db->limit((int) $this->session->userdata('comment_per_page'));
		}
		if ($offset > 0) {
			$this->db->limit((int) $this->session->userdata('comment_per_page'), $offset);
		}
		return $this->db->get(self::$table.' x1');
	}
}