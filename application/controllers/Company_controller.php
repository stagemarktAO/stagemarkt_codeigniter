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
        $this->load->model("Company_model");
        if (!isset($_SESSION['email'])) {
            redirect(base_url());
        }
        if((int)$_SESSION['type'] !== 1) {
            redirect(base_url());
        }
    }

    public function index()
    {
        $data['title'] = "Company";

        $this->load->view('templates/header', $data);
        $this->load->view('company/company_create');
        $this->load->view('templates/footer', $data);
    }

    public function create()
    {
        $data['title'] = "Create company";
        $this->load->view('templates/header', $data);
        // if post data is found its validated;

        $this->form_validation->set_rules('company_name', 'Company name', 'required|alpha_numeric');
        $this->form_validation->set_rules('adress', 'Adress', 'required|alpha_numeric');
        $this->form_validation->set_rules('company_number', 'Accrediteringsnummer', 'required|exact_length[9]|numeric');
        $this->form_validation->set_rules('phonenumber', 'Phone number', 'required|numeric');
        $this->form_validation->set_rules('site', 'Website', 'required');

        // if the data is valid a new company will be created;
        if ($this->form_validation->run() == TRUE) {
            $id = $this->Company_model->create_new_company();
            $this->load_company($id);
        } else {
            $this->load->view('company/company_create');
        }
        $this->load->view('templates/footer', $data);
    }

    public function load_company($id)
    {
        $data = $this->company_model->load_company($id);
        $this->load->view('company/company_view', $data);
    }

    public function assign_company($id)
    {
        $this->company_model->assign_company($id);
    }

}