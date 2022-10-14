<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Upload_model extends CI_Model
{

  public function getDataDesc()
  {
    $query = "SELECT * FROM candidate_basic 
              JOIN candidate_secondary 
              ON candidate_basic.id_candidate = candidate_secondary.basic_id 
              ORDER BY candidate_basic.id_candidate DESC";
    return $this->db->query($query)->result_array();
  }

  public function getFull($basic_id)
  {
    $query = "SELECT candidate_basic.*, candidate_secondary.* 
    FROM candidate_basic JOIN candidate_secondary 
    ON candidate_basic.id_candidate = candidate_secondary.basic_id
    WHERE candidate_basic.id_candidate = $basic_id 
    ORDER BY candidate_basic.id_candidate;";
    return $this->db->query($query)->row_array();
  }
}