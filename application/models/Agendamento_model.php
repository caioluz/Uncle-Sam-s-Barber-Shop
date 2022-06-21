<?php
class Agendamento_model extends CI_Model
{
  function obter($codCliente) {
    $this->db->select('s.*, a.data_hora, a.status, b.nome as nome_barbeiro, us.valor');
    $this->db->from('agendamento as a');
    $this->db->join('servico as s', 'a.cod_servico = s.cod_servico');
    $this->db->join('barbeiro as b', 'a.cod_barbeiro = b.cod_barbeiro');
    $this->db->join('unidade_servico as us', 'a.cod_servico = us.cod_servico AND b.cod_unidade = us.cod_unidade');
    $this->db->where('a.cod_cliente', $codCliente);
    $this->db->order_by('a.data_hora', 'DESC');
    $query = $this->db->get();
    return $query->result();
  }

  function inserir($dados)
  {
    return $this->db->insert_batch('agendamento', $dados);
  }
}
