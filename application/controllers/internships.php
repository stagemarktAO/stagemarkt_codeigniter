<?php

class internships extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model("Internships_model");
	}

    public function index()
    {
        $this->load->helper(array('form', 'url'));

        $this->load->library('form_validation');

        if ($this->form_validation->run() == FALSE)
        {
            $this->load->view('internships/create');
        }
        else
        {
            $this->load->view('internships/create');
        }
    }

    public function create(){

	    if($this->is_logged_in() == FALSE) {
		    // login url is unknown;
		    header("location:http://stagemarkt.local/login");
	    }

        $this->load->helper('form');
        $this->load->model('Internships_model');
        $this->load->library('form_validation');

        $data['title'] = 'maak stageplek aan';

        $this->form_validation->set_rules('education', 'Education', 'required');
        $this->form_validation->set_rules('date_start', 'Date_start', 'required');
        $this->form_validation->set_rules('date_end', 'Date_end', 'required');
        $this->form_validation->set_rules('location', 'Location', 'required');
        $this->form_validation->set_rules('year', 'Year', 'required');

        if ($this->form_validation->run() == false) {
        $this->load->view('templates/header');
        $this->load->view('internships/create');
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