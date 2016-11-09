<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pos_sale_person extends CI_Controller {

	function __construct()
	{
    parent::__construct();
		if (!($this->session->userdata('sessid'))) redirect('pos_login', 'refresh');
	}

	public function index()
	{

	}

  function check_sale_person()
	{
		$sale_number = $this->input->post("number");
		$where = "nggu_number like '".$sale_number."'";
		$this->load->model('users_model','',TRUE);
		$query = $this->users_model->get_users($where);
		foreach($query as $loop) {
			$result = array("nggu_id" => $loop->nggu_id, "nggu_number" => $loop->nggu_number, "nggu_name" => $loop->nggu_firstname." ".$loop->nggu_lastname);
		}
		echo json_encode($result);
	}


}
