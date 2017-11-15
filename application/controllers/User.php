<?php

class User extends CI_Controller
{

    public function __construct() {

        parent::__construct();
        $this->load->library(array('session'));
        $this->load->model('user_model');

    }
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

		$data['title'] = 'Registreer';

		$this->form_validation->set_rules('fname', 'Fname', 'required');
		$this->form_validation->set_rules('lname', 'Lname', 'required');
		$this->form_validation->set_rules('gender', 'Gender', 'required');
        $this->form_validation->set_rules('typeaccount', 'Type', 'required');
		$this->form_validation->set_rules('email', 'Email', 'required|valid_email|is_unique[user.email]');
		$this->form_validation->set_rules('password', 'Password', 'required');
		$this->form_validation->set_rules('confirm_password', 'Confirm Password', 'required|matches[password]');



		if ($this->form_validation->run() === FALSE) {
			$this->load->view('user/create');
			$this->load->view('templates/footer');

		} else {
			$this->User_model->set_user();
			$this->load->view('user/success');
		}
	}
    public function logout() {

        $data = new stdClass();

        if (isset($_SESSION['logged_in']) && $_SESSION['logged_in'] === true) {

            foreach ($_SESSION as $key => $value) {
                unset($_SESSION[$key]);
            }
            $this->load->view('templates/header');
            $this->load->view('user/login', $data);
            $this->load->view('templates/footer');

        } else {
            redirect('login');

        }

    }

    public function login(){
        // create the data object
        $data = new stdClass();

        // set validation rules
        $this->form_validation->set_rules('email', 'email', 'required');
        $this->form_validation->set_rules('password', 'Password', 'required');

        if ($this->form_validation->run() == false) {

            // validation not ok, send validation errors to the view

            $this->load->view('user/login', $data);
            $this->load->view('templates/footer');
        }

        else {
            // set variables from the form
            $email = $this->input->post('email');
            $password = $this->input->post('password');

            if ($this->user_model->resolve_user_login($email, $password)) {
                $user_id = $this->user_model->get_user_id_from_email($email);
                $user = $this->user_model->get_user($user_id);
                
                // set session user datas
                $_SESSION['user_id'] = (int)$user->id;
                $_SESSION['email'] = (string)$user->email;
                $_SESSION['fname'] = (string)$user->fname;
                $_SESSION['logged_in'] = (bool)true;
                //echo'hello';
                // user login ok
                $this->load->view('templates/header');
                $this->load->view('user/loggedin', $data);
                $this->load->view('templates/footer');

            } else {
                // login failed
                $data->error = 'Wrong email or password.';

                // send error to the view
                $this->load->view('user/login', $data);
                $this->load->view('templates/footer');

            }
        }
    }
}