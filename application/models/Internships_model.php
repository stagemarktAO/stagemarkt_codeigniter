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

}