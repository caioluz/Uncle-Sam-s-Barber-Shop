<?php
class Registro_model extends CI_Model
{
  function inserir_cliente($dados)
  {
    $this->db->insert('cliente', $dados);
    return $this->db->insert_id();
  }

}
