<?php
class Skill_model extends CI_Model
{

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    public function get_skills()
    {
        $query = $this->db->get('skills');
        return $query;
    }

    public function create_skill()
    {
        $data = array(
            'name' => $this->input->post('skill'),

        );

        return $this->db->insert('skills', $data);
    }

    public function deleteskill($id) {
        $this->db->where('id', $id);
        return $this->db->delete('skills');
    }
}