<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin_model extends CI_Model
{


  public function countJoinEmp()
  {
    $query = "SELECT * FROM `send_candidate` WHERE `confirm` = 'Approved' AND `confirm_admin` IS NULL";
    return $this->db->query($query)->num_rows();
  }
  public function countEmpActive()
  {
    $query = "SELECT * FROM `send_candidate` WHERE `confirm` = 'Approved' AND `confirm_admin` IS NOT NULL";
    return $this->db->query($query)->num_rows();
  }
}