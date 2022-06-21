<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

  private $redirect;

  public function __construct()
  {
    parent::__construct();
    
    if ($this->session->userdata('usuario')) {
      redirect('perfil');
    }
    
    $this->load->library('form_validation');
    $this->load->library('encryption');
    $this->encryption->initialize(['driver' => 'openssl']);
    $this->load->model('login_model');
  }

  function index($redirect = '')
  {
    $dados['redirect'] = $redirect;
    $this->load->template('login', $dados);
  }

  function validacao()
  {
    $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email');
    $this->form_validation->set_rules('password', 'Senha', 'required');

    if (!$this->form_validation->run()) {
      $this->index();
    }

    $email = $this->input->post('email');
    $password = $this->input->post('password');
    $resultado = $this->login_model->login_validacao($email, $password);

    if (!$resultado) {
      $this->session->set_flashdata('message', 'E-mail e/ou senha incorretos.');
      redirect('login');
    }

    $redirectUrl = $this->input->post('redirect') ?? 'perfil';
    $this->session->set_userdata('usuario', $resultado);
    redirect($redirectUrl);
  }

}
