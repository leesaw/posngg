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
				// get item details
				$where_item = "tiit_id = '".$item[$i]['id']."'";
				$this->load->model('item_model','',TRUE);
				$item_array = $this->item_model->get_time_item($where_item);
				foreach($item_array as $loop) {
					$item_name = $loop->tiit_name;
					$item_number = $loop->tiit_number;
					$item_brand = $loop->tiit_brand;
					$item_description = $loop->tiit_description;
					$item_uom = $loop->tiit_uom;
					$item_serial = $loop->tiit_serial;
				}

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
		$where = "";
		$where .= "posp_id = '".$payment_id."' and posp_enable = 1";

		$this->load->model('pos_payment_model','',TRUE);
		$data['payment_array'] = $this->pos_payment_model->get_payment($where);

		$where = "popi_posp_id = '".$payment_id."'";
		$where .= " and popi_enable = 1";
		$data['item_array'] = $this->pos_payment_model->get_item_payment($where);

		$data['title'] = programname.version." - Payment view";
		$this->load->view('POS/main/main_time_view_payment', $data);
	}

	function print_small_invoice()
	{
		$payment_id = $this->uri->segment(3);
		$where = "";
		$where .= "posp_id = '".$payment_id."' and posp_enable = 1";

		$this->load->model('pos_payment_model','',TRUE);
		$payment_array = $this->pos_payment_model->get_payment($where);

		$where = "popi_posp_id = '".$payment_id."'";
		$where .= " and popi_enable = 1";
		$item_array = $this->pos_payment_model->get_item_payment($where);

		$this->load->library('Pdf');

		$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
		// Add a page
		$pdf->SetFont('thsarabunpsk','', 14);
		$pdf->setPrintHeader(false);
		$pdf->setPrintFooter(false);
		$pdf->AddPage('P', 'A4');
		$html = '
		<html><body><table border="0"><tbody><tr>
<td width="300">NGG TIMEPIECES COMPANY LIMITED<br>
27 Soi Pattanasin Naradhiwas Rajanagarindra Rd. Thungmahamek
Sathon Bangkok 10120<br>Tel. 02-678-9988 Fax. 02-678-5566<br>Tax ID : 0105555081331</td>
<td width="230" style="text-align: right;">ใบกำกับภาษีอย่างย่อ /<br>ใบเสร็จรับเงิน<br><br>ต้นฉบับ</td></tr>
<tr><td></td><td></td></tr>

<tr><td width="350">นามลูกค้า</td><td width="180">เลขที่  <br>วันที่</td></tr>
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
</thead></tbody></table>
</body></html>';
		$pdf->writeHTML($html, true, false, true, false, '');

// $html = '
// <tbody>
//
// </tbody></table>
// </body></html>';
// 	$pdf->writeHTML($html, true, false, true, false, '');
		// $pdf->writeHTML($html, true, false, true, false, '');
		// $no = 1;
		// for ($item_array as $loop) {
		// 	$html = '<tr><td style="text-align:center;">'.$no.'</td><td style="text-align:center;">'.$loop->popi_barcode.'</td>
		// 		<td>'.$loop->popi_item_number."-".$loop->popi_item_name."<br>".$loop->popi_item_brand."<br>".$loop->popi_item_description;
		// 		if ($loop->popi_item_serial != "")	$html .= "<br>Serial : ".$loop->popi_item_serial;
		// 		$html .= '</td><td style="text-align:center;">'.number_format($loop->popi_item_srp, 2,'.',',').'</td>
		// 		<td style="text-align:center;">'.$loop->popi_item_qty." ".$loop->popi_item_uom.'</td>
		// 		<td style="text-align:center;">'.number_format($loop->popi_item_dc_baht, 2,'.',',').'</td>
		// 		<td style="text-align:center;">'.number_format($loop->popi_item_dc_percent, 2,'.',',').'</td>
		// 		<td style="text-align:right;">'.number_format($loop->popi_item_net, 2,'.',',').'</td>
		// 		</tr>';
		// }
		// $pdf->writeHTML($html, true, false, true, false, '');
		//
		// $html = <<<EOD
		$pdf->Output('example_001.pdf', 'I');

	}


}
