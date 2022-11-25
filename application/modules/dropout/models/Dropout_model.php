<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dropout_model extends CI_Model
{

  public function queryNew()
  {
    $this->db->select('*');
    $this->db->from('candidate_basic');
    $this->db->join('candidate_secondary', 'candidate_basic.id_candidate = candidate_secondary.basic_id', 'left');
    $this->db->join('education', 'candidate_basic.id_candidate = education.basic_id', 'left');
    $this->db->join('experience', 'candidate_basic.id_candidate = experience.basic_id', 'left');
    $this->db->join('send_candidate', 'candidate_basic.id_candidate = send_candidate.basic_id', 'left');
    $this->db->join('basic_admin', 'candidate_basic.id_candidate = basic_admin.basic_id', 'left');
    $this->db->join('secondary_admin', 'candidate_basic.id_candidate = secondary_admin.basic_id', 'left');
    $this->db->join('pkwt_employee', 'candidate_basic.id_candidate = pkwt_employee.basic_id', 'left');
    $this->db->join('emergency_contact', 'candidate_basic.id_candidate = emergency_contact.basic_id', 'left');
    $this->db->where('send_candidate.confirm = "Approved" AND send_candidate.confirm_admin = "Approved" AND send_candidate.is_join = "Join" AND pkwt_employee.flags_resign = "Resign"');

    // $this->db->group_by('pkwt_employee.end_of_contract');
    $this->db->group_by('candidate_basic.fullname');
    $this->db->select_max('pkwt_employee.end_of_contract');
    $this->db->order_by('pkwt_employee.id', 'DESC');
  }


  var $column_order = array(null, 'fullname', 'client', 'cc', 'position',  'start_date', 'end_of_contract');
  var $column_search = array('fullname', 'client', 'cc', 'position', 'start_date', 'end_of_contract');
  var $order = array('id_candidate' => 'desc');


  private function _get_data_query()
  {

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
}