<?php

class Internships_model extends CI_Model
{
	public function __construct()
	{
		$this->load->database();
	}

	public function set_internship()
	{
		$data = array(
			'education' => $this->input->post('education'),
			'date_start' => $this->input->post('date_start'),
			'date_end' => $this->input->post('date_end'),
			'location' => $this->input->post('location'),
			'year' => $this->input->post('year')
		);

		return $this->db->insert('internships', $data);
	}

	public function is_logged_in()
	{
		$this->load->library('session');
		if($this->session->userdata('logged_in') == TRUE){
			return TRUE;
		} else {
			return FALSE;
		}
	}

	public function login()
	{
		$this->load->library('session');
		$this->session->set_userdata('logged_in', TRUE);
		header("location:http://stagemarkt.local/internships/create");
	}

}

