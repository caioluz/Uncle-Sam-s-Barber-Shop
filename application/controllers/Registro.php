<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Registro extends CI_Controller {

  public function __construct()
  {
    parent::__construct();
    
    if ($this->session->userdata('usuario')) {
      redirect('perfil');
    }
    
    $this->load->library('form_validation');
    $this->load->library('encryption');
    $this->encryption->initialize(['driver' => 'openssl']);
    $this->load->model('cliente_model');
  }

  function index()
  {
    $this->load->template('registro');
  }

  function registro()
  {
    $this->form_validation->set_rules('nome', 'Nome', 'required|trim');
    $this->form_validation->set_rules('email', 'E-mail', 'required|trim|valid_email|is_unique[cliente.email]');
    $this->form_validation->set_rules('password', 'Senha', 'required');

    if (!$this->form_validation->run()) {
      $this->index();
    }

    $nome = $this->input->post('nome');
    $email = $this->input->post('email');
    $password = $this->input->post('password');

    $chave = config_item('encryption_key');
    $password_hash = hash_hmac("sha256", $password, $chave);
    $password_encriptado = password_hash($password_hash, PASSWORD_ARGON2ID);

    $cliente_dados = [
      'nome' => $nome,
      'email' => $email,
      'senha' => $password_encriptado
    ];

    $usuario_id = $this->cliente_model->inserir($cliente_dados);
      
    if ($usuario_id <= 0) {
      $this->index();
    }

    $this->session->set_flashdata('message', 'Registrado com sucesso!');
    redirect('login');
  }

}
