<?php

class User_model extends CI_Model {

	public function __construct()
	{
		$this->load->database();
	}

	public function set_user()
	{
		$this->load->helper('url');

		$data = array(
			'fname' => $this->input->post('fname'),
			'lname' => $this->input->post('lname'),
			'gender' => $this->input->post('gender'),
			'email' => $this->input->post('email'),
			'password' => md5($this->input->post('password'))
		);

		return $this->db->insert('user', $data);
	}
}