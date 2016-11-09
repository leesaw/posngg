<?php
Class Users_model extends CI_Model
{
  function check_username_password($username, $password)
  {
    $this->db->select('nggu_id, nggu_number, nggu_username, nggu_password, nggu_firstname, nggu_lastname, nggu_position, nggu_shop_id, nggu_company, nggu_status, posh_name');
    $this->db->from('ngg_users');
    $this->db->join("pos_shop", 'nggu_shop_id = posh_id', 'left');
    $this->db->where('nggu_username', $username);
    $this->db->where('nggu_enable', 1);
    $this->db->limit(1);
    $query = $this->db->get();
    $pwd_from_db = $query->row_array()['nggu_password'];
    if (password_verify($password, $pwd_from_db)) {
       return $query->result();
    } else {
        return false;
    }

  }

  function get_users($where)
  {
    $this->db->select('nggu_id, nggu_number, nggu_username, nggu_password, nggu_firstname, nggu_lastname, nggu_position, nggu_shop_id, nggu_company, nggu_status, posh_name');
    $this->db->from('ngg_users');
    $this->db->join("pos_shop", 'nggu_shop_id = posh_id', 'left');
    $this->db->where('nggu_enable', 1);
    if ($where != "") $this->db->where($where);
    $this->db->limit(1);
    return $this->db->get()->result();

  }

  function insert_log_login($user)
  {
    $this->db->insert('log_login', $user);
	  return $this->db->insert_id();
  }

  function edit_users($edit=NULL)
  {
	  $this->db->where('nggu_id', $edit['nggu_id']);
  	unset($edit['nggu_id']);
    $query = $this->db->update('ngg_users', $edit);
    return $query;
  }

}
?>
