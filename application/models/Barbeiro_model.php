<?php
class Barbeiro_model extends CI_Model
{
  function obter($unidadeId, $servicosId)
  {
    $qtdServicos = count($servicosId);
    $campos = ['b.cod_barbeiro', 'b.nome', 'b.imagem'];

    $this->db->select($campos);
    $this->db->from('barbeiro as b');
    $this->db->join('barbeiro_servico as bs', 'bs.cod_barbeiro = b.cod_barbeiro');
    $this->db->where('b.cod_unidade', $unidadeId);
    $this->db->where_in('bs.cod_servico', $servicosId);
    $this->db->group_by($campos); 
    $this->db->having('COUNT(`bs`.`cod_servico`) >=', $qtdServicos);
    $query = $this->db->get();
    return $query->result();
  }
}
