<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->database();
		$this->load->library('traits');
	}

	public function index()
	{
		$datas['container_data'] = [];
		$datas['pageTitle'] = "Dashboard | Fullstack CodeIgniter";
		$datas['container_data']['user_datas'] = jsonToArry($this->db->get('users')->result());

		$this->traits->view('pages/dashboard_page', $datas);
	}

	public function simpan()
	{
		try {
			$this->traits->insert('users', [
				'username' => '123',
				'password' => password_hash('123', PASSWORD_DEFAULT)
			]);
		} catch (Exception $err) {
			echo ajaxJSONReturn(500, "Kesalahan server!", "{$err->getMessage()}");
		}
	}
}
