<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Contract_model extends CI_Model
{

  public function countJoinEmpNull()
  {
    $query = "SELECT * FROM `send_candidate` WHERE `confirm` = 'Approved'";
    return $this->db->query($query)->num_rows();
  }

  // var $table = 'candidate_basic';
  var $column_order = array(null, 'fullname', 'client', 'start_date', 'end_date', 'created_by');
  var $column_search = array('fullname', 'client', 'start_date', 'end_date', 'created_by');
  var $order = array('id_candidate' => 'desc');

  private function _get_data_query()
  {
    $this->db->select('*');
    $this->db->from('candidate_basic');
    $this->db->join('send_candidate', 'send_candidate.basic_id = candidate_basic.id_candidate', 'left');
    $this->db->where('send_candidate.confirm IS NOT NULL');
    $this->db->order_by('candidate_basic.id_candidate', 'DESC');

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
    $this->db->join('send_candidate', 'send_candidate.basic_id = candidate_basic.id_candidate', 'left');
    $this->db->order_by('candidate_basic.id_candidate', 'DESC');
    return $this->db->count_all_results();
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

  public function getAll($id_candidate)
  {
    $query = "SELECT * FROM `candidate_secondary` 
    JOIN `candidate_basic` 
    ON `candidate_secondary`.`basic_id` = `candidate_basic`.`id_candidate` 
    WHERE `candidate_secondary`.`basic_id` = $id_candidate
    ORDER BY `candidate_basic`.`id_candidate`";
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
}