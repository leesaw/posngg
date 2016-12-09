<?php
Class Item_model extends CI_Model
{
  function get_time_item($where)
  {
    $this->db->select('tiit_id, tiit_number, tiit_name, tiit_brand, tiit_description, tiit_barcode, tiit_uom, tiit_srp, tiit_picture, tiit_serial, tiit_enable');
    $this->db->from('time_item');
    if($where !='') $this->db->where($where);
    $this->db->limit(1);
    return $this->db->get()->result();
  }

  function getItem($where)
  {
    $this->db->select("it_id, it_refcode, it_barcode, it_model, it_uom, it_short_description, it_long_description, it_srp, it_cost_baht, it_picture, it_min_stock, it_has_caseback, it_remark, it_category_id, itc_name, it_brand_id, br_name, br_code, bc_name");
    $this->db->from('tp_item');
    $this->db->join('tp_item_category', 'it_category_id = itc_id','left');
    $this->db->join('tp_brand', 'it_brand_id = br_id','left');
    $this->db->join('tp_brand_category', 'br_category_id = bc_id','left');
    if ($where != "") $this->db->where($where);
    $query = $this->db->get();
    return $query->result();
  }

  function get_time_serial($where)
  {
    $this->db->select("itse_id, itse_serial_number");
    $this->db->from('tp_item_serial');
    if ($where != "") $this->db->where($where);
    $query = $this->db->get();
    return $query->result();
  }

  function editItemSerial($edit=NULL)
  {
    $this->db->where('itse_id', $edit['id']);
    unset($edit['id']);
    $query = $this->db->update('tp_item_serial', $edit);
    return $query;
  }
}
?>
