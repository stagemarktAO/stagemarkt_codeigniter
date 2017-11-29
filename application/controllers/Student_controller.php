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
        $data['title'] = "Student";

        $this->load->view('templates/header', $data);
        $this->load->view('student/student_view');
        $this->load->view('templates/footer', $data);
    }
}