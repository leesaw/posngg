<?php
Class Shop_model extends CI_Model
{
  function get_shop($where)
  {
    $this->db->select('posh_id, posh_name, posh_address1, posh_address2, posh_telephone, posh_fax, posh_taxid, posh_company, posh_branch_no, posh_print_tax, posh_enable');
    $this->db->from('pos_shop');
    if ($where != "") $this->db->where($where);
    $this->db->order_by('posh_name', 'asc');
    return $this->db->get()->result();
  }


}
?>
