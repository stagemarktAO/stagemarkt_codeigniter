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
			'institution' => $this->input->post('institution'),
			'email' => $this->input->post('email'),
			'password' => $this->input->post('password')
		);

		return $this->db->insert('user', $data);
	}
}