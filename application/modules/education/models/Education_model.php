<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Education_model extends CI_Model
{

  public function getBasicById($id_candidate)
  {
    $query = $this->db->get_where('candidate_basic', ['id_candidate' => $id_candidate])->row_array();
    return $query;
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