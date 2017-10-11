<?php

/**
 * Created by PhpStorm.
 * User: roanv
 * Date: 10-10-2017
 * Time: 18:13
 */
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
            'year' => $this->input->post('year'),
            'skills' => $this->input->post('skills'),
            'gradation' => $this->input->post('gradation'),
        );

        return $this->db->insert('internships', $data);
    }

}