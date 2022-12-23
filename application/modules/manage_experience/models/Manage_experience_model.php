<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Manage_experience_model extends CI_Model
{


  public function queryNew()
  {
    $this->db->select('*');
    $this->db->from('candidate_basic');
    $this->db->join('experience', 'experience.basic_id = candidate_basic.id_candidate', 'left');
    $this->db->where('experience.basic_id IS NOT NULL');
    $this->db->group_by('candidate_basic.id_candidate');
    $this->db->order_by('experience.basic_id', 'desc');
  }

  var $table = 'experience';
  var $column_order = array('id_candidate', 'fullname', 'company', 'month_period', 'resign', null); //set column field database for datatable orderable
  var $column_search = array('id_candidate', 'fullname', 'company', 'month_period', 'resign'); //set column field database for datatable searchable just firstname , lastname , address are searchable
  var $order = array('id_candidate' => 'desc'); // default order 

  public function __construct()
  {
    parent::__construct();
    $this->load->database();
  }

  private function _get_datatables_query()
  {

    $this->queryNew();

    $i = 0;

    foreach ($this->column_search as $item) // loop column 
    {
      if ($_POST['search']['value']) // if datatable send POST for search
      {

        if ($i === 0) // first loop
        {
          $this->db->group_start(); // open bracket. query Where with OR clause better with bracket. because maybe can combine with other WHERE with AND.
          $this->db->like($item, $_POST['search']['value']);
        } else {
          $this->db->or_like($item, $_POST['search']['value']);
        }

        if (count($this->column_search) - 1 == $i) //last loop
          $this->db->group_end(); //close bracket
      }
      $i++;
    }

    if (isset($_POST['order'])) // here order processing
    {
      $this->db->order_by($this->column_order[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
    } else if (isset($this->order)) {
      $order = $this->order;
      $this->db->order_by(key($order), $order[key($order)]);
    }
  }

  function get_datatables()
  {
    $this->_get_datatables_query();
    if ($_POST['length'] != -1)
      $this->db->limit($_POST['length'], $_POST['start']);
    $query = $this->db->get();
    return $query->result();
  }

  function count_filtered()
  {
    $this->_get_datatables_query();
    $query = $this->db->get();
    return $query->num_rows();
  }

  public function count_all()
  {
    $this->db->from($this->table);
    return $this->db->count_all_results();
  }

  public function getDetailExperience($basic_id)
  {
    $query = "SELECT * FROM candidate_basic LEFT JOIN experience 
    ON candidate_basic.id_candidate = experience.basic_id 
    WHERE experience.basic_id = $basic_id;";
    return $this->db->query($query)->row_array();
  }
  public function getDetailExp($basic_id)
  {
    $query = "SELECT * FROM candidate_basic JOIN experience 
    ON candidate_basic.id_candidate = experience.basic_id 
    WHERE candidate_basic.id_candidate = $basic_id;";
    return $this->db->query($query)->result_array();
  }

  public function getExperience($id_exp)
  {
    $query = "SELECT * FROM `experience` WHERE `id_experience` = $id_exp";
    return $this->db->query($query)->row_array();
  }



  public function get_by_id($id_exp)
  {
    $this->db->from($this->table);
    $this->db->where('id_exp', $id_exp);
    $query = $this->db->get();

    return $query->row();
  }

  public function save($data)
  {
    $this->db->insert($this->table, $data);
    return $this->db->insert_id();
  }

  public function update($where, $data)
  {
    $this->db->update($this->table, $data, $where);
    return $this->db->affected_rows();
  }

  public function delete_by_id($id_exp)
  {
    $this->db->where('id_exp', $id_exp);
    $this->db->delete($this->table);
  }
}