<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Perfil extends CI_Controller {

  public function __construct()
  {
    parent::__construct();
    
    if (!$this->session->userdata('usuario')) {
      redirect('login');
    }
    
    $this->load->library('form_validation');
    //$this->load->model('perfil_model');
  }

  function index()
  {
    $this->load->template('perfil');
  }

  function logout()
  {
    $dados = $this->session->all_userdata();
    foreach ($dados as $index => $value) {
      $this->session->unset_userdata($index);
    }

    redirect('login');
  }
}
