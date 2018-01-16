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
		$this->db->insert('internships', $data);
		$insert_id = $this->db->insert_id();
		$skills = $this->input->post('skills');

		foreach ($skills as $skill){
			$this->db->insert('internships_skills', $skill);
		}

	}

	public function get_skills(){
		$this->db->select('name');
		$this->db->from('skills');
		$query = $this->db->get();
		return $skills = $query->result();
	}

	public function get_gradation(){
		$this->db->select('name');
		$this->db->from('gradations');
		$query = $this->db->get();
		return $gradation = $query->result();
	}

}