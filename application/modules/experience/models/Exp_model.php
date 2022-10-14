<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Exp_model extends CI_Model
{

  public function getAllBasicAndSecondary()
  {
    $query = "SELECT `candidate_basic`.*, `candidate_secondary`.*
                  FROM `candidate_basic` JOIN `candidate_secondary`
                  ON `candidate_basic`.`id_candidate` = `candidate_secondary`.`basic_id`
                ";
    return $this->db->query($query)->result_array();
  }

  public function getStatusTest()
  {
    $query = "SELECT `candidate_basic`.*, `candidate_secondary`.*
              FROM `candidate_basic` JOIN `candidate_secondary`
              ON `candidate_basic`.`id_candidate` = `candidate_secondary`.`basic_id`
              WHERE `candidate_secondary`.`status_test` = 'Lulus' 
              OR `candidate_secondary`.`status_test` = 'Referensi'
              ORDER BY `candidate_basic`.`id_candidate` DESC";
    return $this->db->query($query)->result_array();
  }
}