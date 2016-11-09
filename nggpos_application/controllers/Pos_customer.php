<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pos_customer extends CI_Controller {

	function __construct()
	{
    parent::__construct();
		if (!($this->session->userdata('sessid'))) redirect('pos_login', 'refresh');
	}

	public function index()
	{

	}

  function check_customer()
	{
		$telephone = $this->input->post("telephone");
		$where = "posc_telephone like '%".$telephone."%' and posc_enable = 1";
		$this->load->model('pos_customer_model','',TRUE);
		$query = $this->pos_customer_model->get_customer($where);
		foreach($query as $loop) {
			if ($loop->posc_province == "กรุงเทพมหานคร") $jungwat = " ";
			else $jungwat = " จ. ";
			$result = array("posc_id" => $loop->posc_id,
											"posc_name" => $loop->posc_name,
											"posc_address" => $loop->posc_address.$jungwat.$loop->posc_province,
											"posc_taxid" => $loop->posc_taxid,
											"posc_telephone" => $loop->posc_telephone,
								);
		}
		echo json_encode($result);
	}

	function save_new_customer()
	{
		$name = $this->input->post("name");
		$address = $this->input->post("address");
		$province = $this->input->post("province");
		$telephone = $this->input->post("telephone");
		$taxid = $this->input->post("taxid");

		$temp = array(
				"posc_name" => $name,
				"posc_address" => $address,
				"posc_province" => $province,
				"posc_telephone" => $telephone,
				"posc_taxid" => $taxid,
		);

		$this->load->model('pos_customer_model','',TRUE);
		$insert_id = $this->pos_customer_model->insert_new_customer($temp);

		echo $insert_id;
	}


}
