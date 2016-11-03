<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pos_login extends CI_Controller {

	public function index()
	{
    $data['title'] = "Login";
		$this->load->view('POS/authen/login', $data);
	}

	public function verify()
	{
		$username = $this->input->post("username");
		$password = $this->input->post("password");

		
	}
}
