<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Reference_model extends CI_Model
{

  public function getStatusTest()
  {
    $query = "SELECT `candidate_basic`.*, `candidate_secondary`.*
              FROM `candidate_basic` JOIN `candidate_secondary`
              ON `candidate_basic`.`id_candidate` = `candidate_secondary`.`basic_id`
              WHERE `candidate_secondary`.`status_test` = 'Referensi' 
              ORDER BY `candidate_basic`.`id_candidate` DESC";
    return $this->db->query($query)->result_array();
  }
  public function getAllBasicAndSecondary()
  {
    $query = "SELECT `candidate_secondary`.*, `candidate_basic`.*
                  FROM `candidate_secondary` JOIN `candidate_basic`
                  ON `candidate_basic`.`id_candidate` = `candidate_secondary`.`basic_id`
                ";
    return $this->db->query($query)->result_array();
  }

  public function checkDataCandidate($fullname, $date_of_birth)
  {
    $this->db->select('*');
    $this->db->where('fullname', $fullname);
    $this->db->where('date_of_birth', $date_of_birth);
    $query = $this->db->get('candidate_basic', 1);

    if ($query->num_rows() == 1) {
      return $query->row_array();
    }
  }

  public function importCandidate($candidate_basic)
  {
    // var_dump($candidate_basic);
    // die;
    $counting_candidate = count($candidate_basic);
    if ($counting_candidate > 0) {
      $this->db->replace('candidate_basic', $candidate_basic);
    }
  }

  public function getCandidateDesc()
  {
    $query = "SELECT * FROM candidate_basic ORDER BY id_candidate DESC";
    return $this->db->query($query)->result_array();
  }

  public function detailAll($id_candidate)
  {
    $query = "SELECT * FROM `candidate_basic` WHERE `id_candidate` = $id_candidate";
    return $this->db->query($query)->row_array();
  }
  public function detailSecond($id_candidate)
  {
    $query = "SELECT * FROM `candidate_secondary` WHERE `basic_id` = $id_candidate";
    return $this->db->query($query)->row_array();
  }
  public function detailEducation($id_candidate)
  {
    $query = "SELECT `candidate_basic`.`id_candidate`, `education`.* FROM `candidate_basic` 
    LEFT JOIN `education` 
    ON `candidate_basic`.`id_candidate` = `education`.`basic_id`
    WHERE `candidate_basic`.`id_candidate` = $id_candidate
    ";
    return $this->db->query($query)->result_array();
  }

  public function detailExp($id_candidate)
  {
    $query = "SELECT `candidate_basic`.`id_candidate`, `experience`.* FROM `candidate_basic` 
    LEFT JOIN `experience` 
    ON `candidate_basic`.`id_candidate` = `experience`.`basic_id`
    WHERE `candidate_basic`.`id_candidate` = $id_candidate
    ";
    return $this->db->query($query)->result_array();
  }

  public function expIndex()
  {
    $query = "SELECT `candidate_basic`.`id_candidate`, `experience`.`position`, `experience`.`month_period`
              FROM `candidate_basic` JOIN `experience` 
              ON `candidate_basic`.`id_candidate` = `experience`.`basic_id`
              WHERE `candidate_basic`.`id_candidate`";
    return $this->db->query($query)->result_array();
  }

  public function getStatusSend()
  {
    $query = "SELECT `candidate_basic`.*, `send_candidate`.* 
    FROM `candidate_basic` JOIN `send_candidate` 
    ON `candidate_basic`.`id_candidate` = `send_candidate`.`basic_id`";
    return $this->db->query($query)->result_array();
  }
}