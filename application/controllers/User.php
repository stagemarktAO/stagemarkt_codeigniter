<?php

class User extends CI_Controller
{

	public function index()
	{
		$this->load->helper(array('form', 'url'));

		$this->load->library('form_validation');

		if ($this->form_validation->run() == FALSE)
		{
			$this->load->view('user/create');
		}
		else
		{
			$this->load->view('user/create');
		}
	}

	public function create()
	{
		$this->load->helper('form');
		$this->load->model('User_model');
		$this->load->library('form_validation');

		$data['title'] = 'Register';

		$this->form_validation->set_rules('fname', 'Fname', 'required');
		$this->form_validation->set_rules('lname', 'Lname', 'required');
		$this->form_validation->set_rules('gender', 'Gender', 'required');
		$this->form_validation->set_rules('email', 'Email', 'required|valid_email|is_unique[user.email]');
		$this->form_validation->set_rules('password', 'Password', 'required');
		$this->form_validation->set_rules('confirm_password', 'Confirm Password', 'required|matches[password]');



		if ($this->form_validation->run() === FALSE) {
			$this->load->view('templates/header', $data);
			$this->load->view('user/create');
			$this->load->view('templates/footer');

		} else {
			$this->User_model->set_user();
			$this->load->view('user/success');
		}
	}
}