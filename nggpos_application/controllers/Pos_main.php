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
		$this->load->model('province_model','',TRUE);
		$data['province_array'] = $this->province_model->get_province();
		$this->session->set_userdata('sessproducttype', 'time');
		$this->session->set_userdata('sessproducttypeview', 'นาฬิกา');
		$data['title'] = programname.version." - Main";
		$this->load->view('POS/main/main_time_pos', $data);
	}

	function jewe_main()
	{
		$this->session->set_userdata('sessproducttype', 'jewelry');
		$data['title'] = programname.version." - Out of Service";
		$this->load->view('POS/main/noservice_view', $data);
	}

	function gold_main()
	{
		$this->session->set_userdata('sessproducttype', 'gold');
		$data['title'] = programname.version." - Out of Service";
		$this->load->view('POS/main/noservice_view', $data);
	}

}
