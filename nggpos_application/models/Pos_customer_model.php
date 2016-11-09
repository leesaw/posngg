<?php
Class Pos_customer_model extends CI_Model
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

  function insert_new_customer($customer)
  {
    $this->db->insert('pos_customer', $customer);
	  return $this->db->insert_id();
  }


}
?>
