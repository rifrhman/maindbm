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
     LEFT JOIN `candidate_secondary` ON `candidate_basic`.`id_candidate` = `candidate_secondary`.`basic_id`";
    // return $this->db->query($query)->result_array();
  }

  public function countStatus()
  {
    $que = "SELECT `candidate_basic`.`id_candidate`, `candidate_secondary`.`status_test` FROM `candidate_basic`
     LEFT JOIN `candidate_secondary` ON `candidate_basic`.`id_candidate` = `candidate_secondary`.`basic_id`
     WHERE `candidate_secondary`.`status_test` IS NULL";
    return $this->db->query($que)->num_rows();
  }

  // var $table = "SELECT `candidate_basic`.*, `candidate_secondary`.* FROM `candidate_basic`
  // LEFT JOIN `candidate_secondary` ON `candidate_basic`.`id_candidate` = `candidate_secondary`.`basic_id`";
  var $column_order = array(null, 'fullname', 'domicile', 'last_education', 'test_one', 'test_two', 'test_three', 'status_test');
  var $column_search = array('fullname', 'domicile', 'last_education', 'test_one', 'candidate_secondary.status_test');
  var $order = array('id_candidate' => 'DESC');

  private function _get_data_query()
  {
    $this->db->select('*');
    $this->db->from('candidate_basic');
    $this->db->join('candidate_secondary', 'candidate_secondary.basic_id = candidate_basic.id_candidate', 'left');
    $this->db->join('send_candidate', 'send_candidate.basic_id = candidate_basic.id_candidate', 'left');
    $this->db->group_by('candidate_basic.id_candidate');
    $this->db->order_by('candidate_basic.id_candidate', 'DESC');

    // $query = "SELECT `candidate_basic`.*, `candidate_secondary`.* FROM `candidate_basic`
    // LEFT JOIN `candidate_secondary` ON `candidate_basic`.`id_candidate` = `candidate_secondary`.`basic_id`
    // ORDER BY `id_candidate` DESC";

    // if (isset($_POST['search']['value'])) {
    //   $this->db->like('fullname', $_POST['search']['value']);
    //   $this->db->or_like('domicile', $_POST['search']['value']);
    //   $this->db->or_like('last_education', $_POST['search']['value']);
    //   // $this->db->or_like('test_one', $_POST['search']['value']);
    //   // $this->db->or_like('test_two', $_POST['search']['value']);
    //   // $this->db->or_like('test_three', $_POST['search']['value']);
    // }
    $i = 0;
    foreach ($this->column_search as $item) // loop kolom 
    {
      if ($this->input->post('search')['value']) // jika datatable mengirim POST untuk search
      {
        if ($i === 0) // looping pertama
        {
          $this->db->group_start();
          $this->db->like($item, $this->input->post('search')['value']);
        } else {
          $this->db->or_like($item, $this->input->post('search')['value']);
        }
        if (count($this->column_search) - 1 == $i) //looping terakhir
          $this->db->group_end();
      }
      $i++;
    }


    // jika datatable mengirim POST untuk order
    if ($this->input->post('order')) {
      $this->db->order_by($this->column_order[$this->input->post('order')['0']['column']], $this->input->post('order')['0']['dir']);
    } else if (isset($this->order)) {
      $order = $this->order;
      $this->db->order_by(key($order), $order[key($order)]);
    }
  }

  public function getDataTable()
  {

    $this->_get_data_query();

    if ($_POST['length'] != -1) {
      $this->db->limit($_POST['length'], $_POST['start']);
    }


    $query = $this->db->get();
    return $query->result();
  }


  public function count_filtered_data()
  {
    $this->_get_data_query();

    $query = $this->db->get();
    return $query->num_rows();
  }

  public function count_all_data()
  {
    $this->db->select('*');
    $this->db->from('candidate_basic');
    $this->db->join('candidate_secondary', 'candidate_secondary.basic_id = candidate_basic.id_candidate', 'left');
    $this->db->order_by('candidate_basic.id_candidate', 'DESC');
    return $this->db->count_all_results();
  }
}