<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pos_stock extends CI_Controller {

	function __construct()
	{
    parent::__construct();
		if (!($this->session->userdata('sessid'))) redirect('pos_login', 'refresh');
	}

	public function index()
	{

	}

  function view_stock_balance()
	{
		$shop_id = $this->session->userdata('sessshopid');

		$this->load->model('shop_model','',TRUE);
		$where = "posh_id = '".$shop_id."'";
		$result = $this->shop_model->get_warehouse_shop($where);
		foreach ($result as $loop) { $warehouse_id = $loop->wh_id; }

		$data['warehouse_id'] = $warehouse_id;
		$data['title'] = programname.version." - Stock Balance";
		$data['content_header'] = "นาฬิกา > คลังสินค้า > สินค้าคงเหลือ";
		$this->load->view('POS/tmp_time/main_time_stock_balance', $data);
	}

	function ajaxViewStock()
	{
		$warehouse = $this->uri->segment(3);

    $sql = "br_id != '888'";
    $sql .= " and wh_id = '".$warehouse."'";

		$sql_serial = "(select itse_item_id,itse_warehouse_id, GROUP_CONCAT(itse_serial_number) as serialnumber from tp_item_serial
		where tp_item_serial.itse_warehouse_id='1009' and itse_enable=1 group by itse_item_id) tt";

    $this->load->library('Datatable');
    $this->datatable
    ->select("t_refcode, br_name, CONCAT(it_model,'<br>',it_short_description) as description, it_srp, stob_qty, serialnumber")
    ->from('tp_stock_balance')
    ->join('tp_warehouse', 'wh_id = stob_warehouse_id','left')
    ->join('tp_item', 'it_id = stob_item_id','left')
    ->join('tp_brand', 'br_id = it_brand_id','left')
		->join($sql_serial, 'tt.itse_item_id=tp_item.it_id and tt.itse_warehouse_id=tp_warehouse.wh_id')
    ->where('stob_qty >', 0)
    ->where('it_enable',1)
    ->where($sql);
    echo $this->datatable->generate();
	}


}
