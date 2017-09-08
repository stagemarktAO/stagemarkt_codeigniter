<?php

/**
 * Created by PhpStorm.
 * User: Gebruiker
 * Date: 06/09/2017
 * Time: 13:48
 */
class Student_controller extends CI_Controller
{
    public function index()
    {
        $this->load->view('student_view');
    }
}