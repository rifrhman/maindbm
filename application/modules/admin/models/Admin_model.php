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
    $query = "SELECT DISTINCT send_candidate.id, send_candidate.basic_id, 
    pkwt_employee.id, pkwt_employee.basic_id, pkwt_employee.flags_resign 
    FROM send_candidate LEFT JOIN pkwt_employee 
    ON send_candidate.basic_id = pkwt_employee.basic_id 
    WHERE send_candidate.confirm = 'Approved' AND `send_candidate`.`confirm_admin` = 'Approved' 
    AND pkwt_employee.flags_resign IS NULL AND `send_candidate`.`is_join` = 'Join' GROUP BY pkwt_employee.basic_id;";
    return $this->db->query($query)->num_rows();
  }
  public function countResign()
  {
    $query = "SELECT DISTINCT send_candidate.id, send_candidate.basic_id, 
    pkwt_employee.id, pkwt_employee.basic_id, pkwt_employee.flags_resign, send_candidate.is_join 
    FROM send_candidate LEFT JOIN pkwt_employee 
    ON send_candidate.basic_id = pkwt_employee.basic_id 
    WHERE send_candidate.confirm = 'Approved' 
    AND `send_candidate`.`confirm_admin` = 'Approved' 
    AND pkwt_employee.flags_resign = 'Fix Resign'
    AND `send_candidate`.`is_join` IS NOT NULL GROUP BY pkwt_employee.basic_id;";
    return $this->db->query($query)->num_rows();
  }
  public function countBlacklist()
  {
    $query = "SELECT DISTINCT send_candidate.id, send_candidate.basic_id, 
    pkwt_employee.id, pkwt_employee.basic_id, pkwt_employee.flags_resign, send_candidate.is_join 
    FROM send_candidate 
    LEFT JOIN pkwt_employee 
    ON send_candidate.basic_id = pkwt_employee.basic_id 
    WHERE pkwt_employee.flags_resign = 'Blacklist' AND
    send_candidate.confirm = 'Approved' AND `send_candidate`.`confirm_admin` = 'Approved'
    AND send_candidate.is_join IS NOT NULL GROUP BY pkwt_employee.basic_id;";
    return $this->db->query($query)->num_rows();
  }
}