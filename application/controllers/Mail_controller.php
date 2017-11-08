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
}