<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Agendamento extends CI_Controller {

  public function __construct()
  {
    parent::__construct();
    $this->usuario = $this->session->userdata('usuario');
    
    if (empty($this->usuario)) {
      redirect('login/index/agendamento');
    }

    $this->load->database();
  }

  /**
   * Index Page for this controller.
   *
   */
  public function index()
  {
    $this->load->model('unidade_model');

    $dados['unidades'] = $this->unidade_model->obter();
    $this->load->template('agendamento', $dados);
  }

  public function salvar()
  {
    $this->load->model('agendamento_model');
    $this->load->model('servico_model');

    $dados = [];
    $usuario = $this->session->userdata('usuario');
    $unidadeId = $this->input->post('unidade');
    $barbeiroId = $this->input->post('barbeiro');
    $servicosId = $this->input->post('servicos');
    $data = $this->input->post('data');
    $hora = $this->input->post('hora');
    $datetime = new DateTime("$data $hora");
    $arrServicosId = explode(",", $servicosId);

    foreach ($arrServicosId as $servicoId)
    {
      $servico = $this->servico_model->obter($unidadeId, $servicoId)[0];
      $dados[] = [
        'cod_cliente' => $usuario['cod'],
        'cod_barbeiro' => $barbeiroId,
        'cod_servico' => $servicoId,
        'data_hora' => $datetime->format('Y-m-d H:i')
      ];

      $datetime->add(new DateInterval("PT" . $servico->duracao . "M"));
    }

    $agendou = $this->agendamento_model->inserir($dados);

    if ($agendou != -1) {
      $this->session->set_flashdata('message', 'Agendado com sucesso!');
      redirect('perfil/agendamentos');
    }

    $this->session->set_flashdata('message', 'Ocorreu algum erro ao agendar os serviços.');
    $this->index();
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
