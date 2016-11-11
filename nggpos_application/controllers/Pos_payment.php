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
		$shop_id = $this->session->userdata('sessshopid');
		$shop_name = $this->session->userdata('sessshopname');

		// insert data into pos_payment and get posp_id to insert pos payment item
    $payment_temp = array(
				"posp_issuedate" => $date_today,
				"posp_gateway" => $payment['paymentWay'],
				"posp_price_net" => $payment['total_net'],
				"posp_price_paid" => $payment['paymentValue'],
				"posp_price_discount" => $payment['total_dc'],
				"posp_price_topup" => $payment['dc_topup'],
				"posp_price_tax" => $payment['total_tax'],
				"posp_customer_id" => $payment['customer_id'],
				"posp_saleperson_id" => $payment['saleperson_id'],
				"posp_status" => 'N',
				"posp_remark" => $payment['paymentRemark'],
				"posp_dateadd" => $datetime_now,
				"posp_dateadd_by" => $user_id,
				"posp_shop_id" => $shop_id,
				"posp_shop_name" => $shop_name,
				"posp_enable" => 1,
		);
		$this->load->model('pos_payment_model','',TRUE);
		$posp_id = $this->pos_payment_model->insert_new_payment($payment_temp);
		//------------------------------------------------------
		// insert pos payment item
		if ($posp_id > 0) {
			$result_item = true;
			for($i=0; $i<count($item); $i++) {
				$item_temp = array(
						"popi_posp_id" => $posp_id,
						"popi_item_id" => $item[$i]['id'],
						"popi_barcode" => $item[$i]['barcode'],
						"popi_item_srp" => $item[$i]['srp'],
						"popi_item_dc_baht" => $item[$i]['dc_baht'],
						"popi_item_dc_percent" => $item[$i]['dc_percent'],
						"popi_item_net" => $item[$i]['net'],
						"popi_item_qty" => $item[$i]['qty'],
						"popi_enable" => 1,
				);
				$this->load->model('pos_payment_model','',TRUE);
				$result_id = $this->pos_payment_model->insert_new_payment_item($item_temp);
				if ($result_id < 0) $result_item = false;
			}
		}
		//------------------------------------------------------
		// stock management
			# code......
		//------------------------------------------------------
		// check all query error and return true or false
			if (($posp > 0) && ($result_item)) {
				echo true;
			} else {
				echo false;
			}
		//------------------------------------------------------

	}


}
