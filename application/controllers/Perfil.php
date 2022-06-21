<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Perfil extends CI_Controller {

  private $usuario;

  public function __construct()
  {
    parent::__construct();
    $this->usuario = $this->session->userdata('usuario');
    
    if (empty($this->usuario)) {
      redirect('login');
    }
    
    $this->load->library('form_validation');
    $this->load->model('cliente_model');
  }

  function index()
  {
    $dados['form'] = $this->cliente_model->obter($this->usuario['cod']);
    $this->load->template('perfil', $dados);
  }

  function salvar()
  {
    $this->load->helper('form');
    $this->load->library('form_validation');

    $this->form_validation->set_rules('nome', 'Nome', 'trim|required|min_length[5]');
    $this->form_validation->set_rules('cpf', 'CPF', 'trim|required|exact_length[14]');
    $form_valid = $this->form_validation->run();

    if ($form_valid) {
      $nome = $this->input->post('nome');
      $dados = array(
        'cpf' => $this->input->post('cpf'),
        'nome' => $nome,
        'telefone' => $this->input->post('telefone'),
        'cep' => $this->input->post('cep'),
        'logradouro' => $this->input->post('endereco'),
        'bairro' => $this->input->post('bairro'),
        'cidade' => $this->input->post('cidade'),
        'estado' => $this->input->post('estado'),
      );
      $this->cliente_model->atualizar($dados, $this->usuario['cod']);
      $this->session->set_userdata('usuario', [
        'cod' => $this->usuario['cod'],
        'nome' => $nome,
      ]);

      $this->session->set_flashdata('message', 'Salvo com sucesso!');
      redirect('perfil');
    }

    $this->index();
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
