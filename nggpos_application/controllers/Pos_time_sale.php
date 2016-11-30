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
		$this->load->model('province_model','',TRUE);
		$data['province_array'] = $this->province_model->get_province();

		$where = "nggu_id = '".$this->session->userdata('sessid')."'";
		$this->load->model('users_model','',TRUE);
		$data['sale_person'] = $this->users_model->get_users($where);

		$data['content_header'] = "นาฬิกา > สั่งขาย";
		$data['title'] = programname.version." - Main";
		$this->load->view('POS/time/main_time_pos', $data);
	}


}
