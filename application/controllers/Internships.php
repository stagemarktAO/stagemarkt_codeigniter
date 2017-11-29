<?php

class Internships extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model("Internships_model");
        if (!isset($_SESSION['email'])) {
            redirect(base_url());
        }
	}

    public function index()
    {

        if ($this->form_validation->run() == FALSE)
        {
            $this->load->view('internships/create');
        }
        else
        {
            $this->load->view('internships/create');
        }
    }

    public function create()
    {
		$data = array();
        $data['result'] = $this->Internships_model->get_skills();


        $data['title'] = 'maak stageplek aan';

        $this->form_validation->set_rules('education', 'Education', 'required');
        $this->form_validation->set_rules('date_start', 'Date_start', 'required');
        $this->form_validation->set_rules('date_end', 'Date_end', 'required');
        $this->form_validation->set_rules('location', 'Location', 'required');
        $this->form_validation->set_rules('year', 'Year', 'required');

        if ($this->form_validation->run() == false) {
        $this->load->view('templates/header');
        $this->load->view('internships/create', $data);
        $this->load->view('templates/footer');
        } else {
            $this->Internships_model->set_internship();
            $this->load->view('templates/header');
            $this->load->view('user/success');
            $this->load->view('templates/footer');
        }
    }

	public function is_logged_in()
	{
		return $this->Internships_model->is_logged_in();
	}

	public function login()
	{
		$this->Internships_model->login();
	}
}
