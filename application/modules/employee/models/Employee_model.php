<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Employee_model extends CI_Model
{

  public function countJoinEmpNull()
  {
    $query = "SELECT DISTINCT send_candidate.id, send_candidate.basic_id, pkwt_employee.id, pkwt_employee.basic_id, pkwt_employee.flags_resign 
    FROM send_candidate LEFT JOIN pkwt_employee ON send_candidate.basic_id = pkwt_employee.basic_id WHERE send_candidate.confirm = 'Approved' AND `send_candidate`.`confirm_admin` 
    = 'Approved' AND pkwt_employee.flags_resign IS NULL GROUP BY pkwt_employee.basic_id";
    return $this->db->query($query)->num_rows();
  }
  public function get_basic_admin($id_candidate)
  {
    $query = "SELECT * FROM basic_admin WHERE basic_id = $id_candidate";
    return $this->db->query($query)->result_array();
  }
  public function queryNew()
  {
    $this->db->select('*');
    $this->db->from('candidate_basic');
    $this->db->join('send_candidate', 'send_candidate.basic_id = candidate_basic.id_candidate', 'left');
    $this->db->join('basic_admin', 'basic_admin.basic_id = candidate_basic.id_candidate', 'left');
    $this->db->join('pkwt_employee', 'pkwt_employee.basic_id = candidate_basic.id_candidate', 'left');
    $this->db->where('send_candidate.confirm = "Approved" AND send_candidate.confirm_admin = "Approved" AND send_candidate.is_join = "Join"');
    $this->db->where('pkwt_employee.flags_resign IS NULL');
    // $this->db->group_by('pkwt_employee.end_of_contract');
    $this->db->group_by('candidate_basic.fullname');
    $this->db->select_max('pkwt_employee.end_of_contract');
    $this->db->order_by('pkwt_employee.id', 'DESC');
  }

  // var $table = 'candidate_basic';
  var $column_order = array(null, 'fullname', 'client', 'cc', 'position',  'start_date', 'end_of_contract');
  var $column_search = array('fullname', 'client', 'cc', 'position', 'start_date', 'end_of_contract');
  var $order = array('id_candidate' => 'desc');

  private function _get_data_query()
  {
    // $qu = "SELECT DISTINCT `basic_id` FROM `pkwt_employee`";
    if ($this->input->post('min')) {
      $this->db->where('end_of_contract >=', $this->input->post('min'));
      $this->db->where('end_of_contract <=', $this->input->post('max'));
    }
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
    // var_dump($first, $last);
    // die;

    // $first = strtotime($first);
    // $lastly = strtotime($last);




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
  var $table = 'pkwt_employee';

  public function get_by_id($id)
  {
    $this->db->from($this->table);
    $this->db->where('id', $id);
    $query = $this->db->get();

    return $query->row();
  }
  public function get_by_basic_id($basic_id)
  {
    $this->db->select('*');
    $this->db->from('candidate_basic');
    $this->db->join('pkwt_employee', 'pkwt_employee.basic_id = candidate_basic.id_candidate', 'left');
    $this->db->where('id_candidate', $basic_id);
    $query = $this->db->get();

    return $query->row();
  }

  public function save($where, $data)
  {
    $this->db->insert($this->table, $data, $where);
    // return $this->db->insert_id();
  }

  public function update($where, $data)
  {
    $this->db->update($this->table, $data, $where);
    return $this->db->affected_rows();
  }

  public function get_secondary_admin($id_candidate)
  {
    $query = "SELECT * FROM `secondary_admin` WHERE `basic_id` = $id_candidate";
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
  public function editstatPkwt($id_candidate)
  {
    $query = "SELECT * FROM `pkwt_employee` WHERE basic_id = $id_candidate ORDER BY id DESC LIMIT 1";
    return $this->db->query($query)->result_array();
  }

  public function getstat($id)
  {
    $query = "SELECT * FROM `pkwt_employee` WHERE id = $id ORDER BY id DESC LIMIT 1";
    return $this->db->query($query)->result_array();
  }
  public function getRes()
  {
    $query = "SELECT * FROM pkwt_employee WHERE flags_resign IS NOT NULL";
    return $this->db->query($query)->row_array();
  }
}