<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Contract_model extends CI_Model
{

  public function countJoinEmpNull()
  {
    $query = "SELECT * FROM `send_candidate` WHERE `confirm` = 'Approved' AND `result_send` = 'Lulus' AND `confirm_admin` IS NULL OR `confirm_admin` = ''";
    return $this->db->query($query)->num_rows();
  }

  public function get_basic_admin($id_candidate)
  {
    $query = "SELECT * FROM basic_admin WHERE basic_id = $id_candidate";
    return $this->db->query($query)->result_array();
  }

  public function get_secondary_admin($id_candidate)
  {
    $query = "SELECT * FROM `secondary_admin` WHERE `basic_id` = $id_candidate";
    return $this->db->query($query)->result_array();
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
    $this->db->where('send_candidate.confirm = "Approved" AND send_candidate.result_send = "Lulus" AND send_candidate.confirm_admin IS NULL');
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
  public function getSendCandidate($id_candidate)
  {
    $query = "SELECT * FROM `send_candidate` WHERE `basic_id` = $id_candidate AND `confirm` IS NOT NULL AND `result_send` = 'Lulus' ORDER BY id DESC";
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

  public function quer()
  {
    $query = "
    SELECT * FROM candidate_basic 
    LEFT JOIN candidate_secondary ON candidate_secondary.basic_id = candidate_basic.id_candidate 
    LEFT JOIN education ON education.basic_id = candidate_basic.id_candidate 
    LEFT JOIN experience ON experience.basic_id = candidate_basic.id_candidate 
    LEFT JOIN send_candidate ON send_candidate.basic_id = candidate_basic.id_candidate 
    LEFT JOIN basic_admin ON basic_admin.basic_id = candidate_basic.id_candidate 
    LEFT JOIN secondary_admin ON secondary_admin.basic_id = candidate_basic.id_candidate 
    LEFT JOIN pkwt_employee ON pkwt_employee.basic_id = candidate_basic.id_candidate 
    LEFT JOIN emergency_contact ON emergency_contact.basic_id = candidate_basic.id_candidate 
    WHERE send_candidate.confirm = 'Approved' AND send_candidate.confirm_admin IS NULL 
    AND pkwt_employee.flags_resign IS NULL AND send_candidate.result_send IS NOT NULL 
    GROUP BY education.id_education ORDER BY education.id_education ASC;
    ";
    return $this->db->query($query)->result_array();
  }

  public function educ()
  {
    $query = "
    SELECT * FROM `education` GROUP BY basic_id ASC LIMIT 1;
    ";
    return $this->db->query($query)->result_array();
  }

  public function pkwt_export()
  {
    $query = "SELECT * FROM candidate_basic 
    LEFT JOIN pkwt_employee ON pkwt_employee.basic_id = candidate_basic.id_candidate 
    LEFT JOIN send_candidate ON send_candidate.basic_id = candidate_basic.id_candidate 
    WHERE send_candidate.confirm = 'Approved' AND send_candidate.confirm_admin = 'Approved'
    AND pkwt_employee.flags_resign IS NULL AND send_candidate.is_join = 'Join' AND send_candidate.result_send = 'Lulus'
    ORDER BY pkwt_employee.id ASC;";
    return $this->db->query($query)->result_array();
    // $this->queryNew();
  }
}