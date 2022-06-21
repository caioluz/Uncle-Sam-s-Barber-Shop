<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Servicos extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 */
	public function index()
	{
		$this->load->model('servico_model');
		$dados['servicos'] = $this->servico_model->obter_todos();
		$this->load->template('servicos', $dados);
	}
}
