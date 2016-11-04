<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pos_main extends CI_Controller {

	function __construct()
	{
    parent::__construct();
		if (!($this->session->userdata('sessid'))) redirect('pos_login', 'refresh');
	}

	public function index()
	{
		$data['shopname'] = $this->session->userdata("sessshopname");
		$data['title'] = programname.version." - Main";
		$this->load->view('POS/main/main_pos', $data);
	}

	function time_main()
	{
		$data['title'] = programname.version." - Main";
		$this->load->view('POS/main/main_time_pos', $data);
	}

	function jewe_main()
	{
		$data['title'] = programname.version." - Out of Service";
		$this->load->view('POS/main/noservice_view', $data);
	}

	function gold_main()
	{
		$data['title'] = programname.version." - Out of Service";
		$this->load->view('POS/main/noservice_view', $data);
	}

}
