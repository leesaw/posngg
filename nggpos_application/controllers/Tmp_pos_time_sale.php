<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Tmp_pos_time_sale extends CI_Controller {

	function __construct()
	{
    parent::__construct();
		if (!($this->session->userdata('sessid'))) redirect('pos_login', 'refresh');
	}

	public function index()
	{

	}

	function form_refcode()
	{
		$this->load->model('province_model','',TRUE);
		$data['province_array'] = $this->province_model->get_province();

		$where = "nggu_id = '".$this->session->userdata('sessid')."'";
		$this->load->model('users_model','',TRUE);
		$data['sale_person'] = $this->users_model->get_users($where);

		$data['content_header'] = "นาฬิกา > สั่งขาย";
    $data['serial'] = 0;
		$data['shop_id'] = $this->session->userdata('sessshopid');
		$data['title'] = programname.version." - Main";
		$this->load->view('POS/tmp_time/main_time_pos', $data);
	}

  function form_serial()
	{
		$this->load->model('province_model','',TRUE);
		$data['province_array'] = $this->province_model->get_province();

		$where = "nggu_id = '".$this->session->userdata('sessid')."'";
		$this->load->model('users_model','',TRUE);
		$data['sale_person'] = $this->users_model->get_users($where);

		$data['content_header'] = "นาฬิกา > สั่งขาย";
    $data['serial'] = 1;
		$data['shop_id'] = $this->session->userdata('sessshopid');
		$data['title'] = programname.version." - Main";
		$this->load->view('POS/tmp_time/main_time_pos', $data);
	}

	function check_code()
	{
		$barcode_value = $this->input->post("barcode");
		$shop_id = $this->input->post("shop_id");
    $serial = $this->input->post("serial");

		$this->load->model('shop_model','',TRUE);
		$where = "posh_id = '".$shop_id."'";
		$result = $this->shop_model->get_shop($where);
		foreach ($result as $loop) { $shop_id = $loop->posh_shop_id; }

		$output = "";
		$this->load->model('tmp_shop_stock_model','',TRUE);
    if ($serial == 0) {
        $sql = "it_enable = '1' and it_refcode = '".$barcode_value."' and sh_id = '".$shop_id."'"." and stob_qty > 0";
        $sql .= " and it_has_caseback = '".$serial."'";
        $result = $this->tmp_shop_stock_model->getItem_refcode($sql);
    }else{
        $sql = "it_enable = '1' and itse_serial_number = '".$barcode_value."' and itse_enable = '1' and sh_id = '".$shop_id."'"." and stob_qty > 0";
        $result = $this->tmp_shop_stock_model->getItem_serial($sql);
    }

		if (count($result) >0) {
        foreach($result as $loop) {
            $output .= "<td><input type='hidden' name='stob_id' id='stob_id' value='".$loop->stob_id."'><input type='hidden' name='it_id' id='it_id' value='".$loop->it_id."'>";

						if ($serial == 0) $output .= "<input type='hidden' name='it_barcode' id='it_barcode' value='".$loop->it_refcode."'>".$loop->it_refcode;
						else $output .= "<input type='hidden' name='it_barcode' id='it_barcode' value='".$loop->itse_serial_number."'>".$loop->itse_serial_number;
						$output .= "</td><td>".$loop->br_name." ".$loop->it_refcode."<br>".$loop->it_model."</td>";
						$output .= "<td><input type='hidden' name='it_srp' id='it_srp' value='".$loop->it_srp."'>".number_format($loop->it_srp)."</td>";

            if ($loop->it_has_caseback != '1') {
                $output .= "<td><input type='hidden' name='old_qty' id='old_qty' value='".$loop->stob_qty."'><input type='number' name='it_quantity' id='it_quantity' value='1' style='width: 50px;' onchange='numberWithCommas(this); calculate();'><input type='hidden' name='serial_id' id='serial_id' value='0'></td>";
            }else{
                $output .= "<td><input type='hidden' name='old_qty' id='old_qty' value='".$loop->stob_qty."'><input type='number' name='it_quantity' id='it_quantity' value='1' style='width: 50px;' disabled><input type='hidden' name='serial_id' id='serial_id' value='".$loop->itse_id."'></td>";
            }

						$output .= "<td><input type='number' name='it_discount' id='it_discount' value='0' style='width: 80px;' onchange='calculate();'></td>";
						$output .= "<td><input type='number' name='it_dc_percent' id='it_dc_percent' value='0' style='width: 50px;' onchange='numberWithCommas(this); calculate();'></td>";
						$output .= "<td><input type='text' name='it_net' id='it_net' value='".number_format($loop->it_srp, 2, '.', ',')."' style='width: 100px;text-align: right;font-weight: bold;' disabled></td>";

        }
    }

    echo $output;


	}


}
