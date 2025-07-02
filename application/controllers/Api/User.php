<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->database();
		$this->load->library('traits');
	}

	public function index()
	{
		$return = jsonToArry($this->db->get('users')->result());
		die(ajaxJSONReturn(200, "Success!", "Berhasil diambil!", $return));
	}
}
