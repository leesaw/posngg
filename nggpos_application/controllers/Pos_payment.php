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
		$paid = $this->input->post("paid");
		$serial = $this->input->post("serial");

    $date_today = date("Y-m-d");
    $datetime_now = date("Y-m-d H:i:s");
    $user_id = $this->session->userdata('sessid');
		$shop_id = $this->session->userdata('sessshopid');
		$shop_name = $this->session->userdata('sessshopname');

		$month = date("Y-m");
    $year_number = date("y");
		$year_number = (int)$year_number + 43;
		$month_number = date("m");
		$shop_check_number = $shop_id;

		$this->load->model('pos_payment_model','',TRUE);
    $number = $this->pos_payment_model->getMaxNumber_small_invoice($month, $shop_check_number);
    $number++;

  	$number = "ABN".str_pad($shop_id, 2, '0', STR_PAD_LEFT)."-".$year_number.$month_number.str_pad($number, 4, '0', STR_PAD_LEFT);

		// insert data into pos_payment and get posp_id to insert pos payment item
    $payment_temp = array(
				"posp_issuedate" => $date_today,
				"posp_small_invoice_number" => $number,
				"posp_price_net" => $payment['total_net'],
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
		$posp_id = $this->pos_payment_model->insert_new_payment($payment_temp);
		// insert log new payment
		$temp = array('posp_id' => $posp_id, "posp_updatedate" => $datetime_now, "posp_update_by" => $user_id);

    $payment_temp = array_merge($payment_temp, $temp);
		$log_id = $this->pos_payment_model->insert_log_new_payment($payment_temp);
		//------------------------------------------------------
		// insert pos payment item
		if ($posp_id > 0) {
			$result_item = true;

			for($i=0; $i<count($paid); $i++) {
				$paid_temp = array(
					"paid_payment_id" => $posp_id,
					"paid_gateway" => $paid[$i]['paid_gateway'],
					"paid_price_paid" => $paid[$i]['paid_price_paid'],
				);
				$this->load->model('pos_payment_model','',TRUE);
				$result_id = $this->pos_payment_model->insert_paid($paid_temp);
				if ($result_id < 0) $result_item = false;
			}

			for($i=0; $i<count($item); $i++) {
				// get item details
				$where_item = "it_id = '".$item[$i]['id']."'";
				$this->load->model('item_model','',TRUE);
				$item_array = $this->item_model->getItem($where_item);
				foreach($item_array as $loop) {
					$item_name = $loop->br_name." ".$loop->it_model;
					$item_number = $loop->it_refcode;
					$item_brand = $loop->br_name;
					$item_description = $loop->it_short_description;
					$item_uom = $loop->it_uom;
				}
				if ($serial == 1 && $item[$i]['serial_id'] > 0) $item_serial = $item[$i]['barcode'];
				else $item_serial = "";

				$item_temp = array(
						"popi_posp_id" => $posp_id,
						"popi_item_id" => $item[$i]['id'],
						"popi_barcode" => $item[$i]['barcode'],
						"popi_item_name" => $item_name,
						"popi_item_number" => $item_number,
						"popi_item_brand" => $item_brand,
						"popi_item_description" => $item_description,
						"popi_item_uom" => $item_uom,
						"popi_item_serial" => $item_serial,
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

				// decrease stock warehouse out
        $this->load->model('tmp_shop_stock_model','',TRUE);
        $sql = "stob_id = '".$item[$i]["stob_id"]."'";
        $query = $this->tmp_shop_stock_model->getWarehouse_transfer($sql);

        $qty_update = $item[$i]["qty"];

        if (!empty($query)) {
            foreach($query as $loop) {
                $qty_new = $loop->stob_qty - $qty_update;
                $stock = array( 'id' => $loop->stob_id,
                                'stob_qty' => $qty_new,
                                'stob_lastupdate' => $datetime_now,
                                'stob_lastupdate_by' => $user_id,
                            );
                $query = $this->tmp_shop_stock_model->editWarehouse_transfer($stock);
                break;
            }
        }

				// edit serial
        if ($serial == 1) {
            $serial_item = array( 'id' => $item[$i]["serial_id"],
                                  'itse_enable' => 0,
																	'itse_dateadd' => $datetime_now,
                                );
            $query = $this->item_model->editItemSerial($serial_item);

        }

			}
		}
		//------------------------------------------------------
		// stock management
			# code......
		//------------------------------------------------------
		// check all query error and return true or false
			if (($posp_id > 0) && ($result_item)) {
				echo $posp_id;
			} else {
				echo 0;
			}
		//------------------------------------------------------

	}

	function view_payment()
	{
		$payment_id = $this->uri->segment(3);
		$shop_id = $this->session->userdata('sessshopid');
		$where = "";
		$where .= "posp_id = '".$payment_id."' and posp_shop_id = '".$shop_id."'";

		$this->load->model('pos_payment_model','',TRUE);
		$payment_array = $this->pos_payment_model->get_payment($where);

		if (count($payment_array) < 1) redirect('pos_error', 'refresh');

		$data['payment_array'] = $payment_array;

		$where = "popi_posp_id = '".$payment_id."'";
		$where .= " and popi_enable = 1";
		$data['item_array'] = $this->pos_payment_model->get_time_item_payment($where);

		$where = "paid_payment_id = '".$payment_id."'";
		$where .= " and paid_enable = 1";
		$data['paid_array'] = $this->pos_payment_model->get_paid_payment($where);

		$where = "pinv_payment_id = '".$payment_id."' and pinv_enable = 1";
    $this->load->model('pos_invoice_model','',TRUE);
    $check_payment = $this->pos_invoice_model->get_invoice($where);
    $had_payment = 0;
    foreach($check_payment as $loop) {
      $had_payment = $loop->pinv_id;
    }
		$data['had_payment'] = $had_payment;


		$this->load->model('shop_model','',TRUE);
		$where = "posh_id = '".$shop_id."'";
		$data['shop_array'] = $this->shop_model->get_shop($where);

		$data['title'] = programname.version." - Payment view";
		$data['content_header'] = "นาฬิกา > สั่งขาย > รายละเอียดการขาย";
		$this->load->view('POS/time/main_time_view_payment', $data);
	}

	function view_today_payment()
	{
		$this->load->model('pos_payment_model','',TRUE);
		$shop_id = $this->session->userdata('sessshopid');
		$where = "posp_shop_id = '".$shop_id."' and posp_enable = '1' and posp_issuedate = '".date("Y-m-d")."'";
		$data["payment_array"] = $this->pos_payment_model->get_payment($where);

		$data['title'] = programname.version." - Today Payment";
		$data['content_header'] = "นาฬิกา > สั่งขาย > การสั่งขายของวันนี้";
		$this->load->view('POS/tmp_time/main_time_today_payment', $data);
	}

	function void_payment()
	{
		$payment_id = $this->uri->segment(3);
		$remark = $this->input->post("remarkvoid");
		$shop_id = $this->session->userdata('sessshopid');

		$where = "posp_id = '".$payment_id."'";
		$this->load->model('pos_payment_model','',TRUE);
		$result = $this->pos_payment_model->get_payment($where);
		$datetime_now = date("Y-m-d H:i:s");
		$user_id = $this->session->userdata('sessid');

		$payment_temp = array(
			"id" => $payment_id,
			"posp_status" => 'V',
			"posp_enable" => 0,
			"posp_updatedate" => $datetime_now,
			"posp_update_by" => $user_id,
			"posp_remark" => $remark,
		);

		$this->pos_payment_model->edit_payment($payment_temp);

		foreach($result as $loop) {
			$temp = array(
				"posp_id" => $payment_id,
				"posp_updatedate" => $datetime_now,
				"posp_update_by" => $user_id,
				"posp_issuedate" => $loop->posp_issuedate,
				"posp_small_invoice_number" => $loop->posp_small_invoice_number,
				"posp_price_net" => $loop->posp_price_net,
				"posp_price_discount" => $loop->posp_price_discount,
				"posp_price_topup" => $loop->posp_price_topup,
				"posp_price_tax" => $loop->posp_price_tax,
				"posp_customer_id" => $loop->posp_customer_id,
				"posp_saleperson_id" => $loop->posp_saleperson_id,
				"posp_status" => 'V',
				"posp_remark" => $remark,
				"posp_dateadd" => $loop->posp_dateadd,
				"posp_dateadd_by" => $loop->posp_dateadd_by,
				"posp_shop_id" => $loop->posp_shop_id,
				"posp_shop_name" => $loop->posp_shop_name,
				"posp_enable" => 0,
			);
		}
		$log_id = $this->pos_payment_model->insert_log_new_payment($temp);

		// ----
		// Return to stock
		// increase stock warehouse out
		$this->load->model('shop_model','',TRUE);
		$where = "posh_id = '".$shop_id."'";
		$result = $this->shop_model->get_warehouse_shop($where);
		foreach ($result as $loop) { $warehouse_id = $loop->wh_id; }

		$where = "";
		$where .= "popi_posp_id = '".$payment_id."'";

		$this->load->model('pos_payment_model','',TRUE);
		$payment_array = $this->pos_payment_model->get_time_item_payment($where);
		foreach ($payment_array as $loop) {
			$item_id = $loop->popi_item_id;
			$serial_number = $loop->popi_item_serial;

			$this->load->model('tmp_shop_stock_model','',TRUE);
			$sql = "stob_item_id = '".$item_id."' and stob_warehouse_id = '".$warehouse_id."'";
			$query = $this->tmp_shop_stock_model->getWarehouse_transfer($sql);

			$qty_update = $loop->popi_item_qty;

			if (!empty($query)) {
					foreach($query as $loop) {
							$qty_new = $loop->stob_qty + $qty_update;
							$stock = array( 'id' => $loop->stob_id,
															'stob_qty' => $qty_new,
															'stob_lastupdate' => $datetime_now,
															'stob_lastupdate_by' => $user_id,
													);
							$query = $this->tmp_shop_stock_model->editWarehouse_transfer($stock);
							break;
					}
			}
			// edit serial
			if ($serial_number != "") {
					$where = "itse_serial_number = '".$serial_number."'";
					$this->load->model('item_model','',TRUE);
					$query_serial = $this->item_model->get_time_serial($where);
					foreach($query_serial as $loop) { $serial_id = $loop->itse_id; }
					$serial_item = array( 'id' => $serial_id,
																'itse_enable' => 1,
																'itse_dateadd' => $datetime_now,
															);
					$query = $this->item_model->editItemSerial($serial_item);
			}
		}






		// ----

		redirect('pos_payment/view_payment/'.$payment_id, 'refresh');
	}

	function search_payment()
	{
		$payment_number = $this->input->post("valuePaymentNumber");
		$shop_id = $this->session->userdata('sessshopid');
		$where = "";
		$where .= "posp_small_invoice_number like '".$payment_number."' and posp_enable = '1' and posp_shop_id = '".$shop_id."'";
		$this->load->model('pos_payment_model','',TRUE);
		$payment_array = $this->pos_payment_model->get_payment_id($where);
		if (count($payment_array) > 0) {
			foreach($payment_array as $loop) $payment_id = $loop->posp_id;
			if ($payment_id > 0) redirect('pos_payment/view_payment/'.$payment_id, 'refresh');
			else redirect('pos_error', 'refresh');
		}else { redirect('pos_error', 'refresh'); }
	}

	function get_payment_item()
	{
    $payment_id = $this->input->post("payment_id");

    $output = array();
    $index = 0 ;
		$where = "popi_posp_id = '".$payment_id."'";
		$where .= " and popi_enable = 1";
		$result = $this->pos_payment_model->get_time_item_payment($where);

    if (count($result) >0) {
      foreach($result as $loop) {
        $output[$index] = "<td><img src='".base_url()."asset/time_picture/".$loop->tiit_picture."' width='60px' height='80px' /></td>";
		    $output[$index] .= "<td><input type='hidden' name='it_id' id='it_id' value='".$loop->tiit_id."'><input type='hidden' name='it_barcode' id='it_barcode' value='".$loop->tiit_barcode."'>".$loop->tiit_barcode."</td>";
		    $output[$index] .= "<td>".$loop->tiit_number."-".$loop->tiit_name."<br>".$loop->tiit_brand."<br>".$loop->tiit_description;
				if ($loop->tiit_serial != "")
						$output[$index] .= "<br>Serial : ".$loop->tiit_serial;

				$output[$index] .= "</td>";
				$output[$index] .= "<td><input type='hidden' name='it_srp' id='it_srp' value='".$loop->tiit_srp."'>".number_format($loop->tiit_srp)."</td>";
	      $output[$index] .= "<td><input type='number' name='it_quantity' id='it_quantity' value='1' style='width: 50px;' onchange='numberWithCommas(this); calculate();'></td>";
	      $output[$index] .= "<td><input type='number' name='it_discount' id='it_discount' value='0' style='width: 80px;' onchange='calculate();'></td>";
				$output[$index] .= "<td><input type='number' name='it_dc_percent' id='it_dc_percent' value='0' style='width: 50px;' onchange='numberWithCommas(this); calculate();'></td>";
				$output[$index] .= "<td><input type='text' name='it_net' id='it_net' value='".number_format($loop->tiit_srp, 2, '.', ',')."' style='width: 100px;text-align: right;font-weight: bold;' disabled></td>";

				$index++;
      }
    }

    echo json_encode($output);
    exit();
	}

	function convert_invoice()
	{
		$payment_id = $this->uri->segment(3);

		$shop_id = $this->session->userdata('sessshopid');
		$this->load->model('shop_model','',TRUE);
		$where = "posh_id = '".$shop_id."'";
		$shop_array = $this->shop_model->get_shop($where);
		foreach($shop_array as $loop) {
			$print_tax = $loop->posh_print_tax;
		}
		if ($print_tax ==1) {
			$where = "";
			$where .= "posp_id = '".$payment_id."'";

			$this->load->model('pos_payment_model','',TRUE);
			$data['payment_array'] = $this->pos_payment_model->get_payment($where);

			$where = "popi_posp_id = '".$payment_id."'";
			$where .= " and popi_enable = 1";
			$data['item_array'] = $this->pos_payment_model->get_time_item_payment($where);

			$where = "paid_payment_id = '".$payment_id."'";
			$where .= " and paid_enable = 1";
			$data['paid_array'] = $this->pos_payment_model->get_paid_payment($where);
			$data['shop_array'] = $shop_array;

			$data['title'] = programname.version." - Convert Invoice";
			$data['content_header'] = "นาฬิกา > ออกใบกำกับภาษี";
			$this->load->view('POS/time/main_time_convert_invoice', $data);
		}else{
			redirect('pos_payment/view_payment/'.$payment_id, 'refresh');
		}
	}

	function print_slip_small_invoice()
	{
		$payment_id = $this->uri->segment(3);
		$where = "";
		$where .= "posp_id = '".$payment_id."' and posp_enable = 1";

		$this->load->model('pos_payment_model','',TRUE);
		$data['payment_array'] = $this->pos_payment_model->get_payment($where);

		$where = "popi_posp_id = '".$payment_id."'";
		$where .= " and popi_enable = 1";
		$data['item_array'] = $this->pos_payment_model->get_time_item_payment($where);

		$shop_id = $this->session->userdata('sessshopid');
		$this->load->model('shop_model','',TRUE);
		$where = "posh_id = '".$shop_id."'";
		$data['shop_array'] = $this->shop_model->get_shop($where);

		$data['title'] = programname.version." - Payment view";
		$this->load->view('POS/print/slip_small_invoice', $data);
	}

	function print_small_invoice()
	{
		$payment_id = $this->uri->segment(3);
		$where = "";
		$where .= "posp_id = '".$payment_id."' and posp_enable = 1";

		$this->load->model('pos_payment_model','',TRUE);
		$payment_array = $this->pos_payment_model->get_payment($where);

		foreach($payment_array as $loop) {
      $payment_id = $loop->posp_id;
      $total_net = $loop->posp_price_net;
      $total_topup = $loop->posp_price_topup;
      $total_tax = $loop->posp_price_tax;
      $cus_name = $loop->posc_name;
      $cus_address = $loop->posc_address;
      $cus_taxid = $loop->posc_taxid;
      $cus_telephone = $loop->posc_telephone;
      $saleperson_number = $loop->nggu_number;
      $saleperson_name = $loop->nggu_firstname." ".$loop->nggu_lastname;
			$small_invoice_number = $loop->posp_small_invoice_number;
			$issuedate = $loop->posp_issuedate;
			$issue_array = explode('-', $issuedate);
			$issue_array[0] += 543;
			$issuedate = $issue_array[2]."/".$issue_array[1]."/".$issue_array[0];
			$shop_name = $loop->posp_shop_name;
    }

		$where = "popi_posp_id = '".$payment_id."'";
		$where .= " and popi_enable = 1";
		$item_array = $this->pos_payment_model->get_time_item_payment($where);

		$shop_id = $this->session->userdata('sessshopid');
		$this->load->model('shop_model','',TRUE);
		$where = "posh_id = '".$shop_id."'";
		$shop_array = $this->shop_model->get_shop($where);
		foreach($shop_array as $loop) {
			$print_tax = $loop->posh_print_tax;
      $shop_name = $loop->posh_name;
      $shop_address1 = $loop->posh_address1;
      $shop_address2 = $loop->posh_address2;
      $shop_telephone = $loop->posh_telephone;
      $shop_fax = $loop->posh_fax;
      $shop_taxid = $loop->posh_taxid;
      $shop_company = $loop->posh_company;
      $shop_branch_no = $loop->posh_branch_no;
		}

		$this->load->library('Pdf');

		$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

		// Add a page
		$pdf->SetFont('thsarabunpsk','', 14);
		$pdf->setPrintHeader(false);
		$pdf->setPrintFooter(false);
		$pdf->AddPage('P', 'A4');
		$html = '
		<html><body><table border="0"><tbody><tr>
<td width="300">'.$shop_company.'<br>
'.$shop_address1.'<br/>
'.$shop_address2.'<br>Tax ID : '.$shop_taxid.' ';

if ($shop_branch_no == 0) $html .= 'Head Office';
else if ($shop_branch_no > 0) $html .= 'Branch No. '.str_pad($shop_branch_no, 5, '0', STR_PAD_LEFT);

$html .= '<br/>';
if ($shop_telephone != "") $html .= "Tel. ".$shop_telephone." ";
if ($shop_fax != "") $html .= "Fax. ".$shop_fax;

		$html .= '</td>
<td width="230" style="text-align: right;">ใบกำกับภาษีอย่างย่อ /<br>ใบเสร็จรับเงิน<br><br>สาขา : '.$shop_name.'</td></tr>
<tr><td></td><td></td></tr>

<tr><td width="350">เลขที่ : '.$small_invoice_number.'<br>นามลูกค้า : '.$cus_name.'</td><td width="180">วันที่ : '.$issuedate.'<br>พนักงานขาย : '.$saleperson_name.'</td></tr>
</tbody></table>
<br/><br/>
<table border="0">
<thead>
	<tr>
		<th width="25" style="border-top:1px solid black;border-left:1px solid black;border-bottom:1px solid black;text-align:center;">No.</th>
		<th width="200" style="border-top:1px solid black;border-left:1px solid black;border-bottom:1px solid black;text-align:center;">รายละเอียดสินค้า</th>
		<th width="40" style="border-top:1px solid black;border-left:1px solid black;border-bottom:1px solid black;text-align:center;">จำนวน</th>
		<th width="85" style="border-top:1px solid black;border-left:1px solid black;border-bottom:1px solid black;text-align:center;">หน่วยละ</th>
		<th width="85" style="border-top:1px solid black;border-left:1px solid black;border-bottom:1px solid black;text-align:center;">ส่วนลด</th>
		<th width="105" style="border-top:1px solid black;border-right:1px solid black;border-left:1px solid black;border-bottom:1px solid black;text-align:center;">จำนวนเงิน</th>
	</tr>
</thead><tbody>';
		// $pdf->writeHTML($html, true, false, true, false, '');


		$no = 0;
		$max_item = 9;
		$qty = 0;
		foreach ($item_array as $loop) {
			$no++;
			if (($no != 1) && ($no % $max_item == 1)) {
				$html .= '<tr><td colspan="7" style="border-top:1px solid black;"></td></tr></tbody></table>';
				$html .= '<br pagebreak="true"/>';
				$html .= '
						<html><body><table border="0"><tbody><tr>
				<td width="300">'.$shop_company.'<br>
				'.$shop_address1.'<br/>
				'.$shop_address2.'<br>Tax ID : '.$shop_taxid.' ';

				if ($shop_branch_no == 0) $html .= 'Head Office';
				else if ($shop_branch_no > 0) $html .= 'Branch No. '.str_pad($shop_branch_no, 5, '0', STR_PAD_LEFT);

				$html .= '<br/>';
				if ($shop_telephone != "") $html .= "Tel. ".$shop_telephone." ";
				if ($shop_fax != "") $html .= "Fax. ".$shop_fax;

						$html .= '</td>
				<td width="230" style="text-align: right;">ใบกำกับภาษีอย่างย่อ /<br>ใบเสร็จรับเงิน<br><br>สาขา : '.$shop_name.'</td></tr>
				<tr><td></td><td></td></tr>

				<tr><td width="350">เลขที่ : '.$small_invoice_number.'<br>นามลูกค้า : '.$cus_name.'</td><td width="180">วันที่ : '.$issuedate.'<br>พนักงานขาย : '.$saleperson_name.'</td></tr>
				</tbody></table>
				<br/><br/>
				<table border="0">
				<thead>
					<tr>
						<th width="25" style="border-top:1px solid black;border-left:1px solid black;border-bottom:1px solid black;text-align:center;">No.</th>
						<th width="200" style="border-top:1px solid black;border-left:1px solid black;border-bottom:1px solid black;text-align:center;">รายละเอียดสินค้า</th>
						<th width="40" style="border-top:1px solid black;border-left:1px solid black;border-bottom:1px solid black;text-align:center;">จำนวน</th>
						<th width="85" style="border-top:1px solid black;border-left:1px solid black;border-bottom:1px solid black;text-align:center;">หน่วยละ</th>
						<th width="85" style="border-top:1px solid black;border-left:1px solid black;border-bottom:1px solid black;text-align:center;">ส่วนลด</th>
						<th width="105" style="border-top:1px solid black;border-right:1px solid black;border-left:1px solid black;border-bottom:1px solid black;text-align:center;">จำนวนเงิน</th>
					</tr>
				</thead><tbody>';
			}
			$html .= '<tr><td width="25" style="text-align:center;border-left:1px solid black;">'.$no.'</td><td width="10" style="border-left:1px solid black;"></td><td width="190">'.$loop->popi_barcode.'<br/>'
				.$loop->popi_item_number."-".$loop->popi_item_name;
				if ($loop->popi_item_serial != "")	$html .= "<br>Serial : ".$loop->popi_item_serial; else $html .= "<br>";
				$html .= '</td><td width="40" style="text-align:center;border-left:1px solid black;">'.$loop->popi_item_qty.'</td>
				<td width="85" style="text-align:center;border-left:1px solid black;">'.number_format($loop->popi_item_srp, 2,'.',',').'</td>
				<td width="85" style="text-align:center;border-left:1px solid black;">';
				if ($loop->popi_item_dc_baht > 0) $html .= number_format($loop->popi_item_dc_baht, 2,'.',',');
				// if ($loop->popi_item_dc_percent > 0) $html .= '<br>( '.number_format($loop->popi_item_dc_percent).'% )';
				$html .= '</td>
				<td width="105" style="text-align:right;border-left:1px solid black;border-right:1px solid black;">'.number_format($loop->popi_item_net, 2,'.',',').'&nbsp;&nbsp;&nbsp;&nbsp;</td>
				</tr>';



				$qty += $loop->popi_item_qty;
		}

		// discount topup
		if($total_topup > 0) {
			$html .= '<tr><td width="25" style="text-align:center;border-left:1px solid black;"></td><td width="10" style="border-left:1px solid black;"></td><td width="190">ส่วนลดท้ายบิล</td><td width="40" style="text-align:center;border-left:1px solid black;"></td>
				<td width="85" style="text-align:center;border-left:1px solid black;"></td>
				<td width="85" style="text-align:center;border-left:1px solid black;"></td>
				<td width="105" style="text-align:right;border-left:1px solid black;border-right:1px solid black;">- '.number_format($total_topup, 2,'.',',').'&nbsp;&nbsp;&nbsp;&nbsp;</td>
				</tr>';
		}else{
			$html .= '<tr><td width="25" style="text-align:center;border-left:1px solid black;"></td><td width="10" style="border-left:1px solid black;"></td><td width="190"></td><td width="40" style="text-align:center;border-left:1px solid black;"></td>
				<td width="85" style="text-align:center;border-left:1px solid black;"></td>
				<td width="85" style="text-align:center;border-left:1px solid black;"></td>
				<td width="105" style="text-align:right;border-left:1px solid black;border-right:1px solid black;"></td>
				</tr>';
		}

		if ($no <= $max_item) {
			for($j=$no; $j<$max_item; $j++) {
				$html .= '<tr><td width="25" style="text-align:center;border-left:1px solid black;"></td><td width="10" style="border-left:1px solid black;"></td><td width="190"><br><br><br></td>
				<td width="40" style="text-align:center;border-left:1px solid black;"></td><td width="85" style="text-align:center;border-left:1px solid black;">
				</td><td width="85" style="text-align:center;border-left:1px solid black;"></td><td width="105" style="text-align:right;border-left:1px solid black;border-right:1px solid black;"></td></tr>';
			}
		}

		// sum qty & total price no vat
		$html .= '<tr><td colspan="3" style="border-top:1px solid black;border-left:1px solid black;border-right:1px solid black;text-align:right;">จำนวน &nbsp;&nbsp;&nbsp;</td>
		<td style="border-top:1px solid black;border-left:1px solid black;border-right:1px solid black;text-align:center;">'.$qty.'</td>
		<td colspan="2" style="border-top:1px solid black;border-left:1px solid black;border-right:1px solid black;text-align:right;">ราคาไม่รวมภาษีมูลค่าเพิ่ม &nbsp;&nbsp;&nbsp;</td>
		<td style="border-top:1px solid black;border-left:1px solid black;border-right:1px solid black;text-align:right;">'.number_format($total_net-$total_topup-$total_tax, 2,'.',',').' &nbsp;&nbsp;&nbsp;</td>
		</tr>';
		// vat
		$html .= '<tr>
		<td colspan="6" style="border-top:1px solid black;border-left:1px solid black;border-right:1px solid black;text-align:right;">จํานวนภาษีมูลค่าเพิ่ม 7 % &nbsp;&nbsp;&nbsp;</td>
		<td style="border-top:1px solid black;border-left:1px solid black;border-right:1px solid black;text-align:right;">'.number_format($total_tax, 2,'.',',').' &nbsp;&nbsp;&nbsp;</td>
		</tr>';
		// total price vat
		$html .= '<tr><td colspan="4" style="border-top:1px solid black;border-left:1px solid black;">&nbsp;&nbsp;('.$this->num2thai($total_net-$total_topup).')</td>
		<td colspan="2" style="border-top:1px solid black;border-right:1px solid black;text-align:right;">จํานวนเงินรวมทั้งสิ้น &nbsp;&nbsp;&nbsp;</td>
		<td style="border-top:1px solid black;border-left:1px solid black;border-right:1px solid black;text-align:right;">'.number_format($total_net-$total_topup, 2,'.',',').' &nbsp;&nbsp;&nbsp;</td>
		</tr>';

		$html .= '<tr><td colspan="7" style="border-top:1px solid black;"></td></tr></tbody></table>';

		$html .= '</body></html>';
		$pdf->writeHTML($html, true, false, true, false, '');
		$pdf->IncludeJS("print();");
		$pdf->Output('Invoice_ABB.pdf', 'I');

	}

	function num2thai($number){
		$t1 = array("ศูนย์", "หนึ่ง", "สอง", "สาม", "สี่", "ห้า", "หก", "เจ็ด", "แปด", "เก้า");
		$t2 = array("เอ็ด", "ยี่", "สิบ", "ร้อย", "พัน", "หมื่น", "แสน", "ล้าน");
		$zerobahtshow = 0; // ในกรณีที่มีแต่จำนวนสตางค์ เช่น 0.25 หรือ .75 จะให้แสดงคำว่า ศูนย์บาท หรือไม่ 0 = ไม่แสดง, 1 = แสดง
		(string) $number;
		$number = explode(".", $number);
		if(!empty($number[1])){
		if(strlen($number[1]) == 1){
		$number[1] .= "0";
		}else if(strlen($number[1]) > 2){
		if($number[1]{2} < 5){
		$number[1] = substr($number[1], 0, 2);
		}else{
		$number[1] = $number[1]{0}.($number[1]{1}+1);
		}
		}
		}

		for($i=0; $i<count($number); $i++){
		$countnum[$i] = strlen($number[$i]);
		if($countnum[$i] <= 7){
		$var[$i][] = $number[$i];
		}else{
		$loopround = ceil($countnum[$i]/6);
		for($j=1; $j<=$loopround; $j++){
		if($j == 1){
		$slen = 0;
		$elen = $countnum[$i]-(($loopround-1)*6);
		}else{
		$slen = $countnum[$i]-((($loopround+1)-$j)*6);
		$elen = 6;
		}
		$var[$i][] = substr($number[$i], $slen, $elen);
		}
		}

		$nstring[$i] = "";
		for($k=0; $k<count($var[$i]); $k++){
		if($k > 0) $nstring[$i] .= $t2[7];
		$val = $var[$i][$k];
		$tnstring = "";
		$countval = strlen($val);
		for($l=7; $l>=2; $l--){
		if($countval >= $l){
		$v = substr($val, -$l, 1);
		if($v > 0){
		if($l == 2 && $v == 1){
		$tnstring .= $t2[($l)];
		}elseif($l == 2 && $v == 2){
		$tnstring .= $t2[1].$t2[($l)];
		}else{
		$tnstring .= $t1[$v].$t2[($l)];
		}
		}
		}
		}
		if($countval >= 1){
		$v = substr($val, -1, 1);
		if($v > 0){
		if($v == 1 && $countval > 1 && substr($val, -2, 1) > 0){
		$tnstring .= $t2[0];
		}else{
		$tnstring .= $t1[$v];
		}

		}
		}

		$nstring[$i] .= $tnstring;
		}

		}
		$rstring = "";
		if(!empty($nstring[0]) || $zerobahtshow == 1 || empty($nstring[1])){
		if($nstring[0] == "") $nstring[0] = $t1[0];
		$rstring .= $nstring[0]."บาท";
		}
		if(count($number) == 1 || empty($nstring[1])){
		$rstring .= "ถ้วน";
		}else{
		$rstring .= $nstring[1]."สตางค์";
		}
		return $rstring;
	}


}
