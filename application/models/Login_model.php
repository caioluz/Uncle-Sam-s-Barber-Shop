<?php
class Login_model extends CI_Model
{
  function login_validacao($email, $password)
  {
    $this->db->where('email', $email);
    $query = $this->db->get('cliente');
  
    if($query->num_rows() <= 0) {
      return FALSE;
    }

    $chave = config_item('encryption_key');
    $password_hash = hash_hmac("sha256", $password, $chave);

    foreach ($query->result() as $row) {
      if (password_verify($password_hash, $row->senha)) {
        return [
          'cod' => $row->cod_cliente,
          'nome' => $row->nome,
        ];
      }
      
      return FALSE;
    }
  }

}
