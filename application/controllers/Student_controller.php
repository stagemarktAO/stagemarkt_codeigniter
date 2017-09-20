<?php

/**
 * Created by PhpStorm.
 * User: Gebruiker
 * Date: 20/09/2017
 * Time: 09:08
 */
class Student_controller extends CI_Controller
{
    public function index()
    {
        $this->load->view("student/student_controller");
    }
}