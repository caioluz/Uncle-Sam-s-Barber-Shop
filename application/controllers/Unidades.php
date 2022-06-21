<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Unidades extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 */
	public function index()
	{
		$this->load->model('unidade_model');
		$dados['unidades'] = $this->unidade_model->obter();
		$this->load->template('unidades', $dados);
	}
}
