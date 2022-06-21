<?php
class Unidade_model extends CI_Model
{
  function obter()
  {
    $query = $this->db->get('unidade');
    return $query->result();
  }
}
