<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pos_payment extends CI_Controller {

	function __construct()
	{
    parent::__construct();
		if (!($this->session->userdata('sessid'))) redirect('pos_login', 'refresh');
	}

	public function index()
	{

	}

	function save_new_payment()
	{
    $item = $this->input->post("item");
		$payment = $this->input->post("payment");

    $date_today = date("Y-m-d");
    $datetime_now = date("Y-m-d H:i:s");
    $user_id = $this->session->userdata('sessid');

    $payment_temp = array(
				"posp_name" => $payment[''],
				"posc_address" => $payment[''],
				"posc_province" => $payment[''],
				"posc_telephone" => $payment[''],
				"posc_taxid" => $payment[''],
		);

    for($i=0; $i<count($item); $i++) {
      $item_temp = array(
                      "" => $item[$i][''],
                    );
    }



		$this->load->model('pos_customer_model','',TRUE);
		$insert_id = $this->pos_customer_model->insert_new_customer($temp);

		echo $insert_id;
	}


}
