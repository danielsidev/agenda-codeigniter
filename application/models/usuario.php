<?php

class Usuario extends CI_Model
{
 function login($login, $senha)
 {
   $query = $this->db-> query("select id, login, senha from usuario"
           . " where login='".$login."' and senha='".md5($senha)."'");
   
 //   var_dump($query); exit();
 
   if($query -> num_rows() == 1)
   {
     return $query->result();
   }
   else
   {
     return false;
   }
 }
}

?>