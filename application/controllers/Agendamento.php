<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Agendamento extends CI_Controller {

  public function __construct()
  {
    parent::__construct();

    $this->load->database();
  }

  /**
   * Index Page for this controller.
   *
   */
  public function index()
  {
    $this->load->model('unidade_model');
    $this->load->model('servico_model');
    $this->load->model('barbeiro_model');

    $dados['unidades'] = $this->unidade_model->obter();
    $dados['servicos'] = $this->servico_model->obter(1);
    $dados['barbeiros'] = $this->barbeiro_model->obter(1, [1, 2]);
    $this->load->template('agendamento', $dados);
  }

  public function servicos()
  {
    $this->load->model('servico_model');

    $unidadeId = $this->input->post('unidade');
    $servicos = $this->servico_model->obter($unidadeId);

    echo json_encode($servicos);
  }

  public function barbeiros()
  {
    $this->load->model('barbeiro_model');

    $unidadeId = $this->input->post('unidade');
    $servicosId = $this->input->post('servicos');
    $barbeiros = $this->barbeiro_model->obter($unidadeId, $servicosId);

    echo json_encode($barbeiros);
  }

  public function horas()
  {
    $horas = [];
    $horasRetorno = [];
    $data = "2020-01-01 09:00:00";

    do
    {
      $dataTempo =  strtotime($data);
      $hora = intval(date('H', $dataTempo));
      
      if ($hora != 12) {
        $horas[] = date('H:i', $dataTempo);
      }
      
      $data = date('Y-m-d H:i:s', strtotime($data. ' + 20 minutes'));
      $novaHora = intval(date('H', strtotime($data)));
    } 
    while ($novaHora < 18);

    foreach ($horas as $hora) 
    {
      $retornar = rand(0, 5);
      if ($retornar <= 1) {
        $horasRetorno[] = $hora;
      }
    }

    echo json_encode($horasRetorno);
  }
}
