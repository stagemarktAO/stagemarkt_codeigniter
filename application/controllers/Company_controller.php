<?php

/**
 * Created by PhpStorm.
 * User: Gebruiker
 * Date: 20/09/2017
 * Time: 09:06
 */
class Company_controller extends CI_Controller
{
    public function index()
    {
        $this->load->view("company/company_view");
    }
}