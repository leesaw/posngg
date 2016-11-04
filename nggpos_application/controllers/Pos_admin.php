<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pos_admin extends CI_Controller {

	function __construct()
	{
    parent::__construct();
	}

	public function index()
	{
		$data['title'] = programname.version." - Main";
		$this->load->view('POS/main/main_admin', $data);
	}

}
