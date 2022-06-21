<?php
class Servico_model extends CI_Model
{
  function obter_todos()
  {
    $query = $this->db->get('servico');
    return $query->result();
  }

  function obter($unidadeId, $servicoId = NULL)
  {
    $this->db->select('s.*, us.valor');
    $this->db->from('unidade_servico as us');
    $this->db->join('servico as s', 'us.cod_servico = s.cod_servico');
    $this->db->where('us.cod_unidade', $unidadeId);

    if (isset($servicoId)) {
      $this->db->where('us.cod_servico', $servicoId);
    }

    $query = $this->db->get();
    return $query->result();
  }
}
