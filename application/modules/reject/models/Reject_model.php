<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Reject_model extends CI_Model
{
  public function getRejected()
  {
    $query = "SELECT `candidate_basic`.*, `candidate_secondary`.*
              FROM `candidate_basic` JOIN `candidate_secondary`
              ON `candidate_basic`.`id_candidate` = `candidate_secondary`.`basic_id`
              WHERE `candidate_secondary`.`status_test` IS NOT NULL  AND `candidate_basic`.`desc_reject` IS NOT NULL
              ORDER BY `candidate_basic`.`id_candidate` DESC";
    return $this->db->query($query)->result_array();
  }
}