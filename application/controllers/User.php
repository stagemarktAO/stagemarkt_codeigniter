<?php

class User extends CI_Controller
{

    public function __construct() {

        parent::__construct();
        $this->load->library(array('session'));
        $this->load->model('user_model');
        if (uri_string() != 'logout' && isset($_SESSION['email'])) {
            redirect(base_url());
        }

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

		$data['fname'] = $this->form_validation->set_rules('fname', 'Fname', 'required');
        $data['lname'] = $this->form_validation->set_rules('lname', 'Lname', 'required');
        $data['gender'] = $this->form_validation->set_rules('gender', 'Gender', 'required');
        $data['type'] = $this->form_validation->set_rules('typeaccount', 'Type', 'required');
        $data['email'] = $this->form_validation->set_rules('email', 'Email', 'required|valid_email|is_unique[user.email]');
        $data['email'] = $this->form_validation->set_rules('password', 'Password', 'required');
        $this->form_validation->set_rules('confirm_password', 'Confirm Password', 'required|matches[password]');



		if ($this->form_validation->run() === FALSE) {
			$this->load->view('user/create');
			$this->load->view('templates/footer');

		} else {
			$this->User_model->set_user($data);
			$this->load->model('mail_model');
			$this->mail_model->send->welcome->email($data['email']);
			redirect('login');
		}
	}
    public function logout() {

        $data = new stdClass();

        if (isset($_SESSION['logged_in']) && $_SESSION['logged_in'] === true) {

            foreach ($_SESSION as $key => $value) {
                unset($_SESSION[$key]);
            }

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
                $_SESSION['type'] = (int)$user->type;
                $_SESSION['logged_in'] = (bool)true;
                //echo'hello';
                // user login ok
                redirect('');

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