<?php

/**
 * Created by PhpStorm.
 * User: Gebruiker
 * Date: 20/09/2017
 * Time: 09:06
 */
class Company_controller extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model("company_model");
    }

    public function index()
    {
        $data['title'] = "Company";

        $this->load->view('templates/header', $data);
        $this->load->view('company/company_view');
        $this->load->view('templates/footer', $data);
    }

    public function create()
    {
        // redirects user if not logged in;
        if($this->is_logged_in() == FALSE) {
            // login url is unknown;
            header("location:http://stagemarkt.local/register");
        }
        $this->load->helper('form');
        $data['title'] = "Create company";
        $this->load->view('templates/header', $data);
        // if post data is found its validated;
        if($this->input->post()) {
            $this->form_validation->set_rules('company_name', 'Company name', 'required');
            $this->form_validation->set_rules('adress', 'Adress', 'required');
            $this->form_validation->set_rules('phonenumber', 'Phone number', 'required');
            $this->form_validation->set_rules('site', 'Website', 'required');

            // if the data is valid a new company will be created;
            if ($this->form_validation->run() == TRUE) {
                $id = $this->company_model->create_new_company();
                $this->load_company($id);
            } else {
                $this->load->view('company/company_create');
            }
        } else {
            $this->load->view('company/company_create');
        }
        $this->load->view('templates/footer', $data);
    }

    public function load_company($id)
    {
        $data = $this->company_model->load_company_data($id);
        $this->load->view('company/company_view', $data);
    }

    public function is_logged_in()
    {
        return $this->company_model->is_logged_in();
    }

    public function login()
    {
        $this->company_model->login();
    }
}