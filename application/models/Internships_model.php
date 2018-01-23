<?php

class Internships_model extends CI_Model
{
	public function __construct()
	{
		$this->load->database();
	}
// function to implement data from internship creaton into the database
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
		$gradations = $this->input->post('gradation');

		$count = 0;

		foreach ($skills as $skill){
			$data = array(
				'internships_id'=> $insert_id,
				'skills_id' => $skill,
				'gradations_id' => $gradations{$count}
			);
			$this->db->insert('internships_skills', $data);

			$count++;
		}

	}

// function to get the skills from the database
	public function get_skills(){
		$this->db->select('id, name');
		$this->db->from('skills');
		$query = $this->db->get();
		return $skills = $query->result();
	}

// functon to get the gradations from the database
	public function get_gradation(){
		$this->db->select('id, name');
		$this->db->from('gradations');
		$query = $this->db->get();
		return $gradation = $query->result();
	}

//function to get the intnerships from the database
	public function get_internships(){
		$this->db->select('*');
		$this->db->from('internships');
		$query = $this->db->get();
		return $internships = $query->result();
	}

}