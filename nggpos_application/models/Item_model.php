<?php
Class Item_model extends CI_Model
{
  function get_time_item($where)
  {
    $this->db->select('tiit_id, tiit_number, tiit_name, tiit_brand, tiit_description, tiit_barcode, tiit_uom, tiit_srp, tiit_picture, tiit_enable');
    $this->db->from('time_item');
    if($where !='') $this->db->where($where);
    $this->db->limit(1);
    return $this->db->get()->result();
  }


}
?>
