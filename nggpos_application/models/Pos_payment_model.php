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
