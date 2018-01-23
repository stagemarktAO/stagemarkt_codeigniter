<?php

/**
 * Created by PhpStorm.
 * User: Gebruiker
 * Date: 10/10/2017
 * Time: 09:20
 */
class Mail_controller extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    public function send_welcome_mail()
    {
        $this->load->model("mail_model");
        $this->mail_model->send_welcome_mail();
    }

    public function reset_password()
    {
        // define rules
        $this->form_validation->set_rules('email', 'Email', 'required');

        // go to recovery form
        if ($this->form_validation->run() === FALSE) {
            //load view for to submit username;
            $this->load->view('templates/header');
            $this->load->view('user/recovery');
            $this->load->view('templates/footer');
            // if the form is filled in go to model
        } else {
            // get variable and send to the model
            $email = $this->input->post('email');
            $this->load->model('mail_model');
            $this->mail_model->send_recovery_email($email);
        }
    }
}