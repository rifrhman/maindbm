<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Manage_education_model extends CI_Model
{


  public function queryNew()
  {
    $this->db->select('*');
    $this->db->from('candidate_basic');
    $this->db->join('education', 'education.basic_id = candidate_basic.id_candidate', 'left');
    $this->db->where('education.basic_id IS NOT NULL');
    $this->db->group_by('candidate_basic.id_candidate');
    $this->db->order_by('education.basic_id', 'desc');
  }

  var $table = 'education';
  var $column_order = array('id_candidate', 'fullname', 'degree', 'institute', 'city', null); //set column field database for datatable orderable
  var $column_search = array('id_candidate', 'fullname', 'degree', 'institute', 'city'); //set column field database for datatable searchable just firstname , lastname , address are searchable
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

  public function getDetailEducation($basic_id)
  {
    $query = "SELECT * FROM candidate_basic LEFT JOIN education 
    ON candidate_basic.id_candidate = education.basic_id 
    WHERE education.basic_id = $basic_id;";
    return $this->db->query($query)->row_array();
  }
  public function getDetailEdu($basic_id)
  {
    $query = "SELECT * FROM candidate_basic JOIN education 
    ON candidate_basic.id_candidate = education.basic_id 
    WHERE candidate_basic.id_candidate = $basic_id;";
    return $this->db->query($query)->result_array();
  }

  public function getEducation($id_education)
  {
    $query = "SELECT * FROM `education` WHERE `id_education` = $id_education";
    return $this->db->query($query)->row_array();
  }



  public function get_by_id($id_education)
  {
    $this->db->from($this->table);
    $this->db->where('id_education', $id_education);
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

  public function delete_by_id($id_education)
  {
    $this->db->where('id_education', $id_education);
    $this->db->delete($this->table);
  }
}