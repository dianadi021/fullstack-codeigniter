<?php
class Traits  extends CI_Controller
{
	protected $CI;
	public function __construct()
	{
		$this->CI = &get_instance();
		$this->CI->load->database();
	}

	public function view($content = '', $datas = [])
	{
		$datas['content'] = $content;
		$this->CI->load->view('root', $datas);
	}

	public function insert($table, $data)
	{
		try {
			if (!$this->CI->db->insert($table, $data)) {
				$error = $this->CI->db->error();
				throw new Exception("Insert error on [$table]: {$error['message']}");
			}

			return ['success' => true, 'id' => $this->CI->db->insert_id()];
		} catch (Exception $e) {
			log_message('error', $e->getMessage());
			throw new Exception($e->getMessage());
		}
	}

	public function selectWhere($table, $where = [])
	{
		try {
			$query = $this->CI->db->get_where($table, $where);
			if (!$query) {
				$error = $this->CI->db->error();
				throw new Exception("Select error on [$table]: {$error['message']}");
			}

			return ['success' => true, 'data' => $query->result()];
		} catch (Exception $e) {
			log_message('error', $e->getMessage());
			throw new Exception($e->getMessage());
		}
	}

	public function update($table, $data, $where)
	{
		try {
			if (!$this->CI->db->update($table, $data, $where)) {
				$error = $this->CI->db->error();
				throw new Exception("Update error on [$table]: {$error['message']}");
			}

			return ['success' => true];
		} catch (Exception $e) {
			log_message('error', $e->getMessage());
			throw new Exception($e->getMessage());
		}
	}

	public function delete($table, $where)
	{
		try {
			if (!$this->CI->db->delete($table, $where)) {
				$error = $this->CI->db->error();
				throw new Exception("Delete error on [$table]: {$error['message']}");
			}

			return ['success' => true];
		} catch (Exception $e) {
			log_message('error', $e->getMessage());
			throw new Exception($e->getMessage());
		}
	}
}
