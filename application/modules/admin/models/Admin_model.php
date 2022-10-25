<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin_model extends CI_Model
{


  public function countJoinEmp()
  {
    $query = "SELECT * FROM `send_candidate` WHERE `confirm` = 'Approved'";
    return $this->db->query($query)->num_rows();
  }
}