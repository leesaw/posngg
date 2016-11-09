<?php
Class Province_model extends CI_Model
{
  function get_province()
  {
    $this->db->select('province_code, province_name');
    $this->db->from('list_province');
    // $this->db->order_by('province_name', 'asc');
    return $this->db->get()->result();
  }


}
?>
