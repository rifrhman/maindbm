<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pkwt_model extends CI_Model
{

  public function queryDataExport()
  {
    $query = "SELECT * FROM candidate_basic 
    LEFT JOIN send_candidate 
    ON candidate_basic.id_candidate = send_candidate.basic_id 
    LEFT JOIN basic_admin 
    ON basic_admin.basic_id = candidate_basic.id_candidate 
    INNER JOIN pkwt_employee 
    ON pkwt_employee.basic_id = candidate_basic.id_candidate 
    WHERE send_candidate.confirm IS NOT NULL AND 
    send_candidate.confirm_admin IS NOT NULL ORDER BY candidate_basic.fullname ASC";

    return $this->db->query($query)->result_array();
  }

  public function queryNew()
  {
    $this->db->select('*');
    $this->db->from('candidate_basic');
    $this->db->join('send_candidate', 'send_candidate.basic_id = candidate_basic.id_candidate', 'left');
    $this->db->join('basic_admin', 'basic_admin.basic_id = candidate_basic.id_candidate', 'left');
    $this->db->join('pkwt_employee', 'pkwt_employee.basic_id = candidate_basic.id_candidate');
    $this->db->where('send_candidate.confirm IS NOT NULL AND send_candidate.confirm_admin IS NOT NULL');
    // $this->db->group_by('pkwt_employee.end_of_contract');
    // $this->db->group_by('candidate_basic.fullname');
    // $this->db->select_max('pkwt_employee.end_of_contract');
    $this->db->order_by('pkwt_employee.id', 'DESC');
  }

  // var $table = 'candidate_basic';
  var $column_order = array(null, 'fullname', 'client', 'pkwt_number', 'date_pkwt', 'start_date', 'end_date', 'desc_pkwt', 'status_pkwt');
  var $column_search = array('fullname', 'client', 'pkwt_number', 'date_pkwt', 'start_date', 'end_date', 'desc_pkwt', 'status_pkwt');
  var $order = array('id_candidate' => 'desc');

  private function _get_data_query()
  {
    // $qu = "SELECT DISTINCT `basic_id` FROM `pkwt_employee`";
    $this->queryNew();

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

  public function getAllBasicAdmin($id_candidate)
  {
    $query = "SELECT `candidate_basic`.*, `basic_admin`.* FROM `candidate_basic` 
    JOIN `basic_admin` ON `candidate_basic`.id_candidate = `basic_admin`.`basic_id`
    WHERE `basic_admin`.`id_canidate` = $id_candidate";
    return $this->db->query($query)->row_array();
  }

  public function adminQuery($id_candidate)
  {
    $query = "SELECT * FROM `basic_admin` WHERE `basic_id` = $id_candidate";
    return $this->db->query($query)->row_array();
  }
  public function adminBank($id_candidate)
  {
    $query = "SELECT * FROM `secondary_admin` WHERE `basic_id` = $id_candidate";
    return $this->db->query($query)->row_array();
  }
  public function emergencyContact($id_candidate)
  {
    $query = "SELECT * FROM `emergency_contact` WHERE `basic_id` = $id_candidate";
    return $this->db->query($query)->row_array();
  }
  public function detailEmergency($id_candidate)
  {
    $query = "SELECT `candidate_basic`.`id_candidate`, `emergency_contact`.* FROM `candidate_basic` 
    LEFT JOIN `emergency_contact` 
    ON `candidate_basic`.`id_candidate` = `emergency_contact`.`basic_id`
    WHERE `candidate_basic`.`id_candidate` = $id_candidate
    ";
    return $this->db->query($query)->result_array();
  }
  public function pkwtEmployee($id_candidate)
  {
    $query = "SELECT * FROM `pkwt_employee` WHERE `basic_id` = $id_candidate";
    return $this->db->query($query)->row_array();
  }
  public function addendum($id_candidate)
  {
    $query = "SELECT * FROM `pkwt_employee` WHERE `basic_id` = $id_candidate";
    return $this->db->query($query)->result_array();
  }
  public function statPkwt()
  {
    $query = "SELECT * FROM `pkwt_employee` WHERE `id` = `id`";
    return $this->db->query($query)->row_array();
  }
}