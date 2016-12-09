<?php
Class Tmp_shop_stock_model extends CI_Model
{
  function getItem_refcode($where)
  {
    $this->db->select("it_id, it_refcode, it_model, it_uom, it_short_description, it_long_description, it_srp, it_cost_baht, it_picture, br_name, br_id, br_code, stob_id, stob_qty, sh_group_id, it_has_caseback");
    $this->db->from('tp_stock_balance');
    $this->db->join('tp_shop', "sh_warehouse_id = stob_warehouse_id", "left");
    $this->db->join('tp_item', 'it_id = stob_item_id', 'left');
    $this->db->join('tp_brand', 'it_brand_id = br_id','left');
    if ($where != "") $this->db->where($where);
    $query = $this->db->get();
    return $query->result();
  }

  function getItem_serial($where)
  {
    $this->db->select("itse_id, itse_serial_number, it_id, it_refcode, it_barcode, it_model, it_uom, it_short_description, it_long_description, it_srp, it_cost_baht, it_picture, it_min_stock, it_remark, br_id, br_name, br_code, itse_warehouse_id, stob_qty, stob_id, it_has_caseback, sh_group_id");
    $this->db->from('tp_item_serial');
    $this->db->join('tp_item', 'itse_item_id = it_id', 'left');
    $this->db->join('tp_stock_balance', 'stob_warehouse_id=itse_warehouse_id and stob_item_id=itse_item_id', 'left');
    $this->db->join('tp_shop', "sh_warehouse_id = stob_warehouse_id", "left");
    $this->db->join('tp_brand', 'it_brand_id = br_id','left');
    if ($where != "") $this->db->where($where);
    $query = $this->db->get();
    return $query->result();
  }

  function getWarehouse_transfer($where)
  {
    $this->db->select("stob_id, stob_item_id, it_refcode, it_barcode, br_name, it_model, it_uom, it_srp, it_short_description, stob_qty, stob_warehouse_id, wh_name, wh_code, stob_lastupdate, stob_lastupdate_by");
    $this->db->from('tp_stock_balance');
    $this->db->join('tp_warehouse', 'wh_id = stob_warehouse_id','left');
    $this->db->join('tp_item', 'it_id = stob_item_id','left');
    $this->db->join('tp_brand', 'br_id = it_brand_id','left');
    if ($where != "") $this->db->where($where);
    $query = $this->db->get();
    return $query->result();
  }

  function editWarehouse_transfer($edit=NULL)
  {
    $this->db->where('stob_id', $edit['id']);
    unset($edit['id']);
    $query = $this->db->update('tp_stock_balance', $edit);
    return $query;
  }


}
?>
