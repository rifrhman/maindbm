<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Score_model extends CI_Model
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
    OR `candidate_secondary`.`status_test` = 'Referensi'";
    return $this->db->query($query)->result_array();
  }

  public function checkDataCandidate($basic_id)
  {
    $this->db->select('*');
    $this->db->where('basic_id', $basic_id);
    $query = $this->db->get('candidate_secondary', 1);

    if ($query->num_rows() == 1) {
      return $query->row_array();
    }
  }
  public function getCandidateDesc()
  {
    $query = "SELECT `candidate_basic`.*, `candidate_secondary`.* FROM `candidate_basic`
     LEFT JOIN `candidate_secondary` ON `candidate_basic`.`id_candidate` = `candidate_secondary`.`basic_id`
     ORDER BY `id_candidate` DESC";
    return $this->db->query($query)->result_array();
  }

  public function countStatus()
  {
    $que = "SELECT `candidate_basic`.`id_candidate`, `candidate_secondary`.`status_test` FROM `candidate_basic`
     LEFT JOIN `candidate_secondary` ON `candidate_basic`.`id_candidate` = `candidate_secondary`.`basic_id`
     WHERE `candidate_secondary`.`status_test` IS NULL";
    return $this->db->query($que)->num_rows();
  }
}