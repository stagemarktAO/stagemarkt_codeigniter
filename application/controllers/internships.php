<?php

class internships extends CI_Controller
{

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
        $this->load->helper('form');
        $this->load->model('internships_model');
        $this->load->library('form_validation');

        $data['title'] = 'maak stageplek aan';

        $this->form_validation->set_rules('education', 'Education', 'required');
        $this->form_validation->set_rules('date_start', 'Date_start', 'required');
        $this->form_validation->set_rules('date_end', 'Date_end', 'required');
        $this->form_validation->set_rules('location', 'Location', 'required');
        $this->form_validation->set_rules('year', 'Year', 'required');
        $this->form_validation->set_rules('skills', 'Skills', 'required');
        $this->form_validation->set_rules('gradation', 'Gradation', 'required');

        if ($this->form_validation->run() == false) {
        $this->load->view('templates/header');
        $this->load->view('internships/create');
        $this->load->view('templates/footer');
        } else {
            $this->Internships_model->set_internship();
            $this->load->view('templates/header');
            $this->load->view('internships/index');
            $this->load->view('templates/footer');
        }
    }
}