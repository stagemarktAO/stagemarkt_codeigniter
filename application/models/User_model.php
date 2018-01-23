<?php

class User_model extends CI_Model {

    public function __construct()
	{
        parent::__construct();
		$this->load->database();
	}

    public function update($email, $fname, $lname, $phone, $company_id)
    {
        $id = $_SESSION['user_id'];
        $data = array(
            'fname' => $fname,
            'lname' => $lname,
            'email' => $email,
            'phonenumber' => $phone
        );
        $this->db->update('user', $data, array('id' => $id));

        //insert contact -> company relation in db, if exsist update.
        if($company_id) {
            $company = array(
                'user_id'    => $id,
                'company_id' => $company_id
            );
        };

        $this->db->where('user_id',$id);
        $result_row = $this->db->get('contacts')->row();

        if ( isset($result_row))
        {
            $this->db->where('user_id',$id);
            $this->db->update('contacts',$company);
        } else {
            $this->db->insert('contacts',$company);
        }
    }

	public function set_user()
	{
	    $data = array(
			'fname' => $this->input->post('fname'),
			'lname' => $this->input->post('lname'),
			'gender' => $this->input->post('gender'),
			'type' => $this->input->post('typeaccount'),
			'email' => $this->input->post('email'),
			'password' => password_hash($this->input->post('password'), PASSWORD_DEFAULT)
		);

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