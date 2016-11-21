<?php
Class Pos_payment_model extends CI_Model
{
  function get_customer($where)
  {
    $this->db->select('posc_id, posc_name, posc_address, posc_province, posc_telephone, posc_taxid, posc_enable');
    $this->db->from('pos_customer');
    if ($where != "") $this->db->where($where);
    $this->db->order_by('posc_id', 'desc');
    $this->db->limit(1);
    return $this->db->get()->result();
  }

  function get_payment($where)
  {
    $this->db->select('posp_id, posp_issuedate, posp_gateway, posp_price_net, posp_price_paid, posp_price_tax, posp_price_topup, posp_price_discount, posp_status, posp_remark,
     posp_dateadd, posp_dateadd_by, posp_updatedate, posp_update_by, posp_shop_name, posp_enable, posp_customer_id, posc_name, posc_address, posc_province, posc_telephone, posc_taxid,
     posp_saleperson_id, nggu_number, nggu_firstname, nggu_lastname, posp_shop_id, posp_small_invoice_number');
    $this->db->from('pos_payment');
    $this->db->join('pos_customer', 'posc_id = posp_customer_id', 'left');
    $this->db->join('ngg_users', 'nggu_id = posp_saleperson_id', 'left');
    $this->db->join('pos_shop', 'posh_id = posp_shop_id', 'left');
    if ($where != "") $this->db->where($where);
    $this->db->order_by('posp_id', 'desc');
    return $this->db->get()->result();
  }

  function get_item_payment($where)
  {
    $this->db->select('popi_id, popi_posp_id, popi_barcode, popi_item_id, popi_item_name, popi_item_number, popi_item_uom, popi_item_brand, popi_item_description,
     popi_item_srp, popi_item_dc_baht, popi_item_dc_percent, popi_item_net, popi_item_serial, popi_item_qty');
    $this->db->from('pos_payment_item');
    if ($where != "") $this->db->where($where);
    $this->db->order_by('popi_id', 'asc');
    return $this->db->get()->result();
  }

  function getMaxNumber_small_invoice($month, $shop)
  {
     $start = $month."-01 00:00:00";
     $end = $month."-31 23:59:59";
     $this->db->select("posp_id");
     $this->db->from('pos_payment');
     $this->db->where("posp_dateadd >=",$start);
     $this->db->where("posp_dateadd <=",$end);
     $this->db->where("posp_enable", 1);
     $this->db->where("posp_status", 'N');
     if ($shop != "") $this->db->where("posp_shop_id", $shop);
     $query = $this->db->get();
     return $query->num_rows();
  }

  function insert_new_payment($payment)
  {
    $this->db->insert('pos_payment', $payment);
	  return $this->db->insert_id();
  }

  function insert_new_payment_item($item)
  {
    $this->db->insert('pos_payment_item', $item);
	  return $this->db->insert_id();
  }
}
?>
