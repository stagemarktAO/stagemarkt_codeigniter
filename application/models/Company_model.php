<?php
/**
 * Created by PhpStorm.
 * User: Gebruiker
 * Date: 20/09/2017
 * Time: 10:02
 */

class company_model extends CI_Model
{
	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	public function create_new_company()
	{
		// get the post data for insert;
		$data = array(
			'company_name' => $this->input->post('company_name'),
			'adress' => $this->input->post('adress'),
            'company_number' => $this->input->post('company_number'),
			'phonenumber' => $this->input->post('phonenumber'),
			'website' => $this->input->post('site')
		);
		$this->db->insert('company_table', $data);
		return $this->db->insert_id();
	}

	public function load_company($id = null)
	{
		if($id) {
            return $this->db->get_where('company_table', array('id' => $id))->row();
        } else {
            return $this->db->get('company_table')->result_array();
        }
	}

    public function get_user_company()
    {
        $this->db->where(array('user_id' => $_SESSION['user_id']));
        $this->db->from('contacts');
        $this->db->join('company_table', 'contacts.company_id = company_table.id');
        $result = $this->db->get();
        if($this->db->affected_rows() === 1) {
            return $result->row();
        } else {
            return FALSE;
        }
    }

    public function assign_company($company_id = '') {
        // assign company to a contact;
        $data = array(
            'user_id' => $_SESSION['user_id'],
            'company_id' => $company_id
        );
        $this->db->insert('contacts', $data);
    }
}