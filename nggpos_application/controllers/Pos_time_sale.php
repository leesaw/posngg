<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pos_time_sale extends CI_Controller {

	function __construct()
	{
    parent::__construct();
		if (!($this->session->userdata('sessid'))) redirect('pos_login', 'refresh');
	}

	public function index()
	{

	}

	function form_sale_order()
	{
		$data['title'] = programname.version." - Main";
		$this->load->view('POS/main/main_time_pos', $data);
	}

}
