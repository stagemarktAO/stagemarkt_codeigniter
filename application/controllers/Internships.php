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
		if((int)$_SESSION['type'] !== 1) {
			redirect(base_url());
		}
	}

//function to load the index / all the internships
    public function index()
    {
    	$internships['internships'] = $this->Internships_model->get_internships();

    	$this->load->view('templates/header');
    	$this->load->view('internships/index', $internships);
    	$this->load->view('templates/footer');
    }
// function to create the internship
    public function create()
    {
		$data = array();
        $data['skills'] = $this->Internships_model->get_skills();
        $data['gradation'] = $this->Internships_model->get_gradation();


        $data['title'] = 'maak stageplek aan';

        $this->form_validation->set_rules('education', 'Education', 'required');
        $this->form_validation->set_rules('date_start', 'Date_start', 'required');
        $this->form_validation->set_rules('date_end', 'Date_end', 'required');
        $this->form_validation->set_rules('location', 'Location', 'required');
        $this->form_validation->set_rules('year', 'Year', 'required');
        $this->form_validation->set_rules('skills[]', 'Skills', 'required');
        $this->form_validation->set_rules('gradation[]', 'Gradation', 'required');

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

// function to check if user is looged in to check if you can create a new internship
	public function is_logged_in()
	{
		return $this->Internships_model->is_logged_in();
	}

	public function login()
	{
		$this->Internships_model->login();
	}
}
