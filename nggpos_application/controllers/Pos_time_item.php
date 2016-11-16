<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pos_time_item extends CI_Controller {

	function __construct()
	{
    parent::__construct();
		if (!($this->session->userdata('sessid'))) redirect('pos_login', 'refresh');
	}

	public function index()
	{

	}

  function scan_barcode()
  {
    $barcode_value = $this->input->post("barcode");

    $where = "tiit_barcode like '".$barcode_value."'";

    $this->load->model('item_model','',TRUE);
    $query = $this->item_model->get_time_item($where);

    $result = "";
    foreach($query as $loop) {
      $result .= "<td><img src='".base_url()."asset/time_picture/".$loop->tiit_picture."' width='60px' height='80px' /></td>";
      $result .= "<td><input type='hidden' name='it_id' id='it_id' value='".$loop->tiit_id."'><input type='hidden' name='it_barcode' id='it_barcode' value='".$loop->tiit_barcode."'>".$loop->tiit_barcode."</td>";
      $result .= "<td>".$loop->tiit_number."-".$loop->tiit_name."<br>".$loop->tiit_brand."<br>".$loop->tiit_description;
			if ($loop->tiit_serial != "")
				$result .= "<br>Serial : ".$loop->tiit_serial;

			$result .= "</td>";
			$result .= "<td><input type='hidden' name='it_srp' id='it_srp' value='".$loop->tiit_srp."'>".number_format($loop->tiit_srp)."</td>";
      $result .= "<td><input type='number' name='it_quantity' id='it_quantity' value='1' style='width: 50px;' onchange='numberWithCommas(this); calculate();'></td>";
      $result .= "<td><input type='number' name='it_discount' id='it_discount' value='0' style='width: 80px;' onchange='calculate();'></td>";
			$result .= "<td><input type='number' name='it_dc_percent' id='it_dc_percent' value='0' style='width: 50px;' onchange='numberWithCommas(this); calculate();'></td>";
			$result .= "<td><input type='text' name='it_net' id='it_net' value='".number_format($loop->tiit_srp, 2, '.', ',')."' style='width: 100px;text-align: right;font-weight: bold;' disabled></td>";
    }

    echo $result;
  }

}
