<?php
class Welcome extends CI_Controller {

	public function index()
	{
        $this->load->view('templates/header');
		$this->load->view('welcome_message');
        $this->load->view('templates/footer');
	}
}
