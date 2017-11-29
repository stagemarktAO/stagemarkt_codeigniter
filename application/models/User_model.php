<?php

class User_model extends CI_Model {

    public function __construct()
	{
        parent::__construct();
		$this->load->database();
	}

	public function set_user($data)
	{
		return $this->db->insert('user', $data);
	}

    public function get_user_id_from_email($email) {

        $this->db->select('id');
        $this->db->from('user');
        $this->db->where('email', $email);
        return $this->db->get()->row('id');

    }

    public function resolve_user_login($email, $password) {

        $this->db->select('password');
        $this->db->from('user');
        $this->db->where('email', $email);
        $hash = $this->db->get()->row('password');
        return $this->verify_password_hash($password, $hash);

    }

    public function get_user($user_id) {

        $this->db->from('user');
        $this->db->where('id', $user_id);
        return $this->db->get()->row();

    }


    private function verify_password_hash($password, $hash) {
        return password_verify($password, $hash);

    }
}