<?php
class Cliente_model extends CI_Model
{
  function obter($cod_cliente)
  {
    $this->db->select('cpf, nome, logradouro, bairro, cidade, estado, cep, telefone, email');
    $this->db->from('cliente');
    $this->db->where('cod_cliente', $cod_cliente);
    $query = $this->db->get();
    return $query->result_array()[0];
  }

  function inserir($dados)
  {
    $this->db->insert('cliente', $dados);
    return $this->db->insert_id();
  }

  function atualizar($dados, $cod_cliente)
  {
    $this->db->set($dados);
    $this->db->where('cod_cliente', $cod_cliente);
    return $this->db->update('cliente');
  }
}
