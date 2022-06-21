<?php
class Agendamento_model extends CI_Model
{
  function inserir($dados)
  {
    return $this->db->insert_batch('agendamento', $dados);
  }
}
