<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Agendamento extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 */
	public function index()
	{
		$this->load->helper('url');
		$this->load->database();
		$query = $this->db->query("SELECT * FROM unidade");
		$dados['unit'] = $query->result();
		$this->load->template('agendamento', $dados);
	}
}
