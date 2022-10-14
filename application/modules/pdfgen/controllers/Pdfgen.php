<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pdfgen extends CI_Controller
{
  public function index()
  {
    // // panggil library yang kita buat sebelumnya yang bernama pdfgenerator
    // $this->load->library('pdfgenerator');

    // // title dari pdf
    // $data['title_pdf'] = 'Resume';
    // $data['basic'] = $this->sour->getAllCandidateBasic();

    // // filename dari pdf ketika didownload
    // $file_pdf = 'Resume';
    // // setting paper
    // $paper = 'A4';
    // //orientasi paper potrait / landscape
    // $orientation = "portrait";

    // $html = $this->load->view('resume_pdf', $data, true);

    // // run dompdf
    // $this->pdfgenerator->generate($html, $file_pdf, $paper, $orientation);
  }

  public function resumeSingle($id_candidate)
  {

    // panggil library yang kita buat sebelumnya yang bernama pdfgenerator
    $this->load->library('pdfgenerator');

    // title dari pdf
    $data['title_pdf'] = 'Resume';
    $this->load->model('Pdf_model', 'sour');
    // $data['basic'] = $this->sour->getAllCandidateBasic();
    $data['title'] = "Detail Kandidat";
    $data['users'] = $this->db->get_where('users', ['username' => $this->session->userdata('username')])->row_array();
    // $data['basic'] = $this->db->get('candidate_basic', ['id_candidate' => $id_candidate])->row_array();

    $data['list'] = $this->sour->detailAll($id_candidate);
    $data['second'] = $this->sour->detailSecond($id_candidate);
    $data['educate'] = $this->sour->detailEducation($id_candidate);
    $data['exp'] = $this->sour->detailExp($id_candidate);

    // filename dari pdf ketika didownload
    $file_pdf = 'Resume';
    // setting paper
    $paper = 'A4';
    //orientasi paper potrait / landscape
    $orientation = "portrait";

    $html = $this->load->view('resume_single', $data, true);

    // run dompdf
    $this->pdfgenerator->generate($html, $file_pdf, $paper, $orientation);
  }
}