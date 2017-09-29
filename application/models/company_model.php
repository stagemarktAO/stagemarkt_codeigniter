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
            'phonenumber' => $this->input->post('phonenumber'),
            'website' => $this->input->post('site')
        );
        $this->db->insert('company_table', $data);
        return $this->db->insert_id();
    }

    public function load_company_data($id)
    {
        // fetch company data;
        return $this->db->get_where('company_table', array('id' => $id))->row();
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
        header("location:http://stagemarkt.local/company/create");
    }
}