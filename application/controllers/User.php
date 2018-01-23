<?php

class User extends CI_Controller
{

    public function __construct() {

        parent::__construct();
        $this->load->model('User_model');
        if (!isset($_SESSION['email'])) {
            if(uri_string() == 'logout' || uri_string() == 'profile'){
                redirect(base_url());
            }
        }
        else{
            if(uri_string() == 'create' || uri_string() == 'login'){
                redirect(base_url());;
            }
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
			$this->load->model('Mail_model');
			$this->Mail_model->send_welcome_mail();
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

    public function login()
    {
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
            if (s)

            if ($this->User_model->resolve_user_login($email, $password)) {
                $user_id = $this->User_model->get_user_id_from_email($email);
                $user = $this->User_model->get_user($user_id);
                if ((int)$user->type != 3) {
                    // set session user datas
                    $_SESSION['user_id'] = (int)$user->id;
                    $_SESSION['email'] = (string)$user->email;
                    $_SESSION['fname'] = (string)$user->fname;
                    $_SESSION['lname'] = (string)$user->lname;
                    $_SESSION['phone'] = (string)$user->phonenumber;
                    $_SESSION['type'] = (int)$user->type;
                    $_SESSION['logged_in'] = (bool)true;
                    //echo'hello';
                    // user login ok
                    redirect('');

                } elseif ((int)$user->type != 0 or 1) {
                    // login failed

                    $data->error = 'Dit is een admin account met een admin account moet je op de admin pagina inloggem.';
                    // send error to the view
                    $this->load->view('user/login', $data);
                    $this->load->view('templates/footer');
                }
            } else {
                // login failed
                $data->error = 'Verkeerd email of wachtwoord.';

                // send error to the view
                $this->load->view('user/login', $data);
                $this->load->view('templates/footer');

            }
        }
    }
    public function profile() {

        //load views in
        $this->form_validation->set_rules('fname', 'fname', 'required');
        $this->form_validation->set_rules('lname', 'Lname', 'required');
        $this->form_validation->set_rules('email', 'Email', 'required');

        if ($this->form_validation->run() === FALSE) {
            $this->load->view('templates/header');
            $this->load->view('user/profile');
            $this->load->view('templates/footer');

        } else {
            $this->User_model->update();

            $_SESSION['email'] =  $this->input->post('email');
            $_SESSION['fname'] =  $this->input->post('fname');
            $_SESSION['lname'] =  $this->input->post('lname');
            $_SESSION['phone'] =  $this->input->post('phone');
            redirect('');
        }
    }
    public function admin() {

        if (!isset($_SESSION['admin'])) {
            $data = new stdClass();
            $rules = array('required' => 'Jij hebt %s nog niet ingevuld, dit veld is verplicht.');
            //load views in
            $this->form_validation->set_rules('email', 'email', 'required', $rules);
            $this->form_validation->set_rules('password', 'Password', 'required', $rules);

            if ($this->form_validation->run() === FALSE) {
                $this->load->view('admin/login');

            } else {
                $email = $this->input->post('email');
                $password = $this->input->post('password');



                if ($this->User_model->resolve_user_login($email, $password)) {
                    $user_id = $this->User_model->get_user_id_from_email($email);
                    $user = $this->User_model->get_user($user_id);
                    if ((int)$user->type == 3) {
                        // set session user datas
                        $_SESSION['user_id'] = (int)$user->id;
                        $_SESSION['email'] = (string)$user->email;
                        $_SESSION['fname'] = (string)$user->fname;
                        $_SESSION['lname'] = (string)$user->lname;
                        $_SESSION['phone'] = (string)$user->phonenumber;
                        $_SESSION['type'] = (int)$user->type;
                        $_SESSION['logged_in'] = (bool)true;
                        $_SESSION['admin'] = (bool)true;
                        //echo'hello';
                        // user login ok
                        redirect('admin');

                    } elseif ((int)$user->type == 0 or 1) {
                        // login failed

                        $data->error = 'Geen admin account.';
                        // send error to the view
                        $this->load->view('admin/login', $data);

                    }
                } else {
                    // login failed
                    $data->error = 'Verkeerd email of wachtwoord.';

                    // send error to the view
                    $this->load->view('admin/login', $data);

                }
            }
        }
        else{
            $this->load->view('templates/header');
            $this->load->view('admin/index');
            $this->load->view('templates/footer');

        }
    }
}